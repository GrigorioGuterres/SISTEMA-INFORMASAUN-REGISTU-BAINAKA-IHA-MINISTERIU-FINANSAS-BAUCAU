<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}
$username = $_SESSION['username'];
// Database connection details
$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "db_finansas";
// Create a connection to the database
$conn = new mysqli($servername, $db_username, $db_password, $db_name);
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Function to fetch and display records count
function getCount($tableName) {
    global $conn;
    $sql = "SELECT COUNT(*) AS total_records FROM $tableName";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_records'];
    }
    return 0;
}
// Fetch counts for each category
$municipiuCount = getCount("municipiu");
$companiaCount = getCount("kompania");
$tipoCount = getCount("tipo");
$bainakaCount = getCount("bainaka");
// Close the database connection
// kode husi informsaun detalho
$query = "SELECT b.naran_bainaka, COUNT(*) AS total_bainaka, m.naran_muncipiu 
          FROM bainaka b
          LEFT JOIN municipiu m ON b.id_municipiu = m.id_municipiu 
          GROUP BY b.id_municipiu";
$result = $conn->query($query);
// Initialize an array to store the data
$bainakaData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bainakaData[] = $row;
    }
}
//remata kode informasaun detalho
$conn->close();
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
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		var myCalendar;
		function doOnLoad() {
			myCalendar = new dhtmlXCalendarObject(["cal_1", "cal_2", "cal_3"]);
		}
	</script>
	<script src="js/chart.min.js"></script>
	<link href="css/table.css" rel="stylesheet">
<style>
/* Increase specificity by targeting a specific container or element */
body::-webkit-scrollbar {
    width: 16px; /* Width of the scrollbar */
}
::-webkit-scrollbar-thumb {
    background-color: #FF5733; /* Color of the scrollbar thumb */
    border-radius: 6px; /* Rounded corners for the scrollbar thumb */
}
/* Example with increased specificity */
body::-webkit-scrollbar-thumb
 {
    background-color: greenyellow !important;  
}
</style>
</head>
<body onLoad="doOnLoad();">
<!-- Loading bar HTML and CSS -->
<div id="loading-bar" class="loading-bar">
    <div class="loading-bar-inner"></div>
</div>
<style>
    /* Loading bar styles */
    .loading-bar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px; /* Adjust the height as needed */
        background: rgb(63,94,251);
background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);
border: 7px;
        z-index: 9999;
    }
    .loading-bar-inner {
        width: 0;
        height: 100%;
        background-color: #3498db; /* Loading bar color */
        transition: width 0.5s ease-in-out;
    }
</style>
<script>
    // Function to hide the loading bar
    function hideLoadingBar() {
        var loadingBar = document.getElementById("loading-bar");
        if (loadingBar) {
            loadingBar.style.display = "none";
        }
    }
    // Add an event listener to hide the loading bar when the page is fully loaded
    window.addEventListener("load", function () {
        setTimeout(hideLoadingBar, 1000); // Hide the loading bar after 1 second (adjust as needed)
    });
</script>
	<?php include"includes/header.php" ?>
	<div class="container-fluid">
		<div class="row">
			<?php include"includes/sidebar.php" ?>
			<main class="col-md-9 ms-sm-auto common col-lg-10 px-md-4">
				<div class="row analytic_1">
					<div class="col-md-12">
						<div class="analytic_1l"> <br>
						<center>	<h5 class="mb-0">SISTEMA INFORMASAUN REGISTU BAINAKA IHA MINISTERIU FINANSAS BAUCAU <br>BAZEADU WEBSITE</h5></center> <br> <hr class="shadow border border-danger border-4 opacity-59">
				</div>
			</div>
		</div>
<!-- koko -->
<!-- Code for displaying the record counts -->
    <div class="row crm_2 mt-1">
        <div class="col-lg-3 col-md-6">
            <div class="analytic_2l1 bg-light shadow">
                <h6 class="font_14 col_3">MUNICIPIU</h6>
                <h3><?php echo $municipiuCount; ?> <span class="pull-right col_3"><i class="fa fa-users"></i></span></h3>
                <p class="col_2 mb-0"><i class="fa fa-long-arrow-up"></i> 5.27% <span class="pull-right col_3">Since last month</span></p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="analytic_2l1 bg-light shadow">
                <h6 class="font_14 col_3">COMPANIA</h6>
                <h3><?php echo $companiaCount; ?> <span class="pull-right col_3"><i class="fa fa-users"></i></span></h3>
                <p class="col_4 mb-0"><i class="fa fa-long-arrow-up"></i> 5.27% <span class="pull-right col_3">Since last month</span></p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="analytic_2l1 bg-light shadow">
                <h6 class="font_14 col_3">TIPU RESJITU</h6>
                <h3><?php echo $tipoCount; ?> <span class="pull-right col_3"><i class="fa fa-users"></i></span></h3>
                <p class="col_2 mb-0"><i class="fa fa-long-arrow-up"></i> 5.27% <span class="pull-right col_3">Since last month</span></p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="analytic_2l1 bg-light shadow">
                <h6 class="font_14 col_3">BAINAKA</h6>
                <h3><?php echo $bainakaCount; ?> <span class="pull-right col_3"><i class="fa fa-users"></i></span></h3>
                <p class="col_2 mb-0"><i class="fa fa-long-arrow-up"></i> 5.27% <span class="pull-right col_3">Since last month</span></p>
            </div>
        </div>
    </div>
	<!-- informasaun detalho  -->
<div class="row analytic_2 mt-4">
	<div class="col-xl-6 col-md-5 col-lg-5">
	<div class="card">
    <div class="card-header">
    <h5>INFORMASAUN DETALHO</h5>
    </div>
    <div class="card-body">
	<p>Informasaun dadus neebe mak Rejistu kada  Municipiu no Kompania</p>
	<div class="tab-content">
    <div class="tab-pane active" id="preview56">
    <ol class="list-group list-group-numbered">
    <?php foreach ($bainakaData as $data) { ?>
    <li class="list-group-item d-flex justify-content-between align-items-start">
     <div class="ms-2 me-auto">
<div class="fw-bold"><?php echo $data['naran_muncipiu']; ?></div>
Total dadus bainaka husi  Municipiu  <span class="badge bg-primary rounded-pill"><?php echo $data['naran_muncipiu']; ?> </span>Hamutuk 
<span class="badge bg-primary rounded-pill"><?php echo $data['total_bainaka']; ?></span>
</div>
</li>
<?php
 } 
?>
</ol>
</div>
</div>
</div>
</div>
<!-- remata detalho informsaun  -->
</div>
<div class="col-xl-6 col-md-7 col-lg-7">  
<!-- tau iha nee  -->
<div class="analytic_2r bg-white">
<div class="card-header bg-info text-center"><h4>GRAFIKU DADUS INFORMASAUN </h4></div>							
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart"></canvas>	
</div>
<!-- remata  -->
	</div>
	</div>
	<?php include"includes/footer.php" ?>
	</main>
	</div>
	</div>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/global.js"></script>
	<script>
// Data yang akan digunakan untuk grafik
var data = {
    labels: ["MUNICIPIU", "COMPANIA", "TIPU RESJITU", "BAINAKA"],
    datasets: [
        {
            label: "Jumlah",
            data: [<?php echo $municipiuCount; ?>, <?php echo $companiaCount; ?>, <?php echo $tipoCount; ?>, <?php echo $bainakaCount; ?>],
            backgroundColor: ["rgba(75, 192, 192, 0.2)", "rgba(255, 99, 132, 0.2)", "rgba(255, 206, 86, 0.2)", "rgba(54, 162, 235, 0.2)"],
            borderColor: ["rgba(75, 192, 192, 1)", "rgba(255, 99, 132, 1)", "rgba(255, 206, 86, 1)", "rgba(54, 162, 235, 1)"],
            borderWidth: 1
        }
    ]
};
// Konfigurasi grafik
var config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};
// Membuat grafik di dalam elemen dengan id "myChart"
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, config);
</script>
</body>
</html>