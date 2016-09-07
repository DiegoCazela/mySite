<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Diego Cazela</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- estilo scss -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="shortcut icon" type="image/png" href="assets/img/photo/5a6006f5393e5c28def04b4427daf6b9.jpeg"/>
		<link href="assets/stylesheets/styles.css" rel="stylesheet" />
	</head>
	
	<?php 
		$page = $_SERVER['REQUEST_URI']; 
		$page = str_replace('/', '', $page); 
		$page = str_replace('.php', '', $page); 
		$page = str_replace('?s=', '', $page); 
		$page = $page ? $page : 'default'; 
	?>

	<body id="<?php echo $page ?>">
		<!-- div que engloba todo o conteudo do site -->
		<div id="container-body">
			<header>
				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bar1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				    <!-- <a class="navbar-brand" href="#">Site</a> -->
				</div>
				<div class="collapse navbar-collapse" id="bar1">
				<ul class="nav navbar-nav">
				          <li><a href="right-presentation">Apresentação</a></li>
				          <li><a href="right-curriculum">Curriculum Vitae</a></li>
				          <li><a href="right-skills">Habilidades</a></li>
				          <li><a href="right-portifolios">Portfólio</a></li>
				          <li><a href="right-contacts">Contatos</a></li>
				</ul>
			</header>

			<!-- <section id="result-modal"></section> -->

			<!-- div do lado esquerdo que engloba a foto e uma breve descricao -->
			<main>
				<div class="container">
					<div class="row">
						<section id="container-left" class="col-xs-12 col-sm-4">
							<div class="row">
								<section class="left-photo col-xs-12 col-sm-3">
									<?php 
										// obtem a ultima foto passando o array como [0]
										$content_photo_view .= "<img src='/assets/img/photo/" . $selectPhoto[0]->content_photo_name . "' alt='Smiley face' class='img-rounded photo-img'/>";
										echo $content_photo_view;
									?>
								</section>
								<section class="left-characteristics col-xs-12 col-sm-3">
									<h3>
										<?php 
											// obtem a ultima caracteristica passando o array como [0]
											$content_characteristics_view .= "<div class='characteristics-text'><p>" . $selectCharacteristics[0]->content_characteristics . "</p></div>";
											echo $content_characteristics_view;
										?>
									</h3>
								</section>
							</div>
						</section>

						<!-- div do lado direito que engloba a apresentacao, o curriculum, as habilidades, o portifolio e o contato -->
						<section id="container-right" class="col-xs-12 col-sm-8">
							<!-- div da apresentacao -->
							<div class="row">
								<section id="right-presentation" class="right-presentation col-xs-12">
									<div class="row">
										<div class="title col-xs-12">
											<h1>
												Apresentação
											</h1>
										</div>
										<div class="text col-xs-12">
											<?php
												// obtem a ultima caracteristica passando o array como [0]
												$content_presentation_view .= "<div class='presentation-text'><p>" . $selectPresentation[0]->content_presentation . "</p></div>";
												echo $content_presentation_view;
											?>
										</div>
										<div class="learnMore">
											<p>
												Ver Mais
											</p>
										</div>
									</div>
								</section>

								<!-- div do curriculum -->
								<section id="right-curriculum" class="right-curriculum col-xs-12">
									<div class="row">
										<div class="title col-xs-12">
											<h1>
												Curriculum vitae
											</h1>
										</div>
										<div class="text col-xs-12">
												<?php
													// obtem a ultima caracteristica passando o array como [0]
													$content_curriculum_view .= "<div class='curriculum-text'>" . $selectPresentation[0]->content_curriculum . "</div>";
													echo $content_curriculum_view;
												?>
										</div>
										<div class="learnMore">
											<p>
												Ver Mais
											</p>
										</div>
									</div>
								</section>

								<!-- div das habilidades -->
								<section id="right-skills" class="right-skills col-xs-12">
									<div class="row">
										<div class="title col-xs-12">
											<h1>
												Habilidades
											</h1>
										</div>

										<!-- <div class='row'> -->
											<?php 
												foreach ($selectBasicSkills as $key => $value) :
													$content_basic_skills_view .= "<div class='container-skills col-xs-4 col-sm-2'>";
													$content_basic_skills_view .= "<div class='skills-text'><p>" . $value->content_skills_text . "</p></div>";
													$content_basic_skills_view .= 
														"<div class='skills-star'>".
															"<label for='cm_star-1'>".
																"<i class='fa'></i>".
															"</label>".
															"<label for='cm_star-2'>".
																"<i class='fb'></i>".
															"</label>".
															"<label for='cm_star-3'>".
																"<i class='fb'></i>".
															"</label>".
														"</div></div>";
												endforeach;
												echo $content_basic_skills_view;

												foreach ($selectIntermediateSkills as $key => $value) :
													$content_intermediate_skills_view .= "<div class='container-skills col-xs-4 col-sm-2'>";
													$content_intermediate_skills_view .= "<div class='skills-text'><p>" . $value->content_skills_text . "</p></div>";
													$content_intermediate_skills_view .= 
														"<div class='skills-star'>".
															"<label for='cm_star-1'>".
																"<i class='fa'></i>".
															"</label>".
															"<label for='cm_star-2'>".
																"<i class='fa'></i>".
															"</label>".
															"<label for='cm_star-3'>".
																"<i class='fb'></i>".
															"</label>".
														"</div></div>";
												endforeach;
												echo $content_intermediate_skills_view;

												foreach ($selectAdvancedSkills as $key => $value) :
													$content_advanced_skills_view .= "<div class='container-skills col-xs-4 col-sm-2'>";
													$content_advanced_skills_view .= "<div class='skills-text'><p>" . $value->content_skills_text . "</p></div>";
													$content_advanced_skills_view .= 
														"<div class='skills-star'>".
															"<label for='cm_star-1'>".
																"<i class='fa'></i>".
															"</label>".
															"<label for='cm_star-2'>".
																"<i class='fa'></i>".
															"</label>".
															"<label for='cm_star-3'>".
																"<i class='fa'></i>".
															"</label>".
														"</div></div>";
												endforeach;
												echo $content_advanced_skills_view;
											?>
										<!-- </div> -->
									</div>
								</section>

								<!-- div dos portifolios -->
								<section id="right-portifolios" class="right-portifolios col-xs-12">
									<div class='row'>
										<div class="title col-xs-12">
											<h1>
												Portfólio
											</h1>
										</div>
									<!-- <div class='container'> -->
											<!-- <div class="container-portifolios"> -->
												<!-- projeto -->
												<?php
													foreach ($selectPortifolio as $key => $value) :
														$content_portifolio_view = "<article class='container-portifolios-part col-xs-12 col-sm-6'>";
														$content_portifolio_view .= "<img src='/assets/img/portifolio/" . $value->content_portifolios_name . "' alt='Smiley face' class='img-rounded portifolios-img'/>";
														$content_portifolio_view .= "<div class='portifolios-text'><p>" . $value->content_portifolios_text . "</p></div>";
														$content_portifolio_view .= "</article>";
														echo $content_portifolio_view;
													endforeach;
												?>
											<!-- </div> -->
										</div>
									<!-- </div> -->
								</section>

								<!-- div do contato -->
								<section id="right-contacts" class="right-contacts col-xs-12">
									<div class="row">
										<div class="title col-xs-12">
											<h1>
												Contatos
											</h1>
										</div>
										<div class="contacts-fields col-xs-12">
											<form id='form-contacts' method='post'>
												<div class='container-name'>
													<input required type="text" class="form-control form-name" name ="name" placeholder="Nome">
												</div>
												<div class='container-email'>
													<input required type="email" class="form-control form-email" name ="email" placeholder="Email">
												</div>
												<div class='container-phone'>
													<input type="tel" class="form-control form-phone" name ="phone" placeholder="Telefone">
												</div>
												<div class='container-message'>
													<textarea required class="form-control form-message" name ="message" placeholder="Mensagem" rows=6 cols=40></textarea>
												</div>
												<button type='submit' class='btn btn-default'>Enviar</button>
											</form>
										</div>
										<span class="container-myemail"><span class='glyphicon glyphicon-envelope'></span> cazela_dracena2005@hotmail.com</span>
								</section>
							</div>
						</section>
					</div>
				</div>
			</main>
		</div>

		<!-- js -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- <script src="assets/js/skel.min.js"></script> -->
		<script src="assets/js/main.js"></script>
	</body>
</html>
