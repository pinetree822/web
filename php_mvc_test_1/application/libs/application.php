<?php
namespace application\libs;


class Application
{
	public $controller;
	public $action;

	public function __construct()
	{
		$getUrl = '';
		$getParams = array();//[];
		if(isset($_GET['url'])){
			$getUrl = $_GET['url'];
			var_dump($_GET['url']);
		}
		$getParams = explode('/', $getUrl);
		// 주소값에서 넘어온값에서 배열치환
		//  URL에서 넘어온값 : localhost:8080/home/index/board/
		// .htaccess에서 넘어온값 : index.php?url=home/index/board
		// category 값이 없고, idx값만 넘길때 인식을 category값으로 인식

		echo "<br/><br/>";
		var_dump(_ROOT);
		var_dump($getParams);
		echo "<br/><br/>";
		// 주소값에서 넘어온 배열에 값이 없을때 저장할 내용값
		// 연관배열을 이용한 주소의 default값 채움
		// $getParams = [null,"index","fruits",1,null]; // url 테스트값

		$params = [
			"menu"=>"Board",
			//"menu"=>"Home",
			"action"=>"index",
			"category"=>null,
			"idx"=>null,
			"pageNum"=>null
		];


		// url값을 $params값으로 넣는다.
		for($i=0;$i<count($params);$i++){
		    $key = key($params);

			// menu에 들어가는 첫문자를 대문자로 변경한다.
			// ucfirst(strtolower($));
		   	if($key == 'menu'){
		   		$params[$key]=!(isset($getParams[$i])&&$getParams[$i])!=''?$params[$key]:ucfirst(strtolower($getParams[$i]));
		   	}elseif($key == 'action'){
		   		$params[$key]=!(isset($getParams[$i])&&$getParams[$i])!=''?$params[$key]:strtolower($getParams[$i]);
		   	}else{
		   		$params[$key]=!(isset($getParams[$i])&&$getParams[$i])!=''?$params[$key]:$getParams[$i];
		   	}
		   	echo '$params[$key] = '.$key. '=' . $params[$key]. '<br>';
		   	echo '$getParams[$i] = '.$key. '=' . (!empty($getParams[$i])?$getParams[$i]:null). '<br>';
			next($params);
		}
		//exit;



		// application/controllers/ 디렉토리에서
		// $param['menus'].Controllers.php 파일이 존재하는지 확인
		// Url에서 넘어온 문자중에 클래스,파일 판별기준이라 첫글자 대소문자를 조심해야된다.
		$className = '/application/controllers/'.$params['menu'];
		$classPath = _ROOT.$className.'Controller.php';
		if(!file_exists($classPath)){
			echo $classPath.'<br>';// 테스트후 escape화
			echo '해당 컨트롤러가 존재하지 않습니다.<br>';
			exit;
		}



		// 네임스페이스와 클래스이름 만들기
		//$class = str_replace('/', '\\', $className);
		//$controllerName = '\application\controller\\'.$params['menu'].'Controller';
		// $controllerName = '\\'.str_replace('/', '\\', $className).'Controller';
		$controllerName = str_replace('/', '\\', $className).'Controller';



		//echo "$params[menu],$params[action],$params[category],$params[idx],$params[pageNum]".'<br>';

		// "$params['menu']".'Controller' 클래스 초기화
		new $controllerName($params["menu"],$params["action"],$params["category"],$params["idx"],$params["pageNum"]);
	}

}
?>