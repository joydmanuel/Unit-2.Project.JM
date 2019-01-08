<?php
$questions[] = //$variable = array
    [
        "leftAdder" => 3,   //a string. key => value
        "rightAdder" => 4,
        "correctAnswer" => 7,
        "firstIncorrectAnswer" => 8,
        "secondIncorrectAnswer" => 10,
    ];
$questions[] =
    [
        "leftAdder" => 16,
        "rightAdder" => 32,
        "correctAnswer" => 48,
        "firstIncorrectAnswer" => 52,
        "secondIncorrectAnswer" => 61,
    ];
$questions[] =
    [
        "leftAdder" => 45,
        "rightAdder" => 12,
        "correctAnswer" => 57,
        "firstIncorrectAnswer" => 63,
        "secondIncorrectAnswer" => 55,
    ];
$questions[] =
    [
    "leftAdder" => 42,
    "rightAdder" => 18,
    "correctAnswer" => 60,
    "firstIncorrectAnswer" => 69,
    "secondIncorrectAnswer" => 57,
    ];
$questions[] =
    [
    "leftAdder" => 96,
    "rightAdder" => 20,
    "correctAnswer" => 116,
    "firstIncorrectAnswer" => 120,
    "secondIncorrectAnswer" => 110,
    ];
$questions[] =
    [
    "leftAdder" => 44,
    "rightAdder" => 85,
    "correctAnswer" => 129,
    "firstIncorrectAnswer" => 132,
    "secondIncorrectAnswer" => 126,
    ];
$questions[] =
    [
    "leftAdder" => 51,
    "rightAdder" => 35,
    "correctAnswer" => 86,
    "firstIncorrectAnswer" => 96,
    "secondIncorrectAnswer" => 82,
    ];
$questions[] =
    [
    "leftAdder" => 5,
    "rightAdder" => 61,
    "correctAnswer" => 66,
    "firstIncorrectAnswer" => 65,
    "secondIncorrectAnswer" => 74,
    ];
$questions[] =
    [
    "leftAdder" => 26,
    "rightAdder" => 19,
    "correctAnswer" => 45,
    "firstIncorrectAnswer" => 40,
    "secondIncorrectAnswer" => 39,
    ];
$questions[] =
    [
    "leftAdder" => 26,
    "rightAdder" => 35,
    "correctAnswer" => 61,
    "firstIncorrectAnswer" => 59,
    "secondIncorrectAnswer" => 51,
    ];





//Associative Arrays https://cosmolearning.org/video-lectures/associative-arrays-3/
//echo $questions1["leftAdder"];
//echo $questions1["rightAdder"];
//print_r($questions1);

//https://stackoverflow.com/questions/1951690/how-to-loop-through-an-associative-array-and-get-the-key
//foreach ($questions as $key => $val) {
  //  echo "\$questions[$key] => $val.\n";



//Traversing Associative Arrays https://www.geeksforgeeks.org/php-arrays/



//$questions = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
//for($i = 0; $i <= count($questions); $i++){
   // echo "$questions[$i] <br>";
//}


?>
<?php
/*$answer = $_POST["answer"];
//echo $answer;
switch($answer){
    case 135:
        echo "Wrong Answer";
        break;
    case 125:
        echo "Correct Answer!";
        break;
    case 115:
        echo "Wrong Answer";
        break;
}*/
?>

<?php
/*
$x = "leftAdder";
$y = "rightAdder";
$z = "CorrectAnswer";
$z1 = "firstIncorrectAnswer";
$z2 = "secondIncorrectAnswer";
if ("$x . + . $y == $z") {
    print "You are correct!" ;
}  else {
    print "Incorrect";
};
*/
?>
<?php
/*
function getQuestions($array)
{
$myRandomNumber = rand(0, 9);
$selectedQuestion = $array[$myRandomNumber];
return $selectedQuestion;
};


// PrintQuestions returns html string with random quote contents. var_dump dumps the data with string info. return did not display quotes. echo displays it as it should be.
function printQuestions($array)
{
$myQuestions = getQuestions($array);
$mytemplate = "<p class=\"questions\">" . $myQuestions["questions"] . "</p><p class=\"source\">". $myQuestions["source"] . "</p>";
return $mytemplate;
//echo $mytemplate;

};

$aQuote = printQuestions($questions);
echo $aQuote;
//var_dump($aQuote);
*/
?>

