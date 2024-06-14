<?php
// Database connection parameters
include "db.php";


include "header.php";

if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
   
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Insert data into database
    $query = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Success message
        echo "<script>alert('Submitted successfully. We will contact you shortly.')</script>";
    } else {
        // Error message
        echo "<script>alert('Failed to submit request. Please try again.')</script>";
    }
}
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
        text-align: center;
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

        <form method="post" action="contactus.php" class="testform >
            <div class=" formcontainer">
            <div class="row">
                <div class="myform mf">
                    <h2>Contact Us</h2>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="message" class="label-message">Message:</label>
                        <textarea id="message" name="message" rows="4" cols="50" class="input-message"></textarea>
                       
                        <br><br>
                    </div>

                    <button type="submit" name="submit">Submit</button>
                </div>
            </div>
    </div>
    </form>
    </div>

</body>

<?php include "footer.php"; ?>


