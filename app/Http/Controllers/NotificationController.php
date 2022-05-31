<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\SendmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;

class NotificationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        // return view('welcome');
        $data = User::where('id', 1)->first();
        $datamail = [
            'nama' => $data->name,
            'pesan' => 'terimakasih telah menggunakan aplikasi ini',
            'dari' => 'pengembang',
            'pengembang' => 'gema fajar ramadhan'
        ];
        Mail::to('gemafajarramadhan09@gmail.com')->send(new Sendmail($datamail));

        dd('Data BErhasil Terkirim');
    }

    public function sendNotification()
    {

        $data = User::where('id', 1)->first();

        $datamail = [
            'pesan' => 'uji coba send mail laravel 8',
            'ucapan' => 'terimakasih telah menggunakan aplikasi ini',
            'text' => 'Selamat Datang',
            'url' => url('/'),
            'id' => 1
        ];

        Notification::send($data, new SendmailNotification($datamail));

        dd('Data BErhasil Terkirim');
    }
}
