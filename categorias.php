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
            <h1 class="m-0">Categorias</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Categorias</li>
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
            <button type="button" style="width:100%" class="btn btn-info" data-toggle="modal" data-target="#modalNovaCategoria">
              Nova categoria
            </button>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Categoria</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    $queryCategorias = $mySQL->sql("SELECT * FROM `categoria` ORDER BY categoria_nome ASC");
                    while($dataCategorias = mysqli_fetch_array($queryCategorias)){
                  ?>
                <tr>
                  <td><?=$dataCategorias['categoria_nome']?></td>
                  <td align="center" style="width:15%">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEditarCategoria<?=$dataCategorias['categoria_id']?>">
                      <i class="fa fa-edit"></i>
                    </button>
                    <a href="categorias.php?action=deletarCategoria&deletarCategoria=<?=$dataCategorias['categoria_id']?>" onclick="return confirm('Tem certeza que deseja deletar a categoria <?=$dataCategorias['categoria_nome']?>?\nOs produtos que têm apenas essa categoria associada também serão excluídos.') ">
                      <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir">
                        <i class="fa fa-trash"></i>
                      </button>
                    </a>
                  </td>
                </tr>

                      <!-------------------------------------------------- MODAL DE EDITAR CATEGORIA -------------------------------------------------->

                <div class="modal fade" id="modalEditarCategoria<?=$dataCategorias['categoria_id']?>" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content bg-info">
                      <div class="modal-header">
                        <h4 class="modal-title">Editar categoria | <?=$dataCategorias['categoria_nome']?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <form  id ="editarCategoria" method="POST" action="">
                        <div class="modal-body">
                          <div class="col-md-12">
                            <label for="categoria_nome">Nome:</label>
                            <input class="form-control" style="width:100%" type="text" name="categoria_nome" value="<?=$dataCategorias['categoria_nome']?>" id="categoria_nome" maxlength="20">
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                          <button type="submit" name="editarCategoria" class="btn btn-outline-light">
                            <input type="hidden" name="categoria_id" value="<?=$dataCategorias['categoria_id']?>">
                            Aplicar
                          </button>
                        </div>
                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

                      <!-------------------------------------------------- FIM MODAL DE EDITAR CATEGORIA -------------------------------------------------->

                  <?php
                    }
                  ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Categoria</th>
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
  include('deletarCategoria.php');
  include('editarCategoria.php');
  include('cadastrarCategoria.php');
  include('includes/footer.php');
?>

<!-------------------------------------------------- MODAL DE NOVA CATEGORIA -------------------------------------------------->

<div class="modal fade" id="modalNovaCategoria" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h4 class="modal-title">Nova categoria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form  id ="cadastrarCategoria" method="POST" action="">
        <div class="modal-body">
          <div class="col-md-12">
            <label for="categoria_nome">Nome:</label>
            <input class="form-control" style="width:100%" type="text" name="categoria_nome" id="categoria_nome" maxlength="20">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="cadastrarCategoria" class="btn btn-outline-light">Cadastrar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
