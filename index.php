<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XIV Cinema</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="shortcut icon" href="assets/img/logo/shortcut.png">
</head>
<body>

    <!-- Navbar -->
    <nav id="header" class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
              <img src="assets/img/logo/logo-light.png" height="50px">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="headerbg()">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="#now-playing" class="nav-link">Now playing</a>
                    <a href="#upcoming" class="nav-link">Upcoming</a>
                    <a href="#coming-poster" class="nav-link drop-down">What's coming</a>
                    <a href="#search" class="nav-link">Search</a>
                    <a href="#contact" class="nav-link">Contact us</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Section 1: Trailer Video -->
    <section class="video-container">
        <div class="container text-center position-absolute top-50 start-50 translate-middle">
            <h1 class="title main-title">The Boogeyman</h1>
            <p class="main-description">
                Kehadiran makhluk mengerikan yang mengintai di dalam bayangan akan menguji ketahanan seorang pria dalam menghadapi ketakutan terdalamnya. Akankah pria tersebut berhasil menghadapi ketakutannya?
            </p>
            <button class="main-btn" onclick="window.location.href = 'detail-film.php?id_film=F003'">Lihat lebih detail</button>
        </div>
        <video autoplay loop muted>
            <source src="assets/theboogeyman.mp4" type="video/mp4">
        </video>
    </section>
    
    <!-- Section 2: Search -->
    <section id="search" class="container-fluid reveal">
        <div class="container-fluid content">
            <h1 class="title reveal">What are you looking for?</h1>
            <p class="reveal" style="margin-bottom: 30px;">
                Cari berdasarkan judul atau genre, dan temukan pengalaman menonton yang sempurna di XIV Cinema
            </p>
            <form class="d-flex reveal" role="search" action="search-result.php" method="GET">
                <div class="input-group mb-3">
                    <input class="form-control" type="text" id="keyword" name="keyword" placeholder="Search film or genre" aria-label="Search box" aria-describedby="button-addon2">
                    <button class="btn btn-secondary z-0" id="button-addon2" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </section>

    <!-- Section 3: Now Palying Film List -->
    <section class="container-fluid film-list" id="now-playing">
        <div class="text-center">
            <h1 class="title reveal">Now Playing</h1>
            <p class="description reveal">Nikmati pengalaman menonton film terbaru yang tak terlupakan. Dengan koleksi film terkini dari berbagai genre, Anda akan menemukan hiburan yang sesuai dengan selera Anda.</p>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-space-between">
            <?php
                include 'koneksi.php';
                $film = mysqli_query($conn, "SELECT * FROM film WHERE tanggal_rilis <= NOW()");
                foreach ($film as $value) {
                    echo '
                        <div class="col">
                            <div class="card h-100 text-center text-dark card-bg reveal">
                                <img class="poster" src="data:image/jpeg;base64,' . base64_encode($value['POSTER']) .'" height="fit-content">
                                <div class="card-body">
                                    <h5 class="card-title"><a id="'.$value["ID_FILM"].'" href="detail-film.php?id_film='.$value["ID_FILM"].'" class="text-decoration-none film-title">'.$value["JUDUL_FILM"].'</a></h5>
                                </div>
                                <div class="card-footer">
                                    <p class="card-text"><b>'.$value["RATING"].'</b></p>
                                </div>
                            </div>
                        </div>';
                }
            ?>
        </div>
    </section>

    <!-- Section 4: What's coming -->
    <section id="coming-poster" class="container-fluid reveal">
        <div class="container-fluid content">
            <h1 class="title reveal">What's coming?</h1>  
            <p class="reveal" style="margin-bottom: 30px;">
                Petualangan menjelajahi dunia yang menegangkan bersama para Autobots dan Transformers untuk menyelamatkan bumi dari ancaman besar Unicron. Tayang mulai 30 Juni 2023, "Transformers: Rise of the Beasts" mengajakmu berpetualang bersama!
            </p>
            <button class="btn btn-secondary reveal" onclick="window.location.href = 'detail-film.php?id_film=F006'">Lihat lebih detail</button>
        </div>
    </section>

    <!-- Section 5: Upcoming Film List -->
    <section class="container-fluid film-list" id="upcoming">
        <div class="text-center">
            <h1 class="title reveal">Upcoming</h1>
            <p class="description reveal">Jelajahi film-film terbaru yang akan segera tayang. Nikmati pengalaman sinematik yang menakjubkan dengan kisah-kisah penuh aksi, drama, dan petualangan yang memikat.</p>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-space-between">
            <?php
                include 'koneksi.php';
                $film = mysqli_query($conn, "SELECT * FROM film WHERE tanggal_rilis > NOW()");
                foreach ($film as $value) {
                    echo '
                        <div class="col">
                            <div class="card h-100 text-center text-dark card-bg reveal">
                                <img class="poster" src="data:image/jpeg;base64,' . base64_encode($value['POSTER']) .'" height="fit-content">
                                <div class="card-body">
                                    <h5 class="card-title"><a id="'.$value["ID_FILM"].'" href="detail-film.php?id_film='.$value["ID_FILM"].'" class="text-decoration-none film-title">'.$value["JUDUL_FILM"].'</a></h5>
                                </div>
                                <div class="card-footer">
                                    <p class="card-text">'.$value["TANGGAL_RILIS"].'</p>
                                </div>
                            </div>
                        </div>';
                }
            ?>
        </div>
    </section>

    <!-- Section 6: Contact -->
    <section id="contact" class="contact reveal">
        <h1 class="contact-title text-center reveal">GET IN TOUCH</h1>
        <div class="contact-content reveal">
            <div class="row">
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60483268.673821345!2d36.19090419999994!3d22.292919299999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34040161f4460bb1%3A0xac9661f39722a25!2sOcean%20One!5e0!3m2!1sen!2sid!4v1683293503773!5m2!1sen!2sid" width="100%" height="390" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6">
                    <form action="insert.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Full name</label>
                            <input type="name" name="name" class="form-control" placeholder="Your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control"  placeholder="eg.example@ex.com" required>
                            <div id="emailHelp" class="form-text text-white-50">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Message</label>
                            <textarea name="message" rows="4" cols="50" id="message" class="form-control" placeholder="Tell us your thought" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary w-100"><i class="fas fa-paper-plane"></i>&nbsp; Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="w-100 py-4 flex-shrink-0">
        <div class="container-fluid py-4">
            <div class="row gy-4 gx-5">
                <div class="col-lg-4 col-md-6">
                    <img src="assets/img/logo/logo-text.png" height="70px">
                    <p class="small text-white-50">Discover a world of cinematic excellence at XIV Cinema, where every visit is a remarkable movie-going adventure.</p>
                    <p class="small text-white-50 mb-0">&copy; 2023 XIV Cinema. All rights reserved.</p>
                </div>
                <div class="col-lg-4 col-md-6"></div>
                <div class="col-lg-2 col-md-6 text-position">
                    <h5 class="text-white mb-3">Quick links</h5>
                    <ul class="list-unstyled text-white-50">
                        <li><a href="#">Home</a></li>
                        <li><a href="#now-playing">Now playing</a></li>
                        <li><a href="#upcoming">Upcoming</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 text-position">
                    <h5 class="text-white mb-3">Quick links</h5>
                    <ul class="list-unstyled text-white-50">
                        <li><a href="#coming-poster">What's coming</a></li>
                        <li><a href="#search">Search</a></li>
                        <li><a href="#contact">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/bioskop.js"></script>

</body>
</html>