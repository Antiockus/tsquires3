@extends('layouts.app')

@section('title')
    Update Post
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::model($post, ['url' => "update/$post->id", 'method' => 'PUT']) !!}
                @include('partial.edit_fields')
				<?= Form::submit( 'Update Post', [ 'class' => 'btn btn-primary' ] ); ?>
				<?= link_to( 'home', 'Cancel' ); ?>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection