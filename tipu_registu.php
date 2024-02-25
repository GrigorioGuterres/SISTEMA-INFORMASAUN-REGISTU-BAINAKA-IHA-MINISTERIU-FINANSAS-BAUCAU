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
				
				<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light-lighten p-2">
        <li class="breadcrumb-item"><a href="#"><i style="margin-right:5px;" class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
</nav>

	<div class="card">
		<div class="card-header text-center bg-primary"><h4>LISTA DADUS TIPU REGISTU</h4></div>
		<div class="card-body">
			<div class="row">
<div class="col-4">

	<div class="card">
		<div class="card-header"><h4>AUMENTA DADUS </h4></div>
		<div class="card-body">
			<form action="add_tipu.php" method="POST">
			
			<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label ">ID TIPU REGISTU</label>

  <input class="form-control" type="text" name="idtipu" id="idtipu" placeholder="BK0001">

  
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">NARAN TIPU REGISTU</label>
    <input type="text" name="narantipu" id="narantipu" class="form-control" id="exampleFormControlInput1" placeholder="Input Dadus tipu registu" style="">

</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">ASUNTU</label>
    <input type="text" name="asuntu" id="asuntu" class="form-control" id="exampleFormControlInput1" placeholder="Input Dadus tipu registu" style="">

</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">OBS</label>
    <input type="text" name="observasaun" id="observasaun" class="form-control" id="exampleFormControlInput1" placeholder="Input Dadus tipu registu" style="">

</div>


<div class="d-grid">
    <button type="submit" name="submit" value="submit" class="btn btn-primary"><i class="fa fa-heart-o"></i> AUMENTA</button>
    
</div>
		</div>
	</form>
	</div>


	

	

</div>
<div class="col-8">
	<div class="card">
		<div class="card-header"><h4>LISTA DADUS TIPU REGISTU </h4></div>
		<div class="card-body">
			<div class="table_tow">
 <table class="table table-hover table-centered mb-0">
    <thead>
        <tr>
            <th>ID TIPU</th>
            <th>NARAN TIPU</th>
            <th>ASUNTU</th>
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

        
        $sql = "SELECT id_tipo, naran_tipu, asuntu, obs  FROM  tipo";

       
        $result = $koneksi->query($sql);

        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_tipo"] . "</td>";
                echo "<td>" . $row["naran_tipu"] . "</td>"; 
                echo "<td>" . $row["asuntu"] . "</td>";
                echo "<td>" . $row["obs"] . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row["id_tipo"] . "'>Edit</a> | ";
                echo "<a href='hapus_tipu.php?id=" . $row["id_tipo"] . "'>Hapus</a>";
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

	<script>
		//================ Line chart With Multiple Lines ========

		var xValues = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

		new Chart("multipleLineChart", {
			labels: 'Multiple Line Chart',
			type: "line",
			data: {
				labels: xValues,
				datasets: [{
					label: 'India',
					data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
					borderColor: "red",
					fill: false
				}, {
					label: 'US',
					data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
					borderColor: "green",
					fill: false
				}, {
					label: 'China',
					data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
					borderColor: "blue",
					fill: false
				}]
			},
			options: {
				legend: { display: false }
			}
		});




		//============== Bar Chart Single Dataset ============

		var xValuesBarSingle = ["Italy", "France", "Spain", "USA", "Argentina"];
		var yValuesBarSingle = [55, 49, 44, 24, 15];
		var barColors = ["red", "green", "blue", "orange", "brown"];

		new Chart("barSingleChart", {
			type: "bar",
			data: {
				labels: xValuesBarSingle,
				datasets: [{
					backgroundColor: barColors,
					data: yValuesBarSingle
				}]
			},
			options: {}
		});


		//================ Line chart With SINGLE Line ========

		const labelsLine = [
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July'
		];

		const dataLine = {
			labels: labelsLine,
			datasets: [{
				label: 'Products',
				backgroundColor: "rgba(0,0,0,1.0)",
				borderColor: "rgba(0,0,0,0.1)",
				data: [0, 10, 5, 2, 20, 30, 45],

			}]
		};

		const config = {
			type: 'line',
			data: dataLine,
			options: {}
		};

		const lineChart = new Chart(
			document.getElementById('lineChart'),
			config
		);

		//============== Pie Chart Single Dataset ============

		var xValuesPieChart = ["Crome", "Firefox", "Safari", "Android", "Internet Explorer"];
		var yValuesPieChart = [55, 49, 44, 24, 15];
		var barColors = [
			"#b91d47",
			"#00aba9",
			"#2b5797",
			"#e8c3b9",
			"#1e7145"
		];

		new Chart("pieChart", {
			type: "pie",
			data: {
				labels: xValuesPieChart,
				datasets: [{
					backgroundColor: barColors,
					data: yValuesPieChart
				}]
			},
			options: {
				title: {
					display: true,
					text: "Production 2022"
				}
			}
		});


		//============== Bar Chart Multiple Datasets ============
		const dataBar = [{ x: 'Jan', net: 100, cogs: 50, gm: 50 }, { x: 'Feb', net: 120, cogs: 55, gm: 75 }];
		const configBar = {
			type: 'bar',
			data: {
				labels: ['Jan', 'Feb'],
				datasets: [{
					label: 'Net sales',
					data: dataBar,
					parsing: {
						yAxisKey: 'net'
					},
					backgroundColor: '#232e3c',
					borderColor: '#32455c',
				}, {
					label: 'Cost of goods sold',
					data: dataBar,
					parsing: {
						yAxisKey: 'cogs'
					}
				}, {
					label: 'Gross margin',
					data: dataBar,
					parsing: {
						yAxisKey: 'gm'
					}
				}]
			},

		};

		const barChart = new Chart(
			document.getElementById('barChart'),
			configBar
		);


		//============== Area Chart ============
		const configArea = {
			type: 'line',
			labels: 'Area Chart',
			data: {
				labels: ["Tokyo", "Mumbai", "Mexico City", "Shanghai", "Sao Paulo", "New York", "Karachi", "Buenos Aires", "Delhi", "Moscow"],
				datasets: [{
					label: 'Series 1', // Name the series
					data: [500, 50, 2424, 14040, 14141, 4111, 4544, 47, 5555, 6811], // Specify the data values array
					fill: true,
					borderColor: '#2196f3', // Add custom color border (Line)
					backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
					borderWidth: 1 // Specify bar border width
				},
				{
					label: 'Series 2', // Name the series
					data: [1288, 88942, 44545, 7588, 99, 242, 1417, 5504, 75, 457], // Specify the data values array
					fill: true,
					borderColor: '#4CAF50', // Add custom color border (Line)
					backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
					borderWidth: 1 // Specify bar border width
				}]
			},
			options: {
				responsive: true, // Instruct chart js to respond nicely.
				maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
			}
		};


		const areaChart = new Chart(
			document.getElementById('areaChart'),
			configArea
		);


		// ===================== Function Chart ====================

		var xValuesFunction = [];
		var yValuesFunction = [];
		generateDataFunctionChart("Math.sin(x)", 0, 10, 0.5);

		new Chart("functionChart", {
			type: "line",
			data: {
				labels: xValuesFunction,
				datasets: [{
					fill: false,
					pointRadius: 2,
					borderColor: "rgba(0,0,255,0.5)",
					data: yValuesFunction
				}]
			},
			options: {
				legend: { display: false },
				title: {
					display: true,
					text: "y = x * 2 + 7",
					fontSize: 16
				}
			}
		});
		function generateDataFunctionChart(value, i1, i2, step = 1) {
			for (let x = i1; x <= i2; x += step) {
				yValuesFunction.push(eval(value));
				xValuesFunction.push(x);
			}
		}


		// ============== Linear Graphs ==============

		var xValueslinear = [];
		var yValueslinear = [];
		generateData("x * 2 + 7", 0, 10, 0.5);

		new Chart("linearChart", {
			type: "line",
			data: {
				labels: xValueslinear,
				datasets: [{
					label: 'Linear Chart',
					fill: false,
					pointRadius: 3,
					borderColor: "rgba(255,0,0,0.5)",
					data: yValueslinear
				}]
			},
			options: {
				legend: { display: false },
				title: {
					display: true,
					text: "y = x * 2 + 7",
					fontSize: 16
				}
			}
		});
		function generateData(value, i1, i2, step = 1) {
			for (let x = i1; x <= i2; x += step) {
				yValueslinear.push(eval(value));
				xValueslinear.push(x);
			}
		}


		//============== Doughnut Chart Single Dataset ============

		var xValuesDoughnut = ["Italy", "France", "Spain", "USA", "Argentina"];
		var yValuesDoughnut = [55, 49, 44, 24, 15];
		var barColors = [
			"#b91d47",
			"#00aba9",
			"#2b5797",
			"#e8c3b9",
			"#1e7145"
		];

		new Chart("doughnutChart", {
			type: "doughnut",
			data: {
				labels: xValuesDoughnut,
				datasets: [{
					backgroundColor: barColors,
					data: yValuesDoughnut
				}]
			},
			options: {
				title: {
					display: true,
					text: "Production 2022"
				}
			}
		});

	</script>
</body>

</html>