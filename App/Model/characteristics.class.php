<?php	

namespace App\Model;
use \PDO;

class Characteristics {
	public $content_characteristics;

	// $this->users_cpf = '39403668890';

	function __construct($content_characteristics = '') {
		$this->content_characteristics = $content_characteristics;
	}

	function insertCharacteristics() {
		$sql = "INSERT INTO content_characteristics (users_cpf, content_characteristics)". 
				" VALUES ('39403668890', '{$this->content_characteristics}')";

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

	function selectCharacteristics() {
		$sql = "SELECT content_characteristics_id, users_cpf, content_characteristics".
				" FROM content_characteristics".
				" ORDER BY content_characteristics_id DESC";

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

	function selectOneCharacteristics($id) {
		$sql = "SELECT content_characteristics_id, users_cpf, content_characteristics".
				" FROM content_characteristics".
				" WHERE content_characteristics_id = $id";
				
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

	function updateOneCharacteristics($id) {
		$sql = "UPDATE content_characteristics".
				" SET content_characteristics = '{$this->content_characteristics}'".
				" WHERE content_characteristics_id = $id";
		
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

	function deleteOneCharacteristics($id) {
		$sql = "DELETE FROM content_characteristics".
				" WHERE content_characteristics_id = $id";
				
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