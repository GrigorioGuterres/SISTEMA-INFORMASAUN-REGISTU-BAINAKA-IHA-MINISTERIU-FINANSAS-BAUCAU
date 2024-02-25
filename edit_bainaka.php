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
                    <h2>Edit Dadus Bainaka</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                       <!-- edit dadus informasaun  -->
                   
    <div class="container">
        <?php
        $koneksi = new mysqli("localhost", "root", "", "db_finansas");

        if ($koneksi->connect_error) {
            die("Koneksaun labele hetan: " . $koneksi->connect_error);
        }

        if (isset($_GET['id'])) {
            $id_bainaka = $_GET['id'];
            $sql = "SELECT * FROM Bainaka WHERE id_bainaka = $id_bainaka";
            $result = $koneksi->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $nama_bainaka = $row['naran_bainaka'];
                $jenis_kelamin = $row['sexo'];
                $tanggal_registrasi = $row['data_rejistu'];
                $nomor_telepon = $row['no_hp'];
                $id_municipiu = $row['id_municipiu'];
                $id_kompania = $row['id_kompania'];
                $id_tipo = $row['id_tipo'];
                ?>
               
                <form method="POST" action="proses_edit_bainaka.php">
                    <input type="hidden" name="id_bainaka" value="<?php echo $id_bainaka; ?>">
                    <div class="form-group">
                        <label for="nama">Naran:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama_bainaka; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jéneru:</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_registrasi">Data Registrasaun:</label>
                        <input type="date" class="form-control" id="tanggal_registrasi" name="tanggal_registrasi" value="<?php echo $tanggal_registrasi; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nomor_telepon">Númeru Telfon:</label>
                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?php echo $nomor_telepon; ?>">
                    </div>
                    <div class="form-group">
                        <label for="editIdMunicipiu">Municipiu:</label>
                        <select class="form-control" id="editIdMunicipiu" name="editIdMunicipiu">
                            <?php
                            $sqlMunicipiu = "SELECT * FROM municipiu";
                            $resultMunicipiu = $koneksi->query($sqlMunicipiu);
                            while ($rowMunicipiu = $resultMunicipiu->fetch_assoc()) {
                                $selected = ($rowMunicipiu['id_municipiu'] == $id_municipiu) ? "selected" : "";
                                echo '<option value="' . $rowMunicipiu['id_municipiu'] . '" ' . $selected . '>' . $rowMunicipiu['naran_muncipiu'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editIdKompania">Kompania:</label>
                        <select class="form-control" id="editIdKompania" name="editIdKompania">
                            <?php
                            $sqlKompania = "SELECT * FROM kompania";
                            $resultKompania = $koneksi->query($sqlKompania);
                            while ($rowKompania = $resultKompania->fetch_assoc()) {
                                $selected = ($rowKompania['id_kompania'] == $id_kompania) ? "selected" : "";
                                echo '<option value="' . $rowKompania['id_kompania'] . '" ' . $selected . '>' . $rowKompania['naran_kompania'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editIdTipo">Tipo:</label>
                        <select class="form-control" id="editIdTipo" name="editIdTipo">
                            <?php
                            $sqlTipo = "SELECT * FROM tipo";
                            $resultTipo = $koneksi->query($sqlTipo);
                            while ($rowTipo = $resultTipo->fetch_assoc()) {
                                $selected = ($rowTipo['id_tipo'] == $id_tipo) ? "selected" : "";
                                echo '<option value="' . $rowTipo['id_tipo'] . '" ' . $selected . '>' . $rowTipo['naran_tipu'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="simuAlterasaunBtn">Simu Alterasaun</button>
                </form>
                <?php
            } else {
                echo 'Dadus entidade labele hetan.';
            }
        } else {
            echo 'ID entidade labele fornese.';
        }

        $koneksi->close();
        ?>



    </div>

    
    <!-- Tambahkan link ke Bootstrap JS di sini -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


                       <!-- dadus informasaun akademic  -->
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
