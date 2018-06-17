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
	<title>MuzUp</title>
</head>
<body>
  <div class="container">

    <div class="row mt-5">
      <div class="col-3"></div>
      <div class="col-6">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link " href="auto.php">Вход в систему</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="reg.php">Регистрация</a>
          </li>
        </ul>
        <div class="card p-4 shadow-lg">
          <form action="reg.php" method="post">
            <div class="form-group">
              <input type="text" name='fio' class="form-control"  placeholder="ФИО" required>
            </div>
            <div class="form-group">
              <input type="email" name='email' class="form-control"  placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="text" name='login' class="form-control" placeholder="Логин">
            </div>
            <div class="form-group">
              <input type="password" name='password' class="form-control" placeholder="Пароль">
            </div>
            <div class="form-group">
              <input type="password" name='confirm_password' class="form-control" placeholder="Подтвердите пароль">
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрировать</button>
          </form>
        </div>
      </div>
      <div class="col-3"></div>
    </div>
		<?php
		if (!empty($_POST)) {
			$result = $mysqli -> query("INSERT INTO `users` (`id`, `fio`, `login`, `password`, `email`, `role`, `datetime_add`) VALUES (NULL, '$_POST[fio]',  '$_POST[login]', SHA1('$_POST[password]'), '$_POST[email]', '0', CURRENT_TIMESTAMP)");
			if (!$result) {
				echo "<div class='container'><div class='col-3'></div><div class='col-6'><p>Такой логин уже есть</p></div></div>";
			}
			else {
				echo "<div class='container'><div class='col-3'></div><div class='col-6'><p>Регистрация прошла успешно. Войдите в свою учетную запись</p></div></div>";
			}
		}
		 ?>
  </div>




 </body>
 </html>
 <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
 <script type="text/javascript" src="js/scripts.js"></script>
