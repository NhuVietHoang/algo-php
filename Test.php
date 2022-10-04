<?php
$contents= file_get_contents('question.md');
$arrayQuestions = explode("######",$contents);
var_dump($arrayQuestions);
