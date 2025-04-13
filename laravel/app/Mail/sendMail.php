<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectText;
    public $contentText;
    public $file;
    public function __construct($subject, $content, $image = null)
    {   
        $this->subjectText = $subject;
        $this->contentText = $content;
        $this->file = $image;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // subject: 'Send Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // view: 'email.send',
          
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build(){
        $email = $this->subject($this->subjectText)->view('email.content');
        if($this->file) {
            $email->attach($this->file->getRealPath(), [
                'as' => $this->file->getClientOriginalName(),
                'mime' => $this->file->getMimeType()
            ]);
        }
        return $email;
    }
}
