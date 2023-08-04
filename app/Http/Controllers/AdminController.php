<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\order;
use Notification;
use PDF;


class AdminController extends Controller
{
    public function view_catagory(){

        $data = catagory::all();
        return view('admin.catagory', compact('data'));
    }

    public function add_catagory(Request $request){

        $data = new Catagory();
        $data->catagory_name=$request->catagory;

        $data->save();

        return redirect()->back()->with('message', 'catagory added successfully');
    }

    public function delete_catagory($id){
        $data = catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'catagory deleted successfully');
    }

    public function view_product(){

        $catagory = catagory::all();
        return view('admin.product', compact('catagory'));
    }

    public function add_product(Request $request){

        $product= new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->catagory=$request->catagory;
        $product->quantity=$request->quantity;

        //for image 
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image=$imagename;

        $product->save();
        return redirect()->back()->with('message', 'Product added successfully');
    }

    public function show_product(){

        $product=product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id){

        $product = product::find($id);
        $product->delete();

        return redirect()->back()->with('message', 'Product deleted successfully');
    }

    public function update_product($id){

        $product = product::find($id);
        $catagory = catagory::all();

        return view('admin.update_product', compact('product', 'catagory'));
    }

    public function update_product_confirm(Request $request, $id){

        $product = product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->catagory=$request->catagory;
        $product->quantity=$request->quantity;

        //for image 
        $image = $request->image;
        if($image){

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image=$imagename;

        }

        $product->save();
        return redirect()->back()->with('message', 'Update Product Successfully');
    }

    public function order(){

        $order = order::all();
        return view('admin.order', compact('order'));
    }

    public function delivered($id){

        $order = order::find($id);
        $order->delivery_status = 'delivered';
        $order->payment_status = 'paid';

        $order->save();

        return redirect()->back();
    }

    public function order_pdf($id){
        
        $order = order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('order_details.pdf');
    }

    public function send_email($id){

        $order = order::find($id);
        return view('admin.email_info', compact('order'));
    }

    public function send_user_email(Request $request, $id){

        $order = order::find($id);

        $details = [

            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        Notification::send($order, new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Email send');

    }

}
