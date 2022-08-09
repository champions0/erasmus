<div class="form-group">
    {!! Form::label($name, $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $name))), ['class' => (isset($labelClass) ? $labelClass : '') . ' ' . ($required ?? '')]) !!}
    {!! Form::text($name, $inputValue ?? '', ['id' => str_replace(['[', ']'] , '_', $name), 'class' => 'form-control ' . (isset($inputClass) ? $inputClass : ''), 'autocomplete' => 'off', 'placeholder' => $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $name)))]) !!}
    {!! $errors->first(str_replace('[', '.', str_replace(']' , '', $name)), '<span class="form-text text-danger">:message</span>') !!}
</div>
<script>
    $('#{{str_replace(['[', ']'] , '_', $name)}}').datetimepicker({
        format: "yyyy-mm-dd hh:ii",
        autoclose: true,
        startDate: new Date(),
        hoursDisabled: '0,1,2,3,4,5,6,7,8,9,20,21,22,23'
    });
</script>
