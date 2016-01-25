<?php	

namespace App\Model;
use \PDO;

class Presentation {
	public $content_presentation;
	public $content_curriculum;

	// $this->users_cpf = '39403668890';

	function __construct($content_presentation = '', $content_curriculum = '') {
		$this->content_presentation = $content_presentation;
		$this->content_curriculum = $content_curriculum;
	}

	function insertPresentation() {
		$sql = "INSERT INTO content_presentation_curriculum (users_cpf, content_presentation, content_curriculum)". 
				" VALUES ('39403668890', '{$this->content_presentation}', '{$this->content_curriculum}')";

		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
	        $conn->exec($sql);
			unset($conn);
			return $result = '<h2>O conteudo foi inserido com sucesso</h2>';
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}

	function selectPresentation() {
		$sql = "SELECT content_presentation_curriculum_id, users_cpf, content_presentation, content_curriculum".
				" FROM content_presentation_curriculum".
				" ORDER BY content_presentation_curriculum_id DESC";

		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
			$content_presentation = $conn->query($sql);
			unset($conn);
				if($content_presentation){
					$result = $content_presentation->fetchAll(PDO::FETCH_OBJ);
					return $result;
				}
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}

	function selectOnePresentation($id) {
		$sql = "SELECT content_presentation_curriculum_id, users_cpf, content_presentation, content_curriculum".
				" FROM content_presentation_curriculum".
				" WHERE content_presentation_curriculum_id = $id";
				
		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
			$content_characteristics = $conn->query($sql);
			unset($conn);
				if($content_characteristics){
					$result = $content_characteristics->fetchAll(PDO::FETCH_OBJ);
					return $result;
				}
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}

	function updateOnePresentation($id) {
		$sql = "UPDATE content_presentation_curriculum".
				" SET content_presentation = '{$this->content_presentation}', content_curriculum = '{$this->content_curriculum}'".
				" WHERE content_presentation_curriculum_id = $id";
		
		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
			$conn->exec($sql);
			unset($conn);
			return $result = '<h2>O conteudo foi atualizado com sucesso</h2>';
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}

	function deleteOnePresentation($id) {
		$sql = "DELETE FROM content_presentation_curriculum".
				" WHERE content_presentation_curriculum_id = $id";
				
		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
			$conn->exec($sql);
			unset($conn);
			return $result = '<h2>O conteudo foi deletado com sucesso</h2>';
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}
}