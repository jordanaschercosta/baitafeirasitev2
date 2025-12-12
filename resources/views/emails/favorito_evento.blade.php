<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Banca Favorita no Evento</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background:#f7f7f7; padding:20px;">

    <div style="max-width:600px; margin:0 auto; background:#fff; padding:20px; border-radius:10px;">

        <h2 style="text-align:center;">Olá, {{ $nome }}!</h2>

        <p>
            Temos uma ótima notícia para você! 🎉  
            Sua banca favorita <strong>{{ $banca->nome_fantasia }}</strong> estará presente no evento:
        </p>

        <h3>{{ $evento->titulo }}</h3>

        <!-- DATA -->
        <p>
            📅 <strong>Data:</strong> {{ $evento->inicio }}
        </p>

        <!-- LOCAL -->
        <p>
            📍 <strong>Local:</strong> {{ $evento->endereco }}
        </p>

        <!-- BOTÃO -->
        <p style="text-align:center; margin:25px 0;">
            <a href="{{ route('eventos.show', $evento->slug) }}"
               style="
                    background:#27ae60;
                    color:#fff;
                    padding:12px 20px;
                    border-radius:6px;
                    text-decoration:none;
                    display:inline-block;
                    font-weight:bold;
               ">
                Ver detalhes do evento
            </a>
        </p>

        <p>
            Não perca a chance de visitar sua banca preferida e aproveitar tudo que ela oferecerá!
        </p>

        <p>
            Esperamos você lá! 🌟
        </p>

        <p>— Equipe Baita Feira</p>

    </div>

</body>
</html>
