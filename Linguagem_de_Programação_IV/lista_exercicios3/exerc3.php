<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>verifique se a segunda palavra está contida na primeira</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $palavra = $_POST['palavra'];
            $palavra2 = $_POST['palavra2'];

            $posicao = strpos($palavra, "$palavra2") . "</p>";
            echo "<p> A palavra '$palavra2' está contida em '$palavra' na posição $posicao</p>";
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>