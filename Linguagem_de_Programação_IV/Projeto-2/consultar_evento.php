<?php
    require("cabecalho.php");
    require("conexao.php");
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        try{
            $stmt = $pdo->prepare("SELECT * from evento WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $evento = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo "Erro ao consultar categoria: ".$e->getMessage();
        }
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        try{
            $stmt = 
                $pdo->prepare("DELETE from evento WHERE id = ?");
            if($stmt->execute([$id])){
                header('location: eventos.php?excluir=true');
            } else {
                header('location: eventos.php?excluir=false');
            }
        }catch(\Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>

    <h1>Consultar Evento</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $evento['id'] ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do evento:</label>
            <input disabled value="<?= $evento['nome']?>" type="text" id="nome" name="nome" class="form-control" required="">
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