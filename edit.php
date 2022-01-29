<?php
	require_once "include/session.php";
	require_once "include/mysqli.php";
	
	db_connect();

	if(!empty($_GET["product"]) && isset($_GET["product"])) {
		
		$id = $_GET["product"];
		
		if(isset($_POST["product-edit"])) {
			
			$name = htmlentities(mysqli_real_escape_string($conn,$_POST["name"]));
			$description = htmlentities(mysqli_real_escape_string($conn,$_POST["description"]));
			$price = htmlentities(mysqli_real_escape_string($conn,$_POST["price"]));

			// процесс преобразование пары свойство/значение в строку формата JSON
			$property_name = $_POST["property-name"]; // получаем наши массивы
			$property_value = $_POST["property-value"];
			// из двух массивов сделаем один
			$property= array( 
				"name" => array(), 
				"value" => array() 
			);
			
			//var_dump($property_name);
			//var_dump($property_value);
			
			
			// проверим каждое из значение массива на постороние вставки кода
			for($len = count($property_name), $i = 0; $i < $len; ++$i) {
				$property["name"][] = htmlentities(mysqli_real_escape_string($conn,$property_name[$i]));
				$property["value"][] = htmlentities(mysqli_real_escape_string($conn,$property_value[$i]));
			}
			
			//var_dump($property);
			
			// последний этап преобразуем массив в строку формата JSON
			$property = json_encode($property, JSON_UNESCAPED_UNICODE); //второй параметр чтобы отменить кодирование многобайтных символов
		
			db_update_product($id, $name, $description, $property, $price);
			
		}
		
		$id = $_GET["product"];
		
		$result = get_product($id)[0]; // мы знаем что вернётся только одна строка
		//var_dump($result);
		$property = json_decode($result["property"], TRUE);
		//var_dump($property);
	}
	
	db_close();
?>
<!DOCTYPE html>
<html>

<head>
	<?php require_once "block/head.php"; ?>
	
	<link rel="stylesheet" href="css/add.css">
	<script src="js/add.js"></script>
</head>

<body>

	<?php 
		require_once "block/header.php"; // шапка сайта
		require_once "block/nav.php"; // меню 
		
	?>
	
	<main>
		
		<h2>Редактирование</h2>
				
		<!-- Форма служит так же для отправки файла изображения -->
		<form id="product" class="add" method="post">
			<!-- Общая информация -->
			<div class="box">
				
				<label>Название</label>
				<input type="text" placeholder="Название" name="name" maxlength="50" required value="<?=$result["name"]?>">
				
				<label>Описание</label>
				<textarea placeholder="Описание" name="description" required rows="4" style="resize: none;" maxlength="255"><?=$result["description"]?></textarea>
				
				<label>Цена</label>
				<input type="number" placeholder="Цена" name="price" step="0.1" value="<?=$result["price"]?>" required>
			
			</div>
			
			<input type="submit" name="product-edit" value="Изменить">
			
		</form>
		
		
		<?php 
		require_once "block/footer.php";
	?>
	</main>
	

</body>

</html>