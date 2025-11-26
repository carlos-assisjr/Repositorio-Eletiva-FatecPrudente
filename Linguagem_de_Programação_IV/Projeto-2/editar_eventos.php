<?php
    require("cabecalho.php");
    require("conexao.php");

    // 1. Busca os dados do evento atual para preencher o formulário
    if(isset($_GET['id'])){
        try {
            $stmt = $pdo->prepare("SELECT * FROM evento WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $evento = $stmt->fetch(PDO::FETCH_ASSOC);

            // Se o evento não existir, volta para a lista
            if(!$evento){
                header("location: eventos.php");
                exit;
            }
        } catch(Exception $e) {
            echo "<div class='alert alert-danger'>Erro ao buscar: " . $e->getMessage() . "</div>";
        }
    }

    // 2. Processa a atualização quando clica em Salvar
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $local = $_POST['local'];
        $data_evento = $_POST['data_evento'];
        $descricao = $_POST['descricao'];

        try {
            $sql = "UPDATE evento SET nome = ?, local = ?, data_evento = ?, descricao = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nome, $local, $data_evento, $descricao, $id]);
            
            // Redireciona para a listagem
            header("location: eventos.php");
            exit;
        } catch(Exception $e) {
            echo "<div class='alert alert-danger'>Erro ao atualizar: " . $e->getMessage() . "</div>";
        }
    }
?>

<div class="card mt-4">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0">Editar Evento</h4>
    </div>
    <div class="card-body">
        <form method="post">
            <input type="hidden" name="id" value="<?= $evento['id'] ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Evento</label>
                <input type="text" name="nome" class="form-control" required value="<?= $evento['nome'] ?>">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="data_evento" class="form-label">Data e Hora</label>
                    <input type="datetime-local" name="data_evento" class="form-control" required 
                           value="<?= date('Y-m-d\TH:i', strtotime($evento['data_evento'])) ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="local" class="form-label">Local</label>
                    <input type="text" name="local" class="form-control" required value="<?= $evento['local'] ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3"><?= $evento['descricao'] ?></textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                <a href="eventos.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php require("rodape.php"); ?>