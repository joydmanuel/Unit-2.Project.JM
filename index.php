<!DOCTYPE html>
<!-- testing changes 1/8/19 -->
<!-- Step 1. Create the user interface of the application using css for a quiz app.
    JM-This enables user to interact with the page. I want to change index.html to index.php. Index.php will be the main file where I want to handle the form. <form action="index.php" method="post">12/20/18 -->
<!-- Step 2. The application functions correctly, with answers properly marked as correct or incorrect. Make sure the questions do not repeat themselves until the question bank has been exhausted. Provided answers are reasonable based on the question asked. -->
<?php include("inc/questions.php");
$current_question=$questions[0];
//var_dump($current_question);
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
<body>
    <div class="container">
        <div id="quiz-box">
            <p class="breadcrumbs">Question #<?php echo $question_position; ?> of #<?php echo $total_questions; ?></p>
            <p class="quiz">What is <?php echo $leftAdder; ?> + <?php echo $rightAdder; ?>?</p>
            <form action="index.php" method="post">
                <!--<input type="hidden" name="id" value="0" /> -->
                <input type="submit" class="btn" name="answer" value="<?php echo $firstIncorrectAnswer; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $correctAnswer; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $secondIncorrectAnswer; ?>" />
            </form>
        </div>
    </div>
</body>
</html>

<?php
$answer = $_POST["answer"];
echo $answer;
switch($answer){
    case $firstIncorrectAnswer:
        echo " is the Wrong Answer";
        break;
    case $correctAnswer:
        echo " is the Correct Answer!";
        break;
    case $secondIncorrectAnswer:
        echo " is the Wrong Answer";
        break;
}
?>