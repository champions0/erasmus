
@foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key => $value)
    @php
        if (substr($name, -3) == '_' . $key) {

            $labelDisplayName = ucfirst(str_replace('_', ' ', preg_replace('/' . $key . '$/', '', $name)));
        }
    @endphp
@endforeach

<div class="form-group">
    <div class="position-relative">
        {!! Form::label($name, $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $name))), ['class' => (isset($labelClass) ? $labelClass : '') . ' ' . ($required ?? '')]) !!}
        {!! Form::textarea($name, $inputValue ?? null, ['id' => $name, 'class' => 'form-control ' . (isset($inputClass) ? $inputClass : ''), 'rows' => $rows ?? 5, 'placeholder' => $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $name)))]) !!}
    </div>
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
@if(isset($editor) && $editor == true)
    <script>

    CKEDITOR.replace('{{$name}}' , {
        allowedContent: true,
        filebrowserUploadUrl: '{{route('uploadImage')}}'
    });

</script>
@endif
