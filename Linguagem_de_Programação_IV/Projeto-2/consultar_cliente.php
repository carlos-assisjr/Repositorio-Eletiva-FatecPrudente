<?php
    require("cabecalho.php");
    require("conexao.php");
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        try{
            $stmt = $pdo->prepare("SELECT * from cliente WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo "Erro ao consultar categoria: ".$e->getMessage();
        }
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        try{
            $stmt = 
                $pdo->prepare("DELETE from cliente WHERE id = ?");
            if($stmt->execute([$id])){
                header('location: cliente.php?excluir=true');
            } else {
                header('location: cliente.php?excluir=false');
            }
        }catch(\Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>

    <h1>Consultar Cliente</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do cliente:</label>
            <input disabled value="<?= $cliente['nome']?>" type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <p>Deseja excluir esse registro?</p>
        <button type="submit" class="btn btn-danger">Excluir</button>
        <button onclick="history.back();" type="button" class="btn btn-secondary">
            Voltar
        </button>
    </form>

<?php
    require("rodape.php");
?>