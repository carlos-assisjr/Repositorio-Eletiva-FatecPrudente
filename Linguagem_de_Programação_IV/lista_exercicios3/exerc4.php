<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifique se a data informada é válida e apresente a data em formato dd/mm/YYYY.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Verifique se a data informada é válida e apresente a data em formato dd/mm/YYYY.</h1>
        <form method="post">
            <div class="mb-3">
                <label for="data" class="form-label">informe uma data:</label>
                <input type="date" id="data" name="data" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = $_POST['data'];
            $dia = date("d");
            $hora = date("H:i:s");
            echo "<p>data : $data</p>";
            echo "<p>dia: $dia</p>";
            echo "<p>hora: $hora</p>";
            if (checkdate($data)) {
                echo "<p>data informada existe</p>";
            } else {
                echo "<p>A data informada não existe</p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>