<?php
// Include database connection
include "db.php";

// Include header
include "header.php";
?>
<style>
    /* Table styles */
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    /* Card styles */
    .card {
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
        background-color: #fff;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #f8f9fa;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card-title {
        margin-bottom: 0.25rem;
    }

    .card-body {
        padding: 1.25rem;
    }
</style>

<div class="card">
    <div class="card-header card-header-primary">
        <!-- <h4 class="card-title">Products List</h4> -->
    </div>
    <div class="card-body">
        <div class="table-responsive ps">
            <table class="table table-hover">
                <thead class="text-primary">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch latest products
                    $result = mysqli_query($con, "SELECT product_id, product_image, product_title, product_price FROM products ORDER BY product_id DESC LIMIT 10");

                    // Check for errors
                    if (!$result) {
                        echo "<tr><td colspan='3'>Database query failed: " . mysqli_error($con) . "</td></tr>";
                    } else {
                        // Check if any rows are returned
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $image = $row['product_image'];
                                $product_name = substr($row['product_title'], 0, 36);
                                $price = $row['product_price'];

                                echo "<tr>
                                    <td><img src='product_images/$image' style='width:50px; height:50px; border: 1px solid #ddd;'></td>
                                    <td>$product_name</td>
                                    <td>RS $price</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No products found.</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
// Include footer
include "footer.php";
?>
