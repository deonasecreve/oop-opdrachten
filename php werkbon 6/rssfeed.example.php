<?php

require_once 'rssreader.class.php';

$reader = new RssReader ('http://www.nu.nl/rss/Algemeen');
$items = $reader->GetAllItems();
$reader2 = new RssReader ('http://feeds.feedburner.com/tweakers/mixed');
$items2 = $reader2->GetAllItems();
$reader3 = new RssReader('http://www.rtlnieuws.nl/service/rss/technieuws/index.xml');
$items3 = $reader3->GetAllItems();

if(isset($_POST["Zoeken"])){
    $items = $reader->GetItemsWithKeyword($_POST["Zoeken"]);
    $items2 = $reader2->GetItemsWithKeyword($_POST["Zoeken"]);
    $items3 = $reader3->GetItemsWithKeyword($_POST["Zoeken"]);
}

?>

<!DOCTYPE html>
<html>
<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>

<form action="rssfeed.example.php" method="POST">
    <input type="text" name="Zoeken">
    <input type="submit" value="Zoeken">
</form>

<?php
    foreach ($items as $item) {
        echo $item->ToHTMLString();
    }

    foreach ($items2 as $item) {
        echo $item->ToHTMLString();
    }

     foreach ($items3 as $item) {
        echo $item->ToHTMLString();
    }
?>

</body>
</html>