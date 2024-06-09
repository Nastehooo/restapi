<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


include(__DIR__ . '/../config/database.php');




// Function to retrieve all cars from the database
function getAllCars() {
    global $con;
    $sql = "SELECT * FROM car_details";
    $result = mysqli_query($con, $sql);
    return $result;
}

// Function to retrieve all claims from the database
function getAllClaims() {
    global $con;
    $sql = "SELECT * FROM claims_details";
    $result = mysqli_query($con, $sql);
    return $result;
}

// Function to retrieve all drivers from the database
function GetAllDrivers() {
    global $con;
    $sql = "SELECT * FROM driver_profile";
    $result = mysqli_query($con, $sql);
    return $result;
}

// Function to get all records from a given table
function getAll($table){
    global $con;
    // Prepare the SQL statement to prevent SQL injection
    $stmt = mysqli_prepare($con, "SELECT * FROM $table");
    // Execute the query
    mysqli_stmt_execute($stmt);
    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}

// Function to get a record by ID from a given table
function getByID($table, $DRIVER_ID){
    global $con;
    // Prepare the SQL statement to prevent SQL injection
    $stmt = mysqli_prepare($con, "SELECT * FROM $table WHERE DRIVER_ID = ?");
    // Bind the DRIVER_ID parameter
    mysqli_stmt_bind_param($stmt, 'i', $DRIVER_ID);
    // Execute the query
    mysqli_stmt_execute($stmt);
    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}

function getsByID($table, $CAR_ID){
    global $con;
    // Prepare the SQL statement to prevent SQL injection
    $stmt = mysqli_prepare($con, "SELECT * FROM $table WHERE CAR_ID = ?");
    // Bind the CAR_ID parameter
    mysqli_stmt_bind_param($stmt, 'i', $CAR_ID);
    // Execute the query
    mysqli_stmt_execute($stmt);
    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}

// Function to redirect to a given URL with a message
function redirect($url, $message){
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

// Function to retrieve gender influence on claims from the database
function getGenderInfluenceData() {
    global $con;
    
    // Initialize counters for each gender
    $maleClaims = 0;
    $femaleClaims = 0;
    
    // SQL query to retrieve gender information from driver_profiles table
    $sql = "SELECT GENDER FROM driver_profile";
    $result = mysqli_query($con, $sql);
    
    // Loop through the results to count claims by gender
    while ($row = mysqli_fetch_assoc($result)) {
        // Increment the respective counter based on gender
        if ($row['GENDER'] === 'Male' || $row['GENDER'] === 'M') {
            $maleClaims++;
        } elseif ($row['GENDER'] === 'Female' || $row['GENDER'] === 'F') {
            $femaleClaims++;
        }
    }
    
    // Calculate total number of drivers
    $totalDrivers = $maleClaims + $femaleClaims;
    
    // Calculate percentage of claims by gender
    $malePercentage = ($totalDrivers > 0) ? ($maleClaims / $totalDrivers) * 100 : 0;
    $femalePercentage = ($totalDrivers > 0) ? ($femaleClaims / $totalDrivers) * 100 : 0;
    
    // Return data as an associative array
    return [
        'Male' => $malePercentage,
        'Female' => $femalePercentage
    ];
}

// Function to retrieve claim frequency by age group from the database
function getClaimFrequencyByAgeGroup() {
    global $con;
    
    // Initialize arrays to store claim frequency by age group
    $claimFrequencyByAge = [];
    
    // SQL query to retrieve age and claim data from driver_profile and claims_details tables
    $sql = "SELECT dp.AGE, COUNT(*) AS claim_count
            FROM driver_profile dp
            INNER JOIN car_details card ON dp.DRIVER_ID = card.DRIVER_ID
            INNER JOIN claims_details cd ON card.CAR_ID = cd.CAR_ID
            GROUP BY dp.AGE";

    $result = mysqli_query($con, $sql);
    
    // Loop through the results and categorize individuals into age groups
    while ($row = mysqli_fetch_assoc($result)) {
        $ageGroup = determineAgeGroup($row['AGE']);
        $claimFrequencyByAge[$ageGroup] = $row['claim_count'];
    }
    
    // Sort the claim frequency by age group
    ksort($claimFrequencyByAge);

    return $claimFrequencyByAge;
}

// Helper function to determine age group based on age
function determineAgeGroup($age) {
    if ($age >= 18 && $age <= 25) {
        return '18-25';
    } elseif ($age >= 26 && $age <= 35) {
        return '26-35';
    } elseif ($age >= 36 && $age <= 45) {
        return '36-45';
    } elseif ($age >= 46 && $age <= 55) {
        return '46-55';
    } elseif ($age >= 56 && $age <= 65) {
        return '56-65';
    } else {
        return '66+';
    }
}


?>


