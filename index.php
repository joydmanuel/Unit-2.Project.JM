<?php
session_start();
$total_correct_answer=$_SESSION["total_correct_answer"];
if(empty($total_correct_answer)) $total_correct_answer=0;
$total_incorrect_answer=$_SESSION["total_incorrect_answer"];
if(empty($total_incorrect_answer)) $total_incorrect_answer=0;
$asked_questions=$_SESSION["asked_questions"];
$current_question_position=$_SESSION["current_question_position"];
if(empty($current_question_position)) $current_question_position=0;
?>
<!DOCTYPE html>
<?php
include_once 'inc/questions.php';
$total_questions=count($questions);
if(is_array($asked_questions))
{
    for($i=1; $i<=$total_questions; $i++)
    {
        $question_position=rand(1,$total_questions); // // Loop starts to generate a random question.
        if(!in_array($question_position, $asked_questions)) break;
    }
}
else $question_position=rand(1,$total_questions); // Generate a random question until all questions have been answered.
$asked_questions[]=$question_position;
$_SESSION["asked_questions"]=$asked_questions;  // Track questions being asked.
$current_question=$questions[$question_position-1];
$leftAdder=$current_question["leftAdder"];
$rightAdder=$current_question["rightAdder"];
$correctAnswer=$current_question["correctAnswer"];
$firstIncorrectAnswer=$current_question["firstIncorrectAnswer"];
$secondIncorrectAnswer=$current_question["secondIncorrectAnswer"];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<?php
$answer = $_POST["answer"];
$id = $_POST["id"];
$answer_key=null;
switch($answer)
{
    case "firstIncorrectAnswer":
        $total_incorrect_answer++;
        $answer_key="Incorrect";
        break;
    case "correctAnswer":
        $total_correct_answer++;
        $answer_key="Correct";
        break;
    case "secondIncorrectAnswer":
        $total_incorrect_answer++;
        $answer_key="Incorrect";
        break;
}
$_SESSION["total_correct_answer"]=$total_correct_answer;
$_SESSION["total_incorrect_answer"]=$total_incorrect_answer;
$total_questions_attempted=$total_correct_answer+$total_incorrect_answer;

 if($_SERVER["REQUEST_METHOD"] == "POST") {
     $current_question_position++;
     $_SESSION["current_question_position"]=$current_question_position;
}


?>
<body>
<div class="container">
    <?php
    if($total_questions_attempted>0)
    {
        echo "Your answer was $answer_key<br>\n";
    }
    if($total_questions_attempted>=$total_questions)
    {
        $correct_percentage=$total_correct_answer*100/$total_questions_attempted;
        $incorrect_percentage=$total_incorrect_answer*100/$total_questions_attempted;
        echo "<br>Total Correct Answers: $total_correct_answer. Your Score is $correct_percentage%<br>";
        /* echo "<br>Total Incorrect Answers: $total_incorrect_answer ($incorrect_percentage%)<br>"; */
        session_destroy();
        if($correct_percentage>=80)
            echo "<br><br>Congratulations, You Did Great!";
        else
            echo "<br><br><a href='index.php'>Try Again to Improve Your Score</a>";
    }
    else {
        ?>
        <div id="quiz-box">
            <p class="breadcrumbs">Question #<?php echo $current_question_position+1; ?> of
                #<?php echo $total_questions; ?></p>
            <p class="quiz">What is <?php echo $leftAdder; ?> + <?php echo $rightAdder; ?>?</p>
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="<?php echo $question_position; ?>"/>
                <br><br><br>
                <?php
                $correct_answer_position = rand(1, 3);
                if ($correct_answer_position == 1) {
                    echo
                    "
                        <input type='radio' name='answer' value='correctAnswer'/>
                        $correctAnswer
                        <input type='radio' name='answer' value='firstIncorrectAnswer'/>
                        $firstIncorrectAnswer
                        <input type='radio' name='answer' value='secondIncorrectAnswer'/>
                        $secondIncorrectAnswer
                		";
                } elseif ($correct_answer_position == 2) {
                    echo
                    "
                        <input type='radio' name='answer' value='firstIncorrectAnswer'/>
                        $firstIncorrectAnswer
                        <input type='radio' name='answer' value='correctAnswer'/>
                        $correctAnswer
                        <input type='radio' name='answer' value='secondIncorrectAnswer'/>
                        $secondIncorrectAnswer
                		";
                } elseif ($correct_answer_position == 3) {
                    echo
                    "
                        <input type='radio' name='answer' value='firstIncorrectAnswer'/>
                        $firstIncorrectAnswer
                        <input type='radio' name='answer' value='secondIncorrectAnswer'/>
                        $secondIncorrectAnswer
                        <input type='radio' name='answer' value='correctAnswer'/>
                        $correctAnswer
                		";
                }
                ?>
                <br><br><br><br>
                <input type="submit" class="btn" name="next" value="Next Question"/>
            </form>
        </div>

        <?php
    }//session_destroy();
    ?>
</div>
</body>
</html>