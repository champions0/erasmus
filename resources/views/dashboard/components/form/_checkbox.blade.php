<div class="form-group">
    <div class="d-flex align-items-center">
        {!! Form::label($name, __(ucfirst(str_replace('_', ' ', $name))), ['class' => (isset($labelClass) ? $labelClass : '') . ' ' . ($required ?? '')]) !!}
        <span class="kt-switch kt-switch--icon mr-3 ml-3">
        <label>
            {!! Form::checkbox($name, $value ?? 1, $checked ?? false, ['class' => 'form-input-styled ' . (isset($inputClass) ? $inputClass : '')]); !!}
            <span></span>
        </label>
    </span>
    </div>
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>

