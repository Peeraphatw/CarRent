<?php

define("LINE_API", "https://notify-api.line.me/api/notify");

function notify_message($message, $token)
{ //sent notify for all
    $queryData = array('message' => $message);
    $queryData = http_build_query($queryData, '', '&');
    $headerOptions = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
            . "Authorization: Bearer " . $token . "\r\n"
            . "Content-Length: " . strlen($queryData) . "\r\n",
            'content' => $queryData,
        ),
    );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents(LINE_API, false, $context);
    $res = json_decode($result);
    if ($res) {
        return true;
    } else {
        return false;
    }
}