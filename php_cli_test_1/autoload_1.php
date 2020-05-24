<?php
	spl_autoload_register(function ($class_name){
		include $class_name.'.php';
	});

	$obj1 = new MyClass1();
	$obj2 = new MyClass2();

// 	Warning: include(MyClass1.php): failed to open stream: No such file or directory in D:\_xampp\htdocs\web\php_cli_test_1\autoload_1.php on line 3

// Warning: include(): Failed opening 'MyClass1.php' for inclusion (include_path='\_xampp\php\PEAR') in D:\_xampp\htdocs\web\php_cli_test_1\autoload_1.php on line 3

// Fatal error: Uncaught Error: Class 'MyClass1' not found in D:\_xampp\htdocs\web\php_cli_test_1\autoload_1.php:6 Stack trace: #0 {main} thrown in D:\_xampp\htdocs\web\php_cli_test_1\autoload_1.php on line 6
?>