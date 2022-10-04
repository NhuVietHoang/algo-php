<?php
include  "module/QuestionsList.php";
include  "module/Question.php";
$question = new \module\Question("Hoangsdasdasd","Hoangvip2ádasdsak");

$itemQuestionList= new \module\QuestionsList();

$itemQuestionList->insertQuestion($question);

var_dump($itemQuestionList->parse('question.md')->getAll());

