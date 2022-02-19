<div class="row justify-content-center my-2 py-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4>{{$author}}</h4>
                    <h4><strong>{{$title}}</strong></h4>
                </div>
                <div>
                    <a class="btn btn-outline-info btn-sm" href="{{ route('publications.show', $id) }}">
                        Ver publicación
                    </a>
                    <a class="btn btn-outline-success btn-sm" href="{{ route('publications.edit', $id) }}">
                        Editar
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$id}}">
                        Eliminar
                    </button>
                    <div class="modal fade" id="deleteModal{{$id}}" tabIndex="-1" role="dialog" aria-labelledby="deleteModal{{$id}}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="deleteModal{{$id}}Label"><strong>Eliminar publicación</strong></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>¿Está seguro de eliminar esta publicación?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form method="POST" action="{{ route('publications.destroy', $id) }}">
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
                </div>
            </div>
            <div class="card-body">
                <p style="max-height:7rem;overflow:hidden;">{{$body}}</p><span>...</span>
            </div>
            <div class="card-footer">
                <p class="text-right m-0">Numero de comentarios: <strong>{{$numComments}}</strong></p>
            </div>
        </div>
    </div>
</div>
