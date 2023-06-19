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

    <!-- Insert data -->
    <section class="confirm">
        <div id="box" class="container text-center position-absolute top-50 start-50 translate-middle">
            <!-- <img src="assets/img/logo/logo-light.png" height="80px"> -->
            <?php
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                include 'koneksi.php';

                try {
                    $sql = "INSERT INTO contact (email, name, message) VALUES ('$email', '$name', '$message')";
                    if ($conn->query($sql) === TRUE) {
                        echo '
                            <h1 class="title-detail">Data saved!</h1>
                            <p class="message"">
                                Hai, '.$name.'! Terima kasih telah menghubungi kami! Kami sangat menghargai antusiasme Anda untuk berhubungan dengan kami. 
                            </p>';
                    }
                } catch (exception $e) {
                    echo '
                        <h1 class="title-detail">Sorry, there was an error!</h1>
                        <p class="message">
                            Terjadi kesalahan saat memasukkan data. Harap coba kembali dan periksa apakah sudah pernah mengirim pesan yang sama! 
                        </p>';
                }
            ?>
            <button class="btn btn-secondary" onclick="window.location.href='index.php'">Kembali ke halaman awal</button>
        </div>
        <p class="fixed-bottom text-center text-white-50">&copy; 2023 XIV Cinema. All rights reserved.</p>
    </section>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/bioskop.js"></script>
    <script>
        disableRefresh();
    </script>
</body>
</html>