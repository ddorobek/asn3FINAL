var cusName="";
var prodID="";
var quant=""
window.onload = function() {
	prepareListener();
}

function prepareListener() {
	cusName = document.getElementById("pickcustid").value;
	prodID = document.getElementById("pickprodid").value;
	quant = document.getElementById("quantity").value;
	select = document.getElementById("submit");
	select.addEventListener("click", insertCustomer);
}

function insertCustomer() {
	if(cusName != "" && prodID != "" && quant != "") {
		this.form.submit();
	}
}
