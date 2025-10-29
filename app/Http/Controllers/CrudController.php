<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use Stripe\Stripe;
Use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class CrudController extends Controller
{
    public function storeProduct(Request $request){
        $product = new Products;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagename = time() . "." . $image->getClientOriginalExtension();
            $image->move('productsimage', $imagename);
            $product->image = $imagename;
        }else{
            return redirect()->back()->with('error', 'Image upload failed.');
        }

        $product->category = $request->category; 
        $product->subcategory = $request->subcategory;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->details = $request->details;
        $product->status = $request->status;
        $product->shippingdetails = $request->shippingdetails;
        $product->quantity = $request->quantity;
        $product->save();
    
        return redirect()->back()->with('success', 'Product uploaded successfully.');
    }

    public function updateProduct(Request $request, $id){
        $product = Products::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . "." . $image->getClientOriginalExtension();

            // Delete the old image if it exists
            if ($product->image) {
                $imagePath = str_replace('\\', '/', public_path('productsimage/' . $product->image)); // Normalize path
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Save the new image
            $image->move(public_path('productsimage'), $imagename);
            $product->image = $imagename; // Update the image field with the new one
        }

        // Update the other fields
        $product->category = $request->category;
        $product->subcategory = $request->subcategory;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->details = $request->details;
        $product->status = $request->status;
        $product->shippingdetails = $request->shippingdetails;
        $product->quantity = $request->quantity;

        // Save the updated product
        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    public function delete(string $id){
        $pro = Products::find($id);

        if ($pro) {
            if ($pro->image) {
                $imagePath = str_replace('\\', '/', public_path('productsimage/' . $pro->image));
                
                if (file_exists($imagePath)) {
                    // Attempt to delete and check the result
                    if (unlink($imagePath)) {
                        logger("File deleted successfully: $imagePath");
                    } else {
                        logger("Failed to delete the file: $imagePath");
                    }
                } else {
                    logger("File not found: $imagePath");
                }
            }

            // Delete the product
            $pro->delete();

            return redirect('view-product')->with('success', 'Deleted successfully');
        } else {
            return redirect('view-product')->with('error', 'Product not found');
        }


    }
}
