<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_finansas";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel bainaka
// Query untuk mengambil data dari tabel bainaka dengan JOIN ke tabel kompania, municipiu, dan tipo
$sql = "SELECT b.*, k.naran_kompania, m.naran_muncipiu, t.naran_tipu
        FROM bainaka b
        LEFT JOIN kompania k ON b.id_kompania = k.id_kompania
        LEFT JOIN municipiu m ON b.id_municipiu = m.id_municipiu
        LEFT JOIN tipo t ON b.id_tipo = t.id_tipo";
$result = $conn->query($sql);

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin Console</title>
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" >
<link href="css/font-awesome.min.css" rel="stylesheet" >
<link href="css/style.css" rel="stylesheet">
<link href="css/nav.css" rel="stylesheet">
<link href="css/global.css" rel="stylesheet">
<link href="css/ecommerce.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<style>
    @media print {
        body {
            width: 210mm; /* Lebar halaman A4 */
            height: 297mm; /* Tinggi halaman A4 */
            margin: 0; /* Hilangkan margin default */
        }

        .invoice_2 {
            width: 100%; /* Lebar elemen sesuai dengan halaman A4 */
            padding: 20px 8px;
            box-sizing: border-box;
        }

        .invoice_2il {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .invoice_2il img {
            max-width: 45%; /* Sesuaikan lebar maksimal gambar */
            height: auto;
            float: left; /* Untuk gambar pertama (kiri) */
        }

        img.img {
            width: 110px;
        }

        .invoice_2il img:last-child {
            float: right; /* Untuk gambar kedua (kanan) */
        }

        strong {
            background: rgb(195, 156, 34);
            background: linear-gradient(
                0deg,
                rgba(195, 156, 34, 0.40556732947085083) 0%,
                rgba(253, 187, 45, 0.43357853395264356) 100%
            );
            padding: 4px;
        }

        .invoice_2i2 {
            padding-top: 20px;
        }

        .table {
            width: 100%; /* Lebar tabel sesuai dengan halaman A4 */
            margin-bottom: 20px; /* Spasi antara tabel dan konten berikutnya */
        }
    }
</style>

   
</head>
  <body>
  <?php include 'includes/header.php'?> 
<?php include 'includes/sidebar.php'?>
    <main class="col-md-9 ms-sm-auto common col-lg-10 px-md-4">
      
	   <div class="row invoice_1 bg-white m-0" style="padding:20px 8px; border-radius:5px; box-shadow: 0px 0px 8px 1px #d8e2ef; border:1px solid #d8e2ef;">
	     <div class="col-lg-3 col-md-12">
		  <div class="invoice_1l">
		   <h5 class="mb-0">RELATORIO GERAL </h5>
		  </div>
		 </div>
		 <div class="col-lg-9 col-md-12">
		  <div class="invoice_1r" style="text-align:right;">
		   <ul class="mb-0" style="margin-top:2px;">
<!-- Tambahkan tombol "Download" -->
<li class="d-inline-block"><a class="button_new bold" href="download.php"><i style="vertical-align:middle; margin-right:2px;" class="fa fa-arrow-down"></i> Download (.word)</a></li>
<!-- Tambahkan tombol "Print" -->
<li class="d-inline-block"><a class="button_new bold" href="#" id="printButton"><i style="vertical-align:middle; margin-right:2px;" class="print"></i> Print</a></li>
<!-- REMATA BUTTON PRINT  -->
		   </ul>
		  </div>
		 </div>
	   </div>
	   
	   <div class="row invoice_2 bg-white m-0 mt-3" style="padding:20px 8px; border-radius:5px 5px 0px 0px; box-shadow: 0px 0px 8px 1px #d8e2ef;">
	     <div class="invoice_2i row m-0">
		  <div class="col-md-12">
		<!-- INFIRMASAUN PRINT DADUS  -->
		  <script>
document.getElementById("printButton").addEventListener("click", function() {
    // Semua kode di bawah akan dijalankan saat tombol "Print" diklik
    var printContents = document.querySelector('.invoice_2').innerHTML; // Mengambil konten yang ingin dicetak
    var originalContents = document.body.innerHTML; // Simpan konten asli halaman
    
    // Mengganti konten halaman dengan konten yang ingin dicetak
    document.body.innerHTML = printContents;
    
    // Melakukan pencetakan
    window.print();
    
    // Mengembalikan konten halaman ke kondisi semula
    document.body.innerHTML = originalContents;
});
</script>

<!-- REMATA INFORMASAUN PRINT DADUS  -->

		  <style>
    .invoice_2il {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
  
    .invoice_2il img {
      max-width: 45%; /* Sesuaikan lebar maksimal gambar */
      height: auto;
      float: left; /* Untuk gambar pertama (kiri) */
    }
  img.img{
	width: 110px;
  }
    .invoice_2il img:last-child {
      float: right; /* Untuk gambar kedua (kanan) */
    }

	strong{
		background: rgb(195,156,34);
background: linear-gradient(0deg, rgba(195,156,34,0.40556732947085083) 0%, rgba(253,187,45,0.43357853395264356) 100%);
padding: 4px;
	}
  </style>
  
  <div class="invoice_2il">
    <img class="img" src="img/logo1.webp" alt="">
    <center>
      <b>AUTORIDADE TRIBUNAL <br>
      Reparticao Tribunal do Municipio Baucau, Manatutu, Lautem e Viqueque <br>
     	 Rua-Vila Nova Baucau. Telemovel ; 4130011/77305823 <br> <br>
		 <strong>"Seja um Bom Cidadao, Seja um novo heroi para a nosa Nacao"</strong> </b>

    </center>
    <img class="img" src="img/logo1.webp" alt="">
  </div>

  <hr class="border border-dark border-2 opacity-59">
  
		  </div>
		  
		  </div> 
<!-- koko    -->
<div class="invoice_2i2 row m-0" style=" padding-top:20px;"> <br><br>
		   <div class="table-responsive order_dn2i">
			<table class="table table-borderless align-middle">
			<thead>
			<tr class="bg-dark text-white">
			<th scope="col"> ID BAINAKA </th>
			<th scope="col">NARAN BAINAKA</th>
			<th scope="col">IMAGEN</th>
			<th scope="col">SEXO</th>
			<th scope="col">DATA REJISTU</th>
			<th scope="col">NO-HP</th>
			<th scope="col">MUNICIPIU</th>
			<th scope="col">KOMPANIA</th>
			<th scope="col">TIPU REJISTU</th>
			</tr>
			</thead>
			<tbody>
			<tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_bainaka"] . "</td>";
            echo "<td>" . $row["naran_bainaka"] . "</td>";
            echo "<td>" . $row["imagen_baikana"] . "</td>";
            echo "<td>" . $row["sexo"] . "</td>";
            echo "<td>" . $row["data_rejistu"] . "</td>";
            echo "<td>" . $row["no_hp"] . "</td>";
            echo "<td>" . $row["naran_muncipiu"] . "</td>";
            echo "<td>" . $row["naran_kompania"] . "</td>";
            echo "<td>" . $row["naran_tipu"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "Tidak ada data.";
    }
    $conn->close();
    ?>





    </tbody>
</table>
			</tbody>
			</table>
			<br>  <br>  <br>

			<center>Director RT/Official RT-AT</center> <br> <br>
			<center>(............................................)</center> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br>
		  </div>
		
		
<!-- koko  -->
		
		
		
		   
	   
	   
	   

	   
    </main>
  
</div>


<script src="js/bootstrap.bundle.min.js" ></script>

</script><script src="js/global.js"></script>


</body></html>