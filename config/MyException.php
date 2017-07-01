<?php

class MyException extends Exception
{
        public function getError()
        {
        return 'Error line '.$this->getLine().' in '.$this->getFile();
        }
}
?>