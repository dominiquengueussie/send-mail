<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Mail;

class TestController extends Controller
{
    public function sendMailWithPdf()
    {

        $data['email'] = 'joselinekemegni@gmail.com';
        $data['title'] = 'Email testing title';
        $data['body'] = 'Email testing body';

        $pdf = PDF::loadView('mail', $data);
        Mail::send('mail', $data, function ($message) use ($data, $pdf) {
            $message->to($data['email'])
                ->subject($data['title'])
                ->attachData($pdf->output(), "test.pdf");
        });
        dd('email envoyé');
    }
}
