<?php
	$status = $_SESSION["status"];
	$lenTrash = count($_SESSION["trash"]);
	$trash = $lenTrash != 0 ? "Корзина - $lenTrash товар" : "Корзина";
?>
<header>

	<div class="main_logo">
            <div class="logo">
                <a href="index.php" class="logo_text"> "Экспедиция" </a>
				
            </div>

            
	<!-- Панель управления -->
	<ul class="ctrl-panel">
	
		<?php switch($status): 
				 case "admin": ?>
				
				<a href="add.php" class="a1">Добавление</a>
				<a href="edit.php" class="a1">Редактирование</a>
			
			<?php case "user": ?>
				<li><a href="trash.php" id="trash-menu-txt"><?=$trash?></a></li>
				<li><div class="logo_reg">
                <a href="include/logout.php" class="head_reg"> Выход </a>
            </div></li>
			<?php break; ?>
			
			<?php default: ?>
			<div class="logo_reg">
                <a href="reg.php" class="head_reg"> Регистрация </a>
                <a href="sign-up.php" class="head_reg"> Войти </a>
            </div>
				
		<?php endswitch; ?>
	</ul>
</header>