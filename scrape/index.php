<html>
<body> 
<h1>ISU Directory Review Demo</h1>
<p>I made a simple little web app. I'm sure you'll enjoy it...or at least find it creepy ;)</p>
<br />
<form action="" method="post">
  <input type="text" placeholder="Type your ISU Net-ID" name="inputText"/>
  <input type="submit" name="SubmitButton" onClick="test()" value="Engage StalkerNet"/>
</form>  
<br />
</body>
</html>
<?php
include 'html_dom.php';
include 'functions.php';

$lookup = $_POST["inputText"];

$crawlMe = get_final_url('https://www.irha.iastate.edu/directoryReview/scrape/results.php?netid='.$lookup.'');
$html = file_get_html($crawlMe);

/*This is where all the fun stuff is*/
$d = $html->plaintext;

include 'parseData.php';

if ($noMatchFound) {
    echo 'Net-ID <strong>"'.$lookup.'"</strong> was not found in the directory.';
} else if ($notStudent) {
    echo 'Net-ID <strong>"'.$lookup.'"</strong> does not belong to a student.';
} else {
    echo 'Showing results for Net-ID: <strong>'.$netid.'</strong><hr>';
    echo 'Your full name is <strong>'.$firstname.' '.$middlename.' '.$lastname.'</strong>';
    echo '<br>Your email address is <strong>'.$email.'</strong>';
    echo '<br>You are a <strong>'.$class.'</strong>';
    echo '<br>You study <strong>'.$major.'</strong>';
    if(empty($address) || ctype_space($address)) {
        echo '<br>You surpressed your address!';
    } else {
        echo '<br>Your address is <strong>'.$address.'</strong>';
    }
    if(empty($phone)) {
        echo '<br>You supressed your phone number!';
    } else {
        echo '<br>Your phone number is <strong>'.$phone.'</strong>';
    }
}
echo '<br><br><hr>This website was made by Scott Fisk';
?>