@extends('layouts.app')

@section('content')
    <h3> Create Offers</h3>
    {!! Form::open(['action' => 'OffersController@store', 'method' => 'POST','enctype'=>'multipart/data']) !!}

    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
    </div>

    <div class="form-group">
        {{Form::label('location','Location')}}
        {{Form::text('location','',['class'=>'form-control','placeholder'=>'Location'])}}
    </div>

    <div class="form-group">
        {{Form::label('itinerary','Itinerary')}}
        {{Form::textarea('itinerary','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Title'])}}
    </div>

    <div class="form-group">
        {{Form::label('essential_info','Essential_info')}}
        {{Form::textarea('essential_info','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Essential_info'])}}
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}﻿

@endsection
