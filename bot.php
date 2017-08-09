<?php
$access_token = 'rVUenjdi07nfBKXExXyg0x3/2esiDHxzXnnHjoFJC0gLZNBLVC5vudP+O3UgCLf3WBaMLBvJQMHYFRzA1W6x1sq3NbCbJod/yElmA7lpis1GiJFW1HAuffuU/Y2lbEUQL/WtM7w1l0VD30BlFwkl3QdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format

        // Get text sent
        //$text = $event['message']['text'] + " /" +$event['message']['id']+ " /" +$event['message']['type'];

        // Get replyToken
        $replyToken = $event['replyToken'];

        // Build message to reply back
        $messages = [
          'type' => 'sticker',
          'stickerId' =>'2',
          'packageId' =>'1'
        ];

        // Make a POST Request to Messaging API to reply to sender
        $url = 'https://api.line.me/v2/bot/message/reply';
        $data = [
          'replyToken' => $replyToken,
          'messages' => [$messages],
        ];
        $post = json_encode($data);
        $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        echo $result . "\r\n";

	}
}
echo "OK";
