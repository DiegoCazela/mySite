<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- estilo scss -->
		<!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet" /> -->
		<link href="assets/stylesheets/Adm_content/characteristics.css" rel="stylesheet" />
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
		<form id='form-characteristics-insert' method='post' action='?action=insert' enctype='multipart/form-data'>
			<h2>Formulario de insercao</h2>
			<div class='container-text'>
				<label for='text'>Texto</label>
				<textarea required name='text' rows=6 cols=40></textarea>
			</div>
			<button type='submit' class='btn btn-default'>Submit</button>
		</form>

		<!-- formulario de edicao de conteudos -->
		<?php if($selectOneCharacteristics_edit) : ?>
			<h2>Formulario de edicao</h2>
			<form id='form-characteristics-edit' method='post' action="?id=<?php print $selectOneCharacteristics_edit[0]->content_characteristics_id?>&action=edit&operation=ok" enctype='multipart/form-data'>
				<div class='container-text'>
					<label for='text'>Texto</label>
					<textarea required name='text_edit' rows=6 cols=40><?php print($selectOneCharacteristics_edit[0]->content_characteristics); ?></textarea>
				</div>
				<button type='submit' class='btn btn-default'>Submit</button>
			</form>
		<?php endif; ?>

		<!-- listagem dos conteudos -->
		<?php 
			$content_characteristics_view = "<div class='container-characteristics-adm'>";
			foreach ($selectCharacteristics as $key => $value) :
				$content_characteristics_view .= "<div class='container-characteristics ".$value->content_characteristics_id."'>";
				$content_characteristics_view .= "<div class='characteristics-text'><p>" . $value->content_characteristics . "</p></div>";
				$content_characteristics_view .= "<a href='?id=" . $value->content_characteristics_id . "&action=edit'>Editar</a>";
				$content_characteristics_view .= "<a href='?id=" . $value->content_characteristics_id . "&action=delete'>Deletar</a>";
				$content_characteristics_view .= "</div>";
			endforeach;
			$content_characteristics_view .= "</div>";
			echo $content_characteristics_view;
		?>
	</body>
</html>