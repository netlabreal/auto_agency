<?php

namespace App\Mail;

use App\Auto;
use App\Zakaz;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ZakazMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $zakaz;
    public function __construct(Zakaz $zakaz)
    {
        $this->zakaz = $zakaz;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $a = Auto::findOrFail($this->zakaz->auto_id);
        return $this->from('robotbussiness@yandex.ru')
            ->subject('Заказ автомобиля '.$a->name)
            ->view('mail.main', array('zakaz'=>$this->zakaz, 'auto'=>$a));
    }
}
