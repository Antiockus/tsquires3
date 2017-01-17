@extends('layouts.app')

@section('scripts')
    <script>
        $('document').on('click', '#clear_quick_form', function(){
            $('.form-field').val('');
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="pull-left">
                <a href="{{ url('/') }}">Posts</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                        <a href="{{ url('/create') }}">
                            <button class="btn btn-info btn-lg pull-right">Add Post</button>
                        </a>
                    </div>

                    <ul class="list-group">
                        @foreach($posts as $post)
                            <li class="list-group-item"><a href="{{ url("/posts/$post->id") }}">{{ $post->title
                            }}</a> <span class="pull-right">
                                    <a href=" {{ url("/edit/$post->id") }}">Edit</a>
                                    <a href="{{ url("/posts/delete/$post->id") }}">Delete</a>
                                </span></li>
                        @endforeach
                    </ul>
                    <span class="text-center">{{ $posts->links() }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url' => '/store']) !!}
                        <?= Form::hidden('quick_post', 'quick_post');?>
                        @include('partial.edit_fields')

	                    <?= Form::submit('Quick Post',['class' => 'btn btn-primary']); ?>
	                    <?= link_to('home', 'Cancel'); ?>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
