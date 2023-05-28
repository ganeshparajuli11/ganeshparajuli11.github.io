<?php
error_reporting(E_ERROR | E_PARSE);
$servername = "sql306.epizy.com";
$username = "epiz_34168805";
$password = "pCptixs2Npwss";
$dbname = 'epiz_34168805_forecast';
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = 'ganesh';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['search'])) {
    $name = $_POST['search'];
    put($conn, $name);
    $all = get($conn, $name);
} else {
    $name = "Northampton";
    put($conn, $name);
    $all = get($conn, $name);
}

function put($conn, $name)
{
    $today_date = date('Y-m-d');
    $code1 = "SELECT * FROM `weather` WHERE location='$name' AND date='$today_date';";
    $run = $conn->query($code1);
    $row = mysqli_num_rows($run);
    if ($row == 0) {
        try {
            $api = "https://api.openweathermap.org/data/2.5/weather?q=" . $name . "&units=metric&appid=62e01d85f3e6ccad9863af77b907de79";
            $json_data = file_get_contents($api);
            if ($json_data === false) {
                throw new Exception('Failed to fetch data from API endpoint');
            }
        } catch (Exception $e) {
            // Handle the exception
            echo '<b>Error: ' . $e->getMessage() . '</b>';
        }
        $response = json_decode($json_data, true);
        $temperature = $response["main"]["temp"];
        $humidity = $response["main"]["humidity"];

        $code2 = "INSERT INTO `weather`(`location`, `date`, `temperature`, `humidity`) 
            VALUES ('$name','$today_date',$temperature,$humidity)";
        $conn->query($code2);
    }
}

function get($conn, $name)
{
    $date = [];
    $all = [];
    $temperature = [];
    $humidity = [];
    $code11 = "SELECT * FROM `weather` WHERE location='$name' ORDER BY date DESC;";
    $result = $conn->query($code11);

    $len = mysqli_num_rows($result);

    if ($len >= 7) {
        $count = 0;
        while ($count < 7 && $row = $result->fetch_assoc()) {
            array_push($date, $row["date"]);
            array_push($temperature, $row["temperature"]);
            array_push($humidity, $row["humidity"]);
            $count++;
        }
        array_push($all, $date, $temperature, $humidity);
    } else {
        $count = 0;
        while ($count < 7) {
            array_push($date, "No Data");
            array_push($temperature, "No Data");
            array_push($humidity, "No Data");
            $count++;
        }
        array_push($all, $date, $temperature, $humidity);
    }

    return $all;
}
?>
