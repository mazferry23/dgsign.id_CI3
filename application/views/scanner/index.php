<?php
    // session_start();
    //  if (!isset($_SESSION['username']) && !isset($_SESSION['id_role']) && !isset($_SESSION['id_event']) && !isset($_SESSION['facam'])){
    //      header("Location: login.php");
    //  }
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
    <link rel='stylesheet' href='assets/css/autotext/jquery-ui.min.css'>

</head>
<style>
        #reader {
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
        }
    </style>
    <?php require_once("../conn.php");
        ?>
    <?php 
        $username = $_SESSION['username'];
        $id_event = $_SESSION['id_event'];
        $rQuerycekuser = mysqli_query($conn,"select * from tb_user where username='$username'");
        $datacekuser = mysqli_fetch_array($rQuerycekuser);
        //echo $id_event;
    ?>
    <?php 
    // if($datacekuser['ft_app_camera']== 0){ 
    //     echo '<body  onload="startFront()">';
    // }else{
    //     echo '<body  onload="startBack()">';
    // }
    if($_SESSION['facam']== 0){ 
        echo '<body  onload="startFront()">';
    }else{
        echo '<body  onload="startBack()">';
    }
    ?>

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
                                <li class="active"><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                                <!-- <li><a href="invitation.php"><i class="fas fa-sign-in-alt"></i> Check In</a></li>
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
            <section class="info">
            <?php require_once("../conn.php");
        ?>
            <?php 
                                $username = $_SESSION['username'];
                                $id_event = $_SESSION['id_event'];
                                $rQuerycekuser = mysqli_query($conn,"select * from tb_event where id_event='$id_event'");
                                $datacekuser = mysqli_fetch_array($rQuerycekuser);
                                //echo $id_event;
                                ?>
                <div class="container">
                    <!-- <h3>Resepsi Pernikahan</h3> -->
                    <!-- <h1>Dina Marina & Doniawan Setya</h1>
                    <h2>Hotel Ungaran Cantik</h2>
                    <h2>Ungaran, 24 November 2020 | 08.00 - 13.00 WIB</h2> -->
                    <h1><?php echo $datacekuser["nama_event"];?></h1>
                    <h2><?php echo $datacekuser["lokasi_event"];?></h2>
                    <!-- <h2><?php //echo $datacekuser["alamat_event"];?></h2> -->
                    <h2><?php //echo $datacekuser["tanggal_event"];?>
                    <?php  
                        $orgDate = $datacekuser["tanggal_event"];  
                        $newDate = date("l, d F Y | H:i ~ ", strtotime($orgDate));  
                        echo $newDate; 
                        $orgDate1 = $datacekuser["tanggal_event_end"];  
                        $newDate1 = date("H:i", strtotime($orgDate1));  
                        echo $newDate1; 
                    ?>
                    <?php
                        //$date=$datacekuser["tanggal_event"];
                        //echo date_format($date,"l, d F Y H:i");
                    ?> </h2>
                </div>
            </section>
            
            <section class="scan">
                <div class="container">
                    <h1>Scan <span>QR Code</span> disini</h1>
                    <div class="box-container">
                            <audio id="myAudio">
                            <!-- <source src="horse.ogg" type="audio/ogg"> -->
                            <source src="assets/audio/beep.mp3" type="audio/mpeg">
                            </audio>
                            <?php 
                                $username = $_SESSION['username'];
                                $id_event = $_SESSION['id_event'];
                                $rQuerycekuser = mysqli_query($conn,"select * from tb_user where username='$username'");
                                $datacekuser = mysqli_fetch_array($rQuerycekuser);
                                //echo $id_event;
                            ?>
                            <?php 
                            if($_SESSION['facam']== 0){ 
                                echo '<div class="box" id="reader">';
                            }else{
                                echo '<div class="box" id="reader_back">';
                            }?>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        </section>
        <section class="search ">
            <div class="container ">
                <!-- <p><span class="d-block ">Tidak membawa QR Code?</span> </p> -->

                <form class="exampl" action="invitation.php" id="formsv" method="post" hidden>
                    <div id="qr-reader-results"  onchange="update"></div>
                    <input id="qrcode" type="text" name="qrcode" value="" >
                    <button type="submit" form="formsv" name="simpansv" id="simpansv"><i class="far fa-edit"></i> Input Manual</button>
                </form>
                <!-- <form class="example" action="invitation.php" id="formsv" method="post" >
                                <img id="scanned-img" src="">
                                <p id="scanned-QR" onchange="update"></p>
                                <input id="qrcode" type="text" name="qrcode" value="">
                                <button type="submit " form="formsv " name="simpansv1 " id="simpansv1 "><i class="far fa-edit "></i> Input Manual</button>
                            </form> -->

                <!-- <div class="box-search ">
                    <form action=" ">
                        <input type="text ">
                        <button><i class="fas fa-search "></i></button>
                    </form>
                </div> -->
                <div class="box-search ">
                             <form class="exampl" action="invitation.php" id="formsv2" method="post" >
                                <input type='text' class='form-control form-control-custom name-custom id' id='id' name='id' autocomplete="off" hidden>
                                <input type="text" class="form-control form-control-custom name-custom nama" id='nama' name='nama' autocomplete="off" required>
                                <button type="submit" form="formsv2" name="simpansv2" id="simpansv2"><i class="fas fa-search "></i> Search</button>
                            </form> 
                        </div>
                <div class="btn-container ">
                    <!-- <button class="btn btn-sm btn-scan "><i class="fas fa-qrcode "></i> Scan QR Code</button> -->

                    <button class="btn btn-sm btn-scan "><a href="invitation.php "><i class="far fa-edit "></i> Input Manual</a></button>
                
                </div>
            </div>
        </section>
         <!-- <section class="swipe-container "> -->
            <!-- <span class="swipe-close "></span> -->
            <!-- <div class="swipe-trigger "></div> -->
            <!-- <div class="swipe-content "> -->
                <!-- <section class="search "> -->
                    <!-- <div class="container "> -->
                        <!-- <p><span class="d-block ">Tidak membawa QR Code?</span> silahkan masukkan nama undanganmu dibawah ini :</p> -->

                        <!-- <div class="box-search "> -->
                            <!-- <form class="exampl" action="invitation.php" id="formsv2" method="post" >
                                <input type='text' class='form-control form-control-custom name-custom id' id='id' name='id' autocomplete="off" hidden>
                                <input type="text" class="form-control form-control-custom name-custom nama" id='nama' name='nama' autocomplete="off" required>
                                <button type="submit" form="formsv2" name="simpansv2" id="simpansv2"><i class="fas fa-search "></i> Search</button>
                            </form> -->
                        <!-- </div> -->
                        <!-- <div class="btn-container "> -->
                            <!-- <button class="btn btn-sm btn-scan "><i class="fas fa-qrcode "></i> Scan QR Code</button> -->
                            <!-- <button class="btn btn-sm btn-scan "><a href="invitation.php "><i class="far fa-edit "></i> Input Manual</a></button> -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </section> -->
        <!-- <footer>
            <div class="container ">
                <a href=" "><img src="assets/images/logo.png " class="logo " alt=" "></a>
            </div>
        </footer> -->
        </div>

    </main>
    <script src="assets/js/frontend/vendor.js "></script>
    <script src="assets/js/frontend/plugins.js "></script>
    <script src="assets/js/frontend/main.js "></script>
    <script src="assets/js/autotext/jquery-ui.min.js"></script>
    <script src="assets/js/qr/html5-qrcode.min.js"></script>
    <script>

        // const html5QrCode = new Html5Qrcode("reader_back");
        // const qrCodeSuccessCallback = message => { /* handle success */ }
        // const config = {
        //     fps: 10,
        //     qrbox: 250
        // };

        // // If you want to prefer front camera
        // html5QrCode.start({
        //     facingMode: "environment"
        // }, config, onScanSuccess);

        // var resultContainer = document.getElementById('qr-reader-results');
        // var lastResult, countResults = 0;

        // function onScanSuccess(qrCodeMessage) {
        //     if (qrCodeMessage !== lastResult) {
        //         ++countResults;
        //         lastResult = qrCodeMessage;
        //         resultContainer.innerHTML += `<div>[${countResults}] - ${qrCodeMessage}</div>`;
        //     }
        // }
    </script>
    <script>
function startFront() {
        const html5QrCode = new Html5Qrcode("reader");
        const qrCodeSuccessCallback = message => { /* handle success */ }
        const config = {
            fps: 10,
            qrbox: 250
        };

        // If you want to prefer front camera
        html5QrCode.start({
            facingMode: "user"
        }, config, onScanSuccess);

    //    var resultContainer = document.getElementById('qr-reader-results');
     //   var lastResult, countResults = 0;
    }

    function startBack() {
        const html5QrCode = new Html5Qrcode("reader_back");
        const qrCodeSuccessCallback = message => { /* handle success */ }
        const config = {
            fps: 10,
            qrbox: 250
        };

        // If you want to prefer front camera
        html5QrCode.start({
            facingMode: "environment"
        }, config, onScanSuccess);

      //  var resultContainer = document.getElementById('qr-reader-results');
      //  var lastResult, countResults = 0;
    }
        function onScanSuccess(qrCodeMessage) {
            // if (qrCodeMessage !== lastResult) {
            //     ++countResults;
            //     lastResult = qrCodeMessage;
            //     //resultContainer.innerHTML += `<div>[${countResults}] - ${qrCodeMessage}</div>`;
            // }
            var resultContainer = document.getElementById('qr-reader-results');
            resultContainer.innerHTML = `${qrCodeMessage}`;
            document.getElementById("myAudio").play(); 

            setTimeout(function() {
                document.getElementById("simpansv").click();
            }, 300);

            //document.getElementById('qr-reader-results').val = qrCodeMessage;
        }
    </script>

    <script type="text/javascript">
            setInterval(update,1);
                function update() {
                    var code_id_value = document.getElementById("qr-reader-results").innerHTML;
                    document.getElementById("qrcode").value = code_id_value;
                    }
                    update();
        </script>
            <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('keydown', '.nama', function() {
                var id = this.id;
                var splitid = id.split('_');
                var index = splitid[1];
                $( '#'+id ).autocomplete({
                    source: function( request, response ) {
                        $.ajax({
                            url: "getDetails.php",
                            type: 'post',
                            dataType: "json",
                            data: {
                                search: request.term,request:1
                            },
                            success: function( data ) {
                                response( data );
                            }
                        });
                    },
                    select: function (event, ui) {
                        $(this).val(ui.item.label); // display the selected text
                        var userid = ui.item.value; // selected id to input
 
                        // AJAX
                        $.ajax({
                            url: 'getDetails.php',
                            type: 'post',
                            data: {userid:userid,request:2},
                            dataType: 'json',
                            success:function(response){                
                                var len = response.length;
                                if(len > 0){
                                    var id              = response[0]['id'];
                                    var nama            = response[0]['nama'];
                                    var alamat          = response[0]['alamat'];
                                    //var telepon = response[0]['telepon'];
                                    var tamu            = response[0]['tamu'];
                                    var seat            = response[0]['seat'];
                                    var kategori        = response[0]['kategori'];
                                    var status_sovenir  = response[0]['status_sovenir'];
                                    var cekin           = response[0]['date_cekin'];
                                    var cekout          = response[0]['date_cekout'];
                                    document.getElementById('id').value = id;
                                    document.getElementById('nama').value = nama;
                                    document.getElementById('alamat').value = alamat;
                                    //document.getElementById('telepon').value = telepon;
                                    //document.getElementById('input-addon1').value = tamu;
                                    document.getElementById('seat').value = seat;
                                    document.getElementById('kategori').value = kategori;
                                    //document.getElementById('new-input-addon1').value = status_sovenir;
                                    document.getElementById('date_cekin').value = cekin;
                                    document.getElementById('date_cekout').value = cekout;
                                }     
                                    
                                        
                            }
                        });
                        return false;
                    }
                });

                document.getElementById("id").value = '0';
                document.getElementById("files").style.display = "inline";

            });

        });
    </script>

    <!-- <script>
        var goFS = document.getElementById("goFS ");
        goFS.addEventListener("click ", function() {
            document.documentElement.requestFullscreen();
        }, false);
    </script> -->

</body>

</html>