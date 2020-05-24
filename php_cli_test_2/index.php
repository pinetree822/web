<?php
// |   index.php
// |
// +---classes
// +---models
// +---vender
// |       autoload.php
// |
// \---views
//     +---pages
//     |       Hello.php
//     |       PageMain.php
//     |       PageModal.php
//     |       PageSub.php
//     |
//     \---tasks
//             Task01.php
//             Task02.php
require_once 'vender/autoload.php';
// require_once 'views/pages/Hello.php';
// require_once 'views/pages/PageMain.php';
// require_once 'views/pages/PageSub.php';
// require_once 'views/pages/PageModal.php';
// require_once 'views/tasks/Task01.php';
// require_once 'views/tasks/Task02.php';


$sayHello = new \views\pages\Hello;
$sayMain = new \views\pages\PageMain;
$saySub = new \views\pages\PageSub;
$sayModal = new \views\pages\PageModal;
$sayTask01= new \views\tasks\Task01;
$sayTask02 = new \views\tasks\Task02;


$sayHello->say();echo "<br><br>";
$sayMain->say();echo "<br><br>";
$saySub->say();echo "<br><br>";
$sayModal->say();echo "<br><br>";
$sayTask01->say();echo "<br><br>";
$sayTask02->say();echo "<br><br>";


// Page-Hello
// Page-Main
// Page-Sub
// Page-Modal
// todo Task01
// todo Task02

?>