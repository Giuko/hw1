<?php
    $endpoint = 'https://www.reddit.com';
    $request = $_GET['request'];
    if(isset($_GET['limit'])){
        $limit = $_GET['limit'];
        $request.="&limit=".$limit;
    }

    $headers = array(
        "user-agent: Mozilla/5.0 (Macintosh; PPC Mac OS X 10_8_7 rv:5.0; en-US) AppleWebKit/533.31.5 (KHTML, like Gecko) Version/4.0 Safari/533.31.5"
    );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $endpoint.$request);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    
    curl_close($curl);

    echo "$result";

         
?>