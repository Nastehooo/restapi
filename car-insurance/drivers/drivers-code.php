<?php

include('../config/database.php');
include('../functions/myfunctions.php');


if(isset($_POST['add_driver_buttons']))
{
    // Retrieve data from the form
    $DRIVER_ID = mysqli_real_escape_string($con, $_POST['DRIVER_ID']);
    $KIDSDRIV = mysqli_real_escape_string($con, $_POST['KIDSDRIV']);
    $AGE = mysqli_real_escape_string($con, $_POST['AGE']);
    $INCOME = mysqli_real_escape_string($con, $_POST['INCOME']);
    $MSTATUS = mysqli_real_escape_string($con, $_POST['MSTATUS']);
    $GENDER = mysqli_real_escape_string($con, $_POST['GENDER']);
    $EDUCATION = mysqli_real_escape_string($con, $_POST['EDUCATION']);
    $OCCUPATION = mysqli_real_escape_string($con, $_POST['OCCUPATION']);

    // Insert data into the database
    $cate_query = "INSERT INTO driver_profile 
    (DRIVER_ID,KIDSDRIV,AGE,INCOME,MSTATUS,GENDER,EDUCATION,OCCUPATION) 
    VALUES ('$DRIVER_ID','$KIDSDRIV','$AGE','$INCOME','$MSTATUS','$GENDER','$EDUCATION','$OCCUPATION')";

    if(mysqli_query($con, $cate_query))
    {
        // Redirect with success message
        redirect("add-drivers", "Driver Added Successfully");
    }
    else
    {
        // Redirect with error message
        redirect("add-drivers", "Something Went Wrong");
    }
}
else if(isset($_POST['update_driver_btn']))
{
    // Retrieve data from the form
    $DRIVER_ID = mysqli_real_escape_string($con, $_POST['DRIVER_ID']);
    $KIDSDRIV = mysqli_real_escape_string($con, $_POST['KIDSDRIV']);
    $AGE = mysqli_real_escape_string($con, $_POST['AGE']);
    $INCOME = mysqli_real_escape_string($con, $_POST['INCOME']);
    $MSTATUS = mysqli_real_escape_string($con, $_POST['MSTATUS']);
    $GENDER = mysqli_real_escape_string($con, $_POST['GENDER']);
    $EDUCATION = mysqli_real_escape_string($con, $_POST['EDUCATION']);
    $OCCUPATION = mysqli_real_escape_string($con, $_POST['OCCUPATION']);


    // Update data in the database
    $update_query = "UPDATE driver_profile 
                    SET  KIDSDRIV = '$KIDSDRIV', 
                         AGE = '$AGE', 
                         INCOME = '$INCOME' ,
                         MSTATUS = '$MSTATUS' ,
                         GENDER = '$GENDER' ,
                         EDUCATION = '$EDUCATION' ,
                         OCCUPATION = '$OCCUPATION'
                    WHERE DRIVER_ID = '$DRIVER_ID'";

    if(mysqli_query($con, $update_query))
    {
        // Redirect with success message
        redirect("edit-drivers?DRIVER_ID=$DRIVER_ID", "Driver Profile Updated Successfully");
    }
    else
    {
        // Redirect with error message
        redirect("edit-drivers?DRIVER_ID=$DRIVER_ID", "Something Went Wrong");
    }
}

else if(isset($_POST['delete_driver_button']))
{

    $DRIVER_ID = mysqli_real_escape_string($con, $_POST['DRIVER_ID']);

    // Delete the car entry from the database
    $delete_query = "DELETE FROM driver_profile WHERE DRIVER_ID = '$DRIVER_ID'";

    if(mysqli_query($con, $delete_query))
    {
       
        redirect("read-drivers", "Driver Profile Deleted Successfully");
        
    }
    else
    {
      
        redirect("read-drivers", "Failed to Delete Drivers Profile");
    }

    }
?>



