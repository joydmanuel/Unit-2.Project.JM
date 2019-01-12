<?php
session_start();

$total_correct_answer=$_SESSION["total_correct_answer"];
if(empty($total_correct_answer))
        {
         $total_correct_answer=0;
        }

$total_incorrect_answer=$_SESSION["total_incorrect_answer"];
if(empty($total_incorrect_answer))
        {
         $total_incorrect_answer=0;
        }

?>
<!DOCTYPE html>
<!-- testing changes 1/8/19 -->
<!-- Step 1. Create the user interface of the application using css for a quiz app.
    JM-This enables user to interact with the page. I want to change index.html to index.php. Index.php will be the main file where I want to handle the form. <form action="index.php" method="post">12/20/18 -->
<!-- Step 2. The application functions correctly, with answers properly marked as correct or incorrect. Make sure the questions do not repeat themselves until the question bank has been exhausted. Provided answers are reasonable based on the question asked. -->
<?php
include ('inc/questions.php');
$total_questions=count($questions);
$question_position=rand(1,$total_questions); //To generate a random question.
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
/*$answer = $_POST["answer"];
$id = $_POST["id"];
switch($answer)
{
    case "firstIncorrectAnswer":
       echo $total_incorrect_answer++;
        break;
    case "correctAnswer":
       echo $total_correct_answer++;
        break;
    case "secondIncorrectAnswer":
        echo $total_incorrect_answer++;
        break;
}
*/

$_SESSION["total_correct_answer"]=$total_correct_answer;
$_SESSION["total_incorrect_answer"]=$total_incorrect_answer;
$total_questions_attempted=$total_correct_answer+$total_incorrect_answer;
?>
<body>
<div class="container">
    <?php
    if($total_questions_attempted>=$total_questions)
    {
        $correct_percentage=$total_correct_answer*100/$total_questions_attempted;
        $incorrect_percentage=$total_incorrect_answer*100/$total_questions_attempted;

        echo "<br>Total Correct Answers: $total_correct_answer ($correct_percentage%)<br>";
        //echo "<br>Total Incorrect Answers: $total_incorrect_answer ($incorrect_percentage%)<br>";
        session_destroy();
        if($correct_percentage>=80)

            echo "<br>Congratulations, You Did Great!<br>";
        else
        {
            echo "<br><a href='index.php'>Try Again to Improve Your Score</a><br>";
        }
    }
    else
    {
        ?>
        <div id="quiz-box">
            <p class="breadcrumbs">Question #<?php echo $question_position; ?> of #<?php echo $total_questions; ?></p>
            <p class="quiz">What is <?php echo $leftAdder; ?> + <?php echo $rightAdder; ?>?</p>
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="<?php echo $question_position; ?>" />
                <br><br><br>
                <?php
                $correct_answer_position=rand(1,3);
                if($correct_answer_position==1)
                {
                    echo
                        "
                        <input type='radio' class='radio' name='answer' value='correctAnswer'/>
                        $correctAnswer
                        <input type='radio' class='radio' name='answer' value='firstIncorrectAnswer'/>
                        $firstIncorrectAnswer
                        <input type='radio' class='radio' name='answer' value='secondIncorrectAnswer'/>
                        $secondIncorrectAnswer
                		";

                }
                elseif($correct_answer_position==2)
                {
                    echo
                        "
                        <input type='radio' class='radio' name='answer' value='firstIncorrectAnswer'/>
                        $firstIncorrectAnswer
                        <input type='radio' class='radio' name='answer' value='correctAnswer'/>
                        $correctAnswer
                        <input type='radio' class='radio' name='answer' value='secondIncorrectAnswer'/>
                        $secondIncorrectAnswer
                        ";
                }
                elseif($correct_answer_position==3)
                {
                    echo
                        "
                        <input type='radio' class='radio' name='answer' value='firstIncorrectAnswer'/>
                        $firstIncorrectAnswer
                        <input type='radio' class='radio' name='answer' value='secondIncorrectAnswer'/>
                        $secondIncorrectAnswer
                        <input type='radio' class='radio' name='answer' value='correctAnswer'/>
                        $correctAnswer
                		";
                }

                ?>
                <br><br><br><br>
                <input type="submit" class="btn" name="next" value="Next Question"/>
            </form>



        </div>
        <?php
    }
    ?>
</div>
</body>
</html>
