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
            if(isset($_GET['CAR_ID']))
            {
                $CAR_ID = $_GET['CAR_ID'];
                $cars = getsByID("claims_details", $CAR_ID);

                if(mysqli_num_rows($cars) > 0)
                {
                    $data = mysqli_fetch_array($cars);
                    ?>
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4 class="text-white">Edit Claims
                                    <a href="read-claims.php" class="btn btn-primary float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                    <form action="claims-code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="CAR_ID" value="<?= $data['CAR_ID'] ?>">
                                                <label for="">CAR_ID</label>
                                                <input type="text" name="CAR_ID" value="<?= $data['CAR_ID'] ?>" placeholder="Enter Car's ID" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">CLAIM_FLAG</label>
                                                <input type="text" name="CLAIM_FLAG" value="<?= $data['CLAIM_FLAG'] ?>" placeholder="Enter Driver's CLAIM_FLAG" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">CLM_AMT</label>
                                                <input type="text" name="CLM_AMT" value="<?= $data['CLM_AMT'] ?>" placeholder="Enter Driver's CLM_AMT" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">CLM_FREQ></label>
                                                <input type="text" name="CLM_FREQ" value="<?= $data['CLM_FREQ'] ?>" placeholder="Enter Driver's Claim_Frequency" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">OLDCLAIM></label>
                                                <input type="text" name="OLDCLAIM" value="<?= $data['OLDCLAIM'] ?>" placeholder="Enter Driver's old claim" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" name="update_claims_buttons">Update</button>
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
