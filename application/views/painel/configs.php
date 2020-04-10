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
      <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> O Admin foi atualizado com sucesso!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
<?php endif; ?>


<div class="card">
  <h5 class="card-header">Usuário administrador.</h5>
  <div class="card-body">

  <form action="<?= base_url(); ?>admin/update_admin/1" enctype="multipart/form-data" method="post">

<div class="form-group">
    <label for="inputAddress">Nome</label>
    <input type="text" class="form-control" name="nome" value="<?= $query[0]->nome; ?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" value="<?= $query[0]->email; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="senha">Senha</label>
      <button type="button" class="form-control" data-toggle="modal" data-target="#senhaModal"><i class="fas fa-key"></i>&nbsp; Alterar senha</button>
    </div>
  </div>

  
  <button type="submit" class="btn btn-info">Salvar</button>
</form>
  </div>
</div>

</main>
</div>
</div>
    <!-- Modal senha -->
    <div class="modal fade" id="senhaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Definir nova senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post" class="p-t-15" role="form" action="<?= base_url(); ?>admin/atualizar_senha">
  <div class="form-group">
    <label for="formGroupExampleInput">Senha antiga</label>
    <input type="password" class="form-control" id="senha_antiga" placeholder="Senha antiga">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Senha nova</label>
    <input type="password" class="form-control" id="senha_nova" name="senha_nova"  placeholder="Senha nova">
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar</button></form>
      </div>
    </div>
  </div>