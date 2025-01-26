<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactMessage extends Mailable
{
public $data;

public function __construct($data)
{
$this->data = $data;
}

public function build()
{
return $this->subject('Pesan Kontak Baru')
->view('emails.contact')
->with('data', $this->data);
}
}