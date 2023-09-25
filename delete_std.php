<?php
$id=$_POST["id"];

$servername="localhost";
$username="root";
$password="12345678";
$dbname="students";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed " . mysqli_connect_error());
}

$sql = "DELETE FROM std_info WHERE id = $id";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh;'>";
    echo "<div style='border: 2px solid #ccc; padding: 20px; text-align: center;'>";
    echo "<p style='font-size: 24px;'>Delete Record</p>";
    echo "<p style='font-size: 20px;'>id: " . $id . "</p>";
    echo "<p style='font-size: 20px;'>Successfully!</p>";
    echo '<input type="button" style="font-size: 20px; padding: 6px 16px;" value="Back" onclick="location.href=\'student.php\'">';
    echo "</div>";
    echo "</div>";
}
mysqli_close($conn);
?>
