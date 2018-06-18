<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Collection;
use App\FooterMenu;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        $cats = Category::all();
        $cols = Collection::all();
        $foot = FooterMenu::all();
        return view('auth.passwords.email',[
            'cats'=>$cats,
            'cols'=>$cols,
            'foot'=>$foot,
        ]);
    }
}
