<?php 

	try {
		$DB = new PDO("mysql:host=localhost;dbname=unilab", "root", "");
	} catch (PDOException $e) {
		print "there is a problem ". $e->getMessage();
		exit();
	}

/*
	$DB->exec(
		"CREATE TABLE `users`(
			`id` INT NOT NULL AUTO_INCREMENT, 
			`name` VARCHAR(255) NOT NULL, 
			`surname` VARCHAR(255) NOT NULL, 
			`date` DATETIME NOT NULL,
			PRIMARY KEY (`id`))
		");
*/	
/*
	$DB->exec(
		"INSERT INTO `users`(`name`, `surname`) VALUES('Luka', 'Jikia')"
	);
*/
/*
	$DB->exec(
		"UPDATE `users` SET `name`='Gigi' WHERE `name` = 'Luka'"
	);
*/	
/*
	$DB->exec(
		"DELETE FROM `users`"
	);
*/	

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
				
				// $status = $GLOBALS['DB']->exec(
				// 	"INSERT INTO `{$this->table}`(`name`, `surname`) 
				// 	 VALUES ('{$this->name}', '{$this->surname}')
				// 	");

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

			// while ($row = $statement->fetch()) {
			// 	print_r($row['name']);
			// }

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


	// $person1 = new Person('Luka', 'Jikia');
	// $person1->name = 'Gigi';
	// $person1->insert();
	// $person1->update(5);

	// $data = new Person;
	// $records = $data->getAll();
	// print_r($records)
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Unilab OOP Form</title>
</head>
<body>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<input type="text" name="name" id="name" placeholder="surname">
		<input type="text" name="surname" id="surname" placeholder="surname">
		<input type="password" name="password" id="password" placeholder="password">
		<input type="submit" value="submit">
	</form>

	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>NAME</td>
				<td>SURNAME</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($dataArray as $row) { ?>
				<tr>
					<td><?= $row['id'] ?></td>
					<td><?= $row['name'] ?></td>
					<td><?= $row['surname'] ?></td>
				</tr>
			<?php } ?>

			<?php echo '</br>' ?>

			<?php foreach($specific as $user) { ?>
				<tr>
					<td><?= $user['id'] ?></td>
					<td><?= $user['name'] ?></td>
					<td><?= $user['surname'] ?></td>
				</tr>
			<?php } ?>


		</tbody>
	</table>
</body>
</html>