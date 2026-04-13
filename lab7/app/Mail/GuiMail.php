<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GuiMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build(): self
    {
        $mail = $this
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->to(env('MAIL_TO_ADDRESS', 'nguoinhan@example.com'), env('MAIL_TO_NAME', 'Người nhận'))
            ->subject('Tiêu đề thư Lab 7')
            ->view('guimail');

        if (file_exists(public_path('hinh1.jpg'))) {
            $mail->attach(public_path('hinh1.jpg'));
        }

        return $mail;
    }
}
