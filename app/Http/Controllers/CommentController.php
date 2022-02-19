<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Publication;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $commentRequest)
    {
        $comment = new Comment();
        $comment->autor = $commentRequest->autor;
        $comment->content = $commentRequest->content;
        $comment->publication_id = $commentRequest->publication_id;
        $comment->save();

        return back()->with('success','Se ha agregado su comentario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back()->with('success_comment','Se ha eliminado el comentario');
    }
}
