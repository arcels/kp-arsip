@component('mail::message')
{{ $details['title'] }}<br>
Kepada, {{ $details['pengguna'] }}
<br>

Silahkan login menggunakan password baru anda <br>
Password : {{ $details['pass'] }}<br>
Klik Tombol dibawah <br>
@component('mail::button', ['url' => $details['url']])
Dashboard
@endcomponent

Thanks,<br>
Team Developer
@endcomponent