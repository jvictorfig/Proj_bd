<?php
require_once('includes/config.php');
//inclui o header
require_once('includes/header.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Produtos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Produtos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <button style="width:100%" class="btn btn-info" name="novoProduto"> Novo Produto </button>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Categoria</th>
                  <th>Valor</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    $queryProdutos = $mySQL->sql("SELECT * FROM `produto` ORDER BY produto_nome ASC");
                    while($dataProdutos = mysqli_fetch_array($queryProdutos)){
                  ?>
                <tr>
                  <td><?=$dataProdutos['produto_nome']?></td>
                  <td><?=$dataProdutos['produto_categoria_id']?></td>
                  <td>R$<?=$dataProdutos['produto_valor']?></td>
                  <td align="center" style="width:15%">
                    <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                  <?php
                    }
                  ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Nome</th>
                  <th>Categoria</th>
                  <th>Valor</th>
                  <th>Ações</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    include('includes/footer.php');
  ?>
