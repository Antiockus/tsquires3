@extends('layouts.app')

@section('title')
    Homepage
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if( count($posts) >= 1)
                @foreach($posts as $post)
                    <h1><a href="{{url("/posts/$post->id")}}">{{ $post->title }}</a></h1>
                    <sub>{{ $post->published_at }}</sub>
                @endforeach
            @else
                <h1>No Posts Found</h1>
            @endif

        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection