<?php
include("cabecalho.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $palavra = $_POST['palavra'];
    $palavra2 = $_POST['palavra2'];

    $posicao = strpos($palavra, "$palavra2") . "</p>";
    echo "<p> A palavra '$palavra2' está contida em '$palavra' na posição $posicao</p>";
}
?>
<h1>verifique se a segunda palavra está contida na primeira</h1>
<form method="post">
    <div class="mb-3">
        <label for="palavra" class="form-label">informe uma palavra:</label>
        <input type="text" id="palavra" name="palavra" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="palavra2" class="form-label">informe uma palavra:</label>
        <input type="text" id="palavra2" name="palavra2" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
include("rodape.php");
?>