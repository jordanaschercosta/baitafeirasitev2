<?php

namespace App\Services;

use App\Models;
use App\Models\Banca;
use App\Models\Enum\StatusEvento;
use App\Models\Enum\TipoNotificacao;
use App\Models\Evento;
use App\Models\Participacao;
use App\Models\Produto;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class NotificacaoService
{
    protected CRUDService $crudService;
    protected EmailService $emailService;

    public function __construct(CRUDService $crudService, EmailService $emailService)
    {
        $this->crudService = $crudService;
        $this->emailService = $emailService;
    }

    public function enviarNotificacao(
        ?Evento $evento = null,
        string $tipo,
        ?Participacao $participacao = null,
        ?Produto $produto = null,
        ?Banca $banca = null
    )
    {
        $destinatarios = $this->getListaTransmissao($evento, $tipo, $participacao, $produto, $banca);

        // dd('enviar notificacao', reset($destinatarios)->email, $produto->id);

        foreach ($destinatarios as $destinario) {
            try {
                $this->crudService->createNotificacao($destinario, $tipo, $evento, $participacao, $produto, $banca);
                $this->emailService->emailNotificacao($destinario, $tipo, $evento, $participacao, $produto, $banca);
            } catch (Exception $exception) {
                //
                dd($exception->getMessage());
            }
        }
    }
 
    protected function getListaTransmissao(
        ?Evento $evento, 
        string $tipo, 
        ?Participacao $participacao = null,
        ?Produto $produto = null,
        ?Banca $banca = null
    )
    {
        $users = [];

        switch ($tipo) {
            case TipoNotificacao::PRODUTO_PROMOCAO:
                // $favoritados = $this->crudService->getFavoritadoByProdutoId($produto->id);
                foreach($produto->favoritos as $favoritado) {
                    $users[] = $favoritado->user; 
                }

                break;

            case TipoNotificacao::FAVORITO_EVENTO:

                foreach ($participacao->bancas as $banca) {
                    foreach ($banca->favoritos as $favorito) {
                        $users[] = $favorito->user;
                    }
                }

                break;
            
            default:
                foreach ($evento->participacoes as $participacao) {
                    $users[] = $participacao->usuario; 
                }

                break;
        }

        return $users;
    }


    protected function enviarWPMessage($obj, $tipo, $phone) 
    {
        $sid   = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');

        $from  = 'whatsapp:+14155238886';

        $phone = preg_replace('/\D/', '', $phone);

        if (!empty($phone)) {
            return false;
        }

        // envio teste
        // $phone = '555196363031';

        $to = "whatsapp:+{$phone}";

        try {

            $twilio = new Client($sid, $token);

            $twilio->messages->create($to, [
                'from' => $from,
                'body' => $this->montarMensagem($obj, $tipo)
            ]);

            return true;

        } catch (\Exception $e) {

            Log::error('Erro ao enviar WhatsApp', [
                'to'    => $to,
                'error' => $e->getMessage()
            ]);

            return false;
        }
    }

    protected function montarMensagem($obj, $tipo)
    {
        if ($tipo == TipoNotificacao::EVENTO_LEMBRETE) {
            return "*BAITA-FEIRA AVISA*\n\n"
                . "📅 *Você tem um evento marcado para hoje!*\n\n"
                . "🎉 {$obj->titulo}\n"
                . "📍 {$obj->endereco}\n"
                . "⏰ {$obj->inicio}\n\n"
                . "👉 Ver detalhes do evento:\n"
                . route("eventos.show", $obj->slug);
        } else if ($tipo == TipoNotificacao::EVENTO_CANCELADO) {
            return "*BAITA-FEIRA AVISA*\n\n"
                . "📅❌ * O evento {$obj->titulo} foi cancelado!*\n\n"
                . "👉 Ver detalhes em:\n"
                . route("eventos.show", $obj->slug);
        } else if ($tipo == TipoNotificacao::FAVORITO_EVENTO) {
            $banca = $obj['favorito']->banca;
            $obj = $obj['participacao']->evento;

            return "*BAITA-FEIRA AVISA*\n\n"
                . "📅 *Sua banca favorita {$banca->nome_fantasia} estará presente!*\n\n"
                . "🎉 Evento: {$obj->titulo}\n\n"
                . "👉 Ver detalhes em:\n"
                . route("eventos.show", $obj->slug);
        } else if ($tipo == TipoNotificacao::PRODUTO_PROMOCAO) {
            return "teste";
            return "*BAITA-FEIRA AVISA* 💸\n\n"
                . "🏷️ *PROMOÇÃO: {$obj->nome} com desconto!*\n\n"
                . "👉 Ver detalhes em:";
        }

        return "";
    }
}