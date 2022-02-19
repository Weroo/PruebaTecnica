<div id="comment-form" class="my-3">
    <div class="row">
        <div class="col-md-8">
            <h4><strong>Agregar un comentario</strong></h4>
        </div>
    </div>
    <div>
        <form class="py-3" method="POST" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group text-center text-md-left">
                <input type="text" class="form-control" style="max-width:50%" id="autor" name="autor" value="{{ old('autor') }}" aria-describedby="autor" placeholder="Autor">
                @error('autor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <textarea class="form-control text-center text-md-left" style="max-width:50%;resize:none;" id="content" name="content" value="{{ old('content') }}" rows="3" cols="4" placeholder="Escribe tu comentario" style="resize:none;"></textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input type="hidden" id="publication_id" name="publication_id" value="{{$publication_id}}">
            </div>
            <div class="form-group">
                <div class="mt-4">
                    <button type="submit" class="btn btn-outline-success">Comentar</button>
                </div>
            </div>
        </form>
    </div>
</div>
