<?php

namespace App\Http\Middleware;

use App\Chapter;
use App\NotificationChapter;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class NotifyChapter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()){
           $user = Auth::user();
           $lib = $user->library;
           $notify = array();
           foreach ($lib as $item) {
             $notify[] = NotificationChapter::where('book_id',$item->book_id)->get();
           }
           //dd($notify);
            $response = $next($request);
            return $response;
        }


    }
}
