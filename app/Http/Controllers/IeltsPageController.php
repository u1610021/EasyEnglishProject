<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Ielts;
use App\IeltsCategory;
class IeltsPageController extends Controller
{
    public function getIelts(){
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);
        $ielts = Ielts::orderBy('created_at', 'desc')->paginate(6);

        return view('pages.ielts.ieltspage')->withTopblogs($topblogs)->withIelts($ielts);        
    }

    public function getSpeaking(){
    	$speaking = Ielts::where('category_id', '=', 1)->orderBy('created_at', 'desc')->paginate(6);
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);
        
    	return view('pages.ielts.speaking')->withTopblogs($topblogs)->withSpeaking($speaking);
    }

    public function getListening(){
    	$listening = Ielts::where('category_id', '=', 2)->orderBy('created_at', 'desc')->paginate(6);
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);

    	return view('pages.ielts.listening')->withTopblogs($topblogs)->withListening($listening);
    }

    public function getReading(){
    	$reading = Ielts::where('category_id', '=', 3)->orderBy('created_at', 'desc')->paginate(6);
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);

    	return view('pages.ielts.reading')->withTopblogs($topblogs)->withReading($reading);
    }

    public function getWriting(){
    	$writing = Ielts::where('category_id', '=', 4)->orderBy('created_at', 'desc')->paginate(6);
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);

    	return view('pages.ielts.writing')->withTopblogs($topblogs)->withWriting($writing);
    }
}
