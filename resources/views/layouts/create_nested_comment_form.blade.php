<div>
    <form class="py-3" method="POST" action="{{ route('nested_comments.store') }}">
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
            <input type="hidden" id="comment_id" name="comment_id" value="{{$comment_id}}">
        </div>
        <div class="form-group">
            <div class="mt-4">
                <button type="submit" class="btn btn-outline-success">Enviar respuesta</button>
            </div>
        </div>
    </form>
</div>
