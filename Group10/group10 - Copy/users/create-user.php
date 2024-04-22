<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Reset default margin and padding */
        html, body, div, h1, h2, p, a, input, select, option, label {
            margin: 0;
            padding: 0;
        }

        /* Set font family */
        body {
            font-family: 'Assistant', sans-serif;
        }

        /* Form block styling */
        #form-block {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        #form-block h3 {
            margin-bottom: 20px;
        }

        /* Form block half styling */
        #form-block-half {
            width: 50%;
            float: left;
        }

        .input,
        select {
            width: calc(100% - 22px); /* Adjusted width to account for padding */
            padding: 10px; /* Adjusted padding */
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Button block styling */
        #button-block {
            clear: both;
            text-align: center;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        label {
            margin-bottom: 5px;
            display: block;
        }

        #button-block a {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        #button-block a:hover {
            background-color: #2980b9;
        }
    </style>
<center><h3>Register Here!!</h3></center>
<div id="form-block">
    <form method="POST" action="processes/process.user.php?action=new">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name..">

            <label for="access">Access Level</label>
            <select id="access" name="access">
            <option value="Admin">Admin</option>
            </select>

            <label for="nname">Nick Name</label>
            <input type="text" id="nname" class="input" name="nickname" placeholder="Your nickname..">
        </div>
        <div id="form-block-half">
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email..">

            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password..">

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password..">
            
            </div>
            <div id="button-block">
                <input type="submit" value="Save" onclick="return confirmSave()">
                <a href="./login.php">Back</a>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            var fname = document.getElementById("fname").value;
            var lname = document.getElementById("lname").value;
            var access = document.getElementById("access").value;
            var nname = document.getElementById("nname").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmpassword").value;

            // Check if any field is empty
            if (fname === '' || lname === '' || access === '' || nname === '' || email === '' || password === '' || confirmPassword === '') {
                alert("Please fill in all fields.");
                return false; // Prevent form submission
            }
            
            // Check if password and confirm password match
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false; // Prevent form submission
            }

            // If all validation passed, allow form submission
            return true;
        }

        function confirmSave() {
            // Add any confirmation logic here if needed
            return true;
        }
    </script>
  </form>
</div>