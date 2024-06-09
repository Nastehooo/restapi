<?php

include('../config/database.php');
include('../functions/myfunctions.php');

if(isset($_POST['add_cars_buttons']))
{
    // Retrieve data from the form
    $CAR_ID = mysqli_real_escape_string($con, $_POST['CAR_ID']);
    $CAR_TYPE = mysqli_real_escape_string($con, $_POST['CAR_TYPE']);
    $RED_CAR = mysqli_real_escape_string($con, $_POST['RED_CAR']);
    $CAR_AGE = mysqli_real_escape_string($con, $_POST['CAR_AGE']);
    $DRIVER_ID = mysqli_real_escape_string($con, $_POST['DRIVER_ID']);

    // Insert data into the database
    $cate_query = "INSERT INTO car_details
    (CAR_ID, CAR_TYPE, RED_CAR, CAR_AGE, DRIVER_ID) 
    VALUES ('$CAR_ID','$CAR_TYPE','$RED_CAR','$CAR_AGE', '$DRIVER_ID')";

    if(mysqli_query($con, $cate_query))
    {
        // Redirect with success message
        redirect("add-cars", "Driver Added Successfully");
    }
    else
    {
        // Redirect with error message
        redirect("add-cars", "Something Went Wrong");
    }
}

else if(isset($_POST['update_cars_buttons']))
{
    // Retrieve data from the form
    $CAR_ID = mysqli_real_escape_string($con, $_POST['CAR_ID']);
    $CAR_TYPE = mysqli_real_escape_string($con, $_POST['CAR_TYPE']);
    $RED_CAR = mysqli_real_escape_string($con, $_POST['RED_CAR']);
    $CAR_AGE = mysqli_real_escape_string($con, $_POST['CAR_AGE']);
    $DRIVER_ID = mysqli_real_escape_string($con, $_POST['DRIVER_ID']);

    // Update data in the database
    $update_query = "UPDATE car_details 
                    SET CAR_TYPE = '$CAR_TYPE', 
                        RED_CAR = '$RED_CAR', 
                        CAR_AGE = '$CAR_AGE',
                        DRIVER_ID = '$DRIVER_ID'
                    WHERE CAR_ID = '$CAR_ID'";

    if(mysqli_query($con, $update_query))
    {
        // Redirect with success message
        redirect("edit-cars?CAR_ID=$CAR_ID", "Car Details Updated Successfully");
    }
    else
    {
        // Redirect with error message
        redirect("edit-cars?CAR_ID=$CAR_ID", "Something Went Wrong");
    }
}

else if(isset($_POST['delete_car_button']))
{
    $CAR_ID = mysqli_real_escape_string($con, $_POST['CAR_ID']);

    // Delete the car entry from the database
    $delete_query = "DELETE FROM car_details WHERE CAR_ID = '$CAR_ID'";

    if(mysqli_query($con, $delete_query))
    {

        redirect("read-cars", "Car Details Deleted Successfully");
    }
    else
    {

        redirect("read-cars", "Failed to Delete Car Details");
    }
}

?>


