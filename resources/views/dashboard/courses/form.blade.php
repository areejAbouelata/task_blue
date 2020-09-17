<div class="form-group">
    <label for="">name</label>
    {!! Form::text('name',$item->name,[
        'class' => 'form-control',
        'placeholder' => 'name'
    ]) !!}
</div>
<div class="form-group">
    <label for="">description </label>
    {!! Form::text('description',$item->description,[
        'class' => 'form-control',
        'placeholder' => 'description'
    ]) !!}
</div>
<div class="form-group">
    <label for="">max </label>
    {!! Form::text('max',$item->max,[
        'class' => 'form-control',
        'placeholder' => 'max '
    ]) !!}
</div>
