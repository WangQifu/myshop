<?php
class essayfileC extends _Main
{
    function newFile()
    {
        if (the_user())
        {
            $this->setViewName("fileueview");
        }
        else 
        {
            $this->isAdmin=false;
	        $this->setViewName("login2");
        }
    }
}