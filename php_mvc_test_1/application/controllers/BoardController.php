<?php
namespace application\controllers;


class BoardController extends Controller
{
	public function index($category, $idx, $pageNo)
	{
		echo "this is BoardController index() method.<br>";
		// boardModel 메소드 실행
		//$list = $this->modelClass->selectList($category, $idx, $pageNo);
		$list = $this->modelClass->selectList($category, $idx, $pageNo);
		$listCnt = $this->modelClass->cnt;

		$viewPath = _ROOT.'/application/views/board/index.php';
		require_once $viewPath;// views/board/index.php 포함 실행

	}

	// form내 submit값 확인(formSubmit, submitForm, submitAction)
	// 페이지 Submit Action 테이블 재구성해야됨
	public function submitForm($category, $idx, $pageNo)
	{
		// $menu+Controller->submitForm() 호출형태 구성
		// 보내진 FORM URL의 action보다 submit의 action이 우선한다.
		// submit의 actin은 $menu+Controller->submitForm() 재구성한다.
		// //
		// Action 우선값 >
		// submit 확인해서 있다면 > 값을 비교해서 분기한다.

		// $idx = $_POST["idx"];
		// $title = $_POST["title"];
		// $content = $_POST["content"];
		// $password = $_POST["password"];
		// $pageType = $_POST["pageType"];
		// $category = $_POST["category"];
		// $pageNo = $_POST["pageNo"];
		// $submit = $_POST["submit"]; // submit 액션 상태
		//$pageNo = isset($_POST["pageNo"])?$_POST["pageNo"]:$pageNo;
		if(isset($_POST["pageType"])) // 어떤 서비스에서 전송되는 것인지 확인
		{
			$pT = $_POST["pageType"]; // 페이지 상태
			$sA = $_POST["submit"]; // submit 액션 상태


			if($pT == "readView"){
				// submit 버튼 값 리스트 : 수정, 삭제, 목록
				if($sA=="수정"){// 수정페이지 이동
					$this->updateView($category, $idx, $pageNo);
				}elseif($sA=="삭제"){// 삭제페이지 이동
					$this->deleteView($category, $idx, $pageNo);
				}elseif($sA=="쓰기"){// 쓰기페이지 이동
					$this->writeView($category, $idx, $pageNo);
				} else {// 목록페이지 이동
					$this->index($category, $idx, $pageNo);
				}
			}elseif($pT == "writeView"){
				// submit 버튼 값 리스트 : 저장, 취소, 목록
				if($sA=="저장"){// insertBoard() 실행
					$this->insertBoard($category, $idx, $pageNo);
				}elseif($sA=="취소"){// 목록페이지 이동
					$this->index($category, $idx, $pageNo);
				}else {// 목록페이지 이동
					$this->index($category, $idx, $pageNo);
				}
			}elseif($pT == "updateView"){
				// submit 버튼 값 리스트 : 저장, 삭제, 쓰기, 목록
				if($sA=="저장"){// updateBoard() 실행
					$this->updateBoard($category, $idx, $pageNo);
				}elseif($sA=="취소"){// 목록페이지 이동
					$this->index($category, $idx, $pageNo);
				}elseif($sA=="삭제"){// 삭제페이지 이동
					$this->deleteView($category, $idx, $pageNo);
				}elseif($sA=="쓰기"){// 쓰기페이지 이동
					$this->writeView($category, $idx, $pageNo);
				}  else {// 목록페이지 이동
					$this->index($category, $idx, $pageNo);
				}
			}elseif($pT == "deleteView"){
				// submit 버튼 값 리스트 : 확인, 취소, 목록
				if($sA=="확인"){// deleteBoard() 실행
					$this->deleteBoard($category, $idx, $pageNo);
				}elseif($sA=="취소"){// 목록페이지 이동
					$this->index($category, $idx, $pageNo);
				}elseif($sA=="쓰기"){// 쓰기페이지 이동
					$this->writeView($category, $idx, $pageNo);
				}else {// 목록페이지 이동
					$this->index($category, $idx, $pageNo);
				}
			}else{
				$this->index($category, $idx, $pageNo);// 기본 Controller실행
			}

		} else {
			$this->index($category, $idx, $pageNo);// 기본 Controller실행
		}
	}



	// 주소값에서 넘어온값에서 배열치환
	//  URL에서 넘어온값 : localhost:8080/home/index/board/
	// .htaccess에서 넘어온값 : index.php?url=home/index/board
	// writeView - 쓰기 폼
	public function writeView($category, $idx, $pageNo)
	{
		require_once 'application/views/board/write.php';
	}


	// updateView - 수정 폼
	public function updateView($category, $idx, $pageNo)
	{
		// boardModel read 보기 조회 메소드 실행 / 저장

		$list = $this->modelClass->readBoard($category, $idx, $pageNo);
		$listCnt = $this->modelClass->cnt;
		if($listCnt > 0 ) {
			require_once 'application/views/board/update.php';
		} else {
			require_once 'application/views/board/updateNoFile.php';
		}
	}


	// deleteView - 삭제 폼
	public function deleteView($category, $idx, $pageNo)
	{
		// boardModel - 조회
		$list = $this->modelClass->readBoard($category, $idx, $pageNo);
		$listCnt = $this->modelClass->cnt;
		if($listCnt > 0 ) {
			require_once 'application/views/board/delete.php';
		} else {
			require_once 'application/views/board/deleteNoFile.php';
		}
	}


	// readView - 읽기 폼
	public function readView($category, $idx, $pageNo)
	{
		// boardModel read 보기 조회 메소드 실행 / 저장
		$list = $this->modelClass->readBoard($category, $idx, $pageNo);
		$listCnt = $this->modelClass->cnt;
		if($listCnt > 0 ) {
			require_once 'application/views/board/read.php';
		} else {
			require_once 'application/views/board/readNoFile.php';
		}
	}


	// writeView > insertBoard
	public function insertBoard($category, $idx, $pageNo)
	{
		// BoardModel의 insertBoard()를 호출한다.
		$this->modelClass->insertBoard($category, $idx, $pageNo);

		// 게시판 목록으로 전환, BoardModel의 index() 전환 호출
		header("location:"._WEBURL."/board");// header

	}

	// updateView > updateBoard
	public function updateBoard($category, $idx, $pageNo)
	{
		$this->modelClass->updateBoard($category, $idx, $pageNo);

		// 게시판 목록으로 전환, BoardModel의 index() 전환 호출
		header("location:"._WEBURL."/board");// header

	}


	// deleteView > deleteBoard
	public function deleteBoard($category, $idx, $pageNo)
	{

		$this->modelClass->deleteBoard($category, $idx, $pageNo);
		// 게시판 목록으로 전환, BoardModel의 index() 전환 호출
		// header('location:http://localhost/web/php_mvc_test_1/board');// header
		header("location:"._WEBURL."/board");// header

	}


}
?>