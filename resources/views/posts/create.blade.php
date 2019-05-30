@extends('layouts.app')

@section('content')
    <h3> Create Post</h3>
    {{--below enctype is form-data for images and data only for normal integers--}}
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Title'])}}
    </div>

    {{--cover image portion--}}
    <div class="form-group">
        {{Form::file('cover_images')}}
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}﻿

@endsection
