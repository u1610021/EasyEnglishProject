<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ielts;
use App\IeltsComments;

class IeltsCommentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ielts_id)
    {
        $blog = Ielts::find($ielts_id);

        $comment = new IeltsComments();
        $comment->name = $request->name;
        $comment->body = $request->comment;
        $comment->ielts()->associate($blog);

        $comment->save();

        return redirect()->route('ielts.show', $blog->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ielts = IeltsComments::find($id);

        $ielts->delete();
        return redirect()->route('admin.ieltscomments');
    }
}
