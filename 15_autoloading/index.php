<?php
    require_once "vendor/autoload.php";

    // $email = new app\Email();
    // $person = new app\Person();

    use app\Email as AppEmail;
    use app\Person;

    $email = new AppEmail();
    $person = new Person();

    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

    echo $response->getStatusCode(); // 200
    echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
    echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
?>
