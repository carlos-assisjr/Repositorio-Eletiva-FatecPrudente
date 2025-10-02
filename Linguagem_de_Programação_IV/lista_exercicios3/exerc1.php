<?php
include("cabecalho.php");
?>
<h4>conte a quantidade de letras</h4>
<form method="post">
    <div class="mb-3">
        <label for="palavra" class="form-label">informe uma palavra:</label>
        <input type="text" id="palavra" name="palavra" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $palavra = $_POST['palavra'];
    echo "<p>$palavra contém: " . strlen($palavra) .   " caracteres </p>";
}
include("rodape.php");
?>
