<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Publication extends Model
{
    public static function updateCommentsCount() {
        $publications = Publication::all();
        foreach ($publications as $publication) {
            $comments = Comment::where('publication_id', $publication->id)->get();
            $nested_comments = new Collection();
            $nested_comments_count = 0;
            foreach ($comments as $comment) {
                $nested_comments_temp = NestedComment::where('comment_id', $comment->id)->get();
                if ($nested_comments_temp->isNotEmpty()) {
                    $nested_comments_count += $nested_comments_temp->count();
                }
            }

            $publication->numComments = $comments->count() + $nested_comments_count;
            $publication->save();
        }
    }
}
