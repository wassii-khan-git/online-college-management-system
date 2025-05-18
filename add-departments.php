<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>OCMS - Online College Management System</title>

	<!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.css">
	<!-- Pick date -->
    <link rel="stylesheet" href="vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">

</head>

<body>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include "nav_header.php"; ?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php include "header_start.php"; ?>
        <!--**********************************
            Header end 
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include "sidebar.php" ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

		
		
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Departments</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Departments</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Departments</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
								<h5 class="card-title">Add Department</h5>
							</div>
							<div class="card-body">
                                <form action="#" method="post">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Name</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Head Of Department</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Start Date</label>
												<input name="datepicker" class="datepicker-default form-control" id="datepicker">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Student Capacity</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Details</label>
												<textarea class="form-control" rows="5"></textarea>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" class="btn btn-primary">Submit</button>
											<button type="submit" class="btn btn-light">Cencel</button>
										</div>
									</div>
								</form>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
		<?php include "footer.php"; ?>
        <!--**********************************
            Footer end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
	<!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>	
	
	<!-- pickdate -->
    <script src="vendor/pickadate/picker.js"></script>
    <script src="vendor/pickadate/picker.time.js"></script>
    <script src="vendor/pickadate/picker.date.js"></script>
	
	<!-- Pickdate -->
    <script src="js/plugins-init/pickadate-init.js"></script>
	
</body>
</html>