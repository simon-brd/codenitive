@if($question->type == 'QCM')
<!-- general form elements disabled -->
<div class="card card-white">
    <input type="hidden" value="{{$question->id}}">
    <div class="card-header">
        <h3 class="card-title">{{$question->label}}</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="cbx1">
                <label class="form-check-label">La Chine</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="cbx2">
                <label class="form-check-label">L'Italie</label>
            </div>
        </div>
    </div>
</div>
@endif
<!-- /.card -->

