@component('mail::message')
    Hello **{{ $name }}**,

    Silahkan masukkan token untuk melakukan voting

    Token anda {{ $token }}

    Tertanda,
    {{ config('app.name') }} team.
@endcomponent
