<?php 
session_start(); 

include('../includes/header.php');
include('../config/database.php');
include('../functions/myfunctions.php');

?>

<div class="container">
    <div class="row">
       <div class="col-md-12">
           <?php 
            if(isset($_GET['DRIVER_ID']))
            {
                $DRIVER_ID = $_GET['DRIVER_ID'];
                $drivers = getByID("driver_profile", $DRIVER_ID);

                if(mysqli_num_rows($drivers) > 0)
                {
                    $data = mysqli_fetch_array($drivers);
                    ?>
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4 class="text-white">Edit Driver
                                    <a href="read-drivers.php" class="btn btn-primary float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                    <form action="drivers-code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="DRIVER_ID" value="<?= $data['DRIVER_ID'] ?>">
                                                <label for="">DRIVER_ID</label>
                                                <input type="text" name="DRIVER_ID" value="<?= $data['DRIVER_ID'] ?>" placeholder="Enter Driver ID" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">KIDSDRIV</label>
                                                <input type="text" name="KIDSDRIV" value="<?= $data['KIDSDRIV'] ?>" placeholder="Enter KIDSDRIV" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">AGE</label>
                                                <input type="text" name="AGE" value="<?= $data['AGE'] ?>" placeholder="Enter Driver's age" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">INCOME</label>
                                                <input type="text" name="INCOME" value="<?= $data['INCOME'] ?>" placeholder="Enter Driver's income" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">MSTATUS</label>
                                                <select name="MSTATUS" class="form-control">
                                                    <option value="Yes" <?php if ($data['MSTATUS'] === 'Yes') echo 'selected'; ?>>Yes</option>
                                                    <option value="No" <?php if ($data['MSTATUS'] === 'No') echo 'selected'; ?>>No</option>
                                                </select>                                          
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">GENDER</label>
                                                <select name="GENDER" class="form-control">
                                                    <option value="F" <?php if ($data['GENDER'] === 'F') echo 'selected'; ?>>Yes</option>
                                                    <option value="M" <?php if ($data['GENDER'] === 'M') echo 'selected'; ?>>No</option>
                                                </select> 
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">EDUCATION</label>
                                                <input type="text" name="EDUCATION" value="<?= $data['EDUCATION'] ?>" placeholder="Enter the Education" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">OCCUPATION</label>
                                                <input type="text" name="OCCUPATION" value="<?= $data['OCCUPATION'] ?>" placeholder="Enter the Occupation" class="form-control">
                                            </div>
                                           
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" name="update_driver_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    <?php
                }
                else
                {
                    echo "Driver not found";

                }
            }
            else
            {
                echo "ID missing from URL";

            }
                ?>
       </div>
    </div>
</div>
<?php include('../includes/footer.php') ?>
