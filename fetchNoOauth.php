<?php
    $endpoint = 'https://www.reddit.com';
    $request = $_GET['request'];
    if(isset($_GET['limit'])){
        $limit = $_GET['limit'];
        $request.="&limit=".$limit;
    }

    $headers = array(
        "User-Agent: My University website"
    );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $endpoint.$request);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    
    curl_close($curl);

    echo "$result";

         
?>