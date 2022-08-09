<div class="form-group">
    {!! Form::label($name, __(ucfirst(str_replace('_', ' ', $name))), ['class' => (isset($labelClass) ? $labelClass : '') . ' ' . ($required ?? '')]) !!}
    {!! Form::text($name, $inputValue ?? '', ['id' => $name, 'autocomplete' => 'off', 'class' => 'form-control daterange ' . (isset($inputClass) ? $inputClass : '') , 'placeholder' => __(ucfirst(str_replace('_', ' ', $name)))]) !!}
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
<script>
    $('.daterange').daterangepicker({
        "locale": {
            "format": "YYYY-MM-DD",
            "separator": "/",
            "applyLabel": "Apply",
            "firstDay": 1,
            "autoUpdateInput": false
        }
    })
</script>
