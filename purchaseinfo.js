window.onload = function() {
	prepareListener();
}

function prepareListener() {
	var droppy;
	droppy = document.getElementById("pickprodid");
	droppy.addEventListener("change", getProduct);
}

function getProduct() {
	this.form.submit();
}
