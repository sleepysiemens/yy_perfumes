<div class="flex flex-wrap sm:flex-row sm:items-center flex-col justify-between md:w-1/2 mx-auto bg-slate-50 md:px-10 px-5 py-5 profile-menu">
    <a href="{{ route('home') }}" @if(request()->path() == 'home')class="underline"@endif>
        <i class="fa-solid fa-cart-shopping mr-1"></i>
        {{ __('My orders') }}
    </a>
    <a href="">
        <i class="fa-solid fa-tag mr-1" style="color: #000;"></i>
        {{ __('Actions') }}
    </a>
    @if (Auth::user()->type == 'dealer')
        <a href="{{ route('dealer.dashboard') }}">
            <i class="fa-solid fa-shop mr-1"></i>
            {{ __('Dealer') }}
        </a>
    @else
        <a href="{{ route('become-dealer') }}" @if(request()->path() == 'profile/become-dealer')class="underline"@endif>
            <i class="fa-solid fa-shop mr-1"></i>
            {{ __('Become dealer') }}
        </a>
    @endif
</div>

@push('scripts')
    <style>
        .profile-menu a {
            padding: 7px 15px;
        }
        .profile-menu a:hover {
            transition: .3s ease;
            background: rgba(0,0,0,.03);
        }
    </style>
@endpush
