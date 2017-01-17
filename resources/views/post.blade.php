@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="pull-left">
                <a href="{{ url('/') }}">Posts</a>
            </div>
        </div>
        <div class="row">
            <h1>{{$post->title}}</h1>
            <h2>Created by: {{$post->created_by}}</h2>
            <date>{{$post->published_at}}</date>
            <p>{!!  $post->body !!}</p>
        </div>
    </div>
@endsection