<div class="form-group">
    <div class="position-relative">
        {!! Form::label($name, $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $name))), ['class' => (isset($labelClass) ? $labelClass : '') . ' ' . ($required ?? '')]) !!}
        {!! Form::number($name, $inputValue ?? null, ['id' => $name,'hidden' => $hidden ?? false, 'class' => 'form-control ' . (isset($inputClass) ? $inputClass : ''), 'placeholder' => $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $name)))]) !!}
    </div>
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
