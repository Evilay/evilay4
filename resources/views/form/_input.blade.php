@if (isset($label))
    <label for="basic-url">{{ $label ?? null }}</label>
@endif

<div class="input-group b-3">
    {{ Form::input($type ?? 'text',$name,$value ?? null,[
    'class'=>'form-control '.($errors->has($name) ? ' is-invalid ' : null),
    'required'=>$required ?? null,
    ]) }}


    @if($errors->has($name) === true)
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif
</div>




