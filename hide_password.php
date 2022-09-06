<?php
$password = "test";

echo "Original Password In Plain Text = $password\n";
$len=strlen($password);

$NewPassword = "";
for( $i = 0; $i <= $len-1; $i++ ) {
$charcode = ord(substr( $password, $i, 1 ));
$NewChar = $charcode+5; $NewLetter = chr($NewChar);
$NewPassword = $NewPassword . $NewLetter;
} echo "Modified Password to Use in Script = $NewPassword\n";

$OrigPassword = "";
for( $i = 0; $i <= $len-1; $i++ ) {
$charcode = ord(substr( $NewPassword, $i, 1 ));
$OrigChar = $charcode-5; $OrigLetter = chr($OrigChar);
$OrigPassword = $OrigPassword . $OrigLetter;
} echo "Convert the Modified back to the Original = $OrigPassword\n";

?>