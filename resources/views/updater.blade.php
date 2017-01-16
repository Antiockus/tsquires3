@extends('layouts.app')

@section('title')
    Update Post
@endsection

@section('scripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('content')
    <div class="container">
        {!! Form::model($post, ['url' => '/update/' . $post->id, 'method' => 'PUT']) !!}
        @include('partial.edit_fields')
        {!! Form::close() !!}
    </div>
@endsection