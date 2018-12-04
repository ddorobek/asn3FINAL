var sortby="";
var sortad="";

window.onload = function() {
	prepareListener();
}

function prepareListener() {
	sortby = document.getElementById("sortby").value;
	sortad = document.getElementById("sortad").value;
	select = document.getElementById("submit");
	select.addEventListener("click", getProductInfo);
}

function getProductInfo() {
	this.form.submit();
}
