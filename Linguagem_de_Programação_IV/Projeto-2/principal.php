<?php
require("cabecalho.php");
?>

<div class="row mb-4">
  <div class="col-12">
    <h1 class="display-5">Olá, <?= $_SESSION['nome'] ?>!</h1>
    <form action="logout.php" method="post">
      <button type="danger" class="btn btn-danger mb-3">Sair</button>
    </form>
    <p class="lead">Painel de Controle do Sistema de Ingressos.</p>
  </div>
</div>

<div class="row g-4">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card text-white bg-success h-100">
        <div class="card-body text-center">
          <h3 class="card-title">💲</h3>
          <h5 class="card-title">Nova Venda</h5>
          <p class="card-text">Registrar venda de ingresso.</p>
          <a href="nova_venda.php" class="btn btn-light text-success fw-bold w-100">Vender Agora</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card border-secondary h-100">
        <div class="card-body text-center">
          <h3 class="card-title text-secondary">📊</h3>
          <h5 class="card-title text-secondary">Relatórios</h5>
          <p class="card-text">Ver histórico de vendas.</p>
          <a href="relatorio.php" class="btn btn-outline-secondary w-100">Consultar</a>
        </div>
      </div>
    </div>
  </div>

</div>

<?php
require("rodape.php");
?>