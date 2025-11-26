<?php
require("cabecalho.php");
require("conexao.php");

// 1. Busca os dados do cliente atual para preencher o formulário
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro ao buscar: " . $e->getMessage();
    }
}

// 2. Processa a atualização quando clica em Salvar
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];


    try {
        $stmt = $pdo->prepare("UPDATE cliente SET nome = ?, cpf = ?, email = ?, telefone = ? WHERE id = ?");

        if ($stmt->execute([$nome, $cpf, $email, $telefone, $id])) {
            header('location: cliente.php?editar=true');
        } else {
            header('location: cliente.php?editar=false');
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Erro ao atualizar: " . $e->getMessage() . "</div>";
    }
}
?>
<div class="card mt-4">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0">Editar Cliente</h4>
    </div>
    <div class="card-body">
        <form method="post" class="mt-3">
            <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" name="nome" class="form-control" required value="<?= $cliente['nome'] ?>">
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control" required value="<?= $cliente['cpf'] ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" required value="<?= $cliente['telefone'] ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required value="<?= $cliente['email'] ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="cliente.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>


<?php require("rodape.php"); ?>