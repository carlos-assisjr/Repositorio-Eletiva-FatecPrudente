<?php
    require("cabecalho.php");
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require("conexao.php");
        
        // Coleta os dados do formulário
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        try {
            $stmt = $pdo->prepare("INSERT INTO cliente (nome, cpf, email, telefone) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nome, $cpf, $email, $telefone]);
            
            // Redireciona para a listagem com sucesso
            header("location: cliente.php");
        } catch(Exception $e) {
            // Exibe erro (ex: CPF duplicado)
            echo "<div class='alert alert-danger'>Erro ao cadastrar: " . $e->getMessage() . "</div>";
        }
    }
?>

<h2>Novo Cliente</h2>
<form method="post" class="mt-3">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome Completo</label>
        <input type="text" name="nome" id="nome" class="form-control" required placeholder="Ex: João da Silva">
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required placeholder="000.000.000-00">
        </div>
        
        <div class="col-md-4 mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" required placeholder="(00) 00000-0000">
        </div>

        <div class="col-md-4 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required placeholder="joao@email.com">
        </div>
    </div>

    <button type="submit" class="btn btn-success">Salvar Cliente</button>
    <a href="cliente.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php require("rodape.php"); ?>