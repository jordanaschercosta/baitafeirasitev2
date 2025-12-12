<?php

namespace App\Services;

use App\Models;
use App\Models\Enum\StatusEvento;
use App\Models\Enum\TipoNotificacao;
use App\Models\Evento;
use Exception;

class CRUDService
{
    public function getCategorias()
    {
        return Models\Categoria::all();
    }

    public function getCategoriaBySlug($slug)
    {
        return Models\Categoria::where("slug", $slug)->firstOrFail();
    }

    public function getByBanca(int $bancaId) 
    {
        return Models\Produto::where('banca_id', $bancaId)->get();
    }

    public function createProduto(array $data)
    {
        return Models\Produto::create([
            'banca_id'      => $data['banca_id'],
            'nome'          => $data['nome'],
            'descricao'     => $data['descricao'],
            'imagem_url'    => $data['imagem_url'],
            'preco'         => $data['preco']
        ]);
    }

    public function atualizarProduto(int $id, array $data)
    {
        $produto = Models\Produto::findOrFail($id);

        $produto->update([
            'nome'          => $data['nome'],
            'imagem_url'    => $data['imagem_url'],
            'descricao'     => $data['descricao'],
            'preco'         => $data['preco'],
            'em_promocao'   => $data['em_promocao'],
            'valor_novo'    => $data['valor_novo']
        ]);

        return $produto;
    }

    public function deleteProduto($id)
    {
        $produto = Models\Produto::find($id);

        if (!$produto) {
            return false;
        }

        return $produto->delete();
    }

    public function getBancasUsuario(int $user_id, $banca_id = null) 
    {
        return Models\Banca::where('user_id', $user_id)
            ->when($banca_id, function ($query) use ($banca_id) {
                $query->where('id', '!=', $banca_id);
            })
            ->get();
    }

    public function getBancaById(int $id) 
    {
        return Models\Banca::find($id);
    }

    public function getBancaBySlug(string $slug) 
    {
        return Models\Banca::where('slug', $slug)->firstOrFail();
    }

    public function getBancasByCategoria(int $categoriaId)
    {
        return Models\Banca::where('categoria_id', $categoriaId)
            ->when(request('search'), function ($query) {
                $query->where('nome_fantasia', 'like', '%' . request('search') . '%');
            })
            ->paginate(12);
    }

    public function createBanca(array $data)
    {
        return Models\Banca::create([
            'user_id'       => $data['user_id'],
            'categoria_id'  => $data['categoria_id'],
            'nome_fantasia' => $data['nome_fantasia'],
            'foto_url'      => $data['foto_url'],
            'descricao'     => $data['descricao'],
            'instagram'     => $data['instagram']
        ]);
    }

    public function createEvento(array $data)
    {
        return Models\Evento::create([
            'titulo'    => $data['titulo'],
            'inicio'    => $data['inicio'],
            'fim'       => $data['fim'],
            'descricao' => $data['descricao'],
            'status'    => $data['status'],
            'user_id'   => $data['user_id'],
            'rua'       => $data['rua'],
            'numero'    => $data['numero'],
            'bairro'    => $data['bairro'],
            'cidade'    => $data['cidade'],
            'uf'        => $data['uf'],
            'cep'       => $data['cep'],
            'latitude'  => $data['latitude'],
            'longitude' => $data['longitude'],
        ]);
    }

    public function atualizarEvento(int $id, array $data)
    {
        $evento = Models\Evento::findOrFail($id);

        $evento->update([
            'titulo'    => $data['titulo'],
            'inicio'    => $data['inicio'],
            'fim'       => $data['fim'],
            'descricao' => $data['descricao'],
            'rua'       => $data['rua'],
            'numero'    => $data['numero'],
            'bairro'    => $data['bairro'],
            'cidade'    => $data['cidade'],
            'uf'        => $data['uf'],
            'cep'       => $data['cep'],
            'latitude'  => $data['latitude'],
            'longitude' => $data['longitude'],
        ]);

        return $evento->id;
    }


    public function getEventoById(int $id)
    {
        return Models\Evento::findOrFail($id);
    }

    public function getEventoBySlug(string $slug)
    {
        return Models\Evento::where('slug', $slug)->firstOrFail();
    }

    public function getEventosByUser(int $user_id)
    {
        return Models\Evento::where('user_id', $user_id)
            ->where('fim', '>', now())
            ->orderBy('inicio','asc')
            ->paginate(6);
    }

    public function getEventosHoje()
    {
        return Models\Evento::whereDate('inicio', now()->toDateString())->get();
    }

    public function getParticipacoesEventos($user_id)
    {
      return Models\Participacao::with('evento')
        ->where('user_id', $user_id)
        ->whereHas('evento', function ($query) {
            $query->where('fim', '>', now());
        })
        ->orderBy(Models\Evento::select('inicio')
            ->whereColumn('eventos.id', 'participacoes.evento_id')
        , 'asc')
        ->paginate(6);
    }

    public function getEventosByLocalizacao($latitude, $longitude, $quantidade = 6) {
        return Models\Evento::selectRaw("
            eventos.*,
            ( 6371 * acos(
                cos( radians(?) ) *
                cos( radians(eventos.latitude) ) *
                cos( radians(eventos.longitude) - radians(?) ) +
                sin( radians(?) ) *
                sin( radians(eventos.latitude))
            )) AS distancia", 
            [
                $latitude, 
                $longitude, 
                $latitude
            ])
        ->where('fim', '>', now())
        ->orderBy('distancia', 'asc')
        ->paginate($quantidade);
    }

    public function getEventos($quantidade = 6)
    {
        return Models\Evento::where('fim', '>', now())
            ->orderBy('inicio', 'asc')
            ->paginate($quantidade);
    }

    public function getMeusEventos($user_id)
    {
        return Models\Participacao::where('user_id', $user_id)
            ->whereHas('evento', function($query) {
                $query->where('fim', '>', now());
            })
            ->with('evento')
            ->get()
            ->sortBy(function($participacao) {
                return $participacao->evento->inicio;
            });
    }

    public function createParticipacaoEvento($data) {
        
        $dataSave = [
            'user_id' => $data['user_id'],
            'evento_id' => $data['evento_id'],
        ];

        if (isset($data['bancas'])) {
            $dataSave['bancas'] = $data['bancas'];
        }

        return Models\Participacao::create($dataSave);
    }

    public function removerParticipacao($data) {
        $participacao = Models\Participacao::findOrFail($data['id']);

        if (empty($participacao)) {
            throw new Exception("Participação não encontrada");
        }

        if ($participacao->user_id <> $data['user_id']) {
            throw new Exception("Você não pode alterar a participação");
        }

        $participacao->delete();
    }

    public function getParticipacaoById($id) {
        return Models\Participacao::find($id);
    }

    public function getParticipacaoUsuarioEvento($user_id, $evento_id) {
        return Models\Participacao::where('user_id', $user_id)
            ->where('evento_id', $evento_id)
            ->first();
    }

    public function atualizarParticipacao(int $id, array $data)
    {
        $participacao = Models\Participacao::findOrFail($id);

        $participacao->update([
            'bancas' => $data["bancas"]
        ]);

        return $participacao->id;
    }

    public function deleteEvento($id) {
        $evento = Models\Evento::find($id);

        if (!$evento) {
            return false;
        }

        return $evento->delete();
    }

    public function cancelaEvento($id) {
        $evento = Models\Evento::find($id);

        if (!$evento) {
            return false;
        }

        $evento->status = StatusEvento::CANCELADO;
        $evento->save();
    }
    
    public function createNotificacao(
        $destinario, 
        $tipo, 
        $evento, 
        $participacao,
        $produto,
        $banca
    ) 
    {
        $dataSave = [
            'user_id' => $destinario->id,
            'titulo' => $this->getNotificacaoTitulo($tipo),
            'mensagem' => $this->getNotificacaoMensagem($tipo, $evento, $participacao, $produto, $banca),
            'url' => $this->getNotificacaoUrl($evento, $banca),
            'tipo' => $tipo
        ];

        if ($evento) {
            $dataSave['evento_id'] = $evento->id;
        }
        
        if ($banca) {
            $dataSave['banca_id'] = $banca->id;
        }

        return Models\Notificacao::create($dataSave);
    }

    protected function getNotificacaoTitulo(string $tipo)
    {
        switch ($tipo) {
            case TipoNotificacao::EVENTO_REAGENDADO:
                return "Alteração na data do evento.";
                break;

            case TipoNotificacao::EVENTO_CANCELADO:
                return "Cancelamento de evento";
                break;

            case TipoNotificacao::FAVORITO_EVENTO:
                return "Participação de Banca Favorita!";
                break;

            case TipoNotificacao::PRODUTO_PROMOCAO:
                return "Seu produto favorito entrou em promoção!";
                break;
        }
    }

    protected function getNotificacaoUrl(
        $evento = null, 
        $banca = null
    ) {
        if ($banca) {
            return route('bancas.show', $banca->slug);
        }

        return route('eventos.show', $evento->slug);
    }

    protected function getNotificacaoMensagem(
        string $tipo, 
        $evento = null, 
        $participacao = null, 
        $produto = null, 
        $banca = null
    )
    {
        switch ($tipo) {
            case TipoNotificacao::EVENTO_REAGENDADO:
                return "O evento {$evento->titulo} teve sua data de início alterada";
                break;

            case TipoNotificacao::EVENTO_CANCELADO:
                return "O evento {$evento->titulo} foi cancelado pelo organizador.";
                break;

            case TipoNotificacao::FAVORITO_EVENTO:
                return "Sua banca favorita {$banca->nome_fantasia} confirmou presença no evento:\n"
                . "{$evento->titulo}\n"
                . "em {$evento->inicio}.\n\n"
                . "Confirme sua presença e apoie o comércio local.";
                break;

            case TipoNotificacao::PRODUTO_PROMOCAO:
                return "Um de seus produtos favoritos, <b>{$produto->nome}</b> entrou em promoção!";
                break;
        }
    }

    public function getNotificacoes($naoLidas = false)
    {
        $query = Models\Notificacao::where('user_id', session('user_id'))
            ->orderBy('id', 'desc');

        if ($naoLidas) {
            $query->where('lido', false);
        }

        return $query->get();
    }

    public function lerNotificacoes()
    {
        return Models\Notificacao::where('user_id', session('user_id'))
            ->where('lido', false)
            ->update(['lido' => true]);
    }

    public function getFavoritadoByBancaId($bancaId)
    {
        return Models\Favorito::where('banca_id', $bancaId)->get();
    }

    public function getFavoritadoByProdutoId($produtoId)
    {
        return Models\Favorito::where('produto_id', $produtoId)->get();
    }

    public function getProdutosFavoritosUsuario() 
    {
        return Models\Favorito::where('user_id', session('user_id'))
            ->whereNotNull('produto_id')
            ->get();
    }
}