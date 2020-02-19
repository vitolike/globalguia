<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h3">Painel Inicial</h3>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group">
            <div class="dropdown dropleft">
              <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-plus"> </i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" data-toggle="modal" data-target=".modal-anuncios" href="#">Novo Anúncio</a>
                <a class="dropdown-item" data-toggle="modal" data-target=".modal-clientes" href="#">Novo Cliente</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <br>
      <?php if ($msg == 'erro'): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;</strong> Arquivo de imagem incompativel com o sistema.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>

		<?php elseif ($msg == 'sucesso'): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> Foi adicionado com sucesso!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
		<?php endif; ?>
      <br>

    <div class="card">
      
      <div class="card-body">
        <h5 class="card-title">Anúncios</h5>
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
  <tbody><?php foreach($anuncios as $result) {?>
    <tr>
      <th scope="row"><?= $result->id; ?></th>
      <td><?= $result->descricao; ?></td>
      <td><?= $result->telefone; ?></td>
      <td width="200"> 
          <button type="button" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Editar</button>
          <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Apagar</button>
    </td>
    </tr><?php }?>
    
</table>


      </div>
      </div>
    </div>

<br>
<br>
    <div class="card">
      
      <div class="card-body">
        <h5 class="card-title">Anúnciantes</h5>
        <br>
      <div class="table-responsive">
       
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Anúnciante</th>
      <th scope="col">CNPJ/CPF</th>
      <th scope="col">Telefone</th>
      <th scope="col">Atalhos</th>
    </tr>
  </thead>
  <tbody><?php foreach($anunciantes as $r) {?>
    <tr>
      <th scope="row"><?= $r->id; ?></th>
      <td><?= $r->nome; ?></td>
      <td><?= $r->cnpj; ?></td>
      <td><?= $r->telefone; ?></td>
      <td width="200"> 
          <button type="button" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Editar</button>
          <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Apagar</button>
    </td>
    </tr><?php }?>
    
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
            <input type="text" class="form-control" name="descricao">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Telefone</label>
              <input type="text" class="form-control" name="telefone">
            </div>
            <div class="form-group col-md-6">
              <label for="inputState">Anúnciante</label>
              <select name="anunciante" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
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
        <button type="submit" class="btn btn-primary">Salvar</button></form>
      </div>
    </div>
  </div>
</div>


<!-- MODAL NOVO CLIENTE -->

<div class="modal fade modal-clientes" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Novo Anúncio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Preencha com os dados do seu cliente/anúnciante.</p>

        <form action="<?= base_url(); ?>admin/add_cliente" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="inputAddress">Anúnciante</label>
            <input type="text" class="form-control" name="nome">
          </div>
          <div class="form-group">
            <label for="inputAddress">CNPJ/CPF</label>
            <input type="text" class="form-control" name="cnpj">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Telefone</label>
              <input type="text" class="form-control" name="telefone">
            </div>
            <div class="form-group col-md-6">
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