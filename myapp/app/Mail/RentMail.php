<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $vehicule_name;
    public $start_date;
    public $end_date;
    public $total_price;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $vehicule_name, $start_date, $end_date, $total_price)
    {
        $this->name = $name;
        $this->vehicule_name = $vehicule_name;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->total_price = $total_price;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Récapitulatif de la réservation',
        );
    }

    public function build()
    {
        return $this->view('emails.rent')
            ->subject("Récapitulatif de la réservation");
    }
}