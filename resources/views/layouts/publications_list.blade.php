@extends('layouts.app')

@section('content')
    <div id="publications-list">
        <div class="py-4 d-flex justify-content-end">
            <a class="btn btn-primary" href="{{ route('publications.create') }}">
                Nueva publicación
            </a>
        </div>

        @if ($publications->isEmpty())
            <div class="text-center">
                <p>Por el momento no hay publicaciones</p>
            </div>
        @else
            @foreach ($publications as $publication)
                @include('components.publication-card', ['id' => $publication->id,
                                                        'author' => $publication->author,
                                                        'title' => $publication->title,
                                                        'body' => $publication->body,
                                                        'numComments' => $publication->numComments])
            @endforeach
        @endif



        @if (session()->has('success'))
            <div style="position:fixed;left:50%;transform:translate(-50%,-50%);bottom:15%;">
                <div class="alert alert-success w-md-50">{{ session('success') }}</div>
            </div>
        @endif
    </div>
@endsection
