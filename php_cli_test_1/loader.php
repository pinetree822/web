<?php

spl_autoload_register();
$home = new classes\home();
echo $home->get() . "<br>";

$home = new models\home();
echo $home->get(). "<br>";

$home = new views\home();
echo $home->get(). "<br><br>";


$all = new classes\all();
echo $all->get(). "<br>";

$all = new models\all();
echo $all->get()."<br>";

$all = new views\all();
echo $all->get();


?>