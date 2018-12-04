var number="";

window.onload = function() {
	prepareListener();
}

function prepareListener() {
	number = document.getElementById("number").value;
	select = document.getElementById("submit");
	select.addEventListener("click", updatePhone);
}

function updatePhone() {
	if(number != "") {
		this.form.submit();
	}
}
