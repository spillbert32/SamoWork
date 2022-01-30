<?php
	require_once "include/session.php";
	require_once "include/mysqli.php";
?>
<html lang="ru">
 <?php require_once "block/head.php"; ?>
<body>

<?php 
		require_once "block/header.php"; // шапка сайта
		require_once "block/nav.php"; // меню 
		
	?>

<body>
  <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_status = 'marinichev_db';
	

    $conn = mysqli_connect($host, $user, $password, $db_status);
    if (!$conn) {
      echo 'Ошибка с соединением.Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }

    if (isset($_POST["status"])) {
      if (isset($_GET['red_id'])) {
		
			$salt = get_salt(); //новый пароль - новая соль
			$password = hash("sha256", $password . $salt);
		  
          $sql = mysqli_query($conn, "UPDATE `user` SET `status` = '{$_POST['status']}',`login` = '{$_POST['login']}',`password` = '$password', `salt` = '$salt'  WHERE `id`={$_GET['red_id']}");
      } else {
      }

      if ($sql) {
        echo '<p>Запись измененена</p>';
      } else {
        
      }
    }

    if (isset($_GET['del_id'])) {
      $sql = mysqli_query($conn, "DELETE FROM `user` WHERE `id` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>Запись удалена</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($conn) . '</p>';
      }
    }

    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($conn, "SELECT `id`, `status`, `login`,`password` FROM `user` WHERE `id`={$_GET['red_id']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>
  <form action="" method="post">
    <table>
      <tr>
        <td>Доступ:</td>
        <td><input type="text" Name="status" size="50" value="<?= isset($_GET['red_id']) ? $product['status'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Логин:</td>
        <td><input type="text" Name="login" size="50" value="<?= isset($_GET['red_id']) ? $product['login'] : ''; ?>"></td>
      </tr>
	  <tr>
        <td>Пароль:</td>
        <td><input type="text" Name="password" size="50" value="<?= isset($_GET['red_id']) ? $product['password'] : ''; ?>"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Изменить"></td>
      </tr>
    </table>
  </form>
  <table border='1'>
    <tr>
      <td>Доступ</td>
      <td>Логин</td>
	  <td>Пароль</td>
      <td>Удаление</td>
      <td>Редактирование</td>
    </tr>
    <?php
      $sql = mysqli_query($conn, 'SELECT `id`, `status`, `login`,`password` FROM `user`');
      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
             "<td>{$result['status']}</td>" .
             "<td>{$result['login']} </td>" .
			 "<td>{$result['password']}</td>" .
             "<td><a href='?del_id={$result['id']}'>Удалить</a></td>" .
             "<td><a href='?red_id={$result['id']}'>Изменить</a></td>" .
             '</tr>';
      }
    ?>
  </table>
</body>
</html>