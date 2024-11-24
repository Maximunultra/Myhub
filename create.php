<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form id="myForm" class="bg-white p-8 rounded-lg shadow-lg max-w-4xl w-full grid grid-cols-2 gap-6">
        <h1 class="text-2xl font-bold text-gray-800 col-span-2 text-center mb-6">Registration</h1>
        
        <!-- First Name -->
        <div>
            <label for="fname" class="block text-gray-700 font-medium mb-1">First Name</label>
            <input type="text" name="fname" id="fname" placeholder="First Name" autocomplete="off"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" required>
        </div>
        
        <!-- Middle Name -->
        <div>
            <label for="mname" class="block text-gray-700 font-medium mb-1">Middle Name</label>
            <input type="text" name="mname" id="mname" placeholder="Middle Name" autocomplete="off"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" required>
        </div>
        
        <!-- Last Name -->
        <div>
            <label for="lname" class="block text-gray-700 font-medium mb-1">Last Name</label>
            <input type="text" name="lname" id="lname" placeholder="Last Name" autocomplete="off"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" required>
        </div>

        <!-- Gender -->
        <div>
            <label for="gender" class="block text-gray-700 font-medium mb-1">Gender</label>
            <select name="gender" id="gender"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <!-- Birthdate -->
        <div>
            <label for="birth" class="block text-gray-700 font-medium mb-1">Birthdate</label>
            <input type="date" name="birth" id="birth"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" required>
        </div>

        <!-- Age -->
        <div>
            <label for="age" class="block text-gray-700 font-medium mb-1">Age</label>
            <input type="number" name="age" id="age" placeholder="Age" readonly
                class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-gray-700 font-medium mb-1">Email Address</label>
            <input type="email" name="email" id="email" placeholder="Email Address" autocomplete="off"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" required>
        </div>

        <!-- Username -->
        <div>
            <label for="uname" class="block text-gray-700 font-medium mb-1">Username</label>
            <input type="text" name="uname" id="uname" placeholder="Username" autocomplete="off"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" required>
        </div>

        <!-- Password -->
        <div class="col-span-2">
            <label for="pass" class="block text-gray-700 font-medium mb-1">Password</label>
            <input type="password" name="pass" id="pass" placeholder="Password"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" required>
            <div class="mt-2 flex items-center">
                <input type="checkbox" id="showPass" class="mr-2">
                <label for="showPass" class="text-gray-700 text-sm">Show Password</label>
            </div>
        </div>

        <!-- Buttons -->
        <div class="col-span-2 flex justify-between mt-6">
            <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:ring focus:ring-blue-300">
                Submit
            </button>
            <button type="reset"
                class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400 focus:ring focus:ring-gray-300">
                Reset
            </button>
        </div>
    </form>

    <script>
        // Sanitize Input Function
        function sanitizeInput(input) {
            const div = document.createElement("div");
            div.appendChild(document.createTextNode(input));
            return div.innerHTML;
        }
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
        });
    </script>
</body>
</html>
