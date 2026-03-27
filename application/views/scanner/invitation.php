
<!doctype html>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dgsign.id</title>


    <link rel="icon" href="<?=base_url('public/scanner/')?>assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?=base_url('public/scanner/')?>assets/images/favicon.png" type="image/x-icon" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="<?=base_url('public/scanner/')?>assets/css/frontend/vendor.css">
    <link rel="stylesheet" href="<?=base_url('public/scanner/')?>assets/css/frontend/main.css">
    <link rel='stylesheet' href='<?=base_url('public/scanner/')?>assets/css/autotext/jquery-ui.min.css'>
</head>

<body>
    <canvas id="canvas"></canvas>
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
                                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                                <!-- <li class="active"><a href="invitation.php"><i class="fas fa-sign-in-alt"></i> Check In</a></li>
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
        <?php //require_once("../conn.php");
        ?>
        <?php
            //$ada = 'class="hiden"';
            // if (isset($_POST['simpansv'])){
            //     $id = $_POST['qrcode'];
            //     $id_event = $_SESSION['id_event'];
            //     $rQuery = mysqli_query($conn,"select * from tb_rsvp where id='$id' and id_event='$id_event'");
            //     // $result = $
            //     //echo $id;
            //     //echo '123123123213';

            //     $cek = mysqli_num_rows($rQuery);
            //     if($cek>0){
            //         $data = mysqli_fetch_array($rQuery);
            //        // $ada = '';
            //        //echo $id;
            //     }else{
            //         echo "<script>alert('Incorrect Data'); window.location.href='index.php'; </script>";
            //         }
                    
            // }else{
            //     if (isset($_POST['simpansv2'])){
            //         $id = $_POST['id'];
            //         $id_event = $_SESSION['id_event'];
            //         $rQuery = mysqli_query($conn,"select * from tb_rsvp where id='$id' and id_event='$id_event'");
            //         // $result = $
            //         //echo $id;
            //         //echo '123123123213';

            //         $cek = mysqli_num_rows($rQuery);
            //         if($cek>0){
            //             $data = mysqli_fetch_array($rQuery);
            //            // $ada = '';
            //            //echo $id;
            //         }else{
            //             echo "<script>alert('Incorrect Data'); window.location.href='index.php'; </script>";
            //             }

            //     }else{
            //         $rQuery = mysqli_query($conn,"select * from tb_rsvp where id='0'");
            //         $data = mysqli_fetch_array($rQuery);
            //         //echo "<script>alert('Incorrect Data');window.location.href='index.php'; </script>";
                
            //     }
            
            // }
        ?>

                <section class="fixed-content">
                    <section class="info">
                        <!--  <div class="container">
                    <h3>Resepsi Pernikahan</h3>
                    <h1>Dina Marina & Doniawan Setya</h1>
                    <h2>Hotel Ungaran Cantik</h2>
                    <h2>Ungaran, 24 November 2020 | 08.00 - 13.00 WIB</h2>
                </div> -->
                    </section>
                    <section class="invitation">
                        <div class="container">
                            <h3>Selamat Datang,</h3>
                            <h3>Bapak / Ibu / Saudara / i</h3>
                    <form class="example" action="<?=site_url('scanner/home/save_cekin')?>" id="formVerif" method="post" enctype="multipart/form-data">
                            <div class="form-group form-group-custom custom-1">
                            <!-- <input type='text' class='form-control form-control-custom name-custom id' id='id' name='id' value="<?php echo $id;?>" autocomplete="off" > -->
                            <input type='text' class='form-control form-control-custom name-custom id' id='ivts_Uuid' name='ivts_Uuid' value="<?=$dataAdmn->ivts_Uuid?>" autocomplete="off" >
                            <input type="text" class="form-control form-control-custom name-custom nama" id='ivts_Name' name='ivts_Name' value="<?=$dataAdmn->ivts_Name?>" autocomplete="off" required>
                                
                            </div>
                            <div class="form-group form-group-custom custom-2">
                                <input type="text" class="form-control form-control-custom alias-custom alamat" id='ivts_Address' name='ivts_Address' value="<?=$dataAdmn->ivts_Address?>" autocomplete="off">
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-8 col-sm-10 col-md-7">
                                    <div class="info">
                                        <div class="info-group">
                                            <label>Group</label>
                                            <div class="form-group form-group-custom">
                                            <input type="text" class="form-control form-control-custom note-custom kategori" id="ivts_Category" name="ivts_Category" value="<?=$dataAdmn->ivts_Category?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="info-group">
                                            <label>Meja</label>
                                            <div class="form-group form-group-custom">
                                            <input type="text" class="form-control form-control-custom note-custom seat" id="ivts_Seat" name="ivts_Seat" value="<?=$dataAdmn->ivts_Seat?>" autocomplete="off">
                                      
                                               </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                    </section>
                </section>

                <section class="invitation">
                    <div class="container">
                        <div class="detail">
                            <div class="row">
                            <div class="col-6">
                                    <label>Souvenir</label>
                                    <div class="input-group mb-3">                                   
                                        <div class="input-group-prepend">
                                            <button class="btn btn-custom" type="button" id="new-button-addon2" ><i class="fas fa-minus"></i></button>
                                       </div>
                                            <input type="number" class="form-control form-control-custom-group new-input-addon1" placeholder="" id="new-input-addon1" name="ivts_Souvenir" min="0" value="<?=$dataAdmn->ivts_Souvenir?>" autocomplete="off" >
                                       <div class="input-group-append">
                                            <button class="btn btn-custom" type="button" id="new-button-addon1" ><i class="fas fa-plus"></i></button>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Jumlah Tamu</label>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-custom" type="button" id="button-addon2"><i class="fas fa-minus"></i></button>
                                    </div>
                                        <input type="number" class="form-control form-control-custom-group input-addon1" placeholder="" id="input-addon1" name="ivts_Guest" min="0" value="<?=$dataAdmn->ivts_RsvpGuest?>" autocomplete="off">
                                    <div class="input-group-append">
                                        <button class="btn btn-custom" type="button" id="button-addon1"><i class="fas fa-plus"></i></button>
                                    </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <!-- <input id="file-input" name="file-input" accept="image/*" capture="camera" type="file" onchange="readURL(this);" /> -->
                        <input id="file-input" name="file-input" accept="image/*" capture="camera" type="file" onchange="readURL(this);" hidden/>
                        <input type="text" class="form-control form-control-custom note-custom cekin" id="date_cekin" name="date_cekin" hidden>
                        <input type="text" class="form-control form-control-custom note-custom cekout" id="date_cekout" name="date_cekout" hidden>


                        

                        <div class="gift">
                            <div class="container">
                             
                    </form>
                                <div class="btn-container">
                                    <button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="cekingift_noselfie" id="cekingift_noselfie"><i class="fas fa-pencil-alt"></i> <?=($button)?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- <section class="swipe-container">
            <span class="swipe-close"></span>
            <div class="swipe-trigger"></div>
            <div class="swipe-content">
                <section class="invitation">
                    <div class="container">
                        <div class="detail">
                            <div class="row">
                                <div class="col-6">
                                    <label>Jumlah Tamu</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-custom" type="button" id="button-addon2"><i class="fas fa-minus"></i></button>
                        </div>
                        <input type="text" class="form-control form-control-custom-group" placeholder="" id="input-addon1" value="0">
                        <div class="input-group-append">
                            <button class="btn btn-custom" type="button" id="button-addon1"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label>Souvenir</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-custom" type="button" id="new-button-addon2"><i class="fas fa-minus"></i></button>
                        </div>
                        <input type="text" class="form-control form-control-custom-group" placeholder="" id="new-input-addon1" value="0">
                        <div class="input-group-append">
                            <button class="btn btn-custom" type="button" id="new-button-addon1"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="gift">
                <div class="container">
                    <p>Apakah ingin memberikan hadiah pernikahan?</p>
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <input id="box1" type="checkbox" />
                            <label for="box1">Kado</label>
                        </div>
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <input id="box2" type="checkbox" />
                            <label for="box2">Angpau</label>
                        </div>
                    </div>
                    <div class="btn-container">
                        <button class="btn btn-sm btn-scan"><i class="fas fa-camera"></i> Submit & Take A Selfie</button>
                    </div>
                </div>
            </div>
            </div>
        </section> -->

                <!-- <footer>
                    <div class="container">
                        <a href=""><img src="assets/images/logo.png" class="logo" alt=""></a>
                    </div>
                </footer> -->
                </div>
                </section>
    </main>
    
    <script src="<?=base_url('public/scanner/')?>assets/js/frontend/vendor.js"></script>
    <script src="<?=base_url('public/scanner/')?>assets/js/frontend/plugins.js"></script>
    <script src="<?=base_url('public/scanner/')?>assets/js/frontend/main.js"></script> 
    <!-- <script src="assets/js/autotext/jquery-3.2.1.min.js"></script> -->
    <script src="<?=base_url('public/scanner/')?>assets/js/autotext/jquery-ui.min.js"></script>
    <script type="text/javascript ">
    $('button[id=files]').click(function() {
  $('input[type=file]').trigger('click');
});

        function readURL() {
            var x = document.getElementById("files");
            var y = document.getElementById("cekingift");
            var y1 = document.getElementById("loading");
            var z = document.getElementById("cekin");
            var z1 = document.getElementById("loading");
            //var cekinVal = $('#date_cekin').val(); 
            //var cekoutVal = $('#date_cekout').val(); 
            var imgVal = $('#file-input').val(); 
            

        if(imgVal=='') 
        { 
            alert("empty input file"); 

        } 
       else
         {
            x.style.display = "none";

            if (y == null){
                
            }else{
                y.click();
                y1.style.display = "inline";
            }
            
            if (z == null){
                
            }else{
                z.click();
                z1.style.display = "inline";
            }
         }
        }
        

    </script>
    
</body>

</html>