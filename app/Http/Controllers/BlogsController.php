<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use App\Comment;
use Session;
use App\TopBlog;
use Intervention\Image\Facades\Image as Image;
use Storage;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);

        return view('admin.create_blog')->withTopblogs($topblogs)->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::where('name', $request->category_name)->first();
        $blog = new Blog;
        $topblog = new TopBlog;
        $blog->category_id = $category['id'];
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->video = $request->video;
        $blog->image = $request->image;

        if ($request->hasFile('blog_image')) {
                    $image = $request->file('blog_image');
                    $filename = time() . '.' .$image->getClientOriginalExtension();
                    $location = public_path('img/'.$filename);
                    Image::make($image)->save($location);
                    $blog->image = $filename; 
                }        
        if ($request->hasFile('book')) {
                    $book = $request->file('book');
                    $filename = time() . '.' .$book->getClientOriginalExtension();
                    Storage::put($filename, file_get_contents($book));  
                    $blog->book = $filename; 
                }        
                $blog->save();
            if($request->check == 'true'){
                $topblog->id = $blog->id;
                $topblog->category_id = $category['id'];
                $topblog->title = $request->title;
                $topblog->body = $request->body;
                $topblog->video = $request->video;
                $topblog->image = $filename;

            if ($request->hasFile('blog_image')) {
                        $image = $request->file('blog_image');
                        $filename = time() . '.' .$image->getClientOriginalExtension();
                        $location = public_path('img/'.$filename);
                        Image::make($image)->save($location);
                        $topblog->image = $filename; 
                    }        
            if ($request->hasFile('book')) {
                        $book = $request->file('book');
                        $filename = time() . '.' .$book->getClientOriginalExtension();
                        Storage::put($filename, file_get_contents($book));  
                        $topblog->book = $filename; 
                    }        
                          $topblog->save();  

            }
                 
        return redirect()->route('blog.show',$blog->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $blog->increment('visit_count');
        $comments = Comment::where('blog_id', '=', $id)->orderBy('created_at', 'desc')->get();
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);

        return view('pages.details')->withTopblogs($topblogs)->withBlog($blog)->withComments($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $topblogs = BLog::orderBy('visit_count', 'desc')->paginate(10);
        $blog = Blog::find($id);
        $category = Category::where('id', $blog->category_id)->first();

        return view('admin.edit_blog')->withCategory($category)->withBlog($blog)->withTopblogs($topblogs)->withCategories($categories);

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

        $category = Category::where('name', $request->category_name)->first();

        $blog = Blog::find($id);
        $blog->category_id = $category['id'];
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->video = $request->video;
        if ($request->hasFile('blog_image')) {
                    $image = $request->file('blog_image');
                    $filename = time() . '.' .$book->getClientOriginalExtension();
                    $location = public_path('img/'.$filename);
                    Image::make($book)->save($location);

                    $blog->image = $filename; 
             }
        if ($request->hasFile('book')) {
                    $book = $request->file('book');
                    $filename = time() . '.' .$book->getClientOriginalExtension();
                    $location = public_path('books/'.$filename);
                    Image::make($book)->save($location);

                    $blog->book = $filename; 
                }        


        $blog->save();
        return redirect()->route('blog.show', $blog->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        $blog->delete();
        return redirect()->route('admin.dashboard');
    }
}
