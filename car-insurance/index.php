<?php 
include('functions/myfunctions.php'); 
include('header.php'); 

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">directions_car</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Total Cars</p>
                                <h4 class="mb-0">
                                    <?php
                                        $totalCars = getAllCars();
                                        echo mysqli_num_rows($totalCars);
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">emoji_people</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Total Claims</p>
                                <h4 class="mb-0">
                                    <?php
                                        $totalClaims = getAllClaims();
                                        echo mysqli_num_rows($totalClaims);
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">people</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Total Drivers</p>
                                <h4 class="mb-0">
                                    <?php
                                        $totalDrivers = GetAllDrivers();
                                        echo mysqli_num_rows($totalDrivers);
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <!-- Gender Influence on Claims Chart -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Gender Influence on Claims</h4>
                </div>
                <div class="card-body">
                    <canvas id="genderInfluenceChart" style="width: 300px; height: 300px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Claim Frequency by Age Group Chart -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Claim Frequency by Age Group</h4>
                </div>
                <div class="card-body">
                    <canvas id="claimFrequencyChart" style="width: 300px; height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Get data for gender influence on claims
    var genderData = <?php echo json_encode(getGenderInfluenceData()); ?>;

    // Extract labels and data
    var labels = Object.keys(genderData);
    var data = Object.values(genderData);

    // Create pie chart for gender influence on claims
    var ctx = document.getElementById('genderInfluenceChart').getContext('2d');
    var genderInfluenceChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                ]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Gender Influence on Claims'
            }
        }
    });

    // Get data for claim frequency by age group
    var claimFrequencyData = <?php echo json_encode(getClaimFrequencyByAgeGroup()); ?>;

    // Extract labels and data
    var claimFrequencyLabels = Object.keys(claimFrequencyData);
    var claimFrequencyValues = Object.values(claimFrequencyData);

    // Create bar chart for claim frequency by age group
    var ctxClaimFrequency = document.getElementById('claimFrequencyChart').getContext('2d');
    var claimFrequencyChart = new Chart(ctxClaimFrequency, {
        type: 'bar',
        data: {
            labels: claimFrequencyLabels,
            datasets: [{
                label: 'Claim Frequency',
                data: claimFrequencyValues,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Claim Frequency' 
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Age Group' 
                    }
                }]
            },
            title: {
                display: true,
                text: 'Claim Frequency by Age Group'
            }
        }
    });

</script>

<?php

include('footer.php');


?>
