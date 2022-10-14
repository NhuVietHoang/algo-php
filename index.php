<?php
// require_once "./module/Question.php";
// require_once "./module/QuestionsList.php";
include 'module/autoload.php';
$question = new module\Question("1+1 bằng mấy","bằng 2");

$itemQuestionList= new \module\QuestionsList();
$itemQuestionList->push($question);

var_dump($itemQuestionList->parse('question.md')->all());
// var_dump($itemQuestionList->pluck($itemQuestionList->parse('question.md')->all(),'question'));

