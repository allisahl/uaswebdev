<?php
include('koneksi.php');

$id = $_GET['id'];
$sql = "SELECT * FROM film WHERE movie_id = '$id' ;";
$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="images/yas.ico" type="image/yas.png">
    <title>Nonton.com</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="" width="50" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=Romance">Romance<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=Action">Action</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=Drama">Drama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=Horror">Horror</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Find More
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="search.php?keyword=Musical">Musical</a>
                        <a class="dropdown-item" href="search.php?keyword=Animation">Animation</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="search.php?keyword=Fantasy">Fantasy</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <?php
    $no = 0;
    while ($data = mysqli_fetch_array($hasil)) {

    ?>
    <div class="container ">
        <br><br><br><br><br><br><br>
        <div class="row">
            <div class="col-lg-9 col-sm-12">
                <div class="kotak"></div>
                <h1><?php echo $data['title']; ?></h1>
                <span><?php echo $data['release_year']; ?></span> <br><br>
                <a href="" class="btn btn-secondary"><?php echo $data['genre']; ?></a>
                <p class="mt-3"><?php echo $data['synopsis']; ?></p>
                <div class="komentar mt-5">
                <h4>Give us your opinion!</h4>
                    <form action="proses.php" method="POST">
                        <input type="text" name="id" value="<?php echo $data['movie_id']; ?>" class="d-none">
                        <div class="form-group">
                            <label for="nama">Name</label>
                            <input type="text" class="form-control" name="nama" aria-describedby="emailHelp" placeholder="What's your name?" required>
                        </div>
                        <div class="form-group">
                            <label for="komentar">Comment</label>
                            <input type="text" class="form-control" name="komentar" placeholder="Your thoughts?" required>
                        </div>
                        <button type="submit" class="btn btn-danger my-3 ml-auto">Send</button>
                    </form>
                    <div class="detail-komentar">
                    <?php
                    $id = $data['movie_id'];
$komentar = "SELECT * FROM komentar WHERE movie_id = '$id' ;";
$hasil = mysqli_query($koneksi, $komentar);

while ($komen = mysqli_fetch_array($hasil)) {
?>
                        <div class="row mt-3">
                            <div class="col-2">
                                <div class="profile"></div>
                            </div>
                            <div class="col-10">
                                <h6><?=$komen['nama']?></h6>
                                <p><?=$komen['komentar']?></p>
                               <span class="badge badge-secondary"><?=$komen['tanggal']?></span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <h3>Recommendation</h3>
                <?php
$genre = $data['genre'];
$film = "SELECT * FROM film WHERE genre LIKE '%$genre%' LIMIT 5;";
$hasil = mysqli_query($koneksi, $film);


?>    <?php
$no = 0;
while ($rekom = mysqli_fetch_array($hasil)) {

?>
<a href="detail.php?id=<?php echo $rekom['movie_id']; ?>">
    <img src="<?php echo $rekom['image']; ?>" class="poster mt-3" alt="" srcset="">
</a>

<?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


</body>

</html>
