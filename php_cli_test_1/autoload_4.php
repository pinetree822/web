<?php
	spl_autoload_register(function ($name){
		echo "Want to load $name";
		throw new MissingException("Unable to load $name");
	});

	try{
		$obj = new NonLoadableClass();
	}catch(Exception $e){
		echo $e->getMessage(),"\n";
	}

// Want to load NonLoadableClass
// Want to load MissingException
// Fatal error: Uncaught Error: Class 'MissingException' not found in D:\_xampp\htdocs\web\php_cli_test_1\autoload_4.php:4 Stack trace:
// #0 [internal function]: {closure}('MissingExceptio...')
// #1 D:\_xampp\htdocs\web\php_cli_test_1\autoload_4.php(4): spl_autoload_call('MissingExceptio...')
// #2 [internal function]: {closure}('NonLoadableClas...')
// #3 D:\_xampp\htdocs\web\php_cli_test_1\autoload_4.php(8): spl_autoload_call('NonLoadableClas...')
// #4 {main} thrown in D:\_xampp\htdocs\web\php_cli_test_1\autoload_4.php on line 4
?>