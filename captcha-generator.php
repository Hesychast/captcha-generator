<?php
class CaptchaGenerator
{
    const CAPTCHA_LENGTH = 6; // Max length of the captcha

    private $letters = [];
    private $captcha;

    /**
     * Constructor
     * 
     * @param array chars for using in the captcha
     */
    function __construct(array $letters)
    {
        if (empty($letters)) {
            throw new Exception("Passed array of chars is empty");
        }

        $this->letters = $letters;
        $this->captcha = $this->generateCaptcha();
    }


    /**
     * Returns a captcha string
     * 
     * @return string
     */
    public function getCaptchaString()
    {
        return implode($this->captcha);
    }


    /**
     * Returns a captcha chars array
     * 
     * @return string
     */
    public function getCaptchaArray()
    {
        return $this->captcha;
    }


    // Returns a new captcha array
    private function generateCaptcha()
    {      
        $captcha = [];

        while (count($captcha) < static::CAPTCHA_LENGTH) {
            $index = rand(0, count($this->letters) - 1);
            
            array_push($captcha, $this->letters[$index]);
            unset($this->letters[$index]);
            
            $this->letters = array_values($this->letters);
        }

        return $captcha;
    }
}