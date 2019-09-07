$(window).load(function() {
	$(".se-pre-con").delay(1000).fadeOut("slow");
});

AOS.init();

function tab1() {
	var imge;
	imge = "img/Tablet2.png";
	$("#pic1").attr("src", imge);
}

function tab2() {
	var imge;
	imge = "img/Tablet3.png";
	$("#pic1").attr("src", imge);
}

function tab3() {
	var imge;
	imge = "img/Tablet4.png";
	$("#pic1").attr("src", imge);
}
/*************************U-BUILD FUNCTIONS*******************************************/
function showUserInfo(id){
	$('.preloader').show();
	$.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  url: "/home/user",
  type: "POST",
  data: {id},
  success: function(data){
  	$('.preloader').hide();
  	$('.border').show();
  	$('.border').html('');
  	$('.border').append(data.name);
  	$('.border').append('<br>');
  	$('.border').append(data.email);
  	console.log(data);
  }
});
}