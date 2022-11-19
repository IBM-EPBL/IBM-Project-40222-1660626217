<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="main.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
$q_score = $_POST['quality'];
$feedback_txt = $_POST['suggestion'];
$conn = mysqli_connect("localhost", "root","", "rishwana");
$query ="insert into feedback(quality_score, feedback)values($q_score, '$feedback_txt')";
$result = mysqli_query($conn, $query);

if($result)
 echo "<p style='color:white; font-size:30px; font-weight:bold'>'Thank you for your feedback. We'll appreciate!'</p>";
else
die("Something terrible happened. Please try again. ");
?>

</body>

</html>