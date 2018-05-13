<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Ielts;
use App\Comment;
use App\TopBlog;
class PagesController extends Controller
{
    public function getIndex(){ 
        $ielts = Ielts::orderBy('created_at', 'desc')->first();
        $grammar = Blog::where('category_id', '=', 5)->orderBy('created_at', 'desc')->first();
        $videos = Blog::where('category_id', '=', 7)->orderBy('created_at', 'desc')->first();
        $books = Blog::where('category_id', '=', 6)->orderBy('created_at', 'desc')->first();
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);
        $carousels = TopBlog::orderBy('created_at', 'desc')->paginate(5); 

    	return view('pages.home')->withCarousels($carousels)->withTopblogs($topblogs)->withIelts($ielts)->withGrammar($grammar)->withVideos($videos)->withBooks($books);
    }
    
    public function getGrammar(){
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);
        $grammars = Blog::where('category_id', '=', 5)->orderBy('created_at', 'desc')->paginate(6);
    	return view('pages.grammar')->withTopblogs($topblogs)->withGrammars($grammars);
    }

    public function getBooks(){
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);
        $books = Blog::where('category_id', '=', 6)->orderBy('created_at', 'desc')->paginate(6);
    	return view('pages.book')->withTopblogs($topblogs)->withBooks($books);
    }

    public function getVideos(){
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);
        $videos = Blog::where('category_id', '=', 7)->orderBy('created_at', 'desc')->paginate(6);
    	return view('pages.videos')->withTopblogs($topblogs)->withVideos($videos);
    }

    public function getDownload($file){
        $path = storage_path('app/'. $file);
        return response()->download($path);        
    }
}
