<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ThiSinh;
use Illuminate\Support\Facades\URL;

class ThayDoiDiemMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($thisinh)
    {
        $this->thisinh = $thisinh;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = URL::to('/').'/xemdiem/'.$this->thisinh->SBD;
        return $this->view('mails.thaydoidiem',['thisinh' => $this->thisinh,'url' => $url])->subject('Thông báo điểm THPT Quốc gia 2017');
    }
}
