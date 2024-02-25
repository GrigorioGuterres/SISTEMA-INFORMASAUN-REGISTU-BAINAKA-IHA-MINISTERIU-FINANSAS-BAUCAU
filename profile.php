<?php
 // Database connection parameters
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "db_finansas"; // Change to your database name

 // Create a database connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check if the connection is successful
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

// Pastikan Anda sudah membuat koneksi ke database sebelumnya
// Lakukan query untuk mengambil data admin
$sql = "SELECT * FROM tb_admin WHERE id = 1"; // Ganti ID sesuai kebutuhan
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $adminUsername = $row['username'];
    $adminPassword = $row['password'];
    $naran = $row['naran'];
    $hp = $row['hp'];
    $profisaun = $row['profisaun'];
    $email = $row['email'];
    $img = $row['img'];
    $nasaun = $row['nasaun'];
    $adress = $row['adress'];
    $img = $row['img'];
    
}
?>
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
				
				<!-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light-lighten p-2">
        <li class="breadcrumb-item"><a href="#"><i style="margin-right:5px;" class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
</nav> -->

	<!-- <div class="card">
	</div> -->
				
    

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

        <img src="<?php echo $img; ?>" alt="Profile" class="rounded-circle">
          <h2><?php echo $naran; ?></h2>
          <h3><?php echo $profisaun; ?></h3>
          <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="card-title">About</h5>
              <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Naran Kompletu</div>
                <div class="col-lg-9 col-md-8"><?php echo $naran; ?></div>
              </div>

             

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Pozisaun</div>
                <div class="col-lg-9 col-md-8"><?php echo $profisaun; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nasaun</div>
                <div class="col-lg-9 col-md-8"><?php echo $nasaun; ?></div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8"><?php echo $adress; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Phone</div>
                <div class="col-lg-9 col-md-8"><?php echo $hp; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8"><?php echo $email; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">username</div>
                <div class="col-lg-9 col-md-8"><?php echo $adminUsername; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">password</div>
                <div class="col-lg-9 col-md-8"><?php echo $adminPassword; ?></div>
              </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form>
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <img src="img/profile-img.jpg" alt="Profile">
                    <div class="pt-2">
                      <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                      <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Naran Kompletu</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="fullName" type="text" class="form-control" id="fullName" value="">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea name="about" class="form-control" id="about" style="height: 100px"></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Job" class="col-md-4 col-lg-3 col-form-label">Profisaun</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="job" type="text" class="form-control" id="Job" value="">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Country" class="col-md-4 col-lg-3 col-form-label">Nasaun</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="country" type="text" class="form-control" id="Country" value="">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="address" type="text" class="form-control" id="Address" value="">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="Phone" value="">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="">
                  </div>
                </div>
				<div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Username</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="username" type="text" class="form-control" id="Email" value="">
                  </div>
                </div>
				<div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="username" type="text" class="form-control" id="Email" value="">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="twitter" type="text" class="form-control" id="Twitter" value="">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="facebook" type="text" class="form-control" id="Facebook" value="">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="instagram" type="text" class="form-control" id="Instagram" value="">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="linkedin" type="text" class="form-control" id="Linkedin" value="">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-settings">

              <!-- Settings Form -->
              <form>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                      <label class="form-check-label" for="changesMade">
                        Changes made to your account
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
                      <label class="form-check-label" for="newProducts">
                        Information on new products and services
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="proOffers">
                      <label class="form-check-label" for="proOffers">
                        Marketing and promo offers
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                      <label class="form-check-label" for="securityNotify">
                        Security alerts
                      </label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End settings Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
             <!-- inforasaun dadus muda password  -->
             <!-- Change Password Form -->
             <form action="change_password.php" method="POST">
        <div class="row mb-3">
            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
            <div class="col-md-8 col-lg-9">
                <input name="currentPassword" type="password" class="form-control" id="currentPassword" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
            <div class="col-md-8 col-lg-9">
                <input name="newPassword" type="password" class="form-control" id="newPassword" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
            <div class="col-md-8 col-lg-9">
                <input name="renewPassword" type="password" class="form-control" id="renewPassword" required>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" name="changePassword" class="btn btn-primary">Change Password</button>
        </div>
    </form>
<!-- End Change Password Form -->


             <!-- remata dadus informasaun -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
			
				
				

			

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

	<!-- Modal Box for Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data KOMPANIA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for Editing Data -->
                <form action="proses_edit_kompania.php" method="POST">
                    <div class="mb-3">
                        <label for="editIdKompania" class="form-label">ID KOMPANIA</label>
                        <input type="text" class="form-control" id="editIdKompania" name="editIdKompania" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="editNaranKompania" class="form-label">NARAN KOMPANIA</label>
                        <input type="text" class="form-control" id="editNaranKompania" name="editNaranKompania"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="editAdressKompania" class="form-label">ADRESS</label>
                        <input type="text" class="form-control" id="editAdressKompania" name="editAdressKompania"
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
        var idKompania = $(this).data('id');
        var naranKompania = $(this).data('naran');
        var adressKompania = $(this).data('adress');
        var obs = $(this).data('obs');
        $('#editIdKompania').val(idKompania);
        $('#editNaranKompania').val(naranKompania);
        $('#editAdressKompania').val(adressKompania);
        $('#editObs').val(obs);
    });

</script>
<!-- Modal Box for Edit  -->
</body>

</html>