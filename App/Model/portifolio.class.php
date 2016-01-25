<?php

namespace App\Model;
use \PDO;

class Portifolio {
	public $content_portifolios_text;
	public $photo_name;
	public $photo_size;
	public $photo_type;

	// $this->table = 'content_portifolios';
	// $this->users_cpf = '39403668890';

	function __construct($content_portifolios_text = '', $photo_name = '', $photo_size = '', $photo_type = '') {
		$this->content_portifolios_text = $content_portifolios_text;
		$this->photo_name = $photo_name;
		$this->photo_size = $photo_size;
		$this->photo_type = $photo_type;
	}

	function insertPortifolio() {
		$sql = "INSERT INTO content_portifolios (users_cpf, content_portifolios_text, content_portifolios_name, content_portifolios_size, content_portifolios_type)". 
				" VALUES ('39403668890', '{$this->content_portifolios_text}', '{$this->photo_name}', {$this->photo_size}, '{$this->photo_type}')";

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

	function selectPortifolio() {
		$sql = "SELECT content_portifolios_id, users_cpf, content_portifolios_text, content_portifolios_name, content_portifolios_size, content_portifolios_type".
				" FROM content_portifolios".
				" ORDER BY content_portifolios_id DESC";
				
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

	function selectOnePortifolio($id) {
		$sql = "SELECT content_portifolios_id, users_cpf, content_portifolios_text, content_portifolios_name, content_portifolios_size, content_portifolios_type".
				" FROM content_portifolios".
				" WHERE content_portifolios_id = $id";
				
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

	function updateOnePortifolio($id) {
		$sql = "UPDATE content_portifolios".
				" SET content_portifolios_text = '{$this->content_portifolios_text}', content_portifolios_name = '{$this->photo_name}', content_portifolios_size = {$this->photo_size}, content_portifolios_type = '{$this->photo_type}'".
				" WHERE content_portifolios_id = $id";
				
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

	function deleteOnePortifolio($id) {
		$sql = "DELETE FROM content_portifolios".
				" WHERE content_portifolios_id = $id";
				
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