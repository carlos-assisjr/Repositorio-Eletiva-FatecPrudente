<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>exercício 3 -lista 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>exercício 3 -lista 2</h1>
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $valorA = $_POST["valorA"];
            $valorB = $_POST["valorB"];
            if ($valorA != $valorB){
                echo "$valorA $valorB";
            } else {
                echo "<p>Numeros iguais: $valorA";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>