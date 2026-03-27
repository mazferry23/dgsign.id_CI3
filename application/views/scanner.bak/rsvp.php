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
	</head>
	<body>
        <canvas id="canvas"></canvas>
		<main>
            <header id="overlay">
                <div class="container">
                    <div class="logo-center">
                        <a href="" class="d-block"><img src="assets/images/logo-w.png" class="logo" alt=""></a>
                    </div>
                </div>
            </header>
            <section class="fixed-content-rsvp">
                <section class="rsvp">
                    <div class="container">
                        <h2>Assalamualaikum,</h2>
                        <h1>H. Ganjar Pranowo, S.H., M.I.P</h1>
                        <h3>Gubernur Jawa Tengah</h3>
                        <div class="mid-info">
                            <p>Kami, turut mengundang Bapak/Ibu/Saudara/i</p>
                            <p>dalam acara pernikahan</p>
                            <div class="name">
                                <h1>Dina Marina</h1>
                                <h4>Putri Bpk Junaidi Bahar & Ibu Annisa Bahar</h4>
                            </div>
                            <div class="and">&</div>
                            <div class="name">
                                <h1>Doniawan Setya</h1>
                                <h4>Putra Bpk Saitama Andrew & Ibu Suratni Hasyim</h4>
                            </div>
                        </div>
                        <!-- <div class="mid-info-2">
                            <div class="row">
                                <div class="col-6">
                                    <h2>Akad Nikah</h2>
                                    <p>08.00 - 10.00 WIB</p>
                                    <p>Sabtu, 28 November 2020</p>
                                    <p>Masjid Agung, Jawa Tengah - Semarang</p>
                                </div>
                                <div class="col-6">
                                    <h2>Resepsi</h2>
                                    <p>11.00 - 13.00 WIB</p>
                                    <p>Sabtu, 28 November 2020</p>
                                    <p>Masjid Agung, Jawa Tengah - Semarang</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </section>
            </section>
            <!-- <section class="swipe-container-multiple">
                <div class="swipe-trigger"><i class="fas fa-landmark"></i> Acara</div>
                <div class="swipe-content">
                    <section class="confirm">
                        <div class="container">
                            <p>Mohon lakukan konfirmasi kehadiran dengan memilih opsi dibawah ini</p>
                            <select class="custom-select" id="confirm-select">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="ya">Ya, Hadir</option>
                                <option value="tidak">Maaf, Belum bisa hadir</option>
                                <option value="ragu">Masih ragu ragu</option>
                            </select>
                            <form action="" class="attandance-fill">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-5 d-flex align-items-center">
                                            <label class="d-block m-0">Nomor Whatsapp</label>
                                        </div>
                                        <div class="col-7">
                                            <input type="text" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-5 d-flex align-items-center">
                                            <label class="d-block m-0">Jumlah Tamu</label>
                                        </div>
                                        <div class="col-7">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-custom" type="button" id="button-addon2"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <input type="text" class="form-control form-control-custom-group" placeholder="" id="input-addon1" value="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-custom" type="button" id="button-addon1"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small>* Anda Termasuk Jumlah Tamu</small>
                                </div>
                            </form>
                        </div>
                    </section>
                    <footer>
                        <div class="container">
                            <a href=""><img src="assets/images/logo.png" class="logo" alt=""></a>
                        </div>
                    </footer>
                </div>
            </section> -->
            <div class="accordion-container">
                <div class="accordion" id="accordionRsvp">
                    <div class="card">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseOne"><i class="fas fa-landmark"></i> Acara</div>
                        <div id="collapseOne" class="collapse" data-parent="#accordionRsvp">
                            <div class="card-body">
                                <h1 class="title">Akad Nikah</h1>
                                <p>Tanggal : Sabtu, 28 November 2020</p>
                                <p>Jam : 08.00 - 10.00 WIB</p>
                                <p class="mb-3">Tempat : Masjid Agung, Semarang - Jawa Tengah</p>
                                <h1 class="title">Resepsi</h1>
                                <p>Tanggal : Minggu, 29 November 2020</p>
                                <p>Jam : 10.00 - Selesai WIB</p>
                                <p class="mb-3">Tempat : Hotel Ungaran Cantik, Ungaran - Jawa Tengah</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseTwo"><i class="fas fa-map-marker"></i> Lokasi</div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordionRsvp">
                            <div class="card-body">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1176.957254535107!2d110.4082903682875!3d-7.149508578574372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708610aa67273f%3A0xca85804c5c51c35!2sHotel%20Ungaran%20Cantik!5e0!3m2!1sid!2sid!4v1594378257861!5m2!1sid!2sid" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseThree"><i class="fas fa-marker"></i> Konfirmasi</div>
                        <div id="collapseThree" class="collapse" data-parent="#accordionRsvp">
                            <div class="card-body">
                                <section class="confirm">
                                    <p class="text-center mb-4">Mohon lakukan konfirmasi kehadiran <br> dengan memilih opsi dibawah ini</p>
                                    <select class="custom-select" id="confirm-select">
                                        <option value="">-- Silahkan Pilih --</option>
                                        <option value="ya">Ya, Hadir</option>
                                        <option value="tidak">Maaf, Belum bisa hadir</option>
                                        <option value="ragu">Masih ragu ragu</option>
                                    </select>
                                    <form action="" class="attandance-fill">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-5 d-flex align-items-center">
                                                    <label class="d-block m-0">Nomor Whatsapp</label>
                                                </div>
                                                <div class="col-7">
                                                    <input type="text" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-5 d-flex align-items-center">
                                                    <label class="d-block m-0">Jumlah Tamu</label>
                                                </div>
                                                <div class="col-7">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-custom" type="button" id="button-addon2"><i class="fas fa-minus"></i></button>
                                                        </div>
                                                        <input type="text" class="form-control form-control-custom-group" placeholder="" id="input-addon1" value="0">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-custom" type="button" id="button-addon1"><i class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <small>* Anda Termasuk Jumlah Tamu</small>
                                        </div>
                                        <div class="btn-container">
                                            <button class="btn btn-sm btn-submit"><i class="fas fa-paper-plane"></i> Submit</button>
                                        </div>
                                    </form>
                                </section>
                                <footer>
                                    <div class="container">
                                        <a href=""><img src="assets/images/logo.png" class="logo" alt=""></a>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</main>
		<script src="assets/js/frontend/vendor.js"></script>
		
		<script src="assets/js/frontend/plugins.js"></script>
		
		<script src="assets/js/frontend/main.js"></script>

        <script>
            $(document).ready(function(){
                var attandanceFill = $('.attandance-fill');
                attandanceFill.hide();
                $('#confirm-select').change(function(){
                    var val = $(this).val();
                    if (val == 'ya') {
                        attandanceFill.show();
                    }else{
                        attandanceFill.hide();
                    }
                });
            })
        </script>
	</body>
</html>
