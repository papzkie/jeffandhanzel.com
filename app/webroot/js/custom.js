//Navigator
$('.container ul.nav li a').on('click',function(){
	$('.container ul.nav li.active').removeClass('active');
	$(this).parent().addClass('active');
	HideAllContainers();

	switch($(this).attr('class')){
		case 'entourage':
			$("#entourage").show();
			break;
		case 'registry':
			$("#registry").show();
			break;
		case 'home':
			$('#home').show();
			break;
		case 'gallery':
			$('#gallery').show();
			break;
	}
	
});

var giftName = '';
var giftId = '';
function clearRegistry()
{
	giftName='';
	giftId = '';
	$("#GiftGiftname").val("");
	$("#gift").text("");
	$("#error_msg").text("");
	$("#GiftName").val("");
	$("#GiftEmail").val("");
	$("#GiftContact").val("");
}
$("#registry #giftContainer a").on('click',function(){
	//var gift_id = $(this).attr("id").replace("gift_","");
	giftName = $(this).text();
	giftId = $(this).parent().attr('id');
	$("#rsvp").modal("show");
});
$("#rsvp").on("show",function(){
	$("#gift").text("Gift: " + giftName);
	$("#GiftGiftname").val(giftName);
});

$("#rsvp").on('hide',function(){
	clearRegistry();
});

$("form#GiftDisplayForm").on('submit',function(){
	if($("#GiftName").val() && $("#GiftEmail").val() && $("#GiftContact").val())
	{
		$.ajax({
			async:true, 
			data:$(this).serialize(), 
			success:function (data){
						var ObjData = JSON.parse(data);
						console.log(data);
						if(ObjData.response)
						{
							$("#" + giftId).html(giftName + " (taken)");
							$("#rsvp").modal("hide");
							clearRegistry();
						}
						else
							$("#error_msg").text(ObjData.error);
					}, 
			type:"POST", url:"/rsvp"
		});
	}
	else
	{
		$("#error_msg").text("Please provide complete information.");
	}
	return false;
});
function HideAllContainers() {
	$('#home').hide();
	$('#entourage').hide();
	$('#registry').hide();
	$('#gallery').hide();
}
$('#location').on('shown',function(){
	loadMap(10.325110,123.882061,10.330631,123.88005,"church_map",14);
});
$('#reception').on('shown',function(){
	loadMap(10.29790,123.90071,10.29790,123.90071,"reception_map",16);
});

function loadMap(centerLat,centerLong,markerLat,markerLong,elementId,zoom) {
	var mapOptions = {
		center: new google.maps.LatLng(centerLat,centerLong),
		zoom: zoom,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById(elementId),
				mapOptions);
	var marker = new google.maps.Marker({
					position: new google.maps.LatLng(markerLat,markerLong),
					map: map
				});
}

function UpdateTimer(countDown) {
	var Seconds = countDown;
	
	var Days = Math.floor(Seconds / 86400);
	Seconds -= Days * 86400;

	var Hours = Math.floor(Seconds / 3600);
	Seconds -= Hours * (3600);

	var Minutes = Math.floor(Seconds / 60);
	Seconds -= Minutes * (60);

	return ((Days > 0) ? Days + " Days " : "") + LeadingZero(Hours) + ":" + LeadingZero(Minutes) + ":" + LeadingZero(Seconds)
}


function LeadingZero(Time) {
	return (Time < 10) ? "0" + Time : + Time;
}

$(document).ready(function(){
	var weddingDate = new Date("September 08, 2012 15:30:00 GMT+0800");
	var now = new Date();
	if(now < weddingDate){
		var countDown = new Date(weddingDate - now);
			countDown = Math.floor(countDown / 1000);

		setInterval(function(){		
			$("#countDown").html(UpdateTimer(countDown) + " left");
			countDown -= 1;
		},1000);
	}
	$("#entourage-body").load("entourage.php");
});