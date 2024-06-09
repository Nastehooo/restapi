<?php

include('../config/database.php');
include('../functions/myfunctions.php');

if(isset($_POST['add_claims_buttons']))
{
    // Retrieve data from the form
    $CAR_ID = mysqli_real_escape_string($con, $_POST['CAR_ID']);
    $CLAIM_FLAG = mysqli_real_escape_string($con, $_POST['CLAIM_FLAG']);
    $CLM_AMT = mysqli_real_escape_string($con, $_POST['CLM_AMT']);
    $CLM_FREQ = mysqli_real_escape_string($con, $_POST['CLM_FREQ']);
    $OLDCLAIM = mysqli_real_escape_string($con, $_POST['OLDCLAIM']);

    // Validate CLAIM_FLAG
    if ($CLAIM_FLAG !== '0' && $CLAIM_FLAG !== '1') {
        // Debugging statement to see the value of $CLAIM_FLAG
        echo "CLAIM_FLAG value is: " . $CLAIM_FLAG;
        
        // Redirect with error message
        redirect("add-claims", "CLAIM_FLAG must be 0 or 1");
        exit(); // Stop further execution
    }
    
    // Insert data into the database
    $cate_query = "INSERT INTO claims_details
    (CAR_ID, CLAIM_FLAG, CLM_AMT, CLM_FREQ, OLDCLAIM) 
    VALUES ('$CAR_ID', '$CLAIM_FLAG', '$CLM_AMT', '$CLM_FREQ', '$OLDCLAIM')";

    if(mysqli_query($con, $cate_query))
    {
        // Redirect with success message
        redirect("add-claims", "Claim Added Successfully");
    }
    else
    {
        // Redirect with error message
        redirect("add-claims", "Something Went Wrong");
    }
}

else if(isset($_POST['update_claims_buttons']))
{
    // Retrieve data from the form
    $CAR_ID = mysqli_real_escape_string($con, $_POST['CAR_ID']);
    $CLAIM_FLAG = mysqli_real_escape_string($con, $_POST['CLAIM_FLAG']);
    $CLM_AMT = mysqli_real_escape_string($con, $_POST['CLM_AMT']);
    $CLM_FREQ = mysqli_real_escape_string($con, $_POST['CLM_FREQ']);
    $OLDCLAIM = mysqli_real_escape_string($con, $_POST['OLDCLAIM']);

    // Validate CLAIM_FLAG
    if ($CLAIM_FLAG !== '0' && $CLAIM_FLAG !== '1') {
        // Debugging statement to see the value of $CLAIM_FLAG
        echo "CLAIM_FLAG value is: " . $CLAIM_FLAG;
        
        // Redirect with error message
        redirect("add-claims", "CLAIM_FLAG must be 0 or 1");
        exit(); // Stop further execution
    }



    // Update data in the database
    $update_query = "UPDATE claims_details 
                    SET  CLAIM_FLAG = '$CLAIM_FLAG', 
                         CLM_AMT = '$CLM_AMT', 
                         CLM_FREQ = '$CLM_FREQ', 
                         OLDCLAIM = '$OLDCLAIM'
                    WHERE CAR_ID = '$CAR_ID'";

    if(mysqli_query($con, $update_query))
    {
        // Redirect with success message
        redirect("edit-claims?CAR_ID=$CAR_ID", "Claims Details Updated Successfully");
    }
    else
    {
        // Redirect with error message
        redirect("edit-claims?CAR_ID=$CAR_ID", "Something Went Wrong");
    }
}


else if(isset($_POST['delete_claims_button']))
{
    $CAR_ID = mysqli_real_escape_string($con, $_POST['CAR_ID']);

    // Delete the car entry from the database
    $delete_query = "DELETE FROM claims_details WHERE CAR_ID = '$CAR_ID'";

    if(mysqli_query($con, $delete_query))
    {

        redirect("read-claims", "Claims Details Deleted Successfully");
    }
    else
    {

        redirect("read-claims", "Failed to Delete Claims Details");
    }
}
?>


