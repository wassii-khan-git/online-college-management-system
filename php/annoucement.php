<?php

require "functions.php";

$path = "./uploads/";



// add annoucement
if (isset($_POST['action']) == "addAnnoucement") {


    if (isset($_POST['annoucement_title']) && isset($_POST['annoucement_desc'])) {

        $response = array(
            'error' => 0,
            'message' => "This is default message"
        );

        // get the data from the form
        $annoucement_title = mysqli_real_escape_string($con, $_POST['annoucement_title']);
        $annoucement_desc = mysqli_real_escape_string($con, $_POST['annoucement_desc']);

        try {

            $query = "INSERT INTO `annoucements`(`title`, `description`) 
            VALUES ('$annoucement_title','$annoucement_desc')";
            $result = addRecord($query);

            if ($result) {

                $response['error'] = 0;
                $response['message'] = "Record Added Successfully";
            } else {
                $response['error'] = 1;
                $response['message'] = "Failed to Add Record";
            }
        } catch (Exception $e) {
            $response['error'] = 1;
            $response['message'] = "Error" . $e->getMessage();
        }

        echo json_encode($response);
    }
}
// add annoucement





// delete annoucement
if (isset($_POST['action']) == "deleteAnnoucement") {


    if (isset($_POST['delete_id'])) {

        $response = array(
            'error' => 0,
            'message' => "This is default message"
        );

        // get the data from the form
        $delete_annoucement_id = mysqli_real_escape_string($con, $_POST['delete_id']);

        try {

            $query = "DELETE FROM `annoucements` WHERE `id` = '$delete_annoucement_id' ";
            $result = update($query);

            if ($result) {

                $response['error'] = 0;
                $response['message'] = "Record Deleted Successfully";
            } else {
                $response['error'] = 1;
                $response['message'] = "Failed to delete Record";
            }
        } catch (Exception $e) {
            $response['error'] = 1;
            $response['message'] = "Error" . $e->getMessage();
        }

        echo json_encode($response);
    }
}
// delete annoucement








