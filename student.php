<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Student Information</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .button {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            line-height: 20px;
        }
        .insert-button{
            margin-top:10px
        }
        .red-button {
            background-color: #FF0000;
        }
        .red-button:hover {
            background-color: #bd2222;
        }
        .blue-button {
            background-color: #007BFF;;
        }
        .blue-button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');

    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "students";
    // create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed " . mysqli_connect_error());
    }
    //echo "Connected successfully<br>";
    $sql = "SELECT * FROM `std_info`";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>id</th><th>name</th><th>surname</th>";
            echo "<th>ชื่อ</th><th>นามสกุล</th>";
            echo "<th>Major</th><th>email</th>";
            echo "<th>ลบ</th><th>แก้ไข</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["id"] . "</td>";
                echo "<td>" . $row["en_name"] . "</td>";
                echo "<td>" . $row["en_surname"] . "</td>";
                echo "<td>" . $row["th_name"] . "</td>";
                echo "<td>" . $row["th_surname"] . "</td>";
                echo "<td>" . $row["major_code"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td><form action='delete_std.php' method='post'>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<button type='submit' class='red-button button'>Delete</button>";
                echo "</form></td>";
                echo "<td><form action='update_std_form.php' method='post'>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<button type='submit' class='blue-button button'>Edit</button>";
                echo "</form></td></tr>";
                
            }
            echo "</table>";
        }
    }
    echo "<a class='blue-button button insert-button' href='insert_std_form.html'>Insert new record</a>";
    mysqli_close($conn);
    ?>
</body>
</html>
