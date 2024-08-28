<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form id="myForm">
        <h1>Welcome Visitors</h1>
        <div>
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" placeholder="First Name">
        </div>
        <div>
            <label for="mname">Middle Name</label>
            <input type="text" name="mname" id="mname" placeholder="Middle name">
        </div>
        <div>
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" placeholder="Last name">
        </div>
        <div>
                <label for="gender">Gender</label>
                <input type="text" name="gender" id="gender" placeholder="Gender">
            </div>
            <div>
                <label for="birth">Birthdate</label>
                <input type="date" name="birth" id="birth" placeholder="Birthdate">
            </div>
            <div>
                <label for="age">Age</label>
                <input type="number" name="age" id="age" placeholder="Age">
            </div>
        <div>
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" placeholder="Email Address">
        </div>
        <div>
            <label for="uname">Username</label>
            <input type="text" name="uname" id="uname" placeholder="Username">
        </div>
        <div>
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass" placeholder="Password">
        </div>
        <div class="btn">
            <button type="submit">Submit</button>
            <button type="Reset"class="reset">Reset</button>
        </div>
        
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(e) {
                e.preventDefault();

                const formData = $(this).serialize();

                console.log(formData);

                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: formData,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error, xhr, status) {
                        console.log("Error!");
                    }
                });
            });

            // // View Records button click handler
            // $("#viewRecords").click(function() {
            //     window.location.href = "modify.php";
            // });
        });
    </script>
</body>
</html>
