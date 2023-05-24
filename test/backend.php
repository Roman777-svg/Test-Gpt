<?php
require 'client-main/src/OpenAI.php';

use OpenAI\Api\Gpt3;

$openai = new Gpt3('0k1I5k4EmtwHjRAjjv5eT3BlbkFJdWwhuYVzSPZbd3QYY9MS');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userMessage = $_GET['message'];

    $response = $openai->complete([
        'model' => 'text-davinci-003',
        'prompt' => 'ChatGPT: ' . $userMessage,
        'maxTokens' => 100,
        'temperature' => 0.6,
        'n' => 1,
        'stop' => '\n',
    ]);

    $botMessage = $response['choices'][0]['text'];

    echo $botMessage;
}