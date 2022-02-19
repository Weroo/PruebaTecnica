<div style="border-bottom:1px solid black;">
    <div class="py-2 px-3 d-flex justify-content-between">
        <div>
            <p class="my-1"><strong>{{$autor}}</strong></p>
            <p class="my-1">{{$content}}</p>
        </div>
        <div class="d-flex align-items-center">
            <button type="button" class="mx-2 btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteCommentModal{{$id}}">Eliminar comentario</button>

            <div class="modal fade" id="deleteCommentModal{{$id}}" tab-index="-1" role="dialog" aria-labelledby="deleteCommentModal{{$id}}Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteCommentModal{{$id}}Label"><strong>Eliminar comentario</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>¿Está seguro de eliminar esta comentario?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <form method="POST" action="{{ route('comments.destroy', $id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Si
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="mx-2 btn btn-outline-primary btn-sm" data-toggle="collapse" data-target="#responseCollapse{{$id}}" aria-expanded="false" aria-controls="responseCollapse{{$id}}">
                Responder
            </button>
        </div>
    </div>

    <div id="nested_comments_list">
        @include('layouts.nested_comments_list', ['nested_comments_by_id' => $nested_comments_by_id])
    </div>

    <div class="collapse" id="responseCollapse{{$id}}">
        <div>
            @include('layouts.create_nested_comment_form', ['comment_id' => $id])
        </div>
    </div>
</div>
