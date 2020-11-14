
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>PHP Array Int</title>
  </head>
  <body>
  <form method="post" action="index.php">
  <div class="form-check">
    <label class="form-check-label">User Input</label>
    <input type = "text" class="form-control" name="userInput" />
    <input type="submit" name="userSubmit" value="Submit" />
  </div>
  </form>


  </body>
</html>

<?php

//check if submit button is pressed
if (isset($_POST['userSubmit'])) {

    //get user input
    $userValue = $_POST['userInput'];

    //call function if set
    compareValues($userValue);
}

function compareValues($userValue)
{

    //instantiate multi-dimensional array to store
    //comparison, greater, and less than values
    $multiArray = [
        "compare" => [],
        "greater" => [],
        "less" => [],
    ];

    echo "<br/><br/>";
    echo "User input is: " . $userValue . "<br/><br/>";
    for ($i = 0; $i < 5; $i++) {

        $multiArray['compare'][$i] = rand(10, 50); //create random numbers array. Could have used the given array instead. 
        $compareVal = $multiArray['compare'][$i]; //purely for ease of reading in the if logic

        //compare array values with user input
        if ($userValue > $compareVal) {

            $multiArray['less'][$i] = $compareVal; //store val that is less than

        } elseif ($userValue < $compareVal) {

            $multiArray['greater'][$i] = $compareVal; // store val that is greater than

        }
    }
    printValues($multiArray, $userValue);
}

function printValues($multiArray, $input)
{
    //show comparison array
    echo "Comparison values: <br/>";
    foreach ($multiArray['compare'] as $value) {
        echo $value . ", ";
    }

    //greater than values
    echo "<br/><br/> Values greater than input: <br/>";
    foreach ($multiArray['greater'] as $value) {
        echo "Above: " . $value . "<br/>";
    }

//less than values
    echo "<br/><br/> Values less than input: <br/>";
    foreach ($multiArray['less'] as $value) {
        echo "Below: " . $value . "<br/>";
    }

}
?>



