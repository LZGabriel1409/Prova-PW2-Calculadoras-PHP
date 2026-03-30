<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Simulador de Frete "Logística Express"</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bem vindo ao Simulador de Frete "Logística Express"</h1>
    <h2>Por favor digite as informações do seu produto</h2>

    <form action="frete.php" method="post">
        <label for="peso">Peso (em kg):</label>
        <input name="peso" id="peso" type="number">
        <p></p>
        <label for="dist">Distância total (em km):</label>
        <input name="dist" id="dist" type="number">
        <p></p>

        <button type="submit">Enviar</button>
    </form>
    <?php
    $dist = $_POST["dist"];
    $peso = $_POST["peso"];
    $valor = 0;
    $valorex = 0;
    $rvalor = "R$ " . number_format($valor, 2, ",");
    $rvalorex = "R$ " . number_format($valorex, 2, ",");

    $valor = 10 + (0.5 * $dist);
    if ($peso > 20) {
        $valor = $valor + 30;
    };

    echo "<p>Informações digitadas pelo usuário:</p>";
    echo "<p>O peso do produto: $peso kg</p>";
    if ($peso > 20) {
        echo "<p>Devido ao peso ser maior que 20kg, adicionamos uma taxa de R$30,00.</p>";
    };
    echo "<p>Distância da entrega: $dist km</p>";
    echo "<strong><h1>Valores Finais: </h1></strong>";
    echo "<h3>O valor total é de: $valor</h3>";
    $valorex = ($valor / 20) + $valor;
    echo "<h4>Valor com envio expresso: $valorex</h4>";
    ?>
</body>
</html>
