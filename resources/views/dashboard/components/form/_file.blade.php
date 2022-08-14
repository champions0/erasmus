<div class="form-group">
    <div class="file__container">
        <div class="file__wrapper @if(isset($inputValue) && $inputValue) active @endif">
            <div class="file__image @if(isset($inputValue) && $inputValue) d-flex @endif" >

                @if(isset($is_file) && $is_file && isset($inputValue) && $inputValue)
                    <a href="{{$inputValue}}" download=""> Download {{$name}} </a>
                @else
                    @isset($inputValue)

                        <img id="file__img" src="{{$inputValue}}">
                    @else
                        <img id="file__img" src="" alt="">
                    @endif
                @endif
            </div>
            <div class="file__content" onclick="defaultBtnActive()">
                <div class="file__icon"><img src="/_dashboard/images/file-upload.svg" alt=""></div>
                <div class="file__text">No file chosen</div>
            </div>
            <div id="cancel-btn"><img src="/_dashboard/images/close.svg" alt=""></div>
            <div class="file__name">  </div>
        </div>
        <input type="file" name="{{$name}}" id="{{$name}}" hidden
               class="form-control {{(isset($inputClass) ? $inputClass : '')}}" {{$multiple ? 'multiple' : ''}}>
        <button type="button" id="custom-btn" onclick="defaultBtnActive()">Choose file</button>

        {{--{!! Form::label($name, __(ucfirst(str_replace('_', ' ', $name))), ['class' => (isset($labelClass) ? $labelClass : '') . ' ' . ($required ?? '')]) !!}--}}

        {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
    </div>
</div>
{{--@if(!isset($notShowLabel))--}}

{{--    @if(isset($is_file) && $is_file)--}}
{{--        @if(isset($inputValue) && $inputValue)--}}
{{--            <a href="{{$inputValue}}" download=""> Download {{$name}} </a>--}}
{{--        @endif--}}
{{--    @else--}}
{{--        @isset($inputValue)--}}
{{--            <img src="{{$user->image->path ?? ''}}" width="400">--}}
{{--        @endisset--}}
{{--    @endif--}}

{{--@endif--}}
<script>
    const defaultBtn = document.querySelector('.input-file_item');
    const customBtn = document.querySelector('#custom-btn');
    const cancelBtn = document.querySelector('#cancel-btn');
    const fileName = document.querySelector('.file__name');
    const fileContent = document.querySelector('.file__content');
    const fileWrapper = document.querySelector('.file__wrapper');
    const fileImage = document.querySelector('.file__image');
    const img = document.querySelector('#file__img');
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

    function defaultBtnActive() {
        defaultBtn.click();
    }

    defaultBtn.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function () {
                const result = reader.result;
                fileWrapper.classList.add('active');

                if(file.type.includes('image')){
                    img.src = result;
                    fileImage.style.display = "flex";
                    fileWrapper.classList.remove('type-file');
                    fileContent.style.display = "none";
                } else {
                    fileWrapper.classList.add('type-file');
                }
            }
            cancelBtn.addEventListener('click', function (){
                fileWrapper.classList.remove('type-file');
                img.src = "";
                $(defaultBtn).val('');
                fileWrapper.classList.remove('active');
                fileImage.style.display = "none";
                fileContent.style.display = "block";
            });
            reader.readAsDataURL(file);
        }
        if (this.value) {
            let valueStore = this.value.match(regExp);
            fileName.textContent = valueStore;
        }
    })
</script>
