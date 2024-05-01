<?php

// 替换成你的API密钥
$apiKey = 'AIzaSyAUCBcQ5Vo31AzGkpqFLGOjlhcuVJGpre0';

// API的URL
$url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' . $apiKey;

// 要发送的数据
$data = array(
    'contents' => array(
        'parts' => array(
            array(
                'text' => 'Write a story about a magic backpack'
            )
        )
    )
);

// 将数据转换为JSON格式
$jsonData = json_encode($data);

// 初始化cURL会话
$ch = curl_init($url);

// 设置cURL选项
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData))
);

// 执行cURL请求并获取响应
$response = curl_exec($ch);

// 检查是否有错误发生
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
}

// 关闭cURL会话
curl_close($ch);

// 打印响应内容
echo $response;

?>
