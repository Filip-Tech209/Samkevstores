<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Messages;
use Illuminate\Support\Facades\Cache;
Use Session;


class MessageController extends Controller{

        // Store a new message
        public function storeMessage(Request $request)
        {
            $request->validate([
                'name'=>'required|string',
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
            ]);

            Messages::create([
                'name'=> $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            return redirect()->back()->with('success', 'Message sent successfully!');
        }

        // Show all messages
        public function inbox()
        {
            $previousMessageCount = Cache::get('message_count', 0);
            $currentMessageCount = Messages::count();
            $newMessageReceived = $currentMessageCount > $previousMessageCount;
            $newMessageCount = $currentMessageCount - $previousMessageCount;

            $latest = Messages::latest()->paginate(3);
    
            $msg = Messages::orderBy('created_at', 'desc')->get();
    
            Cache::put('message_count', $currentMessageCount);
            return view('admin.pages.inbox',compact('msg','newMessageReceived',['newMessageCount'],'latest'));
        }

        // Mark a message as read
        public function markAsRead($id)
        {
            $message = Messages::findOrFail($id);
            $message->update(['is_read' => true]);

            return redirect()->back()->with('success', 'Message marked as read.');
        }

        public function readMessage(Request $request, $id){
            $msg = Messages::find($id);

            if (!$msg) {
                return redirect()->back()->with('error', 'Product not found.');
            }
            return view('admin.pages.readMessage',compact('msg'));
        }

        public function deletemessage($id) {
            $messages = Messages::find($id);
            if ($messages) {
                $messages->delete();
                if (Session::get('loginId') == $id) {
                    Session::forget('loginId'); // Remove the logged-in user's session
                }
                return redirect('inbox')->with('success', 'Message deleted successfully');
            } else {
                return redirect('inbox')->with('error', 'Message Not found');
            }
        }
    
    

}
