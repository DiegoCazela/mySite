<?php	

namespace App\Model;
use \PDO;

class Photo {
	public $photo_name;
	public $photo_size;
	public $photo_type;

	// $this->users_cpf = '39403668890';

	function __construct($photo_name = '', $photo_size = '', $photo_type = '') {
		$this->photo_name = $photo_name;
		$this->photo_size = $photo_size;
		$this->photo_type = $photo_type;
	}

	function insertPhoto() {
		$sql = "INSERT INTO content_photo (users_cpf, content_photo_name, content_photo_size, content_photo_type)".
				" VALUES ('39403668890', '{$this->photo_name}', '{$this->photo_size}', '{$this->photo_type}')";

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

	function selectPhoto() {
		$sql = "SELECT content_photo_id, users_cpf, content_photo_name, content_photo_size, content_photo_type".
				" FROM content_photo".
				" ORDER BY content_photo_id DESC";
				
		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
			$content_photo = $conn->query($sql);
			unset($conn);
				if($content_photo){
					$result = $content_photo->fetchAll(PDO::FETCH_OBJ);
					return $result;
				}
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}

	function selectOnePhoto($id) {
		$sql = "SELECT content_photo_id, users_cpf, content_photo_name, content_photo_size, content_photo_type".
				" FROM content_photo".
				" WHERE content_photo_id = $id";
				
		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
			$content_portifolios = $conn->query($sql);
			unset($conn);
				if($content_portifolios){
					$result = $content_portifolios->fetchAll(PDO::FETCH_OBJ);
					return $result;
				}
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}

	function updateOnePhoto($id) {
		$sql = "UPDATE content_photo".
				" SET content_photo_name = '{$this->photo_name}', content_photo_size = {$this->photo_size}, content_photo_type = '{$this->photo_type}'".
				" WHERE content_photo_id = $id";
				
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

	function deleteOnePhoto($id) {
		$sql = "DELETE FROM content_photo".
				" WHERE content_photo_id = $id";
				
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