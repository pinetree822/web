<?php
namespace application\controllers;

echo "boot Controller class<br>";
class Controller
{
	public $modelName;
	public $modelClass;
	public $modelPath;

	public function __construct($menu, $action, $category, $idx, $pageNo)
	{
		// menu+Model 파일이 있는지 확인
		$this->modelName = '/application/models/'.$menu.'Model';
		$className = str_replace('/', '\\', $this->modelName);
		$this->modelClass = new $className;// BoardModel 클래스 초기화
		$this->modelPath = _ROOT.$this->modelName.'.php';

		if(!file_exists($this->modelPath))
		{
			var_dump('Model Class file not found.('.$this->modelPath.')<br>');
			exit;
		}


		// $menu+Controller->submitForm() 호출형태 구성
		// 보내진 FORM URL의 action보다 submit의 action이 우선한다.
		// submit의 actin은 $menu+Controller->submitForm() 재구성한다.
		if(isset($_POST["submit"]))
		{
			$action = 'submitForm';
			$idx = isset($_POST["idx"])?$_POST["idx"]:$idx;
			$pageNo = isset($_POST["pageNo"])?$_POST["pageNo"]:$pageNo;
			$category = isset($_POST["category"])?$_POST["category"]:$category;
			// $title = $_POST["title"];
			// $content = $_POST["content"];
			// $password = $_POST["password"];
			// $pageType = $_POST["pageType"];
			// $category = $_POST["category"];
			// $pageNo = $_POST["pageNo"];
			// $submit = $_POST["submit"]; // submit 액션 상태

		}

		// echo 'action = ';
		// var_dump($menu, $action, $category, $idx, $pageNo);
		// echo '<br/><br/> ';

		// $menu+Controller(Board_Controller) 내부의 실행 함수 확인
		if(!method_exists($this,$action)){
			// class_exists()
			// echo '클래스안 함수리스트 얻어오기<br/>';
			// echo 'class = '. get_class($this). ", 존재 function = ". $action ;
			$action = 'index';// 의도치 않는 action은 index로 전환한다.
		}

		$this->$action($category, $idx, $pageNo);// Controller실행
	}
}
?>