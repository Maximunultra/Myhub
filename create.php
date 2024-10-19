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
        <h1>Registration</h1>
        <div>
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" placeholder="First Name" autocomplete="off">
        </div>
        <div>
            <label for="mname">Middle Name</label>
            <input type="text" name="mname" id="mname" placeholder="Middle name" autocomplete="off">
        </div>
        <div>
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" placeholder="Last name" autocomplete="off">
        </div>
        <div>
                <label for="gender">Gender</label>
                <input type="text" name="gender" id="gender" placeholder="Gender" autocomplete="off">
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
            <input type="text" name="email" id="email" placeholder="Email Address" autocomplete="off">
        </div>
        <div>
            <label for="uname">Username</label>
            <input type="text" name="uname" id="uname" placeholder="Username" autocomplete="off">
        </div>
        <div>
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass" placeholder="Password">
        </div>
        <div>
                <input type="checkbox" onclick="checkbox()"> Show Password
            </div>
        <div class="btn">
            <button type="submit">Submit</button>
            <button type="Reset"class="reset">Reset</button>
        </div>
        
    </form>

    <script>
    // Function to calculate age based on birthdate
    function calculateAge(birthdate) {
        const today = new Date();
        const dob = new Date(birthdate);
        let age = today.getFullYear() - dob.getFullYear();
        const monthDiff = today.getMonth() - dob.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        
        return age;
    }
    
    // Get birthdate & age input element
    const birthdateInput = document.getElementById('birth');
    const ageInput = document.getElementById('age');
    
    
    birthdateInput.addEventListener('change', function() {
        const age = calculateAge(this.value);
        ageInput.value = age;
    });

     // Showing Password
     function checkbox(){
            var p= document.getElementById("pass");
            var cp= document.getElementById("cpass");
            if(p.type === "password"){
                p.type="text";
            }else{
                p.type="password";
            }

            if(cp.type === "password"){
                cp.type="text";
            }else{
                cp.type="password";
            }


        }
    </script>

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
