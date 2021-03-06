
<div class="card bg-white collapsed-card quizz {{implode(' ',array_map(function($item){return substr($item,1);},$quizz->tags()))}}">
    <div class="card-header"   data-card-widget="collapse" style="cursor: pointer">
        <h5 class="card-title">
            {{$quizz->titleWithoutHashtag()}}

        </h5>
        <div class="card-tools">
            @foreach($quizz->tags() as $tag)
                <span class="badge bg-green tagFilter" style="cursor: pointer">
                 {{$tag}}
                </span>
            @endforeach
                <button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button>
        </div>
    </div>
    <div class="card-body" style="display: none;">
        <div class="row">
            <div class="col-10">
                <p class="card-text">
                    {{$quizz->overview}}
                </p>
            </div>
            <div class="col-2" style="text-align: right">
                <form action="/quizz/{{$quizz->id}}">
                    <button type="submit" class="btn btn-primary btn-sm">Commencer <i class="fas fa-chevron-right" style="margin-left: 5px"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
