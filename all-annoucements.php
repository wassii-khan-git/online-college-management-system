<?php
// session_start();

// include_once("admin/login.php");

include_once("./php/config.php");
include_once("./php/professor.php");


// check if the user is logged in, if not redirect him to login page
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: not-found.php");
    exit;
}


?>
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
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">




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
                <div id="formMessage"></div>
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>All Annoucements</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Annoucement</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">All Annoucements</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row tab-content">
                            <div id="list-view" class="tab-pane fade active show col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Annoucements </h4>
                                        <a href="add-annoucement.php" class="btn btn-primary">+ Add new</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example3" class="display" style="min-width: 860px">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Id</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Descriptions</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>



                                                    <?php

                                                    include("php/functions.php");

                                                    $retrieve_query = "SELECT * FROM `annoucements`";
                                                    $retrieve_query_result = mysqli_query($con, $retrieve_query);
                                                    $row = mysqli_num_rows($retrieve_query_result);

                                                    $professor_count = 0;

                                                    if ($row > 0) {
                                                        while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {
                                                            // session_start();
                                                            $_SESSION['professor_count'] = $professor_count++;
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $fetch_record['id'] ?></td>
                                                                <td><?php echo $fetch_record['title'] ?></td>
                                                                <td><?php echo $fetch_record['description'] ?></td>
                                                                <td>


                                                                    <?php
                                                                    if ($fetch_record['status'] == "Active") {
                                                                    ?>
                                                                        <span class="badge badge-primary"><?php echo $fetch_record['status'] ?></span>
                                                                    <?php
                                                                    } else if ($fetch_record['status'] == "Deactive") {
                                                                    ?>
                                                                        <span class="badge badge-danger"><?php echo $fetch_record['status'] ?></span>
                                                                    <?php
                                                                    }

                                                                    ?>
                                                                </td>
                                                                <td><?php echo $fetch_record['date'] ?></td>

                                                                <td>
                                                                    <form action="all-professors.php" method="POST">
                                                                        <button type="button" class="delete btn btn-danger" data-sid="<?php echo $fetch_record['id']; ?>" data-toggle="modal" data-target="#delete_modal"><i class="la la-trash"></i></button>
                                                                    </form>
                                                                </td>

                                                            </tr>

                                                    <?php
                                                        }
                                                    } else {
                                                        echo "<h1>No Record Found!</h1>";
                                                    }

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
            </div>


        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php include "footer.php" ?>
        <!--**********************************
            Footer end
		***********************************-->



        <!-- delete modal -->
        <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" name="hidden_id" id="hidden_id">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Alert Warning!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5 class="modal-body" id="exampleModalLabel">Do you Really Want to Delete this Record ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="button" id="delete_yes_button" name="delete_yes_button" class="btn btn-danger">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>














    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->



    <!-- Jquery and bootstrap  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>



    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>


    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

    <!-- Delete JS -->
    <!-- <script src="./js/delete.js"></script> -->

    <!-- add annoucments -->
    <script>
        $(document).ready(function() {
            $(".delete").click(function(e) {
                // console.log(e);
                e.preventDefault();

                const deleteID = $(this).attr('data-sid');

                console.log(deleteID);

                // get the error message container
                var formMessage = $("#formMessage").html();


                // it will be empty by default
                $(formMessage).html("");

                if (deleteID !== "") {

                    // create a java script object
                    const mydata = {

                        delete_id: deleteID,
                        action: "deleteAnnoucement"
                    }

                    $("#delete_yes_button").click(function(e) {
                        e.preventDefault();
                        console.log("Delete Yes button is clicked");
                        console.log(mydata);

                        // sending data through ajax
                        $.ajax({
                            url: "php/annoucement.php",
                            method: "post",
                            data: mydata,
                            dataType: 'json',
                            cache: false,

                            success: function(data) {

                                if (data !== "") {

                                    if (data.error == 0)

                                        $("#delete_modal").modal('toggle');

                                    $("#formMessage").html("<div class='alert alert-success text-black'>" + data.message + "</div>");

                                    setTimeout(function() {
                                        $("#formMessage").html("");
                                    }, 2000);


                                } else if (data.error == 1) {
                                    $("#formMessage").html("<div class='alert alert-danger'>" + data.message + "</div>");

                                } else {
                                    $("#formMessage").html("<div class='alert alert-danger text-white bg-red'>The data sent from server is empty.</div>");

                                }
                            }

                        });
                    })







                } else {
                    $(formMessage).html("<div class='alert alert-danger'>All fields are required.</div>");
                }




            })
        });
    </script>


</body>

</html>