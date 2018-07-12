<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Chapter;
use App\Collection;
use App\FooterMenu;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LiqPay;

class ChaptersController extends Controller
{
   public function readChapter($book,$chapter)
   {
       if(isset($book) && !empty($book) && isset($chapter) && !empty($chapter))
       {
            $cats = Category::all();
            $cols = Collection::all();
            $foot = FooterMenu::all();
            $b = Book::find($book);
            if(isset($b) && !empty($b)){
                if($b->chapter_count > 0){
                    $chapters = $b->chapters($chapter)->get();
                    $chapter = Chapter::find($chapter);
                    $paybook = Order::where('book_id', $book)->where('result', 'success')->first();
                    if($chapter->number < $b->chapter_count || $paybook)
                    {
                        $out =  strip_tags($chapter->text,'<p><a><br>');
                        return view('pages.chapter',[
                            'page'=>$b,
                            'cols'=>$cols,
                            'cats'=>$cats,
                            'chapter'=>$chapters,
                            'chap'=>$out,
                            'foot'=>$foot
                        ]);
                    }else{
                        if(Auth::user()){
                            $order = new Order();
                            $order->user_id = Auth::user()->id;
                            $order->author_id = $b->author->id;
                            $order->book_id = $b->id;
                            $order->save();
                            $book = Book::find($b->id);
                            $cats = Category::all();
                            $cols = Collection::all();
                            if(isset($order) && isset($book) && !empty($book)){
                                session()->put('order_id', $order->id);
                                $liqpay = new LiqPay(env('LIQPAY_PUBLIC_KEY'),env('LIQPAY_PRIVATE_KEY'));
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
                                $out = "Доступ к данной главе только после покупки книги";
                                return view('pages.chapter',[
                                    'page'=>$b,
                                    'cols'=>$cols,
                                    'cats'=>$cats,
                                    'chapter'=>$chapters,
                                    'out'=>$out,
                                    'html'=>$html,
                                    'foot'=>$foot,
                                ]);
                            }
                        }else{
                            $out = "Доступ к данной главе только после покупки книги";
                            $html = '<a href="/login">войдите на сайт чтобы купить книгу</a>';
                            return view('pages.chapter',[
                                'page'=>$b,
                                'cols'=>$cols,
                                'cats'=>$cats,
                                'chapter'=>$chapters,
                                'out'=>$out,
                                'html'=>$html,
                                'foot'=>$foot
                            ]);
                        }

                    }
                }else{
                    $chapters = $b->chapters($chapter)->get();
                    $chapter = Chapter::find($chapter);
                    $out = strip_tags($chapter->text,'<p><a><br>');
                    return view('pages.chapter',[
                        'page'=>$b,
                        'cols'=>$cols,
                        'cats'=>$cats,
                        'chapter'=>$chapters,
                        'chap'=>$out,
                        'foot'=>$foot
                    ]);
                }

            }
       }
   }

   public function readBook($book)
   {
       if(isset($book) && !empty($book))
       {
           $cats = Category::all();
           $cols = Collection::all();
           $foot = FooterMenu::all();
           $chapters = false;
           $b = Book::find($book);
           if ($b->chapters()){
               $chapters = $b->chapters()->get();
           }
           $chapter = Chapter::where('book_id',$b->id)->first();

           $out = array();
           if(isset($chapter) && !empty($chapter)){
               /*if(strripos($chapter->text, '<div>') || strripos($chapter->text, '<p>')){
                   $out = explode("\n", $chapter->text);
               }else{
                   $chap =  preg_split("/[.?!] /", $chapter->text);
                   foreach($chap as $c)
                   {

                       $out[] = '<p>'.$c.'</p>'.chr(10);
                   }
               }*/
               $out =  strip_tags($chapter->text,'<p><a><br>');
               if(isset($b) && !empty($b))
               {
                   return view('pages.chapter',[
                       'page'=>$b,
                       'cols'=>$cols,
                       'cats'=>$cats,
                       'chapter'=>$chapters,
                       'chap'=>$out,
                       'foot'=>$foot
                   ]);
               }
           }

           if(isset($b) && !empty($b))
           {
               return view('pages.chapter',[
                   'page'=>$b,
                   'cols'=>$cols,
                   'cats'=>$cats,
                   'chapter'=>$chapters,
                   'chap'=>[0 =>'Глава не найдена'],
                   'foot'=> $foot,
               ]);
           }
       }
   }

}
