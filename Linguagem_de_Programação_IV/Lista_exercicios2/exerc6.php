<?php
include("cabecalho.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = $_POST['numero'];
    for ($i = $numero - 1; $i > 1; $i++) {
    }
}
?>
<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">informe um numero:</label>
        <input type="number" id="numero" name="numero" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
include("rodape.php");
?>