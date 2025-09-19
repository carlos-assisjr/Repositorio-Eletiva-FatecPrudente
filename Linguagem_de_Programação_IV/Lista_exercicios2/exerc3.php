<?php
include("cabecalho.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valorA = $_POST["valorA"];
    $valorB = $_POST["valorB"];
    if ($valorA != $valorB) {
        echo "$valorA $valorB";
    } else {
        echo "<p>Numeros iguais: $valorA";
    }
}
?>
<form method="post">
    <div class="mb-3">
        <label for="valorA" class="form-label">Informe o valor de A:</label>
        <input type="number" id="valorA" name="valorA" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="valorB" class="form-label">Informe o valor de B:</label>
        <input type="number" id="valorB" name="valorB" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
include("rodape.php");
?>