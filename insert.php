<?php

require_once 'constant/config.php';
try {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $birth = $_POST['birth'];
    $age = $_POST['age'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
  
    $select_query = "SELECT * FROM users WHERE email = :email";
    $stmt1 = $conn->prepare($select_query);
    $stmt1->bindParam(':email', $email);
    $stmt1->execute();

    if($stmt1->rowCount() > 0) {
        echo "<script>alert('User already exists!');</script>";
    } else {
        $sql = "INSERT INTO users(First_Name,Middle_Name,Last_Name,Gender,Age,Birthdate,Email,Username,Password) VALUES(:fname,:mname,:lname,:gender,:age,:birth,:email,:uname,:pass)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':mname', $mname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':birth', $birth);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':pass', $pass);

        $stmt->execute();

    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
