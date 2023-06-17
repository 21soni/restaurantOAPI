<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Cart;
use DateTimeZone;
use DateTime;
use Session;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {

        if($id == 1){

            $name = "Lobster Bisque";
            $price = 500;
        }elseif($id == 2){
            $name = "Bread Barrel";
            $price = 600;
        }elseif($id == 3){
            $name = "Crab Cake";
            $price = 700;
        }elseif($id == 4){
            $name = "Caesar Selections";
            $price = 800;
        }elseif($id == 5){
            $name = "Tuscan Grilled";
            $price = 900;
        }elseif($id == 6){
            $name = "Mozzarella Stick";
            $price = 1000;
        }elseif($id == 7){
            $name = "Greek Salad";
            $price = 1100;
        }elseif($id == 8){
            $name = "Spinach Salad";
            $price = 1200;
        }elseif($id == 9){
            $name = "Lobster Roll";
            $price = 1300;
        }

        Cart::insert([
            'id'        => $id,
            'name'      => $name,
            'qty'       => $request->quantity,
            'price'     => $price,
            'weight'    => 0
        ]);

        return redirect('/')->with('message', 'Les informations sur le produit ont été ajoutées au panier avec succès.');
    }

    public function show()
    {

        return view('cart', [
            'cart_count'    => Cart::count(),
            'cart_items'    => Cart::all(),
        ]);
    }

    public function checkout()
    {
        return view('checkout', [
            'cart_items'    => Cart::all(),
            'cart_count'    => Cart::count()
        ]);
    }

    public function newOrder(Request $request)
    {
        //dd($request);
        $this->user = Auth::user();

        Session::put('customer_id', $this->user->id);
        Session::put('name', $this->user->name);

        $this->order = new Order();
        $date = new DateTime("now", new DateTimeZone('Asia/Dhaka'));
        $this->order->customer_id       = $this->user->id;
        $this->order->order_date        = $date->format('F j, Y g:i:s a');
        $this->order->order_timestamp   = strtotime($date->format('Y-m-d H:i:s.v'));
        $this->order->save();

        $this->cartProducts = Cart::all();
        foreach ($this->cartProducts as $cartProduct)
        {
            $this->orderDetail = new OrderDetail();
            $this->orderDetail->order_id            = $this->order->id;
            $this->orderDetail->product_id          = $cartProduct->id;
            $this->orderDetail->product_price       = $cartProduct->price;
            $this->orderDetail->product_quantity    = $cartProduct->qty;
            $this->orderDetail->save();
        }

        

        /*==============================Email send==============================*/

        Cart::destroy($cartProduct->id);

        return redirect('/')->with('message', 'Vos informations de commande sont soumises avec succès. Veuillez patienter, nous vous contacterons bientôt.');
    }
}
