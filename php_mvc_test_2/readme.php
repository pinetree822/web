<?php

// URL 규칙은 설정하기 나름
// MVC 모델은 URL 분석 -> 요청사항 분석 (URL 구성 규칙 필요)


// http://localhost:8080/메뉴/action/category/idx/pageNo/searchKey
// 구분 / 설명

//  idx / 상단 메뉴에 대응하는 값

//  action / 목록, 게시글보기, 쓰기, 수정하기, 삭제하기 등의 기능에 대응하는 값

//  category / 메뉴 하위에 다른 메뉴가 있을 경우 대응하는 용도로 사용될 값

//  idx / 글 번호에 대응하는 값

//  pageNo / 글을 읽고 다시 목록으로 돌아 가거나, 수정, 삭제 후 목록으로 돌아 갔을때 처음으로 돌아가지 않기 위해 현재 위치(페이지)를 저장하기 위한 값

//  searchKey / 조건 검색 후 페이지 이동, 글을 읽은 후 검색된 목록으로 이동 등과 같이 검색한 결과를 유지하기 위해 검색 했던 조건을 저장할 용도로 사용할 값


// action이 url과 href, form 값으로 구분된다.
// submit / 폼전송시 구분 값
// pageType / 폼 전송시 BoardController 내 함수 호출
//



// mysql 테이블 생성 - 방명록 게시판용 테이블 만들기
// 오류양식 체크 부분 빠짐
// 카운터 기능 빠짐
//
// 업로드자료(파일, 사진, 문서, url<동영상,홈페이지>,기타)
// 단일/멀티업로드
//
// 접속하는 기기별 확인기능
// 접속별 해상도별로 조정기능 빠짐
//
// 페이지 기능 빠짐
// 회원구조 빠짐 / 로그인 /인증
// 관리(어드민)기능 빠짐
// 채팅기능
// 달력기능

// 등록날짜와 수정날짜 변경한 query
// Create Table `board` (
// 	`idx` int(11) NOT NULL,
// 	`title` varchar(200) NOT NULL,
// 	`content` text NOT NULL,
// 	`category` varchar(20) NOT NULL DEFAULT '''''',
// 	`reg_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
// 	`edit_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
// 	`comment_cnt` int(11) NOT NULL DEFAULT '0'
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


// ALTER TABLE `board` ADD PRIMARY KEY (`idx`);
// ALTER TABLE `board` MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
// COMMIT;



?>