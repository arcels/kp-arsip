@component('mail::message')
{{ $details['title'] }}<br>
Kepada, {{ $details['pengguna'] }}
<br>
Detail Akun Anda : <br>
Username : {{ $details['username'] }} <br>
Password : {{ $details['pass'] }}<br>
Klik Tombol dibawah <br>
@component('mail::button', ['url' => $details['url']])
Dashboard
@endcomponent

Thanks,<br>
Team Developer
@endcomponent