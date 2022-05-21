<?php include("include/header.php"); ?>

<div id="content">

<?php

$pageName = $_GET["id"];	

if ($pageName == "about") {
?>

	<h2>about</h2>
	<a href="http://www.flickr.com/photos/ptenwal/5521381871/" title="Smiling by ptenwal, on Flickr"><img src="http://farm6.static.flickr.com/5258/5521381871_694f9858ab_m.jpg" width="240" height="180" alt="Smiling" class="paul" ></a>

	<p>Paul Tenwalde serves as the Fabrication Manager at the Columbus College of Art & Design and oversees the Tab Jeffery Fab Lab and Grant Lab Woodshop. The Fab Lab facilities include laser cutters, 3-D printers, wire bender, CNC capabilities, HVLP spray booths, and a large format roll printer. The extensive woodshop houses a saw stop table saw, sliding compound miter saw, band saws, lathe, jointer, planner, oscillating belt and spindle sanders, disc sanders, drill presses, and a fully stock tool room.</p>
	<p>In 2006 he received his B.F.A. in Art Education with an emphasis in Ceramics from Bowling Green State University, and in 2018 he graduated from the Columbus College of & Design with an M.F.A. focused on Industrial Design. He has taught art K-12, instructed studio ceramics classes, served as a creative arts summer camp counselor, worked as a “lumberjack” and interned at Electrolux North America's model shop. Specializing in fabrication and model building, Paul possesses a highly diverse range of fabrication skills and an in depth knowledge of finishing techniques.</p>
	<p>In 2012 he successfully completed a through hike of the 2,180 mile Appalachian Trail and enjoys fishing, biking, climbing, paddling his custom built canoe, and generally speaking all things outdoors.</p>

	<p><a href="/PaulTenwalde.pdf" target="_blank">View my Resume (PDF)</a></p>
	
<?php
}
else if ($pageName == "contact") {
?>
	<h2>contact</h2>
	<p>Please contact me at <a href="mailto:paul.tenwalde@yahoo.com">paul.tenwalde@yahoo.com</a>.</p>
	<p><a href="/PaulTenwalde.pdf" target="_blank">View my Resume (PDF)</a></p>
	<p>View my <a href="http://www.flickr.com/photos/ptenwal/">flickr page</a>.</p>
	<p>Visit my <a href="http://www.facebook.com/profile.php?id=20920391&ref=ts">facebook profile</a>.</p>

	
<?php
}
else if ($pageName == "statement") {
?>

	<h2>artist statement</h2>

	<p>With the advent of modern machinery and production methods there has been an overall loss of the human laborer. Modern machinery has revolutionized our methods of construction and humans ability to control raw materials but has diminished mans physical interaction and manipulation of these materials.</p>
	<p>Ceramics has typically been viewed as a hands-on art form with the artist sculpting and manipulating the clay into a desired from. In contrast, ceramics has recently been incorporated into many advanced technological applications. With its recent merging in the industrial field and newly discovered uses, combined with the advancements in its technical applications, ceramics as an art form is changing.</p>
	<p>My work celebrates this change by juxtaposing fictional as well as functional factory produced objects and machines with the art of ceramics. Each piece incorporates traditional hand built methods of ceramic construction which reconnects these typically mass produced objects with the human. My interest is in creating dynamic pieces that utilize multiple construction techniques including: wheel thrown, slab, coil, molded, and extruded parts. By combining these multiple construction techniques, the viewer gains an appreciation of the technical capabilities of clay. Whereas the complete set of pieces attest to my own responses to industrial objects and machinery, celebrating humans' creativity and ingenuity.</p>

<?php
}
?>	
<div>

<?php include("include/footer.php"); ?>