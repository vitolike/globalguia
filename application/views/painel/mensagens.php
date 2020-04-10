

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
      <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> A mensagen foi adicionado com sucesso!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <?php elseif ($msg == 'apagado'): ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> O mensagen foi apagada com sucesso!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <?php elseif ($msg == 'update'): ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> A mensagen foi atualizada com sucesso!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <?php endif; ?>

   <div class="card">
      <div class="card-body">
         <div class="row">
            <div class="col-sm">
               <h4 class="card-title">Mensagens</h4>
            </div>
         </div>
         <br>
         <div class="table-responsive">
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Nome</th>
                     <th scope="col">E-mail</th>
                     <th scope="col">Celular</th>
                     <th scope="col">Assunto</th>
                     <th scope="col">Mensagem</th>
                  </tr>
               </thead>
               <?php if(!$mensagens){?>
               <tbody>
                  <tr>
                     <td colspan="7">
                        <center>
                           <p> Não ha mensagens. </p>
                        </center>
                     </td>
                  </tr>
               </tbody>
               <?php }else{ ?>
               <tbody>
                  <?php foreach($mensagens as $result) {?>
                  <tr>
                     <th scope="row"><?= $result->id; ?></th>
                     <td><?= $result->nome; ?></td>
                     <td><?= $result->email; ?></td>
                     <td><?= $result->celular; ?></td>
                     <td><?= $result->assunto; ?></td>
                     <td><?= $result->mensagem; ?></td>
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
