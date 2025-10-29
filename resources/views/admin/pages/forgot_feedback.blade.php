@component('mail::message')
Hello {{ $user->firstname }},

<br>
Your new login password is :- <br> {{ $user->password_random }}
</br>

<br>
Thank you <br>

{{ config('app.name') }}
@endcomponent
b