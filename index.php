
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>List Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
    <script>
       $(document).ready(function() {
            var slider = new Slider('#price-range-slider', {
                tooltip: 'hide', // Hide the tooltip completely
            });

            slider.on('slide', function(sliderValue) {
                $('#min_price').text(sliderValue[0]);
                $('#max_price').text(sliderValue[1]);
            });

            slider.on('slideStop', function(sliderValue) {
                $('#min_price').text(sliderValue[0]);
                $('#max_price').text(sliderValue[1]);
            });
        });

    </script>
</head>
<body>
    
</body>
</html>
<?php
    include "models/DBconfig.php";
    $db = new Database;
    $db->connect();

    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    } else {
        $controller = '';
    }

    switch($controller){
        case 'list': 
            require_once('controllers/Controller.php');
    }
?>

