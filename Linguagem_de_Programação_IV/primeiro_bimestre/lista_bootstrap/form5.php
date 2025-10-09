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
        <h5 class="mt-5">Formulário 5</h5>
        <div class="border p-3 rounded mb-4">
            <!--p = padding (margem interna / espaçamento dentro)-->
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