<?php
include('../config/database.php');
include('../includes/header.php');

// Pagination variables
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Current page number
$offset = ($page - 1) * $limit; // Offset for SQL query

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Drivers</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>DRIVER_ID</th>
                                <th>KIDSDRIV</th>
                                <th>AGE</th>
                                <th>INCOME</th>
                                <th>MSTATUS</th>
                                <th>GENDER</th>
                                <th>EDUCATION</th>
                                <th>OCCUPATION</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Modified SQL query with pagination
                            $sql = "SELECT * FROM driver_profile LIMIT $offset, $limit";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?= $row['DRIVER_ID']; ?></td>
                                        <td><?= $row['KIDSDRIV']; ?></td>
                                        <td><?= $row['AGE']; ?></td>
                                        <td><?= $row['INCOME']; ?></td>
                                        <td><?= $row['MSTATUS']; ?></td>
                                        <td><?= $row['GENDER']; ?></td>
                                        <td><?= $row['EDUCATION']; ?></td>
                                        <td><?= $row['OCCUPATION']; ?></td>
                                        <td>
                                            <a href="edit-drivers?DRIVER_ID=<?= $row['DRIVER_ID']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <a href="delete-drivers?DRIVER_ID=<?= $row['DRIVER_ID']; ?>" class="btn btn-sm btn-primary">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='9'>No records found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Pagination links with arrows
$sql = "SELECT COUNT(*) AS total_records FROM driver_profile";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total_records'];
$total_pages = ceil($total_records / $limit);

if ($total_pages > 1) {
    echo '<div class="container"><ul class="pagination justify-content-center">';
    if ($page > 1) {
        echo '<li class="page-item"><a class="page-link" href="drivers/read-drivers?page=' . ($page - 1) . '">&laquo;</a></li>';
    }

    $start_page = max($page - 2, 1);
    $end_page = min($page + 2, $total_pages);

    if ($start_page > 1) {
        echo '<li class="page-item"><a class="page-link" href="read-drivers?page=1">1</a></li>';
        if ($start_page > 2) {
            echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
        }
    }

    for ($i = $start_page; $i <= $end_page; $i++) {
        echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '"><a class="page-link" href="read-drivers?page=' . $i . '">' . $i . '</a></li>';
    }

    if ($end_page < $total_pages) {
        if ($end_page < $total_pages - 1) {
            echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
        }
        echo '<li class="page-item"><a class="page-link" href="read-drivers?page=' . $total_pages . '">' . $total_pages . '</a></li>';
    }

    if ($page < $total_pages) {
        echo '<li class="page-item"><a class="page-link" href="read-drivers?page=' . ($page + 1) . '"> &raquo;</a></li>';
    }
    echo '</ul></div>';
}

include('../includes/footer.php');
?>
