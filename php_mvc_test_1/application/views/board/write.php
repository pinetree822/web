<h1>글쓰기</h1>
<form action="<?=_WEBURL?>/board" method="POST">
	<input type="hidden" class="pageType" name="pageType" id="pageType" value="writeView">
	<input type="hidden" class="category" name="category" id="category" value="<?=$category?>">
	<!-- <input type="hidden" class="idx" name="idx" id="idx" value="<?=$idx ?>"> -->
	<input type="hidden" class="idx" name="idx" id="idx" value="<?=$idx?>">
	<input type="hidden" class="pageNo" name="pageNo" id="pageNo" value="<?=$pageNo?>">
	<p>글제목 : <input type="text" class="title" name="title" id="title" placeholder="글제목" style="width:300px;" /></p>
<!-- 	<p>비밀번호 : <input type="text" class="password" name="password" id="password" placeholder="비밀번호" required style="width:300px;" /></p> -->
	<p>글내용 : </p>

	<p><textarea class="content" name="content" id="content" style="width:500px;height: 200px;"></textarea></p>
	<p>
		<!-- <input type="submit" name="submit_insert_board" value="저장하기" /> -->
		<input type="submit" name="submit" value="저장" />
		<input type="submit" name="submit" value="취소" />
		<!-- <a href="http://localhost/web/php_mvc_test_1/board/index/">취소</a> -->
		<a href="<?=_WEBURL?>/board/index/">목록</a>
<!-- 		<button onclick="location.href='http://localhost/web/php_mvc_test_1/board/index/">목록으로</button> -->
	</p>
</form>