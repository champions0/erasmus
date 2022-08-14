<div class="form-group">
    <div class="position-relative">
        {!! Form::label($name, $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $name))), ['class' => (isset($labelClass) ? $labelClass : '') . ' ' . ($required ?? '')]) !!}
        {!! Form::text($name, $inputValue ?? '', ['id' => $name, 'class' => 'form-control ' . (isset($inputClass) ? $inputClass : ''), 'readonly' => $readonly ?? false, 'placeholder' => $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $name)))]) !!}
    </div>
    {!! $errors->first(str_replace(']', '', str_replace('[', '.', $name)), '<span class="form-text text-danger">:message</span>') !!}
</div>
