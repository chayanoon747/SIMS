<?php
$id = $en_name = $en_surname = $th_name = $th_surname = $major_code = $email = "";
$errors = array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["id"])){
        $errors["id"] = "ID is required";
    }else{
        $id = check_data($_POST["id"]);
    }

    if(empty($_POST["en_name"])){
        $errors["en_name"] = "English Name is required";
    }else{
        $en_name = check_data($_POST["en_name"]);
    }

    if(empty($_POST["en_surname"])){
        $errors["en_surname"] = "English Surname is required";
    }else{
        $en_surname = check_data($_POST["en_surname"]);
    }

    if(empty($_POST["th_name"])){
        $errors["th_name"] = "Thai Name is required";
    }else{
        $th_name = check_data($_POST["th_name"]);
    }

    if(empty($_POST["th_surname"])){
        $errors["th_surname"] = "Thai Surname is required";
    }else{
        $th_surname = check_data($_POST["th_surname"]);
    }

    if(empty($_POST["major_code"])){
        $errors["major_code"] = "Major Code is required";
    }else{
        $major_code = check_data($_POST["major_code"]);
    }

    if(empty($_POST["email"])){
        $errors["email"] = "Email is required";
    }else{
        $email = check_data($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email format";
        }
    }

    if (empty($errors)) {
        $servername="localhost";
        $username="root";
        $password="12345678";
        $dbname="students";

        $conn=mysqli_connect($servername,$username,$password,$dbname);
        if(!$conn){
            die("Connection failed ".mysqli_connect_error());
        }
        //echo "Connected successfully</br>";
        $sql="INSERT INTO `std_info` (`id`, `en_name`, `en_surname`, `th_name`, `th_surname`, `major_code`, `email`) VALUES ('$id', '$en_name', '$en_surname', '$th_name', '$th_surname', '$major_code', '$email')";
        //echo $sql."<br>";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh;'>";
            echo "<div style='border: 2px solid #ccc; padding: 20px; text-align: center;'>";
            echo "<p style='font-size: 24px;'>Insert New Record</p>";
            echo "<p style='font-size: 20px;'>Successfully!</p>";
            echo '<input type="button" style="font-size: 20px; padding: 6px 16px;" value="Back" onclick="location.href=\'student.php\'">';
            echo "</div>";
            echo "</div>";
        }
        else echo "Error: ".$sql."<br>".mysqli_error($conn);
    }else{
        if (isset($errors["id"])) {
            echo $errors["id"] . "<br>";
        }
        if (isset($errors["en_name"])) {
            echo $errors["en_name"] . "<br>";
        }
        if (isset($errors["en_surname"])) {
            echo $errors["en_surname"] . "<br>";
        }
        if (isset($errors["th_name"])) {
            echo $errors["th_name"] . "<br>";
        }
        if (isset($errors["th_surname"])) {
            echo $errors["th_surname"] . "<br>";
        }
        if (isset($errors["major_code"])) {
            echo $errors["major_code"] . "<br>";
        }
        if (isset($errors["email"])) {
            echo $errors["email"] . "<br>";
        }
    }
}
function check_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
mysqli_close($conn);
?>