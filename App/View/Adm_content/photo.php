<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- estilo scss -->
		<!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet" /> -->
		<link href="assets/stylesheets/Adm_content/photo.css" rel="stylesheet" />
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
		<form id='form-photo-insert' method='post' action='?action=insert' enctype='multipart/form-data'>
			<h2>Formulario de insercao</h2>
			<div class='container-photo'>
				<label for='photo'>Imagem</label>
				<input required type='file' name='photo'/>
			</div>
			<button type='submit' class='btn btn-default'>Submit</button>
		</form>

		<!-- formulario de edicao de conteudos -->
		<?php if($selectOnePhoto_edit) : ?>
			<h2>Formulario de edicao</h2>
			<form id='form-photo-edit' method='post' action="?id=<?php print $selectOnePhoto_edit[0]->content_photo_id?>&action=edit&operation=ok" enctype='multipart/form-data'>
				<div class='container-photo'>
					<label for='photo'>Imagem</label>
					<input required type='file' name='photo_edit'>
				</div>
				<button type='submit' class='btn btn-default'>Submit</button>
			</form>
		<?php endif; ?>

		<!-- listagem dos conteudos -->
		<?php
			$content_photo_view = "<div class='container-photo-adm'>";
			foreach ($selectPhoto as $key => $value) :
				$content_photo_view .= "<div class='container-photo ".$value->content_photo_id."'>";
				$content_photo_view .= "<img src='/assets/img/photo/" . $value->content_photo_name . "' alt='Smiley face' class='img-rounded photo-img'/>";
				$content_photo_view .= "<a href='?id=" . $value->content_photo_id . "&action=edit'>Editar</a>";
				$content_photo_view .= "<a href='?id=" . $value->content_photo_id . "&action=delete'>Deletar</a>";
				$content_photo_view .= "</div>";
			endforeach;
			$content_photo_view .= "</div>";
			echo $content_photo_view;
		?>
	</body>
</html>