    <?php
    // > < >= <= != == ===
    // && - e ||- ou !-  não
    include("cabecalho.php");

    $valor = "20";
    if (($valor > 20) && ($valor <= 30)) {
        echo "valor maior que 20";
    } else {
        echo "valor menor ou igual que 20";
    }
    include("rodape.php");

    ?>