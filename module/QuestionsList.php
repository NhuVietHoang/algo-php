<?php
namespace module;

class QuestionsList{
    private  $listsQuestion = [];
    public  function __construct($listsQuestion = [])
    {
        $this->listsQuestion = $listsQuestion;
    }
    public function Test($path){
        $contents = file_get_contents($path);
        return var_dump($contents);
    }
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
    public function getAll()
    {
     return $this->listsQuestion;
    }
    public  function insertQuestion(Question  $question)
    {
        array_push($this->listsQuestion,$question);
        return $this;
    }

}
$itemQuestionList= new QuestionsList();


var_dump($itemQuestionList->parse('question.md')->getAll());



