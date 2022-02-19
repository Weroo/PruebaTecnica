@extends('layouts.app')

@section('content')
    <div id="publication-form">
        <div class="py-4 d-flex justify-content-start">
            <a class="btn btn-primary" href="{{ route('home') }}">
                Inicio
            </a>
        </div>
        <div>
            <div class="row">
                <div class="col-12">
                    <h3>{{$publication->author}} <strong class="ml-3">{{$publication->title}}</strong></h3>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div>
                        <p>
                            {{$publication->body}}
                        </p>
                    </div>
                </div>
            </div>
            <hr style="background-color:black;">
            <div class="row my-4">
                <div class="col-12">
                    @include('layouts.comments_list', ['comments' => $comments, 'nested_comments' => $nested_comments])
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12">
                    @include('layouts.create_comment_form', ['publication_id' => $publication->id])
                </div>
            </div>
        </div>
        @if (session()->has('success_comment'))
            <div style="position:fixed;left:50%;transform:translate(-50%,-50%);bottom:15%;">
                <div class="alert alert-success w-md-50">{{ session('success_comment') }}</div>
            </div>
        @endif
    </div>
@endsection
