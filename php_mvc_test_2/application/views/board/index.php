<?php
	echo 'this is /views/board/index.php';
?>
<H1>게시판 목록 페이지</H1>
<a href="<?=_WEBURL?>/board/writeView">글쓰기</a><br/>
<?php

if($listCnt == 0){
	echo '현재 작성된 글이 없습니다.';
}else{
		// 주소값에서 넘어온값에서 배열치환
		//  URL에서 넘어온값 : localhost:8080/home/index/board/
		// .htaccess에서 넘어온값 : index.php?url=home/index/board

		// <a href="http://localhost/web/php_mvc_test_1/Board/view/board/<?php echo $item->idx; ? >">
		// $params["menu"],$params["action"],$params["category"],$params["idx"],$params["pageNum"]

	foreach($list as $item)
	{
?>
		<a href="<?=_WEBURL?>/board/readView/board/<?=$item->idx?>">
			<H3>제목 : <?=$item->title?></H3>
		</a>
<?php
	}
}
?>