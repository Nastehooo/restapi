<?php session_start(); ?>
<?php include('../includes/header.php'); ?>
<?php include('../config/database.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Add Claims </h4>
                </div>
                <div class="card-body">
                    <form action="claims-code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for=""> CAR_ID </label>
                                <input type="text" name="CAR_ID" placeholder="Enter Car's ID" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">CLAIM_FLAG </label>
                                <input type="text" name="CLAIM_FLAG" placeholder="Enter Driver's CLAIM_FLAG (0 or 1)" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""> CLM_AMT </label>
                                <input type="text" name="CLM_AMT" placeholder="Enter Driver's CLM_AMT" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""> CLM_FREQ </label>
                                <input type="text" name="CLM_FREQ" placeholder="Enter Driver's Claim_Frequency" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""> OLDCLAIM </label>
                                <input type="text" name="OLDCLAIM" placeholder="Enter Driver's old claim" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_claims_buttons">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php') ?>
