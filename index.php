<?php
	require_once "include/session.php"; 
?>
<!DOCTYPE html>
<html>

<head>
	<?php require_once "block/head.php"; ?>
</head>

<body>

	<?php 
		require_once "block/header.php"; 
		require_once "block/nav.php"; 
		
	?>
	<h1></h1>
	<h1>"Экспедиция" - это интернет-магазин разного и качественного туристического снаряжения. </h1>
	<div id="gallery">
    <picture>
        <img src="img/j.jpg" alt="">
    </picture>
</div>
	<main>
		<?php 
		require_once "block/footer.php";
	?>
	</main>
	

</body>

</html>