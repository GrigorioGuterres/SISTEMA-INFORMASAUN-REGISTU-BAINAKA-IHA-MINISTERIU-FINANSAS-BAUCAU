<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
				style="overflow-y: auto; max-height:inherit;">
				<div class="position-sticky">

					<ul class="nav flex-column mb-2 list-unstyled ps-0"> <br>
					<br>
					<div class="row" style="background-image: url('img/5.jpg'); background-size: cover; max-width: 100%; padding-top: 10%; padding-bottom: 10%;">
    <div class="col-12 text-center">
        <img src="img/logo1.webp" alt="" class="border-animation" style="max-width: 100%; height: auto;">
    </div>
</div>
	<style>
	/* Animasi CSS untuk border circle */
@keyframes borderPulse {
    0% {
        border-radius: 50%; /* Bentuk border menjadi lingkaran */
        border-width: 0; /* Border transparan di awal animasi */
    }
    25% {
        border-width: 10px; /* Border muncul dengan lebar 10px */
        border-color: yellow; /* Warna border merah di bagian atas */
    }
    50% {
        border-width: 14px; /* Border tetap merah di tengah animasi */
		border-color: paleturquoise; /* Warna border merah di bagian atas */

    }
    75% {
        border-width: 10px; /* Border tetap merah di tengah animasi */
		border-color: purple; /* Warna border merah di bagian atas */

    }
    100% {
        border-radius: 50%; /* Bentuk border kembali menjadi lingkaran */
        border-width: 0; /* Border transparan di akhir animasi */
    }
}
/* Gaya awal untuk border gambar */
.border-animation {
    border: 3px solid transparent; /* Atur border awal menjadi transparan */
    border-radius: 50%; /* Bentuk border menjadi lingkaran */
    animation: borderPulse 2s linear infinite; /* Animasi border */
}
    </style>
            <hr class="border border-danger border-4 opacity-59">
       
						<li class="nav-item">
							<a href="index.php"
								class="btn btn-toggle align-items-center rounded w-100 tag_m  no_drop active_tab"><i
									class="fa fa-dashboard icon-before"></i><span class="btn">Dashboard</span></a>
						</li>

						<style>
								img{
									width: 100px;
								}
						</style>

						<li class="nav-item">

						<!-- informsaun dadus rejistu  -->

						<!-- remata dadus rejistu  -->
							<a href="javascript:void(0);"
								class="btn btn-toggle align-items-center rounded collapsed w-100 tag_m"
								data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false"><i
									class="fa fa-briefcase icon-before"></i><span class="btn">Input Master</span><i
									class="fa fa-chevron-right"></i></a>
							<div class="collapse" id="account-collapse" style="">
								<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
									
									<li><a href="municipiu.php" class="link-dark rounded w-100"><span><i
													style="font-size:8px; vertical-align:middle; margin-right:10px;"
													class="fa fa-circle-o"></i> Input municipiu</span></a></li>
									<li><a href="Kompania.php" class="link-dark rounded w-100"><span><i
													style="font-size:8px; vertical-align:middle; margin-right:10px;"
													class="fa fa-circle-o"></i> Input Kompania</span></a></li>
									<li><a href="tipu_registu.php" class="link-dark rounded w-100"><span><i
													style="font-size:8px; vertical-align:middle; margin-right:10px;"
													class="fa fa-circle-o"></i>input tipu registu</span></a></li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="javascript:void(0);"
								class="btn btn-toggle align-items-center rounded collapsed w-100 tag_m"
								data-bs-toggle="collapse" data-bs-target="#pages-collapse" aria-expanded="false"><i
									class="fa fa-copy icon-before"></i><span class="btn">Prosses Dadus</span><i
									class="fa fa-chevron-right"></i></a>
							<div class="collapse" id="pages-collapse" style="">
								<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
									<li><a href="klinte.php" class="link-dark rounded w-100"><span><i
													style="font-size:8px; vertical-align:middle; margin-right:10px;"
													class="fa fa-circle-o"></i> Rejistu Dadus</span></a></li>


								</ul>
							</div>
						</li>
						<li class="nav-item">

							<a href="javascript:void(0);"
								class="btn btn-toggle align-items-center rounded collapsed w-100 tag_m"
								data-bs-toggle="collapse" data-bs-target="#Forms-collapse" aria-expanded="false"><i
									class="fa fa-file icon-before"></i><span class="btn">Output</span><i
									class="fa fa-chevron-right"></i></a>
							<div class="collapse" id="Forms-collapse" style="">
								<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
									<li><a href="relatoriuGeral.php" class="link-dark rounded w-100"><span><i
													style="font-size:8px; vertical-align:middle; margin-right:10px;"
													class="fa fa-circle-o"></i> Relatorio</span></a></li>
									
								</ul>
							</div>
						</li>

						

					
					</ul>


					
					<!-- <ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link text-muted" href="#">
								<svg xmlns="#" width="24" height="24" viewBox="0 0 24 24" fill="none"
									stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="feather feather-layers" aria-hidden="true">
									<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
									<polyline points="2 17 12 22 22 17"></polyline>
									<polyline points="2 12 12 17 22 12"></polyline>
								</svg>
								Integrations
							</a>
						</li>
					</ul> -->

				</div>
			</nav>