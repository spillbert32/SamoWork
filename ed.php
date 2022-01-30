<?php
	require_once "include/session.php";
	require_once "include/mysqli.php";
	
	db_connect();

	if(!empty($_GET["custom"]) && isset($_GET["custom"])) {
		
		$id = $_GET["custom"];
		
		if(isset($_POST["custom-edit"])) {
			
			$fname = htmlentities(mysqli_real_escape_string($conn,$_POST["fname"]));
			$sname = htmlentities(mysqli_real_escape_string($conn,$_POST["sname"]));
			$patronymic = htmlentities(mysqli_real_escape_string($conn,$_POST["patronymic"]));

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
		
			db_update_custom($id, $fname, $sname, $patronymic);
			
		}
		
		$id = $_GET["custom"];
		
		$result = get_custom($id)[0]; // мы знаем что вернётся только одна строка
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
		<form id="custom" class="add" method="post">
			<!-- Общая информация -->
			<div class="box">
				
				<label>Имя</label>
				<input type="text" placeholder="Имя" name="fname" maxlength="50" required value="<?=$result["fname"]?>">
				
				<label>Фамилия</label>
				<input type="text" placeholder="Фамилия" name="sname" maxlength="50" required value="<?=$result["sname"]?>">
				
				<label>Отчество</label>
				<input type="text" placeholder="Отчество" name="patronymic" step="0.1" value="<?=$result["patronymic"]?>" required>
				
				
				
			</div>
			
			<input type="submit" name="custom-edit" value="Изменить">
			
		</form>
		
		
		<?php 
		require_once "block/footer.php";
	?>
	</main>
	

</body>

</html>