<h1>Pesan Kontak Baru</h1>
<p><strong>Nama:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Pesan:</strong> {!! nl2br(e($data['message'])) !!}</p>
