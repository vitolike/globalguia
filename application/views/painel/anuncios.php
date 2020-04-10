

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

<?php if ($msg == 'erro'): ?>
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;</strong> Arquivo de imagem incompativel com o sistema.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <?php elseif ($msg == 'sucesso'): ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> O Anúncio foi adicionado com sucesso!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <?php elseif ($msg == 'apagado'): ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> O Anúncio foi apagado com sucesso!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <?php elseif ($msg == 'update'): ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> O Anúncio foi atualizado com sucesso!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <?php endif; ?>

   <div class="card">
      <div class="card-body">
         <div class="row">
            <div class="col-sm">
               <h4 class="card-title">Anúncios</h4>
            </div>
            <div class="col-sm">
            </div>
            <div class="col-sm">
            </div>
            <div class="col-sm">
            </div>
            <div class="col-sm">
               <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target=".modal-anuncios">Cadastrar novo</button>
            </div>
         </div>
         <br>
         <div class="table-responsive">
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Anúncio</th>
                     <th scope="col">Telefone</th>
                     <th scope="col">Atalhos</th>
                  </tr>
               </thead>
               <?php if(!$anuncios){?>
               <tbody>
                  <tr>
                     <td colspan="7">
                        <center>
                           <p> Não ha anúncios cadastrados. </p>
                        </center>
                     </td>
                  </tr>
               </tbody>
               <?php }else{ ?>
               <tbody>
                  <?php foreach($anuncios as $result) {?>
                  <tr>
                     <th scope="row"><?= $result->id; ?></th>
                     <td> <img class="img-fluid img-thumbnail" src="<?= base_url(); ?>public/uploads/<?= $result->foto; ?>" height="42" width="42"> <?= $result->descricao; ?></td>
                     <td><?= $result->telefone; ?></td>
                     <td width="200"> 
                        <a href="<?= base_url(); ?>admin/editar_anuncio/<?= $result->id; ?>" ><button type="button" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Editar</button></a>
                        <a href="<?= base_url(); ?>admin/del_anuncio/<?= $result->id; ?>" ><button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Apagar</button></a>
                     </td>
                  </tr>
                  <?php }?>
                  <?php }?>
            </table>
         </div>
      </div>
   </div>
</main>
</div>
</div>
<!-- MODAL NOVO ANUNCIO -->
<div class="modal fade modal-anuncios" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Novo Anúncio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p>Adicione aqui os dados do anúncio.</p>
            <form action="<?= base_url(); ?>admin/add_anuncio" enctype="multipart/form-data" method="post">
               <div class="form-group">
                  <label for="inputAddress">Descrição</label>
                  <input type="text" class="form-control" name="descricao" required>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="inputCity">Telefone</label>
                     <input type="number" class="form-control" name="telefone" required> 
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputState">Anúnciante</label>
                     <select name="anunciante" class="form-control" required>
                        <?php if(!$anunciantes){ ?>
                        <option>Não ha anunciantes cadastrados.</option>
                        <?php }else{ ?>  
                        <?php foreach($anunciantes as $res) {?>  
                        <option value="<?= $res->id; ?>"><?= $res->nome; ?></option>
                        <?php }?>
                        <?php }?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <div class="custom-file">
                     <label for="inputState">Foto</label>
                     <input type="file" id="foto" name="foto">
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
         <?php if(!$anunciantes){ ?>
         <?php }else{ ?>  
         <button type="submit" class="btn btn-primary">Salvar</button></form>
         <?php }?></form>
         </div>
      </div>
   </div>
</div>