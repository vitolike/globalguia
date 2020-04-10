<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Global Guia - Global Guia</title>

    <!-- Custom fonts for this theme -->
    <link href="<?= base_url(); ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="<?= base_url(); ?>public/css/freelancer.min.css" rel="stylesheet">

    <style>
        .bg-primary {
            background-color: #539AF6 !important;
        }
        a.bg-primary:focus,
        a.bg-primary:hover,
        button.bg-primary:focus,
        button.bg-primary:hover {
            background-color: #1abc9c !important;
        }
		.cli-box {
			width: 170px;
			height: 170px;
		}
		.cli-text {
			text-align: center;
			line-height: 170px;
			display: block;
		}
		.form-control {
			border: 1px solid #e9ecef !important;
			border-radius: 3px !important;
			background-color: #FFF !important;
		}
		.form-control:focus {
			border-color: #539AF6 !important;
		}
		.floating-label-form-group {
			border: 0 !important;
		} 
		label {
			color: #FFF !important; 
		}
		#mainNav .navbar-nav>li.nav-item>a.nav-link.active {
			background: inherit !important;
			color: #1abc9c;
		}
		#mainNav .navbar-nav li.nav-item a.nav-link:hover {
			color: #1abc9c !important;
		}	
		.masthead {
			background: url(<?= base_url(); ?>public/img/image2.png)
		}
		.masthead-heading {
			font-family: Bodoni MT Black !important;
		}
    </style>

</head>

<body id="page-top">
	
	<!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <img src="<?= base_url(); ?>public/img/global4.png" height='33px'; width='205px';>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <!-- <i class="fas fa-bars"></i> -->
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?= base_url(); ?>/admin">Area Administrativa</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Nossos Clientes</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contato</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- Masthead -->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">

            <!-- Masthead Heading -->
            <h1 class="masthead-heading text-uppercase mb-0">O seu guia na internet</h1>

        </div>
    </header>


    <?php if ($msg == 'erro'): ?>
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;</strong> Arquivo de imagem incompativel com o sistema.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <?php elseif ($msg == 'sucesso'): ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> Mensagem enviada com sucesso.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <?php elseif ($msg == 'apagado'): ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-user-circle"></i>&nbsp;</strong> Foi apagado com sucesso!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <?php endif; ?>



    <!-- Portfolio Section -->
    <section class="page-section portfolio" id="portfolio" style="border-bottom: 1px solid #e9ecef">
        <div class="container">

            <!-- Portfolio Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Nossos clientes</h2>

            <!-- Icon Divider -->
            <div class="divider-custom divider">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
            </div>
			<div class="container-fluid">
      
      <div class="row">
          <!-- Portfolio Item 1 -->
          
          <?php foreach($anuncios as $result) {?>
            <div class="col">
              <div class="card" style="width: 10rem;">
                <img src="<?= base_url(); ?>public/uploads/<?= $result->foto; ?>" class="card-img-top" alt="..." data-toggle="modal" data-target="#anuncio<?= $result->id; ?>">
              </div>  
            </div>
          <?php }?>   

			</div>
		
			
        </div>
    </section>
	
	 <!-- Contact Section -->
  <section class="page-section" id="contact" style="background: #539AF6 !important">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0" style="color: #FFF !important">Contato</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line" style="background-color: #FFF;"></div>
        <div class="divider-custom-line" style="background-color: #FFF;"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <form action="<?= base_url(); ?>home/nova_mensagem" enctype="multipart/form-data" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nome</label>
                <input class="form-control" name="nome" type="text" placeholder="Nome" required="required" data-validation-required-message="Digite seu nome.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email</label>
                <input class="form-control" name="email" type="email" placeholder="Email@seuemail.com" required="required" data-validation-required-message="Digite seu email.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Celular</label>
                <input class="form-control" name="celular" type="tel" placeholder="Celular" required="required" data-validation-required-message="Digite seu celular.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
			 <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Assunto</label>
                <input class="form-control" name="assunto" type="text" placeholder="Assunto" required="required" data-validation-required-message="Digite o assunto.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Mensagem</label>
                <textarea class="form-control" name="mensagem" rows="5" placeholder="Mensagem" required="required" data-validation-required-message="Digite a mensagem."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl">Enviar</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

    <!-- Copyright Section -->
    <section class="copyright py-4 text-center text-white">
        <div class="container">
            <small>Copyright &copy; Global Guia 2020</small>
        </div>
    </section>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url(); ?>public/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?= base_url(); ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?= base_url(); ?>public/js/jqBootstrapValidation.js"></script>
    <script src="<?= base_url(); ?>public/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?= base_url(); ?>public/js/freelancer.min.js"></script>

</body>



<?php foreach($anuncios as $result) {?>

  
 <!-- Modal -->
<div class="modal fade" id="anuncio<?= $result->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados do anúncio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <img src="<?= base_url(); ?>public/uploads/<?= $result->foto; ?>" class="card-img-top" alt="...">
          <div class="card-body">
          <p class="card-text"><b>Descrição:</b> <?= $result->descricao; ?></p>
          <p class="card-text"><b>Telefone:</b> <?= $result->telefone; ?></p>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<?php }?> 

</html>