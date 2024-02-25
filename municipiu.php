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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">

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

    <?php include "includes/header.php" ?>

    <div class="container-fluid">
        <div class="row">
            <?php include "includes/sidebar.php" ?>

            <main class="col-12 ms-sm-auto common col-lg-10 px-md-4">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light-lighten p-2">
                        <li class="breadcrumb-item"><a href="#"><i style="margin-right:5px;"
                                    class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-header text-center bg-primary">
                        <h4>LISTA DADUS MUNICIPIU</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>AUMENTA DADUS </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="add_municipiu.php" method="POST">
                                        
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1"
                                                    class="form-label">NARAN MUNICIPIU</label>
                                                <input type="text" name="naranmunicipiu" id="naranmunicipiu"
                                                    class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Input Dadus municipiu" style="" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">OBS</label>
                                                <input type="text" name="observasaun" id="observasaun"
                                                    class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Input Dadus municipiu" style="" required>
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit" name="submit" value="submit"
                                                    class="btn btn-primary"><i class="fa fa-heart-o"></i> AUMENTA</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-header"><h4>LISTA DADUS MUNICIPIU </h4></div>
                                    <div class="card-body">
                                        <div class="table_tow">
                                            <table class="table table-hover table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID MUNICIPIU</th>
                                                        <th>NARAN MUNICIPIU</th>
                                                        <th>OBS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $koneksi = new mysqli("localhost", "root", "", "db_finansas");
                                                    if ($koneksi->connect_error) {
                                                        die("Koneksi gagal: " . $koneksi->connect_error);
                                                    }
                                                    $sql = "SELECT id_municipiu, naran_muncipiu, obs FROM Municipiu";
                                                    $result = $koneksi->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr>";
                                                            echo "<td>MNCP00" . $row["id_municipiu"] . "</td>";
                                                            echo "<td>" . $row["naran_muncipiu"] . "</td>";
                                                            echo "<td>" . $row["obs"] . "</td>";
                                                            echo "<td>";
                                                            echo "<a data-bs-toggle='modal' data-bs-target='#editModal'
                                                                href='javascript:void(0);' data-id='" . $row["id_municipiu"] . "'
                                                                data-naran='" . $row["naran_muncipiu"] . "'
                                                                data-obs='" . $row["obs"]."'
                                                                class='edit-link'>Edit</a> | ";
                                                            echo "<a href='hapus_municipiu.php?id=" . $row["id_municipiu"] . "'>Hapus</a>";
                                                            echo "</td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='3'>DADUS SEIDAUK IHA</td></tr>";
                                                    }
                                                    $koneksi->close();
                                                    ?>
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
<!-- Modal Box for Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Municipiu</h5>
                <button type="button" class="btn-close" value="MNCP00" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for Editing Data -->
                <form action="proses_edit_municipiu.php" method="POST">
                    <div class="mb-3">
                        <label for="editIdMunicipiu" class="form-label">ID MUNICIPIU</label>
                        <input type="text" class="form-control" id="editIdMunicipiu" name="editIdMunicipiu" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="editNaranMunicipiu" class="form-label">NARAN MUNICIPIU</label>
                        <input type="text" class="form-control" id="editNaranMunicipiu" name="editNaranMunicipiu"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="editObs" class="form-label">OBS</label>
                        <input type="text" class="form-control" id="editObs" name="editObs" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
                <!-- and informasaun edit data  -->
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // JavaScript to populate the edit modal box with data
    $(document).on('click', '.edit-link', function () {
        var idMunicipiu = $(this).data('id');
        var naranMunicipiu = $(this).data('naran');
        var obs = $(this).data('obs');
        $('#editIdMunicipiu').val(idMunicipiu);
        $('#editNaranMunicipiu').val(naranMunicipiu);
        $('#editObs').val(obs);
    });
</script>

</html>
