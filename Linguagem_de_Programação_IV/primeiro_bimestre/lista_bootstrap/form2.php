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
        <h5 class="mt-5">Formulário 2</h5>
        <div class="border p-3 rounded mb-4">
            <!--p = padding (margem interna / espaçamento dentro)-->
            <form>
                <div class="row g-3">
                    <div class="col-1 ">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="number" name="codigo" id="codigo" class="form-control">
                    </div>
                    <div class="col-5">
                        <label for="nome_cliente" class="form-label">Nome</label>
                        <input type="text" name="nome_cliente" id="nome_cliente" placeholder="Nome completo do cliente"
                            class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="email_cliente" class="form-label">Email</label>
                        <input type="email" name="email_cliente" id="email_cliente" placeholder="email@dominio.com"
                            class="form-control">
                    </div>
                    <div class="col">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="number" name="cpf" id="cpf" placeholder="Só números" class="form-control">
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-2">
                        <label for="celular" class="form-label">Nº celular</label>
                        <input type="tel" name="celular" id="celular" placeholder="Nº celular" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="telefone" class="form-label">Nº telefone fixo</label>
                        <input type="tel" name="telefone" id="telefone" placeholder="Nº telefone" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" name="cep" id="cep" placeholder="ex: 88308070" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="logradouro" class="form-label">Logradouro</label>
                        <input type="text" name="logradouro" id="logradouro" placeholder="ex: Rua 190."
                            class="form-control">
                    </div>
                    <div class="col">
                        <label for="numero" class="form-label">Nº</label>
                        <input type="number" name="numero" id="numero" placeholder="Nº" class="form-control">
                    </div>
                    <div class="col-3">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="form-control">
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Cidade" class="form-control">
                    </div>
                    <div class="col">
                        <label for="uf" class="form-label">UF</label>
                        <input type="text" name="uf" id="uf" placeholder="UF" class="form-control">
                    </div>
                    <div class="col">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select">
                            <option selected>Selecione</option>
                            <option value="1">...</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col text-end">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-success">Próximo</button>
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