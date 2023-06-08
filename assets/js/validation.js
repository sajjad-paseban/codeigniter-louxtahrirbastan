try{
	function validation_login(){
		document.forms['login'][2].setAttribute("type","button")
		var counter = 0;
		for (var i = 0;i<document.forms['login'].length-1;i++){
			if(document.forms['login'][i].value == ""){
				document.forms['login'][i].classList.add("is-invalid");
				document.forms['login'][i].title = ".فیلد خالی می باشد"
				counter ++;
			}
		}
		if (counter == 0){
			document.forms['login'][2].setAttribute("type","submit")
		}
	}
	
	function validation_register(){
		document.forms['register'][5].setAttribute("type","button")
		var counter = 0;
		for (var i = 0;i<document.forms['register'].length-1;i++){
			if(document.forms['register'][i].value == ""){
				document.forms['register'][i].classList.add("is-invalid");
				document.forms['register'][i].title = ".فیلد خالی می باشد"
				counter ++;
			}
		}
		if (counter == 0){
			document.forms['register'][5].setAttribute("type","submit")
		}
	}

}catch(ex){console.log(ex)}

try{

	function validation_create_shop(){
		document.forms['create_shop'][1].setAttribute("type","button")
		var counter = 0;
		for (var i = 0;i<document.forms['create_shop'].length-1;i++){
			if(document.forms['create_shop'][i].value == ""){
				document.forms['create_shop'][i].classList.add("is-invalid");
				document.forms['create_shop'][i].title = ".فیلد خالی می باشد"
				counter ++;
			}
		}
		if (counter == 0){
			document.forms['create_shop'][1].setAttribute("type","submit")
		}
	}
}catch(ex){console.log(ex)}

try{
	function validation_create_bank(){
		document.forms['create_bank'][1].setAttribute("type","button")
		var counter = 0;
		for (var i = 0;i<document.forms['create_bank'].length-1;i++){
			if(document.forms['create_bank'][i].value == ""){
				document.forms['create_bank'][i].classList.add("is-invalid");
				document.forms['create_bank'][i].title = ".فیلد خالی می باشد"
				counter ++;
			}
		}
		if (counter == 0){
			document.forms['create_bank'][1].setAttribute("type","submit")
		}
	}
}catch(ex){console.log(ex)}

try{
	function validation_create_cash(){
		document.forms['create_cash'][2].setAttribute("type","button")
		var counter = 0;
		for (var i = 0;i<document.forms['create_cash'].length-1;i++){
			if(document.forms['create_cash'][i].value == ""){
				document.forms['create_cash'][i].classList.add("is-invalid");
				document.forms['create_cash'][i].title = ".فیلد خالی می باشد"
				counter ++;
			}
		}
		if (counter == 0){
			document.forms['create_cash'][2].setAttribute("type","submit")
		}
	}
}catch(ex){console.log(ex)}

try{
	document.forms['insert_sell'][2].onblur = function (){
		if(document.forms['insert_sell'][2].value == "-1"){document.getElementById('in_which_cash').style.display = "block";}else {document.getElementById('in_which_cash').style.display = "none";}
	}
	document.forms['insert_sell'][2].onchange = function (){
		if(document.forms['insert_sell'][2].value == "-1"){document.getElementById('in_which_cash').style.display = "block";}else {document.getElementById('in_which_cash').style.display = "none";}
	}
	document.body.onload = function (){
		if(document.forms['insert_sell'][2].value == "-1"){document.getElementById('in_which_cash').style.display = "block";}else {document.getElementById('in_which_cash').style.display = "none";}
		if(document.forms['delete_sell'][2].value == "-1"){document.getElementById('in_which_cash_delete').style.display = "block";}else {document.getElementById('in_which_cash_delete').style.display = "none";}
	}
	
	document.forms['delete_sell'][2].onblur = function (){
		if(document.forms['delete_sell'][2].value == "-1"){document.getElementById('in_which_cash_delete').style.display = "block";}else {document.getElementById('in_which_cash_delete').style.display = "none";}
	}
	document.forms['delete_sell'][2].onchange = function (){
		if(document.forms['delete_sell'][2].value == "-1"){document.getElementById('in_which_cash_delete').style.display = "block";}else {document.getElementById('in_which_cash_delete').style.display = "none";}
	}	
}catch(ex){console.log(ex)}


function separateNum(value, input) {
	/* seprate number input 3 number */
	var nStr = value + '';
	nStr = nStr.replace(/\,/g, "");
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	if (input !== undefined) {

		input.value = x1 + x2;
	} else {
		return x1 + x2;
	}
}

try{
	function validation_create_sell(){
		document.forms['insert_sell'][5].setAttribute("type","button")
		var counter = 0;
		for (var i = 0;i<document.forms['insert_sell'].length-1;i++){
			if(document.forms['insert_sell'][i].value == ""){
				document.forms['insert_sell'][i].classList.add("is-invalid");
				document.forms['insert_sell'][i].title = ".فیلد خالی می باشد"
				counter ++;
			}
			if(document.forms['insert_sell'][2].value != "-1"){
				i+=1;
			}
		}
		if (counter == 0){
			document.forms['insert_sell'][5].setAttribute("type","submit");
		}
	}
	document.forms['insert_sell'].onsubmit = function () {
		price = document.forms['insert_sell'][4].value;
		document.forms['insert_sell'][4].value = price.replace(/,\s?/g, "");
	}
	
	function validation_delete_sell(){
		document.forms['delete_sell'][4].setAttribute("type","button")
		var counter = 0;
		for (var i = 0;i<document.forms['delete_sell'].length-1;i++){
			if(document.forms['delete_sell'][i].value == ""){
				document.forms['delete_sell'][i].classList.add("is-invalid");
				document.forms['delete_sell'][i].title = ".فیلد خالی می باشد"
				counter ++;
			}
			if(document.forms['delete_sell'][2].value != "-1"){
				i+=1;
			}
		}
		if (counter == 0){
			document.forms['delete_sell'][4].setAttribute("type","submit");
		}
	}
}catch(ex){console.log(ex)}

try{
	function validation_insert_price(){
		document.forms['insert_price'][4].setAttribute("type","button");
		var counter = 0;
		for (var i = 0;i<document.forms['insert_price'].length-1;i++){
			if(document.forms['insert_price'][i].value == ""){
				if (i == 2){
					continue;
				}else {
					document.forms['insert_price'][i].classList.add("is-invalid");
					document.forms['insert_price'][i].title = ".فیلد خالی می باشد"
					counter ++;
				}
			}
		}
		if (counter == 0){
			document.forms['insert_price'][4].setAttribute("type","submit")
		}
	}
	// function validation_update_price(){
	// 	document.forms['update_price'][4].setAttribute("type","button");
	// 	var counter = 0;
	// 	for (var i = 0;i<document.forms['update_price'].length-1;i++){
	// 		if(document.forms['update_price'][i].value == ""){
	// 			if (i == 2){
	// 				continue;
	// 			}else {
	// 				document.forms['update_price'][i].classList.add("is-invalid");
	// 				document.forms['update_price'][i].title = ".فیلد خالی می باشد"
	// 				counter ++;
	// 			}
	// 		}
	// 	}
	// 	if (counter == 0){
	// 		document.forms['update_price'][4].setAttribute("type","submit")
	// 	}
	// }
	
	function validation_update_price(id){
		document.forms['update_price'+id][4].setAttribute("type","button");
		var counter = 0;
		for (var i = 0;i<document.forms['update_price'+id].length-1;i++){
			if(document.forms['update_price'+id][i].value == ""){
				if (i == 2){
					continue;
				}else {
					document.forms['update_price'+id][i].classList.add("is-invalid");
					document.forms['update_price'+id][i].title = ".فیلد خالی می باشد"
					counter ++;
				}
			}
		}
		if (counter == 0){
			document.forms['update_price'+id][4].setAttribute("type","submit")
		}
	}
	
	function validation_search_price(){
		document.forms['search_price'][1].setAttribute("type","button");
		var counter = 0;
		for (var i = 0;i<document.forms['search_price'].length-1;i++){
			if(document.forms['search_price'][i].value == ""){
				document.forms['search_price'][i].classList.add("is-invalid");
				document.forms['search_price'][i].title = ".فیلد خالی می باشد"
				counter ++;
			}
		}
		if (counter == 0){
			document.forms['search_price'][1].setAttribute("type","submit")
		}
	}
	function validation_delete_price(){
		if (document.getElementById('delete_name_price').value == ""){
			document.getElementById('delete_name_price').classList.add("is-invalid");
			document.getElementById('delete_name_price').title = ".فیلد خالی می باشد";
			document.getElementById('exampleModal').classList.remove('fade');
		}else {
			document.getElementById('exampleModal').classList.add('fade');
			document.getElementById('p_delete_price_warning').innerText = "آیا قصد حذف قیمت محصول "+document.getElementById('delete_name_price').value+" را دارید؟";
		}
	}
	function validation_increase_price(){
		if (document.getElementById('increase_percent_price').value == "" && document.getElementById('increase_brandName_price').value == ""){
			document.getElementById('increase_percent_price').classList.add("is-invalid");
			document.getElementById('increase_percent_price').title = ".فیلد خالی می باشد";
			document.getElementById('increase_brandName_price').classList.add("is-invalid");
			document.getElementById('increase_brandName_price').title = ".فیلد خالی می باشد";
			document.getElementById('exampleModal2').classList.remove('fade');
		}else if(document.getElementById('increase_percent_price').value == ""){
			document.getElementById('increase_percent_price').classList.add("is-invalid");
			document.getElementById('increase_percent_price').title = ".فیلد خالی می باشد";
			document.getElementById('exampleModal2').classList.remove('fade');
		} else if(document.getElementById('increase_brandName_price').value == "") {
			document.getElementById('increase_brandName_price').classList.add("is-invalid");
			document.getElementById('increase_brandName_price').title = ".فیلد خالی می باشد";
			document.getElementById('exampleModal2').classList.remove('fade');
		}else{
			document.getElementById('exampleModal2').classList.add('fade');
			document.getElementById('p_increase_price_warning').innerText = "آیا قصد افزایش "+document.getElementById('increase_percent_price').value+" درصدی محصولات برند "+document.getElementById('increase_brandName_price').value+" را دارید؟ ";
		}
	}
	const validation_change_price_by_FromDateAndToDate = () =>{
		let counter_error = 0
		$("#increase_percent_price_by_FromDateAndToDate_Modal").removeClass("fade")
		$("[name=increase_price_by_FromDateAndToDate]").children().find("input").each((i,el) =>{
			if(el.value == "" || el.value == null || el.value == undefined){
				el.classList.add("is-invalid")
				counter_error +=1;
			}else{
				el.classList.remove("is-invalid")
			}
		})

		if(counter_error > 0){
			const t = new Toast({message: ".برخی از فیلد ها مقدار دهی نشده اند",type:"danger"})
			$("#increase_percent_price_by_FromDateAndToDate_Modal").removeClass("fade")
		
		}else if((Number($("#ToDate").val().replaceAll('/','')) >= Number($("#FromDate").val().replaceAll('/',''))) != true){
			counter_error += 1
			new Toast({message: "فیلد تا تاریخ می بایست بزرگتر از فیلد از تاریخ باشد",type:"danger"})
		}

		if(counter_error == 0){
			$("#increase_percent_price_by_FromDateAndToDate_warning").text("آیا قصد تغییر  درصدی قیمت محصولات از تاریخ "+$("#FromDate").val()+" تا تاریخ "+$("#ToDate").val()+" را دارید؟")
			$("#increase_percent_price_by_FromDateAndToDate_Modal").addClass("fade")
		}


	}
	window.validation_change_price_by_FromDateAndToDate = validation_change_price_by_FromDateAndToDate;
	function validation_decrease_price(){
		if (document.getElementById('decrease_percent_price').value == ""){
			document.getElementById('decrease_percent_price').classList.add("is-invalid");
			document.getElementById('decrease_percent_price').title = ".فیلد خالی می باشد";
			document.getElementById('exampleModal3').classList.remove('fade');
		}else {
			document.getElementById('exampleModal3').classList.add('fade');
			document.getElementById('p_decrease_price_warning').innerText = "آیا قصد کاهش "+document.getElementById('decrease_percent_price').value+" درصدی قیمت تمامی محصولات را دارید؟";
		}
	}
	
	function un_seperate_Number(value){
		return  value.replace(/,\s?/g, "");
	}
	
	function insert_percent(){
		if (document.forms['insert_price'][1].value == ""){
			alert("فیلد قیمت خرید خالی می باشد");
			document.forms['insert_price'][2].value = "";
		}else if (document.forms['insert_price'][2].value == ""){
			document.forms['insert_price'][3].value = ""
		} else {
			separateNum(Number(un_seperate_Number(document.forms['insert_price'][1].value)) + ((Number(un_seperate_Number(document.forms['insert_price'][1].value)) * Number(document.forms['insert_price'][2].value))/100),document.forms['insert_price'][3]);
		}
	}
	
	// function update_percent(){
	// 	if (document.forms['update_price'][1].value == ""){
	// 		alert("فیلد قیمت خرید خالی می باشد");
	// 		document.forms['update_price'][2].value = "";
	// 	}else if (document.forms['update_price'][2].value == ""){
	// 		document.forms['update_price'][3].value = "";
	// 	} else {
	// 		separateNum(Number(un_seperate_Number(document.forms['update_price'][1].value)) + ((Number(un_seperate_Number(document.forms['update_price'][1].value)) * Number(document.forms['update_price'][2].value))/100),document.forms['update_price'][3]);
	// 	}
	// }
	
	function update_percent(id){
		if (document.forms['update_price'+id][1].value == ""){
			alert("فیلد قیمت خرید خالی می باشد");
			document.forms['update_price'+id][2].value = "";
		}else if (document.forms['update_price'+id][2].value == ""){
			document.forms['update_price'+id][3].value = "";
		} else {
			separateNum(Number(un_seperate_Number(document.forms['update_price'+id][1].value)) + ((Number(un_seperate_Number(document.forms['update_price'+id][1].value)) * Number(document.forms['update_price'+id][2].value))/100),document.forms['update_price'+id][3]);
		}
	}
}catch(ex){console.log(ex)}

// new Toast({message: "Welcome to Toast"})