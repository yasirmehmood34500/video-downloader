<?php 
   // if (isset($_GET['download'])) {
   //     move_uploaded_file($_GET['download'], "video.mp4");
   // }
   if (isset($_POST['download_btn'])) {
      $url=$_POST['url'];
      $mime = 'application/video';
        header('Content-Type: '.$mime);
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=video_download.mp4');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        readfile($url);
        exit;
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include "./links/mete.php" ?>
      <style type="text/css">
         .spinner-border {
         display: none;
         margin-left: 47%;
         }
         .audio_list {
         display: none;
         }
         #resultBlock {
         /* display: none; */
         }
         .displayNone {
         display: none;
         }
      </style>
   </head>
   <body>
      <div class="Navbar">
         <?php include "./includes/navbar.php " ?>
      </div>
      <div class="bodysection">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-8 com-sm-12 col-xs-12 mx-auto px-3">
                  <div class="heading text-center">
                     <h1>How can we help you?</h1>
                     <h6>Search here to get answers to your questions</h6>
                     <!-- <form id="form"> -->
                     <div class="input-group">
                        <input type="text" name="d_url" required class="form-control rounded mx-auto mt-3"
                           placeholder="Paste The Link Here" id="url" autofocus="" aria-label="Search"
                           aria-describedby="search-addon" />
                        <button type="" id="getVideo" class="btn btn-success mt-3">Search </button>
                     </div>
                     <!-- </form> -->
                     <p class="pp">By using our service you accept our <strong> Terms of Service </strong> and
                        Privacy
                        Policy
                     </p>
                     <div class="spinner-border text-info" role="status">
                        <span class="visually-hidden ">Loading...</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!-- here we can make image section -->
      <div class="another" id="resultBlock">
      </div>
      <!-- end of text section -->
      <div class="container">
         <?php include "./includes/text.php" ?>
      </div>
      <!-- now for banner -->
      <?php include "./includes/banners.php" ?>
      <!-- Footer section -->
      <div class="footter">
         <?php include "./includes/footer.php" ?>
      </div>
      <input type="hidden" name="g_url" id="g_url" />
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery.js"></script>
      <script>
         $(document).ready(function() {
             $(document).on('click', '.video_list_btn', function() {
                 $(".audio_list").hide();
                 $(".video_list").show();
         
             });
             $(document).on('click', '.audio_list_btn', function() {
                 $(".video_list").hide();
                 $(".audio_list").show();
             });
             $("#getVideo").click(function() {
                 $(".spinner-border").show();
                 var url = $("#url").val();
                 $("#g_url").val(url);
                 if (url.length > 0) {
                     $.ajax({
                         url: 'ajax/api_get.php',
                         method: 'POST',
                         data: {
                             url: url
                         },
                         success: function(data) {
                             $(".spinner-border").hide();
                             $("#resultBlock").html(data);
                         }
                     });
                 } else {
                     $(".spinner-border").hide();
                     $("#url").focus();
                 }
             });
            //  $(document).on('click', '.download_video', function() {
            //      var g_url = $("#g_url").val();
            //      var itag = $(this).attr('data-itag');
            //      var id = $(this).attr('id');
            //      $(this).removeClass('btn-success');
            //      $(this).html('<img src="img/loader.gif" style="width: 25px; height: 25px;">');
            //      $.ajax({
            //          url: 'ajax/api_get.php',
            //          method: 'POST',
            //          data: {
            //              itag: itag,
            //              g_url: g_url
            //          },
            //          success: function(data) {
            //              $(".download_video").addClass('btn-success');
            //              $(".download_video").html('Download');
            //          }
            //      });
            //  });
         });
      </script>
   </body>
</html>