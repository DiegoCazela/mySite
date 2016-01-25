<?php	

namespace App\Model;
use \PDO;

class Skills {
	public $content_skills_text;
	public $content_skills_nivel;

	// $this->users_cpf = '39403668890';

	function __construct($content_skills_text = '', $content_skills_nivel = '') {
		$this->content_skills_text = $content_skills_text;
		$this->content_skills_nivel = $content_skills_nivel;
	}

	function insertSkills() {
		$sql = "INSERT INTO content_skills (users_cpf, content_skills_text, content_skills_nivel)". 
				" VALUES ('39403668890', '{$this->content_skills_text}', '{$this->content_skills_nivel}')";

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

	function selectBasicSkills() {
		$sql = "SELECT content_skills_id, users_cpf, content_skills_text, content_skills_nivel".
				" FROM content_skills".
				" WHERE content_skills_nivel = 'basic'".
				" ORDER BY content_skills_id DESC";

		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
			$content_skills = $conn->query($sql);
			unset($conn);
				if($content_skills){
					$result = $content_skills->fetchAll(PDO::FETCH_OBJ);
					return $result;
				}
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}

	function selectIntermediateSkills() {
		$sql = "SELECT content_skills_id, users_cpf, content_skills_text, content_skills_nivel".
				" FROM content_skills".
				" WHERE content_skills_nivel = 'intermediate'".
				" ORDER BY content_skills_id DESC";

		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
			$content_skills = $conn->query($sql);
			unset($conn);
				if($content_skills){
					$result = $content_skills->fetchAll(PDO::FETCH_OBJ);
					return $result;
				}
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}

	function selectAdvancedSkills() {
		$sql = "SELECT content_skills_id, users_cpf, content_skills_text, content_skills_nivel".
				" FROM content_skills".
				" WHERE content_skills_nivel = 'advanced'".
				" ORDER BY content_skills_id DESC";

		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
			$content_skills = $conn->query($sql);
			unset($conn);
				if($content_skills){
					$result = $content_skills->fetchAll(PDO::FETCH_OBJ);
					return $result;
				}
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}

	function selectOneSkills($id) {
		$sql = "SELECT content_skills_id, users_cpf, content_skills_text, content_skills_nivel".
				" FROM content_skills".
				" WHERE content_skills_id = $id";
				
		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
			$content_skills = $conn->query($sql);
			unset($conn);
				if($content_skills){
					$result = $content_skills->fetchAll(PDO::FETCH_OBJ);
					return $result;
				}
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}

	function updateOneSkills($id) {
		$sql = "UPDATE content_skills".
				" SET content_skills_text = '{$this->content_skills_text}', content_skills_nivel = '{$this->content_skills_nivel}'".
				" WHERE content_skills_id = $id";
		
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

	function deleteOneSkills($id) {
		$sql = "DELETE FROM content_skills".
				" WHERE content_skills_id = $id";
				
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