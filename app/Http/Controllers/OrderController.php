<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Collection;
use App\FooterMenu;
use App\Order;
use App\Providers\LiqpayServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LiqPay;

class OrderController extends Controller
{
    public function createOrder($id)
    {
       if(Auth::user() && isset($id) && !empty($id)){
           $us = Auth::user()->id;
           $order = new Order();
           $order->user_id = $us;
           $order->book_id = $id;
           $order->save();
           $book = Book::find($id);
           $cats = Category::all();
           $cols = Collection::all();
           $foot = FooterMenu::all();
           if(isset($order) && isset($book) && !empty($book)){
               session()->put('order_id', $order->id);
               $liqpay = new LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));
               //dd($liqpay);
               $html = $liqpay->cnb_form(array(
                   'action'         => 'pay',
                   'amount'         => $book->price,
                   'currency'       => 'RUB',
                   'description'    => 'Покупка книги '. $book->name,
                   'order_id'       => $order->id,
                   'version'        => '3',
                   //'sandbox'        => '1',
               ));
               return view('pages.liqpay',[
                   'form'=>$html,
                   'cols'=>$cols,
                   'cats'=>$cats,
                   'book'=>$book,
                   'foot'=>$foot,
               ]);
           }
       }
    }

    public function acceptOrder(Request $request)
    {
        $sess = session()->get('order_id');
        if(isset($sess) && !empty($sess))
        {
            $liqpay = new LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));
            $res = $liqpay->api("request", array(
                'action'        => 'status',
                'version'       => '3',
                'order_id'      => $sess
            ));
            if(isset($res) && !empty($res)){
                $order = Order::find($sess);
                $order->payment_id = $res->payment_id;
                $order->result = $res->result;
                $order->paytype = $res->paytype;
                $order->liqpay_order_id = $res->liqpay_order_id;
                $order->description = $res->description;
                $order->ip = $res->ip;
                $order->summ = $res->amount;
                $order->currency = $res->currency;
                $order->save();
                return redirect('/');
            }

        }else{
            return redirect('/');
        }
    }
}
