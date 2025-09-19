<?php
include("cabecalho.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = $_POST['numero'];
    $i = $numero;
    while ($i >= 1) {
        echo "<p>a contagem regressiva:  {$i} </p>";
        $i--;
    }
}

?>
<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">informe numero:</label>
        <input type="number" Sid="numero" name="numero" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
include("rodape.php");
?>