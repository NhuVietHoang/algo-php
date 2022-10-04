<?php 
namespace module;
class QuestionTest{
    private $listQuestion=[];
    public function __construct($listQuestion = [])
    {
        $this->listQuestion = $listQuestion;
    }
    public function parse($path){
        $content = file_get_contents($path);
        var_dump($content);
        return $content;
    }
}
$test = new QuestionTest;
var_dump($test->parse('module/question.md'));