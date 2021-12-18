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
            <button type="button" style="width:100%" class="btn btn-info" data-toggle="modal" data-target="#modalNovoProduto">
              Novo produto
            </button>
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
                    $queryProdutos = $mySQL->sql("SELECT * FROM `produto` ORDER BY produto_nome ASC;");
                    while($dataProdutos = mysqli_fetch_array($queryProdutos)){
                  ?>
                <tr>
                  <td><?=$dataProdutos['produto_nome']?></td>
                  <td>
                    <?php
                      nomeCategoria($dataProdutos['produto_id'])
                    ?>
                    <button class="btn btn-danger" style="float:right" data-toggle="modal" data-target="#modalDeletarProdutoCategoria<?=$dataProdutos['produto_id']?>"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-success" style="float:right" data-toggle="modal" data-target="#modalNovoProdutoCategoria<?=$dataProdutos['produto_id']?>"><i class="fa fa-plus"></i></button>
                  </td>
                  <td>R$<?=$dataProdutos['produto_valor']?></td>
                  <td align="center" style="width:15%">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEditarProduto<?=$dataProdutos['produto_id']?>">
                      <i class="fa fa-edit"></i>
                    </button>
                    <a href="index.php?action=deletarProduto&deletarProduto=<?=$dataProdutos['produto_id']?>" onclick="return confirm('Tem certeza que deseja deletar o produto <?=$dataProdutos['produto_nome']?>?') ">
                      <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir">
                        <i class="fa fa-trash"></i>
                      </button>
                    </a>
                  </td>
                </tr>

                <!-------------------------------------------------- MODAL DE EDITAR PRODUTO -------------------------------------------------->

                <div class="modal fade" id="modalEditarProduto<?=$dataProdutos['produto_id']?>" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content bg-info">
                      <div class="modal-header">
                        <h4 class="modal-title">Editar produto | <?=$dataProdutos['produto_nome']?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <form  id ="editarProduto" method="POST" action="">
                        <div class="modal-body">
                          <div class="col-md-12">
                            <label for="produto_nome">Nome:</label>
                            <input class="form-control" style="width:100%" type="text" name="produto_nome" value="<?=$dataProdutos['produto_nome']?>" id="produto_nome" maxlength="20">
                          </div>
                          <div class="col-md-12">
                            <label for="produto_valor">Valor:</label>
                            <input class="form-control" style="width:100%" type="text" name="produto_valor" value="<?=$dataProdutos['produto_valor']?>" id="produto_valor" maxlength="20">
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                          <button type="submit" name="editarProduto" class="btn btn-outline-light">
                            <input type="hidden" name="produto_id" value="<?=$dataProdutos['produto_id']?>">
                            Aplicar
                          </button>
                        </div>
                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

                      <!-------------------------------------------------- FIM MODAL DE EDITAR PRODUTO -------------------------------------------------->

                      <!-------------------------------------------------- MODAL DE NOVO PRODUTO-CATEGORIA -------------------------------------------------->

                <div class="modal fade" id="modalNovoProdutoCategoria<?=$dataProdutos['produto_id']?>" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content bg-success">
                      <div class="modal-header">
                        <h4 class="modal-title">Novo produto-categoria</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <form  id ="cadastrarProdutoCategoria" method="POST" action="">
                        <div class="modal-body">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Categoria:</label>
                              <select name="categoria_id" class="form-control">
                                <option selected="" value="" disabled="">Escolha uma categoria</option>
                                <?php
                                  $sqlCategoria = $mySQL->sql(" SELECT * 
                                                                FROM categoria
                                                                WHERE categoria_id NOT IN 
                                                                  (SELECT c.categoria_id 
                                                                  FROM categoria c 
                                                                  INNER JOIN produto_categoria pc ON (c.categoria_id = pc.categoria_id) 
                                                                  WHERE pc.produto_id = '".$dataProdutos['produto_id']."')
                                                                ORDER BY categoria_nome ASC");
                                  while($dataCategoria = mysqli_fetch_array($sqlCategoria)){
                                ?>
                                  <option value="<?=$dataCategoria['categoria_id']?>"><?=$dataCategoria['categoria_nome']?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                          <button type="submit" name="cadastrarProdutoCategoria" class="btn btn-outline-light">
                            <input type="hidden" name="produto_id" value="<?=$dataProdutos['produto_id']?>">
                            <input type="hidden" name="produto_nome" value="<?=$dataProdutos['produto_nome']?>">
                            Cadastrar
                          </button>
                        </div>
                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

                <!-------------------------------------------------- FIM MODAL DE NOVO PRODUTO-CATEGORIA -------------------------------------------------->

                      <!-------------------------------------------------- MODAL DE DELETAR PRODUTO-CATEGORIA -------------------------------------------------->

                <div class="modal fade" id="modalDeletarProdutoCategoria<?=$dataProdutos['produto_id']?>" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                      <div class="modal-header">
                        <h4 class="modal-title">Deletar produto-categoria</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <form  id ="deletarProdutoCategoria" method="POST" action="">
                        <div class="modal-body">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Categoria:</label>
                              <select name="categoria_id" class="form-control">
                                <option selected="" value="" disabled="">Escolha uma categoria</option>
                                <?php
                                  $sqlDeletarCategoria = $mySQL->sql(" SELECT c.* 
                                                                FROM categoria c
                                                                INNER JOIN produto_categoria pc ON (c.categoria_id = pc.categoria_id)
                                                                WHERE pc.produto_id = '".$dataProdutos['produto_id']."';
                                                                ");
                                  while($dataDeletarCategoria = mysqli_fetch_array($sqlDeletarCategoria)){
                                ?>
                                  <option value="<?=$dataDeletarCategoria['categoria_id']?>"><?=$dataDeletarCategoria['categoria_nome']?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                          <button type="submit" name="deletarProdutoCategoria" class="btn btn-outline-light">
                            <input type="hidden" name="produto_id" value="<?=$dataProdutos['produto_id']?>">
                            <input type="hidden" name="produto_nome" value="<?=$dataProdutos['produto_nome']?>">
                            Deletar
                          </button>
                        </div>
                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

                <!-------------------------------------------------- FIM MODAL DE DELETAR PRODUTO-CATEGORIA -------------------------------------------------->

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
    include('deletarProdutoCategoria.php');
    include('cadastrarProdutoCategoria.php');
    include('deletarProduto.php');
    include('editarProduto.php');
    include('cadastrarProduto.php');
    include('includes/footer.php');
  ?>

<!-------------------------------------------------- MODAL DE NOVO PRODUTO -------------------------------------------------->

<div class="modal fade" id="modalNovoProduto" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h4 class="modal-title">Novo produto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form  id ="cadastrarProduto" method="POST" action="">
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form group">
              <label for="produto_nome">Nome:</label>
              <input class="form-control" style="width:100%" type="text" name="produto_nome" id="produto_nome" maxlength="20">
            </div>
            <div class="form-group">
              <label for="produto_nome">Valor:</label>
              <input class="form-control" style="width:100%" type="text" name="produto_valor" id="produto_valor" maxlength="10">
            </div>
            <div class="form-group">
              <label>Categoria principal:</label>
              <select name="categoria_id" class="form-control">
                <option selected="" value="" disabled="">Escolha uma categoria</option>
                <?php
                  $sqlCategoria = $mySQL->sql("SELECT * FROM categoria ORDER BY categoria_nome ASC");
                  while($dataCategoria = mysqli_fetch_array($sqlCategoria)){
                ?>
                  <option value="<?=$dataCategoria['categoria_id']?>"><?=$dataCategoria['categoria_nome']?></option>
                <?php
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="cadastrarProduto" class="btn btn-outline-light">Cadastrar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-------------------------------------------------- FIM MODAL DE NOVO PRODUTO -------------------------------------------------->
