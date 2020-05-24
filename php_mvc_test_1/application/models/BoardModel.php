<?php
namespace application\models;

class BoardModel extends Model
{
	// BoardModel - 초기값
	public function index($category, $idx, $pageNo)
	{
		echo "this is BoardModel index()<br>";
	}


	// boardModel - 목록 조회 메소드 실행 / 프린트
	public function selectList($category, $idx, $pageNo)
	{
		// $sql = 'SELECT idx, title FROM board limit 1';
		$sql = 'SELECT idx, title FROM board ORDER BY idx DESC';
		$stmt = $this->pdo->prepare($sql);//prepare는 쿼리를 실행할 준비
		$result = $stmt->execute();//쿼리를 실행
		$this->cnt = $this->cntList($stmt);

		return $stmt->fetchAll(\PDO::FETCH_OBJ);
		/*
			// fetchAll - 쿼리 실행 결과가 여러 줄일 경우 모든 결과로 반환
			// 옵션 : FETCH_OBJ - 반환값에 접근할때 객체에 접근 하는 방식처럼

			[0]=> object(stdClass)#7 (2) {
				["idx"]=> int(1)
				["title"]=> string(7) "제목1"
			}
		*/
	}



	// insertBoard() - 글등록
	// 저장해야 할 데이터는 PDO의 플레이스홀더 방식을 따랐습니다.
	// 이 방식을 이용하면 sql injection 같은 해킹을 미연에 방지할 수 있습니다.
	// https://idchowto.com/?p=20119
	public function deleteBoard($category, $idx, $pageNo)
	{
		try {
            // $this->pdo->beginTransaction();
			$sql = 'DELETE FROM board WHERE idx=:idx';
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':idx', $idx, \PDO::PARAM_STR);
			$result = $stmt->execute();
            // $this->pdo->commit();
			return $result;
		} catch(Exception $e){
			var_dump('글 삭제 중 에러 발생 : '.$e->getMessage());
		}
	}


	// insertBoard() - 글등록
	// 저장해야 할 데이터는 PDO의 플레이스홀더 방식을 따랐습니다.
	// 이 방식을 이용하면 sql injection 같은 해킹을 미연에 방지할 수 있습니다.
	// https://idchowto.com/?p=20119
	public function updateBoard($category, $idx, $pageNo)
	{
		try {
            // $this->pdo->beginTransaction();
			$sql = 'UPDATE board SET title=:title, content=:content, edit_date=:edit_date WHERE idx=:idx';
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':idx', $idx, \PDO::PARAM_STR);
			$stmt->bindValue(':title', $_POST["title"], \PDO::PARAM_STR);
			$stmt->bindValue(':content', $_POST["content"], \PDO::PARAM_STR);
			$stmt->bindValue(':edit_date', date ("Y-m-d H:i:s"), \PDO::PARAM_STR);
			// $handle->execute(array(":date"=>date("Y-m-d H:i:s", strtotime($date)), PDO::PARAM_STR));
			$result = $stmt->execute();
            // $this->pdo->commit();
			return $result;
		} catch(Exception $e){
			var_dump('글 수정 중 에러 발생 : '.$e->getMessage());
		}
	}



	// insertBoard() - 글등록
	public function insertBoard($category, $idx, $pageNo)
	{
		try {
        	// $this->pdo->beginTransaction();
			$sql = 'INSERT INTO board (title, content, reg_date, edit_date) VALUES (:title, :content, :reg_date, :edit_date)';
			//$sql = 'INSERT INTO board (title, content) VALUES (:title, :content)';

			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':title', $_POST["title"], \PDO::PARAM_STR);
			$stmt->bindValue(':content', $_POST["content"], \PDO::PARAM_STR);
			$stmt->bindValue(':reg_date', date ("Y-m-d H:i:s"), \PDO::PARAM_STR);
			$stmt->bindValue(':edit_date', date ("Y-m-d H:i:s"), \PDO::PARAM_STR);
			// $stmt->bindValue();// bindValue()에 값이 할당된다.
			// $stmt->bindParam();// bindParam()후 execute() 하기전 값을 변경 가능한다.
			$result = $stmt->execute();
            // $this->pdo->commit();
		} catch(Exception $e){
			var_dump('글 등록 중 에러 발생 : '.$e->getMessage());
		}
	}




	// boardModel - 목록 조회 메소드 실행 / 프린트
	public function readBoard($category, $idx, $pageNo)
	{
		// $sql = 'SELECT idx, title FROM board ORDER BY idx DESC limit 1';
		// $sql = "SELECT * FROM $category where idx='$idx' limit 1";
		$sql = "SELECT * FROM board where idx=:idx limit 1";
		$stmt = $this->pdo->prepare($sql);//prepare는 쿼리를 실행할 준비
		$stmt->bindValue(':idx', $idx, \PDO::PARAM_STR);
		$result = $stmt->execute();//쿼리를 실행
		$this->cnt = $this->cntList($stmt);
		var_dump($this->cnt,$result);

		return $stmt->fetchAll(\PDO::FETCH_OBJ);
		/*
			// fetchAll - 쿼리 실행 결과가 여러 줄일 경우 모든 결과로 반환
			// 옵션 : FETCH_OBJ - 반환값에 접근할때 객체에 접근 하는 방식처럼

			[0]=> object(stdClass)#7 (2) {
				["idx"]=> int(1)
				["title"]=> string(7) "제목1"
			}
		*/
	}





	// cntList() - selectList()의 리스트 갯수
	public function cntList(&$stmt){
		// print("Selected ($stmt->rowCount()) rows.<br/>\n");
		return ($stmt->rowCount());
	}
}






	// // boardModel 목록 조회 메소드 실행 / 저장
	// public function selectList($category, $idx, $pageNo)
	// {

	// 	$query = "SELECT * FROM board";
	// 	$stmt = $this->pdo->query($query);
	// 	$result = $stmt->setFetchMode(\PDO::FETCH_NUM);// bool
	// 	// public PDOStatement::setFetchMode ( int $mode = PDO::FETCH_INTO , object $object ) : bool

	// 	$count = $stmt->rowCount();
	// 	while($row = $stmt->fetch()){
	// 		print $row[0]. "\t". $row[1]. "\t". $row[2]. "\t". $row[3]. $row[4]. "\t". $row[5]. "\t". $row[6]. "\t". "<br/>\n";
	// 	}

	// 	print("Return number of rows that were selected: <br/>\n");
	// 	print("\$result Value : ($result)<br/>\n");
	// 	print("Selected ($count) rows.<br/>\n");
	// 	echo "this is BoardModel selectList()<br><br>";
	//     //$this->pdo = null;/// 함수로 전환
	// 	return $stmt;
	// 	// return $result;
	// }
?>