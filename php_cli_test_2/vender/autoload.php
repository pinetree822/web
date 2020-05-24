<?php
// +---vender
// |       autoload.php
spl_autoload_register(function ($class){

	echo 'ClassPath:'.$class.'<br>';
	// ClassPath:views\pages\Hello
	// ClassPath:views\pages\PageMain
	// ClassPath:views\pages\PageSub
	// ClassPath:views\pages\PageModal
	// ClassPath:views\tasks\Task01
	// ClassPath:views\tasks\Task02


	$class = str_replace('\\', '/', $class);
	echo 'FilePath:'.$class.'<br>';
	// FilePath:views/pages/Hello
	// FilePath:views/pages/PageMain
	// FilePath:views/pages/PageSub
	// FilePath:views/pages/PageModal
	// FilePath:views/tasks/Task01
	// FilePath:views/tasks/Task02

	require_once $class.".php";
	// echo "<br>";
	// exit();
});
?>