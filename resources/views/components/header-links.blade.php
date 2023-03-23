<ul class="menu-nav flex items-center list-none">
    <li>
        <a href="">{{ __('Home') }}</a>
    </li>
    <li>
        <a href="">{{ __('Philosophy') }}</a>
    </li>
    <li class="with-sub">
        <a href="">{{ __('Ravenna') }}</a>

        <ul class="sub-menu">
            <li>
                <a href="">My universe</a>
            </li>
        </ul>
    </li>
    <li class="with-sub">
        <a href="">{{ __('William') }}</a>

        <ul class="sub-menu">
            <li>
                <a href="">My universe</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="">{{ __('Aron') }}</a>
    </li>
    <li>
        <a href="">{{ __('Gideon') }}</a>
    </li>
    <li>
        <a href="{{ route('catalogue.index') }}">{{ __('Shop') }}</a>
    </li>
    <li>
        <a href="">{{ __('Perfumer') }}</a>
    </li>
    <li>
        <a href="">{{ __('Store locator') }}</a>
    </li>
    <li class="change-language">
        <a href="javascript:void(0);" rel="nofollow"
           class="modal-open"
           data-modal="change-language">
            <img src="{{ \App\Services\Content\FlagService::get(\Illuminate\Support\Facades\App::getLocale()) }}" width="17px" alt="">
            {{ \Illuminate\Support\Str::upper((\Illuminate\Support\Facades\App::getLocale())) }}
        </a>
    </li>
</ul>

<!-- Change language modal -->
