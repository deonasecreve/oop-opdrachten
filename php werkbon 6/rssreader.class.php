<?php

class RssItem{
	public function __construct($title, $author, $pubdate, $description, $link) {
		$this->title = $title;
		$this->author = $author;
		$this->pubdate = $pubdate;
		$this->description = $description;
		$this->link = $link;

	}

	public $title;
	public $author;
	public $pubdate;
	public $description;
	public $link;

	public function ToHTMLString() {
		$out = '<h2>' . $this->title . '</h2>';
		$out .= '<p>created: ' . $this->pubdate . '</p>';
        $out .= '<p>author: ' . $this->author . '</p>';
        $out .= '<p>' . $this->description . '</p>';
        $out .= '<p><a href="' . $this->link . '">read more: ' . $this->title . '</a></p>';
        return $out;
	}
}

class RssReader{

	public $rssfeed;

	public function __construct($rss) {
		$this->rssfeed = $rss;
	}

	public function GetAllItems() {
		$curl = curl_init();

			curl_setopt_array($curl, Array(
            CURLOPT_URL            => $this->rssfeed,
            CURLOPT_USERAGENT      => 'spider',
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING       => 'UTF-8'
        ));

		$data = curl_exec($curl);
		curl_close($curl);

		$items = array();
		$xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);
		foreach ($xml->channel->item as $item) {
			$ri = new RssItem(
				(string) $item->title,
				(string) $item->children('dc', TRUE),
				(string) $item->pubdate,
				(string) $item->description,
				(string) $item->link );
			array_push($items,$ri);
		}


		




		

		return $items;

	}

	public function GetItemsWithKeyword($word) {
		$curl = curl_init();

			curl_setopt_array($curl, Array(
            CURLOPT_URL            => $this->rssfeed,
            CURLOPT_USERAGENT      => 'spider',
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING       => 'UTF-8'
        ));

		$data = curl_exec($curl);
		curl_close($curl);

		$items = array();
		$xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);
		foreach ($xml->channel->item as $item) {
			$ri = new RssItem(
				(string) $item->title,
				(string) $item->children('dc', TRUE),
				(string) $item->pubdate,
				(string) $item->description,
				(string) $item->link );
			
			if(strrpos ($item->description, $word)){
				array_push($items,$ri);
			}
}
			return $items;

	}
}

?>