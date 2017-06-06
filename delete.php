<?php
 include "connect.php";
  try {
   $truncate = $connection->prepare("TRUNCATE TABLE katiemft_tristian.fighters");
   $truncate->execute();
   header('Location: ' . $_SERVER['HTTP_REFERER']);
} catch(PDOException $e){
  echo $e->getMessage();
}
?>
