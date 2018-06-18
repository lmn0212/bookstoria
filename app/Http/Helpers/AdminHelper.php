<?php

namespace App\Http\Helpers;
class AdminHelper
{
   public static function getNotify()
    {
        $notify = array();
        if (\Illuminate\Support\Facades\Auth::user()){
            $user = \Illuminate\Support\Facades\Auth::user();
            $lib = $user->library;

            foreach ($lib as $item) {
                $not = \App\NotificationChapter::where('book_id', $item->book_id)->get();
                foreach ($not as $n)
                {
                    if(isset($n->message) && !empty($n->message))
                    {
                        $notify[] = $n;
                    }
                }
            }

        }
        return $notify;
    }
}
