<?php

require("Session.php");
require('Nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://i.ibb.co/tDkQbmq/Logo.png" type="image/x-icon" />
    <title>Hire Truck</title>
    <!-- Icon css link -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Rev slider css -->
    <link href="vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
    <!-- Extra plugin css -->
    <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="vendors/magnify-popup/magnific-popup.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_inner_text">
                <center>
                    <h1> Selected Ads</h1>
                </center>
            </div>
        </div>
    </section>
    <!--================End Blog Main Area =================-->


    <div class="row">
        <?php

        $userId = $_SESSION['user_id'];
        $sql = "SELECT bid.status as bidStatus, bid.bid_price,
        a.Source_ad,  a.destination, a.ad_date FROM `bid_items` bid 
        INNER JOIN ad a ON bid.adId = a.AD_id where bid.userId = $userId";
        if ($res = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_array($res)) {

                    $status = $row['bidStatus'];
                    if ($status == '0') {
                        echo '<div class="col-sm-4" style="margin:5px;">
                        <div class="card">
                            <div class="card-body text-center">
                            '.$row['Source_ad'] .' <br/>
                            '.$row['destination'] .'<br/>
                            '.$row['ad_date'] .'<br/>
                            <h4> Bid Price : '.$row['bid_price'].'  </h4> 
                            <span class="label label-warning">Not Yet Confirmed</span>
                            </div>
                        </div>
                        <br />
                    </div>';
                    } else {
                        echo '<div class="col-sm-4" style="margin:5px;">
                        <div class="card">
                            <div class="card-body text-center">
                            '.$row['Source_ad'] .' <br/>
                            '.$row['destination'] .'<br/>
                            '.$row['ad_date'] .'<br/>
                            <h4> Bid Price : '.$row['bid_price'].'  </h4>  <br />
                            <h3><span class="label label-success">Confirmed</span></h3>
                            </div>
                        </div>
                        <br />
                    </div>';
                    }
                }
                mysqli_free_result($res);
            } else {
                echo "<p class='lead' style='margin-left:20px;'><em>No records were found.</em></p>";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
        ?>
    </div>



    </div>
    </div>
    <!-- </form> -->



    <!--================Footer Area =================-->
    <footer class="footr_area">
        <div class="footer_widget_area">
            <div class="container">
                <div class="row footer_widget_inner">
                    <div class="col-lg-6 col-sm-6">
                        <aside class="f_widget f_about_widget">
                            <img src="https://i.ibb.co/vwmyN0n/1549187869210.png" width="150px" alt="HireTruck">
                            <p>Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum.</p>
                        </aside>
                    </div>
                    <!-- <div class="col-lg-4 col-sm-6">
                            <aside class="f_widget f_insta_widget">
                                <div class="f_title">
                                    <h3>Instagram</h3>
                                </div>
                                <ul>
                                    <li><a href="#"><img src="img/instagram/ins-1.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="img/instagram/ins-2.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="img/instagram/ins-3.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="img/instagram/ins-4.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="img/instagram/ins-5.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="img/instagram/ins-6.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="img/instagram/ins-7.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="img/instagram/ins-8.jpg" alt=""></a></li>
                                </ul>
                            </aside>
                        </div> -->
                    <div class="col-lg-4 col-sm-6">
                        <aside class="f_widget f_subs_widget">
                            <div class="f_title">
                                <h3>Subscribe to newsletter</h3>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your e-mail address here" aria-label="Your e-mail address here">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary submit_btn" type="button">Subscribe</button>
                                </span>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_copyright">
            <div class="container">
                <div class="float-sm-left">
                    <h5>
                        This site is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by HireTruck
                    </h5>
                </div>
            </div>
        </div>
    </footer>
    <!--================End Footer Area =================-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Rev slider js -->
    <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <!-- Extra plugin css -->
    <script src="vendors/counterup/jquery.waypoints.min.js"></script>
    <script src="vendors/counterup/jquery.counterup.min.js"></script>
    <script src="vendors/counterup/apear.js"></script>
    <script src="vendors/counterup/countto.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="vendors/circle-bar/circle-progress.min.js"></script>
    <script src="vendors/circle-bar/plugins.js"></script>
    <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/isotope/isotope.pkgd.min.js"></script>

    <script src="js/circle-active.js"></script>
    <script src="js/theme.js"></script>
</body>

</html>