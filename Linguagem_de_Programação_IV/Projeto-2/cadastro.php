<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card-register {
            max-width: 450px;
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            background-color: #fff;
        }

        .card-register h2 {
            font-weight: 700;
            color: #333;
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
            color: #555;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
            border-color: #198754;
        }

        .btn-success {
            width: 100%;
            font-weight: 600;
            padding: 0.75rem;
            border-radius: 8px;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="card-register">
        <h2>Cadastro de Usuário</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="nomeCadastro" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nomeCadastro" name="nome" placeholder="Digite seu nome completo" required />
            </div>
            <div class="mb-3">
                <label for="emailCadastro" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailCadastro" name="email" placeholder="Digite seu email" required />
            </div>
            <div class="mb-4">
                <label for="senhaCadastro" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senhaCadastro" name="senha" placeholder="Digite uma senha" required />
            </div>
            <button type="submit" class="btn btn-success mb-3">Cadastrar</button>
        </form>
        <p class="text-center mt-4">
            Já tem uma conta?
            <a href="index.php">Faça login aqui</a>
        </p>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        require("conexao.php");
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha = password_hash($senha, PASSWORD_BCRYPT);
        try {
            $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
            if ($stmt->execute([$nome, $email, $senha])) {
                header("location: index.php?cadastro=true");
            } else {
                header("location: index.php?cadastro=false");
            }
        } catch (Exception $e) {
            echo "Erro ao executar o comando SQL: " . $e->getMessage();
        }
    }
    ?>
</body>

</html>