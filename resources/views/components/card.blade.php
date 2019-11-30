@foreach($quizzs as $quizz)
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{$quizz->label}}</h5>

        <p class="card-text">
            {{$quizz->overview}}
        </p>

        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>
@endforeach
