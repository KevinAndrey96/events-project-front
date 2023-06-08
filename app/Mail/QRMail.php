<?php

namespace App\Mail;


use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $text, $pk)
    {
        $this->subject = $subject;
        $this->text = $text;
        $this->pk = $pk;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'users.mailQR',
            with: [
                'text' => $this->text,
                'pk' => $this->pk
            ],

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        /*
        $path = 'PDF/QR/'.$pk.'.pdf';
        $qrCode = QrCode::format('png')->size(200)->generate($pk);
        $qrCode = base64_encode($qrCode);
        $pdf = Pdf::loadview('users.documentQR', compact('qrCode'));
        Storage::disk('public')->put($path, $pdf->output());
        */


        $pk = $this->pk;
        $path = 'PDF/QR/'.$pk.'.pdf';


        return [
            Attachment::fromStorage($path),
        ];

    }
}
