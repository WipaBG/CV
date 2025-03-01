function toggleTheme() {
	//toggle background to black
    document.body.classList.toggle('dark-mode');
	
	//fetch main div and contact send button
	var div = document.getElementById('main');
	var btn = document.getElementById('btn');

	//Change settings to dark mode on toggle
	div.classList.toggle('dark-mode-div');
	btn.classList.toggle('dark-mode-btn');

	//fetch form
	var in1 = document.getElementById('id1');
	var in2 = document.getElementById('id2');
	var in3 = document.getElementById('id3');
	
	in1.classList.toggle('input');
	in2.classList.toggle('input');
	in3.classList.toggle('input');
}
