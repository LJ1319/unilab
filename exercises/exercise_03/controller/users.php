<?php 

	require_once("model/pdo.php");

	if($_POST && $_POST['name'] && $_POST['surname'] && $_POST['password']) {
		$person = new Person($_POST['name'], $_POST['surname'], $_POST['password']);
		$person->insert();
	}

	$data = new Person();
	$dataArray = $data->getAll();

	$remove = $data->delete(4);
	$specific = $data->getOne(5);

	class Person {
		private $table = 'users';
		public $name;
		public $surname;
		public $password;

		function __construct($name = '', $surname = '', $password = '') {
			$this->name = $name;
			$this->surname = $surname;
			$this->password = $password;
		}	

		/** 
		* INSERT 
		* @return INT
		*/
		function insert() {
			if ($this->name && $this->surname && $this->password) {
				
				$statement = $GLOBALS['DB']->prepare(
					"INSERT INTO `{$this->table}`(`name`, `surname`, `password`) 
					 VALUES (:name, :surname, :password)
					");
				$status = $statement->execute(array(
					':name' => $this->name,
					':surname' => $this->surname,
					':password' => password_hash($this->password, PASSWORD_DEFAULT)
				));
			}
			return $status;
		}

		/** 
		* UPDATE 
		* @param $ID
		*/
		function update($id) {
			if ($this->name && $this->surname) {
				$statement = $GLOBALS['DB']->prepare(
					"UPDATE `{$this->table}` SET `name`=':name' WHERE `id` = :id"
				);
				$status = $statement->execute(array(':id' => $id));
			}
			return $status;
		}


		/** 
		* GET ONE 
		*/
		function getOne($id) {
			$statement = $GLOBALS['DB']->query(
				"SELECT * FROM `{$this->table}` WHERE `id` = {$id}"
			);
			$data = $statement->fetchAll();
			// echo $data;
			return $data;
		}

		
		/** 
		* GET ALL 
		*/
		function getAll() {
			$statement = $GLOBALS['DB']->query("SELECT * FROM `{$this->table}`");
			$data = $statement->fetchAll();
			return $data;
		}

		/** 
		* DELETE 
		*/
		function delete($id) {
			$statement = $GLOBALS['DB']->prepare(
				"DELETE FROM `{$this->table}` WHERE `id` = :id"
			);
			$status = $statement->execute(array(':id' => $id));

			return $status;
		}
	}
 ?>