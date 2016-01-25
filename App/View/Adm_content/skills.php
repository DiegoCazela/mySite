<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- estilo scss -->
		<!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet" /> -->
		<link href="assets/stylesheets/Adm_content/skills.css" rel="stylesheet" />
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
		<form id='form-skills-insert' method='post' action='?action=insert' enctype='multipart/form-data'>
			<h2>Formulario de insercao</h2>
			<div class='container-text'>
				<label for='text'>Texto</label><br>
				<textarea required name='text' rows=6 cols=40></textarea>
			</div>
			<div class='container-radio'>
				<label for='text'>Nivel de conhecimento</label><br>
				<input required type="radio" name="nivel" value="basic" checked>Basico<br>
				<input required type="radio" name="nivel" value="intermediate">Intermediario<br>
				<input required type="radio" name="nivel" value="advanced">Avancado<br>
			</div>
			<button type='submit' class='btn btn-default'>Submit</button>
		</form>

		<!-- formulario de edicao de conteudos -->
		<?php if($selectOneSkills_edit) : ?>
			<h2>Formulario de edicao</h2>
			<form id='form-skills-edit' method='post' action="?id=<?php print $selectOneSkills_edit[0]->content_skills_id?>&action=edit&operation=ok" enctype='multipart/form-data'>
				<div class='container-text'>
					<label for='text'>Texto</label><br>
					<textarea required name='text_edit' rows=6 cols=40><?php print($selectOneSkills_edit[0]->content_skills_text); ?></textarea>
				</div>
				<div class='container-radio'>
					<label for='text'>Nivel de conhecimento</label><br>
<!-- nao pode identar senao nao funciona -->
<?php switch ($selectOneSkills_edit[0]->content_skills_nivel): ?>
<?php case 'basic': { ?>
<input required type="radio" name="nivel" value="basic" checked> Basico<br>
<input required type="radio" name="nivel" value="intermediate">Intermediario<br>
<input required type="radio" name="nivel" value="advanced">Avancado<br>
<?php break; ?>
<?php } ?>
<?php case 'intermediate': { ?>
<input required type="radio" name="nivel" value="basic"> Basico<br>
<input required type="radio" name="nivel" value="intermediate" checked>Intermediario<br>
<input required type="radio" name="nivel" value="advanced">Avancado<br>
<?php break; ?>
<?php } ?>
<?php case 'advanced': { ?>
<input required type="radio" name="nivel" value="basic"> Basico<br>
<input required type="radio" name="nivel" value="intermediate">Intermediario<br>
<input required type="radio" name="nivel" value="advanced" checked>Avancado<br>
<?php break; ?>
<?php } ?>
<?php endswitch ?>
				</div>
				<button type='submit' class='btn btn-default'>Submit</button>
			</form>
		<?php endif; ?>

		<!-- listagem dos conteudos -->
		<?php 
			$content_skills_view = "<div class='container-skills-adm'><p>Basico</p>";
			foreach ($selectBasicSkills as $key => $value) :
				$content_skills_view .= "<div class='container-skills ".$value->content_skills_id."'>";
				$content_skills_view .= "<div class='skills-text'><p>" . $value->content_skills_text . "</p></div>";
				$content_skills_view .= "<div class='skills-nivel'><p>" . $value->content_skills_nivel . "</p></div>";
				$content_skills_view .= "<a href='?id=" . $value->content_skills_id . "&action=edit'>Editar</a>";
				$content_skills_view .= "<a href='?id=" . $value->content_skills_id . "&action=delete'>Deletar</a>";
				$content_skills_view .= "</div>";
			endforeach;
			$content_skills_view .= "</div>";
			echo $content_skills_view;

			$content_skills_view = "<div class='container-skills-adm'><p>Intermediario</p>";
			foreach ($selectIntermediateSkills as $key => $value) :
				$content_skills_view .= "<div class='container-skills ".$value->content_skills_id."'>";
				$content_skills_view .= "<div class='skills-text'><p>" . $value->content_skills_text . "</p></div>";
				$content_skills_view .= "<div class='skills-nivel'><p>" . $value->content_skills_nivel . "</p></div>";
				$content_skills_view .= "<a href='?id=" . $value->content_skills_id . "&action=edit'>Editar</a>";
				$content_skills_view .= "<a href='?id=" . $value->content_skills_id . "&action=delete'>Deletar</a>";
				$content_skills_view .= "</div>";
			endforeach;
			$content_skills_view .= "</div>";
			echo $content_skills_view;

			$content_skills_view = "<div class='container-skills-adm'><p>Avancado</p>";
			foreach ($selectAdvancedSkills as $key => $value) :
				$content_skills_view .= "<div class='container-skills ".$value->content_skills_id."'>";
				$content_skills_view .= "<div class='skills-text'><p>" . $value->content_skills_text . "</p></div>";
				$content_skills_view .= "<div class='skills-nivel'><p>" . $value->content_skills_nivel . "</p></div>";
				$content_skills_view .= "<a href='?id=" . $value->content_skills_id . "&action=edit'>Editar</a>";
				$content_skills_view .= "<a href='?id=" . $value->content_skills_id . "&action=delete'>Deletar</a>";
				$content_skills_view .= "</div>";
			endforeach;
			$content_skills_view .= "</div>";
			echo $content_skills_view;
		?>
	</body>
</html>