@extends('layouts.app')

@section('content')
    <div id="publication-form">
        <div class="py-4 d-flex justify-content-start">
            <a class="btn btn-primary" href="{{ route('home') }}">
                Inicio
            </a>
        </div>
        <div class="row justify-content-center my-2 py-2">
            <div class="col-md-8 text-center">
                <h2>Editar publicación</h2>
            </div>
        </div>
        <div class="my-2 py-2">
            <form class="py-3" method="POST" action="{{ route('publications.update', $publication->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group text-center text-md-left">
                    <input type="text" class="form-control" id="author" name="author" value="{{ $publication->author }}" aria-describedby="author" placeholder="Autor">
                    @error('author')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text-center text-md-left">
                    <input type="text" class="form-control" id="title" name="title" value="{{ $publication->title }}" aria-describedby="title" placeholder="Título de la publicación">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control text-center text-md-left" id="body" name="body" value="{{ $publication->body }}" rows="10" placeholder="Cuerpo de la publicación" style="resize:none;">{{ $publication->body }}</textarea>
                    @error('body')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="mt-5 text-center d-flex justify-content-around">
                        <a class="btn btn-outline-dark" href="{{ route('home') }}">Cancelar</a>
                        <button type="submit" class="btn btn-outline-dark">Publicar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
