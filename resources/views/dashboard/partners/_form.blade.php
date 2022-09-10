
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-md-6">
        <fieldset>
            <ul class="nav nav-tabs">
                @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key => $value)
                    <li class="nav-item"><a href="#language-tab{{$key}}"
                                            class="nav-link @if($loop->first) active @endif"
                                            data-toggle="tab">{{$value['name']}}</a></li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key => $value)
                    <div class="tab-pane fade  @if($loop->first) show active @endif" id="language-tab{{$key}}">
                        <legend class="font-weight-semibold"><i class="icon-file-text2 mr-2"></i> {{__('Partner details')}}</legend>
                        @include('dashboard.components.form._text', (['name' => 'ml[' . $key . '][name]', 'labelDisplayName' => 'Name' ,'inputValue' => $partnerMls[$key]->name ?? '']))
                        @include('dashboard.components.form._textarea', (['name' => 'ml[' . $key . '][text]', 'labelDisplayName' => 'Description' ,'inputValue' => $partnerMls[$key]->text ?? '']))
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            @include('dashboard.components.form._select', (['name' => 'is_home', 'data' => [0 => "No", 1 => 'Yes'],
                'labelDisplayName' => 'Display on the Home screen', 'selected' => $partner->is_home ?? 0, 'select_2' => false, 'multiple' => false]))
            @include('dashboard.components.form._text', ['name' => 'website', 'inputValue' => $partner->website ?? ''])
            @include('dashboard.components.form._text', ['name' => 'facebook', 'inputValue' => $partner->facebook ?? ''])
            @include('dashboard.components.form._file', ['name' => 'image', 'multiple' => false,
                'labelDisplayName' => 'Logo', 'inputValue' => $partner->image ?? '', 'inputClass' => 'input-file_item'])

        </fieldset>
    </div>
</div>

