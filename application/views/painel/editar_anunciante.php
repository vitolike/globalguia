

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   <div class="card"> 
  <h5 class="card-header">Editar Anúncio</h5>
      <div class="card-body">
      
         <br>
         <form action="<?= base_url(); ?>admin/update_anunciante/<?= $query[0]->id; ?>" enctype="multipart/form-data" method="post">

            <div class="row">
               <div class="col-sm">
                  <div class="form-group">
                    <img src="<?= base_url(); ?>public/uploads/<?= $query[0]->logo; ?>" class="rounded mx-auto d-block img-fluid" width="250" height="250">
                    
                  </div>
               </div>
               <div class="col-sm">
                    <div class="form-group">
                        <label for="inputAddress">Anúnciante</label>
                        <input type="text" class="form-control" name="nome" value="<?= $query[0]->nome; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">CNPJ/CPF</label>
                        <input type="number" class="form-control" name="cnpj" value="<?= $query[0]->cnpj; ?>" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Telefone</label>
                            <input type="number" class="form-control" name="telefone" value="<?= $query[0]->telefone; ?>" required>
                        </div>
                        <div class="form-group col-md-6" required>
                            <label for="inputState">Status</label>
                            <select name="status" class="form-control">
                                <option selected>Ativo</option>
                                <option>Cancelado</option>
                                <option>Aguardando Pagamento</option>
                            </select>
                        </div>
                     <div class="form-group">
                  <div class="custom-file">
                     <label for="inputState">Logo</label>
                     <input type="file" id="logo" name="logo">
                  </div>
               </div>
                     <div class="form-group">
                     <button type="submit" class="btn btn-info">Salvar</button> <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target=".modal-clientes">Cadastrar novo anúnciante</button>
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
<!-- MODAL NOVO CLIENTE -->
<div class="modal fade modal-clientes" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Novo Anúnciante</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p>Preencha com os dados do seu cliente/anúnciante.</p>
            <form action="<?= base_url(); ?>admin/add_cliente" enctype="multipart/form-data" method="post">
               <div class="form-group">
                  <label for="inputAddress">Anúnciante</label>
                  <input type="text" class="form-control" name="nome" required>
               </div>
               <div class="form-group">
                  <label for="inputAddress">CNPJ/CPF</label>
                  <input type="number" class="form-control" name="cnpj" required>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="inputCity">Telefone</label>
                     <input type="number" class="form-control" name="telefone" required>
                  </div>
                  <div class="form-group col-md-6" required>
                     <label for="inputState">Status</label>
                     <select name="status" class="form-control">
                        <option selected>Ativo</option>
                        <option>Cancelado</option>
                        <option>Aguardando Pagamento</option>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <div class="custom-file">
                     <label for="inputState">Logo</label>
                     <input type="file" id="logo" name="logo">
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
         <button type="submit" class="btn btn-primary">Salvar</button></form>
         </div>
      </div>
   </div>
</div>


