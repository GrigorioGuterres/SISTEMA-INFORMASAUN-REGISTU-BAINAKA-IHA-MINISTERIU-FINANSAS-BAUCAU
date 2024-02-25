<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<title>Admin Console</title>
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/nav.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/dashboard.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="js/codebase/dhtmlxcalendar.css" />
	<script src="js/codebase/dhtmlxcalendar.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="select2/css/select2-medium.css">


	<script>
		var myCalendar;
		function doOnLoad() {
			myCalendar = new dhtmlXCalendarObject(["cal_1", "cal_2", "cal_3"]);
		}
	</script>
	<script src="js/chart.min.js"></script>
	<link href="css/table.css" rel="stylesheet">

</head>

<body onLoad="doOnLoad();">

	<?php include"includes/header.php" ?>


	<div class="container-fluid">
		<div class="row">
			<?php include"includes/sidebar.php" ?>

			<main class="col-12 ms-sm-auto common col-lg-10 px-md-4">
				
				<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light-lighten p-2">
        <li class="breadcrumb-item"><a href="#"><i style="margin-right:5px;" class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
</nav>

	<div class="card">
		<div class="card-header text-center bg-primary"><h4>LISTA DADUS BAINAKA</h4></div>
		<div class="card-body">
			<div class="row">

<div class="col-12">
	<div class="card">
			<div class="card-header"><h4>LISTA DADUS BAINAKA </h4></div>
		<!--infprmsaun modal-->
		<!-- Button trigger modal -->
	<h4><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-circle-fill m-2"></i>
  AUMENTA DADUS
</button>
</h4>
<!-- JavaScript untuk menangani pengisian modal -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<div class="card-body">
			<div class="table_tow">
 <table class="table table-hover table-centered mb-0">
    <thead>
        <tr>
            <th>ID BAINAKA</th>
            <th>NARAN BAINAKA</th>
            <th>FOTO</th>
            <th>SEXU</th>
            <th>DATA REGISTU</th>
            <th>NUMERU TELFONE</th>
            <th>ID MUNICIPIU</th>
            <th>ID KOMPANIA</th>
            <th>ID TIPU</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Koneksi ke database (gantilah dengan informasi koneksi yang sesuai)
        $koneksi = new mysqli("localhost", "root", "", "db_finansas");
        // Periksa koneksi
        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }
        // Query SQL untuk mengambil data dari tabel Bainaka
        $sql = "SELECT 
    b.id_bainaka,
    b.naran_bainaka,
    b.imagen_baikana,
    b.sexo,
    b.data_rejistu,
    b.no_hp,
    m.id_municipiu,
    m.naran_muncipiu,
    k.id_kompania,
    k.naran_kompania,
    t.id_tipo,
    t.naran_tipu,
    t.asuntu
FROM Bainaka AS b
JOIN Municipiu AS m ON b.id_municipiu = m.id_municipiu
JOIN Kompania AS k ON b.id_kompania = k.id_kompania
JOIN Tipo AS t ON b.id_tipo = t.id_tipo";
        // Eksekusi query
        $result = $koneksi->query($sql);
        // Periksa apakah ada hasil yang ditemukan
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>BNK00" . $row["id_bainaka"] . "</td>";
                echo "<td>" . $row["naran_bainaka"] . "</td>";
                // Tampilkan gambar dari folder "img"
                echo '<td> <button class="btn btn-primary" data-bs-target="#myModal' . $row['id_bainaka'] . '" data-bs-toggle="modal"><i class="bi bi-images"></i></button></td>';
                // kkk
    echo "<td>" . $row["sexo"] . "</td>";
                echo "<td>" . $row["data_rejistu"] . "</td>";
                echo "<td>" . $row["no_hp"] . "</td>";
                echo "<td>" . $row["naran_muncipiu"] . "</td>";
                echo "<td>" . $row["naran_kompania"] . "</td>";
                echo "<td>" . $row["naran_tipu"] . "</td>";
                echo "<td>";
                echo '<a href="edit_bainaka.php?id=' . $row['id_bainaka'] . '" class="edit-link">Edit</a>';
                echo "<a href='hapus_kliente.php?id=" . $row["id_bainaka"] . "'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
                // Modal untuk setiap produk
            echo '<div class="modal fade" id="myModal' . $row['id_bainaka'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog modal-sm">';
            echo '<div class="modal-content">';
            echo '<div class="modal-body">';
            echo '<center><img src="' . $row['imagen_baikana'] . '" alt="Product Image" class="img-fluid"> </center>' ; //karik hetan ona nia solusaun mak bele utuliza koding ida nee ' . $row['imagen_baikana'] . '
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            }
        } else {
            echo "<tr><td colspan='10'><div class='d-flex align-items-center'> <br><br><br>
                    <strong>DADUS SEIDAUK IHA...</strong>
                    <div class='spinner-border ms-auto' role='status' aria-hidden='true'></div>
                </div></td></tr>";
        }
        // Tutup koneksi ke database
        $koneksi->close();
        ?>
        <tr>
        	<td colspan="10">TOTAL DADUS KLIENTE : 30</td>
        </tr>
    </tbody>

</table>
</div>
		</div>
	</div>
</div>
</div>
		</div>
	</div>
			</main>
		</div>
	</div>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/global.js"></script>
	<script>
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
			return new bootstrap.Tooltip(tooltipTriggerEl)
		})
	</script>
</body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">TANBAKAN DADUS BAINAKA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="add-bainaka.php" method="POST">
  <div class="card-body">
    <div class="row">
      <div class="col-6">
      </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">NARAN BAINAKA</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="naran_bainaka" placeholder="Input Dadus bainaka" required>
        </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">FOTO</label>
          <input type="file" class="form-control" id="foto" name="foto" placeholder="Input Dadus bainaka">
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">SEXU</label>
          <input type="text" class="form-control" id="sexu" name="sexu" placeholder="Input Dadus bainaka">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">DATA REGISTU</label>
          <input type="date" class="form-control" id="data_registu" name="data_registu" placeholder="Input Dadus bainaka">
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">NUMERU TELFONE</label>
          <input type="text" class="form-control" id="numeru_telefone" name="numeru_telefone" placeholder="Input Dadus bainaka">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
      <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">ID MUNICIPIU</label>
  <select class="form-control" id="id_municipiu" name="id_municipiu">
    <?php
    // Koneksi ke database (gantilah dengan informasi koneksi yang sesuai)
    $koneksi = new mysqli("localhost", "root", "", "db_finansas");

    // Periksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Query SQL untuk mengambil data dari tabel municipiu
    $sql = "SELECT id_municipiu, naran_muncipiu FROM municipiu";

    // Eksekusi query
    $result = $koneksi->query($sql);

    // Periksa apakah ada hasil yang ditemukan
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id_municipiu"] . "'>" . $row["naran_muncipiu"] . "</option>";
        }
    } else {
        echo "<option value=''>Tidak ada data municipio</option>";
    }

    // Tutup koneksi ke database
    $koneksi->close();
    ?>
  </select>
</div>

      </div>
      <div class="col-6">
      <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">ID KOMPANIA</label>
  <select class="form-control" id="id_kompania" name="id_kompania">
    <?php
    // Koneksi ke database (gantilah dengan informasi koneksi yang sesuai)
    $koneksi = new mysqli("localhost", "root", "", "db_finansas");

    // Periksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Query SQL untuk mengambil data dari tabel municipiu
    $sql = "SELECT id_kompania, naran_kompania FROM kompania";

    // Eksekusi query
    $result = $koneksi->query($sql);

    // Periksa apakah ada hasil yang ditemukan
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id_kompania"] . "'>" . $row["naran_kompania"] . "</option>";
        }
    } else {
        echo "<option value=''>Tidak ada data municipio</option>";
    }

    // Tutup koneksi ke database
    $koneksi->close();
    ?>
  </select>
</div>

      </div>
    </div>
    <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">ID TIPU REJISTU</label>
  <select class="form-control" id="id_tipo" name="id_tipo">
    <?php
    // Koneksi ke database (gantilah dengan informasi koneksi yang sesuai)
    $koneksi = new mysqli("localhost", "root", "", "db_finansas");

    // Periksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Query SQL untuk mengambil data dari tabel municipiu
    $sql = "SELECT id_tipo, naran_tipu FROM tipo";

    // Eksekusi query
    $result = $koneksi->query($sql);

    // Periksa apakah ada hasil yang ditemukan
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id_tipo"] . "'>" . $row["naran_tipu"] . "</option>";
        }
    } else {
        echo "<option value=''>Tidak ada data municipio</option>";
    }

    // Tutup koneksi ke database
    $koneksi->close();
    ?>
  </select>
</div>


  </div>
  <div class="modal-footer bg-danger">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>

    </div>
  </div>
</div>

		<!--infprmsaun modal-->




</html>