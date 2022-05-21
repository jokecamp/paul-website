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
			<ul>
				<li><a href="/gallery/ceramics/">ceramics</a></li>
				<li><a href="/gallery/lostworks/">ceramics "lost works"</a></li>
				<li><a href="/gallery/photography/">photography</a></li>
				<li><a href="/gallery/paper/">paper</a></li>		
				<li><a href="/gallery/canoe/">canoe</a></li>
				<li><a href="/gallery/sketches/">sketches</a></li>
				<li><a href="/gallery/metal/">metal</a></li>
				<li><a href="/gallery/cardboard/">cardboard</a></li>
				<li><a href="/gallery/design/">design</a></li>
				<li><a href="/gallery/painting/">painting</a></li>
				<li><a href="/gallery/woodworking/">woodworking</a></li>
				<li><a href="/gallery/bike/">bike</a></li>
                                <li><a href="/gallery/modelmaking/">prototyping &<br> modelmaking</a></li>
			</ul>
		</div>
		<div id="gallery">

<?php

$setIds = array(
	"ceramics" 			=> "72157625520908354", 
	"canoe"			=> "72157625396583831",
	"cardboard" 			=> "72157625523919650",
	"metal" 			=> "72157625398515907",
	"sketches" 			=> "72157625520921090",
	"design"			=> "72157625647822391",
	"bike"				=> "72157625060623061",
	"photography" 		=> "72157626867665215",
	"painting"			=> "72157625778359982",
	"lostworks"			=> "72157626626453580",
	"woodworking"			=> "72157611533833786",
	"paper"			=> "72157629463629383", 
        "modelmaking"           => "72177720296933643"
	);

$galleryName = $_GET["id"];	

include("include/secret.php");

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
