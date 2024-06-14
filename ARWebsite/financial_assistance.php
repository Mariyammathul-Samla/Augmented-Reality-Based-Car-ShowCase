<?php
include "db.php";
include "header.php";

$showForm = true; // Flag to control the visibility of the form

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $car_price = $_POST['car_price'];
    $down_payment = $_POST['down_payment'];

    // Calculate loan amount
    $loan_amount = $car_price - $down_payment;
    $loan_amount = round($loan_amount); // Round to nearest integer

    // Offer a budget plan
    $monthly_installment = $loan_amount / 60; // Assuming a 5-year loan term (60 months)
    $monthly_installment = round($monthly_installment); // Round to nearest integer

    // Insert data into database
    $sql = "INSERT INTO car_financing_assistance (name, email, phone, car_price, down_payment, loan_amount, monthly_installment)
            VALUES ('$name', '$email', '$phone', '$car_price', '$down_payment', '$loan_amount', '$monthly_installment')";

    if ($con->query($sql) === TRUE) {
        // Display success message using HTML and CSS
        echo "<div class='dialog-box success'>";
        echo "<h2>Hello, $name!</h2>";
        echo "<p>Thank you for your interest. Based on the information provided, here's a budget plan for your car financing:</p>";
        echo "<p>Loan Amount: $loan_amount</p>";
        echo "<p>Monthly Installment (for 5 years): $monthly_installment</p>";
        echo "<p>We'll contact you soon to discuss further details.</p>";
        echo "<button onclick='closeDialog()'>OK</button>";
        echo "</div>";
        
        // Hide the form
        $showForm = false;
    } else {
        // Display error message using HTML and CSS
        echo "<div class='dialog-box error'>";
        echo "<p>Error: " . $sql . "<br>" . $con->error . "</p>";
        echo "<button onclick='closeDialog()'>OK</button>";
        echo "</div>";
    }
}

// Close connection
// $con->close();

?>


<style>
    .formcontainer h2 {
        text-align: center;
        color: #333;
    }

    .testform {
        background-color: peachpuff;
        margin-top: 0px;
    }

   form{
        width: 100%;
    }
    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="time"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    h2 {
        margin-top: 15px;
    }

    textarea {
        resize: vertical;
        /* Allow vertical resizing */
        min-height: 100px;
        /* Set a minimum height */
    }

    button {
        padding: 10px 20px;
        background-color: red;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 25px;
    }

    button:hover {
        background-color: #0056b3;
    }

    .myform {
        width: 50%;
    }

    .mf {
        margin-left: 25%;
    }


    .dialog-box {
        width: 50%;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .success {
        border-color: #4CAF50;
    }

    .error {
        border-color: #f44336;
    }

    .hidden {
        display: none;
    }
   
</style>

<body>
    <div class="form-container">
       
    <form method="post" action="financial_assistance.php" class="testform <?php if (!$showForm) echo 'hidden'; ?>">
            <div class="formcontainer">
                <div class="row">
                    <div class="myform mf">
                    <h2>Car Financing Assistance</h2>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="car_price">Car Price:</label>
                            <input type="number" id="car_price" name="car_price" required>
                        </div>
                        <div class="form-group">
                            <label for="down_payment">Down Payment:</label>
                            <input type="number" id="down_payment" name="down_payment" required>
                        </div>

                        <button type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function closeDialog() {
            // You can redirect to another page or hide the dialog here
            // For demonstration purpose, let's redirect to the homepage
            window.location.href = 'index.php';
        }
    </script>
</body>
<?php include "footer.php"; // Include your footer file 
?>