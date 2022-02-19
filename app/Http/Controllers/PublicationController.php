<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Publication;
use App\Comment;
use App\NestedComment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Publication::updateCommentsCount();
        $publications = Publication::all();
        return view('layouts.publications_list', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.create_publication_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PublicationRequest  $publicationRequest
     * @return \Illuminate\Http\Response
     */
    public function store(PublicationRequest $publicationRequest)
    {
        $publication = new Publication();
        $publication->author = $publicationRequest->author;
        $publication->title = $publicationRequest->title;
        $publication->body = $publicationRequest->body;
        $publication->numComments = 0;
        $publication->save();

        return redirect()->route('home')->with('success','Se ha agregado su publicación');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication = Publication::findOrFail($id);
        $comments = Comment::where('publication_id', $id)->orderBy('created_at')->get();
        $nested_comments = new Collection();
        foreach ($comments as $comment) {
            $nested_comments->push(NestedComment::where('comment_id', $comment->id)->orderBy('created_at')->get());
        }

        return view('layouts.show_publication', compact('publication','comments','nested_comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publication = Publication::findOrFail($id);
        return view('layouts.edit_publication_form', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PublicationRequest  $publicationRequest
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicationRequest $publicationRequest, $id)
    {
        $publication = Publication::findOrFail($id);
        $publication->author = $publicationRequest->author;
        $publication->title = $publicationRequest->title;
        $publication->body = $publicationRequest->body;
        $publication->save();

        return redirect()->route('home')->with('success','Se ha editado la publicación');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->delete();
        return back()->with('success','Se ha eliminado la publicación');
    }
}
