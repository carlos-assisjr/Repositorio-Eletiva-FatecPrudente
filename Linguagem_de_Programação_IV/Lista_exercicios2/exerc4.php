<?php include("cabecalho.php");?>

<form method="post">
    <div class="mb-3">
        <label for="valor" class="form-label">informe o valor do produto:</label>
        <input type="number" step="0.01" id="valor" name="valor" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor = $_POST["valor"];
    if ($valor > 100) {
        $valor -= $valor * (15 / 100);
        echo "<p> o novo valor após desconto de 15%: $valor</p>";
    } else {
        echo "<p>O valor do produto é: $valor<p>";
    }
}
?>
<?php include("rodape.php");?>
