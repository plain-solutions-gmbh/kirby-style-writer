<?php

namespace Microman;

use Kirby\Filesystem\F;
use Kirby\Toolkit\Str;

class Stylewriter
{

    protected $renderMode;
    protected $extract = array();
    protected $files = [];

    public function __construct($renderMode = false)
    {

        //Set render mode
        $this->renderMode = $renderMode;

        $this->filename = "/css/custom/" . page()->uuid()->id() . ".css";

        return $this;

    }


    public function getCSS ()
    {

        return kirby()->url('assets') .  $this->filename;

    }

    public function style($property, $field)
    {

        $fields = is_array($field) ? $field : [$field];
        $style = "";
        
        foreach ($fields as $key => $field) {
                
            $key = $field->key();
            $value = $field->value();
            $style .= $this->styleParser($key, $value);

            if ($this->renderMode) {                

                //Set to extract
                $this->extract[$property] = $this->extract[$property] ?? [];
                $this->extract[$property][$key] = $value;
    
            }

        }

        return $style;


    }

    private function styleParser($key, $value)
    {
        $key = str_replace('_', '-', $key);
        return $key . ": " . $value . ";";
    }

    public function seal()
    {


        if ($this->renderMode) {

            $out = "";

            foreach ($this->extract as $prop => $block) {

                $out .= $prop . " {" . PHP_EOL;

                    foreach ($block as $key => $value) {

                        $out .= $this->styleParser($key, $value) . PHP_EOL;
                    }
                
                $out .= "}".PHP_EOL;

            }

            F::write( kirby()->root('assets') . $this->filename, $out ); 

        }

    }

}
