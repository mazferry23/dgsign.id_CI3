<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DGSign - <?=$title?></title>

    <!--meta properties -->
    <meta name="description"content="Wedding Description" />
    <!--detailed robots meta https://developers.google.com/search/reference/robots_meta_tag -->
    <meta name="robots" content="index, follow, max-snippet: -1, max-image-preview:large, max-video-preview: -1" />
    <link rel="canonical" href="" />
    <!--open graph meta tags for social sites and search engines-->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="DGSIGN" />
    <meta property="og:description" content="DGSIGN - Digital Invitation <?=$client->client_Name?>" />
    <meta property="og:url" content="<?=current_url()?>" />
    <meta property="og:site_name" content="dgsign.id" />
    <meta property="og:image" content="assets/images/hero-bg.png" />
    <meta property="og:image:secure_url" content="assets/images/hero-bg.png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="660" />
    <!--twitter description-->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="." />
    <meta name="twitter:title" content="" />
    <meta name="twitter:site" content="@" />
    <meta name="twitter:image" content="assets/images/hero-bg.png" />
    <meta name="twitter:creator" content="@" />
    <!--opengraph tags for location or address for information panel in google-->
    <meta name="og:latitude" content="" />
    <meta name="og:longitude" content="" />
    <meta name="og:street-address" content="" />
    <meta name="og:locality" content="" />
    <meta name="og:region" content="" />
    <meta name="og:postal-code" content="" />
    <meta name="og:country-name" content="" />
    <!--search engine verification-->
    <meta name="google-site-verification" content="" />
    <meta name="yandex-verification" content="" />
    <!--powered by meta-->
    <meta name="generator" content="" />
    <base href="<?=base_url('public/dgsign2020/')?>"/>
    <!-- Site fevicon icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#cea241">
    <meta name="msapplication-TileImage" content="asests/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#cea241">

    <!--complete list of meta tags at - https://gist.github.com/lancejpollard/1978404 -->
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="assets/css/frontend/vendor.css">

    <link rel="stylesheet" href="assets/css/frontend/main.css">
    <style>
        <?php
        if(!empty($primarycolor) && $primarycolor!='#5c434d'){
            ?>
        section.intro .cage-section .content .content_inner h3{
            color:<?=$primarycolor?>
        }
        section.intro .cage-section .content .content_inner .cage-name h1{
            color:<?=$primarycolor?>
        }
        section.intro .cage-section .content .content_inner .cage-button .btn-open{
            color:<?=$primarycolor?>
        }
        section.bridegroom .content h1{
            color:<?=$primarycolor?>
        }
        section.bridegroom .content .card-custom .text-content p.pre-text{
            color:<?=$primarycolor?>
        }
        section.bridegroom .content .card-custom .text-content p{
            color:<?=$primarycolor?>
        }
        section.information .cage-section .content{
            color:<?=$primarycolor?>
        }
        section.information .cage-section:before{
            border: 2px solid <?=$primarycolor?>;
        }
        section.information .cage-section .content .content_inner .cage-btn .btn-location{
            background:<?=$primarycolor?>;
            opacity:0.8;
        }
        section.countdown .content .box-container .circle{
            background:<?=$primarycolor?>;
        }
        section.countdown .content .box-container .pointer{
            color:<?=$primarycolor?>
        }
        section.wishes .card .card-body .logo .img-icon{
            fill:#000
        }
        .form-check-inline label{
            color:<?=$primarycolor?> !important;

        }
        section.wishes .card .card-body .form-custom .form-control{
            border-color:<?=$primarycolor?>
        }
        .form-control::-webkit-input-placeholder{
            color:<?=$primarycolor?>
        }
        .form-control:-ms-input-placeholder{
            color:<?=$primarycolor?>
        }
        .form-control::placeholder{
            color:<?=$primarycolor?>
        }
        .form-control:focus{
            color:<?=$primarycolor?>
        }
        section.wishes .card .card-body .form-custom .btn-custom{
            background:<?=$primarycolor?>;
        }
        body{
            color:<?=$primarycolor?>
        }
            <?php
        }
        ?>
    </style>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        // (function (b, o, i, l, e, r) {
        //     b.GoogleAnalyticsObject = l;
        //     b[l] || (b[l] =
        //     function () {
        //         (b[l].q = b[l].q || []).push(arguments)
        //     });
        //     b[l].l = +new Date;
        //     e = o.createElement(i);
        //     r = o.getElementsByTagName(i)[0];
        //     e.src = 'https://www.google-analytics.com/analytics.js';
        //     r.parentNode.insertBefore(e, r)
        // }(window, document, 'script', 'ga'));
        // ga('create', 'UA-XXXXX-X');
        // ga('send', 'pageview');
    </script>
    <style>
        .cage-section .guestname{
            position:absolute;
            top:20px;
            left:0;
            margin-left:30px;
            color:white;
            font-size:16px;
        }
        .cage-section .qrcode{
            position:absolute;
            top:20px;
            right:0;
            margin:5px;
            margin-right:30px;
            z-index:3;
        }
        .cage-section .qrcode img{
            position:relative;
            max-width:50px;
            max-height:50px;
        }
        .main-function .cage-section .cage-name h1{
            text-shadow: 0px 2px 1px black;
        }
        .main-function .cage-section .cage-name h3{
            text-shadow: 0px 1px 1px black;
        }
      section.sound-toggle{
			position:fixed;
			top:0;
			right:0;
			width:50px;
			height:50px;
			content:"";
			margin-top:10px;
			border-radius:50%;
			background-color:#fff;
			padding:5px;
			margin-right:10px;
			z-index:100;
			background-size:cover;
			box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2), 0 6px 20px 0 rgba(255, 255, 255, 0.19);
		}
		section.sound-toggle:hover{
			background-color:#ddd;
			cursor: -webkit-grab; cursor: grab;
		}
    </style>
    <link rel="stylesheet" href="<?=base_url('public/lightbox2/')?>css/lightbox.min.css">
</head>
<body>
    <main>
        <?php
        if(!empty($audio)){
            ?>
        <audio autoplay>
            <source src="<?=base_url('public/uploads/'.$audio)?>"/>
        </audio>
        <section class="sound-toggle">
			<img src="<?=site_url('public/audio-on.png')?>" width="100%" height="100%"/>
		</section>
            <?php
        }
        ?>
        <!--section class="intro" style="background-image: url('assets/images/2674.jpg');"-->
        <section class="intro" style="background-image: url('<?=site_url('public/uploads/'.$cover)?>');">
            <div class="cage-section">
                <?php
                if(!empty($undangan) && isset($undangan->ivts_Name)){
                    ?>
                    <div class="guestname">
                        Kepada Yth.<br>
                        <?=$undangan->ivts_Name?><br>
                        di <?=$undangan->ivts_Address?>
                    </div>    
                    <div class="qrcode">
                        <a data-lightbox="example-1" data-title="<?=$undangan->ivts_Name?>" href="<?=site_url('home/createqrrsvp/'.$undangan->ivts_Uuid)?>"><img src="<?=site_url('home/createqrrsvp/'.$undangan->ivts_Uuid)?>"/></a>
                    </div>
                    <?php
                }
                ?>
                
                <div class="content">
                    <img src="assets/images/png/tribal.png" class="head" alt="">
                    <div class="content_inner">
                        <h3>We Are Going To Celebrate <span>Our Wedding</span></h3>
                        <!--div class="cage-name">
                            <h1 class="text-left"><?=$nicknamepria?></h1>
                            <h1 class="text-right"><?=$nicknamewanita?></h1>
                        </div-->
                        <div class="cage-name active">
                            <h1 class="text-left"><?=$nicknamepria?></h1>
                            <h1 class="text-right"><?=$nicknamewanita?></h1>
                            <!--iframe src="https://www.youtube.com/embed/cL4uhaQ58Rk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe-->
                        </div>
                        <!-- <div class="cage-video" xxx-data-toggle="modal" xxx-data-target="#modalVideo"> -->
                        <?php
                        if(!empty($video_url)){
                            ?>
                            <div class="cage-video" xxx-data-toggle="modal" xxx-data-target="#modalVideo">
                            <?php
                            $url_video = base_url("public/video-kosong.jpg");
                            if(substr($video_url,0,4)=="http"){
                                $url = $video_url;
                                $url_exploded = explode('?',$url);
                                
                                $query_str = isset($url_exploded[1]) ? explode('&',$url_exploded[1]) : null;
                                if($query_str!=null){
                                    foreach($query_str as $qs){
                                        if($qs[0]=='v'){
                                            $data_v = explode('=',$qs);
                                            $url_video = 'http://i3.ytimg.com/vi/'.$data_v[1].'/maxresdefault.jpg';
                                        }
                                    }
                                }
                            }
                            echo '<img src="'.$url_video.'" alt="">';
                            ?>
                            </div>
                            <?php
                        }
                            
                        ?>
                        <!-- </div> -->
                        <div class="cage-button">
                            <button class="btn-open">Open Invitation</button>
                        </div>
                    </div>
                    <?php
                    if(!empty($video_url)){
                        ?>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Switch Video</label>
                    </div>
                        <?php
                    }?>
                    
                </div>
            </div>
        </section>
        <div class="main-function" data-aos="flip-down" style="display:none">
        <!--section class="main-featured" style="background-image: url('assets/images/2674.jpg');"-->
        <section data-aos="flip-down" class="main-featured" style="background-image: url('<?=base_url('public/uploads/'.$cover)?>');">
            <div class="cage-section">
                <div class="content">
                    <h3>We Are Getting Married</h3>
                    <div class="cage-name">
                        <h1><?=$nicknamepria?></h1>
                        <h1><?=$nicknamewanita?></h1>
                    </div>
                    <!--h3>14<sup>th</sup> September, 2020</h3-->
                    <?php
                    $dateCountdown = null;
                    $acara__ = "";
                    if(!empty($tanggalacara)){
                        try{
                            $dateCountdown = DateTime::createFromFormat('Y-m-d H:i:s', $tanggalacara);
                            $nf = new NumberFormatter('en_US', NumberFormatter::ORDINAL);
                        
                            $df = $nf->format($dateCountdown->format("d"));
                            $df = str_replace($dateCountdown->format('d'),'',$df);
                            //echo $dateA->format('d').'<sup>'.$df.'</sup> '.$dateA->format('F').','.$dateA->format('Y');
                            $acara__ = $dateCountdown->format('d').'<sup>'.$df.'</sup> '.$dateCountdown->format('F').','.$dateCountdown->format('Y');
                        }catch(Exception $e){
                            
                        }
                        
                    }
                    ?>
                    <h3><?=$acara__?></h3>
                </div>
            </div>
        </section>
        <section class="quotes" data-aos="flip-down">
            <div class="container" data-aos="flip-down">
                <div class="content">
                    <!--h1>"And of His signs is that He created for you from yourselves mates that you may find tranquillity in them; <span>and He placed between you affection and mercy.</span> Indeed in that are signs for a people who give thought."</h1>
                    <h1 class="title">(Ar-Rum:21)</h1-->
                    <?=nl2br($pembukaan)?>
                </div>
            </div>
        </section>
        <?php
        if(!empty($textlovestory1) && !empty($lovestory1) ){
        ?>
        <section data-aos="flip-down" class="image-featured" style="background-image: url('<?=base_url('public/uploads/'.$lovestory1)?>');">
        </section>
        <section class="quotes-2">
            <div class="container" data-aos="flip-down">
                <div class="content">
                    <!--h1>"You're not me. I'm not you. That is why we are united, <span>are complementary and mutually reinforcing."</span></h1-->
                    <?=$textlovestory1?>
                </div>
            </div>
        </section>
        <?php
        }
        if(!empty($textlovestory2) && !empty($lovestory2) ){
            ?>
            <section data-aos="flip-down" class="image-featured" style="background-image: url('<?=base_url('public/uploads/'.$lovestory2)?>');">
            </section>
            <section class="quotes-2">
                <div class="container" data-aos="flip-down">
                    <div class="content">
                        <!--h1>"You're not me. I'm not you. That is why we are united, <span>are complementary and mutually reinforcing."</span></h1-->
                        <?=$textlovestory2?>
                    </div>
                </div>
            </section>
            <?php
        }
        if(!empty($textlovestory3) && !empty($lovestory3) ){
            ?>
            <section  data-aos="flip-down" class="image-featured" style="background-image: url('<?=base_url('public/uploads/'.$lovestory3)?>');">
            </section>
            <section class="quotes-2">
                <div class="container" data-aos="flip-down">
                    <div class="content">
                        <!--h1>"You're not me. I'm not you. That is why we are united, <span>are complementary and mutually reinforcing."</span></h1-->
                        <?=$textlovestory3?>
                    </div>
                </div>
            </section>
            <?php
        }
        if(!empty($textlovestory4) && !empty($lovestory4) ){
            ?>
            <section data-aos="flip-down" class="image-featured" style="background-image: url('<?=base_url('public/uploads/'.$lovestory4)?>');">
            </section>
            <section class="quotes-2">
                <div class="container" data-aos="flip-down">
                    <div class="content">
                        <!--h1>"You're not me. I'm not you. That is why we are united, <span>are complementary and mutually reinforcing."</span></h1-->
                        <?=$textlovestory4?>
                    </div>
                </div>
            </section>
            <?php
        }
        ?>
        <!--section class="image-collage">
            <div class="right" style="background-image: url('assets/images/2675.jpg');"></div>
            <div class="left" style="background-image: url('assets/images/2675.jpg');"></div>
            <div class="center" style="background-image: url('assets/images/2674.jpg');"></div>
            <div class="bottom-right" style="background-image: url('assets/images/2676.jpg');"></div>
            <div class="top-left" style="background-image: url('assets/images/2676.jpg');"></div>
        </section-->
        <section class="bridegroom" data-aos="fade-up">
            <div class="container">
                <div class="content">
                    <h1><?=$eventcaption?></h1>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="card-custom">
                                <div class="frame-portrait" style="background-image: url('<?=base_url('public/uploads/'.$fotowanita)?>');">
                                    <img src="assets/images/png/bingkai_bener.png" alt="">
                                </div>
                                <div class="text-content">
                                    <p class="pre-text">The Bride</p>
                                    <h1><?=$bride?></h1>
                                    <!-- <p>The Daughter of</p> -->
                                    <p><?=nl2br($brideparent)?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card-custom">
                                <div class="frame-portrait" style="background-image: url('<?=base_url('public/uploads/'.$fotopria)?>');">
                                    <img src="assets/images/png/bingkai_bener.png" alt="">
                                </div>
                                <div class="text-content">
                                    <p class="pre-text">The Groom</p>
                                    <h1><?=$groom?></h1>
                                    <!-- <p>The Son of</p> -->
                                    <p><?=nl2br($groomparent)?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section data-aos="flip-down" class="information" style="background-image: url('<?=base_url('public/uploads/'.$backgroundacara)?>');">
            <div class="cage-section">
                <div class="content">
                    <div class="content_inner">
                        <img src="assets/images/png/cincin.png" class="img-icon" alt="">
                        <?php
                        $dateA = null;
                        $acara__1 = "";
                        $data_acara1 = [];
                        if(!empty($acara1)){
                            $data_acara1 = json_decode($acara1,1);
                            $dateA = DateTime::createFromFormat('Y-m-d H:i:s', $data_acara1['tanggal']);
                            $nf = new NumberFormatter('en_US', NumberFormatter::ORDINAL);
                            $df = $nf->format($dateA->format("d"));
                            $df = str_replace($dateA->format('d'),'',$df);
                            //echo $dateA->format('d').'<sup>'.$df.'</sup> '.$dateA->format('F').','.$dateA->format('Y');
                            $acara__1 = $dateA->format('d').'<sup>'.$df.'</sup> '.$dateA->format('F').','.$dateA->format('Y');
                        }
                        ?>
                        <h1 class="title"><?=@$data_acara1['judul']?></h1>
                        
                        <p><?=$dateA!=null ? $dateA->format('l') : ''?></p>
                        <p><?=@$acara__1?></p>
                        <p><?=@$data_acara1['periode']?></p>
                        <h1 class="place"><?=@$data_acara1['tempat']?></h1>
                        <?php 
                        if(isset($data_acara1['link']) && !empty($data_acara1['link'])){
                        ?>
                        <div class="cage-btn">
                            <a href="<?=@$data_acara1['link']?>" target="_blank" class="btn-location">View Location</a>
                        </div>
                        <?php }?>
                    </div>
                    <div class="content_inner">
                        <?php
                        $dateA = null;
                        $acara__2 = "";
                        $data_acara2 = [];
                        if(!empty($acara2)){
                            try{
                                $data_acara2 = json_decode($acara2,1);
                                $dateA = DateTime::createFromFormat('Y-m-d H:i:s', $data_acara2['tanggal']);
                                $nf = new NumberFormatter('en_US', NumberFormatter::ORDINAL);
                                $df = $nf->format($dateA->format("d"));
                                $df = str_replace($dateA->format('d'),'',$df);
                                //echo $dateA->format('d').'<sup>'.$df.'</sup> '.$dateA->format('F').','.$dateA->format('Y');
                                $acara__2 = $dateA->format('d').'<sup>'.$df.'</sup> '.$dateA->format('F').','.$dateA->format('Y');
                            }catch(Exception $e){
                                
                            }
                            ?>
                        <img src="assets/images/png/weddingarch.png" class="img-icon" alt="">
                        <h1 class="title"><?=@$data_acara2['judul']?></h1>
                        <p><?=@$dateA!=null ? $dateA->format('l'):''?></p>
                        <p><?=@$acara__2?></p>
                        <p><?=@$data_acara2['periode']?></p>
                        <h1 class="place"><?=@$data_acara2['tempat']?></h1>
                        <div class="cage-btn">
                            <a href="<?=@$data_acara1['link']?>" target="_blank" class="btn-location">View Location</a>
                        </div>
                            <?php
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </section>
        
        <section data-aos="flip-down" class="countdown" <?=intval($hidecountdown==1) ? 'style="display:none"' : ''?>>
            <div class="container">
                <div class="content">
                    <h1>Countdown to The Wedding</h1>
                    <div class="box-container">
                        <div class="circle">
                            <h1 id="wd-day">10</h1>
                            <h3>Days</h3>
                        </div>
                        <div class="pointer">:</div>
                        <div class="circle">
                            <h1 id="wd-hours">19</h1>
                            <h3>Hours</h3>
                        </div>
                        <div class="pointer">:</div>
                        <div class="circle">
                            <h1 id="wd-min">56</h1>
                            <h3>Min</h3>
                        </div>
                        <div class="pointer">:</div>
                        <div class="circle">
                            <h1 id="wd-sec">22</h1>
                            <h3>Sec</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $time_1 = strtotime($tanggalacara);
        $now = time();
        $style = intval($hidewishes)==1 ? 'style="display:none"' : '';
        if($now > $time_1){
            $style = 'style="display:none"';
        }
        ?>
        <section data-aos="flip-down" class="wishes" <?=$style?>>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="logo">
                            <img src="assets/images/png/bridegroom.png" class="img-icon" alt=""> 
                        </div>
                        <form method="post" action="<?=site_url('home/submit-whises/'.$client->client_Id.'/'.url_title($client->client_Name,'-'))?>" class="form-custom">
                            <div class="form-row">
                                <?php
                                if(isset($undangan->ivts_Name)){
                                    ?>
                                <input type="hidden" value="<?=$undangan->ivts_Id?>" name="ivtsId"/>
                                <!-- <div class="col-sm-12 mb-3">
                                    <input type="text" value="<?=$undangan->ivts_Address?>" name="ivtsAddress" class="form-control" placeholder="Address">
                                </div> -->
                                <div class="col-sm-12 mb-3">
                                    <select class="form-control" name="isPresent">
                                        <option value="1">Hadir</option>
                                        <option value="0">Tidak Hadir</option>
                                    </select>
                                    <!--div class="form-check form-check-inline" style="float:left;">
                                        <input style="zoom:2" name="isPresent" class="form-check-input" type="checkbox" id="inlineCheckbox1">
                                        <label style="font-weight:700;color:#6c757d" class="form-check-label" for="inlineCheckbox1">Present</label>
                                    </div-->
                                </div>
                                <div class="col-sm-12 mb-3" id="nphone">
                                    <input type="number" value="<?=$undangan->ivts_NoHp?>" name="phoneNo" id="phoneNo" class="form-control" placeholder="No. Whatsapp" required>
                                </div>
                                <div class="col-sm-12 mb-3" id="numberPersonHolder">
                                    <?php
                                    if(isset($hideguest) && $hideguest==1){
                                        if(isset($maxguest) && $maxguest>0 || $maxguestby==1){
                                            if($maxguestby==1){
                                                echo "<h6 style='text-align:left;'>Karena adanya pembatasan tamu undangan dalam situasi pandemi, 1 undangan berlaku untuk $undangan->ivts_Guest orang.</h6>";
                                                echo "<input type='hidden' name='numberPerson' id='numberPerson' value='$undangan->ivts_Guest' class='form-control' placeholder='Jumlah Orang'>";
                                            }else{
                                                echo "<h6 style='text-align:left;'>Karena adanya pembatasan tamu undangan dalam situasi pandemi, 1 undangan berlaku untuk $maxguest orang.</h6>";
                                                echo "<input type='hidden' name='numberPerson' id='numberPerson' value='$maxguest' class='form-control' placeholder='Jumlah Orang'>";
                                            }
                                        }else{
                                        ?>
                                        <input type="hidden" name="numberPerson" id="numberPerson" value="0" class="form-control" placeholder="Jumlah Orang" required>
                                        <?php
                                        }
                                    }else{
                                        if(isset($maxguest) && $maxguest>0 || $maxguestby==1){
                                            if($maxguestby==1){
                                            ?>
                                                <select name="numberPerson" class="form-control">
                                                    <?php
                                                    for($i=1;$i<=$undangan->ivts_Guest;$i++){
                                                        echo '<option value="'.$i.'">'.$i.' Orang</option>';
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                            }else{
                                            ?>

                                                <select name="numberPerson" class="form-control">
                                                    <?php
                                                    for($i=1;$i<=$maxguest;$i++){
                                                        echo '<option value="'.$i.'">'.$i.' Orang</option>';
                                                    }
                                                    ?>
                                                </select>
                                        <?php
                                            }
                                        }else{
                                            echo '<input type="number" name="numberPerson" id="numberPerson" class="form-control" placeholder="Number of Person" required>    ';
                                        }
                                    }
                                    ?>
                                    
                                </div>
                                    <?php
                                }else{
                                    ?>
                                <div class="col-sm-12 mb-3">
                                    <input type="text" name="fullname" class="form-control" placeholder="Nama Lengkap" required>    
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <input type="text" name="ivtsAddress" class="form-control" placeholder="Alamat" required>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <select class="form-control" name="isPresent">
                                        <option value="1">Hadir</option>
                                        <option value="0">Tidak Hadir</option>
                                    </select>
                                    <!--div class="form-check form-check-inline" style="float:left;">
                                        <input style="zoom:2" name="isPresent" class="form-check-input" type="checkbox" id="inlineCheckbox1">
                                        <label style="font-weight:700;color:#6c757d" class="form-check-label" for="inlineCheckbox1">Present</label>
                                    </div-->
                                </div>
                                <div class="col-sm-12 mb-3" id="nphone">
                                    <input type="number" name="phoneNo" id="phoneNo" class="form-control" placeholder="No. Whatsapp" required>
                                </div>
                                <div class="col-sm-12 mb-3" id="numberPersonHolder">
                                    <!--input type="number" name="numberPerson" class="form-control" placeholder="Number of Person"-->    
                                    <?php
                                    if(isset($hideguest) && $hideguest==1){
                                        if(isset($maxguest) && $maxguest>0){
                                            echo "<h6 style='text-align:left;'>Karena adanya pembatasan tamu undangan dalam situasi pandemi, 1 undangan berlaku untuk $maxguest orang.</h6>";
                                            echo "<input type='hidden' name='numberPerson' id='numberPerson' value='$maxguest' class='form-control' placeholder='Jumlah Orang'>";
                                        }else{
                                        ?>
                                        <input type="hidden" name="numberPerson" id="numberPerson" value="0" class="form-control" placeholder="Jumlah Orang">
                                        <?php
                                        }
                                    }else{
                                        if(isset($maxguest) && $maxguest>0){
                                            ?>
                                        <select name="numberPerson" class="form-control">
                                            <?php
                                            for($i=1;$i<=$maxguest;$i++){
                                                echo '<option value="'.$i.'">'.$i.' Orang</option>';
                                            }
                                            ?>
                                        </select>
                                            <?php
                                        }else{
                                            echo '<input type="number" name="numberPerson" id="numberPerson" class="form-control" placeholder="Jumlah Orang" required>    ';
                                        }
                                    }
                                    ?>
                                </div>
                                    <?php
                                }
                                ?>
                                
                            </div>
                            <div class="form-group">
                                
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Message" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-custom"><i class="fas fa-paper-plane"></i> Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if(isset($prokes) && !empty($prokes)){
        ?>
        <section class="protocol" <?=intval($hidecovid==1) ? 'style="display:none"' : ''?>>
            <div class="container">
                <div class="card">
                    <!--div class="card-body">
                        <h1>Pemberitahuan</h1>
                        <h3>Tanpa mengurangi rasa hormat, acara ini hanya akan dihadiri keluarga besar kedua mempelai serta bebrapa tamu undangan dan akan dilaksanakan dengan menerapkan protokol kesehatan sebagai berikut:</h3>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="cage-protocol">
                                    <img src="assets/images/giliran.png" alt="">
                                    <h2>Tamu masuk ke lokasi acara secara bergilir</h2>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="cage-protocol">
                                    <img src="assets/images/masker.png" alt="">
                                    <h2>Wajib menggunakan masker</h2>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="cage-protocol">
                                    <img src="assets/images/pindai.png" alt="">
                                    <h2>Tamu akan dipindai dengan thermo/thermal gun</h2>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="cage-protocol">
                                    <img src="assets/images/cutang.png" alt="">
                                    <h2>Cuci tangan / menggunakan hand sanitizer setelah dan sebelum dari lokasi acara</h2>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="cage-protocol">
                                    <img src="assets/images/physical-distance.png" alt="">
                                    <h2>Antar tamu jaga jarak untuk mencegah penyebaran</h2>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="cage-protocol">
                                    <img src="assets/images/handshake.png" alt="">
                                    <h2>Tidak bersalaman</h2>
                                </div>
                            </div>
                        </div>
                    </div-->
                    <div class="card-body">
                        <h1><?=isset($prokes['prokes_Title']) && !empty($prokes['prokes_Title']) ? $prokes['prokes_Title'] : 'PEMBERITAHUAN' ?></h1>
                        <h3><?=isset($prokes['prokes_Subtitle']) && !empty($prokes['prokes_Subtitle']) ? $prokes['prokes_Subtitle'] : 'Tanpa mengurangi rasa hormat, acara ini hanya akan dihadiri keluarga besar kedua mempelai serta bebrapa tamu undangan dan akan dilaksanakan dengan menerapkan protokol kesehatan sebagai berikut:'?></h3>
                        <div class="row">
                            <?php
                            if(isset($prokes_detail) && !empty($prokes_detail)){
                                foreach($prokes_detail as $row){
                                    if(is_file(FCPATH.'public'.DIRECTORY_SEPARATOR.'prokes'.DIRECTORY_SEPARATOR.$row->prodet_Image)){
                                        $url_image = base_url('public/prokes/'.$row->prodet_Image);
                                    }else{
                                        $url_image = base_url('public/video-kosong.jpg');
                                    }
                                    
                                ?>
                            <div class="col-sm-4">
                                <div class="cage-protocol">
                                    <img src="<?=$url_image?>" alt="">
                                    <h2><?=$row->prodet_Description?></h2>
                                </div>
                            </div>
                                <?php
                                }
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        }
        ?>
        <footer>
            <div class="copyright"><img src="<?=base_url('public/logo.png')?>" alt=""></div>
        </footer>

        </div>
        <div class="modal fade" id="modalVideo" tabindex="-1" aria-hidden="true">
            <button type="button" class="btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php
                        if(!empty($video_url)){
                            if(substr($video_url,0,4)=="http"){
                                $url = $video_url;
                                $url_exploded = explode('?',$url);
                                $url_video = "";
                                $query_str = isset($url_exploded[1]) ? explode('&',$url_exploded[1]) : null;
                                if($query_str!=null){
                                    foreach($query_str as $qs){
                                        if($qs[0]=='v'){
                                            $data_v = explode('=',$qs);
                                            $url_video = 'https://www.youtube.com/embed/'.$data_v[1];
                                            echo '<iframe class="embed-responsive-item" src="'.$url_video.'"></iframe>';
                                        }
                                    }
                                }
                            }else{
                                $url = base_url('public/uploads/'.$video_url);
                                $embed = false;
                                //echo '<iframe class="embed-responsive-item" src="'.$url.'"></iframe>';
                                ?>
                                <video controls="true" class="embed-responsive-item">
                                    <source src="<?=$url?>" type="video/mp4" />
                                </video>
                                <?php
                            }
                        }
                        
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="assets/js/frontend/vendor.js"></script>
    <script src="assets/js/frontend/plugins.js"></script>
    <script src="<?=base_url('public/lightbox2/')?>js/lightbox.min.js"></script>
    <script src="assets/js/frontend/main.js"></script>
    <script>
    // Set the date we're counting down to
    var countDownDate = new Date("<?=$dateCountdown->format('M j, Y H:i:s')?>").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    //document.getElementById("demo").innerHTML = days + "d " + hours + "h "+ minutes + "m " + seconds + "s ";
    $('#wd-day').html(days);
    $('#wd-hours').html(hours);
    $('#wd-min').html(minutes);
    $('#wd-sec').html(seconds);
    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        //document.getElementById("demo").innerHTML = "EXPIRED";
        $('#wd-day').html('0');
        $('#wd-hours').html('0');
        $('#wd-min').html('0');
        $('#wd-sec').html('0');
    }
    }, 1000);
    $('select[name="isPresent"]').on('change',function(e){
        
        var ispre = $(this).val();
        //console.log(ispre);
        if(ispre=='0'){
            $('#numberPersonHolder').hide();
            $('#nphone').hide();
            $('#phoneNo').removeAttr('required');
            $('#numberPerson').removeAttr('required');
        }else{
            $('#numberPersonHolder').show();
            $('#nphone').show();
            $('#phoneNo').prop('required',true);
            $('#numberPerson').prop('required',true);
        }
        
    });
    $('.sound-toggle').click(function(){
		var elem = $(this);
		if(elem.hasClass('off')){
			elem.removeClass('off');
			typeof $('audio')[0] !=='undefined' ? $('audio')[0].play() : '';
			$('img',this).attr('src','<?=site_url('public/audio-on.png')?>');
		}else{
			elem.addClass('off');
			$('img',this).attr('src','<?=site_url('public/audio-off.png')?>');
			typeof $('audio')[0] !=='undefined' ? $('audio')[0].pause() : '';
		}
	})
    </script>
</body>
</html>
