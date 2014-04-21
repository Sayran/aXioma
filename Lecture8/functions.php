<?php
function getQuestions() {
    $questionsStr = file('questions.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    $questions = array();
    foreach ($questionsStr as $question) {
        $question = explode('|', $question);
        $questions[$question[0]] = array('text' => $question[1], 'isActive' => $question[2] === 'true');
    }
    return $questions;
}

function getAnswers($questionId) {
    $answers = file($questionId . '.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    foreach ($answers as &$answer) {
        $answer = explode('|', $answer);
        $answer[1] = $answer[1] === 'true';
    }
    return $answers;
}

function getRightAnswerId($questionId) {
    $answers = getAnswers($questionId);
    foreach ($answers as $key => $answer) {
        if ($answer[1]) {
            return $key;
        }
    }

}

function questionsOrder() {
    $questions = getQuestions();
    $order = array();
    foreach ($questions as $key => $question) {
        if ($question['isActive']) {
            $order[] = $key;
        }
    }
    return $order;
}
function validate($data){
    $data = trim(strip_tags($data));
    return $data;
}
