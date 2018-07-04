<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Book;
use App\Category;
use App\Collection;
use App\Comment;
use App\FooterMenu;
use App\Order;
use App\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $cats = Category::all();
            $cols = Collection::all();
            $foot = FooterMenu::all();
            return view('home',[
                'cats'=>$cats,
                'cols'=>$cols,
                'foot'=>$foot
            ]);
        }
        return abort(403,'access denied');
    }

    public function getFront()
    {
        $books = Book::where('public','1')->orderBy('created_at', 'desc')->limit(10)->get();
        $booksup = Book::where('public','1')->whereHas('chapters')->orderBy('updated_at', 'desc')->limit(10)->get();
        $bookscomp = Book::where('public','1')->where('complete','1')->inRandomOrder()->limit(10)->get();
        $booksbest = Book::where('public','1')->whereHas('categories', function($q){
            $q->where('category_id', '30');
        })->limit(10)->get();
        //dd($booksbest);
        $com =  Book::has('comments')->get();
        //dd($com);
        $cats = Category::all();
        $banners = Banner::all();
        $cols =  Collection::all();
        $foot = FooterMenu::all();
        $tailer = Book::where('booktailer','!=',NULL)->get();
        foreach ($tailer as $t)
        {
            $t->booktailer = str_replace('youtu.be/','',$t->booktailer);
        }
        return view('welcome',[
            'books' => $books,
            'banners' => $banners,
            'cats'=>$cats,
            'cols'=>$cols,
            'tailer'=>$tailer,
            'booksup'=>$booksup,
            'bookscomp'=>$bookscomp,
            'com'=>$com,
            'bestsellers'=>$booksbest,
            'foot'=>$foot
        ]);
    }

    public function getPage($id)
    {
        if(isset($id) && !empty($id))
        {
            $page = Page::find($id);
            if(isset($page) && !empty($page))
            {
                $cats = Category::all();
                $cols = Collection::all();
                $foot = FooterMenu::all();
                return view('pages.page',[
                    'page'=>$page,
                    'cats'=>$cats,
                    'cols'=>$cols,
                    'foot'=>$foot
                ]);
            }else{
                return abort(404,'not found');
            }
        }
        return abort(404,'not found');
    }

    public function Statistic()
    {
        $cats = Category::all();
        $cols = Collection::all();
        $foot = FooterMenu::all();
        if(Auth::user())
        {
            $user = Auth::user();
            $book = Book::where('author_id',$user->id)->get();
            $day = Carbon::today();
            $week = $day->subWeek();
            $month = $day->subMonth();


            if(isset($book))
            {
                foreach ($book as $b) {

                    $views = Book::where('updated_at','>=',$day)->where('author_id',$user->id)->get();
                    $views1 = Book::where('updated_at','>=',$week)->where('author_id',$user->id)->get();
                    $views2 = Book::where('updated_at','>=',$month)->where('author_id',$user->id)->get();
                    $order = Order::where('created_at','>=',$day)->where('book_id',$b->id)->get();
                    $order1 = Order::where('created_at','>=',$week)->where('book_id',$b->id)->get();
                    $order2 = Order::where('created_at','>=',$month)->where('book_id',$b->id)->get();
                    $comment = Comment::where('created_at','>=',$day)->where('book_id',$b->id)->get();
                    $comment1 = Comment::where('created_at','>=',$week)->where('book_id',$b->id)->get();
                    $comment2 = Comment::where('created_at','>=',$month)->where('book_id',$b->id)->get();

                    $b->views_day = $views->count();
                    $b->views_week = $views1->count();
                    $b->views_month = $views2->count();

                    $b->order_day = $order->count();
                    $b->order_week = $order1->count();
                    $b->order_month = $order2->count();

                    $b->comment_day = $comment->count();
                    $b->comment_week = $comment1->count();
                    $b->comment_month = $comment2->count();
                }
                //dd($book);
                return view('pages.statistic',[
                    'book'=>$book,
                    'cats'=>$cats,
                    'foot'=>$foot,
                    'cols'=>$cols
                ]);
            }
        }else{
            return abort(403, 'Access Denied');
        }
    }

    public function myPurchases()
    {   $cats = Category::all();
        $cols = Collection::all();
        $foot = FooterMenu::all();
        if(Auth::user())
        {
            $user = Auth::user();
            return view('pages.purchases',[
                'cats'=>$cats,
                'cols'=>$cols,
                'user'=>$user,
                'foot'=>$foot,
            ]);
        }else{
            return abort(403, 'Access Denied');
        }
    }

    public function myFinance()
    {   $cats = Category::all();
        $cols = Collection::all();
        $foot = FooterMenu::all();
        if(Auth::user())
        {
            $user = Auth::user();
            $orders = Order::where('author_id', Auth::user()->id)->where('result', 'success')->get();
//            dd($orders);
            return view('pages.finance',[
                'orders'    => $orders,
                'cats'      => $cats,
                'cols'      => $cols,
                'user'      => $user,
                'foot'      => $foot,
            ]);
        }else{
            return abort(403, 'Access Denied');
        }
    }
}
