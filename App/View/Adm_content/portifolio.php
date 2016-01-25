<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- estilo scss -->
		<!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet" /> -->
		<link href="assets/stylesheets/Adm_content/portifolio.css" rel="stylesheet" />
	</head>
	
	<?php 
		$page = $_SERVER['REQUEST_URI']; 
		$page = str_replace('/', '', $page); 
		$page = str_replace('.php', '', $page); 
		$page = str_replace('?s=', '', $page); 
		$page = $page ? $page : 'default'; 
	?>

	<body id="<?php echo $page ?>">
		<!-- formulario de insercao de conteudos -->
		<form id='form-portifolio-insert' method='post' action='?action=insert' enctype='multipart/form-data'>
			<h2>Formulario de insercao</h2>
			<div class='container-photo'>
				<label for='photo'>Imagem</label>
				<input required type='file' name='photo'/>
			</div>
			<div class='container-text'>
				<label for='text'>Texto</label>
				<textarea required name='text' rows=6 cols=40></textarea>
			</div>
			<button type='submit' class='btn btn-default'>Submit</button>
		</form>

		<!-- formulario de edicao de conteudos -->
		<?php if($selectOnePortifolio_edit) : ?>
			<h2>Formulario de edicao</h2>
			<form id='form-portifolio-edit' method='post' action="?id=<?php print $selectOnePortifolio_edit[0]->content_portifolios_id?>&action=edit&operation=ok" enctype='multipart/form-data'>
				<div class='container-photo'>
					<label for='photo'>Imagem</label>
					<input required type='file' name='photo_edit'>
				</div>
				<div class='container-text'>
					<label for='text'>Texto</label>
					<textarea required name='text_edit' rows=6 cols=40><?php print($selectOnePortifolio_edit[0]->content_portifolios_text); ?></textarea>
				</div>
				<button type='submit' class='btn btn-default'>Submit</button>
			</form>
		<?php endif; ?>

		<!-- listagem dos conteudos -->
		<?php
			$content_portifolio_view = "<div class='container-portifolios-adm'>";
			foreach ($selectPortifolio as $key => $value) :
				$content_portifolio_view .= "<div class='container-portifolios ".$value->content_portifolios_id."'>";
				$content_portifolio_view .= "<img src='/assets/img/portifolio/" . $value->content_portifolios_name . "' alt='Smiley face' class='img-rounded portifolios-img'/>";
				$content_portifolio_view .= "<div class='portifolios-text'><p>" . $value->content_portifolios_text . "</p></div>";
				$content_portifolio_view .= "<a href='?id=" . $value->content_portifolios_id . "&action=edit'>Editar</a>";
				$content_portifolio_view .= "<a href='?id=" . $value->content_portifolios_id . "&action=delete'>Deletar</a>";
				$content_portifolio_view .= "</div>";
			endforeach;
			$content_portifolio_view .= "</div>";
			echo $content_portifolio_view;
		?>
	</body>
</html>
