<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conversão de temperatura Cº para Fº</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Conversão de temperatura de Fº para Cº</h1>
        <form method="post">
            <div class=" mb-3">
                <label for="temperatura" class="form-label">Digite a temperatura em Fº:</label>
                <input type="number" id="temperatura" name="temperatura" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $temperatura = $_POST['temperatura'];
            $conversao = ($temperatura - 32) * (5 / 9);
            echo "<p> A temperatura em Graus Celsius é: $conversao </p>";
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>