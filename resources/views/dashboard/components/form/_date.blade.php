<div class="form-group">
    <div class="position-relative">
        {!! Form::label($name, $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $displayName ?? $name))), ['class' => (isset($labelClass) ? $labelClass : '') . ' ' . ($required ?? '')]) !!}
        {!! Form::text($name, $inputValue ?? '', ['id' => $name, 'class' => 'form-control ' . (isset($inputClass) ? $inputClass : ''), 'placeholder' => __(ucfirst(str_replace('_', ' ', $displayName ?? $name))), 'autocomplete' => 'off', 'readonly' => 'true']) !!}
        <button type="button" class="dataInput__clear">&times;</button>
    </div>
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
<script>
    $('#{{$name}}').datepicker({
        format: "yyyy-mm-dd",
        orientation: '{{ $position ?? 'bottom' }}',
        autoclose: true,
    });

    $('.input_item').on('change', function () {
        if ($(this).closest('.position-relative').find('.input_item')) {
            $(this).closest('.position-relative').find('.dataInput__clear').css('display', 'block');
        }
    });

    $('.dataInput__clear').on('click', function () {
        $(this).closest('.position-relative').find('.input_item').val('');

        if ($(this).closest('.position-relative').find('.input_item').val('')) {
            $(this).closest('.position-relative').find('.dataInput__clear').css('display', 'none');
        }
    });
</script>
