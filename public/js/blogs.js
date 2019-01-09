function loginClick(){
	const name = document.getElementById("name");
	console.log(name);
	window.location.href = '/' + name;
}