
<section id="sidebar"> <?php echo $error;?> <a href="javascript:void(0)" id="popForm">글쓰기</a>
  <div id="popWindow" style="display:none"> <?php echo form_open_multipart('gallery/do_upload');?>
    <input type="file" name="userfile" />
    <textarea name="content"></textarea>
    <input type="submit" value="올리기" />
    </form>
  </div>
  <div id="galleryMenu">
    <h2><span class="ico_hot"></span><span class="hot_text">카테고리</span></h2>
    <div class="item">
      <h3 class="channel_title"><a href="#"><span class="wpd_ic wpd_ico_3"></span>전체보기</a></h3>
      <div class="third_channel show_third_channel clear"> <a href="#"><span>추천</span></a> <a href=""><span>인기</span></a> <a href=""><span>베스트</span></a> <a href=""><span>댓글많은것</span></a> </div>
    </div>
  </div>
</section>
