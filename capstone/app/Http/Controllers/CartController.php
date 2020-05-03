<?php

namespace App\Http\Controllers;
use App\Item;
use App\shopping_cart;
use Session;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cart()
    {
        //dd('viewing cart');
        $session_id = Session::getId();
        $ip = Session::get('ip');
        /*
        $quantity = 1;
        if ($session_id == ""){
           //$ip = Request::ip();
           Session::set('session_id' , $session_id);  
           Session::set('ip' , $ip);  
        }else {
        }*/
        
           
        //$item = Item::find($id);

        //send to DB
        //$cart = new shopping_cart;
        //$cart->item_id = $item->id;
        //$cart->session_id = $session_id;
        //$cart->ip = $ip;
        //$cart->uquantity = $quantity;
        //$cart->save();
        $pItem = shopping_cart::where('session_id',$session_id);

        $total = 0;
        // foreach ($pItem as $item){
        //     $item2 =Item::find($item->id);
        //     $lineTotal = $item2->quantity * $item2->price;
        //     $total += $lineTotal;

        // }
        

        $userSpecific = shopping_cart::where('session_id', $session_id)->where('ip',$ip)->get();
        return view('product.cart')->with('item2',$userSpecific)->with('total',$total);
    }

    public function addtocart(Request $request)
    {
        //dd('adding to cart');
        $quantity = 1;
        $session_id = Session::getId();
        $ip = Session::get('ip');
        if ($session_id == ""){
           //$ip = Request::ip();
           $ip = $_SERVER['REMOTE_ADDR'];
           Session::set('session_id' , $session_id);  
           Session::set('ip' , $ip);  
        }else {
           $session_id = Session::getId(); 
        }
        
           
        $item = Item::find($request->item_id);

        //send to DB
        $cart = new shopping_cart;
        $cart->item_id = $item->id;
        $cart->session_id = $session_id;
        $cart->ip = $ip;
        $cart->uquantity = $quantity;
        $cart->save();

        

        //$pItem = shopping_cart::where('session_id',$session_id);

        // $total = 0;
        // foreach ($pItem as $item){
        //     $item2 =Item::find($item->id);
        //     $lineTotal = $item2->quantity * $item2->price;
        //     $total += $lineTotal;

        // }
        return redirect()->route('shoppingcart.cart');

    }

    public function update_cart(Request $request)
    {
        //dd('in update cart. new uquantity is: '.$request->uquantity);
        //pass the item->id
        $session_id = Session::getId(); 
       $cart = shopping_cart::find($request->cart_id);
       $item =Item::find($cart->item_id);
       //dd($item);
       $this->validate($request,['uquantity'=>'required|numeric']);
       if ($item->quantity > $request->uquantity){

            $cart->uquantity =$request->uquantity;
            $cart->save();
        }else{
            Session::flash('error','You exceeded the total avaliable stock ');
            return redirect()->route('shoppingcart.cart');  
            
        }

        // $pItem = shopping_cart::where('session_id',$session_id);

        // $total = 0;
        // foreach ($pItem as $item){
        //     $item2 =Item::find($item->id);
        //     $lineTotal = $item2->quantity * $item2->price;
        //     $total += $lineTotal;

        // }
        return redirect()->route('shoppingcart.cart');   
    }

    public function remove_item(Request $request)
    { 
        $session_id = Session::getId();
        $cart = shopping_cart::find($request->cart_id);
        //dd($cart);
        $cart->delete();

        // $pItem = shopping_cart::where('session_id',$session_id);

        // $total = 0;
        // foreach ($pItem as $item){
        //     $item2 =Item::find($item->id);
        //     $lineTotal = $item2->quantity * $item2->price;
        //     $total += $lineTotal;

        // }
        return redirect()->route('shoppingcart.cart');   
        
    }


}
