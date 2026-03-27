<!doctype html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <base href="<?=base_url('public/wi_template/adiwangsa/')?>"/>
  
  <style>
    @font-face {
        font-family: futura-md;
        src: url(Futura/futura\ medium\ bt.ttf);
    }
    @font-face {
        font-family: futura-condensed-md;
        src: url(Futura/futura\ medium\ condensed\ bt.ttf);
    }
    @font-face {
        font-family: futura-bold;
        src: url(Futura/Futura\ Bold\ font.ttf);
    }
    @font-face {
        font-family: futura-extra-bold;
        src: url(Futura/Futura\ Extra\ Black\ font.ttf);
    }
    @font-face {
        font-family: DancingScript;
        src: url(Dancing_Script/DancingScript-VariableFont_wght.ttf);
    }
    @font-face {
        font-family: DINBlackAlternate;
        src: url(din/DINBlackAlternate.ttf);
    }
    @font-face {
        font-family: SEGOEUI;
        src: url(Segoe-UI-Font/SEGOEUI.TTF);
    }
    @font-face {
        font-family: Bestermind;
        src: url(BestermindRegular.ttf);
    }

    .futura-md {
        font-family: futura-md;
    }
    .futura-condensed-md {
        font-family: futura-condensed-md;
    }
    .futura-bold {
        font-family: futura-bold;
    }
    .futura-extra-bold {
        font-family: futura-extra-bold;
    }
    .DancingScript {
        font-family: DancingScript;
    }
    .DINBlackAlternate {
        font-family: DINBlackAlternate;
    }
    .SEGOEUI {
        font-family: SEGOEUI;
    }
    .Bestermind {
        font-family: Bestermind;
    }

    body, html {
        overflow-x: hidden;
    }
    body {
        /* max-width: 800px; */
        margin: auto;
        background-color: #FCF8F0;
        position: relative;
    }
    .cl-cream {
        background-color: #FCF8F0;
    }
    .cl-dark-cream {
        color: #7B4F06;
    }
    .ovale {
        position: relative;
        background-image: linear-gradient(#FCF8F0, #FCF8F0);
        border-top-left-radius: 50% 10%;
        border-top-right-radius: 50% 10%;
        border-bottom-left-radius: 50% 10%;
        border-bottom-right-radius: 50% 10%;
    }
    .ovale--long {
        position: relative;
        background-image: linear-gradient(#FCF8F0, #FCF8F0);
        border-top-left-radius: 50% 5%;
        border-top-right-radius: 50% 5%;
        border-bottom-left-radius: 50% 5%;
        border-bottom-right-radius: 50% 5%;
    }
    .ovale--md {
        width: 800px;
        height: 470px;
        background: #FCF8F0;
        border-radius: 400px / 200px;
        position: absolute;
        top: 0px;
        left: 50%;
        /* z-index: -1; */
        transform: translate(-50%, 0);
    }
    .ovale--xl {
        width: 800px;
        height: 550px;
        background: #FCF8F0;
        border-radius: 400px / 200px;
        position: absolute;
        top: 0px;
        left: 50%;
        /* z-index: -1; */
        transform: translate(-50%, 0);
    }
    .ovale--big {
        width: 800px;
        height: 750px;
        background: #FCF8F0;
        border-radius: 400px / 200px;
        position: absolute;
        top: 0px;
        left: 50%;
        /* z-index: -1; */
        transform: translate(-50%, 0);
    }
    .ovale--2big {
        width: 800px;
        height: 1030px;
        background: #FCF8F0;
        border-radius: 400px / 200px;
        position: absolute;
        top: 0px;
        left: 50%;
        /* z-index: -1; */
        transform: translate(-50%, 0);
    }
    .ovale--3big {
        width: 800px;
        height: 1180px;
        background: #FCF8F0;
        border-radius: 400px / 200px;
        position: absolute;
        top: 0px;
        left: 50%;
        /* z-index: -1; */
        transform: translate(-50%, 0);
    }
    .iframe--cont {
        position: relative;
        width: 100%;
        overflow: hidden;
        padding-top: 56.25%; /* 16:9 Aspect Ratio */
    }

    .responsive-iframe {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
    .black-50 {
        background-color:rgba(0, 0, 0, .3);
    }
    .clip-ellipse {
        clip-path: ellipse(428px 200px at center);
    }
    .halfcirc-img {
        width: 428px;
        height: 428px;
    }
    @media (min-width: 768px) {
        .halfcirc-img {
            width: 100%;
        }
        .ovale--md, .ovale--xl, .ovale--big, .ovale--2big, .ovale--3big {
            width: 1000px;
        }
    }
    @media (min-width: 1024px) {
        .ovale--big {
            width: 1600px;
            height: 500px;
        }
        .clip-ellipse {
            clip-path: ellipse(100% 200px at center);
        }
        .responsive-iframe {
            width: 80%;
            height: 80%;
            left: 50%;
            transform: translate(-50%, 0);
        }
    }
    .animateUpDown {
        animation: MoveUpDown 1.2s ease-in infinite;
        position: absolute;
        left: 25%;
        transform: translate(-50%, 0);
    }

    #jsTimer {
        display: flex;
    }
    #jsTimer > div {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 0 10px;
    }
    #jsTimer span {
        font-family: futura-condensed-md;
        font-weight: 400;
        font-size: 14px;
    }
    .rect {
        position:relative;
    }
    .circle--half {
        display:block;
        width: 100px;
        height: 50px;
        top:-50px;
        left:0;
        overflow:hidden;
        position:absolute;
    }
    .circle--half:after {
        content:'';
        width: 100px;
        height: 100px;
        -moz-border-radius: 100px;
        -webkit-border-radius: 100px;
        border-radius: 100px;
        background:rgba(0,0,0,0);
        position:absolute;
        top:-100px;
        left:-40px;
        border:40px solid rgba(0,0,0,0.5);
    }

    .mySlides, .mySlides2 {display: none}
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
        /* z-index: -2; */
    }

    /* Next & previous buttons */
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* The dots/bullets/indicators */
    .dot, .dot2 {
        cursor: pointer;
        height: 12px;
        width: 12px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active, .dot:hover, .dot2:hover {
        background-color: #717171;
    }

    .js-scroll {
        opacity: 0;
        transition: opacity 500ms;
    }

    .js-scroll.scrolled {
        opacity: 1;
    }

    .scrolled.fade-in-bottom {
        animation: fade-in-bottom 1s ease-in-out both;
    }

    #hadirModal, #tidakModal, #barcodeModal, #tidakhadirModal {
        position: fixed;
        top: 0;
        left: 50%;
        transform: translate(-50%, 0);
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    .animateUp {
        height: 0;
    }

    @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
    }
    @keyframes MoveUpDown {
        0%, 100% {
            bottom: 0;
        }
        50% {
            bottom: 10px;
        }
    }
    @keyframes fade-in-bottom {
        0% {
            -webkit-transform: translateY(50px);
            transform: translateY(50px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
            opacity: 1;
        }
    }
  </style>
</head>
<body>
    <!-- <div class="bg-white h-screen w-full fixed top-0" style="z-index: -3;"></div> -->
    <!-- landing page -->
    <div class="landing-page h-screen pt-20 lg:pt-40 flex items-center flex-col relative" style="transition: all 0.4s ease-in-out;">
        <img src="MaskGroup2.png" class="absolute md:w-full md:h-screen lg:hidden top-0 object-cover" style="filter:brightness(80%);z-index:-1;" alt="">
        <img src="MaskGroup2@169.jpg" class="absolute h-screen md:w-full hidden lg:block md:hidden top-0 object-cover" style="filter:brightness(80%);z-index:-1;" alt="">
        <div class="text-center tracking-widest" style="color: #fafafa;">
            
                <h5 class="text-base lg:text-xl SEGOEUI"><?=$jdlamplop?></h5>
                <!-- <h5 class="text-base lg:text-xl SEGOEUI">The Wedding of</h5> -->
                <h3 class="mt-10 text-5xl lg:text-6xl Bestermind"><?=$namamp1?> & <?=$namamp2?></h3>
            
        </div>
        <div class="mt-12 text-center tracking-widest">
            <h5 class="text-base lg:text-xl futura-md" style="color:#fafafa"><?=$tglacramplop?></h5>
            <!-- <h5 class="text-base lg:text-xl futura-md" style="color:#fafafa">19.00 - 21.00 WIB</h5>
            <h5 class="text-base lg:text-xl futura-md" style="color:#fafafa">Hotel Pesona - Semarang</h5> -->
        </div>
        <div class="mt-12 text-center" style="z-index:2;">
            <?php
                if(isset($undangan->ivts_Name)){
            ?>
            <h5 class="text-base lg:text-xl SEGOEUI" style="color:#fafafa"><?=$kalimatsapaan?></h5>
            <h5 class="mt-4 text-base lg:text-xl SEGOEUI" style="color:#fafafa"><?=$undangan->ivts_Name?><br>
                        <?=$undangan->ivts_Address?></h5>

            <?php
                }
            ?>
        </div>
        <div id="openBtn" class="rounded-full py-2 px-8 mt-16 w-max shadow-lg text-center cursor-pointer fixed bottom-12" style="color:#6A4509; background-color: #F9F3E7" onclick="openInv()">
            Open Invitation
        </div>
    </div>
    <!-- landing page -->
    <div class="mainContent content bg-white" style="display: none;">
        <div class="fixed md:top-10 md:right-10 top-6 right-4" style="z-index: 999;">
            <img src="iconmonstr-media-control-48.svg" id="playMusic" class="cursor-pointer rounded-full shadow cl-cream w-10 h-10 p-2" style="display: none;" onclick="playMsc()" alt="iconmonstr-media-control-48">
            <img src="iconmonstr-media-control-49.svg" id="pauseMusic" class="cursor-pointer rounded-full shadow cl-cream w-10 h-10 p-2" onclick="pauseMsc()" alt="iconmonstr-media-control-49">
        </div>
        <div class="h-screen pt-44 lg:pt-72 flex items-center flex-col relative" style="z-index: 2;">
            <img src="MaskGroup2.png" class="absolute md:w-full md:h-screen lg:hidden top-0 object-cover" style="filter:brightness(80%);z-index:-1;" alt="">
            <img src="MaskGroup2@169.jpg" class="absolute h-screen md:w-full hidden lg:block md:hidden top-0 object-cover" style="filter:brightness(80%);z-index:-1;" alt="">
            <div class="text-center" style="color: #fafafa;z-index:2;">
                <h5 class="text-lg lg:text-xl futura-md"><?=$jdlcover?></h5>
                <h3 class="text-5xl lg:text-6xl pt-12 lg:pt-8 Bestermind"><?=$namamp1?> & <?=$namamp2?></h3>
            </div>
            <div class="w-12 absolute bottom-12">
                <img src="iconmonstr-arrow-31.svg" class="animateUpDown" alt="arrow down icon" style="transform: rotate(90deg);">
            </div>
        </div>
        <div class="flex justify-between items-center flex-col relative" style="background: #fcf8f0;z-index: 2;">
            <!-- <div class="ovale--md" style="z-index: 1;"></div> -->
            <div class="text-center ovale py-16 px-2 w-full flex flex-col items-center js-scroll fade-in-bottom" style="z-index: 1;">
                <h3 class="text-2xl DancingScript" style="color:#7B4F06"><?=$katapembuka1?></h3>
                <h3 class="p-4 text-lg futura-md" style="color:#7B4F06"><?=$katapembuka2?></h3>
                <p class="text-sm lg:text-base futura-md md:w-9/12" style="color:#7B4F06"><?=$katapembuka3?></p>
            </div>
            <div class="w-full -mt-20">
                <img src="MaskGroup2.png" class="relative halfcirc-img lg:hidden object-cover" style="" alt="">
                <img src="MaskGroup2@169.jpg" class="relative halfcirc-img hidden md:hidden lg:block object-cover" style="" alt="">
            </div>
        </div>
        <div class="mt-12 md:mt-22">
            <div class="py-12 text-center flex justify-center relative">
                <div class="h-1 w-12 absolute top-0 left-0" style="background-color: #C7CEBE;"></div>
                <p class="w-9/12 lg:w-3/6 lg:text-xl js-scroll fade-in-bottom"><?=$kataprofil?></p>
                <div class="h-1 w-12 absolute bottom-0 right-0" style="background-color: #E1D5BE;"></div>
            </div>
            <div class="mt-8 lg:flex lg:justify-evenly lg:items-baseline relative">
                <div class="ovale--big"></div>
                <div class="pt-14 lg:w-5/12 flex items-center flex-col js-scroll fade-in-bottom text-center">
                    <img src="https://dummyimage.com/300x300/000/fff.jpg" class="rounded-full w-80 h-80 mb-6" alt="">
                    <h5 class="text-sm lg:text-xl tracking-widest SEGOEUI"><?=$namalengakapmp1?></h5>
                    <h1 class="my-4 text-5xl cl-dark-cream tracking-widest Bestermind"><?=$namamp1?></h1>
                    <h5 class="mb-2 text-sm lg:text-xl SEGOEUI"><?=$namaortump1?></h5>
                    <!-- <div class="w-7/12 lg:w-9/12 text-center text-sm lg:text-xl SEGOEUI">
                        <h5>Bpk. Kolonel Arh. Tri Wahjudjianto</h5>
                        <h5>&</h5>
                        <h5>Ibu Indah Mustika</h5>
                    </div> -->
                    <a href="<?=$linksosmedmp1?>" target="_blank" class="rounded-full py-2 px-5 mt-8 flex justify-between items-center" style="background-color: rgba(106, 170, 234, .15);">
                        <img src="iconmonstr-instagram-14.svg" width="16" class="pt-0.5" alt="iconmonstr-instagram-14.svg">
                        <span class="text-sm  pl-1 futura-md" style="color: #6AAAEA;"></span>
                    </a>
                </div>
                <div class="mt-6 lg:w-5/12 flex items-center flex-col js-scroll fade-in-bottom text-center">
                    <img src="https://dummyimage.com/300x300/000/fff.jpg" class="rounded-full w-80 h-80 mb-6" alt="">
                    <h5 class="text-sm lg:text-xl tracking-widest SEGOEUI"><?=$namalengakapmp2?></h5>
                    <h1 class="my-4 text-5xl cl-dark-cream tracking-widest Bestermind"><?=$namamp2?></h1>
                    <h5 class="mb-2 text-sm lg:text-xl SEGOEUI"><?=$namaortump2?></h5>
                    <!-- <div class="w-7/12 lg:w-9/12 text-center text-sm lg:text-xl SEGOEUI">
                        <h5>Bpk. H. Bambang Maryanto (Alm)</h5>
                        <h5>&</h5>
                        <h5>Ibu Hj. Sri Khunfa'ah</h5>
                    </div> -->
                    <a href="<?=$linksosmedmp2?>" target="_blank" class="rounded-full py-2 px-5 mt-8 flex justify-between items-center" style="background-color: rgba(106, 170, 234, .15);">
                        <img src="iconmonstr-instagram-14.svg" width="16" class="pt-0.5" alt="iconmonstr-instagram-14.svg">
                        <span class="text-sm pl-1 futura-md" style="color: #6AAAEA;"></span>
                    </a>
                </div>
            </div>
            </div>
            <div class="ovale--long py-16 mt-16 relative">
                <!-- <div class="ovale--2big"></div> -->
                <div class="flex items-center flex-col">
                    <div class="w-9/12 text-center">
                        <p class="cl-dark-cream lg:text-xl SEGOEUI js-scroll fade-in-bottom"><?=$katadataAcr?></p>
                        <div class="pt-16 cl-dark-cream font-bold flex items-center flex-col js-scroll fade-in-bottom">
                            <img src="wedding-ring.svg" class="rounded-full h-24 w-24 p-4 mb-4" alt="ring icon" style="background-color: #C6B08B;">
                            <h1 class="text-3xl cl-dark-cream Bestermind"><?=$juduldataAcr1?></h1>
                            <div class="h-0.5 w-48 mt-2" style="background-color: rgba(199, 206, 190, .35);"></div>
                            <h5 class="pt-6 SEGOEUI"><?=$dataAcr1?></h5>
                            <!-- <h5 class="SEGOEUI">Pukul: 09.00 - 11.00 WIB</h5>
                            <h5 class="SEGOEUI">Pesona Alam Residence Semarang Jl. Perumahan baru di semarang</h5> -->
                            <a href="<?=$linkdataAcr1?>" target="_blank" class="rounded-full py-2 px-8 mt-8 flex justify-between items-center" style="background-color: #7B4F06;">
                                <img src="your-location.svg" width="18" alt="map icon">
                                <span class="pl-2 text-md font-normal futura-md" style="color:#F9F3E7">Map Location</span>
                            </a>
                        </div>
                        <div class="pt-16 cl-dark-cream font-bold flex items-center flex-col js-scroll fade-in-bottom">
                            <img src="wedding-ring.svg" class="rounded-full h-24 w-24 p-4 mb-4" alt="ring icon" style="background-color: #C6B08B;">
                            <h1 class="text-3xl cl-dark-cream Bestermind"><?=$juduldataAcr2?></h1>
                            <div class="h-0.5 w-48 mt-2" style="background-color: rgba(199, 206, 190, .35);"></div>
                            <h5 class="pt-6 SEGOEUI"><?=$dataAcr2?></h5>
                            <!-- <h5 class="SEGOEUI">Pukul: 09.00 - 11.00 WIB</h5>
                            <h5 class="SEGOEUI">Pesona Alam Residence Semarang Jl. Perumahan baru di semarang</h5> -->
                            <a href="<?=$linkdataAcr2?>" target="_blank" class="rounded-full py-2 px-8 mt-8 flex justify-between items-center" style="background-color: #7B4F06;">
                                <img src="your-location.svg" width="18" alt="map icon">
                                <span class="pl-2 text-md font-normal futura-md" style="color:#F9F3E7">Map Location</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-16 flex items-center flex-col">
                <div class="text-center js-scroll flex flex-col items-center fade-in-bottom">
                    <p class="mb-16 w-9/12 cl-dark-cream lg:text-xl SEGOEUI"><?=$kalimattambahan?></p>
                    <a href="<?=$linktambahan?>" target="_blank" class="md:w-max md:mx-auto rounded-full py-2 px-8" style="background-color: rgba(106, 170, 234, .15);">
                        <span class="SEGOEUI" style="color: rgba(106, 170, 234, 1);word-wrap: break-word;"><?=$linktambahan?></span>
                    </a>
                </div>
            </div>
            <div class="my-16 flex items-center flex-col relative" style="z-index: 2;">
                <img src="MaskGroup2.png" class="halfcirc-img absolute clip-ellipse top-0 lg:hidden object-cover" style="z-index: -1;" alt="">
                <img src="MaskGroup2@169.jpg" class="halfcirc-img absolute clip-ellipse top-0 hidden md:hidden lg:block object-cover" style="z-index: -1;" alt="">
                <div class="mt-28 text-center">
                    <h1 class="text-3xl SEGOEUI" style="color:#F9F3E7;">Counting The Day</h1>
                    <div class="rounded-full py-6 px-12 mt-8" style="background-color: rgba(123, 79, 6, .5);">
                        <div>
                            <div id="jsTimer" class="text-3xl futura-extra-bold" style="color:#fff;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ovale--long py-16 -mt-4 mb-16 cl-dark-cream futura-md relative" style="">
                <!-- <div class="ovale--2big"></div> -->
                <div class="flex items-center flex-col js-scroll fade-in-bottom">
                    <h1 class="pt-20 text-5xl cl-dark-cream tracking-widest Bestermind"><?=$judulrsvp?></h1>
                    <?php
                        if(isset($undangan->ivts_Name)){
                    ?>
                    <h5 class="py-4 text-lg"><?=$kalimatsapaan?></h5>
                    <h3 class="text-lg"><?=$undangan->ivts_Name?></h3>
                    <?php
                        }
                    ?>

                    <p class="py-4 px-4 md:w-8/12 text-center"><?=$textrsvp?></p>

                    <form name="rsvpForm" method="post" action="<?=site_url('home/submit-whises/'.$client->client_Id.'/'.url_title($client->client_Name,'-'))?>" class="w-9/12 lg:w-3/6 mt-4 text-left flex flex-col items-start">
                    <input type="hidden" value="<?=$undangan->ivts_Id?>" name="ivtsId"/>
                         <?php
                            if(isset($undangan->ivts_Name)){
                         ?>
                        
                        <?php
                            }else{
                         ?>
                        <div class="w-full my-4">
                            <h5>Nama</h5>
                            <input type="text" name="fullname" class="w-full h-10 mt-2 rounded-sm" style="background-color:#fff">
                        </div>
                        <div class="w-full">
                            <h5>Alamat / Instansi</h5>
                            <textarea name="text" name="ivtsAddress" cols="40" rows="4" class="mt-2 w-full rounded-sm"></textarea>
                        </div>
                         <?php
                            }
                         ?>
                        <fieldset class="mt-3">
                            <legend>Apakah Anda Akan Hadir?</legend>
                        
                            <input type="radio" name="isPresent" id="hadir" value="1" onchange="radioVal()">
                            <label for="hadir">Ya, Saya akan hadir</label>
                            <br>
                            <input type="radio" name="isPresent" id="tidakhadir" value="0" onchange="radioVal()">
                            <label for="tidakhadir">Maaf, Saya tidak dapat hadir</label>
                        
                        </fieldset>
                        <!-- <div id="hadirBtn" class="rounded-full py-2 px-8 mt-12 w-full text-center cursor-pointer" style="color:#F9F3E7; background-color: rgba(123, 79, 6, .5)">
                            Kirim
                        </div> -->
                        <div id="hadirForm" class="w-full mt-4 text-left flex flex-col items-center" style="display: none;">
                            <div class="w-full my-4">
                                <h5>No Whatsapp</h5>
                                <input type="number" value="<?=$undangan->ivts_NoHp?>" name="phoneNo" id="phoneNo" onkeypress="return isNumberKey(event)" class="w-full h-10 mt-2 rounded-sm">
                                <!-- <input type="number" name="whatsapp" onkeypress="return isNumberKey(event)" />  -->
                            </div>                                

                    <?php
                        if(isset($undangan->ivts_Name)){
                    ?>

                            <?php
                                if(isset($hidejmltamursvp) && $hidejmltamursvp==1){
                            ?>         
                                    <?php if(isset($makstamursvp) && $makstamursvp>0 || $makstamursvpBy==1){
                                        if($makstamursvpBy==1){
                                            echo "<h6 style='text-align:left;'>Karena adanya pembatasan tamu undangan dalam situasi pandemi, 1 undangan berlaku untuk $undangan->ivts_Guest orang.</h6>";
                                            echo "<input type='hidden' name='numberPerson' id='numberPerson' value='$undangan->ivts_Guest' class='w-full h-10' placeholder='Jumlah Orang'>";
                                        }else{
                                            echo "<h6 style='text-align:left;'>Karena adanya pembatasan tamu undangan dalam situasi pandemi, 1 undangan berlaku untuk $makstamursvp orang.</h6>";
                                            echo "<input type='hidden' name='numberPerson' id='numberPerson' value='$makstamursvp' class='w-full h-10' placeholder='Jumlah Orang'>";
                                        }
                                    }else{
                                    ?>
                                    <h5>Jumlah Tamu</h5>
                                        <input type="number" name="numberPerson" id="numberPerson" class="w-full h-10" required>
                                    <?php
                                     }
                                    ?> 
                            
                            <?php
                                }else{
                                    if(isset($makstamursvp) && $makstamursvp>0 || $makstamursvpBy==1){
                                        if($makstamursvpBy==1){
                            ?> 
                                            <div class="w-full">
                                                <h5>Jumlah Tamu</h5>
                                                <select name="numberPerson" id="numberPerson" class="w-full h-10">
                                                    <?php
                                                    for($i=1;$i<=$undangan->ivts_Guest;$i++){
                                                        echo '<option value="'.$i.'">'.$i.' Orang</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php
                                        }else{
                                        ?>
                                            <div class="w-full">
                                                <h5>Jumlah Tamu</h5>
                                                <select name="numberPerson" id="numberPerson" class="w-full h-10">
                                                    <?php
                                                    for($i=1;$i<=$makstamursvp;$i++){
                                                        echo '<option value="'.$i.'">'.$i.' Orang</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php
                                        }
                                        }else{
                                            
                                            echo '<h5>Jumlah Tamu</h5>';
                                            echo '<input type="number" name="numberPerson" id="numberPerson" class="w-full h-10" required>';
                                        }
                                    }
                                    ?>
                    <?php
                        }else{
                    ?>
                             <?php
                                if(isset($hidejmltamursvp) && $hidejmltamursvp==1){
                            ?>         
                                    <?php if(isset($makstamursvp) && $makstamursvp>0){
                                        
                                            echo "<h6 style='text-align:left;'>Karena adanya pembatasan tamu undangan dalam situasi pandemi, 1 undangan berlaku untuk $makstamursvp orang.</h6>";
                                            echo "<input type='hidden' name='numberPerson' id='numberPerson' value='$makstamursvp' class='w-full h-10' placeholder='Jumlah Orang'>";
                                    
                                    }else{
                                    ?>
                                    <h5>Jumlah Tamu</h5>
                                        <input type="number" name="numberPerson" id="numberPerson" class="w-full h-10" required>
                                    <?php
                                     }
                                    ?> 
                            
                            <?php
                                }else{
                                    if(isset($makstamursvp) && $makstamursvp>0){
                                       
                            ?>
                                            <div class="w-full">
                                                <h5>Jumlah Tamu</h5>
                                                <select name="numberPerson" id="numberPerson" class="w-full h-10">
                                                    <?php
                                                    for($i=1;$i<=$makstamursvp;$i++){
                                                        echo '<option value="'.$i.'">'.$i.' Orang</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php
                                        }else{
                                            
                                            echo '<h5>Jumlah Tamu</h5>';
                                            echo '<input type="number" name="numberPerson" id="numberPerson" class="w-full h-10" required>';
                                        }
                                    }
                                    ?>   


                    <?php
                        }
                    ?>

                            <div class="w-full mt-4">
                                <h5>Tinggalkan Pesan</h5>
                                <textarea name="message" id="msghadirForm" cols="40" rows="4" class="mt-2 w-full rounded-sm"></textarea>
                            </div>
                            <button type="submit" class="rounded-full py-2 px-8 mt-12 w-full text-center cursor-pointer" style="color:#F9F3E7; background-color: rgba(123, 79, 6, .5)">Kirim1</button>
                            <!-- <div id="barcodeBtn" class="rounded-full py-2 px-8 mt-12 w-full text-center cursor-pointer" style="color:#F9F3E7; background-color: rgba(123, 79, 6, .5)">
                                Kirim
                            </div> -->
                        </div>
                        <!-- <div id="tidakhadirBtn" class="rounded-full py-2 px-8 mt-12 w-full text-center cursor-pointer" style="display:none;color:#F9F3E7; background-color: rgba(123, 79, 6, .5)">
                            Kirim
                        </div> -->
                        <div id="tidakhadirForm" class="w-full mt-4 text-left flex flex-col items-center" style="display: none;" >
                            <div class="w-full">
                                <h5>Tinggalkan Pesan</h5>
                                <textarea name="message" id="msgtidakhadirForm" cols="40" rows="4" class="mt-2 w-full rounded-sm" ></textarea>
                            </div>
                            <!-- <div id="tidakhadirBtn" class="rounded-full py-2 px-8 mt-12 w-full text-center cursor-pointer" style="color:#F9F3E7; background-color: rgba(123, 79, 6, .5)" onclick="">
                                Kirim
                            </div> -->
                            <button type="submit" class="rounded-full py-2 px-8 mt-12 w-full text-center cursor-pointer" style="color:#F9F3E7; background-color: rgba(123, 79, 6, .5)">Kirim2</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-full lg:flex lg:justify-center lg:align-center overflow-scroll" style="height: 500px;position: relative;z-index: 1;">
                <div class="lg:w-3/6 lg:pt-24 flex justify-center items-center flex-col">
                    <div class="w-10/12 my-4 flex items-start">
                        <div class="w-2/12 pt-1 pr-2">
                            <img src="https://dummyimage.com/31x31/000/fff.jpg" width="31" alt="message icon">
                        </div>
                        <div class="SEGOEUI">
                            <div class="flex justify-between items-center">
                                <div class="text-sm cl-dark-cream">
                                    <h5>Yohanes Pamungkas</h5>
                                    <h5 class="text-xs">5 jam yang lalu</h5>
                                </div>
                                <div class="rounded-full py-1 px-3 text-center text-white text-sm font-light" style="background-color: #7B4F06;">
                                    hadir
                                </div>
                            </div>
                            <div>
                                <p class="cl-dark-cream">
                                    "Selamat menikah. Di kehidupan baru yang kalian tapaki, semoga cinta dan bahagia senantiasa membersamai."
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-10/12 my-4 flex items-start">
                        <div class="w-2/12 pt-1 pr-2">
                            <img src="https://dummyimage.com/31x31/000/fff.jpg" alt="message icon">
                        </div>
                        <div class="SEGOEUI">
                            <div class="flex justify-between items-center">
                                <div class="text-sm cl-dark-cream">
                                    <h5>Nando Prasetyo</h5>
                                    <h5 class="text-xs">27/06/2021</h5>
                                </div>
                                <div class="rounded-full py-1 px-3 text-center text-white text-sm font-light" style="background-color: #7B4F06;">
                                    tidak hadir
                                </div>
                            </div>
                            <div>
                                <p class="cl-dark-cream">
                                    "Selamat menikah. Di kehidupan baru yang kalian tapaki, semoga cinta dan bahagia senantiasa membersamai."
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-10/12 my-4 flex items-start">
                        <div class="w-2/12 pt-1 pr-2">
                            <img src="https://dummyimage.com/31x31/000/fff.jpg" width="31" alt="message icon">
                        </div>
                        <div class="SEGOEUI">
                            <div class="flex justify-between items-center">
                                <div class="text-sm cl-dark-cream">
                                    <h5>Yohanes Pamungkas</h5>
                                    <h5 class="text-xs">27/06/2021</h5>
                                </div>
                                <div class="rounded-full py-1 px-3 text-center text-white text-sm font-light" style="background-color: #7B4F06;">
                                    hadir
                                </div>
                            </div>
                            <div>
                                <p class="cl-dark-cream">
                                    "Selamat menikah. Di kehidupan baru yang kalian tapaki, semoga cinta dan bahagia senantiasa membersamai."
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-10/12 my-4 flex items-start">
                        <div class="w-2/12 pt-1 pr-2">
                            <img src="https://dummyimage.com/31x31/000/fff.jpg" alt="message icon">
                        </div>
                        <div class="SEGOEUI">
                            <div class="flex justify-between items-center">
                                <div class="text-sm cl-dark-cream">
                                    <h5>Nando Prasetyo</h5>
                                    <h5 class="text-xs">27/06/2021</h5>
                                </div>
                                <div class="rounded-full py-1 px-3 text-center text-white text-sm font-light" style="background-color: #7B4F06;">
                                    tidak hadir
                                </div>
                            </div>
                            <div>
                                <p class="cl-dark-cream">
                                    "Selamat menikah. Di kehidupan baru yang kalian tapaki, semoga cinta dan bahagia senantiasa membersamai."
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-10/12 my-4 flex items-start">
                        <div class="w-2/12 pt-1 pr-2">
                            <img src="https://dummyimage.com/31x31/000/fff.jpg" width="31" alt="message icon">
                        </div>
                        <div class="SEGOEUI">
                            <div class="flex justify-between items-center">
                                <div class="text-sm cl-dark-cream">
                                    <h5>Yohanes Pamungkas</h5>
                                    <h5 class="text-xs">27/06/2021</h5>
                                </div>
                                <div class="rounded-full py-1 px-3 text-center text-white text-sm font-light" style="background-color: #7B4F06;">
                                    hadir
                                </div>
                            </div>
                            <div>
                                <p class="cl-dark-cream">
                                    "Selamat menikah. Di kehidupan baru yang kalian tapaki, semoga cinta dan bahagia senantiasa membersamai."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mt-16 mb-0">
                <div class="iframe--cont flex justify-center items-center">
                    <iframe class="responsive-iframe" src="<?=$videoUrl?>"></iframe>
                </div>
            </div>
            <div class="relative">
                <div class="my-16 flex justify-between items-center">
                    <div class="h-1 w-12" style="background-color: #C7CEBE;"></div>
                    <h1 class="text-5xl cl-dark-cream Bestermind">Galery Photos</h1>
                    <div class="h-1 w-12" style="background-color: #E1D5BE;"></div>
                </div>
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="<?=$fotoslide1?>" style="width:100%">
                    </div>
                    <div class="mySlides fade">
                        <img src="<?=$fotoslide2?>" style="width:100%">
                    </div>
                    <div class="mySlides fade">
                        <img src="<?=$fotoslide3?>" style="width:100%">
                    </div>
                    <div class="mySlides fade">
                        <img src="<?=$fotoslide4?>" style="width:100%">
                    </div>
                    <div class="mySlides fade">
                        <img src="<?=$fotoslide5?>" style="width:100%">
                    </div>
                    <div class="mySlides fade">
                        <img src="<?=$fotoslide6?>" style="width:100%">
                    </div>
                    
                    <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
                    
                </div>
                <br>
                
                <!-- <div class="w-full absolute bottom-20" style="text-align:center">
                    <span class="dot2" onclick="currentSlide(1)"></span> 
                    <span class="dot2" onclick="currentSlide(2)"></span> 
                    <span class="dot2" onclick="currentSlide(3)"></span> 
                </div> -->
                <span class="circle--half"></span>
            </div>
            <div class="my-16 flex flex-col justify-center items-center">
                <div class="SEGOEUI flex justify-center items-center flex-col js-scroll fade-in-bottom">
                    <img src="facemask.svg" alt="mask icon">
                    <h3 class="font-extrabold text-xl"><?=$judulprokes?></h3>
                    <!-- <h3 class="text-xl">PROTOKOL KESEHATAN</h3> -->
                    <p class="w-9/12 lg:w-3/6 lg:text-xl my-4"><?=$katapembukaprokes?></p>
                </div>
                <div class="w-9/12 md:w-6/12 lg:w-4/12 js-scroll fade-in-bottom">
                    <div class="my-3 flex justify-center items-start md:justify-start md:items-start SEGOEUI font-bold">
                        <h3 class="rounded-full w-6 h-6 px-2 pt-px mr-4 text-center text-sm" style="background-color: #7B4F06;color: #F9F3E7;">1</h3>
                        <h3 class="text-base font-normal"><?=$poin1prokes?></h3>
                    </div>
                    <div class="my-3 flex justify-center items-start md:justify-start md:items-start SEGOEUI font-bold">
                        <h3 class="rounded-full w-6 h-6 px-2 pt-px mr-4 text-center text-sm" style="background-color: #7B4F06;color: #F9F3E7;">2</h3>
                        <h3 class="text-base font-normal"><?=$poin2prokes?></h3>
                    </div>
                    <div class="my-3 flex justify-center items-start md:justify-start md:items-start SEGOEUI font-bold">
                        <h3 class="rounded-full w-6 h-6 px-2 pt-px mr-4 text-center text-sm" style="background-color: #7B4F06;color: #F9F3E7;">3</h3>
                        <h3 class="text-base font-normal"><?=$poin3prokes?></h3>
                    </div>
                    <div class="my-3 flex justify-center items-start md:justify-start md:items-start SEGOEUI font-bold">
                        <h3 class="rounded-full w-6 h-6 px-2 pt-px mr-4 text-center text-sm" style="background-color: #7B4F06;color: #F9F3E7;">4</h3>
                        <h3 class="text-base font-normal"><?=$poin4prokes?></h3>
                    </div>
                    <div class="my-3 flex justify-center items-start md:justify-start md:items-start SEGOEUI font-bold">
                        <h3 class="rounded-full w-6 h-6 px-2 pt-px mr-4 text-center text-sm" style="background-color: #7B4F06;color: #F9F3E7;">5</h3>
                        <h3 class="text-base font-normal"><?=$poin5prokes?></h3>
                    </div>
                    <div class="my-3 flex justify-center items-start md:justify-start md:items-start SEGOEUI font-bold">
                        <h3 class="rounded-full w-6 h-6 px-2 pt-px mr-4 text-center text-sm" style="background-color: #7B4F06;color: #F9F3E7;">6</h3>
                        <h3 class="text-base font-normal"><?=$poin6prokes?></h3>
                    </div>
                    <div class="my-3 flex justify-center items-start md:justify-start md:items-start SEGOEUI font-bold">
                        <h3 class="rounded-full w-6 h-6 px-2 pt-px mr-4 text-center text-sm" style="background-color: #7B4F06;color: #F9F3E7;">7</h3>
                        <h3 class="text-base font-normal"><?=$poin7prokes?></h3>
                    </div>
                    <div class="mt-8 flex justify-center items-center SEGOEUI font-bold">
                        <h3 class="text-base lg:text-xl text-center font-normal"><?=$katapenutupprokes?></h3>
                    </div>
                </div>
            </div>
            <div class="mt-16 mb-8 relative" style="height: 428px;">
                <img src="MaskGroup2.png" class="absolute halfcirc-img top-0 lg:hidden object-cover" style="" alt="">
                <img src="MaskGroup2@169.jpg" class="absolute halfcirc-img top-0 hidden md:hidden lg:block object-cover" style="" alt="">
                <div class="pt-44 flex justify-center items-center flex-col js-scroll fade-in-bottom">
                    <h5 class="SEGOEUI lg:text-xl font-bold" style="color:#fafafa;"><?=$kalimatclosing?></h5>
                    <h1 class="text-3xl lg:text-5xl mt-2 lg:mt-6 Bestermind" style="color:#fafafa;"><?=$namamp1?> & <?=$namamp2?></h1>
                </div>
            </div>
            <div class="pb-8 mx-auto text-center relative">
                <h5 class="text-xs font-bold SEGOEUI">made with ♥️ by</h5>
                <a href="https://instagram.com/dgsign.id_bukutamudigital?igshid=1ctl0cjcx34zk" target="_blank">
                    <img src="DGSIGNID1.png" class="mx-auto" alt="DGSIGNID1">
                </a>
                <span class="text-xs SEGOEUI">Music by</span>
                <span class="text-xs font-bold SEGOEUI">Cendol Dawet - Didi Kempot</span>
            </div>

            <!-- MODALS -->
            <div id="hadirModal" class="h-screen w-full text-center pt-8" style="display: none;background-color: #fafafa;z-index: 2;">
                <div id="closeHadir" class="close rounded-full w-6 h-6 mx-auto text-white text-center" style="background-color: #7B4F06;">&times;</div>
                <h5 class="mt-4 text-base text-base Bestermind">The Wedding of</h5>
                <h3 class="mt-2 text-3xl Bestermind">Evika & Andrian</h3>
                <div class="my-6 flex justify-between items-center">
                    <div class="h-1 w-12" style="background-color: #C7CEBE;"></div>
                    <h1 class="text-3xl tracking-widest futura-bold" style="color:#6AAAEA">Saya Akan Hadir</h1>
                    <div class="h-1 w-12" style="background-color: #E1D5BE;"></div>
                </div>
                <div class="mt-18 mb-16 cl-dark-cream futura-md flex justify-center items-center relative">
                    <div class="ovale--xl"></div>
                    <div class="w-9/12 mt-12 text-left flex flex-col items-center" style="z-index:2;">
                        <div class="w-full md:w-3/6">
                            <h5>Jumlah Tamu</h5>
                            <div class="mt-2 flex justify-start items-center">
                                <input type="button" onclick="decrementValue()" class="w-12 h-10 rounded-sm futura-extra-bold text-3xl text-center" style="color:#fafafa;background-color:#6AAAEA;" value="-" />
                                <input type="text" id="number" min="1" max="5" class="w-16 h-10 mx-3 px-2 text-center rounded-sm" value="0"/>
                                <input type="button" onclick="incrementValue()" class="w-12 h-10 rounded-sm futura-extra-bold text-3xl text-center" style="color:#fafafa;background-color:#6AAAEA;" value="+" />
                                <span class="cl-dark-cream ml-2">orang</span>
                            </div>
                        </div>
                        <div class="w-full md:w-3/6 my-4">
                            <h5>No Whatsapp</h5>
                            <input type="number" class="w-full h-10 mt-2 rounded-sm">
                        </div>
                        <div class="w-full md:w-3/6">
                            <h5>Tinggalkan Pesan</h5>
                            <textarea name="text" cols="40" rows="5" class="mt-2 w-full rounded-sm"></textarea>
                        </div>
                        <div id="barcodeBtn" class="rounded-full py-2 px-8 mt-12 w-full md:w-3/6 text-center cursor-pointer" style="color:#F9F3E7; background-color: rgba(123, 79, 6, .5)">
                            Kirim
                        </div>
                    </div>
                </div>
            </div>
            <div id="tidakModal" class="h-screen w-full text-center pt-8" style="display: none;background-color: #fafafa;z-index: 2;">
                <div id="closeTidak" class="close rounded-full w-6 h-6 mx-auto text-white text-center" style="background-color: #7B4F06;">&times;</div>
                <h5 class="text-base text-base Bestermind">The Wedding of</h5>
                <h3 class="mt-2 text-3xl Bestermind">Evika & Andrian</h3>
                <div class="my-6 flex justify-between items-center">
                    <div class="h-1 w-12" style="background-color: #C7CEBE;"></div>
                    <h1 class="text-2xl tracking-widest futura-bold" style="color:#6AAAEA">Maaf Tidak Dapat Hadir</h1>
                    <div class="h-1 w-12" style="background-color: #E1D5BE;"></div>
                </div>
                <div class="mt-18 mb-16 cl-dark-cream futura-md flex justify-center items-center relative">
                    <div class="ovale--xl"></div>
                    <div class="w-9/12 mt-12 text-left flex flex-col items-center">
                        <div class="w-full">
                            <h5>Tinggalkan Pesan</h5>
                            <textarea name="text" cols="40" rows="7" class="mt-2 rounded-sm"></textarea>
                        </div>
                        <div id="tidakhadirBtn" class="rounded-full py-2 px-8 mt-12 w-full text-center cursor-pointer" style="color:#F9F3E7; background-color: rgba(123, 79, 6, .5)" onclick="">
                            Kirim
                        </div>
                    </div>
                </div>
            </div>
            <div id="barcodeModal" class="h-screen w-full text-center py-12 flex items-center flex-col relative overflow-scroll" style="display: none;background-color: #FCF8F0;z-index: 2;">
                <div id="closeBarcode" class="close rounded-full w-6 h-6 mx-auto text-white text-center" style="background-color: #7B4F06;">&times;</div>
                <!-- untuk undangan tamu spesifik -->
                <!-- <div class="text-center mt-4 futura-md cl-dark-cream" style="">
                    <h5 class="text-2xl Bestermind" style="">The Wedding of</h5>
                    <h3 class="my-4 text-4xl Bestermind" style="">Evika & Andrian</h3>
                    <p class="w-9/12 pt-2 md:w-9/12 mx-auto text-xs SEGOEUI">*mohon tunjukan QR Code dibawah ini, Sebagai akses masuk pengganti isi buku tamu</p>
                </div>
                <div class="mt-2 w-full text-center tracking-widest relative">
                    <img src="https://dummyimage.com/250x250/000/fff.jpg" class="mx-auto" alt="">
                    <h5 class="pt-2 text-xs cl-dark-cream tracking-widest">Yth. Bpk / Ibu / Sdra / i</h5>
                    <h5 class="py-4 text-base cl-dark-cream tracking-widest">Budi Santoso</h5>
                    <h5 class="SEGOEUI">Sabtu, 14 Maret 2021</h5>
                    <h5 class="SEGOEUI">Pukul: 09.00 - 11.00 WIB</h5>
                    <h5 class="SEGOEUI">Pesona Alam Residence Semarang Jl. Perumahan baru di semarang</h5>
                    <div class="rounded-full py-2 px-8 mt-12 mx-auto w-max shadow-md text-center cursor-pointer" style="color:#fff; background-color: #6AAAEA;">
                        Download QR Code
                    </div>
                    <div class="rounded-full py-1 px-10 mt-6 mx-auto w-max border-2 border-white cl-dark-cream text-center cursor-pointer" style="border:2px solid #7B4F06">
                        Ubah Konfirmasi
                    </div>
                </div> -->
                <!-- untuk undangan tamu spesifik -->

                <!-- untuk undangan umum -->
                <div class="text-center mt-32 futura-md cl-dark-cream" style="">
                    <h5 class="text-2xl Bestermind" style="">The Wedding of</h5>
                    <h3 class="my-4 text-4xl Bestermind" style="">Evika & Andrian</h3>
                    <p class="w-9/12 pt-2 md:w-9/12 mx-auto text-base SEGOEUI">Terima kasih atas konfirmasi kehadiran anda, QR Code sebagai akses masuk akan dikirimkan melalui nomor Whatsapp yang diberikan</p>
                </div>
                <!-- untuk undangan umum -->
            </div>
            <div id="tidakhadirModal" class="h-screen w-full py-12 text-center flex items-center flex-col relative overflow-scroll" style="display: none;background-color: #FCF8F0;z-index: 2;">
                <div id="closeTidakhadir" class="close rounded-full w-6 h-6 mx-auto text-white text-center" style="background-color: #7B4F06;">&times;</div>
                <div class="mt-32 text-center futura-md cl-dark-cream" style="">
                    <h5 class="text-2xl Bestermind" style="">The Wedding of</h5>
                    <h3 class="my-4 text-4xl Bestermind" style="">Evika & Andrian</h3>
                    <p class="w-9/12 mx-auto text-base SEGOEUI">Terima kasih atas konfirmasi KETIDAK HADIRAN ANDA. Kami memohon doa dan restu untuk kelancaran pernikahan kami.</p>
                    <div class="rounded-full py-2 px-8 mt-12 mx-auto w-max shadow-md text-center cursor-pointer" style="color:#fff; background-color: #6AAAEA;">
                        Ubah Konfirmasi
                    </div>
                </div>
            </div>
        </div>
        <audio id="myAudio" control autoplay>
            <source src="bensound-tenderness.mp3" type="audio/mpeg">
        </audio>
    <section class="throttle-container" style="display: none;">
        <p>
            Scroll event is called <span id="scroll-count">0</span> times
        </p>
        <p>
            Throttle event is called <span id="throttle-count">0</span> times
        </p>
    </section>

    <script>
        function openInv() {
            var x = document.getElementById("myAudio"); 
            var open = document.getElementById("openBtn");
            var landing = document.getElementsByClassName("landing-page")[0]
            landing.className = 'animateUp';
            document.getElementsByClassName("mainContent")[0].style.display = 'block';
            x.play(); 
            open.style.display = 'none';
        }
    </script>
  <script>
    
      function playMsc() {
        var x = document.getElementById("myAudio"); 
        x.play();
        document.getElementById("playMusic").style.display = 'none';
        document.getElementById("pauseMusic").style.display = 'block';
      }
      function pauseMsc() {
        var x = document.getElementById("myAudio"); 
        x.pause();
        document.getElementById("pauseMusic").style.display = 'none';
        document.getElementById("playMusic").style.display = 'block';
      }
  </script>

  <!-- <script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides2");
        var dots = document.getElementsByClassName("dot2");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
    }
</script> -->

<script>
    var myIndex = 0;
    carousel();
    
    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 3000); // Change image every 2 seconds
    }
</script>

    <script>
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }    
    </script>

    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Jul 30, 2021 15:37:25").getTime();
        
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
            
        // Output the result in an element with id="demo"
        document.getElementById("jsTimer").innerHTML = "<div>" + days + "<span>Days</span></div> : " + "<div>" + hours + "<span>Hours</span></div> : "
        + "<div>" + minutes + "<span>Mins</span></div> : " + "<div>" + seconds + "<span>Secs</span></div>";
            
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("jsTimer").innerHTML = "EXPIRED";
        }
        }, 1000);
    </script>

    <script>
        const scrollElements = document.querySelectorAll(".js-scroll");
        const throttleCount = document.getElementById('throttle-count');
        const scrollCount = document.getElementById('scroll-count');

        var throttleTimer;

        const throttle = (callback, time) => {
        if (throttleTimer) return;

            throttleTimer = true;
            setTimeout(() => {
            callback();
                throttleTimer = false;
            }, time);
        }

        const elementInView = (el, dividend = 1) => {
        const elementTop = el.getBoundingClientRect().top;

        return (
            elementTop <=
            (window.innerHeight || document.documentElement.clientHeight) / dividend
        );
        };

        const elementOutofView = (el) => {
        const elementTop = el.getBoundingClientRect().top;

        return (
            elementTop > (window.innerHeight || document.documentElement.clientHeight)
        );
        };

        const displayScrollElement = (element) => {
        element.classList.add("scrolled");
        };

        const hideScrollElement = (element) => {
        element.classList.remove("scrolled");
        };

        const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
            if (elementInView(el, 1.25)) {
            displayScrollElement(el);
            } else if (elementOutofView(el)) {
            hideScrollElement(el)
            }
        })
        }
        var timer=0;
        var count=0;
        var scroll = 0;

        window.addEventListener("scroll", () => { 
            scrollCount.innerHTML = scroll++;
            throttle(() => {
                handleScrollAnimation();
                throttleCount.innerHTML = count++;
            }, 250);
        });
    </script>

    <!-- to decide which button hadir tidak hadir -->
    <script>
        function radioVal(){
            var select = document.querySelector('input[name="isPresent"]:checked').value;
            if(select == "1") { 
                document.getElementById('hadirForm').style.display = "block";
                
                 document.getElementById('tidakhadirForm').style.display = "none";
                 document.getElementById('phoneNo').removeAttribute('disabled');
               document.getElementById('msghadirForm').removeAttribute('disabled');
               document.getElementById('numberPerson').removeAttribute('disabled');
                 document.getElementById('msgtidakhadirForm').setAttribute('disabled', 'disabled');
            }
            else { 
               document.getElementById('hadirForm').style.display = "none";
               document.getElementById('tidakhadirForm').style.display = "block";
               //document.getElementById('phoneNo').setAttribute('disabled', 'disabled');
               document.getElementById('msghadirForm').setAttribute('disabled', 'disabled');
               document.getElementById('numberPerson').setAttribute('disabled', 'disabled');
               document.getElementById('msgtidakhadirForm').removeAttribute('disabled');
            }
        }
    </script>

    <!-- hadir modal -->
    <script>
        // Get the modal
        var modalHadir = document.getElementById("hadirModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("hadirBtn");
        
        // Get the <span> element that closes the modal
        var closeHadir = document.getElementById("closeHadir");
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modalHadir.style.display = "block";
        //   console.log("hadir");
        }
        
        // When the user clicks on <span> (x), close the modal
            closeHadir.onclick = function() {
            modalHadir.style.display = "none";
            // console.log("span");
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modalHadir.style.display = "none";
          }
        }
    </script>

    <!-- tidak hadir modal -->
    <script>
        // Get the modal
        var modalTidak = document.getElementById("tidakModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("tidakBtn");
        
        // Get the <span> element that closes the modal
        var closeTidak = document.getElementById("closeTidak");
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modalTidak.style.display = "block";
            //   console.log("tidak hadir");
        }
        
        // When the user clicks on <span> (x), close the modal
        closeTidak.onclick = function() {
            modalTidak.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modalTidak) {
                modalTidak.style.display = "none";
            }
        }
    </script>

    <!-- barcode modal -->
    <script>
        // Get the modal
        var modalBarcode = document.getElementById("barcodeModal");
        var modalHadir = document.getElementById("hadirModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("barcodeBtn");
        
        // Get the <span> element that closes the modal
        var closeBarcode = document.getElementById("closeBarcode");
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modalBarcode.style.display = "flex";
            modalHadir.style.display = "none";
        }
        
        // When the user clicks on <span> (x), close the modal
        closeBarcode.onclick = function() {
            modalBarcode.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modalBarcode) {
                modalBarcode.style.display = "none";
            }
        }
    </script>

    <!-- tidak hadir modal -->
    <script>
        // Get the modal
        var tidakhadirModal = document.getElementById("tidakhadirModal");
        var modalTidak = document.getElementById("tidakModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("tidakhadirBtn");
        
        // Get the <span> element that closes the modal
        var closeTidakhadir = document.getElementById("closeTidakhadir");
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            tidakhadirModal.style.display = "flex";
            modalTidak.style.display = "none";
        }
        
        // When the user clicks on <span> (x), close the modal
        closeTidakhadir.onclick = function() {
            tidakhadirModal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == tidakhadirModal) {
                tidakhadirModal.style.display = "none";
            }
        }
    </script>

</body>
</html>