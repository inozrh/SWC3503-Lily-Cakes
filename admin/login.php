<?php
// Include constant.php file which contains site configurations
include ('../constant/constant.php');
?>

<html>
<head>
<title>Login Lily's Cakes as Admin</title>
<!-- Link to the admin.css stylesheet for styling -->
<link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="login">
        <!-- Title for the login page -->
        <h1 class="text-center">Admin Login</h1>
        <br>

        <?php
        // Check if there's a login session, indicating a failed login attempt
        if(isset($_SESSION['login']))
        {
            // Display any login error message and unset the session variable
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br>

        <!-- Login form -->
        <form action="" method="POST" class="text-center">
            Username:<br>
            <!-- Input field for username -->
            <input type="text" name="admin_username" placeholder="Username"><br><br>

            Password:<br>
            <!-- Input field for password -->
            <input type="password" name="admin_password" placeholder="Password"><br><br>

            <!-- Submit button to submit the form -->
            <input type="submit" name="submit" value="Log In" class="btn-primary">
        </form>
        <br>
        <!-- End of login form -->

        <!-- Copyright notice -->
        <p class="text-center">&copy; Lily's Cakes Website</p>
    </div>
</body>
</html>

<?php
// Function to sanitize input data to prevent SQL injection and XSS attacks
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the login form is submitted
if(isset($_POST['submit']))
{
    // Sanitize and retrieve data from the form
    $admin_username = sanitize_input($_POST['admin_username']);
    $admin_password = sanitize_input(md5($_POST['admin_password'])); // Hashing the password with md5

    // Prepare SQL query to select admin with provided username and password
    $query = $connect->prepare("SELECT * FROM admin WHERE admin_username = ? AND admin_password = ?");
    $query->bind_param("ss", $admin_username, $admin_password);

    // Execute prepared statement
    $query->execute();

    // Fetch result
    $result = $query->get_result();

    // Get number of rows
    $count = $result->num_rows;

    // Check if there's any matching user
    if($count > 0)
    {
        // User exists, set success message in session
        $_SESSION['login'] = "<div class='success'>Welcome Back!</div>";

        // Redirect to admin.php upon successful login
        header('location:' . SITEURL . 'admin/');
    }
    else
    {
        // User doesn't exist, set error message in session
        $_SESSION['login'] = "<div class='error'>Failed to login. This is to prevent SQL injection and XSS attacks.</div>";

        // Redirect back to login.php
        header('location:' . SITEURL . 'admin/error-page.php');
    }
}
?>
