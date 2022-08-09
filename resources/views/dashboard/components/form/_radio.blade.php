<div class="form-group">
    {!! Form::label($name, $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $name))), ['class' => 'd-block ' . (isset($labelClass) ? $labelClass : '') . ' ' . ($required ?? '')]) !!}
    @foreach($values as $key => $value)
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                {!! Form::radio($name, $value , (isset($selected) && $selected == $value) ? true : false, ['class' => 'form-input-styled ' . (isset($inputClass) ? $inputClass : ''), 'data-fouc' => true, (isset($disabled) && $disabled) ? 'disabled' : '']) !!}
                {{$text[$key] ?? $value}}
            </label>
        </div>
    @endforeach
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
