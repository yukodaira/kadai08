<?php

try {

  $pdo = new PDO(
    // 'mysql:dbname=YOUR_DB_NAME;host=localhost;charset=utf8mb4',
    'mysql:dbname=gs_kadai;host=localhost;charset=utf8mb4',
    'root',
    'root',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
  );

} catch (PDOException $e) {

    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());

}