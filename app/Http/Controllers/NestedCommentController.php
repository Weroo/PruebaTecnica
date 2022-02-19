<?php

namespace App\Http\Controllers;

use App\Http\Requests\NestedCommentRequest;
use App\NestedComment;
use Illuminate\Http\Request;

class NestedCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\NestedCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NestedCommentRequest $nestedCommentRequest)
    {
        $nestedComment = new NestedComment();
        $nestedComment->autor = $nestedCommentRequest->autor;
        $nestedComment->content = $nestedCommentRequest->content;
        $nestedComment->comment_id = $nestedCommentRequest->comment_id;
        $nestedComment->save();

        return back()->with('success_comment','Se ha agregado su respuesta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nestedComment = NestedComment::findOrFail($id);
        $nestedComment->delete();
        return back()->with('success_comment','Se ha eliminado la respuesta');
    }
}
