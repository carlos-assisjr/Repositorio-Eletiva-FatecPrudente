<?php include("cabecalho.php"); ?>
<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">informe um numero:</label>
        <input type="number" id="numero" name="numero" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = $_POST['numero'];
    for ($i = 1; $i <= $numero; $i++) {
        echo "<p>{$i}</p>";
    }
}
?>
<?php include("rodape.php"); ?>