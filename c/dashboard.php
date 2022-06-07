<?php

if (!isset($_SESSION)) 
	{ 
	    session_start(); 
	} 

	require '../Files/config.php';
	require '../Files/temp.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<style type="text/css">
		body {
			background-color: #FAFAFA;
		}
		.circle-burgy {
			background: #800020;
			border-radius: 50%;
			width: 60px;
			height: 60px;
		}
		.circle-black {
			background: #2D3134;
			border-radius: 50%;
			width: 60px;
			height: 60px;
		}
		.circle-white {
			background: #f8f8ff;
			border-radius: 50%;
			border: 1px solid black;
			width: 60px;
			height: 60px;
		}
		.circle-green {
			background: #32CD32;
			border-radius: 50%;
			width: 60px;
			height: 60px;
		}
	</style>
</head>
<body>
	<script id="theNavbar" src="../Files/nav.js"></script>

	<div style="background-color: #fafafa;">
		<div class="h2 mx-5">Dapatkan Special Deal Pembelian Samsung S22 Ultra
		<br>Penawaran Terbatas</div>
	</div>

	<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../pics/satu.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../pics/dua.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../pics/tiga.webp" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

	<div class="container text-center my-5">
		<div class="h3">Warna Seri S22</div>
		<div class="row mt-5">
			<div class="col-2"></div>
			<div class="col-2">
				<div class="circle-burgy mx-auto mb-2"></div>
				Burgundy
			</div>
			<div class="col-2">
				<div class="circle-green mx-auto mb-2"></div>
				Phantom Black
			</div>
			<div class="col-2">
				<div class="circle-white mx-auto mb-2"></div>
				Phantom White
			</div>
			<div class="col-2">
				<div class="circle-black mx-auto mb-2"></div>
				Green
			</div>
			<div class="col-2"></div>
		</div>
	</div>

	<img src="../pics/zero.webp" class="d-block w-100" alt="...">

	<div class="container">
		<div class="h3 text-center my-5">Fitur Utama</div>
		<div class="row">
			<div class="col-6">
				<strong>Prosesor fabrikasi 4nm tercepat di Samsung Galaxy</strong>
				<p>Samsung S22 Ultra dibekali chip terbaru kami yang tercepat dan powerful saat ini. Perbandingan dengan S21 Ultra, CPU dan GPU di Samsung S22 Ultra adalah lompatan besar.</p>
			</div>
			<div class="col-6">
				<strong>Layar terang dengan VisionBooster</strong>
				<p>Display Dynamic AMOLED 2X di Samsung S22 Ultra tetap bisa dipandang dengan nyaman meski di bawah sinar matahari langsung, sehingga Anda dapat melihat semua konten dengan jelas kapan dan di mana saja.***</p>
			</div>
			<div class="col-6">
				<strong>Fast charging yang tahan seharian, bahkan lebih</strong>
				<p>Dengan baterai besar yang tahan seharian* dan dukungan super fast charging 45W**, Samsung S22 Ultra Anda mampu melewati seharian penuh, bahkan lebih.</p>
			</div>
			<div class="col-6">
				<strong>Foto malam makin epik dengan Nightography</strong>
				<p>Inovasi paling cemerlang dari kami. Sensor kamera menarik lebih banyak cahaya, Super Clear Glass mengurangi lens flare, dan diproses dengan AI yang nyaris instan.</p>
			</div>
			<div class="col-6">
				<strong>Smooth Video untuk rekaman bebas getaran</strong>
				<p>S22 Ultra dengan fitur Super Steady akan menjaga hasil rekaman bebas getaran, juga melacak banyak objek sebagai acuan stabilisasi. Juga, Super HDR hadir untuk menampilkan warna yang lebih kaya hingga 64x lipat.</p>
			</div>
			<div class="col-6">
				<strong>HP Galaxy S Series pertama dengan S Pen bawaan</strong>
				<p>Samsung S22 Ultra hadir dengan S Pen yang disematkan di bodi. Gunakan S Pen untuk menulis di aplikasi catatan, manfaatkan fitur Air Actions sebagai remote control HP S22 Ultra Anda.</p>
			</div>
			<div class="col-12 mt-3"><small>
				*Perkiraan terhadap profil penggunaan rata-rata/pengguna biasa. Dinilai secara independen oleh Strategy Analytics antara 2021.12.08–12.20 di AS dan Inggris dengan versi pra-rilis SM-S901, SM-S906, SM-S908 dalam pengaturan default menggunakan jaringan 5G Sub6 (TIDAK diuji di bawah jaringan 5G mmWave). Masa pakai baterai sebenarnya bervariasi menurut lingkungan jaringan, fitur dan aplikasi yang digunakan, frekuensi panggilan dan pesan, berapa kali pengisian daya, dan banyak faktor lainnya.
				**Kepala charger 45W dan kabel data dijual terpisah. Untuk fungsi super fast charging, kami merekomendasikan untuk menggunakan charger original Samsung 45W dan kabel data asli Samsung.
			</small></div>
		</div>
	</div>

	<div>
		
	</div>

</body>
</html>