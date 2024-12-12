<?php 
require_once '../constant/config.php';

if (isset($_POST['update'])) {
    
    $id = $_POST['id'];
    
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
  
    $gender = $_POST['gender'];
    $birth = $_POST['birt'];
    $age = $_POST['age'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $sql = "UPDATE users SET First_Name = :fname, Middle_Name = :mname, Last_Name = :lname, Gender = :gender, Age = :age, Birthdate = :birt, Email = :email,Username = :uname, Password = :pass WHERE id = :id";


    try {
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':fname', $fname);
      $stmt->bindParam(':mname', $mname);
      $stmt->bindParam(':lname', $lname);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':gender', $gender);
      $stmt->bindParam(':birt', $birth);
      $stmt->bindParam(':age', $age);
      $stmt->bindParam(':uname', $uname);
      $stmt->bindParam(':pass', $pass);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
  
        echo "Record updated successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} 

if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $sql = "SELECT * FROM users WHERE id = :id";
    try {
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
          $firstname = $row["First_Name"];
          $mname = $row["Middle_Name"];
           $lname =  $row["Last_Name"];
          $gender = $row["Gender"];
          $age =  $row["Age"];
          $birth = $row["Birthdate"];
          $email = $row["Email"];
          $uname = $row["Username"];
          $pass = $row["Password"];
?>
<style>
    /* General body styling */
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #f0f4ff, #d9e8ff);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    padding: 20px;
    box-sizing: border-box;
    }

    /* Form styling */
    form {
    background-color: rgba(255, 255, 255, 0.95);
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
    box-sizing: border-box;
    font-size: 14px;
    }

    fieldset {
    border: none;
    padding: 0;
    margin: 0;
    }

    legend {
    font-size: 1.5em;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
    }

    .form-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    }

    .form-group {
    flex: 1;
    min-width: 200px;
    }

    input[type="text"], input[type="int"], input[type="email"], input[type="date"], input[type="hidden"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    transition: border-color 0.3s;
    font-size: 14px;
    }

    input[type="text"]:focus, input[type="int"]:focus, input[type="email"]:focus, input[type="date"]:focus {
    border-color: #007bff;
    outline: none;
    }

    input[type="submit"] {
    display: inline-block;
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 6px;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
    background-color: #0056b3;
    }

    label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
    }

    a {
    display: inline-block;
    text-align: center;
    text-decoration: none;
    color: #007bff;
    margin-top: 10px;
    font-size: 14px;
    transition: color 0.3s;
    }

    a:hover {
    color: #0056b3;
    }
</style>

<form action="" method="post">
    <fieldset>
        <legend>User Update Form</legend>
        <div class="form-row">
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" value="<?php echo $firstname; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
                <label for="mname">Middle Name:</label>
                <input type="text" id="mname" name="mname" value="<?php echo $mname; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" value="<?php echo $gender; ?>">
            </div>
            <div class="form-group">
                <label for="birth">Birthdate:</label>
                <input type="date" id="birth" name="birt" value="<?php echo $birth; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" value="<?php echo $age; ?>">
            </div>
            <div class="form-group">
                <label for="uname">Username:</label>
                <input type="text" id="uname" name="uname" value="<?php echo $uname; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="pass">Password:</label>
                 <input type="text" id="pass" name="pass" value="<?php echo $pass; ?>" 
                 pattern="^[A-Z][a-zA-Z0-9]{7,}$" 
                    title="Password must start with an uppercase letter, contain at least one number, and be 8 characters long.">
            </div>
        </div>
        <input type="submit" value="Update" name="update">
        <a href="users.php">Back</a>
    </fieldset>
</form>

<?php
        } else { 
            header('Location: users.php');
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>



