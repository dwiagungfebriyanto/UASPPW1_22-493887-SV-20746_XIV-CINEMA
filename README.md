### Dwi Agung Febriyanto (22/493887/SV/20746)

# XIV CINEMA
Website digunakan untuk menampilkan daftar film yang sedang atau akan ditayangkan di bioskop. Setiap film memiliki detail yang berupa judul, durasi, tanggal rilis, sinopsis, rating, dan di teater mana film itu akan ditayangkan. Jadwal penayangan dan rating akan muncul ketika film tersebut sudah dirilis. Rincian di atas memenuhi kebutuhan klien yang menginginkan website untuk menampilkan daftar film beserta jam tayangnya untuk sebuah bioskop.

# 4 REQUIREMENTS DASAR
## Desain rapi mengikuti kaidah atau prinsip desain
#### Prinsip visibility pada navbar
> ![image](https://github.com/dwiagungfebriyanto/UASPPW1_22-493887-SV-20746_XIV-CINEMA/assets/126530985/2b5139b3-c900-4a71-b8ba-55d859e163e6)
>
> **Gambar 1.** Tampilan navbar ketika di scroll

Setiap pengguna melakukan scroll navbar yang semulanya transparan di Section 1 akan memiliki background. Hal tersebut menerapkan prinsip desain visibility yang membuat navbar akan selalu terlihat dan terbaca dengan jelas.
```css
.header-top {
    background-color: #00000000;
}

.header-scrolled {
    background-color: #334a52b1;
    backdrop-filter: blur(50px);
}
```
Potongan kode css di atas berfungsi untuk mengatur warna background navbar.
```javascript
var headerClicked = 0;

window.addEventListener('scroll', function() {
    var navbar = document.getElementById('header');
    if (window.scrollY > 0) {
        navbar.classList.add('header-scrolled', 'shadow');
    } else if (window.scrollY == 0 && !headerClicked % 2 == 1) {
        navbar.classList.remove('header-scrolled', 'shadow');
        navbar.classList.add('header-top', 'navbar-dark');
    }
});

function headerbg() {
    var navbar = document.getElementById('header');
    headerClicked ++;
    if (headerClicked % 2 == 1) {
        navbar.classList.add('header-scrolled', 'shadow');
    } else if (headerClicked % 2 == 0 && !window.scrollY > 0) {
        navbar.classList.remove('header-scrolled', 'shadow');
    }
}
```
Potongan kode javascript di atas akan mengatur kapan navbar akan memiliki background. Variabel ```headerClicked``` digunakan ketika navbar berada di posisi ```top: 0``` dan ketika navbar dalam kedaan collapsed. Ketik navbar di klik untuk meng-expand navbar akan menampilkan backgroundnya.

## Website responsive
Website dibuat menggunakan kombinasi dari Bootstrap dan media query yang digunakan untuk menyesuaikan beberapa elemen.

```css
@media (max-width: 768px) {
    .description {
        padding: 10px 10px 50px 10px;
    }
    .main-title {
        padding: 0 25px;
    }
    .main-description {
        padding: 10px;
    }
}
```
Media query di atas akan menyesuaikan padding dari judul film dan deskripsi di Section 1 dan padding deskripsi di Section 3 & 5. Media query akan dijalankan ketika lebar layar kurang dari 768px.

> ![image](https://github.com/dwiagungfebriyanto/UASPPW1_22-493887-SV-20746_XIV-CINEMA/assets/126530985/98e3089e-7f0a-4516-9c48-30975e25726a)
>
> **Gambar 1.**
> Penyesuaian padding di Section 1

> ![image](https://github.com/dwiagungfebriyanto/UASPPW1_22-493887-SV-20746_XIV-CINEMA/assets/126530985/eb3f7030-10a0-4c61-b15b-f1c9b84f5082)
>
> **Gambar 2.**
> Penyesuaian padding di deskripsi Section 3

```css
@media (max-width: 768px) {
    .detail {
        margin-top: 15vh;
    }
    .title-detail {
        font-size: 30px;
        text-align: center;
    }
    #produksi {
        text-align: center;
    }
    .detail-film {
        padding: 25px;
    }
    #coming-poster {
        padding: 15vh 25px;
        height: 100vh;
    }
}
```
Media query di atas akan menyesuaikan elemen yang berada di ```detail-film.php```, ketika lebar layar <= 768px maka ukuran font judul film akan berubah dan posisinya menjadi di tengah (semula di pinggir kiri). Produsen dari film juga akan berganti posisi menjadi di tengah. Untuk #coming-poster akan mengubah padding Section 4 di ```index.html```.

> ![image](https://github.com/dwiagungfebriyanto/UASPPW1_22-493887-SV-20746_XIV-CINEMA/assets/126530985/64f3ae20-c04e-43b3-8009-b647f58ad023)
> 
> **Gambar 3.**
> Penyesuaian tata letak judul dan nama produksi di ```detail-film.php```

```css
@media (max-width: 992px) {
    .text-position {
        text-align: start;
    }
}
```
Berbeda dengan media query yang lain, media query di atas akan mengubah bagian Quick links di ```footer``` menjadi rata kiri (sebelumnya rata kanan) ketika lebar layar kurang dari 992px.

> ![image](https://github.com/dwiagungfebriyanto/UASPPW1_22-493887-SV-20746_XIV-CINEMA/assets/126530985/a4e53277-44bb-46ea-8b8e-0f583571251a)
>
> **Gambar .** Penyesuaian posisi text di ```footer```

## Direct feedback ke pengguna website
Di Section 6 ```index.php```, pengguna website dapat mengisikan detail kontak dan pesan yang nantinya akan disimpan ke database. Pengguna akan mendapatkan feedback setelah mengirimkan data yang diisi ke form tersebut.
```php
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
```
Potongan kode di atas diambil dari ```insert.php``` yang akan otomatis terbuka ketika pengguna mengirimkan datanya. Feedback yang didapat bergantung pada apakah data berhasil dimasukkan atau tidak (tidak berhasil dimasukkan karena data yang sama sudah pernah dikirim).


## Konten dinamis dari database
#### Konten dinamis di ```index.php```
```php
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
```
Potongan kode di atas diambil dari Section 3, kode di atas akan menampilkan daftar film yang sudah dirilis dalam bentuk card. Untuk mengetahui film sudah dirilis atau belum, maka disertakan ```WHERE tanggal_rilis <= NOW()``` di sql. Fungsi ```NOW()``` akan mengembalikan tanggal sekarang, kemudian film-film yang memiliki tanggal rilis sebelum atau sama dengan hari sekarang akan ditampilkan. Dalam bagian ini, yang akan ditampilkan adalah poster, judul film, dan rating dari film tersebut. Ketika judul film di klik maka akan mencul detail dari film tersebut di ```detail-film.php```.
```php
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
```
Konten dinamis yang kedua dari ```index.php``` berada di Section 5, bagian ini akan menampilkan film-film yang belum dirilis, yang berarti memiliki tanggal lebih besar dari tanggal sekarang. Sehingga disertakan ```WHERE tanggal_rilis > NOW()``` di sql-nya. Dalam bagian ini, yang akan ditampilkan adalah poster, judul, dan tanggal rilis dari film tersebut.

#### Konten dinamis di ```detail-film.php```
```php
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
```
Potongan kode di atas akan menampilkan data dari film yang dipilih. Data yang ditampilkan diambil dari View ```view_detail_film``` yang dibuat di database. View tersebut menyimpan poster, judul, produksi, rating, genre, tanggal rilis, durasi, dan di teater mana film tersebut akan ditayangkan. Data disajikan dalam bentuk tabel.
```php
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
```
Potongan kode di atas akan menampilkan jadwal penayangan dari film yang dipilih. Data diambil dari View ```view_jadwal_film``` yang berisi tanggal dan jam (didapat dari waktu mulai di tabel ```waktu_tayang```). Setiap film dapat memiliki lebih dari satu jadwal penayangan, jadi data disajikan dalam bentuk tabel.

#### Konten dinamis di ```search-result.php```
```php
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
```
Potongan kode di atas akan menampilkan hasil pencarian dari keyword yang telah dimasukkan di search bar Section 2 ```index.php```. Pencarian dilakukan berdasarkan judul dan genre film. Kemudian film yang sesuai syarat akan dicek apakah film tersebut sudah dirilis atau belum. Pengecekan dilakukan dengan memeriksa rating dari film tersebut. Jika rating berisi '-' berarti film belum dirilis. Perbedaan antara film sudah dirilis atau belum terdapat pada data yang ditampilkan di ```card-footer```. Film yang sudah dirilis akan ditampilkan ratingnya, sebaliknya film yang belum dirilis akan ditampilkan tanggal rilisnya.

#### Konten dinamis di ```insert.php```
```php
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
```
Apakah insert dinamis?
