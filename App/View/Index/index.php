<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Seja bem vindo(a)</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- estilo scss -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
		<link href="assets/stylesheets/Index/index.css" rel="stylesheet" />
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
				<nav class="navbar navbar-default navbar-fixed-top">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<!-- <div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div> -->
						<!-- Collect the nav links, forms, and other content for toggling -->
	<!-- 						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> -->
							<ul class="nav navbar-nav">
								<li>
									<a href="right-presentation">
										Apresentacao
									</a>
								</li>
								<li>
									<a href="right-curriculum">
										Curriculum Vitae
									</a>
								</li>
								<li>
									<a href="right-skills">
										Habilidades
									</a>
								</li>
								<li>
									<a href="right-portifolios">
										Portifolio
									</a>
								</li>
								<li>
									<a href="right-contacts">
										Contatos
									</a>
								</li>
								<!-- <li>
									<p class="navbar-text" id="menu-user-login">
										Login
									</p>
								</li> -->
							</ul>
						<!-- </div> -->
					</div>
				</nav>
			</header>

			<section id="result-modal"></section>

			<!-- div do lado esquerdo que engloba a foto e uma breve descricao -->
			<main>
				<section id="container-left">
					<div class="left-photo">
						<?php 
							// obtem a ultima foto passando o array como [0]
							$content_photo_view .= "<img src='/assets/img/photo/" . $selectPhoto[0]->content_photo_name . "' alt='Smiley face' class='img-rounded photo-img'/>";
							echo $content_photo_view;
						?>
					</div>
					<div class="left-characteristics">
						<h3>
							<?php 
								// obtem a ultima caracteristica passando o array como [0]
								$content_characteristics_view .= "<div class='characteristics-text'><p>" . $selectCharacteristics[0]->content_characteristics . "</p></div>";
								echo $content_characteristics_view;
							?>
						</h3>
					</div>
				</section>
				<!-- div do lado direito que engloba a apresentacao, o curriculum, as habilidades, o portifolio e o contato -->
				<section id="container-right">
				<!-- div da apresentacao -->
					<section id="right-presentation" class="right-presentation">
						<div class="title">
							<h1>
								Apresentacao
							</h1>
						</div>
						<div class="text">
							<p>
								<?php
									// obtem a ultima caracteristica passando o array como [0]
									$content_presentation_view .= "<div class='presentation-text'><p>" . $selectPresentation[0]->content_presentation . "</p></div>";
									echo $content_presentation_view;
								?>
							</p>
						</div>
						<div class="learnMore">
							<p>
								Ver Mais
							</p>
						</div>
					</section>
					<!-- div do curriculum -->
					<section id="right-curriculum" class="right-curriculum">
						<div class="title">
							<h1>
								Curriculum vitae
							</h1>
						</div>
						<div class="text">
							<p>
								<?php
									// obtem a ultima caracteristica passando o array como [0]
									$content_curriculum_view .= "<div class='curriculum-text'><p>" . $selectPresentation[0]->content_curriculum . "</p></div>";
									echo $content_curriculum_view;
								?>
							</p>
						</div>
						<div class="learnMore">
							<p>
								Mussum ipsum
							</p>
						</div>
					</section>
					<!-- div das habilidades -->
					<section id="right-skills" class="right-skills">
						<div class="title">
							<h1>
								Habilidades
							</h1>
						</div>
						<!-- <div class="basic-nivel">
							<div class="text"> -->
								<!-- <h4>Básico</h4> -->
								<?php 
									foreach ($selectBasicSkills as $key => $value) :
										$content_basic_skills_view .= "<div class='skills-text'><p>" . $value->content_skills_text . "</p>";
										$content_basic_skills_view .= 
											"<div class='estrelas'>".
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
								?>
							<!-- </div>
						</div> -->
						<!-- <div class="intermediate-nivel">
							<div class="text"> -->
								<!-- <h4>Intermediário</h4> -->
								<?php 
									foreach ($selectIntermediateSkills as $key => $value) :
										$content_intermediate_skills_view .= "<div class='skills-text'><p>" . $value->content_skills_text . "</p>";
										$content_intermediate_skills_view .= 
											"<div class='estrelas'>".
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
								?>
							<!-- </div>
						</div>
						<div class="advanced-nivel">
							<div class="text"> -->
								<!-- <h4>Avancado</h4> -->
								<?php 
									foreach ($selectAdvancedSkills as $key => $value) :
										$content_advanced_skills_view .= "<div class='skills-text'><p>" . $value->content_skills_text . "</p>";
										$content_advanced_skills_view .= 
											"<div class='estrelas'>".
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
							<!-- </div>
						</div> -->
						<?php 
							if(count($selectBasicSkills)+count($selectIntermediateSkills)+count($selectAdvancedSkills) > 16) { 
						?>
							<div class="learnMore">
								<p>
									Mussum ipsum
								</p>
							</div>
						<?php
							}
						?>

					</section>
					<!-- div dos portifolios -->
					<section id="right-portifolios" class="right-portifolios">
						<div class="title">
							<h1>
								Últimos Projetos
							</h1>
						</div>
						<div class="container-portifolios">
							<!-- projeto -->
							<?php
								foreach ($selectPortifolio as $key => $value) :
									//$contPortifolios = $key;
									$content_portifolio_view = "<div class='container-portifolios-part'>";
									$content_portifolio_view .= "<img src='/assets/img/portifolio/" . $value->content_portifolios_name . "' alt='Smiley face' class='img-rounded portifolios-img'/>";
									$content_portifolio_view .= "<div class='portifolios-text'><p>" . $value->content_portifolios_text . "</p></div>";
									$content_portifolio_view .= "</div>";
									echo $content_portifolio_view;
								endforeach;
							?>
						</div>
						<?php 
							if(count($selectPortifolio) > 4) { 
						?>
								<div class="learnMore">
									<p>
										Mussum ipsum
									</p>
								</div>
						<?php
							}
						?>
					</section>
					<!-- div do contato -->
					<section id="right-contacts" class="right-contacts">
						<div class="title">
							<h1>
								Contatos
							</h1>
						</div>
						<div class="contacts-fields">
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
								<button type='submit' class='btn btn-default'>Submit</button>
							</form>
						</div>
						<p><span class='glyphicon glyphicon-envelope'></span> cazela_dracena2005@hotmail.com</p>
					</section>
				</section>
			</main>
		</div>

		<!-- js -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>
