var quant=""
window.onload = function() {
	prepareListener();
}

function prepareListener() {
	quant = document.getElementById("quantity").value;
	select = document.getElementById("submit");
	select.addEventListener("click", insertCustomer);
}

function insertCustomer() {
	if(quant != "") {
		this.form.submit();
	}
}
