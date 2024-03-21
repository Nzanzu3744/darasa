<form class="form-group col-sm-12" id="frm_lecVid" name="frm_lecVid" style="height:100%; margin:0px;background:black ;" method="POST" enctype="multipart/form-data" class="form_control">

  <video style="height:100%; width:100%" id="video" name="video" autoplay></video>
  <!-- <canvas id="canvas" name="canvas"></canvas> -->
</form>
<script src="../plugins/stream/stream.js"></script>
<script>
  //Grab elements, create settings, etc.
  var video = document.getElementById('video');

  // Get access to the camera!
  if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({
      video: true
    }).then(function(stream) {
      //video.src = window.URL.createObjectURL(stream);
      video.srcObject = stream;
      video.play();
    });
  }

  /* Legacy code below: getUserMedia 
  else if(navigator.getUserMedia) { // Standard
      navigator.getUserMedia({ video: true }, function(stream) {
          video.src = stream;
          video.play();
      }, errBack);
  } else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
      navigator.webkitGetUserMedia({ video: true }, function(stream){
          video.src = window.webkitURL.createObjectURL(stream);
          video.play();
      }, errBack);
  } else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
      navigator.mozGetUserMedia({ video: true }, function(stream){
          video.srcObject = stream;
          video.play();
      }, errBack);
  }
  */
</script>