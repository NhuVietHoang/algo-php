<?php
include 'module/autoload.php';
$question = new module\Question("số n","toán lớp 1", "1+1=?","2");

$itemQuestionList= new \module\QuestionsList();
$itemQuestionList->push($question);
echo '<pre>' , var_dump($itemQuestionList->parse('question.md')->all()) , '</pre>';


