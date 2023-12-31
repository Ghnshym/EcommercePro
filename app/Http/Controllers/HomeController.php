<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\order;
use Session;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{

    public function index(){
        $products = Product::paginate(9);
        return view('home.userpage', compact('products'));
    }
    public function redirect(){
        $usertype = Auth::user()->usertype;

        if($usertype == '1'){

            $total_product = product::all()->count();

            $total_order = order::all()->count();

            $total_user = User::all()->count();

            $order = order::all();
            $total_revenue = 0;
            foreach($order as $order){
                $total_revenue = $total_revenue + $order->price;
            }

            $total_delivered = order::where('delivery_status', '=', 'delivered')->get()->count();

            $total_processing = order::where('delivery_status', '=', 'processing')->get()->count();

            return view('admin.home', compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));

        }else{
            $products = Product::paginate(9);
            return view('home.userpage', compact('products'));
        }
    }

    public function product_details($id){

        $product=product::find($id);
        return view('home.product_details',compact('product'))->with('message', 'product Added successfully');
    }

    public function add_cart(Request $request, $id){

        if(Auth::id())
        {
            $user= Auth::user();
            $userid = $user->id;
            $product=product::find($id);

            $product_exist_id = cart::where('product_id', '=',$id)->where('user_id', '=',$userid)->get('id')->first();

            if($product_exist_id)
            {

                $cart = cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

                if($product->discount_price!=null){

                    $cart->price=$product->discount_price * $cart->quantity;
               }
               else{
   
                   $cart->price=$product->price * $cart->quantity;
               }
                
                $cart->save();
                return redirect()->back()->with('message', 'Product Added Successfully');
            }
            else{

                $cart = new cart();

            $cart->user_id=$user->id;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;

            $cart->product_id=$product->id;
            $cart->product_title=$product->title;

            if($product->discount_price!=null){

                 $cart->price=$product->discount_price * $request->quantity;
            }
            else{

                $cart->price=$product->price * $request->quantity;
            }
            $cart->image=$product->image;

            $cart->quantity=$request->quantity;

            $cart->save();
            return redirect()->back()->with('message', 'Product Added Successfully');
            }
            
            
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart(){

        if(Auth::id())
        {

        $id = Auth::user()->id;
        $cart= cart::where('user_id','=',$id)->get();
        return view('home.show_cart', compact('cart'));

        }
        else
        {
            return redirect('login');
        }
    }

    public function remove_cart($id){

        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order($totalproduct)
    {
        if($totalproduct==0)

        {

             return redirect()->back()->with('message','Please add some product');
        }

        else

        {


         $user=Auth::user();

        $userid=$user->id;


        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {

            $order=new order;

            $order->name=$data->name;

            $order->email=$data->email;

            $order->phone=$data->phone;

            $order->address=$data->address;

            $order->user_id=$data->user_id;



            $order->product_title=$data->product_title;

            $order->price=$data->price;

            $order->quantity=$data->quantity;

            $order->image=$data->image;

            $order->product_id=$data->product_id;

            $order->payment_status='cash on delivery';

            $order->delivery_status='processing';

            $order->save();


            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();

        }

        return redirect()->back()->with('message','We have Received your Order. We will connect with you soon...');

        }


    }

    public function stripe($totalPrice): View
    {
        return view('home.stripe', compact('totalPrice'));
    }
      
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request, $totalPrice): RedirectResponse
    {
        if ($totalPrice == 0) {
            return redirect()->back()->with('error', 'Please add some products before making a payment.');
        }
    
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            Stripe\Charge::create([
                "amount" => $totalPrice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment using card."
            ]);

            $user=Auth::user();

            $userid=$user->id;
    
    
            $data=cart::where('user_id','=',$userid)->get();
    
            foreach($data as $data)
            {
    
                $order=new order;
    
                $order->name=$data->name;
    
                $order->email=$data->email;
    
                $order->phone=$data->phone;
    
                $order->address=$data->address;
    
                $order->user_id=$data->user_id;
    
    
    
                $order->product_title=$data->product_title;
    
                $order->price=$data->price;
    
                $order->quantity=$data->quantity;
    
                $order->image=$data->image;
    
                $order->product_id=$data->product_id;
    
                $order->payment_status='Paid';
    
                $order->delivery_status='processing';
    
                $order->save();
    
    
                $cart_id=$data->id;
    
                $cart=cart::find($cart_id);
    
                $cart->delete();
    
            }
    
            return back()->with('success', 'Payment successful!');
        
    }

    public function user_order(){

        if(Auth::id()){

            $user = Auth::user();
            $userid = $user->id;

            $order = order::where('user_id','=',$userid)->get();

            return view('home.order', compact('order'));
        }else{

            return redirect('login');
        }
    }

    public function cancel_order($id){

        $order = order::find($id);
        $order->delivery_status = 'You cancelled the order';
        $order->save();

        return redirect()->back();
    }


    public function product_search(Request $request){

        $searchdata = $request->search;

        $products = Product::where('title', 'LIKE', "%$searchdata%")
        ->orWhere('catagory', 'LIKE', "%$searchdata%")
        ->paginate(9);

        if ($products->isEmpty()) {

            $noResultsMessage = 'No results found for "' . $searchdata . '".';
            return view('home.userpage', compact('noResultsMessage'));
        } else {
            
            return view('home.userpage', compact('products'));
        }
    }

    public function products(){

        $products = Product::paginate(9);

        return view('home.all_products', compact('products'))->with('message', 'Product has been successfully Added to cart');
    }

    public function search_product(Request $request){

        $searchdata = $request->search;

        $products = Product::where('title', 'LIKE', "%$searchdata%")
        ->orWhere('catagory', 'LIKE', "%$searchdata%")
        ->paginate(9);

        if ($products->isEmpty()) {

            $noResultsMessage = 'No results found for "' . $searchdata . '".';
            return view('home.all_products', compact('noResultsMessage'));
        } else {
            
            return view('home.all_products', compact('products'));
        }
    }
    



}
