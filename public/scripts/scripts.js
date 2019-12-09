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
	  td1 = tr[i].getElementsByTagName("td")[0];
	  td2 = tr[i].getElementsByTagName("td")[1];
	  if (td1 || td2) {
		txtValue1 = td1.textContent || td1.innerText;
		txtValue2 = td2.textContent || td2.innerText;
		if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
		  tr[i].style.display = "";
		} else {
		  tr[i].style.display = "none";
		}
	  }       
	}
  }

  function searchWorker() {
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("myInput2");
	filter = input.value.toUpperCase();
	table = document.getElementById("myTable2");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++) {
	  td1 = tr[i].getElementsByTagName("td")[0];
	  td2 = tr[i].getElementsByTagName("td")[1];
	  if (td1 || td2) {
		txtValue1 = td1.textContent || td1.innerText;
		txtValue2 = td2.textContent || td2.innerText;
		if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
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
			console.log(data);
			document.location.reload(true);
		}
	  });
  }

  function signContract(worker_id, building_id) {

	var start = $("input[name=start_contract"+worker_id+"]").val();
	var end = $("input[name=end_contract"+worker_id+"]").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "/contracts/sign",
		type: "POST",
		data: {worker_id, start, end, building_id},
		success: function(data){
			console.log("signed");
			document.location.reload(true);
		}
	  });
  }

  function addTask() {

	var work_type = $("#work_type :selected").val();
	var building_id = $("input[name=building_id]").val();
	var text = $("input[name=text]").val();
	var price = $("input[name=work_price]").val();
	var status = $("input[name=status]").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "/tasks/add",
		type: "POST",
		data: {work_type, building_id, text, price, status},
		success: function(data){
			console.log("added task");
			document.location.reload(true);
		}
	  });
  }

  function taskDone(id) {

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "/tasks/done",
		type: "POST",
		data: {id},
		success: function(data){
			console.log("updated");
			document.location.reload(true);
		}
	  });
  }

  function taskDelete(id) {

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "/tasks/delete",
		type: "POST",
		data: {id},
		success: function(data){
			console.log("deleted");
			document.location.reload(true);
		}
	  });
  }

  function refreshTaskModal() {

	var text = $("input[name=text]").val('');
	var price = $("input[name=work_price]").val('');
	var work_type = $("#work_type option[value='def']").attr("selected",true);

  }

  function delete_build(id, admin) {

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "/building/destroy",
		type: "POST",
		data: {id},
		success: function(data){
			console.log("deleted");
			document.location.href = '/buildings/'+admin;
		}
	  });
  }

  function editBuild(){

	var building_id = $("#edit input[name=building_id]").val();
	var name = $("#edit input[name=name]").val();
	var budjet = $("#edit input[name=budjet]").val();
	var start = $("#edit input[name=start]").val();
	var end = $("#edit input[name=end]").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "/building/edit",
		type: "POST",
		data: {name, building_id, budjet, start, end},
		success: function(data){
			console.log("edited");
			document.location.reload(true);
		}
	  });
  }