<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>O "Filtro de Streamer"</title>
</head>
<body>
    <div class="container">
        <h2>Filtro de Streamer</h2>

        <form action="streamer.php" method="POST">
            <input type="number" name="donates" placeholder="Total de Donates (R$)">
            <input type="number" name="subs" placeholder="Total de Subs">

            <select name="plataforma">
                <option value="twitch">Twitch</option>
            <option value="youtube">Youtube</option>
        </select>

            <button type="submit">Calcular Ganhos</button>
        </form>
    </div>

    <?php
    $donates = $_POST['donates'];
    $subs = $_POST['subs'];
    $plataforma = $_POST['plataforma'];
    $valorSub = 5;
    $totalBruto = $donates + ($subs * $valorSub);

    if ($plataforma == "twitch") {
        $taxa = 0.50;
    } else {
        $taxa = 0.30;
    }

    $desconto = $subs * $valorSub * $taxa;
    $valorFinal = $totalBruto - $desconto;

    ?>

    <div class="resultado">
        <h2>Ganhos do Streamer</h2>
        <p><b>Donates:</b> R$ <?php echo number_format($donates, 2, ","); ?></p>
        <p><b>Subs:</b> <?php echo $subs; ?></p>
        <p><b>Total Bruto:</b> R$ <?php echo number_format($totalBruto, 2, ","); ?></p>
        <p><b>Taxa Aplicada:</b> <?php echo number_format($taxa * 100); ?>%</p>
        <h3>Valor Final: R$ <?php echo number_format($valorFinal, 2, ","); ?></h3>

        <?php if ($valorFinal < 100) { ?>
            <p class="alerta">Saldo insuficiente para saque mínimo</p>
        <?php } ?>

        <a href="index.php">Voltar a página inicial</a>
    </div>
</body>
</html>