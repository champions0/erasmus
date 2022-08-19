<div class="form-group">
{{--    <div class="file__container">--}}
        <label for="{{$name}}" class=" ">{{ $labelDisplayName ?? __(ucfirst(str_replace('_', ' ', $name)))}}</label>
        <input type="file" name="{{$name}}" id="{{$name}}"
               class="form-control {{(isset($inputClass) ? $inputClass : '')}}" {{$multiple ? 'multiple' : ''}}>
        @if(isset($is_file) && $is_file && isset($inputValue) && $inputValue)
            <a href="{{$inputValue}}" download=""> {{basename($inputValue)}} </a>
        @else
            @isset($inputValue)
                <img id="file__img" style="height: 150px" src="{{$inputValue}}">
            @endif
        @endif
        {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
{{--    </div>--}}
</div>
