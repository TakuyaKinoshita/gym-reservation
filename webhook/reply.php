<?php
echo "hello";
/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

$channelAccessToken = '7nMoNRFhixHQsgkTJ9gR10rii/W61T+Y9oiLuPHARiQjtQCWFsUnq/bZWLHfgA01dcl0MJ307iP9soUXKQ5ApZdgI0uCjHxfAElpmQ/hnRGzx7L6wPaIEPoUagCilBZtIhkgViMCN1H5i3UTobfK5QdB04t89/1O/w1cDnyilFU=';
$replyAPI = 'https://api.line.me/v2/bot/message/reply';
$richmenuAPI = 'https://api.line.me/v2/bot/richmenu';
$gymAPI = 'http://yoyaku.city.saga.lg.jp/web/(S(k2u3an2n1frxjt55codgmw55))/Wg_JikantaibetsuAkiJoukyou.aspx';
$api = $replyAPI;

$raw = file_get_contents('php://input');
$receive = json_decode($raw, true);

// 返信内容の決定
// $repに返信用の配列を定義する
$event = $receive['events'][0];
switch($event['type']) {
    case "message":
      $rep = array(
        "type" => "text",
        "text" => $event["message"]["text"]
      );
    break;
    case "postback":
        switch($event["postback"]["data"]) {
        }
    break;
// 返信するメッセージをjsonに変換
$reply_token  = $event['replyToken'];
$body = json_encode(array(
    'replyToken' => $reply_token,
    'messages'   => array($rep)
));
// 返信内容のタイプの決定
$headers = array(
    'Content-Type: application/json',
    // 'charset: utf-8',
    'Authorization: Bearer ' . $channelAccessToken
);
$options = array(
    CURLOPT_URL            => $replyAPI,
    CURLOPT_CUSTOMREQUEST  => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => $headers,
    CURLOPT_POSTFIELDS     => $body
);

$curl = curl_init();
curl_setopt_array($curl, $options);
curl_exec($curl);
curl_close($curl);

function GetGym() {
  $body = json_encode(array(
      'replyToken' => $reply_token,
      'messages'   => array($rep)
  ));
  // 返信内容のタイプの決定
  $headers = array(
      'Content-Type: text/html',
      'charset: utf-8',
      // 'Authorization: Bearer ' . $channelAccessToken
  );
  $options = array(
      CURLOPT_URL            => $gymAPI,
      CURLOPT_CUSTOMREQUEST  => 'POST',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER     => $headers,
      CURLOPT_POSTFIELDS     => $body
  );

  $curl = curl_init();
  curl_setopt_array($curl, $options);
  curl_exec($curl);
  curl_close($curl);
}