window.onload=function(){
	
	var titluCategorie = document.getElementById("Titlu");
	var wordCounterTitlu = document.getElementById("wordCounterTitlu");
	
	var descriereCategorie = document.getElementById("Descriere");
	var wordCounterDescriere = document.getElementById("wordCounterDescriere");
	
	titluCategorie.addEventListener("keyup",function(){
		var caractere = titluCategorie.value.split('');
		wordCounterTitlu.innerText = 70 - caractere.length;
	});	
	
	descriereCategorie.addEventListener("keyup",function(){
		var caractere = descriereCategorie.value.split('');
		wordCounterDescriere.innerText = 100 - caractere.length;
	});	
	
}