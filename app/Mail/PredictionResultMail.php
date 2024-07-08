<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PredictionResultMail extends Mailable
{
    use Queueable, SerializesModels;
       
    public $predictionData;


    
    public function __construct($predictionData)
    {
        $this->predictionData = $predictionData;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Prediction Result Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject('Flood Prediction Result')
                    ->view('predictionResult');
                
    }
}
