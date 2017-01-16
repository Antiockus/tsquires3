@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <div class="pull-left">
            <a href="{{ url('/') }}">Posts</a>
        </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                    <a href="{{ url('/create') }}">
                        <button>Add Post</button>
                    </a>
                    <ul>
                        @foreach($posts as $post)
                            <li><a href="{{ url("/posts/$post->id") }}">{{ $post->title }}</a> <a href=" {{ url("/edit/$post->id") }}">Edit</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
