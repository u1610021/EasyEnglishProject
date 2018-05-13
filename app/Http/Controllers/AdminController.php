<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ielts;
use App\Blog;
use App\Comment;
use App\IeltsComments;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function listening(){
        $ielts = Ielts::where('category_id', '=', 2)->orderBy('created_at', 'desc')->get();
        return view('admin.sidebar.ielts')->withIelts($ielts);
    }

    public function speaking(){
        $ielts = Ielts::where('category_id', '=', 1)->orderBy('created_at', 'desc')->get();

        return view('admin.sidebar.ielts')->withIelts($ielts);
    }

    public function reading(){
        $ielts = Ielts::where('category_id', '=', 3)->orderBy('created_at', 'desc')->get();

        return view('admin.sidebar.ielts')->withIelts($ielts);
    }

    public function writing(){
        $ielts = Ielts::where('category_id', '=', 4)->orderBy('created_at', 'desc')->get();

        return view('admin.sidebar.ielts')->withIelts($ielts);
    }


    public function grammar(){
        $grammar = Blog::where('category_id', '=', 5)->orderBy('created_at', 'desc')->get();
        return view('admin.sidebar.grammar')->withGrammar($grammar);               
    }

    public function video(){
        $video = Blog::where('category_id', '=', 7)->orderBy('created_at', 'desc')->get();
        return view('admin.sidebar.videos')->withVideo($video);               
    }

    public function book(){
        $book = Blog::where('category_id', '=', 6)->orderBy('created_at', 'desc')->get();
        return view('admin.sidebar.books')->withBook($book);               
    }

    public function blogcomments(){
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('admin.sidebar.blog_comments')->withComments($comments);
    }

    public function ieltscomments(){
        $comments = IeltsComments::orderBy('created_at', 'desc')->get();
        return view('admin.sidebar.ielts_comments')->withComments($comments);
    }

}
