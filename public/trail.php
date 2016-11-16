<?php
include("include/header.php");
include("include/creategallery.php");
include("include/caching.php");
?>

<div id="spotlight">
	<span id="hiddenindex"></span>
	<img id="closebutton" src="/close.png" alt="Click to close photo" class="hand" />
	<div id="phototitle"></div>
	<div id="photomain"></div>
	<div id="photodescription"></div>
	<div id="photolinks">
		<a id="prev" class="hand button">&lt;&lt; previous</a>
		<a id="next" class="hand button">next &gt;&gt;</a>
	</div>
	<div id="slideshowstatus"></div>
</div>
<div id="helpbox">Tip: You may also use your arrow keys to change photos.</div>

<div id="fade"></div>
<img id="loading" src="/loading.gif" />

		<div id="sidebar">
			2012 Thru Hike
			<p>Georgia to Maine</p>
			<p>2,184 miles</p>
		</div>
		<div id="gallery">

<?php

$setIds = array(
	"trail" 			=> "72157630994748408"
	);

$galleryName = "trail";
$myApiKey = INSERT API KEY HERE;

if ($setIds[$galleryName] == null)
	echo "No gallery available.";
else {
	$photos = GetPhotosFromFlickr($myApiKey, $setIds[$galleryName]);
	GeneratePhotos($photos);
}
?>
</div>

<?php
	if ($photos != null) {
		$format = "<script type='text/javascript'> var json = '%s'; </script>";
		printf($format, json_encode($photos));
	}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script src="/gallery-min.js"></script>

<?php include("include/footer.php"); ?>