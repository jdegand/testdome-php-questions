<?php

class TextInput
{
    public $value = '';
    
    function add($text) {
        $this->value .= $text;
    }
    
    function getValue() {
        return $this->value;
    }
}

class NumericInput extends TextInput
{
      function add($text){
        if(is_numeric($text)){
            parent::add($text);
        }
    }
}

$input = new NumericInput();
$input->add('1');
$input->add('a');
$input->add('0');
echo $input->getValue();