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
<!-- <style>/* General body styling */
body {
    font-family: Arial, sans-serif;
    background: url("https://img.freepik.com/free-vector/cartoon-illustration-small-dorm-room-dormitory-interior-inside-hostel-bedroom_1441-1836.jpg?size=626&ext=jpg&ga=GA1.1.2082370165.1715644800&semt=ais_user") no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Form styling */
form {
    background-color: rgba(255, 255, 255, 0.9);
    padding: 20px 40px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    box-sizing: border-box;
}

fieldset {
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 8px;
    background-color: #f9f9f9;
}

legend {
    font-size: 1.5em;
    font-weight: bold;
    color: #333;
    padding: 0 10px;
}

input[type="text"], input[type="int"], input[type="email"], input[type="datetime"], input[type="hidden"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    display: inline-block;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Additional styling for the labels */
label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
}
a{
    display: flex;
    justify-content: center;
}
</style> -->

<form action="" method="post">
    <fieldset>
    <h2>User Update Form</h2>
        <legend>Personal information:</legend>
        First Name:<br>
        <input type="text" name="fname" value="<?php echo $firstname; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <br>
        Middle Name:<br>
        <input type="int" name="mname" value="<?php echo $mname; ?>">
        <br><br>
        Last Name:<br>
        <input type="text" name="lname" value="<?php echo $lname; ?>">
        <br><br>
        Email:<br>
        <input type="email" name="email" value="<?php echo $email; ?>">
        <br><br>
        Gender:<br>
        <input type="text" name="gender" value="<?php echo $gender; ?>">
        <br><br>
        Birthdate:<br>
        <input type="date" name="birt" value="<?php echo $birth; ?>">
        <br><br>
        Age:<br>
        <input type="int" name="age" value="<?php echo $age; ?>">
        <br><br>
        Username:<br>
        <input type="text" name="uname" value="<?php echo $uname; ?>">
        <br><br>
        Password:<br>
        <input type="text" name="pass" value="<?php echo $pass; ?>">
        <input type="submit" value="Update" name="update">
        <br><br>
        <a href="users.php" class="btn">Back</a>
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



