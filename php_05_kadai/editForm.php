<?php

require_once('./dbconnect.php');
require_once('./functions.php');

// 選択されたIDを取得
$id = $_GET['id'];

$sql = "SELECT * FROM records WHERE id = :id";

// SQL実行準備
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// SQLの実行
$stmt->execute();

// 実行結果の取得
$record = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/reset.css">
  <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>O-saifu</title>
</head>
<body>

  <div class="container">
    <header class="mb-5">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">O-saifu</a>
        <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
    </header>

    <form class="m-5" action="./update.php" method="POST">
      <input type="hidden" name="id" value="<?= $id; ?>">
      <p class="alert alert-success" role="alert">EDIT!!</p>
      <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" value="<?= db_conn($record['date']); ?>">
      </div>
      <div class="form-group">
        <label for="title">Goods</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= db_conn($record['title']); ?>">
      </div>
      <div class="form-group">
        <label for="amount">Ammount</label>
        <input type="number" class="form-control" id="amount" name="amount" value="<?= db_conn($record['amount']); ?>">
      </div>
      <div class="form-group">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="type" id="income" value="0"
            <?= db_conn($record['type']) == 0 ? 'checked' : '';  ?>
          >
          <label class="form-check-label" for="income">In</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="type" id="spending" value="1"
            <?= db_conn($record['type']) == 1 ? 'checked' : '';  ?>
          >
          <label class="form-check-label" for="spending">Out</label>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Ed orDel</button>
      </div>
    </form>

  </div>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
          integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
          integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
          crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
          integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
          crossorigin="anonymous"></script>
  <script src="./assets/js/app.js"></script>
</body>
</html>