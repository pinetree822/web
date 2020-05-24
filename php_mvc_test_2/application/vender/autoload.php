<?php
// \---application
//     +---vender
//     |       autoload.php
spl_autoload_register(function ($path){

	$path = str_replace('\\', '/', $path); // 문자치환
	$paths = explode('/', $path);//검색문자열로 배열화

	// 두번째 배열에서 검색하여 $className 지정
	if(preg_match('/model/',strtolower($paths[1]))){
		$className = 'models';
	}elseif(preg_match('/controller/',strtolower($paths[1]))){
		$className = 'controllers';
	}else{
		$className = 'libs';
	}

	// class pass 만들기
	$loadpath = $paths[0].'/'.$className.'/'.$paths[2].'.php';

	if(!file_exists($loadpath)){
		echo '<br>---------------------------------- <br>';
		echo "autoload : ${loadpath}file not found.";
		exit();
	}else {
		echo '<br>---------------------------------- <br>';
		echo 'autoload $path : ' . $loadpath . '<br>';
	}
	require_once $loadpath;

	// echo 'ClassPath:'.$path.'<br>';
	// // ClassPath:views\pages\Hello

	// $class = str_replace('\\', '/', $path);
	// echo 'FilePath:'.$path.'<br>';
	// // FilePath:views/pages/Hello

	// require_once $path.".php";
	// // echo "<br>";
	// // exit();
});


?>