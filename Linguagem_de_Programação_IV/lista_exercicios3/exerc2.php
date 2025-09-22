<?php
include("cabecalho.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $palavra = $_POST['palavra'];
    echo "<p> todas em maiusculo: " . strtoupper($palavra) . "</p>";
    echo "<p> todas em minuscula: " . strtolower($palavra) . "</p>";
}
?>
<h1>maiúsculas - minúscula</h1>
<form method="post">
    <div class="mb-3">
        <label for="palavra" class="form-label">informe uma palavra:</label>
        <input type="text" id="palavra" name="palavra" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
include("rodape.php");
?>