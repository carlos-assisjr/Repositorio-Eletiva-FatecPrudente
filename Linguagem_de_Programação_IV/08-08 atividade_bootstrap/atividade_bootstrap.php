<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atividade Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-4">
        <!--my significa margin vertical (em cima e embaixo)-->
        <!-- Formulário 1 -->
        <h5 class="mt-4">Formulário 1</h5> <!-- mt = margem no topo , mb = margem embaixo-->
        <div class="border p-3 rounded mb-4">
            <!--p = padding (margem interna / espaçamento dentro)-->
            <form>
                <div class="row g-3">
                    <div class="col">
                        <label for="first_name" class="form-label">First name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="First name"
                            class="form-control">
                    </div>
                    <div class="col">
                        <label for="last_name" class="form-label">Last name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Last name" class="form-control">
                    </div>
                    <div class="col">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" placeholder="Username" id="username"
                                name="username">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-2">
                    <div class="col-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" placeholder="City" class="form-control">
                    </div>
                    <div class="col">
                        <label for="state" class="form-label">State</label>
                        <input type="text" name="state" id="state" placeholder="State" class="form-control">
                    </div>
                    <div class="col">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="text" name="zip" id="zip" placeholder="Zip" class="form-control">
                    </div>
                </div>

                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" id="terms">
                    <!--para ter o checkbox-->
                    <label class="form-check-label" for="terms">Agree to terms and conditions</label>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Submit
                        form</button><!-- primary é para o botão ficar azul -->
                </div>
            </form>
        </div>
        <!-- Formulário 2 -->
        <h5 class="mt-5">Formulário 2</h5>
        <div class="border p-3 rounded mb-4">
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
        <!-- Formulário 3 -->
        <h5 class="mt-5">Formulário 3</h5>
        <div class="border p-3 rounded mb-4">
            <form>
                <h3 class="text-center">Sample Form</h3>
                <div class="row g-3">
                    <div class="col">Partner Name</div>
                    <div class="col-4">
                        <input type="text" name="partner_name" id="partner_name" class="form-control">
                    </div>
                    <div class="col">Partner Email ID</div>
                    <div class="col-4">
                        <input type="email" name="partner_email" id="partner_email" class="form-control">
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col">Partner Legal Name</div>
                    <div class="col-4">
                        <input type="text" name="partner_legal_name" id="partner_legal_name" class="form-control">
                    </div>
                    <div class="col">Partner Mobile</div>
                    <div class="col-4">
                        <input type="text" name="partner_mobile" id="partner_mobile" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">Partner Address</div>
                    <div class="col-10">
                        <textarea id="partner_address" name="partner_address" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col">Contract Start Date</div>
                    <div class="col-4">
                        <input type="date" name="data_start" id="data_start" class="form-control">
                    </div>
                    <div class="col">Contract Expiry Date</div>
                    <div class="col-4">
                        <input type="date" name="data_expiry" id="data_expiry" class="form-control">
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col">Minimum Loan Amount</div>
                    <div class="col-4">
                        <input type="text" name="min_loan" id="min_loan" class="form-control">
                    </div>
                    <div class="col">Maximum Loan Amount</div>
                    <div class="col-4">
                        <input type="text" name="max_loan" id="max_loan" class="form-control">
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col">Interest Rate</div>
                    <div class="col-4">
                        <input type="text" name="interest_rate" id="interest_rate" class="form-control">
                    </div>
                    <div class="col">Deposit Amount</div>
                    <div class="col-4">
                        <input type="text" name="deposit_amount" id="deposit_amount" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Formulário 4 -->
        <h5 class="mt-5">Formulário 4</h5>
        <h3>Novo Usúario</h3>
        <div class="border p-3 rounded mb-4">
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
        <!-- Formulário 5-->
        <h5 class="mt-5">Formulário 5</h5>
        <div class="border p-3 rounded mb-4 bg-light">
            <form>
                <h4>Billing Address</h4>
                <div class="row g-3 mt-1">
                    <div class="col">
                        <label for="first_name" class="form-label">First name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="First name"
                            class="form-control">
                    </div>
                    <div class="col">
                        <label for="last_name" class="form-label">Last name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Last name" class="form-control">
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" placeholder="Usuário" id="username" name="username">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col">
                        <label for="email" class="form-label">Email (opcional)</label>
                        <input type="email" name="email" id="email" placeholder="you@example.com" class="form-control">
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col">
                        <label for="Address" class="form-label">Address</label>
                        <input type="text" name="Address" id="Address" placeholder="1234 Main St" class="form-control">
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col">
                        <label for="Address_2" class="form-label">Address 2 (opcional)</label>
                        <input type="text" name="Address_2" id="Address_2" placeholder="Apartment or suite"
                            class="form-control">
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-5">
                        <label for="country" class="form-label">Country</label>
                        <select id="country" name="country" class="form-select">
                            <option selected>Choose...</option>
                            <option value="1">Brasil</option>
                        </select>
                    </div>
                    <div class="col-5">
                        <label for="state" class="form-label">State</label>
                        <select id="state" name="state" class="form-select">
                            <option selected>Choose...</option>
                            <option value="1">Paraná</option>
                            <option value="2">Rio de Janeiro</option>
                            <option value="3">São Paulo</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="text" name="zip" id="zip" placeholder="Zip" class="form-control">
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