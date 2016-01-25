<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- estilo scss -->
		<!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet" /> -->
		<link href="assets/stylesheets/Adm_content/presentation.css" rel="stylesheet" />
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
		<form id='form-presentation-insert' method='post' action='?action=insert' enctype='multipart/form-data'>
			<h2>Formulario de insercao</h2>
			<div class='container-presentation-text'>
				<label for='text'>Apresentacao</label>
				<textarea required name='presentation_text' rows=6 cols=40></textarea>
			</div>
			<div class='container-curriculum-text'>
				<label for='text'>Curriculum Vitae</label>
				<textarea required name='curriculum_text' rows=6 cols=40></textarea>
			</div>
			<button type='submit' class='btn btn-default'>Submit</button>
		</form>

		<!-- formulario de edicao de conteudos -->
		<?php if($selectOnePresentation_edit) : ?>
			<h2>Formulario de edicao</h2>
			<form id='form-presentation-edit' method='post' action="?id=<?php print $selectOnePresentation_edit[0]->content_presentation_curriculum_id?>&action=edit&operation=ok" enctype='multipart/form-data'>
				<div class='container-presentation-text'>
					<label for='text'>Apresentacao</label>
					<textarea required name='presentation_text_edit' rows=6 cols=40><?php print($selectOnePresentation_edit[0]->content_presentation); ?></textarea>
				</div>
				<div class='container-curriculum-text'>
					<label for='text'>Curriculum Vitae</label>
					<textarea required name='curriculumt_text_edit' rows=6 cols=40><?php print($selectOnePresentation_edit[0]->content_curriculum); ?></textarea>
				</div>
				<button type='submit' class='btn btn-default'>Submit</button>
			</form>
		<?php endif; ?>

		<!-- listagem dos conteudos -->
		<?php 
			$content_presentation_view = "<div class='container-presentation-adm'>";
			foreach ($selectPresentation as $key => $value) :
				$content_presentation_view .= "<div class='container-presentation ".$value->content_presentation_curriculum_id."'>";
				$content_presentation_view .= "<div class='presentation-text'><p>" . $value->content_presentation . "</p></div>";
				$content_presentation_view .= "<div class='curriculum-text'><p>" . $value->content_curriculum . "</p></div>";
				$content_presentation_view .= "<a href='?id=" . $value->content_presentation_curriculum_id . "&action=edit'>Editar</a>";
				$content_presentation_view .= "<a href='?id=" . $value->content_presentation_curriculum_id . "&action=delete'>Deletar</a>";
				$content_presentation_view .= "</div>";
			endforeach;
			$content_presentation_view .= "</div>";
			echo $content_presentation_view;
		?>
	</body>
</html>