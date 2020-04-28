<?php
	include_once "/classes/Shout.php";
	$shout = new Shout();
	ob_start();
	Session::init();
?>	
<!DOCTYPE html>
<html>
<head>
	<title>Basic Shout Box</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrapper clr">
	<header class="headsection clr">
		<h2>Shoutbox with PHP OOP & MySQLi</h2>
	</header>
		<section class="content clr">
			<div class="box">
				<ul>
<?php
	$getData = $shout->getAllData();
	if($getData){
		while ($data = $getData->fetch_assoc()) {?>
		<li><span><?php echo $data['time'];?></span> - <b><?php echo $data['name'];?> : </b><?php echo $data['body'];?>
		</li>
<?php } } ?>
				</ul>
			</div>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$shoutdata = $shout->insertData($_POST);
	}
?>
			<div class="shoutform clr">
<?php
	if(isset($shoutdata)){
	echo $shoutdata;
	}
?>

<?php
 if(isset($_GET['msg'])){
	echo "<span class='success'>".$_GET['msg']."</span>";
 }
?>
				<form action="" method="POST">
					<table>
						<tr>
							<td>Name</td>
							<td>:</td>
							<td><input type="text" name="name"/></td>
						</tr>

						<tr>
							<td>Body</td>
							<td>:</td>
							<td><input type="text" name="body"/></td>
						</tr>

						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" name="submit" value="Shout It"/></td>
						</tr>
					</table>
				</form>
			</div>
		</section>

		<footer class="footsection">
			<h2>&copy; Copyright Snigdho</h2>
		</footer>
	</div>
</body>
</html>