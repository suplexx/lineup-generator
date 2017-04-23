<!DOCTYPE HTML>
<html>
<head>
  <style>
  body {
    font-family: Verdana, sans-serif;
    font-size: 16px;
    background: #FAEBD7;

  }
  </style>
</head>
<body>

  <h1>MMA Lineup Generator</h1>
  <table>
    <form action="" method='post'>
      <!--perhaps not necessary for this setup
<tr><td>Number of Lineups</td> <td><input type="text" id="lineupsnum" value="" placeholder="*"></td></tr>
<tr><td>Max Cost</td> <td> <input type="text" id="maxcost" value="" placeholder="*"></td></tr>
<tr><td>Min Cost</td> <td> <input type="text" id="mincost" value="" placeholder="*"></td></tr>
<tr><td>Single Tolerance</td> <td> <input type="singletol" name="playernum" value="" placeholder="*"></td></tr>
<tr><td>Pair Tolerance</td> <td> <input type="text" id="pairtol" value="" placeholder="*"></td></tr><br><br></table>-->

<table id="playertable" border="0">
  <tr><th>Player</th><th>Cost</th></tr>
    <tr><td><input type="text" name="player1" value="" placeholder="Fighter 1"></td><td><input type="text" name="player1cost" value="" placeholder="*"></td></tr>
    <tr><td><input type="text" name="player2" value="" placeholder="Fighter 2"></td><td><input type="text" name="player2cost" value="" placeholder="*"></td></tr>
    <tr><td><input type="text" name="player3" value="" placeholder="Fighter 3"></td><td><input type="text" name="player3cost" value="" placeholder="*"></td></tr>
    <tr><td><input type="text" name="player4" value="" placeholder="Fighter 4"></td><td><input type="text" name="player4cost" value="" placeholder="*"></td></tr>
    <tr><td><input type="text" name="player5" value="" placeholder="Fighter 5"></td><td><input type="text" name="player5cost" value="" placeholder="*"></td></tr>
    <tr><td><input type="text" name="player6" value="" placeholder="Fighter 6"></td><td><input type="text" name="player6cost" value="" placeholder="*"></td></tr>
    <tr><td><input type="text" name="player7" value="" placeholder="Fighter 7"></td><td><input type="text" name="player7cost" value="" placeholder="*"></td></tr>
    <tr><td><input type="text" name="player8" value="" placeholder="Fighter 8"></td><td><input type="text" name="player8cost" value="" placeholder="*"></td></tr>
</table>
  <?php

//  print_r($_POST);
  if (isset( $_POST['player1'])){$playera = $_POST['player1'];}
  if (isset( $_POST['player1cost'])){$playeracost = $_POST['player1cost'];}
  if (isset( $_POST['player2'])){$playerb = $_POST['player2'];}
  if (isset( $_POST['player2cost'])){$playerbcost = $_POST['player2cost'];}
  if (isset( $_POST['player3'])){$playerc = $_POST['player3'];}
  if (isset( $_POST['player3cost'])){$playerccost = $_POST['player3cost'];}
  if (isset( $_POST['player4'])){$playerd = $_POST['player4'];}
  if (isset( $_POST['player4cost'])){$playerdcost = $_POST['player4cost'];}
  if (isset( $_POST['player5'])){$playere = $_POST['player5'];}
  if (isset( $_POST['player5cost'])){$playerecost = $_POST['player5cost'];}
  if (isset( $_POST['player6'])){$playerf = $_POST['player6'];}
  if (isset( $_POST['player6cost'])){$playerfcost = $_POST['player6cost'];}
  if (isset( $_POST['player7'])){$playerg = $_POST['player7'];}
  if (isset( $_POST['player7cost'])){$playergcost = $_POST['player7cost'];}
  if (isset( $_POST['player8'])){$playerh = $_POST['player8'];}
  if (isset( $_POST['player8cost'])){$playerhcost = $_POST['player8cost'];}
if (!empty($_POST)) {
try {
  $connection = new PDO('mysql:host=localhost', 'root', 'cookie');
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $connection->query("CREATE DATABASE IF NOT EXISTS mmaLineupGen");
  $connection->query("use mmaLineupGen");
  $connection->query("CREATE TABLE IF NOT EXISTS mmaLineupGen.fighters (Name char(16), salary mediumint(15) )");
  $connection->query("DELETE FROM mmaLineupGen.fighters WHERE Name IS NULL");
  $connection->query("DELETE FROM mmaLineupGen.fighters WHERE salary IS NULL");
  $sql = $connection->prepare("INSERT INTO fighters (Name, salary) VALUES
  (:Name, :salary)");
  $sql->bindParam(':Name', $player1);
  $sql->bindParam(':salary', $player1cost);

if (isset( $_POST['player1'])){
  $player1 = $playera;
  $player1cost = $playeracost;
  $sql->execute();
}
if (isset( $_POST['player2'])){
  $player1 = $playerb;
  $player1cost = $playerbcost;
  $sql->execute();
}
if (isset( $_POST['player3'])){
  $player1 = $playerc;
  $player1cost = $playerccost;
  $sql->execute();
}
if (isset( $_POST['player4'])){
  $player1 = $playerd;
  $player1cost = $playerdcost;
  $sql->execute();
}
if (isset( $_POST['player5'])){
  $player1 = $playere;
  $player1cost = $playerecost;
  $sql->execute();
}
if (isset( $_POST['player6'])){
  $player1 = $playerf;
  $player1cost = $playerfcost;
  $sql->execute();
}
if (isset( $_POST['player7'])){
  $player1 = $playerg;
  $player1cost = $playergcost;
  $sql->execute();
}
if (isset( $_POST['player8'])){
  $player1 = $playerh;
  $player1cost = $playerhcost;
  $sql->execute();
}

?>
<br><br>
<table id="results" width="600px" border="1" cellpadding="15" cellspacing="0">
  <thead>
  <tr>
    <th>Fighter 1</th>
    <th>Fighter 1 salary</th>
    <th>Fighter 2</th>
    <th>Fighter 2 salary</th>
    <th>Fighter 3</th>
    <th>Fighter 3 salary</th>
    <th>Fighter 4</th>
    <th>Fighter 4 salary</th>
    <th>Fighter 5</th>
    <th>Fighter 5 salary</th>
    <th>Fighter 6</th>
    <th>Fighter 6 salary</th>
    <th>Total Cost</th>
  </tr>
  </thead>

  <?php for ($x = 0; $x < 6; $x++) {
    $query2 = "SELECT DISTINCT Name, SUM(salary) from fighters group by rand() having sum(salary) < 50000 order by rand() limit 6";
    $sql2 = $connection->prepare($query2);
    $sql2->bindParam(':Name', $player1);
    $sql2->bindParam(':salary', $player1cost);
    $sql2->execute();

 ?>
</form>
  <tbody id="resultsBody">
    <tr>
    <?php
     while($row = $sql2->fetch(PDO::FETCH_ASSOC)){
      echo '<td>' . $row['Name'] . '</td>';
      echo '<td>' . $row['SUM(salary)'] . '</td>';
  }
}
}
 catch(PDOException $e)
 {
 echo "Connection failed " . $e->getMessage();
}
    }


$connection = null;

?>
<input type="submit" name="submit"><br><br>
</tr>
</tbody>
</table>
