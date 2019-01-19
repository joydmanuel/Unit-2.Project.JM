<?php
session_start(); // start a session

include("inc/questions.php"); // include questions.php

$totalCorrectAnswer = $_SESSION["totalCorrectAnswer"]; // session variables
if(empty($totalCorrectAnswer)) $totalCorrectAnswer = 0;

$totalIncorrectAnswer = $_SESSION["totalIncorrectAnswer"]; // session variables
if(empty($totalIncorrectAnswer)) $totalIncorrectAnswer = 0;

$currentQuestionPosition = $_SESSION["currentQuestionPosition"]; // session variables
if(empty($currentQuestionPosition)) $currentQuestionPosition = 0;

$askedQuestions = $_SESSION["askedQuestions"];  // session variables to store in askedQuestions array
if(empty($askedQuestions)) $askedQuestions = array();

$totalQuestions = count($questions); // counter for the total questions being asked from questions array
?>

<!DOCTYPE html> <!-- project shell provided -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<?php

// track answers
if($_POST["id"]) // if there is an ID submitted as post, user answered a question
{
    $answer = $_POST["answer"]; // user selects radio to answer
    $id = $_POST["id"];
    $answerKey = null; // until user selects an answer
    switch ($answer) // answerKey for firstIncorrectAnswer, secondIncorrectAnswer, and correct
    {
        case "firstIncorrectAnswer":
            $totalIncorrectAnswer++;
            $answerKey = "Incorrect";
            break;
        case "correctAnswer":
            $totalCorrectAnswer++;
            $answerKey = "Correct";
            break;
        case "secondIncorrectAnswer":
            $totalIncorrectAnswer++;
            $answerKey = "Incorrect";
            break;
    }

}

$_SESSION["totalCorrectAnswer"] = $totalCorrectAnswer;
//$_SESSION["totalIncorrectAnswer"] = $totalIncorrectAnswer;
$totalQuestionsAttempted = count($askedQuestions);
//$totalCorrectAnswer + $totalIncorrectAnswer;


if($_SERVER["REQUEST_METHOD"] == "POST" && $currentQuestionPosition !=$totalQuestionsAttempted)
{
    $currentQuestionPosition++;
    $_SESSION["currentQuestionPosition"] = $currentQuestionPosition;
}

?>

<body>
<div class="container">
    <?php
    if($totalQuestionsAttempted>0)
    {
        echo "Your answer was $answerKey<br>\n";
    }

    if($totalQuestionsAttempted>=$totalQuestions)
    {
        $correctPercentage = $totalCorrectAnswer*100/$totalQuestionsAttempted; // print score
        $incorrectPercentage = $totalIncorrectAnswer*100/$totalQuestionsAttempted;
        echo "<br>Total Correct Answers: $totalCorrectAnswer. Your Score is $correctPercentage%<br>";
        session_destroy(); // destroy session at the end of 10 questions (wash, rinse, repeat)
        if($correctPercentage>=80)
            echo "<br><br>Congratulations, You Did Great!<br><br><a href='index.php'>This will bring you back to the beginning";
        else
            echo "<br><br><a href='index.php'>Try Again to Improve Your Score</a>";
    }
    else
    {
        $questionPosition = rand(1, $totalQuestions); // generate a random question

        while(in_array($questionPosition, $askedQuestions)) // current questionPosition of the askedQuestions
        {
            $questionPosition = rand(1, $totalQuestions); // generate a different question, loop until all questions are asked
        }

        $askedQuestions[] = $questionPosition; // add questionPosition to askedQuestions array

        $_SESSION["askedQuestions"] = $askedQuestions; // track questions and store in askedQuestions array so not repeating

// assign a variable for each index from the associative array into the current question variable using its given value.
        $currentQuestion = $questions[$questionPosition-1]; // identifies currentQuestion position from questions array
        $leftAdder = $currentQuestion["leftAdder"];
        $rightAdder = $currentQuestion["rightAdder"];
        $correctAnswer = $currentQuestion["correctAnswer"];
        $firstIncorrectAnswer = $currentQuestion["firstIncorrectAnswer"];
        $secondIncorrectAnswer = $currentQuestion["secondIncorrectAnswer"];

        ?>
        <div id="quiz-box">
            <p class="breadcrumbs">
                Question #<?php echo $totalQuestionsAttempted + 1; ?> of
                #<?php echo $totalQuestions; ?>
            </p>
            <p class="quiz">What is <?php echo $leftAdder; ?>
                + <?php echo $rightAdder; ?>?
            </p>
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="<?php echo $questionPosition; ?>"/>
                <br><br><br>
                <?php
                $correctAnswerPosition = rand(1, 3);
                if ($correctAnswerPosition == 1)
                {
                    echo "
                        <input type='radio' name='answer' value='correctAnswer'/> $correctAnswer<br><br><br>
                        <input type='radio' name='answer' value='firstIncorrectAnswer'/> $firstIncorrectAnswer<br><br><br>
                        <input type='radio' name='answer' value='secondIncorrectAnswer'/> $secondIncorrectAnswer<br><br><br>
                    ";
                }
                elseif ($correctAnswerPosition == 2)
                {
                    echo "
                        <input type='radio' name='answer' value='firstIncorrectAnswer'/> $firstIncorrectAnswer<br><br><br>
                        <input type='radio' name='answer' value='correctAnswer'/> $correctAnswer<br><br><br>
                        <input type='radio' name='answer' value='secondIncorrectAnswer'/> $secondIncorrectAnswer<br><br><br>
                    ";
                }
                elseif ($correctAnswerPosition == 3)
                {
                    echo "
                    <input type='radio' name='answer' value='firstIncorrectAnswer'/> $firstIncorrectAnswer<br><br><br>
                    <input type='radio' name='answer' value='SecondIncorrectAnswer'/> $secondIncorrectAnswer<br><br><br>
                    <input type='radio' name='answer' value='correctAnswer'/> $correctAnswer<br><br><br>
                    ";
                }

                ?>
                <input type="submit" class="btn" name="next" value="Next Question"/>
            </form>
        </div>
    <?php
    }
    ?>
</div>
</body>
</html>
