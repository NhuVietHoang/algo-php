<?php
namespace module;
require_once "./module/Collection.php";

class QuestionsList extends Collection{
    public  function parse($path)
    {
        $contents = file_get_contents($path);
        $arrayQuestions = explode("######",$contents);
        array_shift($arrayQuestions);
        foreach ($arrayQuestions as $questions)
        {
              [$question,$answer]  = explode("####",$questions);
			  [$titles,$content]   = explode('?',$question);
			  [$number,$title]     = explode('.',$titles);
               $this->listsQuestion[] = new Question($number,$title,$content,$answer);
        }
        return $this;
    }
}



