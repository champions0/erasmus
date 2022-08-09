{!! Form::label($name, $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $name))), ['class' => $required ?? '']) !!}
<div class="rating ">
    @for($i = 5; $i >= 1; $i--)
        <input type="radio" name="{{$name}}" value="{{$i}}" id="{{$i}}" {{(isset($value) && $i == $value) ? 'checked' : ''}}><label for="{{$i}}">☆</label>
    @endfor
</div>
{!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
