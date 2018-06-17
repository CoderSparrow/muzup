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
	<title>MuzCoin</title>
</head>
<body>
	<?php if (!isset($_GET['id'])) {
		header("Location: index.php");
	}
	else {
		$id = $_GET['id'];
		$result = $mysqli->query("SELECT * FROM `goods` INNER JOIN auctions ON auctions.id_goods = goods.id WHERE auctions.id = $id");
		if ($result -> num_rows == 0) {
			// header("Location: index.php");
		}
		$result = $result -> fetch_all(MYSQLI_ASSOC);
	} ?>
	<?php require_once 'items/navbar.php' ?>
	<?php  ?>
	<div class="container  shadow pb-3 mb-5 pt-3 border-top">
		<div class="row mb-4">
			<a href="index.php" class="btn btn-secondary ml-3"><strong>&lt;</strong> Перейти к списку аукционов</a>
		</div>
		<div class="row mb-5">
			<div class="col-lg-4">
				<div class="card ">
					<img class="card-img-top " src="img/<?=$result[0]['img'] ?>" alt="Имущество">
					<div class="card-body">
						<p class="card-text goods-name"><strong><?=$result[0]['name'] ?></strong></p>
						<p>Период: <strong><?=$result[0]['period'] ?></strong> часов</p>
						<p>Процент: <strong><?=$result[0]['percent'] ?></strong> %</p>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card flex-md-row mb-1 box-shadow h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<div class="mb-1 text-muted"> Размещено: <strong class="d-inline-block mb-2 text-dark"><?= date_format(date_create($result[0]['datetime_add']), "d.m.Y H:i");  ?></strong></div>
						<p class="card-text mb-auto goods-description"><?=$result[0]['description'] ?></p>
					</div>
				</div>
			</div>
      </div>
		</div>
		<div class="container shadow border-top pb-4 pt-3">
			<div class="row mb-3 border border-top-0 border-right-0 border-left-0">
				<div class="col-3">Участников аукциона: <strong class="d-inline-block mb-2 text-dark">5</strong></div>
				<div class="col-2">Ставок: <strong class="d-inline-block mb-2 text-dark">15</strong></div>
				<?php
				// $date_add = date_create($result[0]['date_start']);
				// $period = "+".$result[0]['period']." hour";
				// $date = date_modify($date_add, "$period");
				// $d1 = date_format($date, "d.m.Y H:i");
				// // echo time();
				// $date1 = time() - strtotime($d1);
				// // $d1 = strtotime($result[0]['datetime_add']);
				// echo $date1; ?>
				<div class="col-3">Осталось времени: <strong class="d-inline-block mb-2 text-dark">-</strong></div>
				<div class="col-3">Продолжительность: <strong class="d-inline-block mb-2 text-dark"><?=$result[0]['period'] ?></strong> часов</div>
			</div>

			<div class="row">
				<div class="col-3">
					<div class="card ">
						<div class="card-header">
							Введите ставку:
						</div>
						<?php $id = $_GET['id']; ?>
						<form class="mt-3 mb-2 pl-2 pr-2" action="auction.php?id=<?=$id ?>" method="post">
						  <div class="form-row">
						    <div class="col">
						      <input type="text" class="form-control" name='value'>
						    </div>
						    <div class="col">
						      <input type="submit" class="form-control btm btn-secondary" name="bet" value="Разместить">
						    </div>
						  </div>
						</form>
					</div>
				</div>


				<?php
				if (isset($_POST['bet'])) {
					if (isset($_SESSION['user'])) {
						$id_user = $_SESSION['user']['id'];
						$id_auction = $_GET['id'];
						$value = $_POST['value'];
						$mysqli -> query("INSERT INTO `bets` (`id`, `id_auction`, `id_user`, `value`, `datetime_add`) VALUES (NULL, '$id_auction', '$id_user', '$value', CURRENT_TIMESTAMP)");
					}

				}
				 ?>


				<?php
						$id = $_GET['id'];
						$bets = $mysqli->query("SELECT * FROM `bets` INNER JOIN users ON users.id = bets.id_user WHERE id_auction = $id ORDER BY `bets`.`datetime_add` DESC");
				 ?>
				<div class="col-9">
					<div class="card ">
						<div class="card-header">
							<div class="row">
								<div class="col-4">Участник аукциона</div>
								<div class="col-3">Размер ставки</div>
								<div class="col-4">Время ставки</div>
							</div>
						</div>
						<ul class="list-group list-group-flush">
							<?php foreach ($bets as $bet): ?>
								<li class="list-group-item">
									<div class="row">
										<div class="col-4"><strong><?= $bet['login'] ?></strong></div>
										<div class="col-3"><strong>$<span><?= $bet['value'] ?></span></strong></div>
										<div class="col-4"><strong><?=date_format(date_create($bet['datetime_add']), "d.m.Y H:i") ?></strong></div>
									</div>
								</li>
							<?php endforeach; ?>
							<li class="list-group-item">
								<div class="row">
									<div class="col-4 text-muted">Начальная цена</div>
									<div class="col-3">$<span><?=$result[0]['current_price'] ?></span></div>
									<div class="col-4"></div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>


</body>
</html>

<script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
