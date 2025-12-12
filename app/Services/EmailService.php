<?php

namespace App\Services;

use App\Models;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail as TemplateEmail;
use App\Models\User;
use Exception;
use Throwable;

class EmailService
{
    public function forgetPasswordEmail(Models\User $user)
    {
        $link = url('/resetar-senha/' . $user->id);

        try {
            Mail::to($user->email)->send(new TemplateEmail\EsqueciSenhaMail($user->name, $link));
        } catch (Exception $exception) {
            //
        }
    }

    public function emailNotificacao(
        User $usuario, 
        string $tipo, 
        $evento = null, 
        $participacao = null, 
        $produto = null,
        $banca = null
    )
    {
        Mail::to($usuario->email)->send(new TemplateEmail\NotificacaoMail($usuario->name, $tipo, $evento, $participacao, $produto, $banca));
    }
}