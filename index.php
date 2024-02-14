<html lang="en">
<head>
    <title>User Registration Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
if(isset($_GET['status'])):

$status=$_GET['status'];
if($status==1):
?>
<div class="success">
    <span class="closebtn">&times;</span>
    <strong>Saved successfully...
</div>
<?php endif; ?>

<?php if($status==0): ?>
<div class="alert">
    <span class="closebtn">&times;</span>
    <strong>Error while saving date , Try Again.
</div>
<?php endif; ?>

<?php endif; ?>

<a href="list.php">View Users</a>
<div class="form-container">
    <form action="save.php" method="post" onsubmit="return validateEmail()">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" pattern="[A-Za-z]+" autocomplete="off" required>
            <span class="ClsSpanMsg">Note : Letters only (Without space and special characters)</span>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" autocomplete="off" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"  name="password" required>
            <span class="ClsSpanMsg">Note : Minimum 8 characters with at least 1 lowercase, 1 uppercase, and 1 special character</span>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Enter a valid email address" required>
            <span class="ClsSpanMsg">Note : Should be a valid email address, eg: tharun@gmail.com</span>
        </div>

        <div class="form-group">
            <label for="password">Date Of Birth:</label>
            <input type="date" id="date_of_birth" autocomplete="off" name="date_of_birth" required>
        </div>

        <div class="form-group">
            <label for="password">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" autocomplete="off" pattern="[0-9]{10}" required>
            <span class="ClsSpanMsg">Note : Number only and 10 chars (Without space and digits)</span>
        </div>

        <div class="form-group">
            <label for="password">URL :</label>
            <input type="url" id="site_url" name="site_url" title="Enter a valid URL" required>
            <span class="ClsSpanMsg">Note : Should be a valid URLL</span>
        </div>

        <div class="form-group">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>

</body>
</html>

<script>

    function validateEmail() {
        var emailInput = document.getElementById('email');
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegex.test(emailInput.value)) {
            alert('Enter a valid email address')
            return false;
        } else {
            return true;
        }
    }

</script>

