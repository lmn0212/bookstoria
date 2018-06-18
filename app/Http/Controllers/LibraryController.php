<?php

namespace App\Http\Controllers;

use App\Category;
use App\Collection;
use App\FooterMenu;
use App\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psr\Log\NullLogger;

class LibraryController extends Controller
{
    public function add($id)
    {
        if(isset($id) && !empty($id))
        {
            if(Auth::check())
            {
                $exist = Library::where('book_id',$id)->where('user_id',Auth::user()->id)->count();
                //dd($exist);
                if(isset($exist) && $exist == '0')
                {
                    //dd($exist);
                    $lib = new Library();
                    $lib->user_id = Auth::user()->id;
                    $lib->book_id = $id;
                    $lib->save();
                    return redirect()->back();
                }else{
                    return redirect()->back();
                }
            }
            return abort(403,'access denied');

        }
    }

    public function libraryGet()
    {
        $user= Auth::user();
        if(isset($user) && !empty($user))
        {
            $cats = Category::all();
            $cols = Collection::all();
            $foot = FooterMenu::all();
            $lib = Library::where('user_id',$user->id)->get();
            if(isset($lib) && !empty($lib))
            {
                return view('pages.library',[
                    'cols'=>$cols,
                    'cats'=>$cats,
                    'lib'=>$lib,
                    'user'=>$user,
                    'foot'=>$foot,
                ]);
            }

        }
    }

    public function delete($id)
    {
        if(Auth::check()){
            if(isset($id) && !empty($id))
            {
                $user = Auth::user();
                $lib = Library::where('user_id',$user->id)->where('book_id',$id)->first();
                //dd($lib);
                if(isset($lib) && !empty($lib))
                {
                    $lib->delete();
                    return redirect()->back();
                }
            }else{
                abort(403,'Access denied');
            }
        }
    }
}
