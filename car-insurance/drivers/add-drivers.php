<?php session_start(); ?>
<?php include('../includes/header.php'); ?>
<?php include('../config/database.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Add Drivers </h4>
                </div>
                <div class="card-body">
                    <form action="drivers-code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for=""> DRIVER_ID </label>
                                <input type="text" name="DRIVER_ID" placeholder="Enter Driver ID" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""> KIDSDRIV </label>
                                <input type="text" name="KIDSDRIV" placeholder="Enter KIDSDRIV" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""> AGE </label>
                                <input type="text" name="AGE" placeholder="Enter Driver's age" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""> INCOME </label>
                                <input type="text" name="INCOME" placeholder="Enter Driver's income" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""> MSTATUS </label>
                                <select name="MSTATUS" class="form-control">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                </select>  
                            </div>
                            <div class="col-md-6">
                                <label for=""> GENDER </label>
                                <select name="GENDER" class="form-control">
                                        <option value="F">F</option>
                                        <option value="M">M</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for=""> EDUCATION </label>
                                <input type="text" name="EDUCATION" placeholder="Enter the Highest Education" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""> OCCUPATION </label>
                                <input type="text" name="OCCUPATION" placeholder="Enter Driver's occupation" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_driver_buttons">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php') ?>
