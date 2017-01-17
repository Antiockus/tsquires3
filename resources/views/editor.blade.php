@extends('layouts.app')

@section('title')
    Editor
@endsection

{{--@section('content')--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--@if($post)--}}
{{--<form action="{{ url('/update') }}" method="POST">--}}
{{--@else--}}
{{--<form action="{{ url('/store') }}" method="POST">--}}
{{--@endif--}}
{{--@if($post)--}}
{{--{{ method_field('PUT') }}--}}
{{--@endif--}}
{{--{{ csrf_field() }}--}}
{{--<div class="form-group">--}}
{{--<label for="title">Title</label>--}}
{{--<input class="form-control" type="text" name="title" id="title" @if($post)--}}
{{--value="{{ $post->title }}" @endif/>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="created_by">Author</label>--}}
{{--@if($post->id)--}}
{{--<input type="text" name="created_by" id="created_by" value="{{ $post->created_by }}"--}}
{{--readonly/>--}}
{{--@else--}}
{{--<select class="form-control" name="created_by" id="created_by">--}}
{{--@foreach($users as $user)--}}
{{--<option value="{{$user->name}}">{{$user->name}}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--@endif--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="body">Content</label>--}}
{{--<br>--}}
{{--<textarea class="form-control" name="body" id="body">--}}
{{--@if($post)--}}
{{--{{ $post->body }}--}}
{{--@endif--}}
{{--</textarea>--}}
{{--</div>--}}
{{--<input type="submit" value="Save Post"/>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::model($user, ['url' => '/store']) !!}
                @include('partial.edit_fields')
				<?= Form::submit( 'Save Post', [ 'class' => 'btn btn-primary' ] ); ?>
				<?= link_to( 'home', 'Cancel' ); ?>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection