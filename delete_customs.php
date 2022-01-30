<?php
	require_once "include/session.php";
	require_once "include/mysqli.php";
	
	define("MAX_customS_ON_PAGE", 4);
	
	
		$custom = $_GET["custom"];
	
		//var_dump($category);
		db_connect();
		
		// многомерный массив с результирующей таблицей
		$result = db_select("custom");
		//var_dump($result );
		
		
		db_close();
	
?>
<!DOCTYPE html>
<html>

<head>
	<?php require_once "block/head.php"; ?>
	
	<link rel="stylesheet" href="css/category.css">
</head>

<body>

	<?php 
		require_once "block/header.php"; // шапка сайта
		require_once "block/nav.php"; // меню 
		
	?>
	
	<main>

</form>
		<?php
			$count_article = 0;
			
			foreach($result as $key => $val) {
				$id = $val["id"];
				$name = $val["fname"];
				$price = $val["sname"];
				$decsription = $val["patronymic"];
				$img = $val["img"] == "" ? "img/no-img.png" : $val["img"];
				
				$count_article++;
				
				switch($_SESSION["status"]) {
					case "user":
						$article = <<<_OUT
						<article id="$id">
							<header class="name">$name</header>
							<div class="wrap">
								<figure>
									<img src="$img">
								</figure>
							
							<p class="description">$decsription</p>
							</div>
							<div class="price1">$price</div>

						</article>
_OUT;
						break;
						
					case "admin":
						$article = <<<_OUT
						<article id="$id">
							<header class="name">$name</header>
							<div class="wrap">
								<figure>
									<img src="$img">
								</figure>
							
							<p class="description">$decsription</p>
							</div>
							<div class="price1">$price</div>
							<div class="p">
							
							<a class="tools" href="ed.php?custom=$id"><img src="img/edit.png"></a>
							<a class="tools" href="delete_c.php?custom=$id"><img src="img/delete.png"></a>
							</div>
						</article>
_OUT;
						break;
					
					default:
						$article = <<<_OUT
						<article id="$id">
							<header class="name">$name</header>
							<div class="wrap">
								<figure>
									<img src="$img">
								</figure>
							
							<p class="description">$decsription</p>
							</div>
							<footer class="price1">$price</footer>
							<div class="p">
							
							</div>
						</article>
_OUT;
					break;
				}
				
				
				
				echo $article;
				
				
			}
			
		?>
		
	
	</main>
	

</body>

</html>