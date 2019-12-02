@extends('adminlte::page')

@section('title', 'Quizz')

@section('content_header')
    <h1>Quizz</h1>
    @foreach($quizzs as $quizz)
        @include('components.card', ['quizz' => $quizz])
    @endforeach
@stop

