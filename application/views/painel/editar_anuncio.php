

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   <div class="card"> 
  <h5 class="card-header">Editar Anúncio</h5>
      <div class="card-body">
      
         <br>
         <form action="<?= base_url(); ?>admin/update_anuncio/<?= $query[0]->id; ?>" enctype="multipart/form-data" method="post">

            <div class="row">
               <div class="col-sm">
                  <div class="form-group">
                    <img src="<?= base_url(); ?>public/uploads/<?= $query[0]->foto; ?>" class="rounded mx-auto d-block img-fluid" width="250" height="250">
                    
                  </div>
               </div>
               <div class="col-sm">
                  <div class="form-group">
                     <label for="inputAddress">Descrição</label>
                     <input type="text" class="form-control" name="descricao" value="<?= $query[0]->descricao; ?>" required>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="inputCity">Telefone</label>
                        <input type="number" class="form-control" name="telefone" value="<?= $query[0]->telefone; ?>" required> 
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
                     <div class="form-group">
                  <div class="custom-file">
                     <label for="inputState">Foto</label>
                     <input type="file" id="foto" name="foto" value="<?= $query[0]->foto; ?>" >
                  </div>
               </div>
                     <div class="form-group">
                     <button type="submit" class="btn btn-info">Salvar</button> <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target=".modal-anuncios">Criar novo anúncio</button>
                     </div>
                  </div>
               </div>
            </div>
        </form>
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

