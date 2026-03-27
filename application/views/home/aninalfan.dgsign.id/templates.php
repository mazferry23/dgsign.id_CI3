<!doctype html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <base href="<?=base_url('public/wi_template/aninalfan.dgsign.id/')?>"/>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  
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
    @font-face {
        font-family: Cambria;
        src: url(Cambria.ttf);
    }
    @font-face {
        font-family: Cambria-Bold;
        src: url(cambriab.ttf);
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
    .Cambria {
        font-family: Cambria;
    }
    .Cambria-Bold {
        font-family: Cambria-Bold;
    }

    body, html {
        overflow-x: hidden;
    }
    html {
        scroll-behavior: smooth;
    }
    body {
        /* max-width: 800px; */
        margin: auto;
        background-color: #FCF8F0;
        position: relative;
    }
    .cl-cream {
        background-color: #FCC4C9;
    }
    .cl-dark-cream {
        color: #2E2627;
    }
    .ovale {
        position: relative;
        background-image: linear-gradient(#FDF6F0, #FDF6F0);
        border-top-left-radius: 50% 10%;
        border-top-right-radius: 50% 10%;
        border-bottom-left-radius: 50% 10%;
        border-bottom-right-radius: 50% 10%;
    }
    .ovale--long {
        position: relative;
        background-image: linear-gradient(#FDF6F0, #FDF6F0);
        border-top-left-radius: 50% 5%;
        border-top-right-radius: 50% 5%;
        border-bottom-left-radius: 50% 5%;
        border-bottom-right-radius: 50% 5%;
    }
    .ovale--md {
        width: 800px;
        height: 470px;
        background: #FDF6F0;
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
        background: #FDF6F0;
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
        background: #FDF6F0;
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
        background: #FDF6F0;
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
        background: #FDF6F0;
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

    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 5;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        /* background-color: #fefefe; */
        margin: auto;
        padding: 0;
        width: 90%;
        max-width: 800px;
    }

    /* The Close Button */
    .closeGalery {
        color: white;
        position: absolute;
        top: 0px;
        left: 50%;
        font-size: 35px;
        font-weight: bold;
    }

    .closeGalery:hover,
    .closeGalery:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }

    .mySlides {
        display: none;
    }

    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    img {
        margin-bottom: -4px;
    }

    .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
    }

    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    img.hover-shadow {
        transition: 0.3s;
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
        <img src="1.png" class="absolute md:w-full md:h-screen lg:hidden top-0 object-cover" style="filter:brightness(80%);z-index:-1;" alt="">
        <img src="Foto1.png" class="absolute h-screen md:w-full hidden lg:block md:hidden top-0 object-cover" style="filter:brightness(80%);z-index:-1;" alt="">
        <div class="text-center tracking-widest" style="color: #fafafa;">
            <h5 class="text-base lg:text-xl SEGOEUI"></h5>
            <h5 class="text-base lg:text-xl SEGOEUI">The Wedding of</h5>
            <h3 class="mt-10 text-5xl lg:text-6xl Bestermind">Anin & Alfan</h3>
        </div>
        <div class="mt-12 text-center tracking-widest">
            <h5 class="text-base lg:text-xl futura-md" style="color:#fafafa"></h5>
            <h5 class="text-base lg:text-xl futura-md" style="color:#fafafa"></h5>
            <h5 class="text-base lg:text-xl futura-md" style="color:#fafafa"></h5>
        </div>
        <div class="mt-12 text-center" style="z-index:2;">
		      <h5 class="text-base lg:text-xl futura-md" style="color:#fafafa"> </h5>
			  <h5 class="text-base lg:text-xl futura-md" style="color:#fafafa"> </h5><br><br><br><br>
              <?php
                            if(isset($undangan->ivts_Name)){
                        ?>
			  <h5 class="text-base lg:text-xl SEGOEUI" style="color:#fafafa">Kepada Yth.</h5>
			<h5 class="text-base lg:text-xl SEGOEUI" style="color:#fafafa">Bpk/Ibu/Sdra/i</h5>
            <h5 class="mt-4 text-base lg:text-xl SEGOEUI" style="color:#fafafa"><?=$undangan->ivts_Name?></h5>
      <?php
                            }
                        ?>
        </div>
        <div id="openBtn" class="rounded-full py-2 px-8 mt-16 w-max shadow-lg text-center cursor-pointer fixed bottom-12" style="color:#FFFDFB; background-color: #FF5E6D" onclick="openInv()">
            Open Invitation
        </div>
    </div>
    <!-- landing page -->
    <div class="mainContent content bg-white" style="display: none;">
        <div class="fixed md:top-10 md:right-10 top-6 right-4" style="z-index: 4;">
            <img src="iconmonstr-media-control-48.svg" id="playMusic" class="cursor-pointer rounded-full shadow cl-cream w-10 h-10 p-2" style="display: none;" onclick="playMsc()" alt="iconmonstr-media-control-48">
            <img src="iconmonstr-media-control-49.svg" id="pauseMusic" class="cursor-pointer rounded-full shadow cl-cream w-10 h-10 p-2" onclick="pauseMsc()" alt="iconmonstr-media-control-49">
        </div>
        <div class="w-full py-2 fixed md:hidden bottom-0" style="background-color:#FDF6F0;z-index: 3;">
        <?php
                            if(isset($undangan->ivts_Name)){
                        ?>
            <ul class="flex justify-around items-end">
                <li>
                    <a href="https://aninalfan.dgsign.id/?uuid=<?=$undangan->ivts_Uuid?>#home" class="flex flex-col items-center justify-between">
                        <img src="home.svg" alt="">
                        <span class="pt-1 text-xs SEGOEUI" style="color:#848484;">Home</span>
                    </a>
                </li>
                <li>
                    <a href="https://aninalfan.dgsign.id/?uuid=<?=$undangan->ivts_Uuid?>#couples" class="flex flex-col items-center justify-between">
                        <img src="couple.svg" alt="">
                        <span class="pt-1 text-xs SEGOEUI" style="color:#848484;">Couples</span>
                    </a>
                </li>
                <li>
                    <a href="https://aninalfan.dgsign.id/?uuid=<?=$undangan->ivts_Uuid?>#event" class="flex flex-col items-center justify-between">
                        <img src="star.svg" alt="">
                        <span class="pt-1 text-xs SEGOEUI" style="color:#848484;">Event</span>
                    </a>
                </li>
                <li>
                    <a href="https://aninalfan.dgsign.id/?uuid=<?=$undangan->ivts_Uuid?>#gallery" class="flex flex-col items-center justify-between">
                        <img src="gallery.svg" alt="">
                        <span class="pt-1 text-xs SEGOEUI" style="color:#848484;">Gallery</span>
                    </a>
                </li>
                <li>
                    <a href="https://aninalfan.dgsign.id/?uuid=<?=$undangan->ivts_Uuid?>#rsvp" class="flex flex-col items-center justify-between">
                        <img src="wedding-invitation.svg" alt="">
                        <span class="pt-1 text-xs SEGOEUI" style="color:#848484;">RSVP</span>
                    </a>
                </li>
            </ul>
            <?php
                            }else{
                        ?>

            <ul class="flex justify-around items-end">
                <li>
                    <a href="https://aninalfan.dgsign.id/#home" class="flex flex-col items-center justify-between">
                        <img src="home.svg" alt="">
                        <span class="pt-1 text-xs SEGOEUI" style="color:#848484;">Home</span>
                    </a>
                </li>
                <li>
                    <a href="https://aninalfan.dgsign.id/#couples" class="flex flex-col items-center justify-between">
                        <img src="couple.svg" alt="">
                        <span class="pt-1 text-xs SEGOEUI" style="color:#848484;">Couples</span>
                    </a>
                </li>
                <li>
                    <a href="https://aninalfan.dgsign.id/#event" class="flex flex-col items-center justify-between">
                        <img src="star.svg" alt="">
                        <span class="pt-1 text-xs SEGOEUI" style="color:#848484;">Event</span>
                    </a>
                </li>
                <li>
                    <a href="https://aninalfan.dgsign.id/#gallery" class="flex flex-col items-center justify-between">
                        <img src="gallery.svg" alt="">
                        <span class="pt-1 text-xs SEGOEUI" style="color:#848484;">Gallery</span>
                    </a>
                </li>
                <li>
                    <a href="https://aninalfan.dgsign.id/#rsvp" class="flex flex-col items-center justify-between">
                        <img src="wedding-invitation.svg" alt="">
                        <span class="pt-1 text-xs SEGOEUI" style="color:#848484;">RSVP</span>
                    </a>
                </li>
            </ul>

            <?php
                            }
                        ?>

        </div>
        <div id="home" class="h-screen pt-44 lg:pt-72 flex items-center flex-col relative" style="z-index: 2;">
            <img src="1.png" class="absolute md:w-full md:h-screen lg:hidden top-0 object-cover" style="filter:brightness(80%);z-index:-1;" alt="">
            <img src="Foto1.png" class="absolute h-screen md:w-full hidden lg:block md:hidden top-0 object-cover" style="filter:brightness(80%);z-index:-1;" alt="">
            <div class="text-center" style="color: #fafafa;z-index:2;">
                <h5 class="text-lg lg:text-xl futura-md">The Wedding of</h5>
                <h3 class="text-5xl lg:text-6xl pt-12 lg:pt-8 Bestermind">Anin & Alfan</h3>
            </div>
            <div class="w-12 absolute bottom-24">
                <img src="iconmonstr-arrow-31.svg" class="animateUpDown" alt="arrow down icon" style="transform: rotate(90deg);">
            </div>
        </div>
        <div class="flex justify-between items-center flex-col relative" style="background: #fcf8f0;z-index: 2;">
            <!-- <div class="ovale--md" style="z-index: 1;"></div> -->
            <div class="text-center ovale py-16 px-2 w-full flex flex-col items-center js-scroll fade-in-bottom" style="z-index: 1;">
                <h3 class="text-2xl DancingScript" style="color:#FF5E6D"></h3>
                <h3 class="p-4 text-lg futura-md" style="color:#FF5E6D">Bismillahirramanirrahim</h3>
                <p class="text-sm lg:text-base futura-md md:w-9/12" style="color:#FF5E6D">"Dan diantara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri, supaya kamu merasa tenang dan tentram kepadanya, dan dijadikan-Nya diantaramu rasa kasih dan sayang. Sesungguhnya pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berfikir."</p>
				<p class="text-sm lg:text-base futura-md md:w-9/12" style="color:#FF5E6D">(QS:. Ar-Rum: 21)</p>
			</div>
            <div class="w-full -mt-20">
                <img src="2.png" class="relative halfcirc-img lg:hidden object-cover" style="" alt="">
                <img src="Foto2.png" class="relative halfcirc-img hidden md:hidden lg:block object-cover" style="" alt="">
            </div>
        </div>
        <div id="couples" class="mt-12 md:mt-22">
            <div class="py-12 text-center flex justify-center relative">
                <div class="h-1 w-12 absolute top-0 left-0" style="background-color: #FF5E6D;"></div>
                <p class="w-9/12 lg:w-3/6 lg:text-xl js-scroll fade-in-bottom">
                    Dengan memohon ridho dan rahmat Allah Subhanahuwataala izinkan kami mengundang Bapak/Ibu/Saudara/i untuk 
                    <?php
                            if(isset($undangan->ivts_Name)){
                        ?>
                    menghadiri dan 
                    <?php
                            }
                        ?>
                    memberikan doa restu pada pernikahan kami :
                </p>
                <div class="h-1 w-12 absolute bottom-0 right-0" style="background-color: #FF5E6D;"></div>
            </div>
            <div class="mt-8 lg:flex lg:justify-evenly lg:items-baseline relative">
                <div class="ovale--big"></div>
                <div class="pt-14 lg:w-5/12 flex items-center flex-col js-scroll fade-in-bottom text-center">
                    <img src="cpw.png" class="rounded-full object-cover w-80 h-80 mb-6" alt="">
                    <h5 class="text-sm lg:text-xl tracking-widest SEGOEUI" style="color:#FF5E6D;">drg. Anindita Dyah Palupi</h5>
                    <h1 class="my-4 text-5xl cl-dark-cream tracking-widest Bestermind" style="color:#FF5E6D;">Anin</h1>
                    <h5 class="mb-2 text-sm lg:text-xl SEGOEUI">Putri dari</h5>
                    <div class="w-7/12 lg:w-9/12 text-center text-sm lg:text-xl SEGOEUI">
                        <h5>Bpk. Martono Atmo S.S.H, M.H</h5>
                        <h5>&</h5>
                        <h5>Ibu Hati Nuraini</h5>
                    </div>
                    <a href="https://www.instagram.com/aninditadyahp/" target="_blank" class="rounded-full py-2 px-5 mt-8 flex justify-between items-center" style="background-color: #FF5E6D;">
                        <img src="iconmonstr-instagram-14.svg" width="16" alt="iconmonstr-instagram-14.svg">
                        <span class="text-sm  pl-1 futura-md" style="color: #FFFDFB;">aninditadyahp</span>
                    </a>
                </div>
                <div class="mt-6 lg:w-5/12 flex items-center flex-col js-scroll fade-in-bottom text-center">
                    <img src="cpp.png" class="rounded-full object-cover w-80 h-80 mb-6" alt="">
                    <h5 class="text-sm lg:text-xl tracking-widest SEGOEUI" style="color:#FF5E6D;">Alfan Ardi Muhammad Ravi</h5>
                    <h1 class="my-4 text-5xl cl-dark-cream tracking-widest Bestermind" style="color:#FF5E6D;">Alfan</h1>
                    <h5 class="mb-2 text-sm lg:text-xl SEGOEUI">Putra dari</h5>
                    <div class="w-7/12 lg:w-9/12 text-center text-sm lg:text-xl SEGOEUI">
                        <h5>Bpk. Kapten Inf Abdur Rauf Ali Alfansuri</h5>
                        <h5>&</h5>
                        <h5>Ibu Yusriati S.E, M.E</h5>
                    </div>
                    <a href="https://www.instagram.com/alfanamr/" target="_blank" class="rounded-full py-2 px-5 mt-8 flex justify-between items-center" style="background-color: #FF5E6D;">
                        <img src="iconmonstr-instagram-14.svg" width="16" alt="iconmonstr-instagram-14.svg">
                        <span class="text-sm pl-1 futura-md" style="color: #FFFDFB;">alfanamr</span>
                    </a>
                </div>
            </div>
        </div>
        <div id="event" class="ovale--long py-16 mt-16 relative">
            <!-- <div class="ovale--2big"></div> -->
            <div class="flex items-center flex-col">
                <div class="w-9/12 text-center">
                <?php
                            if(isset($undangan->ivts_Name)){
                        ?>
                    <p class="cl-dark-cream lg:text-xl SEGOEUI js-scroll fade-in-bottom">
                        Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir di acara Resepsi dan memberikan doa restu kepada kami.
                    </p>
                    <?php
                            }
                        ?>
                    <!-- <div class="pt-16 cl-dark-cream font-bold flex items-center flex-col js-scroll fade-in-bottom">
                        <img src="wedding-ring.svg" class="rounded-full h-24 w-24 p-4 mb-4" alt="ring icon" style="background-color: #C6B08B;">
                        <h1 class="text-3xl cl-dark-cream Bestermind">Akad Nikah</h1>
                        <div class="h-0.5 w-48 mt-2" style="background-color: rgba(199, 206, 190, .35);"></div>
                        <h5 class="pt-6 SEGOEUI">Sabtu, 14 Maret 2021</h5>
                        <h5 class="SEGOEUI">Pukul: 09.00 - 11.00 WIB</h5>
                        <h5 class="SEGOEUI">Pesona Alam Residence Semarang Jl. Perumahan baru di semarang</h5>
                        <a href="https://goo.gl/maps/mS7giHxMXQ5Tmnnr6" target="_blank" class="rounded-full py-2 px-8 mt-8 flex justify-between items-center" style="background-color: #7B4F06;">
                            <img src="your-location.svg" width="18" alt="map icon">
                            <span class="pl-2 text-md font-normal futura-md" style="color:#F9F3E7">Map Location</span>
                        </a>
                    </div> -->
                    <div class="pt-16 cl-dark-cream font-bold flex items-center flex-col js-scroll fade-in-bottom">
                        <img src="wedding-ring.svg" class="rounded-full h-24 w-24 p-4 mb-4" alt="ring icon" style="background-color: #FCC4C9;">
                        <?php
                            if(isset($undangan->ivts_Name)){
                        ?>
                        <h1 class="text-3xl cl-dark-cream Bestermind" style="color:#FF5E6D;">Resepsi Pernikahan</h1>
                        <div class="h-0.5 w-48 mt-2" style="background-color: rgba(199, 206, 190, .35);"></div>
                        <h5 class="pt-6 SEGOEUI">Selasa, 02 November 2021</h5>
                        <h5 class="SEGOEUI">Pukul: 18.30 WIB - Selesai</h5>
                        <h5 class="SEGOEUI">Ballroom Gumaya Tower Hotel - Semarang</h5>
                        <?php
                            }else{
                        ?>
                        <h1 class="text-3xl cl-dark-cream Bestermind" style="color:#FF5E6D;">Akad Nikah</h1>
                        <div class="h-0.5 w-48 mt-2" style="background-color: rgba(199, 206, 190, .35);"></div>
                        <h5 class="pt-6 SEGOEUI">Selasa, 02 November 2021</h5>
                        <h5 class="SEGOEUI">Pukul: 16.00 WIB - Selesai</h5>
                        <h5 class="SEGOEUI">Ballroom Gumaya Tower Hotel - Semarang</h5>

                        <?php
                            }
                        ?>
                        
                        <a href="https://maps.app.goo.gl/DEu5XaJ2cm4QRRUy5" target="_blank" class="rounded-full py-2 px-8 mt-8 flex justify-between items-center" style="background-color: #FF5E6D;">
                            <img src="your-location.svg" width="18" alt="map icon">
                            <span class="pl-2 text-md font-normal futura-md" style="color:#F9F3E7">Map Location</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16 flex items-center flex-col">
            <div class="text-center js-scroll flex flex-col items-center fade-in-bottom">
                <p class="mb-16 w-9/12 cl-dark-cream lg:text-xl SEGOEUI"><br><br>
                    Dengan segala kerendahan hati, kami memohon maaf yang sebesar - besarnya jika Prosesi Akad Nikah hanya dihadiri oleh keluarga dan kerabat terdekat.</p>
             </div>
        </div>
        <div class="my-16 flex items-center flex-col relative" style="z-index: 2;">
            <img src="3.png" class="halfcirc-img absolute clip-ellipse top-0 lg:hidden object-cover" style="z-index: -1;" alt="">
            <img src="Foto3.png" class="halfcirc-img absolute clip-ellipse top-0 hidden md:hidden lg:block object-cover" style="z-index: -1;" alt="">
            <div class="mt-28 text-center">
                <h1 class="text-3xl font-bold SEGOEUI" style="color:#FFFDFB;">Counting The Day</h1>
                <div class="rounded-full py-6 px-12 mt-8" style="background-color: rgba(255, 94, 109, .5);">
                    <div>
                        <div id="jsTimer" class="text-3xl futura-extra-bold" style="color:#FFFFFF;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="gallery" class="pt-16 relative">
            <div class="my-16 flex justify-between items-center flex-col">
                <h1 class="text-5xl Bestermind" style="color:#FF5E6D;">Photo Galery</h1>
                <div class="h-1 w-48 mt-8" style="background-color: #F5C6AA;"></div>
            </div>
			<div class="lg:w-9/12 mx-auto px-2 flex items-start justify-around">
                <div class="w-2/5">
                    <img src="g1.png" onclick="openModal();currentSlide(1)" class="hover-shadow cursor py-4">
                    <img src="g2.png" onclick="openModal();currentSlide(2)" class="hover-shadow cursor py-4">
                    <img src="g3.png" onclick="openModal();currentSlide(3)" class="hover-shadow cursor py-4">
             </div>
                <div class="w-2/5">
                    <img src="g4.png" onclick="openModal();currentSlide(4)" class="hover-shadow cursor py-4">
                    <img src="g5.png" onclick="openModal();currentSlide(5)" class="hover-shadow cursor py-4">
                    <img src="g6.png" onclick="openModal();currentSlide(6)" class="hover-shadow cursor py-4">
                </div>
            </div>
                
            <div id="myModal" class="modal">
                <span class="closeGalery cursor" onclick="closeModal()">&times;</span>
                <div class="modal-content">
                
                    <div class="mySlides">
                    <div class="numbertext">1 / 8</div>
                    <img src="z1.jpeg" class="w-9/12 lg:w-3/6 h-3/6 mx-auto">
                    </div>
                
                    <div class="mySlides">
                    <div class="numbertext">2 / 8</div>
                    <img src="z2.jpeg" class="w-9/12 lg:w-3/6 h-3/6 mx-auto">
                    </div>
                                  
                    <div class="mySlides">
                    <div class="numbertext">3 / 8</div>
                    <img src="z3.jpeg" class="w-9/12 lg:w-3/6 h-3/6 mx-auto">
                    </div>
                                    
                    <div class="mySlides">
                    <div class="numbertext">4 / 8</div>
                    <img src="z4.jpeg" style="width:100%">
                    </div>
                
					<div class="mySlides">
                    <div class="numbertext">5 / 8</div>
                    <img src="z5.jpeg" class="w-9/12 lg:w-3/6 h-3/6 mx-auto">
                    </div>
					
                    <div class="mySlides">
                    <div class="numbertext">6 / 8</div>
                    <img src="z6.jpeg" style="width:100%">
                    </div>
                                       
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>
        </div>

        <div id="rsvp" class="ovale--long py-8 mb-16 cl-dark-cream futura-md relative" >
            <!-- <div class="ovale--2big"></div> -->
            <div class="py-12 flex items-center flex-col js-scroll fade-in-bottom">
                <div class="mb-2 flex justify-between items-center flex-col">
                    <h1 class="text-4xl Cambria-Bold" style="color: #FF5E6D;">Do'a & Ucapan</h1>
                    <div class="h-0.5 w-44 mt-2" style="background-color: #F5C6AA;"></div>
                </div>
                <!-- <p class="py-4 px-4 md:w-8/12 text-center">Sehubungan dengan adanya pandemi Covid-19, mohon lakukan konfirmasi kehadiran acara dengan cara mengisi data dibawah ini </p> -->
                <form cname="rsvpForm" method="post" action="<?=site_url('home/submit-whises/'.$client->client_Id.'/'.url_title($client->client_Name,'-'))?>">
                        
                        <?php
                            if(isset($undangan->ivts_Name)){
                        ?>
                        <input type="hidden" value="<?=$undangan->ivts_Id?>" name="ivtsId"/>
                        <div class="w-full my-4">
                            <h5>Nama</h5>
                            <input type="text" name="fullname" id="fullname" class="w-full h-10 mt-2 rounded-sm" value="<?=$undangan->ivts_Name?>" style="background-color:#fff" disabled>
                        </div>
                        <?php
                            }
                        ?>
                        
                        <?php
                            if(!isset($undangan->ivts_Name)){
                        ?>
                        <div class="w-full my-4">
                            <h5>Nama</h5>
                            <input type="text" name="fullname" id="fullname" class="w-full h-10 mt-2 rounded-sm" style="background-color:#fff" required>
                        </div>

                        <!-- <div class="w-full">
                            <h5>Alamat / Instansi</h5>
                            <textarea name="ivtsAddress" id="ivtsAddress" cols="40" rows="4" class="mt-2 w-full rounded-sm" required></textarea>
                        </div> -->
                        <?php
                            }
                        ?>

                        
                        <!-- <fieldset class="mt-3">
                            <legend>Apakah Anda Akan Hadir?</legend>
                        
                            <input type="radio" name="isPresent" id="hadir" value="1" onchange="radioVal()">
                            <label for="hadir">Ya, Saya akan hadir</label>
                            <br>
                            <input type="radio" name="isPresent" id="tidakhadir" value="0" onchange="radioVal()">
                            <label for="tidakhadir">Maaf, Saya tidak dapat hadir</label>
                        
                        </fieldset> -->
                        <!-- <div id="hadirBtn" class="rounded-full py-2 px-8 mt-12 w-full text-center cursor-pointer" style="color:#F9F3E7; background-color: rgba(123, 79, 6, .5)">
                            Kirim
                        </div> -->
                        
                        <div id="hadirform" class="w-full mt-4 text-left flex flex-col items-center" style="display: block;">                        
                            <div id="telp" class="w-full my-4">
                            <?php
                                    if(isset($undangan->ivts_Name)){
                                ?>
                                <h5>No Whatsapp</h5>
                                <input type="number" name="phoneNo" id="phoneNo" value="<?=$undangan->ivts_NoHp?>" onkeypress="return isNumberKey(event)" class="w-full h-10 mt-2 rounded-sm">
                                <!-- <input type="number" name="whatsapp" onkeypress="return isNumberKey(event)" />  -->
                                <?php
                                        }
                                ?>
                            </div>
                            <div id="tamu" class="w-full">
                                <!-- <h5>Jumlah Tamu</h5> -->
                                
                                <?php
                                    if(isset($undangan->ivts_Name)){
                                ?>
                                <h5>Undangan berlaku untuk <?=$undangan->ivts_Guest?> Orang</h5>
                                

                                <?php
                                        }else{
                                    ?>
                                   
                               
                                <?php
                                        }
                                ?>
                            </div>
            
                            <div id="ucapan" class="w-full mt-4">
                                <h5>Doa & Ucapan</h5>
                                <textarea name="message" id="message" cols="40" rows="4" class="mt-2 w-full rounded-sm"></textarea>
                            </div>
                            <button type="submit" class="elementor-button elementor-size-md">
                            <div id="barcodeBtn" class="rounded-full py-2 px-8 mt-12 w-full text-center cursor-pointer" style="color:#F9F3E7; background-color: rgba(123, 79, 6, .5)">
                                Kirim
                            </div>
                            </button>
                        </div>
                        
                        <!-- <div id="tidakhadirBtn" class="rounded-full py-2 px-8 mt-12 w-full text-center cursor-pointer" style="display:none;color:#F9F3E7; background-color: rgba(123, 79, 6, .5)">
                            Kirim
                        </div> -->
                        <!-- <div id="tidakhadirForm" class="w-full mt-4 text-left flex flex-col items-center" style="display: none;">
                            <div class="w-full">
                                <h5>Tinggalkan Pesan</h5>
                                <textarea name="text" cols="40" rows="4" class="mt-2 w-full rounded-sm"></textarea>
                            </div>
                            <button type="submit" class="elementor-button elementor-size-md">
                            <div id="tidakhadirBtn" class="rounded-full py-2 px-8 mt-12 w-full text-center cursor-pointer" style="color:#F9F3E7; background-color: rgba(123, 79, 6, .5)" onclick="">
                                Kirim
                            </div>
                            
                        </div> -->
                        
                    </form>
            </div>
        </div>
        <div class="w-full lg:flex lg:justify-center lg:align-center overflow-scroll" style="height: 500px;position: relative;z-index: 1;">
            <div class="lg:w-3/6 lg:pt-24 flex justify-center items-center flex-col">
            <?php foreach($detail as $d){ ?>
                    <div class="w-10/12 my-4 flex items-start">
                        <div class="w-2/12 pt-1 pr-2">
                            <img src="pesan.png" width="31" alt="message icon">
                        </div>
                        <div class="SEGOEUI">
                            <div class="flex justify-between items-center">
                                <div class="text-sm cl-dark-cream">
                                    <h5><?php if($d['name'] != '' && $d['wishes'] != '') { echo $d['name']; } ?></h5>
                                    <!-- <h5 class="text-xs">5 jam yang lalu</h5> -->
                                </div>
                                <!-- <div class="rounded-full py-1 px-3 text-center text-white text-sm font-light" style="background-color: #7B4F06;">
                                    hadir
                                </div> -->
                            </div>
                            <div>
                                <p class="cl-dark-cream">
                                    <?php if($d['name'] != '' && $d['wishes'] != '') { echo $d['wishes']; } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
            </div>
        </div>
        <?php
                                    if(isset($undangan->ivts_Name)){
                                ?>
        <div class="my-16 flex flex-col justify-center items-center">
            <div class="SEGOEUI flex justify-center items-center flex-col js-scroll fade-in-bottom">
                <img src="facemask.svg" alt="mask icon">
                <h3 class="font-extrabold text-xl">HIMBAUAN</h3>
                <h3 class="text-xl">PROTOKOL KESEHATAN</h3>
                <p class="w-9/12 lg:w-3/6 lg:text-xl my-4">Kami menghimbau kepada bpk/ibu/sdra/i agar tidak melupakan protokol kesehatan sesuai dengan aturan pemerintah seperti di bawah ini:</p>
            </div>
            <div class="w-9/12 md:w-6/12 lg:w-4/12 js-scroll fade-in-bottom">
                <div class="my-3 flex justify-center items-start md:justify-start md:items-start SEGOEUI font-bold">
                    <h3 class="rounded-full w-6 h-6 px-2 pt-px mr-4 text-center text-sm" style="background-color: #FF5E6D;color: #F9F3E7;">1</h3>
                    <h3 class="text-base font-normal">Wajib menggunakan masker dan dilakukan pengecekan suhu.</h3>
                </div>
                <div class="my-3 flex justify-center items-start md:justify-start md:items-start SEGOEUI font-bold">
                    <h3 class="rounded-full w-6 h-6 px-2 pt-px mr-4 text-center text-sm" style="background-color: #FF5E6D;color: #F9F3E7;">2</h3>
                    <h3 class="text-base font-normal">Menunjukan QR Code yang diberikan sebagai pengganti buku tamu.</h3>
                </div>
                <div class="my-3 flex justify-center items-start md:justify-start md:items-start SEGOEUI font-bold">
                    <h3 class="rounded-full w-6 h-6 px-2 pt-px mr-4 text-center text-sm" style="background-color: #FF5E6D;color: #F9F3E7;">3</h3>
                    <h3 class="text-base font-normal">Melakukan Pembatasan jarak & Tidak saling berjabat tangan.</h3>
                </div>
                <div class="mt-8 flex justify-center items-center SEGOEUI font-bold">
                    <h3 class="text-base lg:text-xl text-center font-normal">Atas perhatiannya kami ucapkan, Terima kasih.</h3>
                </div>
            </div>
        </div>
        <?php
                                    }
                                ?>
        <div class="mt-16 mb-8 relative" style="height: 428px;">
            <img src="4.png" class="absolute halfcirc-img top-0 lg:hidden object-cover" style="" alt="">
            <img src="Foto4.png" class="absolute halfcirc-img top-0 hidden md:hidden lg:block object-cover" style="" alt="">
            <div class="pt-44 flex justify-center items-center flex-col js-scroll fade-in-bottom">
                <h5 class="SEGOEUI lg:text-xl font-bold" style="color:#FE8891;">Thank You</h5>
                <h1 class="text-3xl lg:text-5xl mt-2 lg:mt-6 Bestermind" style="color:#FE8891;">Anin & Alfan</h1>
            </div>
        </div>
        <div class="pb-20 md:pb-8 mx-auto text-center relative">
            <h5 class="text-xs font-bold SEGOEUI">made with ♥️ by</h5>
            <a href="https://instagram.com/dgsign.id_bukutamudigital?igshid=1ctl0cjcx34zk" target="_blank">
                <img src="DGSIGNID1.png" class="mx-auto" alt="DGSIGNID1">
            </a>
            <span class="text-xs SEGOEUI">Music by</span>
            <!-- <span class="text-xs font-bold SEGOEUI">Cendol Dawet - Didi Kempot</span> -->
            <span class="text-xs font-bold SEGOEUI">Boyce Avenue - Can You Feel The Love Tonight ft. Connie Talbo</span>
        </div>

            <!-- MODALS -->
        <div id="hadirModal" class="h-screen w-full text-center pt-8" style="display: none;background-color: #fafafa;z-index: 2;">
            <div id="closeHadir" class="close rounded-full w-6 h-6 mx-auto text-white text-center" style="background-color: #FF5E6D;">&times;</div>
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
            <div id="closeTidak" class="close rounded-full w-6 h-6 mx-auto text-white text-center" style="background-color: #FF5E6D;">&times;</div>
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
        <div id="barcodeModal" class="h-screen w-full text-center py-12 flex items-center flex-col relative overflow-scroll" style="display: none;background-color: #FCF8F0;z-index: 5;">
            <div id="closeBarcode" class="close rounded-full w-6 h-6 mx-auto text-white text-center" style="background-color: #FF5E6D;">&times;</div>
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
        <div id="tidakhadirModal" class="h-screen w-full py-12 text-center flex items-center flex-col relative overflow-scroll" style="display: none;background-color: #FCF8F0;z-index: 5;">
            <div id="closeTidakhadir" class="close rounded-full w-6 h-6 mx-auto text-white text-center" style="background-color: #FF5E6D;">&times;</div>
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
        <source src="beyonce.mpeg" type="audio/mpeg">
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

    <script>
        function openModal() {
        document.getElementById("myModal").style.display = "block";
        }
        
        function closeModal() {
        document.getElementById("myModal").style.display = "none";
        }
        
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
        var slides = document.getElementsByClassName("mySlides");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex-1].style.display = "block";
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
        <?php
                            if(isset($undangan->ivts_Name)){
                        ?>
        var countDownDate = new Date("Nov 2, 2021 18:00").getTime();
        <?php
                           }else{
                        ?>
var countDownDate = new Date("Nov 2, 2021 16:00").getTime();
<?php
                           }
                        ?>
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
                document.getElementById('telp').style.display = "block";
                document.getElementById('tamu').style.display = "block";
                document.getElementById('ucapan').style.display = "block";
                document.getElementById('hadirform').style.display = "block";
            }
            else { 
                document.getElementById('telp').style.display = "none";
                document.getElementById('tamu').style.display = "none";
                document.getElementById('ucapan').style.display = "block";
                document.getElementById('hadirform').style.display = "block";
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
    <!-- <script>
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
    </script> -->

    <!-- tidak hadir modal -->
    <!-- <script>
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
    </script> -->

</body>
</html>