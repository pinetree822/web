<h1>글수정</h1>
<form action="<?=_WEBURL?>/board/updateBoard" method="POST">
	<input type="hidden" class="pageType" name="pageType" id="pageType" value="updateView">
	<input type="hidden" class="category" name="category" id="category" value="<?=$category?>">
	<!-- <input type="hidden" class="idx" name="idx" id="idx" value="<?=$idx ?>"> -->
	<input type="hidden" class="idx" name="idx" id="idx" value="<?=$list[0]->idx?>">
	<input type="hidden" class="pageNo" name="pageNo" id="pageNo" value="<?=$pageNo?>">

	<p>글제목 : <input type="text" class="title" name="title" id="title" placeholder="글제목" style="width:300px;" value="<?=$list[0]->title?>"/></p>
	<!-- <p>비밀번호 : <input type="text" class="password" name="password" id="password" value="" placeholder="비밀번호" required style="width:300px;" /></p> -->
	<p>글내용 : </p>
	<p><textarea class="content" name="content" id="content" style="width:500px;height: 200px;"><?=$list[0]->content?></textarea></p>


	<!-- 목록, 수정, 삭제 -->
	<p>
		<input type="submit" name="submit" value="저장" />
		<input type="submit" name="submit" value="취소" />
		<input type="submit" name="submit" value="삭제" />
		<input type="submit" name="submit" value="쓰기" />
		<button onclick="location.href='<?=_WEBURL?>/board/index/">목록</button>
	</p>

</form>