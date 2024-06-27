<?php
include 'config.php';

$sql = "SELECT w.id_wisata, w.nama_wisata, w.lokasi_wisata, w.gambar_wisata, h_dewasa.harga as harga_dewasa 
        FROM wisata w
        LEFT JOIN harga_tiket h_dewasa ON w.id_wisata = h_dewasa.id_wisata AND h_dewasa.jenis = 'Dewasa'";
$result = mysqli_query($conn, $sql);
?>

<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="card m-2" style="width: 18rem;">
        <?php 
        if (!empty($row['gambar_wisata'])) {
            $base64_image = base64_encode($row['gambar_wisata']);
            echo "<img class='img img-2 pt-2 d-flex justify-content-center align-items-center' src='data:image/jpeg;base64,$base64_image' width=260px height=200px>";
        } else {
            echo "Tidak ada gambar";
        }
        ?>
        <div class="text p-3">
            <h3><?php echo $row['nama_wisata']; ?></h3>
            <p class="text-success font-weight-bold" id="" style="margin-right:40px; font-weight:bolder;">Rp<?php echo $row['harga_dewasa']; ?></p>
            <p>📍<span><?php echo $row['lokasi_wisata']; ?></span></p>
            <hr>
            <div class="d-flex flex-row w-auto">
                <a href="detailwisata.php?id=<?php echo $row['id_wisata']; ?>" class="m-2 btn btn-success" style="width: 200px;">Detail</a>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</body>

</html>