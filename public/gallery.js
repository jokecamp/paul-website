$(document).ready(function() {

		$(document).bind('keydown',function(e){ ChangePhoto(e.which); });
		
		$.each($("#gallery a"), AttachPhotoPopupsToImgLinks);
		
		var photos = jQuery.parseJSON(json);
		
		function AttachPhotoPopupsToImgLinks() {
			var id = $(this).attr("href").replace("http://www.flickr.com/photos/ptenwal/", "");
			$(this).bind('click', function() { LoadPhoto(id); return false; });
		}
		
		function FindPhotoById(id) {
			for(var i = 0; i < photos.length; i++)
			{
				if (photos[i].Id == id)
					return photos[i];
			}
		}

		function FindPhotoByIndex(index) {
			for(var i = 0; i < photos.length; i++)
			{
				if (photos[i].Index == index)
					return photos[i];
			}
		}

		function ChangePhoto(key) {
			var index = parseFloat($("#hiddenindex").html());
			
			if (key == 27) {
				CloseImage();
			}
			else {
				if ( $("#spotlight").css('display') == 'block' ) {
					if (key == 39) { //right
						index = index+1;
						LoadPhotoByIndex(index);				
					}
					else if (key == 37) {
						index = index-1;
						LoadPhotoByIndex(index);
					}
				}
			}
		}	
					
		function UpdateSlideshowStatus(index) {			
			if (index == 0) 
				$("#prev").hide();
			else
				$("#prev").show();
			
			if (index == photos.length-1)
				$("#next").hide();
			else
				$("#next").show();
				
			$("#slideshowstatus").html(index+1 + " of " + photos.length);
		}

		function LoadPhoto(id) {
			var photo = FindPhotoById(id);
			$("#hiddenindex").html(photo.Index);
			UpdateSlideshowStatus(photo.Index);
			$("#photomain").hide();
			$("#phototitle").html("");		
			$("#Loading").show();
			$("#next").unbind().click(function() { LoadPhotoByIndex(photo.Index+1); } );
			$("#prev").unbind().click(function() { LoadPhotoByIndex(photo.Index-1); } );
			LoadImage(id, photo.Farm, photo.Server, photo.Secret, photo.Title, photo.Description);
		}

		function InBounds(index) {
			if (index >= 0 && index < photos.length)
				return true;
			else
				return false;
		}

		function LoadPhotoByIndex(index) {
			if (InBounds(index)) {
				StartLoading();
				var photo = FindPhotoByIndex(index);
				LoadPhoto(photo.Id);
			}
		}

		function LoadImage(id, farm, server, secret, title, description) {
			var link = "http://www.flickr.com/photos/ptenwal/" + id
			var imageUrl = "http://farm" + farm + ".static.flickr.com/" + server + "/" + id + "_" + secret + ".jpg";
			$("#photomain").html("<a href='" + link + "'><img src='" + imageUrl + "' class='photo' alt='Photo' target='_blank' /></a>");
			$("#photomain").show();
			$("#phototitle").html(title);
			$("#photodescription").html(description);
			$('#closebutton').bind('click', function() { CloseImage(); });
			$('#fade').bind('click', function() { CloseImage(); });
			StopLoading();
			$("#fade").show();
			$("#spotlight").show();
			$("#helpbox").show();
		}

		function CloseImage() {
			$("#fade").hide();
			$("#spotlight").hide();
			$("#helpbox").hide();
		}		
		
		function StartLoading() {
			$("#spotlight").hide();
			$("#fade").show();
			$("#loading").show();
		}
		
		function StopLoading() {
			$("#loading").hide();
		}
});		
	
