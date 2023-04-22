<h1 style="margin-bottom: 15px;">{{ __('You are registered') }}</h1>
<hr>
<p class="">{{ __('Email') }}: {{ $user->email }}</p>
<p class="" style="margin-bottom: 15px;">{{ __('Password') }}: {{ $user->password }}</p>
<hr>
<a href="{{ config('app.url') }}{{ route('login') }}">Login now</a>
