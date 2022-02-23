@component('mail::message')
You have message {{$details['nama']}}<br><br>
Kode Surat : {{ $details['kode']}}<br>
Hal : {{ $details['title'] }}<br>
@endcomponent