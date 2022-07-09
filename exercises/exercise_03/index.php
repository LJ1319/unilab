<?php 
	require_once("controller/users.php");
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
		<input type="text" name="name" id="name" placeholder="name">
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