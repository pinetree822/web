<?php
namespace application\models;
use \PDO;//PDO(PHP Data Objects)


class Model
{
	public $pdo;
	public $cnt;

	public function __construct()
	{
		echo "<br><br>this is ModelClass.<br>";
		// $dsn = "mysql:host=localhost;port=3306;dbname=testdb;charset=utf8";
		$dsn = _DBTYPE.':host='._HOST.';dbname='._DBNAME.';charset='._CHARSET;

		try {
			// mysql-pdo 연결
			//$this->pdo = new PDO($dsn, _DBUSER, _DBPASSWORD, _OPTION);
			$this->pdo = new PDO($dsn, _DBUSER, _DBPASSWORD);

			// https://offbyone.tistory.com/1
			// mysql-pdo 실행시 속성(옵션)을 지정한다.
			 // $option = array(
			 //     PDO::MYSQL_ATTR_FOUND_ROWS => true,
			 //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION    //에러출력 옵션 : 에러출력
			 // );
			$this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
			$this->pdo->setAttribute(\PDO::MYSQL_ATTR_FOUND_ROWS, true);
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

			echo "데이터베이스 연결 성공!!<br/>";
			// PDO :: ATTR_EMULATE_PREPARES 준비된 명령문의 에뮬레이션을 활성화 또는 비활성화합니다. TRUE OR FALSE 값 필요
			// PDO :: ATTR_ERRMODE : 오류보고.
			// PDO::ERRMODE_EXCEPTION 예외처리로 던진다

		//} catch(PDOException $e){
		} catch(Exception $e){
			var_dump("DB접속중 에러가 발생 하였습니다. : ". $e->getMessage());
		}
	}
}






?>