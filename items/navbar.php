
<div class="container-fluide mb-3">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toogle" aria-controls="toogle" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.png" alt="logo"></a>
    <div class="collapse navbar-collapse" id="toogle">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Аукционы</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Новости</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Продать</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 form_search mr-sm-2">
        <input class="form-control mr-sm-2 input_search" type="search" placeholder="Найдите исполнителей" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Найти</button>
      </form>
      <?php if (isset($_SESSION['user'])) {
        ?>
        <a class="btn btn-outline-light" href="exit.php">Выход (<?=$_SESSION['user']['login'] ?>)</a>
        <?php
      }
      else {
        ?>
        <a class="btn btn-outline-light" href="auto.php">Вход/регистрация</a>
        <?php
      } ?>
    </div>
  </nav>
</div>
