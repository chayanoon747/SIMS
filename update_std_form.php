<?php
    $id=$_POST["id"];

    $servername="localhost";
    $username="root";
    $password="12345678";
    $dbname="students";

    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("Connection failed ".mysqli_connect_error());
    }

    $sql = "SELECT * FROM std_info WHERE id = $id";
    $result=mysqli_query($conn,$sql);
    
    if($result){
        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (isset($_POST['reset_button'])) {
                    $id_new = "";
                    $en_name = "";
                    $en_surname = "";
                    $th_name = "";
                    $th_surname = "";
                    $major_code = "";
                    $email = "";
                } else {
                    $id_new = $row["id"];
                    $en_name = $row["en_name"];
                    $en_surname = $row["en_surname"];
                    $th_name = $row["th_name"];
                    $th_surname = $row["th_surname"];
                    $major_code = $row["major_code"];
                    $email = $row["email"];
                }
                echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; text-align: left;'>";
                echo "<div style='border: 2px solid #ccc; padding: 20px; text-align: center;'>";
                echo "<h1>Update Student Information</h1>";
                echo "<form action='update_std.php'  method='post'>";
                echo "ID <input type='text' name='id_new' value='" . $id_new . "' style='width: 100%; margin-bottom: 10px; padding: 5px;'><br>";
                echo "Name <input type='text' name='en_name' value='" . $en_name . "' style='width: 100%; margin-bottom: 10px; padding: 5px;'><br>";
                echo "Surname <input type='text' name='en_surname' value='" . $en_surname . "' style='width: 100%; margin-bottom: 10px; padding: 5px;'><br>";
                echo "ชื่อ <input type='text' name='th_name' value='" . $th_name . "' style='width: 100%; margin-bottom: 10px; padding: 5px;'><br>";
                echo "นามสกุล <input type='text' name='th_surname' value='" . $th_surname . "' style='width: 100%; margin-bottom: 10px; padding: 5px;'><br>";
                echo "Major <input type='text' name='major_code' value='" . $major_code . "' style='width: 100%; margin-bottom: 10px; padding: 5px;'><br>";
                echo "Email <input type='text' name='email' value='" . $email . "' style='width: 100%; margin-bottom: 10px; padding: 5px;'><br>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<input type='submit' name='update_button' value='Update' style='font-size: 20px; padding: 6px 16px; margin: 4px;'>";
                echo "</form>";
                echo "<input type='submit' name='reset_button' value='Reset' onClick='resetForm();' style='font-size: 20px; padding: 6px 16px;'>";
                echo "</div>";
                echo "</div>";
                echo "<script>
                        function resetForm() {
                            document.getElementsByName('id_new')[0].value = '';
                            document.getElementsByName('en_name')[0].value = '';
                            document.getElementsByName('en_surname')[0].value = '';
                            document.getElementsByName('th_name')[0].value = '';
                            document.getElementsByName('th_surname')[0].value = '';
                            document.getElementsByName('major_code')[0].value = '';
                            document.getElementsByName('email')[0].value = '';
                        }
                        </script>";
            }
        }
    }else {
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
    mysqli_close($conn);
?>
