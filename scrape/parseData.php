<?php
/*Get the first name using a regex search*/
preg_match('/'.$lastname.',\s(.*?)\s/',$d,$firstNameArr);
$firstname = $firstNameArr[1]; 

/*Get the middle name using a regex search*/
preg_match('/'.$firstname.'\s(.*?)\s/',$d,$middleNameArr);
$middlename = $middleNameArr[1]; 

/*Get the last name using a regex search*/
preg_match('/^(.+?),/',$d,$lastNameArr);
$lastname = $lastNameArr[1]; 

/*Get email using a regex between strings*/
preg_match('/Email:\s\s(.*?)Major/',$d,$emailArr);
$email = $emailArr[1];

/*Get Net-ID using a regex between strings*/
preg_match('/^(.+?)\s/',$email,$netIDArr);
$netid = $netIDArr[1];

/*Get the major using a regex between strings*/
preg_match('/Major:\s\s(.*?)Classification/',$d,$majorArr);
$major = $majorArr[1];

/*Get the classification using a regex search - should work*/
preg_match('/Classification:\s\s(.*?)\s+/',$d,$classArr);
$class = $classArr[1]; 

/*Get the phone number using a regex match*/
preg_match_all('/\d{3}-\d{3}-\d{4}/',$d,$phoneArr);
$phone = $phoneArr[0][0];

/*Get the phone number using a regex match*/
preg_match('/Address(.*?)'.$phone.'/',$d,$addressArr);
$address = $addressArr[1]; 
$zipcode = $addressArr[2];
$address .= ''.$zipcode.'';

if (strpos($d, 'No matches found') == true) {
    $noMatchFound = True;
} else {
    $noMatchFound = False;
}
if(empty($major) || ctype_space($major)) {
    $notStudent = True;
} 
?>