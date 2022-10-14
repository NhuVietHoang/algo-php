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
               $this->listsQuestion[] = new Question($question,$answer);
        }
     
        return $this;
    }
}



