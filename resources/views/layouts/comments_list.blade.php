<div class="my-3">
    <h4>Comentarios</h4>
    <div class="my-3">
        @if ($comments->isEmpty())
            <div class="text-center">
                <p>Aún no hay comentarios</p>
            </div>
        @else
            @foreach ($comments as $comment)
                <?php
                    $nested_comments_by_id = new Illuminate\Database\Eloquent\Collection();
                    foreach ($nested_comments as $nested_comment) {
                        for ($i=0; $i < $nested_comment->count(); $i++) {
                            $nested_comment_obj = $nested_comment[$i];
                            if ($nested_comment_obj->comment_id == $comment->id) {
                                $nested_comments_by_id->push($nested_comment_obj);
                            }
                        }
                    }
                ?>
                @include('components.comment', ['id' => $comment->id,
                                                'autor' => $comment->autor,
                                                'content' => $comment->content,
                                                'publication_id' => $comment->publication_id,
                                                'nested_comments_by_id' => $nested_comments_by_id])
            @endforeach
        @endif
    </div>
</div>
