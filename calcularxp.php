<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>O "Calculador de XP"</title>
</head>
<body>

    <div class="container">
    <h2>Calculador de XP</h2>

    <form action="xp.php" method="POST">
        <input type="number" name="nivel" placeholder="Nível Atual" required>

        <input type="number" name="xp" placeholder="XP Atual" required>

        <select name="dificuldade">
            <option value="facil">Fácil</option>
            <option value="media">Média</option>
            <option value="dificil">Difícil</option>
        </select>

        <button type="submit">Calcular XP</button>
    </form>
</div>

<?php
$nivel = $_POST['nivel'];
$xpAtual = $_POST['xp'];
$dificuldade = $_POST['dificuldade'];
$xpMissao = 100;

if ($dificuldade == "media") {
    $xpMissao *= 1.5;
} elseif ($dificuldade == "dificil") {
    $xpMissao *= 2.0;
}

$xpTotal = $xpAtual + $xpMissao;
$subiuNivel = false;
$novoNivel = $nivel;

if ($xpTotal > 1000) {
    $subiuNivel = true;
    $novoNivel = $nivel + 1;
}
?>

<div class="resultado">
    <h2>Resultado da Missão</h2>

    <p><b>Nível Atual:</b> <?php echo $nivel; ?></p>
    <p><b>XP Antes:</b> <?php echo $xpAtual; ?></p>
    <p><b>XP Ganho:</b> <?php echo $xpMissao; ?></p>

    <h3>Total de XP: <?php echo $xpTotal; ?></h3>

    <?php if ($subiuNivel) { ?>
        <p class="levelup">PARABÉNS! Você subiu para o nível <?php echo $novoNivel; ?>!</p>
    <?php } ?>

    <a href="index.php">Voltar a página inicial</a>/
</div>

</body>
</html>