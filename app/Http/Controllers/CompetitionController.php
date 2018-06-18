<?php

namespace App\Http\Controllers;

use App\Category;
use App\Collection;
use App\Competition;
use App\CompetitionOrder;
use App\FooterMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompetitionController extends Controller
{
    public function getAll()
    {
        $com = Competition::all();
        $cats = Category::all();
        $cols = Collection::all();
        $foot = FooterMenu::all();

        if(Auth::user())
        {
            $user = Auth::user();
            return view('pages.competitions',[
                'cols'=>$cols,
                'cats'=>$cats,
                'foot'=>$foot,
                'com'=>$com,
                'user'=>$user,
            ]);
        }else{
            return view('pages.competitions',[
                'cols'=>$cols,
                'cats'=>$cats,
                'foot'=>$foot,
                'com'=>$com,
            ]);
        }

    }

    public function createOrder(Request $request)
    {
        if(isset($request) && !empty($request))
        {
            if(Auth::user()){
                $user = Auth::user();
                $exist = CompetitionOrder::where('user_id',$user->id)->where('book_id',$request->bookid)->get();
                if(isset($exist) && $exist->count() < 1){
                    $order = new CompetitionOrder();
                    $order->user_id = $user->id;
                    $order->book_id = $request->bookid;
                    $order->competition_id = $request->compid;
                    $order->save();
                }
                return redirect()->back();
            }else{
                return abort(403,'Access Denied');
            }
        }else{
            return abort(500,'Bad Request');
        }
    }

    public function getComp($id)
    {
        $cats = Category::all();
        $cols = Collection::all();
        $foot = FooterMenu::all();

        if(isset($id) && !empty($id))
        {
            $com = Competition::find($id);
            if(isset($com) && !empty($com))
            {
                if(Auth::user())
                {
                    $user = Auth::user();
                   // dd($com->books);
                    return view('pages.competition',[
                        'cols'=>$cols,
                        'cats'=>$cats,
                        'foot'=>$foot,
                        'com'=>$com,
                        'user'=>$user,
                    ]);
                }else{
                    return view('pages.competition',[
                        'cols'=>$cols,
                        'cats'=>$cats,
                        'foot'=>$foot,
                        'com'=>$com,
                    ]);
                }
            }else{
                return abort(404,'Not found');
            }

        }else{
            return abort(404,'Not Found');
        }

    }
}
