<div>
    <div class="py-2 px-3 d-flex justify-content-between">
        <div>
            <p class="my-1"><strong>{{$autor}}</strong></p>
            <p class="my-1">{{$content}}</p>
        </div>
        <div class="d-flex align-items-center">
            <button type="button" class="mx-2 btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#deleteNestedCommentModal{{$id}}">Eliminar respuesta</button>

            <div class="modal fade" id="deleteNestedCommentModal{{$id}}" tab-index="-1" role="dialog" aria-labelledby="deleteNestedCommentModal{{$id}}Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteNestedCommentModal{{$id}}Label">Eliminar respuesta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>¿Está seguro de eliminar esta respuesta?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <form method="POST" action="{{ route('nested_comments.destroy', $id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">
                                    Si
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
