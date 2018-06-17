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
	<?php require_once 'items/navbar.php' ?>

	<div class="container">

		<div class="row mb-3">
			<div class="col-2">

			</div>
			<div class="col-2">
				<p>Сортировать по</p>
			</div>
			<div class="col-4">
				<form>
					<select id="inputState" class="form-control">
						<option selected>времени: завершающиеся первыми</option>
						<option>времени: недавно выставленные</option>
						<option>цене: возрастанию</option>
						<option>цене: убыванию</option>
						<option>количеству ставок: возрастанию</option>
						<option>количеству ставок: убыванию</option>
				 </select>
				</form>
			</div>

		</div>

		<div class="row">
			<div class="col-2 category">
				<ul class="list-group shadow">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<a href="index.php">Все исполнители</a>
						<?php $count_auctions = $mysqli -> query("SELECT count(id) as all_auctions FROM `auctions` WHERE status = '0'") -> fetch_assoc();	?>
						<span class="badge badge-secondary badge-pill"><?=$count_auctions['all_auctions']; ?></span>
					</li>
					<?php  $result = $mysqli -> query("SELECT category, count(category) as count_category FROM `goods` INNER JOIN auctions ON goods.id = auctions.id_user GROUP BY category"); ?>
					<?php foreach ($result as $category): ?>
						<li class="list-group-item d-flex justify-content-between align-items-center">
					    <a href="index.php?category=<?=$category['category']; ?>"><?=$category['category']; ?></a>
					    <span class="badge badge-secondary badge-pill"><?=$category['count_category']; ?></span>
					  </li>
					<?php endforeach; ?>

				</ul>
			</div>
			<div class="col-10">
				<div class="row">
					<?php if (isset($_GET['category'])) {
						$category = $_GET['category'];
						$result = $mysqli->query("SELECT auctions.current_price, auctions.id, auctions.commission, auctions.status, auctions.date_start, goods.name, goods.img, goods.period, goods.percent FROM `auctions` INNER JOIN goods ON auctions.id_goods = goods.id WHERE auctions.status = '0' AND goods.category = '$category' ORDER BY auctions.date_start");
							}
						else {
							$result = $mysqli->query("SELECT auctions.current_price, auctions.id, auctions.commission, auctions.status, auctions.date_start, goods.name, goods.img, goods.period, goods.percent FROM `auctions` INNER JOIN goods ON auctions.id_goods = goods.id WHERE auctions.status = '0' ORDER BY auctions.date_start");

						}?>

					<?php foreach ($result as $auction): ?>
						<div class="col-4 mb-3">
							<a href="auction.php?id=<?=$auction['id'] ?>" class="goods">
								<div class="card shadow">
									<img class="card-img-top" src="img/<?=$auction['img'] ?>" alt="Card image cap">
									<div class="card-body">
										<p class="text-dark"><?=$auction['name'] ?></p>
										<p class="text-muted">Начало: <strong><?=date_format(date_create($auction['date_start']), "d.m.Y H:i") ?></strong></p>
										<p class="text-muted">Период: <strong><?=$auction['period'] ?></strong> </p>
										<p class="text-muted">Процент: <strong><?=$auction['percent'] ?></strong> </p>
									</div>
								</div>
							</a>
						</div>
					<?php endforeach; ?>

				</div>
			</div>

		</div>
	</div>



</body>
</html>
<script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
