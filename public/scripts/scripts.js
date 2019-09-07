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
function showUserInfo(){
	$('.preloader').show();
	$.ajax({
  url: "/home/user",
  type: "GET",
  data: {},
  success: function(data){
  	$('.preloader').hide();
  	$('.border').show();
  	$('.border').html('');
  	$('.border').html(data);
  	console.log(data);
  }
});
}