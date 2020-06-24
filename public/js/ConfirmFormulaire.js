
//les fonctions de verifications individuelles

function surligne(champ, erreur){
	if(erreur)
		champ.style.backgroundColor = "#fba";
	else
		champ.style.backgroundColor = "";
}

function verifieIntitule(intitule){
	var regex = /^[A-Z]{1}[a-zA-Z0-9\s]+$/;
	if(!regex.test(intitule.value)){
		surligne(intitule, true);
		return false;
	}
	else{
		surligne(intitule,false);
		return true;
	}
}

function verifieNom(nom){
	var regex = /^[A-Z]{1}[-a-zA-Z\s]+$/;
	if(!regex.test(nom.value)){
		surligne(nom, true);
		return false;
	}
	else{
		surligne(nom, false);
		return true;
	}
}

function verifiePrenom(prenom){
	var regex = /^[A-Z]{1}[-a-zA-Z\s]+$/;
	if(!regex.test(prenom.value)){
		surligne(prenom, true);
		return false;
	}
	else{
		surligne(prenom, false);
		return true;
	}
}

function verifieCne(cne){
	var regex = /^.+$/;
	if(!regex.test(cne.value)){
		surligne(cne, true);
		return false;
	}
	else{
		surligne(cne, false);
		return true;
	}
}

function verifieDn(dn){
	/*var regex = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
	if(!regex.test(dn.value)){
		surligne(dn, true);
		return false;
	}
	else{
		surligne(dn, false);
		return true;
	}*/
	return true;
}

function verifieStatus(status){
	var regex = /^[A-Z0-9]{1}[a-zA-Z\s]+$/;
	if(!regex.test(status.value)){
		surligne(status, true);
		return false;
	}
	else{
		surligne(status, false);
		return true;
	}
}

function verifieString(s){
	var regex = /^[-A-Z1-9]{1}[-,'a-zA-Z1-9\s]+$/;
	if(!regex.test(s.value)){
		surligne(s, true);
		return false;
	}
	else{
		surligne(s, false);
		return true;
	}
}

function verifieAnnee(annee){
	var regex = /^2[0-9]{3}\/2[0-9]{3}$/;
	if(!regex.test(annee.value)){
		surligne(annee, true);
		return false;
	}
	else{
		surligne(annee, false);
		return true;
	}
}

function verifieVolumeHoraire(vh){
	var regex = /^[0-9]{1,2}$/;
	if(!regex.test(vh.value)){
		surligne(vh, true);
		return false;
	}
	else{
		surligne(vh,false);
		return true;
	}
}

function verifieNbrEvaluation(nb){
	if(isNaN(nb.value) || nb.value < 1){
		surligne(nb, true);
		return false;
	}
	else{
		surligne(nb, false);
		return true;
	}
}

function verifiePourcentage(p){
	var regex = /^[0-9]{1,3}\.[0-9]{0,2}$/;
	if(!regex.test(p.value)){
		surligne(p,true);
		return false;
	}
	else{
		surligne(p, false);
		return true;
	}
}

//les fonctions de verifications d'ensemble
function verfieAU(au){
	var annee = verifieAnnee(au.annee);
	if(annee)
		return true;
	else{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}

function verifieCoordinateur(co){
	var cne = verifieCne(co.cne);
	var nom = verifieNom(co.nom);
	var prenom = verifiePrenom(co.prenom);
	var dn = verifieDn(co.dn);
	var grade = verifieString(co.grade);
	var specialite = verifieString(co.specialite);
	var departement = verifieString(co.departement);
	var etablissement = verifieString(co.etablissement);
	if(cne && nom && prenom && dn && grade && specialite && departement && etablissement){
		return true;
	}
	else{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}

function verifieEtudiant(co){
	var cne = verifieCne(co.cne);
	var nom = verifieNom(co.nom);
	var prenom = verifiePrenom(co.prenom);
	var dn = verifieDn(co.dn);
	var status = verifieStatus(co.status);
	if(cne && nom && prenom && dn && status){
		return true;
	}
	else{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}

function verifieSemestre(s){
	if(isNaN(s.value) || s.value < 1 || s.value > 6){
		surligne(s, true);
		return false;
	}
	else{
		surligne(s, false);
		return true;
	}
}

function verifieMatiere(m){
	var intitule = verifieIntitule(m.intitule);
	var vhc = verifieVolumeHoraire(m.volumeHoraireCours);
	var vhtd = verifieVolumeHoraire(m.volumeHoraireTd);
	var vhtp = verifieVolumeHoraire(m.volumeHoraireTp);
	var nb = verifieNbrEvaluation(m.nombreEvaluation);
	var ap = verifieString(m.activitePratique);
	var p = verifiePourcentage(m.pourcentageNote);

	if(intitule && vhc && ap && p && nb && vhtp && vhtd){
		return true;
	}
	else{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}

function verifieModule(m){
	var intitule = verifieIntitule(m.intitule);
	var departement = verifieString(m.departement);
	var nature = verifieString(m.nature);
	var semestre = verifieSemestre(m.semestre);
	var objectif = verifieString(m.objectif);
	var pre_requisPedagogique = verifieString(m.pre_requisPedagogique);
	var descriptif = verifieString(m.descriptif);
	if(intitule && departement && nature && semestre && objectif && pre_requisPedagogique && descriptif){
		return true;
	}
	else{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}

function verifieProfesseur(co){
	var cne = verifieCne(co.cne);
	var nom = verifieNom(co.nom);
	var prenom = verifiePrenom(co.prenom);
	var dn = verifieDn(co.dn);
	var grade = verifieString(co.grade);
	var specialite = verifieString(co.specialite);
	var departement = verifieString(co.departement);
	var etablissement = verifieString(co.etablissement);
	if(cne && nom && prenom && dn && grade && specialite && departement && etablissement){
		return true;
	}
	else{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}

function verifieSemestreForm(s){
	numero = verifieSemestre(s.numero);
	if(numero){
		return true;
	}
	else{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}

function verifieEtudiantToSemestre(es){
	var s = verifieSemestre(es.numero);
	var annee = verifieAnnee(es.annee);
	if(s && annee)
	{
		return true;
	}
	else{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}
function verifieMatiereToModule(mm){
	var intituleMat = verifieIntitule(mm.intituleMatiere);
	var intituleMod = verifieIntitule(mm.intituleModule);
	if(intituleMat && intituleMod){
		return true;
	}
	else{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}

function verifieMatiereToProfesseur(mp){
	var annee = verifieAnnee(mp.annee);
	var nt = verifieString(mp.natureIntervention);
	if(annee && nt)
	{
		return true;
	}
	else{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}

function verifieModuleToCoordinateur(mc)
{
	var annee = verifieAnnee(mc.annee);
	if(annee){
		return true;
	}
	else
	{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}

function verifieModuleToEtudiant(me){
	var annee = verifieAnnee(me.annee);
	if(annee){
		return true;
	}
	else
	{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}

function verifieModuleToSemestre(me){
	var s = verifieSemestre(me.numero);
	var annee = verifieAnnee(me.annee);
	if(s && annee){
		return true;
	}
	else
	{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}

function verifieSemestreToAU(sa){
	var s = verifieSemestre(sa.numero);
	var annee = verifieAnnee(sa.annee);
	if(s && annee){
		return true;
	}
	else
	{
		alert('Veuiilez remplir tous les champs correctement');
		return false;
	}
}
