function changeModsAuth() {
	document.querySelectorAll('#changeFormBtn').forEach(Element => Element.classList.toggle('active'));
	document.querySelectorAll('#changeForm').forEach(Element => Element.classList.toggle('active'));
}