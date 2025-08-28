<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calcule com o desconto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Calcule com o desconto</h1>
        <form method="post" action="exerc16_calcule_desconto.php">
            <div class="mb-3">
                <label for="preco" class="form-label">Infome o preço:</label>
                <input type="number" id="preco" name="preco" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="desconto" class="form-label">Digite o percentual do Desconto:</label>
                <input type="text" id="desconto" name="desconto" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>