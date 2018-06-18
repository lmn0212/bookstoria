<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogComment;
use App\Category;
use App\Collection;
use App\FooterMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class BlogsController extends Controller
{
    public function myBlogs()
    {
        if(Auth::user())
        {
            $user = Auth::user();
            if(isset($user) && !empty($user))
            {
                $foot = FooterMenu::all();
                $cats = Category::all();
                $cols = Collection::all();
                $blogs = $user->blog;
                return view('pages.myblogs',[
                    'blogs'=>$blogs,
                    'cats'=>$cats,
                    'cols'=>$cols,
                    'foot'=>$foot,
                ]);
            }
        }else{
            return abort(404,'Not found');
        }
    }

    public function addBlog()
    {
        if(Auth::user())
        {
            $cats = Category::all();
            $cols = Collection::all();
            $foot = FooterMenu::all();
            return view('pages.addblog',[
                'cats'=>$cats,
                'cols'=>$cols,
                'foot'=>$foot,
            ]);
        }else{
            return abort(403,'Access Denied');
        }
    }

    public function addB(Request $request)
    {
        if(Auth::user())
        {
            if(isset($request) && !empty($request))
            {
                $blog = new Blog();
                $blog->name = $request->title;
                $blog->text = $request->text;
                $blog->public = '1';
                $blog->count_views = '0';
                if ($request->hasfile('cover')){
                    $image = $request->file('cover');
                    $filename  = time() . rand() . '.' . $image->getClientOriginalExtension();
                    $location = public_path('images/covers/' . $filename);
                    Image::make($image)->save($location);
                    $blog->cover = 'images/covers/' . $filename;
                }
                $blog->user_id = Auth::user()->id;
                $blog->tags = $request->tags;
                $blog->save();
                return redirect('/myblogs');
            }
        }else{
            return abort(403,'Access Denied');
        }
    }


    public function getBlogs()
    {
        $cats = Category::all();
        $cols = Collection::all();
        $blogs = Blog::all();
        $foot = FooterMenu::all();
        return view('pages.blogs',[
            'cats'=>$cats,
            'cols'=>$cols,
            'blogs'=>$blogs,
            'foot'=> $foot
        ]);
    }

    public function getBlog($id)
    {
        if(isset($id) && !empty($id))
        {
            $cats = Category::all();
            $cols = Collection::all();
            $blog = Blog::find($id);
            $foot = FooterMenu::all();
            if(isset($blog) && !empty($blog)){
                $blog->count_views = $blog->count_views + 1;
                $blog->save();
            }
            if(isset($blog) && !empty($blog))
            {
                return view('pages.blog',[
                    'cats'=>$cats,
                    'cols'=>$cols,
                    'blog'=>$blog,
                    'foot'=>$foot
                ]);
            }
        }else{
            return abort(404,'Not found');
        }
    }

    public function addComment(Request $request)
    {
        if(Auth::check()){
            if(isset($request) && !empty($request->comment) && !empty($request->blog)){
                $comment = new BlogComment();
                $comment->text = $request->comment;
                $comment->blog_id = $request->blog;
                $comment->user_id = Auth::user()->id;
                $comment->save();
                return redirect()->back();
            }
        }else{
            return abort(403,'Access denied');
        }
    }

    public function editBlog($id)
    {
        $cats = Category::all();
        $cols = Collection::all();
        $foot = FooterMenu::all();
        if(isset($id) && !empty($id) && Auth::user()) {
            $blog = Blog::find($id);
            $user = Auth::user();
            if (isset($blog) && !empty($blog) && $user->id == $blog->user_id)
            {
                return view('pages.blogedit',[
                    'cats'=>$cats,
                    'cols'=>$cols,
                    'blog'=>$blog,
                    'foot'=>$foot
                ]);
            }else{
                return abort(403,'Access Denied');
            }
        }else{
            return abort(403,'Access Denied');
        }
    }

    public function blogEdited(Request $request)
    {
        if(Auth::user() && isset($request) && !empty($request))
        {
            $user = Auth::user();
            $blog = Blog::find($request->id);
            if(isset($blog) && !empty($blog) && $blog->user_id == $user->id)
            {
                $blog->name = $request->title;
                $blog->text = $request->text;
                $blog->public = '1';
                if ($request->hasfile('cover')){
                    $image = $request->file('cover');
                    $filename  = time() . rand() . '.' . $image->getClientOriginalExtension();
                    $location = public_path('images/covers/' . $filename);
                    Image::make($image)->save($location);
                    $blog->cover = 'images/covers/' . $filename;
                }
                $blog->user_id = Auth::user()->id;
                $blog->tags = $request->tags;
                $blog->save();
                return redirect('/myblogs');
            }else{
                return abort(403,'Access Denied');
            }
        }else{
            return abort(403,'Access Denied');
        }

    }

    public function deleteBlog($id)
    {
        if(Auth::user() && isset($id) && !empty($id))
        {
            $user = Auth::user();
            $blog = Blog::find($id);
            if(isset($blog) && !empty($blog) && $blog->user_id == $user->id)
            {
                $blog->delete();
                return redirect()->back();
            }else{
                return abort(403,'Access Denied');
            }

        }else{
            return abort(403,'Access Denied');
        }
    }
}
