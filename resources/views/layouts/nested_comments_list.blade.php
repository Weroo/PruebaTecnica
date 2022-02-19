<div class="pl-5">
    @if ($nested_comments_by_id->isNotEmpty())
        @foreach ($nested_comments_by_id as $nested_comment_by_id)
            @include('components.nested-comment', ['id' => $nested_comment_by_id->id,
                                                    'autor' => $nested_comment_by_id->autor,
                                                    'content' => $nested_comment_by_id->content,
                                                    'comment_id' => $nested_comment_by_id->comment_id])
        @endforeach
    @endif
</div>
