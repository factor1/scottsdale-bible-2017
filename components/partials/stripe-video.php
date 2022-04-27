<?php if(!isset($wp)) { return; }

//vars
$video = get_sub_field('video');

function generateVideoEmbedUrl($url){
  //This is a general function for generating an embed link of an FB/Vimeo/Youtube Video.
  $finalUrl = '';
  if(strpos($url, 'facebook.com/') !== false) {
      //it is FB video
      $finalUrl.='https://www.facebook.com/plugins/video.php?href='.rawurlencode($url).'&show_text=1&width=200';
  }else if(strpos($url, 'vimeo.com/') !== false) {
      //it is Vimeo video
      $videoId = explode("vimeo.com/video/",$url)[1];
      if(strpos($videoId, '&') !== false){
          $videoId = explode("&",$videoId)[0];
      }
      $finalUrl.='https://player.vimeo.com/video/'.$videoId;
  }else if(strpos($url, 'youtube.com/') !== false) {
      //it is Youtube video
      $videoId = explode("v=",$url)[1];
      if(strpos($videoId, '&') !== false){
          $videoId = explode("&",$videoId)[0];
      }
      $finalUrl.='https://www.youtube.com/embed/'.$videoId;
  }else if(strpos($url, 'youtu.be/') !== false){
      //it is Youtube video
      $videoId = explode("youtu.be/",$url)[1];
      if(strpos($videoId, '&') !== false){
          $videoId = explode("&",$videoId)[0];
      }
      $finalUrl.='https://www.youtube.com/embed/'.$videoId;
  }else{
      //Enter valid video URL
  }
  return $finalUrl;
}

?>
<?php if($video) { ?>
<section class="stripe-video">
    <div class="row fullWidth">
        <div class="fluidMedia" style="width: 100%">
            <iframe src="<?php echo generateVideoEmbedUrl($video); ?>" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
</section>
<?php return; } ?>
