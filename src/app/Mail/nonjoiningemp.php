<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class nonjoiningemp extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
            $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(isset($this->data['subject'])){
            return $this->from($this->data['from'])->subject($this->data['subject'])->view('Interviewtemplate')->with('datas',$this->data['body']); 
        }
        else{
            return $this->from($this->data['from'])->subject('Regarding Release')->view('Interviewtemplate')->with('datas',$this->data['body']); 
        }
    }
}
