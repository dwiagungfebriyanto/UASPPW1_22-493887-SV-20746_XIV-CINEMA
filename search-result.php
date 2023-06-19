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
            <a href="index.php" class="navbar-brand">
              <img src="assets/img/logo/logo-light.png" height="50px">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="headerbg()">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="index.php#now-playing" class="nav-link">Now playing</a>
                    <a href="index.php#upcoming" class="nav-link">Upcoming</a>
                    <a href="index.php#coming-poster" class="nav-link">What's coming</a>
                    <a href="index.php#search" class="nav-link">Search</a>
                    <a href="index.php#contact" class="nav-link">Contact us</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Search result -->
    <section class="container-fluid film-list">
        <h1 class="title text-center">Search result</h1>
        <h4 class="sub-title">Berdasarkan judul</h4><hr>
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-space-between">
            <?php
                include 'koneksi.php';
                $keyword = $_GET['keyword'];
                $judul = mysqli_query($conn, "SELECT * FROM view_detail_film WHERE LOWER(JUDUL_FILM) LIKE LOWER('%$keyword%')");
                $genre = mysqli_query($conn, "SELECT * FROM view_detail_film WHERE LOWER(GENRE) LIKE LOWER('%$keyword%')");
                foreach ($judul as $value) {
                    if ($value['RATING'] != "-") {
                        echo '
                            <div class="col">
                                <div class="card h-100 text-center text-dark card-bg">
                                    <img class="poster" src="data:image/jpeg;base64,' . base64_encode($value['POSTER']) .'" height="fit-content">
                                    <div class="card-body">
                                        <h5 class="card-title"><a id="'.$value["ID_FILM"].'" href="detail-film.php?id_film='.$value["ID_FILM"].'" class="text-decoration-none film-title">'.$value["JUDUL_FILM"].'</a></h5>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text">'.$value["RATING"].'</p>
                                    </div>
                                </div>
                            </div>';
                    } else {
                        echo '
                            <div class="col">
                                <div class="card h-100 text-center text-dark card-bg">
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
                }
                echo '
                    </div>
                    <h4 class="sub-title">Berdasarkan genre</h4><hr>
                    <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-space-between">';
                foreach ($genre as $value) {
                    if ($value['RATING'] != "-") {
                        echo '
                            <div class="col">
                                <div class="card h-100 text-center text-dark card-bg">
                                    <img class="poster" src="data:image/jpeg;base64,' . base64_encode($value['POSTER']) .'" height="fit-content">
                                    <div class="card-body">
                                        <h5 class="card-title"><a id="'.$value["ID_FILM"].'" href="detail-film.php?id_film='.$value["ID_FILM"].'" class="text-decoration-none film-title">'.$value["JUDUL_FILM"].'</a></h5>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text">'.$value["RATING"].'</p>
                                    </div>
                                </div>
                            </div>';
                    } else {
                        echo '
                            <div class="col">
                                <div class="card h-100 text-center text-dark card-bg">
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
                }
            ?>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php#now-playing">Now playing</a></li>
                        <li><a href="index.php#upcoming">Upcoming</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 text-position">
                    <h5 class="text-white mb-3">Quick links</h5>
                    <ul class="list-unstyled text-white-50">
                        <li><a href="index.php#coming-poster">What's coming</a></li>
                        <li><a href="index.php#search">Search</a></li>
                        <li><a href="index.php#contact">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/bioskop.js"></script>
</body>
</html>