<?php
// Include generator
require_once('captcha-generator.php');

// Declaration of chars arrays which will be passed to generator
$letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 
'H', 'I', 'J', 'K', 'L', 'M', 'N',
'O', 'P', 'Q', 'R', 'S', 'T', 'U', 
'V', 'W', 'X', 'Y', 'Z'];        

$numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];


// Create an instance of CaptchaGenerator which will returns a captcha string generated from the passed letters 
$captchaLettersGenerator = new CaptchaGenerator($letters);
echo $captchaLettersGenerator->getCaptchaString();

echo "\n";

// Create an instance of CaptchaGenerator which will returns a captcha string generated from the passed numbers
$captchaNumbersGenerator = new CaptchaGenerator($numbers);
echo $captchaNumbersGenerator->getCaptchaString();

echo "\n";

// Merge letters and numbers arrays to one
$mix = array_merge($letters, $numbers);

// Create an instance of CaptchaGenerator which will returns a captcha array generated from the passed merged array
$captchaMixGenerator = new CaptchaGenerator($mix);
print_r($captchaMixGenerator->getCaptchaArray());

try {
    $captchaMixGenerator = new CaptchaGenerator([]);
    print_r($captchaMixGenerator->getCaptchaArray());
}catch(Exception $e) {
    echo "ERROR\n";
    echo $e->getMessage();
}
