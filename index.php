<?php 
if (isset($_GET['download'])) {
    move_uploaded_file($_GET['download'], "video.mp4");
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
                            Policy</p>


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
        <div class="container">
            <div class="row order border-dark">
                <div class="col-lg-10 col-md-12 col-xs-12 col-sm-12 mx-auto b">

                    <!-- Now for sections -->

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center mt-3">
                            <div class="image">
                                <img src="./img/1.png" alt="image"><br>
                                <p class="description mt-2" style="padding:3px 10px;margin:0px 30px">cjcd cdcbkjba cem
                                    fefnekfmefef fefenf fefnwe fefnlwef
                                    cjcd cdcbkjba cem fefnekfmefef fefenf fefnwe fefnlwef
                                </p>
                            </div>

                        </div>


                        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
                            <div class="text">

                                <table class="table border border-dark  rounded-1">
                                    <thead class=py-2>
                                        <tr>
                                            <th scope="col"><button
                                                    class="btn btn-primary w-100 video_list_btn">Video</button></th>
                                            <th></th>
                                            <th scope="col"><button
                                                    class="btn btn-primary w-100 audio_list_btn">Audio</button></th>

                                        </tr>
                                    </thead>
                                    <tbody id="data_res">


                                    </tbody>
                                </table>

                            </div>
                        </div>





                    </div>


                </div>
            </div>
        </div>






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








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script>
    $(document).ready(function() {
        $(".video_list_btn").click(function() {
            $(".audio_list").hide();
            $(".video_list").show();

        });
        $(".audio_list_btn").click(function() {
            $(".video_list").hide();
            $(".audio_list").show();
        });
        $("#getVideo").click(function() {
            $(".spinner-border").show();
            var url = $("#url").val();
            if (url.length > 0) {
                $.ajax({
                    url: 'api_get.php',
                    method: 'POST',
                    data: {
                        get_video_detail: 'yes',
                        url: url
                    },
                    success: function(data) {
                        $("#resultBlock").show();
                        $(".spinner-border").hide();
                        $("#data_res").html(data);
                    }
                });
            } else {
                $(".spinner-border").hide();
                $("#url").focus();
            }

        });
    });
    </script>
</body>

</html>
<!-- https://rr4---sn-aigzrne7.googlevideo.com/videoplayback?expire=1660036377&ei=udDxYqWiGouAx_AP_d6J4A4&ip=216.131.116.166&id=o-AA2qkeSmuBTFjVFW6JMoJ6uAFT6_evxraxxL3FTdMTb1&itag=22&source=youtube&requiressl=yes&mh=LQ&mm=31%2C26&mn=sn-aigzrne7%2Csn-5hneknes&ms=au%2Conr&mv=m&mvi=4&pl=25&initcwndbps=685000&spc=lT-Khj2UXRexMOnQ6fruySKXievDIPU&vprv=1&mime=video%2Fmp4&ns=ose5tJSTvmd91YXQ1yHln9AH&cnr=14&ratebypass=yes&dur=349.181&lmt=1577415570083255&mt=1660014291&fvip=4&fexp=24001373%2C24007246&c=WEB&rbqsm=fr&txp=5432432&n=NKFrJlgIj8kzgA&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cspc%2Cvprv%2Cmime%2Cns%2Ccnr%2Cratebypass%2Cdur%2Clmt&sig=AOq0QJ8wRQIgPXtI9f2nH5MeGuLFIvZwPNuMCgtQmLk6edCtFs2NdAgCIQDCk-GkruiFCQW3fvTxih0OQCpb60N-FXvGiu194X9Fzg%3D%3D&lsparams=mh%2Cmm%2Cmn%2Cms%2Cmv%2Cmvi%2Cpl%2Cinitcwndbps&lsig=AG3C_xAwRAIgNfdOSM_QnXNjcbzxXCYtiY-MZkXPIz3G8JcEVYnK-AoCICFRzqVReHZubOXkdFIKXRSqV00fjxMFiG6g-nRTBR_3&title=apple%20iPhone%20logo%20flashing%20on%20and%20off%20-%20solution -->
<!-- https://rr10---sn-pmcg-bg0e.googlevideo.com/videoplayback?expire=1660038472&ei=6NjxYu_0HuXmhwbh9JHADw&ip=162.0.209.167&id=o-ABSphPPCRcS-YJO7wbiFP1li8ZJrSFGJ8Unu0ewUna4z&itag=298&source=youtube&requiressl=yes&mh=LQ&mm=31%2C26&mn=sn-pmcg-bg0e%2Csn-q4flrnsd&ms=au%2Conr&mv=u&mvi=10&pl=24&vprv=1&mime=video%2Fmp4&gir=yes&clen=133551282&dur=349.115&lmt=1577415133623347&mt=1660015905&fvip=3&keepalive=yes&fexp=24001373%2C24007246&c=ANDROID&rbqsm=fr&txp=5432432&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cvprv%2Cmime%2Cgir%2Cclen%2Cdur%2Clmt&sig=AOq0QJ8wRgIhALXhkZ6JP7hPbhStKIgb95d50r9LLKwWR_0VCxwXPNqJAiEA5KZ56j5Y1tlSlhmlll0976UPoMZUsdgFQ26cv0-c5T0%3D&lsparams=mh%2Cmm%2Cmn%2Cms%2Cmv%2Cmvi%2Cpl&lsig=AG3C_xAwRQIhAKGUsy714kvi9Lb276D-iVZyxOwuu6lqJOXL5Nw4QqmaAiBdP2GTX_l8S7B9OlIITRKi51YpN-G24EdlpLevzMEYiQ%3D%3D&title=apple%20iPhone%20logo%20flashing%20on%20and%20off%20-%20solution -->