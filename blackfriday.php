<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sistema de Vendas "Black Friday"</title>
</head>
<body>
    
<div class="container">
    <h2>Black Friday</h2>
    <h3>Calculadora de Desconto</h3>

    <form action="desconto.php" method="POST">
        <input type="number" step="0.01" name="valor" placeholder="Valor da Compra (R$)">

        <input type="text" name="cupom" placeholder="Código do Cupom">

        <button type="submit">Calcular Desconto</button>
    </form>
</div>

<?php
$valor = $_POST['valor'];
$cupom = strtoupper($_POST['cupom']);
$desconto = 0;

if ($valor > 500) {
    $desconto += $valor * 0.10;
}

if ($cupom == "AMIGAO10") {
    $desconto += 10;
}

$valorFinal = $valor - $desconto;

if ($valorFinal < 0) {
    $valorFinal = 0;
}
?>

<div class="resultado">
    <h2>Resultado da Compra</h2>

    <p><b>Valor Original:</b> R$ <?php echo number_format($valor, 2, ',', '.'); ?></p>
    <p><b>Desconto Aplicado:</b> R$ <?php echo number_format($desconto, 2, ',', '.'); ?></p>
    <h3>Valor Final: R$ <?php echo number_format($valorFinal, 2, ',', '.'); ?></h3>

    <a href="index.php">Voltar a página inicial</a>
</div>

</body>
</html>