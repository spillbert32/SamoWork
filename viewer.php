<?php
	require_once "include/session.php";
	require_once "include/mysqli.php";
	
	if(!empty($_GET["product"])) {
		$product = $_GET["product"];
		
		db_connect();
		$result = get_product($product)[0]; // мы знаем что вернётся только одна строка
		//var_dump($result);
		
		db_close();
	}
?>
<!DOCTYPE html>
<html>

<head>
	<?php require_once "block/head.php"; ?>
	
	<link rel="stylesheet" href="css/viewer.css">
</head>

<body>

	<?php 
		require_once "block/header.php"; // шапка сайта
		require_once "block/nav.php"; // меню 
		
	?>
	
	<main>
		<article>
			<header><h1><?=$result["name"]?><h1></header>
			<div class="price"><?=$result["price"]?></div>
			
			<figure>
				<img src="<?=$result["img"] == "" ? "img/no-img.png" : $result["img"]?>">
			</figure>
			
			<blockquote><?=$result["description"]?></blockquote>
			
			<?php
				$property = json_decode($result["property"], TRUE);
				$len = count($property["name"]);
				
				//var_dump($len);
				
				for($i=0; $i<$len; ++$i) {
					echo "<p>" . $property["name"][$i] . " - " . $property["value"][$i] . "</p>";
				}
			?>
		</article>
		<?php 
		require_once "block/footer.php";
	?>
	</main>
	

</body>

</html>