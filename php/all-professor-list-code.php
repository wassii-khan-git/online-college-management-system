

// datatable all professor code
<table id="example3" class="display" style="min-width: 845px">
<thead>
    <tr>
        <th>Id</th>
        <th>Profile</th>
        <th>Name</th>
        <th>Department</th>
        <th>Gender</th>
        <th>Education</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Joining Date</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php

    // <!-- php code for retrieving data from database -->

    require_once "./php/connection.php";

    $retrieve_query = "SELECT * FROM `professors`";
    $retrieve_query_result = mysqli_query($con, $retrieve_query);
    $row = mysqli_num_rows($retrieve_query_result);

    if ($row > 0) {
        while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {

    ?>
            <tr>
                <td class="sorting_asc_disabled sorting_desc_disabled sorting_1_disabled "><?php echo $fetch_record['id'] ?></td>
                <td><img class="rounded-circle" width="35" src="./uploads/<?php echo $fetch_record['image'] ?>" alt=""></td>
                <td><?php echo $fetch_record['firstname'] . ' ' . $fetch_record['lastname'] ?></td>
                <td><?php echo $fetch_record['department'] ?></td>
                <td><?php echo $fetch_record['gender'] ?></td>
                <td><?php echo $fetch_record['education'] ?></td>
                <td><a href="javascript:void(0);"><strong><?php echo $fetch_record['mobile_number'] ?></strong></a></td>
                <td><a href="javascript:void(0);"><strong><?php echo $fetch_record['email'] ?></strong></a></td>
                <td><?php echo $fetch_record['joining_data'] ?></td>

                <td>
                    <a href="professor-profile.php?id=<?php echo $fetch_record['id']; ?>" class="edit btn btn-sm btn-success"><i class="la la-user"></i></a>
                    <a href="edit-professor.php?id=<?php echo $fetch_record['id']; ?>" class="edit btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                    <button type="submit" data-toggle="modal" class="delete btn btn-sm btn-danger" data-target="#delete_modal"><i class="la la-trash"></i></button>

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



<!-- fee code -->
<?php

// <!-- php code for retrieving data from database -->

require_once "./php/connection.php";
require_once "./php/config.php";

$retrieve_query = "SELECT * FROM `fees`";
$retrieve_query_result = mysqli_query($con, $retrieve_query);
$row = mysqli_num_rows($retrieve_query_result);

if ($row > 0) {
    while ($fetch_record = mysqli_fetch_assoc($retrieve_query_result)) {

?>
        <tr>
            <td class="sorting_asc_disabled sorting_desc_disabled sorting_1_disabled "><?php echo $fetch_record['roll_no'] ?></td>
            <td><?php echo $fetch_record['student_name']?></td>
            <td><?php echo $fetch_record['fee_type'] ?></td>
            <td><a href="javascript:void(0);"><strong><?php echo $fetch_record['fee_type'] ?></strong></a></td>
            <td><a href="javascript:void(0);"><strong><?php echo $fetch_record['status'] ?></strong></a></td>
            <td><?php echo $fetch_record['collection_date'] ?></td>
            <td><?php echo $fetch_record['amount'] ?>$</td>

        </tr>

<?php
    }
} else {
    echo "<h1>No Record Found!</h1>";
}

?>