window.onload = function() {
	prepareListener();
}

function prepareListener() {
	var droppy;
	droppy = document.getElementById("pickacustomer");
	droppy.addEventListener("change", getCustomer);
}

function getCustomer() {
	this.form.submit();
}
