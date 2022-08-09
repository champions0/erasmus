<div class="form-group">
    <div class="position-relative">
        {!! Form::label($name, $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $name))), ['class' => (isset($labelClass) ? $labelClass : '') . ' ' . ($required ?? '')]) !!}
        {!! Form::select((isset($multiple) && $multiple) ? $name . '[]' : $name, $data, $selected ?? null, ['id' => $name, 'class' => ['form-control ', $addedClass ?? '' . (isset($inputClass) ? $inputClass : '')], 'multiple' => $multiple ?? false]) !!}
    </div>
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
@if(isset($select_2) && $select_2 == true)
<script>
    $('#{{$name}}').select2();
</script>
@endif
