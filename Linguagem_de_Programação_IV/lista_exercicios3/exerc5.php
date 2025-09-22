<?php
include("cabecalho.php");
?>
<h1>leia um valor e retorna a raiz quadrada desse número. </h1>
<form method="post">
    <div class="mb-3">
        <label for="valor" class="form-label">informe um valor:</label>
        <input type="number" id="valor" name="valor" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor = $_POST['valor'];
    echo "<p>Raiz quadrada de $valor é: " . sqrt($valor) . "</p>";
}
include("rodape.php");
?>