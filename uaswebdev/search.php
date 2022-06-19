<?php
include('koneksi.php');

$keyword = $_GET['keyword'];
if ($_GET['keyword']=='search') {
    $sql = "SELECT * FROM 'film' WHERE `release_year` = 'release_year'  ;";
}else{
    $sql = "SELECT * FROM `film` WHERE genre LIKE '%$keyword%' OR `release_year` = '$keyword' = '$keyword' OR title LIKE '%$keyword%' OR `cast` LIKE '%$keyword%'   ;";
}

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
                    <a class="nav-link" href="search.php?keyword=Action">Action<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=Drama">Drama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=Horror">Horror</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=Romance">Romance</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Find more
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="search.php?keyword=action">Action</a>
                        <a class="dropdown-item" href="search.php?keyword=crime">Crime</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="search.php?keyword=romance">Romance</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>


    <div class="container ">
        <br><br><br><br><br><br><br>
        <h3>Search result : <span class="badge badge-danger"><?=$_GET['keyword']?></span> <br>
        <?php
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {

            ?>
            <div class="row mt-3 movie">
                <div class="col-lg-2">
                    <img src="<?=$data['image'];?>" class="poster" alt="" srcset="">
                </div>
                <div class="col-lg-10">
                    <h1><?=$data['title'];?></h1>
                    <span class="mt-3 badge badge-danger"><?php echo $data['genre']; ?></span>
                    </h6>
                </div>
            </div>
            <?php }?>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


</body>

</html>
