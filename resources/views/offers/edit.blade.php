@extends('layouts.app')

@section('content')
    <h3> Edit Offer</h3>
    {!! Form::open(['action' => ['OffersController@update',$offer->id], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$offer->title,['class'=>'form-control','placeholder'=>'Title'])}}
    </div>

    <div class="form-group">
        {{Form::label('location','Location')}}
        {{Form::text('location',$offer->location,['class'=>'form-control','placeholder'=>'Location'])}}
    </div>

    <div class="form-group">
        {{Form::label('itinerary','Itinerary')}}
        {{Form::textarea('itinerary',$offer->itinerary,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Itinerary'])}}
    </div>

    <div class="form-group">
        {{Form::label('essential_info','Essential_info')}}
        {{Form::textarea('essential_info',$offer->essential_info,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Essential_info'])}}
    </div>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}﻿

@endsection
