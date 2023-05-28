<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/3412c74b1e.js" crossorigin="anonymous"></script>
    <title>G-weather</title>
</head>
<body>
    <!-- <?php include "join.php"; ?>
    <form action="" method="post">
        <div class="search-box">
            <input type="text" id="search-box" placeholder="Enter a city" value="<?php echo $name;?>" name="search">
            <button id="search-button">Search</button>
        </div>
    </form> -->
    <div class="search-box">
        <input type="text" id="search-box" placeholder="Enter a city" value="" name="search">
        <button id="search-button">Search</button>
    </div>

    <div class="gan">

   
    <div class="weather">
        <p class="wea">Weather Report</p>
        <p id="date">Saturday, 2020/10/10</p>
        <div class="h_line"></div>
        <img class="image" src="" alt="cloud">
        <p class="degree"></p>
        <p class="cloud">Broken Clouds</p>
        <p><p class="address"> Northampton, UK</p></p>
        <p id="rain">Rain: 10mm</p>
        <div class="h_line"></div>
        <div class="last">
            <div class="first">
                <img src="wind.png" alt="wind">
                <div class="wind">
                    <p>Wind Speed</p>
                    <p class="windy">10m/s</p>
                </div>
            </div>
            <div class="v_line"></div>
            <div class="secon">
                <img src="humidity.png" alt="humidity">
                <div class="humi">
                    <p> Humidity</p>
                    <p class="humidity">84%</p>
                </div>
            </div>
            
        </div>
    </div>

    <table>
        <tr>
            <th>Date</th>
            <th>Weather</th>
        </tr>
        <tr>
            <td>
                
                <p><?php echo $all[0][0];?></p>
            </td>
            <td>
                
                    <div class="logoo">
                        <p>Temp: <?php echo $all[1][0];?></p>
                        
                        <p>Humidity: <?php echo $all[2][0];?></p>
                    </div>
                    
                </div>
                
                
            </td>
        </tr>
        <tr>
            <td>
                
                <p><?php echo $all[0][1];?></p>
            </td>
            <td>
                
                    <div class="logoo">
                        <p>Temp: <?php echo $all[1][1];?></p>
                        
                        <p>Humidity: <?php echo $all[2][1];?></p>
                    </div>
                    
                </div>
                
                
            </td>
        </tr>
        <tr>
            <td>
                
                <p><?php echo $all[0][2];?></p>
            </td>
            <td>
                
                    <div class="logoo">
                        <p>Temp: <?php echo $all[1][2];?></p>
                        
                        <p>Humidity: <?php echo $all[2][2];?></p>
                    </div>
                    
                </div>
                
                
            </td>
        </tr>
        <tr>
            <td>
                
                <p><?php echo $all[0][3];?></p>
            </td>
            <td>
                
                    <div class="logoo">
                        <p>Temp: <?php echo $all[1][3];?></p>
                        
                        <p>Humidity: <?php echo $all[2][3];?></p>
                    </div>
                    
                </div>
                
                
            </td>
        </tr>
        <tr>
            <td>
                
                <p><?php echo $all[0][4];?></p>
            </td>
            <td>
                    <div class="logoo">
                        <p>Temp: <?php echo $all[1][4];?></p>
                        
                        <p>Humidity: <?php echo $all[2][4];?></p>
                    </div>
                    
                </div>
                
            </td>
        </tr>
        <tr>
            <td>
                
                <p><?php echo $all[0][5];?></p>
            </td>
            <td>
                
                    <div class="logoo">
                        <p>Temp: <?php echo $all[1][5];?></p>
                        
                        <p>Humidity: <?php echo $all[2][5];?></p>
                    </div>
                    
                </div>
                
                
            </td>
        </tr>
        <tr>
            <td>
                
                <p><?php echo $all[0][6];?></p>
            </td>
            <td>
                
                    <div class="logoo">
                        <p>Temp: <?php echo $all[1][6];?></p>
                        
                        <p>Humidity: <?php echo $all[2][6];?></p>
                    </div>
                    
                </div>
                
                
            </td>
        </tr>
    </table>

</div>
<h2 class="info">W= Wind speed <br> H= Humidity
</h2>
    <script src="index.js"></script>
    <script>
    document.getElementById('search-button').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var searchValue = document.getElementById('search-box').value; // Get the search input value

        // Create a new AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'join.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
        // Define the callback function to handle the server response
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Update the necessary parts of the page with the server response
                var response = xhr.responseText;
                // Update the weather report or any other elements as needed
            }
        };
        
        // Send the AJAX request with the search value
        xhr.send('search=' + searchValue);
    });
</script>

</body>
</html>