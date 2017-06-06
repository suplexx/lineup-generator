<?php

  $connection = new PDO('mysql:host=localhost', 'katiemft_root', '21cookie');
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $connection->query("CREATE DATABASE IF NOT EXISTS katiemft_tristian");
  $connection->query("use katiemft_tristian");
?>
