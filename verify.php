<?php
$access_token = 'rVUenjdi07nfBKXExXyg0x3/2esiDHxzXnnHjoFJC0gLZNBLVC5vudP+O3UgCLf3WBaMLBvJQMHYFRzA1W6x1sq3NbCbJod/yElmA7lpis1GiJFW1HAuffuU/Y2lbEUQL/WtM7w1l0VD30BlFwkl3QdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
