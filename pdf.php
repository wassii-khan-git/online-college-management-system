<?php


// include the files
include("./php/attendance.php");

$roll_number = $_SESSION['hidden_roll_number'];


// get data from database
include_once("./php/attendance.php");
// include_once("./php/connection.php");

include("./Fpdf/fpdf.php");


$select_query = "SELECT * FROM `attendance_records` WHERE `roll_no` = '$roll_number' ";
$select_query_res = mysqli_query($con, $select_query);
$select_query_row = mysqli_num_rows($select_query_res);
if ($select_query_row > 0) {
    $counter = 0;
    $serial_number = 0;
    while ($fetched_record = mysqli_fetch_assoc($select_query_res)) {
        $serial_number++;



        $title = "Attendance Report";
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetTitle($title);
        $pdf->SetFont("Arial", 'B', 10);

        $pdf->Ln();


        // title
        $pdf->SetX(80);
        $pdf->Cell(40, 10, $title, 1, 1, 'C');
        $pdf->Ln();
        $pdf->Ln();
        // generate pdf

        $pdf->Cell(40, 10, 'Student Name:', 'C');
        // Value
        $pdf->Cell(40, 10, $fetched_record['name'], 0, 1, 'C');

        $pdf->Cell(40, 10, 'Roll No:', 'C');
        // Value
        $pdf->Cell(40, 10, $fetched_record['roll_no'], 0, 1, 'C');

        // $pdf->Ln();
        $pdf->Cell(40, 10, 'class:', 'C');
        // Value
        $pdf->Cell(40, 10, $fetched_record['attendance_class'], 0, 1, 'C');

        $pdf->Ln();

        // title
        $pdf->SetX(80);
        $pdf->Cell(40, 10, "Attendance Details", 1, 1, 'C');

        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
    }
}



// Select data from MySQL database
$select = "SELECT * FROM `attendance_records` WHERE `roll_no` = '$roll_number' ";
$result = $con->query($select);

while ($row = $result->fetch_object()) {
    $id = $row->id;
    $name = $row->name;
    $roll_no = $row->roll_no;
    $attendance = $row->attendance_status;
    $date = $row->attendance_date;

    $pdf->Cell(45, 10, $name, 1);
    $pdf->Cell(45, 10, $roll_no, 1);
    $pdf->Cell(45, 10, $attendance, 1);
    $pdf->Cell(45, 10, $date, 1);
    $pdf->Ln();
}

$pdf->Output();
