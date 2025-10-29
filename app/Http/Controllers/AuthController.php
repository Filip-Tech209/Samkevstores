<?php

namespace App\Http\Controllers;
use App\Models\User;
Use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Mail;
use App\Mail\ForgotPasswordMail;


use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('admin.pages.login');
    }

    public function register(){
        return view('admin.pages.register');
    }

    public function registerUser(Request $request){
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^\+\d{6,14}$/', 'unique:users,phone'],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'phone.unique' => 'The phone number is already registered.',
            'email.unique' => 'The email address is already registered.',
        ]);

        try {
            $user = new User();
            $user->firstName = $request->firstName;
            $user->lastName = $request->lastName;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
    
            if ($user->save()) {
                return back()->with('success', 'User registered successfully!');
            } else {
                return back()->with('fail', 'Something went wrong. Please try again.');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') { // Integrity constraint violation
                return back()->with('fail', 'The phone number or email is already registered.');
            }
    
            return back()->with('fail', 'An unexpected error occurred.');
        }
    }    

    public function logout(Request $request) {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        session()->flush(); 
        return redirect('/'); // Redirect to the login page
    }
    

    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
        
        // Check if email exists in the database
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return back()->with('error', 'An account with this Email not found');
        }
        
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
        
            if ($user->usertype == 1) {
                return redirect('/dashboard')->with('success', 'Login Success');
            } elseif ($user->usertype == 0) {
                $userId = Auth::user()->id;
                $data = User::where('id', $userId)->get();
                return redirect('/')->with('success', 'Login Success');
            }
            return redirect('/')->with('success', 'Login Success');
        }
        
        return back()->with('error', 'Incorrect Email or Password');
        
    }

    public function forgot(){
        return view('admin.pages.forgot');
    }
    
    public function resetPassword(Request $request){
        $random_password = rand(111111111,999999999);
        $user = User::where('email', '=', $request->email)->first();
        if(!empty($user)){
            $user->password = Hash::make($random_password);
            $user->save();

            $user->password_random = $random_password;

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success','Password Reset Successful.Please check your email inbox!');


        }else{
            return redirect()->back()->with('error','Email not found');
        }
    }

    public function viewUsers(){
        $users = User::paginate(15);
        return view ('admin.pages.users',compact('users'));
    }

    public function editUser(Request $request, $id){
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $user->usertype = $request->usertype;

        $user->save();

        return redirect()->back()->with('success', 'User Role Changed successfully.');
    }
}

