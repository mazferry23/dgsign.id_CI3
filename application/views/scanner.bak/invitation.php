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
    <link rel='stylesheet' href='assets/css/autotext/jquery-ui.min.css'>
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
        <?php require_once("../conn.php");
        ?>
        <?php
            //$ada = 'class="hiden"';
            if (isset($_POST['simpansv'])){
                $id = $_POST['qrcode'];
                $id_event = $_SESSION['id_event'];
                $rQuery = mysqli_query($conn,"select * from tb_rsvp where id='$id' and id_event='$id_event'");
                // $result = $
                //echo $id;
                //echo '123123123213';

                $cek = mysqli_num_rows($rQuery);
                if($cek>0){
                    $data = mysqli_fetch_array($rQuery);
                   // $ada = '';
                   //echo $id;
                }else{
                    echo "<script>alert('Incorrect Data'); window.location.href='index.php'; </script>";
                    }
                    
            }else{
                if (isset($_POST['simpansv2'])){
                    $id = $_POST['id'];
                    $id_event = $_SESSION['id_event'];
                    $rQuery = mysqli_query($conn,"select * from tb_rsvp where id='$id' and id_event='$id_event'");
                    // $result = $
                    //echo $id;
                    //echo '123123123213';

                    $cek = mysqli_num_rows($rQuery);
                    if($cek>0){
                        $data = mysqli_fetch_array($rQuery);
                       // $ada = '';
                       //echo $id;
                    }else{
                        echo "<script>alert('Incorrect Data'); window.location.href='index.php'; </script>";
                        }

                }else{
                    $rQuery = mysqli_query($conn,"select * from tb_rsvp where id='0'");
                    $data = mysqli_fetch_array($rQuery);
                    //echo "<script>alert('Incorrect Data');window.location.href='index.php'; </script>";
                
                }
            
            }
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
                    <?php 
                                $username = $_SESSION['username'];
                                $id_event = $_SESSION['id_event'];
                                $rQuerycekuser = mysqli_query($conn,"select * from tb_user where username='$username'");
                                $datacekuser = mysqli_fetch_array($rQuerycekuser);
                                //echo $id_event;
                                ?>
                    <section class="invitation">
                        <div class="container">
                            <h3>Selamat Datang,</h3>
                            <h3>Bapak / Ibu / Saudara / i</h3>
                    <form class="example" action="../function_app.php" id="formVerif" method="post" enctype="multipart/form-data">
                            <div class="form-group form-group-custom custom-1">
                            <!-- <input type='text' class='form-control form-control-custom name-custom id' id='id' name='id' value="<?php echo $id;?>" autocomplete="off" > -->
                            <input type='text' class='form-control form-control-custom name-custom id' id='id' name='id' value="<?php echo $data["id"];?>" autocomplete="off" hidden>
                            <input type="text" class="form-control form-control-custom name-custom nama" id='nama' name='nama' value="<?php echo $data["nama"];?>" autocomplete="off" required>
                                
                            </div>
                            <div class="form-group form-group-custom custom-2">
                                <input type="text" class="form-control form-control-custom alias-custom alamat" id='alamat' name='alamat' value="<?php echo $data["alamat"];?>" autocomplete="off">
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-8 col-sm-10 col-md-7">
                                    <div class="info">
                                        <div class="info-group">
                                            <label>Group</label>
                                            <div class="form-group form-group-custom">
                                            <?php
                                         if($datacekuser['ft_app_kategori']== 0){
                                               echo '<input type="text" class="form-control form-control-custom note-custom kategori" id="kategori" name="kategori" value="'.$data["kategori"].'" autocomplete="off">';
                                             }else{
                                                echo '<input type="text" class="form-control form-control-custom note-custom kategori" id="kategori" name="kategori" value="'.$data["kategori"].'" autocomplete="off">';
                                             }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="info-group">
                                            <label>Meja</label>
                                            <div class="form-group form-group-custom">
                                            <?php
                                         if($datacekuser['ft_app_seat']== 0){
                                               echo '<input type="text" class="form-control form-control-custom note-custom seat" id="seat" name="seat" value="'.$data["seat"].'" autocomplete="off">';
                                         }else{
                                            echo '<input type="text" class="form-control form-control-custom note-custom seat" id="seat" name="seat" value="'.$data["seat"].'" autocomplete="off">';
                                         }
                                         ?>
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
                                        
                                        <?php
                                        // if($datacekuser['ft_app_souvenir']== 0){ // 0 == sovenir disable 1== sovenir not disable
                                        //     echo '  <div class="input-group-prepend">
                                        //                 <button class="btn btn-custom" type="button" id="new-button-addon2" disabled><i class="fas fa-minus"></i></button>
                                        //             </div>
                                        //                 <input type="number" class="form-control form-control-custom-group new-input-addon1" placeholder="" id="new-input-addon1" name="souvenir" min="1" value="'.$data["status_sovenir"].'" autocomplete="off" disabled>
                                        //             <div class="input-group-append">
                                        //                 <button class="btn btn-custom" type="button" id="new-button-addon1" disabled><i class="fas fa-plus"></i></button>
                                        //             </div>';
                                        //         }else{
                                            // echo '  <div class="input-group-prepend">
                                            //             <button class="btn btn-custom" type="button" id="new-button-addon2" ><i class="fas fa-minus"></i></button>
                                            //         </div>
                                            //             <input type="number" class="form-control form-control-custom-group new-input-addon1" placeholder="" id="new-input-addon1" name="souvenir" min="0" value="'.$data["status_sovenir"].'" autocomplete="off" >
                                            //         <div class="input-group-append">
                                            //             <button class="btn btn-custom" type="button" id="new-button-addon1" ><i class="fas fa-plus"></i></button>
                                            //         </div>';
                                        //}
                                        ?>
                                        <div class="input-group-prepend">
                                            <button class="btn btn-custom" type="button" id="new-button-addon2" ><i class="fas fa-minus"></i></button>
                                       </div>
                                            <input type="number" class="form-control form-control-custom-group new-input-addon1" placeholder="" id="new-input-addon1" name="souvenir" min="0" value="<?php echo $data["souvenir"]?>" autocomplete="off" >
                                       <div class="input-group-append">
                                            <button class="btn btn-custom" type="button" id="new-button-addon1" ><i class="fas fa-plus"></i></button>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Jumlah Tamu</label>
                                    <div class="input-group mb-3">
                                    <?php
                                        // if($datacekuser['ft_app_guest']== 0){ // 0 == svenir disable 1== not disable
                                        //     echo '  <div class="input-group-prepend">
                                        //                 <button class="btn btn-custom" type="button" id="button-addon2" disabled><i class="fas fa-minus"></i></button>
                                        //             </div>
                                        //             <input type="number" class="form-control form-control-custom-group input-addon1" placeholder="" id="input-addon1" name="tamu" value="'.$data["tamu"].'" autocomplete="off" disabled>
                                        //             <div class="input-group-append">
                                        //                 <button class="btn btn-custom" type="button" id="button-addon1" disabled><i class="fas fa-plus"></i></button>
                                        //             </div>';
                                        // }else{
                                        // echo '  <div class="input-group-prepend">
                                        //             <button class="btn btn-custom" type="button" id="button-addon2"><i class="fas fa-minus"></i></button>
                                        //         </div>
                                        //         <input type="number" class="form-control form-control-custom-group input-addon1" placeholder="" id="input-addon1" name="tamu" min="0" value="'.$data["tamu"].'" autocomplete="off">
                                        //         <div class="input-group-append">
                                        //             <button class="btn btn-custom" type="button" id="button-addon1"><i class="fas fa-plus"></i></button>
                                        //         </div>';
                                       // }
                                    ?>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-custom" type="button" id="button-addon2"><i class="fas fa-minus"></i></button>
                                    </div>
                                        <input type="number" class="form-control form-control-custom-group input-addon1" placeholder="" id="input-addon1" name="tamu" min="0" value="<?php echo $data["tamu"]?>" autocomplete="off">
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
                                <!-- <p>Apakah ingin memberikan hadiah pernikahan?</p>
                        <div class="row">
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <input id="box1" type="checkbox" />
                                <label for="box1">Kado</label>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <input id="box2" type="checkbox" />
                                <label for="box2">Angpau</label>
                            </div>
                        </div> -->
                    </form>
                                <div class="btn-container">
                                <?php
                                if($datacekuser['ft_app_multiscan']== 0){ // 0 == single scan 1== multiscan

                                        if($datacekuser['ft_app_mode_souvenir']== 0){ // 0 == sovenir di awal 1== sovenir di akhir

                                            if($datacekuser['ft_app_selfie']== 0){ // 0 == no selfie 1== selfie

                                                if($data["date_cekin"]=='0000-00-00 00:00:00' ){ 
                                                    echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="cekingift_noselfie" id="cekingift_noselfie"><i class="fas fa-pencil-alt"></i> Submit</button>';
                                                }else{
                                                    if($data["date_cekin"]==null){
                                                        echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="cekingift_noselfie" id="cekingift_noselfie"><i class="fas fa-pencil-alt"></i> input Submit</button>';
                                                    }else{
                                                        echo "<script>alert('QRcode Tidak Berlaku'); window.location.href='index.php'; </script>";
                                                    //  echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="gift" id="gift"><i class="fas fa-gifts"></i> Take A Gift </button>';
                                                
                                                    }
                                                }
                                                
                                            }else{

                                                if($data["date_cekin"]=='0000-00-00 00:00:00'){ 
                                                    echo '<button class="btn btn-sm btn-scan" type="submit" id="files" name="files"><i class="fa fa-camera "></i> Take A Selfie</button>';
                                                    echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="cekingift" id="cekingift" style="display: none;"><i class="fas fa-cameraaa"></i> Submit </button>';
                                                    echo '<button class="btn btn-sm btn-scan" type="button" name="loading" id="loading" style="display: none;" disabled>
                                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                Uploading...
                                                            </button>';
                                                }else{
                                                    if($data["date_cekin"]==null){
                                                        echo '<button class="btn btn-sm btn-scan" type="submit" id="files" name="files"><i class="fa fa-camera "></i> input Take A Selfie</button>';
                                                        echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="cekingift" id="cekingift" style="display: none;"><i class="fas fa-cameraaa"></i> Submit </button>';
                                                        echo '<button class="btn btn-sm btn-scan" type="button" name="loading" id="loading" style="display: none;" disabled>
                                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                Uploading...
                                                            </button>';
                                                    }else{
                                                        echo "<script>alert('QRcode Tidak Berlaku'); window.location.href='index.php'; </script>";
                                                    //  echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="gift" id="gift"><i class="fas fa-gifts"></i> Take A Gift </button>';
                                                
                                                    }
                                                }                                       
                                            }
                                        }else{
                                            if($datacekuser['ft_app_selfie']== 0){ // 0 == no selfie 1== selfie

                                                if($data["date_cekin"]=='0000-00-00 00:00:00' ){ 
                                                    echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="cekin_noselfie" id="cekin_noselfie"><i class="fas fa-pencil-alt"></i> Submit</button>';
                                                    echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="gift" id="gift" style="display: none;"><i class="fas fa-gifts"></i> Take A Gift </button>';
                                                }else{
                                                    if($data["date_cekout"]=='0000-00-00 00:00:00' ){ 
                                                    echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="gift" id="gift"><i class="fas fa-gifts"></i> Take A Gift </button>';
                                                    }else{
                                                        if($data["date_cekin"]==null){ 
                                                            echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="cekin_noselfie" id="cekin_noselfie"><i class="fas fa-pencil-alt"></i> input Submit</button>';
                                                            echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="gift" id="gift" style="display: none;"><i class="fas fa-gifts"></i> Take A Gift </button>';
                                                        }else{
                                                            if($data["date_cekout"]==null){ 
                                                                echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="gift" id="gift"><i class="fas fa-gifts"></i> Take A Gift </button>';
                                                            }else{
                                                                echo "<script>alert('QRcode Tidak Berlaku'); window.location.href='index.php'; </script>";
                                                            }
                                                        }
                                                    }
                                                }
                                                
                                            }else{
                                                
                                                if($data["date_cekin"]=='0000-00-00 00:00:00'){ 
                                                    echo '<button class="btn btn-sm btn-scan" type="submit" id="files" name="files"><i class="fa fa-camera"></i> Take A Selfie</button>';
                                                    echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="cekin" id="cekin" style="display: none;"><i class="fas fa-cameraaa"></i> Submit </button>';
                                                    echo '<button class="btn btn-sm btn-scan" type="button" name="loading" id="loading" style="display: none;" disabled>
                                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                Uploading...
                                                            </button>';
                                                    echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="gift" id="gift" style="display: none;"><i class="fas fa-gifts"></i> Take A Gift </button>';
                                                }else{
                                                    if($data["date_cekout"]=='0000-00-00 00:00:00' ){ 
                                                        echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="gift" id="gift"><i class="fas fa-gifts"></i> Take A Gift </button>';
                                                    }else{
                                                        if($data["date_cekin"]==null ){ 
                                                            echo '<button class="btn btn-sm btn-scan" type="submit" id="files" name="files"><i class="fa fa-camera"></i> Take A Selfie</button>';
                                                            echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="cekin" id="cekin" style="display: none;"><i class="fas fa-cameraaa"></i> Submit </button>';
                                                            echo '<button class="btn btn-sm btn-scan" type="button" name="loading" id="loading" style="display: none;" disabled>
                                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                    Uploading...
                                                                    </button>';
                                                        }else{
                                                            if($data["date_cekout"]==null ){ 
                                                            
                                                                echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="gift" id="gift" style="display: none;"><i class="fas fa-gifts"></i> Take A Gift </button>';
                                                            }else{
                                                                echo "<script>alert('QRcode Tidak Berlaku'); window.location.href='index.php'; </script>";
                                                            }
                                                        }
                                                    }
                                                }                                       
                                            }
                                        }

                                }else{

                                    echo '<button class="btn btn-sm btn-scan" type="submit" form="formVerif" name="cekingift_noselfie_multi" id="cekingift_noselfie_multi"><i class="fas fa-pencil-alt"></i> input Submit</button>';

                                    }
                                ?>
                           
                                
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
    
    <script src="assets/js/frontend/vendor.js"></script>
    <script src="assets/js/frontend/plugins.js"></script>
    <script src="assets/js/frontend/main.js"></script> 
    <!-- <script src="assets/js/autotext/jquery-3.2.1.min.js"></script> -->
    <script src="assets/js/autotext/jquery-ui.min.js"></script>
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