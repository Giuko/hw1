<?php
    //Key
    $client_id = "QtV2FIBdo0WpX4jD6ZGWOQ";
    $client_secret = "kiRP54JZQcapxlAPby_HpI2qJpmrmw";

    $headers = array(
        "Authorization: Basic ".base64_encode($client_id.":".$client_secret),
        "user-agent: Mozilla/5.0 (Macintosh; PPC Mac OS X 10_8_7 rv:5.0; en-US) AppleWebKit/533.31.5 (KHTML, like Gecko) Version/4.0 Safari/533.31.5"
    );

    $username = "GiukoMG";
    $password = "baAuhXuV)9vw9y,";

    //Richiesta token
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://www.reddit.com/api/v1/access_token");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=password&username=$username&password=$password");
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    // // curl_close($curl);
    // echo($result);
    
    //Utilizzo
    $token = json_decode($result)->access_token;
    $headers = array(
        "Authorization: Bearer ".$token,
        "user-agent: Mozilla/5.0 (Macintosh; PPC Mac OS X 10_8_7 rv:5.0; en-US) AppleWebKit/533.31.5 (KHTML, like Gecko) Version/4.0 Safari/533.31.5"
    );
    $curl = curl_init();
    #Ne chiamo 100 perché mi serve trovare solo quelli che hanno thumbnail
    curl_setopt($curl, CURLOPT_URL, 'https://oauth.reddit.com/best.json?limit=100');
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    
    curl_close($curl);

    echo "$result";
?>