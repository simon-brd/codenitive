@extends('adminlte::page')

@section('title', 'Questions')

@section('content_header')
    <h1>Questions</h1>
    <form role="form" method="post" action="quizz/{{$quizz->id}}/validate">
    @foreach($questions as $question)
        @include('components.question',['question'=>$question])
    @endforeach
        <button class="btn btn-primary" type="submit">VALIDER</button>
    </form>
@stop
