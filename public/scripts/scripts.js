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

function search() {
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("myInput");
	filter = input.value.toUpperCase();
	table = document.getElementById("myTable");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++) {
	  td = tr[i].getElementsByTagName("td")[0];
	  if (td) {
		txtValue = td.textContent || td.innerText;
		if (txtValue.toUpperCase().indexOf(filter) > -1) {
		  tr[i].style.display = "";
		} else {
		  tr[i].style.display = "none";
		}
	  }       
	}
  }

  function buyMaterial(product_id, building_id) {

	var count = $("input[name=mat_count"+product_id+"]").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "/materials/buy",
		type: "POST",
		data: {product_id, count, building_id},
		success: function(data){
			console.log("added");
		}
	  });
  }