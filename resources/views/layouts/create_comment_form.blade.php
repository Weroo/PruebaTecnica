<div id="comment-form" class="my-3">
    <div class="row">
        <div class="col-md-8">
            <h4>Agregar un comentario</h4>
        </div>
    </div>
    <div>
        <form class="py-3" method="POST" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group text-center text-md-left">
                <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor') }}" aria-describedby="autor" placeholder="Autor">
                @error('autor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <textarea class="form-control text-center text-md-left" id="content" name="content" value="{{ old('content') }}" rows="10" cols="4" placeholder="Escribe tu comentario" style="resize:none;height:5rem;"></textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input type="hidden" id="publication_id" name="publication_id" value="{{$publication_id}}">
            </div>
            <div class="form-group">
                <div class="mt-4">
                    <button type="submit" class="btn btn-outline-dark">Comentar</button>
                </div>
            </div>
        </form>
    </div>
</div>
