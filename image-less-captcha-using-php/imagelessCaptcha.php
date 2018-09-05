<?php
/*
    
    IMAGELESS CAPTCHA
    
*/
class imagelessCaptcha {

    // set preferences
    private $prefs = array(

        'num_digits' => 3, // 1 - 4

        'use_decimal' => true, // adds a decimal to the number

        'decimal_chance' => true // makes whether a decimal is added random
    );

    // word arrays for phrase construction
    private $ones = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine');
    private $teens = array('ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen');
    private $tens = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety');
    private $phraseBeginning = array('How is ', 'What is ');

    // create a number based on prefs
    public $number;

    function __construct() {
        $min = pow(10, $this->prefs['num_digits'] - 1);
        $max = pow(10, $this->prefs['num_digits']) -1;
        $this->number = mt_rand($min, $max);
    }
    // form word phrase for tens digits
    private function formTens($num, $and = false) {
        $num = intval($num);
        if ($num < 10) {
            if ($num == 0) $and = false;
            $phrase = $this->ones[$num];
        } 
        else if ($num < 20) {
            $phrase = $this->teens[$num-10];
        }
        else {
            $digitTens = substr($num, 0, 1);
            $digitOnes = substr($num, 1, 1);
            if ($digitOnes != 0) {
                $phrase = $this->tens[$digitTens].'-'.$this->ones[$digitOnes];
            } else {
                $phrase = $this->tens[$digitTens];
            }
        }
        if ($and) $phrase = ' and '.$phrase;
        return $phrase;
    }
    // create the number phrase
    public function formPhrase() {
        if ($this->number < 100) {
            $phrase = $this->formTens($this->number);
        }
        else if ($this->number < 1000) {
            $phrase = $this->ones[substr($this->number, 0, 1)].'-hundred ';
            $phrase .= $this->formTens(substr($this->number, 1, 2), true);
        }
        else if ($number < 10000) {
            $phrase = $this->ones[substr($this->number, 0, 1)].'-thousand ';
            $hundreds = substr($this->number, 1, 1);
            if ($hundreds > 0) $phrase .= $this->ones[$hundreds].'-hundred ';
            $phrase .= $this->formTens(substr($this->number, 2, 2), true);
        }
        // decimal
        if ($this->prefs['use_decimal'] == true) {

            if ($this->prefs['decimal_chance'] == true) {
                $useDecimal = mt_rand(0, 1);
                if ($useDecimal) {
                    $dec = mt_rand(1, 9);
                    $this->number = $this->number + ($dec *.1);
                    $phrase .= ' point '.$this->ones[$dec];
                }
            } else {
                $dec = mt_rand(1, 9);
                $this->number = $this->number + ($dec *.1);
                $phrase .= ' point '.$this->ones[$dec];
            }
        }
        // randomize beginning of phrase, throw off parsers
        $start = mt_rand(0, count($this->phraseBeginning)-1);
        // final phrase
        return $this->phraseBeginning[$start].$phrase.' written as a number?';
    }
    // return the int
    public function getInt() {
        return $this->number;
    }
}
?>