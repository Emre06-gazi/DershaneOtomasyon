<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Emre Eğitim Kurumları</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
</head>
<body class="body-home">
	<a id="button" href="#"></a>
    <div class="main-container">
		<div class="black-fill"><br /> <br />
			<div class="container">
			<nav class="navbar navbar-expand-lg bg-light"
				id="homeNav">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="logo.png" width="60">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="" id=anasayfa>Anasayfa</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#about">Hakkımızda</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#contact">İletişim</a>
					</li>
				</ul>
				<ul class="navbar-nav me-right mb-2 mb-lg-0">
					<li class="nav-item">
					<a class="nav-link" href="login.php">Giriş</a>
					</li>
				</ul>
			</div>
				</div>
			</nav>
			<section class="welcome-text d-flex justify-content-center align-items-center flex-column">
				<img src="logo.png" width="1000">
				<h4>Emre Eğitim Kurumları</h4>
			</section>
			<section id="about"
					class="d-flex justify-content-center align-items-center flex-column">
				<div class="card mb-3 card-1">
				<div class="row g-0">
					<div class="col-md-4">
					<img src="logo.png" class="img-fluid rounded-start" >
					</div>
					<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title">Hakkımızda</h5>
						<p class="card-text">20 yılı aşkın süredir eğitim ve öğretime katkı sağlayan dershanemiz, sizede katkı sağlamaktan onur duyacaktır.</p>
					</div>
					</div>
				</div>
				</div>
			</section>
			<section id="contact"
					class="d-flex justify-content-center align-items-center flex-column">
				<form>
					<h3>İletişim</h3>
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Email adres</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<div id="emailHelp" class="form-text">E-postanızı kimseyle paylaşmayacağız.</div>
				</div>
				<div class="mb-3">
					<label class="form-label">İsim</label>
					<input type="text" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Mesaj</label>
					<textarea class="form-control" rows="4"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Gönder</button>
				</form>
			</section>
			<div class="text-center text-light">
				Copyright &copy; 2022 Emre Eğitim Kurumları. Tüm hakkı saklıdır.
				<br /> <br />
			</div>

			</div>
		</div>
	</div>	
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>