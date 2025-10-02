<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <mel-scale=1">
        <title>Atividade Bootstrap</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-4">
        <!--my significa margin vertical (em cima e embaixo)-->
        <!-- Formulário 1 -->
        <h5 class="mt-4">Formulário 1</h5> 
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>