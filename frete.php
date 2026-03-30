<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Simulador de Frete "Logística Express"</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Logística Express</h2>
    <h3>Simulador de Frete</h3>

    <form action="frete.php" method="POST">
        <input type="number" name="distancia" placeholder="Distância (km)" required>

        <input type="number" name="peso" placeholder="Peso (kg)" required>

        <select name="tipo">
            <option value="normal">Normal</option>
            <option value="expresso">Expresso</option>
        </select>

        <button type="submit">Calcular Frete</button>
    </form>
</div>

<?php
$distancia = $_POST['distancia'];
$peso = $_POST['peso'];
$tipo = $_POST['tipo'];
$total = 10;
$total += $distancia * 0.5;

if ($peso > 20) {
    $total += 30;
}

if ($tipo == "expresso") {
    $total *= 1.2;
}
?>

<div class="resultado">
    <h2>Resultado do Frete</h2>

    <p><b>Distância:</b> <?php echo $distancia; ?> km</p>
    <p><b>Peso:</b> <?php echo $peso; ?> kg</p>
    <p><b>Tipo:</b> <?php echo ucfirst($tipo); ?></p>

    <h3>Total: R$ <?php echo number_format($total, 2, ","); ?></h3>

    <a href="index.php">Voltar a página inicial</a>
</div>

</body>
</html>
