/**
 * on fait une demande de confirmation avant de supprimer un élément au niveau de la page d'accueil
 * pour cela je crée une fonction auto invoquée
 */
(function () {
	var elements = document.getElementsByClassName('confirmSuppression');
	for(var i = 0; i < elements.length; i++){
		elements[i].addEventListener('click', function(e){
            var resultatChoix = confirm("Cette suppression est definitive.\n Continuer ?");
			if(!resultatChoix){
                alert("Operation annulée avec succes !");
                e.currentTarget.href = "";
			}
		});
	}
})();