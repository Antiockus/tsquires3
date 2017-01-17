@extends('layouts.app')

@section('title')
    Homepage
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center panel panel-default">
                <h2>Welcome to the Site!</h2>
                <p>This site was created for my portfolio. It is meant to showcase different skills and abilities
                    that I have learned over a period of study.</p>

            </div>
        </div>
        <div class="row">
            @if( count($posts) >= 1)
                @foreach($posts as $post)
                    <div class="card panel panel-default">
                        <div class="panel-body">

                            <h1><a href="{{url("/posts/$post->id")}}">{{ $post->title }}</a></h1>
                            <h4>{{ $post->created_by }}</h4>
                            <sub>{{ $post->published_at }}</sub>
                            <p>{!!  str_limit($post->body, 100, '...') !!}</p>
                        </div>
                    </div>
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