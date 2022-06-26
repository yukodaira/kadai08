<?php

function db_conn($value) {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

//SQLエラー関数：sql_error($stmt)
function sql_error ($stmt){
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);    
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
  header('Location: ' . $file_name);
  exit();
}

function loginCheck() {
  if ($_SESSION['chk_ssid'] != session_id()) {
      exit('LOGIN ERROR');
  } else {
      session_regenerate_id(true);
      $_SESSION['chk_ssid'] = session_id();
  }
}

?>