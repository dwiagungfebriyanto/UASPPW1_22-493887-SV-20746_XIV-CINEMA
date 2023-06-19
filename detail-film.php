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

    <!-- Film Detail -->
    <section class="container detail">
        <div class="row">
            <?php
                include 'koneksi.php';
                $id_film = $_GET['id_film'];
                $result = mysqli_query($conn, "SELECT * FROM view_detail_film WHERE ID_FILM = '$id_film'");
                $film = $result->fetch_assoc();
                echo '
                    <div class="col-md-5 text-center">
                        <img src="data:image/jpeg;base64,' . base64_encode($film['POSTER']) .'" class="rounded" width="70%">
                    </div>
                    <div class="col-md-6 detail-film">
                        <h3 class="title-detail">'.$film['JUDUL_FILM'].'</h3>
                        <p id="produksi" class="text-white-50">'.$film['NAMA_PRODUKSI'].'</p>
                        <table class="mytable">
                            <tbody>
                                <tr>
                                    <th>Rating</th>
                                    <td>'.$film['RATING'].'</td>
                                </tr>
                                <tr>
                                    <th>Genre</th>
                                    <td>'.$film['GENRE'].'</td>
                                </tr>
                                <tr>
                                    <th>Tanggal rilis</th>
                                    <td>'.$film['TANGGAL_RILIS'].'</td>
                                </tr>
                                <tr>
                                    <th>Durasi</th>
                                    <td>'.$film['DURASI'].' menit</td>
                                </tr>
                                <tr>
                                    <th>Ditayangkan di</th>
                                    <td>'.$film['NAMA_TEATER'].'</td>
                                </tr>
                            </tbody>
                        </table>
                        <h4 class="sub-title">Sinopsis</h4>
                        <p id="sinopsis" class="truncate" style="text-align: justify; margin-bottom: 0;">'.$film['SINOPSIS'].'</p>
                        <button id="more-btn" onclick="toggleText()">See more...</button>';
            ?>
                        <h4 class="sub-title">Jadwal Penayangan</h4>
                        <table class="mytable">
                            <tr>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                            </tr>
                            <?php
                                include 'koneksi.php';
                                $id_film = $_GET['id_film'];
                                $result = mysqli_query($conn, "SELECT * FROM view_jadwal_film WHERE ID_FILM = '$id_film'");
                                foreach ($result as $tayang) {
                                    echo '
                                        <tr>
                                            <td>'.$tayang['tanggal'].'</td>
                                            <td>'.$tayang['jam'].'</td>
                                        </tr>';
                                }
                            ?>
                        </table>
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