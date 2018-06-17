<?php session_start(); ?>
<?php require_once 'libs/mysqli.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Сайт</title>
</head>
<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-3"></div>
      <div class="col-6">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="auto.php">Вход в систему</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reg.php">Регистрация</a>
          </li>
        </ul>
        <div class="card p-4 shadow-lg">
          <form action="auto.php" method="post">
            <div class="form-group">
              <label>Логин</label>
              <input type="text" class="form-control" name="login" placeholder="Логин">
            </div>
            <div class="form-group">
              <label>Пароль</label>
              <input type="password" class="form-control" name="password" placeholder="Пароль">
            </div>
            <button type="submit" class="btn btn-primary">Вход в систему</button>
          </form>
        </div>
      </div>
      <div class="col-3"></div>
    </div>
		<?php
		if (!empty($_POST)) {
			$result = $mysqli -> query("SELECT * FROM `users` WHERE login = '$_POST[login]' AND password = SHA1('$_POST[password]')");
			$data = $result->fetch_assoc();
			if (!$data) {
				echo "Неверный логин или пароль";
			}
			else {
				$_SESSION['user'] = $data;
				header("Location: index.php");
			}
		}
		 ?>
  </div>


 </body>
 </html>
 <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
 <script type="text/javascript" src="js/scripts.js"></script>
