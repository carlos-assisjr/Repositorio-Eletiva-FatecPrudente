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
        <h5 class="mt-5">Formulário 3</h5>
        <div class="border p-3 rounded mb-4">
            <!--p = padding (margem interna / espaçamento dentro)-->
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    </div>
</body>

</html>