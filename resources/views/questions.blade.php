@extends('adminlte::page')

@section('title', 'Questions')

@section('content_header')
    <h1>Questions</h1>
    @foreach($questions as $question)
        @include('components.question',['question'=>$question])
    @endforeach
@stop
