<?php
	$status = $_SESSION["status"];
	$lenTrash = count($_SESSION["trash"]);
	$trash = $lenTrash != 0 ? "Корзина - $lenTrash товар" : "Корзина";
?>
<header>
	<ul class="ctrl-panel">
	
		<?php switch($status): 
				 case "admin": ?>
				
				<a href="add_user.php" class="a1">Добавление пользователя</a>
				<a href="delete_user.php" class="a1">Редактирование пользователя</a>
				
			<?php case "user": ?>
				<br>
				<a href="trash.php" id="trash-menu-txt"><?=$trash?></a>
				<br>
				<a href="all_tv.php" class="a1">Товары</a>
				<a href="add.php" class="a1">Добавление товара</a>
				<a href="add_customs.php" class="a1">Добавление заказчиков</a>
				<a href="delete_customs.php" class="a1">Заказчики</a>
                <a href="include/logout.php" class="head_reg"> Выход </a>
            </div></li>
			<?php break; ?>
			
			
				
		<?php endswitch; ?>
	</ul>
</header>