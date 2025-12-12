<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Banca Favorita no Evento + Promoção</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background:#f7f7f7; padding:20px;">

    <div style="max-width:600px; margin:0 auto; background:#fff; padding:20px; border-radius:10px;">

        <h2 style="text-align:center;">Olá, {{ $nome }}!</h2>

        <hr style="margin:25px 0; border:0; border-top:1px solid #eee;">

        <!-- PROMOÇÃO -->
        <h3 style="text-align:center; color:#c0392b;">🔥 Promoção Especial!</h3>

        <p>
            O produto que você marcou como favorito entrou em <strong>promoção</strong>:
        </p>

        <p style="font-size:16px;">
            <strong>{{ $produto->nome }}</strong><br>
            De: <span style="text-decoration:line-through; color:#888;">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span><br>
            Por: <span style="color:#27ae60; font-weight:bold;">R$ {{ number_format($produto->valor_novo, 2, ',', '.') }}</span>
        </p>

        <p style="text-align:center; margin:20px 0;">
            <a href="{{ url('/bancas/' . $banca->slug) }}"
               style="
                    background:#c0392b;
                    color:#fff;
                    padding:12px 20px;
                    border-radius:6px;
                    text-decoration:none;
                    display:inline-block;
                    font-weight:bold;
               ">
                Ver produto em promoção
            </a>
        </p>

        <hr style="margin:25px 0; border:0; border-top:1px solid #eee;">

        <p>
            Não perca a chance de visitar sua banca preferida e aproveitar esta promoção exclusiva! 🌟
        </p>

        <p>— Equipe Baita Feira</p>

    </div>

</body>
</html>
