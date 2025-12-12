<?php

namespace App\Mail;

use App\Models\Banca;
use App\Models\Enum\TipoNotificacao;
use App\Models\Evento;
use App\Models\Produto;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacaoMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $nome;
    public string $tipo;
    public ?Evento $evento;
    public ?Banca $banca;
    public ?Produto $produto;

    /**
     * Create a new message instance.
     */
    public function __construct(
        string $nome,
        string $tipo, 
        $evento = null, 
        $participacao = null, 
        $produto = null,
        $banca = null
    )
    {
        $this->nome     = $nome;
        $this->tipo     = $tipo;
        $this->evento   = $evento;
        $this->banca    = $banca;
        $this->produto  = $produto;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->subject($this->getSubject())
            ->view($this->getView())
            ->with($this->getParam());
    }

    protected function getSubject()
    {
        switch ($this->tipo) {
            case TipoNotificacao::FAVORITO_EVENTO:
                return 'Venha ver sua banca favorita!  ' . $this->banca->nome_fantasia . " em " . $this->evento->titulo;
                break;
        
            case TipoNotificacao::PRODUTO_PROMOCAO:
                return 'Um de seus produtos favoritos entrou em promoção!';
                break;

            case TipoNotificacao::EVENTO_CANCELADO:
                return 'Cancelamento de Evento. Saiba mais';
                break;

            case TipoNotificacao::EVENTO_REAGENDADO:
                return 'Reagendamento de Evento. Saiba mais';
                break;

            default:
                break;
        }
    }

    protected function getView()
    {
        switch ($this->tipo) {
            case TipoNotificacao::FAVORITO_EVENTO:
                return 'emails.favorito_evento';
                break;
            case TipoNotificacao::PRODUTO_PROMOCAO:
                return 'emails.produto_promocao';
                break;
            case TipoNotificacao::EVENTO_CANCELADO:
                return 'emails.cancelamento_evento';
                break;
            case TipoNotificacao::EVENTO_REAGENDADO:
                return 'emails.atualizacao_evento';
                break;
        }     
    }

    protected function getParam()
    {
        return [
            'nome'   => $this->nome,
            'evento' => $this->evento,
            'banca' => $this->banca,
            'produto' => $this->produto,
        ];
    }
}
