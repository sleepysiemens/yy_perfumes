<div class="modals" style="display:block;position: relative;z-index: 99999999;margin-top: -10%;">
        <aside id="change-language" class="avgrund-popup">
            <h2 class="heading flex items-center">
                <img src="https://cdn-icons-png.flaticon.com/512/9693/9693532.png" style="margin-right: 5px;" width="25px" alt="">
                {{ __('Choose your language') }}
            </h2>

            <div class="flex flex-col language-select">
                <a href="{{ route('locale-set', 'en') }}" rel="nofollow">
                    <img src="{{ \App\Services\Content\FlagService::get('en') }}" width="17px" alt="">
                    English
                </a>
                <a href="{{ route('locale-set', 'ru') }}" rel="nofollow">
                    <img src="{{ \App\Services\Content\FlagService::get('ru') }}" width="17px" alt="">
                    Русский
                </a>
                <a href="{{ route('locale-set', 'tur') }}" rel="nofollow">
                    <img src="{{ \App\Services\Content\FlagService::get('tur') }}" width="17px" height="17px" alt="">
                    Türkiye
                </a>
            </div>

            <button class="close-modal" onclick="javascript:closeDialog();">{{ __('Close') }}</button>
        </aside>
</div>
