<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>Stop Watch</h3>

<form action="" method="post">
    <input type="text" name="arrayLength" placeholder="Enter Array Length">
    <input type="submit">
</form>
<br>
<?php
include "StopWatch.php";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $arrayLength = $_POST['arrayLength'];
    if ($arrayLength <= 0){
        echo "Array Length must be more than 0";
    } else {
        // Create a random Array and Sort Array
        function createArray($arrayLength)
        {
            $arrayNumber = [];
            for ($index = 0; $index < $arrayLength; $index++) {
                // Add random number from 0 - 100
                $arrayNumber[] = mt_rand(0, 100);
            }
            return $arrayNumber;
        }
        // Extends class
        $stopwatch = new StopWatch(microtime(true));
        echo "Current System Time: ".$stopwatch->getStartTime()."<br>"."<br>";
        // Sleep 1s after create Array
        $arrayNumber = createArray($arrayLength);
        sleep(1);
        // Set start time
        $stopwatch->start(microtime(true));
        echo "Start time to sort Array: ".$stopwatch->getStartTime()."<br>"."<br>";
        // Time to sort array
        usleep(sort($arrayNumber));
        // Set end time
        $stopwatch->stop(microtime(true));
        echo "End Time: ".$stopwatch->getEndTime()."<br>"."<br>";
        echo "Elapsed Time to Sort Array ".$arrayLength." elements is: ".$stopwatch->ElapsedTime()." millisecond"."<br>"."<br>";
        // Display Array after sort
        echo "Array after sort: ";
        print_r($arrayNumber);
    }
}
?>
</body>
</html>