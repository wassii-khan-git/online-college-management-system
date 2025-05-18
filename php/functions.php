<?php

include("connection.php");


// function to get data 
function get_data($query){

    global $con;

    $response = array();

    if($query !== ""){
        $result = mysqli_query($con , $query);
        $rows = mysqli_num_rows($result);
        if($rows > 0){
            while($fetched_records = mysqli_fetch_assoc($result)){

                 $response[] = $fetched_records;

            }
        }
    }

    return $response;
}


// function to get data 
function get_number_of_rows($query){

    global $con;

    if($query !== ""){
        $result = mysqli_query($con , $query);
        $rows = mysqli_num_rows($result);
        if($rows > 0){
             return $rows;
        }
    }
}

function addRecord($query){
    global $con;

    if($query !== ""){
        $result = mysqli_query($con , $query);
        if($result){
             return true;
        }else {
            return false;
        }
    }
}

function update($query){
    global $con;

    if($query !== ""){
        $result = mysqli_query($con , $query);
        if($result){
             return true;
        }else {
            return false;
        }
    }
}