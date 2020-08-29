<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

//query untuk get
$respon = $client->request('GET', 'http://omdbapi.com',[
    'query' => [
        'apikey' => 'dca61bcc',
        's'=> 'transformer'
    ]
]);

$result = json_decode($respon->getBody()->getContents(),true) ;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
</head>
<body>
<?php foreach ($result['Search'] as $movie ): ?>
        <ul>
            <li>Title : <?= $movie['Title'] ?></li>
            <li>Year : <?= $movie['Year'] ?></li>
            <li>
                <img src="<?= $movie['Poster'] ?>" alt="" width="80">
            </li>
        </ul>
<?php endforeach; ?>
</body>
</html>
