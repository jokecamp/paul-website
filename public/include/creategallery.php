<?php

class PhotoData {
    public $Id = '';
    public $Server = '';
    public $Farm = '';
    public $Secret = '';
	public $Index = '';
	public $Title = '';
	public $Description = '';
}

function GetPhotosFromFlickr($apiKey, $setId)
{
	$params = array(
		'method'	=> 'flickr.photosets.getPhotos',
		'api_key'	=> $myApiKey = INSERT FLICKR API KEY HERE,
		'format'	=> 'php_serial',
		'photoset_id' => $setId,
		'extras'	  => 'description'
	);

	$encoded_params = array();
	foreach ($params as $k => $v){
		$encoded_params[] = urlencode($k).'='.urlencode($v);
	}

	$apiUrl = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);

	#echo $apiUrl;

	$caching = new Caching("cache/set".$setId.".txt", $apiUrl);
	$data = $caching->GetData();
	$rsp_obj = unserialize($data);

	if ($rsp_obj['stat'] == 'ok' && count($rsp_obj['photoset']['photo']) > 0)
	{
	   $photos = array();
	   foreach($rsp_obj['photoset']['photo'] as $photo)
	   {
		  $data = new PhotoData();
		  $data->Id = $photo['id'];
		  $data->Farm = $photo['farm'];
		  $data->Server = $photo['server'];
		  $data->Secret = $photo['secret'];

		  $title = str_replace("'", "", $photo['title']);
		  $title = str_replace("\"", "", $title);
		  $data->Title = $title;

		  $d = str_replace("'", "", $photo['description']['_content']);
                $d = str_replace("\"", "", $d);
		  $data->Description = $d;

		array_push($photos,$data);
	   }
	   return $photos;
	}
	else
	 {
		return array();
	 }
}

function GeneratePhotos($photos)
{
   $anchorStart = "<a href='http://www.flickr.com/photos/ptenwal/%s' target='_blank'>";
   $img = "<img src='http://farm%s.static.flickr.com/%s/%s_%s_s.jpg' alt='flickr Photo' />";
   $anchorEnd = "</a>\n";

   # Reverse the Array and Order by setting the indexes of each photo
   $photos = array_reverse($photos);
   array_walk($photos, 'SetPhotoIndex');

   foreach($photos as $x)
   {
		printf($anchorStart, $x->Id);
		printf($img, $x->Farm, $x->Server, $x->Id, $x->Secret);
		echo $anchorEnd;
   }
}

function SetPhotoIndex($photo, $index)
{
	$photo->Index = $index;
}
?>
