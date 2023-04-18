<li>
    <a href="/">{{ __('Home') }}</a>
</li>
<li>
    <a href="/philosophy">{{ __('Philosophy') }}</a>
</li>
<li class="with-sub">
    <a href="javascript:void(0);">{{ __('Ravenna') }}</a>

    <ul class="sub-menu">
        <li>
            <a href="/ravenna/my-universe">My universe</a>
        </li>
    </ul>
</li>
<li class="with-sub">
    <a href="javascript:void(0);">{{ __('William') }}</a>

    <ul class="sub-menu">
        <li>
            <a href="/william/my-universe">My universe</a>
        </li>
    </ul>
</li>
<li class="with-sub">
    <a href="javascript:void(0);">{{ __('Aron') }}</a>

    <ul class="sub-menu">
        <li>
            <a href="/aron/my-universe">My universe</a>
        </li>
    </ul>
</li>
<li class="with-sub">
    <a href="javascript:void(0);">{{ __('Gideon') }}</a>

    <ul class="sub-menu">
        <li>
            <a href="/gideon/my-universe">My universe</a>
        </li>
    </ul>
</li>
<li>
    <a href="{{ route('catalogue.index') }}">{{ __('Shop') }}</a>
</li>
<li>
    <a href="/perfumer">{{ __('Perfumer') }}</a>
</li>
<li>
    <a href="/store-locator">{{ __('Store locator') }}</a>
</li>
<li class="change-language">
    <a href="javascript:void(0);" rel="nofollow"
       class="modal-open"
       data-modal="change-language">
        <img src="{{ \App\Services\Content\FlagService::get(\Illuminate\Support\Facades\App::getLocale()) }}" width="17px" alt="">
        {{ \Illuminate\Support\Str::upper((\Illuminate\Support\Facades\App::getLocale())) }}
    </a>
</li>
