<?php
	require_once "include/session.php"; // на каждой странице
	require_once "include/mysqli.php";
	
	if(!empty($_SESSION["login"])) {
		
		$user = $_SESSION["login"];
		
	} else
		header("Location: /");

?>
<!DOCTYPE html>
<html>

<head>
	<?php require_once "block/head.php"; ?>
	
	<link rel="stylesheet" href="css/trash.css">
</head>

<body>

	<?php 
		require_once "block/header.php"; // шапка сайта
		require_once "block/nav.php"; // меню 
		
	?>
	
	<main>
		<h2>Корзина пользователя <?=$user?></h2>
		<?php
		
			if(isset($_SESSION["trash"])) {
			
				$total_price = 0; // 0 рублей
			
				foreach($_SESSION["trash"] as $key => $val){
					$id = $val["id"];
					$name = $val["name"];
					$price = $val["price"];
					$decsription = $val["description"];
					$img = $val["img"] == "" ? "img/no-img.png" : $val["img"];
					
					$total_price += $price;
					
					$article = <<<_OUT
						<article id="$id">
							<header class="name">$name</header>
							<div class="wrap">
								<figure>
									<img src="$img">
								</figure>
							
							<p class="description">$decsription</p>
							</div>
							<div class="price">$price</div>
							<div class="p">
							<a href="viewer.html?product=$id" class="btn">Подробнее</a>
							</div>
						</article>
_OUT;

					echo $article;
					
				}
					echo <<<_OUT
						<div class="total">
							Итого: $total_price рублей
						</div>
_OUT;
					$_SESSION["total_price"] = $total_price;
				
			?>
			
			<?php } else {?>
				<p>Ваша корзина пуста</p>
			<?php }?>
			<?php 
		require_once "block/footer.php";
	?>
	</main>
	

</body>

</html>