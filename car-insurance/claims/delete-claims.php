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
                $claims = getsByID("claims_details", $CAR_ID);   

                if(mysqli_num_rows($claims) > 0)
                {
                    $data = mysqli_fetch_array($claims);
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
                                                <input type="text" name="CLAIM_FLAG" value="<?= $data['CLAIM_FLAG'] ?>" placeholder="Enter Claim Flag" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">CLM_AMT</label>
                                                <input type="text" name="CLM_AMT" value="<?= $data['CLM_AMT'] ?>" placeholder="Enter Claim Amount" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">CLM_FREQ</label>
                                                <input type="text" name="CLM_FREQ" value="<?= $data['CLM_FREQ'] ?>" placeholder="Enter Claim Frequency" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">OLDCLAIM</label>
                                                <input type="text" name="OLDCLAIM" value="<?= $data['OLDCLAIM'] ?>" placeholder="Enter Old Claim" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-danger" name="delete_claims_button">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    <?php
                }
                else
                {
                    echo "Claims not found";
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
