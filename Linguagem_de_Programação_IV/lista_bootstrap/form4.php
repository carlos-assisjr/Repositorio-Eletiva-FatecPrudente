<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atividade Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-4">
        <!--my significa margin vertical (em cima e embaixo)-->
        <h5 class="mt-5">Formulário 4</h5>
        <h3>Novo Usúario</h3>
        <div class="border p-3 rounded mb-4">
            <!--p = padding (margem interna / espaçamento dentro)-->
            <form>
                <div class="row g-3">
                    <!--class="row g-3" para dar espaçamento vertical/horizontal automático entre colunas.-->
                    <div class="col">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" name="nome" id="nome" placeholder="Informe o Nome" class="form-control">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-3">
                        <label for="cpf" class="form-label">CPF:</label>
                        <input type="text" name="cpf" id="cpf" placeholder="Informe o CPF" class="form-control">
                    </div>
                    <div class="col-7">
                        <label for="endereço" class="form-label">Endereço:</label>
                        <input type="text" name="endereço" id="endereço" placeholder="Informe o Endereço"
                            class="form-control">
                    </div>
                    <div class="col">
                        <label for="nível" class="form-label">Nível:</label>
                        <select id="nível" name="nível" class="form-select">
                            <option selected>---</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>
                <div class="row g-3">
                    <!--class="row g-3" para dar espaçamento vertical/horizontal automático entre colunas.-->
                    <div class="col-7">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" name="Email" id="Email" placeholder="Informe o Email" class="form-control">
                    </div>
                    <div class="col-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" name="Senha" id="Senha" placeholder="Informe a Senha"
                            class="form-control">
                    </div>
                    <div class="col">
                        <label for="status" class="form-label">Status:</label>
                        <select id="status" name="status" class="form-select">
                            <option selected>---</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col text-end">
                        <button type="submit" class="btn btn-success">Enviar</button>
                        <button type="cancelar" class="btn btn-light">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    </div>
</body>

</html>