<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\IeltsCategory;
use App\Ielts;
use App\IeltsComments;
use Intervention\Image\Facades\Image as Image;

class IeltsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);
        $ielts = Ielts::orderBy('created_at', 'desc')->paginate(6);
        return view('pages.ielts.ieltspage')->withTopblogs($topblogs)->withIelts($ielts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = IeltsCategory::all();
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);

        return view('admin.create_ielts_blog')->withTopblogs($topblogs)->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = IeltsCategory::where('name', '=', $request->category_name)->first();
        $blog = new Ielts;

        $blog->category_id = $category['id'];
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->image = $request->image;

        if ($request->hasFile('blog_image')) {
                    $image = $request->file('blog_image');
                    $filename = time() . '.' .$image->getClientOriginalExtension();
                    $location = public_path('img/'.$filename);
                    Image::make($image)->save($location);

                    $blog->image = $filename; 
                }        

        $blog->save();

        return redirect()->route('ielts.show',$blog->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = IeltsComments::where('ielts_id', '=', $id)->orderBy('created_at', 'desc')->get();        
        $ielts = Ielts::find($id);
        $ielts->increment('visit_count');
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);

        return view('pages.ielts.details')->withTopblogs($topblogs)->withIelts($ielts)->withComments($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = IeltsCategory::all();
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);
        $ielts = Ielts::find($id);
        $category = IeltsCategory::where('id', $ielts->category_id)->first();

        return view('admin.edit')->withCategory($category)->withIelts($ielts)->withTopblogs($topblogs)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, array(
            'title' => 'required|max:255|min:5',
            'body' => 'required'
        ));

        $category = IeltsCategory::where('name', $request->category_name)->first();

        $ielts = Ielts::find($id);
        $ielts->category_id = $category['id'];
        $ielts->title = $request->title;
        $ielts->body = $request->body;

        if ($request->hasFile('blog_image')) {
                    $image = $request->file('blog_image');
                    $filename = time() . '.' .$image->getClientOriginalExtension();
                    $location = public_path('img/'.$filename);
                    Image::make($image)->save($location);

                    $ielts->image = $filename; 
             }        

        $ielts->save();
        return redirect()->route('ielts.show', $ielts->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ielts = Ielts::find($id);

        $ielts->delete();
        return redirect()->route('admin.ielts');
    }
}
