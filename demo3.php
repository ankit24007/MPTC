<?php
class SimpleClass
{
    // property declaration
    private $var = 'a default value';

    // method declaration
    public function n() {
        echo $this ->var;
    }
    
}

$a = new SimpleClass();
