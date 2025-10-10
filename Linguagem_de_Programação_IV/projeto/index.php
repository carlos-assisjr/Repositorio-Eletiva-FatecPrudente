<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Acesso ao Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card-login {
            max-width: 450px;
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            background-color: #fff;
        }

        .card-login h2 {
            font-weight: 700;
            color: #333;
            margin-bottom: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #555;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            border-color: #0d6efd;
        }

        .btn-primary {
            width: 100%;
            font-weight: 600;
            padding: 0.75rem;
            border-radius: 8px;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0b5ed7;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="card-login">
        <?php
        if (isset($_GET['cadastro'])) {
            $cadastro = $_GET['cadastro'];
            if ($cadastro) {
                echo "<p class='text-success'>Cadastro realizado com sucesso </p>";
            } else {
                echo '<p class="text-danger"> Erro ao realizar o cadrasto </p>';
            }
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            require('conexao.php');
            $email = $_POST['email'];
            $senha = ($_POST['senha']);
            try{
                $stmt =$pdo->prepare("SELECT * FROM usuario WHERE  email =?");
                $stmt->execute([$email]);
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                if($usuario && password_verify($senha,$usuario['senha'])){
                session_start();
                $_SESSION['acesso'] = true;
                $_SESSION['nome']  = $usuario['nome'];

                header('location:principal.php');       
            }else{
                echo"<p class='text-danger'>Credenciais inválidas!</p>";
            }
            }catch(\Exception $e){
                echo"ERRO: ",$e -> getMessage();
            }
        }
        ?>
        <h2 class="text-center">Acesso ao Sistema</h2>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="emailLogin" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailLogin" name="email" placeholder="Digite seu email" required />
            </div>
            <div class="mb-4">
                <label for="senhaLogin" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senhaLogin" name="senha" placeholder="Digite sua senha" required />
            </div>
            <button type="submit" class="btn btn-primary mb-3">Entrar</button>
        </form>
        <p class="text-center mt-4">
            Ainda não tem uma conta?
            <a href="cadastro.php">Cadastre-se aqui</a>
        </p>
    </div>
</body>

</html>