<div class="card card-sidebar-mobile mt-4">
    <ul class="nav nav-sidebar" data-nav-type="accordion">
        <li class="nav-item">
            <a href="{{route('dashboard.index')}}" class="nav-link nav__link @if(Request::is('dashboard')) active @endif">
                <i class="icon-home4"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('dashboard.partners.index')}}" class="nav-link nav__link @if(Request::is('dashboard/partners*')) active @endif">
                <i class="icon-paste2"></i>
                <span>Partners</span>
            </a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a href="{{route('dashboard.news.index')}}" class="nav-link nav__link @if(Request::is('dashboard/news*')) active @endif">--}}
{{--                <i class="icon-bubble-lines3"></i>--}}
{{--                <span>News</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{route('dashboard.files.index')}}" class="nav-link nav__link @if(Request::is('dashboard/files*')) active @endif">--}}
{{--                <i class="icon-pencil"></i>--}}
{{--                <span>Materials</span>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</div>
<style>
    .changeBackColor {
        background: none!important;
    }
    .changeBackColor:hover {
        background-color: rgba(0,0,0,.15)!important;
    }

</style>
