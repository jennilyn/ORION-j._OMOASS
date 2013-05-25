<?php

   include '../dao/FUNCTIONDAO.php';
   
   $film_title = $_POST['film_title'];
   $thriller = $_POST['thriller'];
   $film_price = $_POST['film_price'];
   $date_added = $_POST['date_added'];
   $genre = $_POST['genre'];
   $stock = $_POST['stock'];
   $user_id = $_POST['user_id'];
   $film_id = $_POST['film_id'];
   
   
   $action = new FUNCTIONDAO();
   $action->add_film_by_admin($film_title,$thriller,$film_price,$genre,$stock,$date_added,$user_id,$film_id);
   
?>


