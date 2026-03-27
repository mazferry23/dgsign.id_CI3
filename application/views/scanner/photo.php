<?php
    session_start();
     if (!isset($_SESSION['username']) && !isset($_SESSION['id_role']) && !isset($_SESSION['id_event'])){
         header("Location: login.php");
     }
    //if ($_SESSION['id_role'] == '2'){
    //    header("Location: login.html");
    //}
?>

<!doctype html>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dgsign.id</title>

    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="assets/css/frontend/vendor.css">
    <link rel="stylesheet" href="assets/css/frontend/main.css">
    <link rel="stylesheet" href="assets/css/qr/style.css">
    <style>

    .image-upload > input
    {
        display: none;
    }
    img[id=blah]{
  border-radius: 5px;
} 

    

    </style>

</head>

<body >
    
    <main>
        <header id="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-menu col-6">
                        <!-- <a href="" class="d-block"><img src="assets/images/logo-w.png" class="logo" alt=""></a> -->
                    </div>
                    <div class="col-menu-mobile col-6 d-flex align-items-center justify-content-end">
                        <div class="menu menu-nav">
                            <span class="close-menu"></span>
                            <ul>
                                <li class="active"><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                                <!-- <li><a href="invitation.html"><i class="fas fa-sign-in-alt"></i> Check In</a></li>
                                <li class="child"><a href=""><i class="fas fa-gifts"></i> Souvenir</a>
                                    <ul>
                                        <li><a href="">Sovenir 1</a></li>
                                        <li><a href="">Souvenir 2</a></li>
                                        <li class="child2"><a href="">Souvenir 3</a>
                                            <ul>
                                                <li><a href="">Regular 1</a></li>
                                                <li><a href="">Regular 2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="rsvp.html"><i class="fas fa-address-book"></i> Reservation</a></li>
                                <li><a href="lcd.html"><i class="fas fa-desktop"></i> LCD</a></li>
                                <li><a href=""><i class="fas fa-tachometer-alt"></i> Dashboard</a></li> -->
                                <li><a href="../function_logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </div>
                        <div class="cage-nav">
                            <div class="navTrigger">
                                <i></i><i></i><i></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="fixed-content">
            <section class="scan">
                <div class="container">
                    
                    <div class="box-container">
                        <div class="box">

                        <img id="blah" src="assets/images/noimg.png" alt="your image" width="100%"/>

                        </div>
                    </div>

                </div>
                </div>
            </section>
        </section>
        <section class="search ">
            <div class="container ">
                <div class="btn-container ">
                    <!-- <button class="btn btn-sm btn-scan "><i class="fas fa-qrcode "></i> Scan QR Code</button> -->
                    <form action="../function_app.php" method="post" id="svphoto" enctype="multipart/form-data">
                             
                            <div>
                                <input id="file-input" name="file-input" accept="image/*" capture="camera" type="file" onchange="readURL(this);" hidden required/>
                                <button type="submit" id="files" name="files" class="btn btn-lg btn-scan"><i class="fa fa-camera "> </i></button>
                            </div> 
                            <input type="text"  id='id' name='id' value="<?php echo $id = $_GET['id'];?>" autocomplete="off" hidden>
                        </form>
                    <button type="submit" form="svphoto" name="selfie" class="btn btn-lg btn-scan"><i class="far fa-save "> Save</i></button>
                </div>
            </div>
        </section>
        
        <footer>
            <div class="container ">
                <a href=" "><img src="assets/images/logo.png " class="logo " alt=" "></a>
            </div>
        </footer>
        </div>
        </section>
    </main>
    <script src="assets/js/frontend/vendor.js "></script>
    <script src="assets/js/frontend/plugins.js "></script>
    <script src="assets/js/frontend/main.js "></script>
    <script type="text/javascript " src="assets/js/qr/filereader.js "></script>
    <script type="text/javascript " src="assets/js/qr/qrcodelib.js "></script>
    <script type="text/javascript " src="assets/js/qr/webcodecamjs.js "></script>
    <script type="text/javascript " src="assets/js/qr/main.js "></script>

    <script type="text/javascript ">
    $('button[id=files]').click(function() {
  $('input[type=file]').trigger('click');
});

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function myfunction() {
    alert("hello");
    //document.getElementById('file-input').click();
    $('#files').click();
    
}


    </script>

 <script>
     window.onload=function(){
  document.getElementById("files").click();
};
 </script>
</body>

</html>