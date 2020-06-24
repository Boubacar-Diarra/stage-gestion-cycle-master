<?php
$db = new PDO('mysql:host=localhost;dbname=gem','root','');

$createTableModule = 'create table if not exists module(id int(5) primary key  AUTO_INCREMENT, intitule varchar(50) not null, departement varchar(25) not null,
    nature varchar(25) not null, semestre int(2) not null, objectif varchar(25) not null, pre_requisPedagogique varchar(25), descriptif varchar(50) not null)';

$createTableMatiere = 'create table if not exists matiere(id int(5) primary key AUTO_INCREMENT, intitule varchar(50) not null,
    volumeHoraireCours int(5) not null, nombreEvaluation int(5) not null, volumeHoraireTd int(5) not null, volumeHoraireTp int(5) not null,
    activitePratique varchar(25), pourcentageNote decimal(5,5) not null, idModule int(5), foreign key (idModule) references module(id) )';

    $createTableProfesseur = 'create table if not exists professeur (cne varchar(15) primary key, nom varchar(15) not null,
    prenom varchar(15) not null, dn date not null, grade varchar(15) not null, specialite varchar(15) not null, departement varchar(25) not null,
    etablissement varchar(25) not null)';

    $createTableSemestre = 'create table if not exists semestre (id int(5) primary key auto_increment, numero int(1) not null,
        idAnnee int(5), foreign key(idAnnee) references AnneeUniversitaire(id))';

    $creatTableAnneeU = 'create table if not exists anneeUniversitaire (id int(5) primary key auto_increment, annee varchar(15) not null)';

    $createTableAppartenir = 'create table if not exists appartenir (annee varchar(15) not null, cneEtudiant varchar(15) not null, idSemestre int(5) not null,
        foreign key(cneEtudiant) references etudiant(cne), foreign key(idSemestre) references semestre(id), primary key(cneEtudiant,idSemestre))';

    $createTableEtudier = 'create table if not exists etudier(note decimal(5,5), annee varchar(15), cneEtudiant varchar(15) not null, idModule int(5) not null,
        foreign key(cneEtudiant) references etudiant(cne), foreign key(idModule) references module(id), primary key(cneEtudiant, idModule))';
    
    $creatTabCoordinateur = 'create table if not exists coordinateur (cne varchar(15) primary key, nom varchar(15) not null,
    prenom varchar(15) not null, dn date not null, grade varchar(15) not null, specialite varchar(15) not null, departement varchar(25) not null,
    etablissement varchar(25) not null)';

    $createtableEnseigner = 'create table if not exists enseigner(annee varchar(15) not null, natureIntervention varchar(15) not null,
    cneProfesseur varchar(15) not null, idMatiere int(5) not null, foreign key(cneProfesseur) references professeur(cne),
    foreign key(idMatiere) references matiere(id), primary key (cneProfesseur,idMatiere))';

    $createTableCompose = 'create table if not exists compose(annee varchar(15) not null, idModule int(5) not null, idSemestre int(5) not null,
        foreign key(idModule) references module(id), foreign key(idSemestre) references semestre(id), primary key (idSemestre,idModule))';
    
    $createTableResponsable = 'create table if not exists responsable(annee varchar(15) not null, cneCoordinateur varchar(15) not null, idModule int(5) not null,
        foreign key(idModule) references module(id), foreign key(cneCoordinateur) references coordinateur(cne), primary key (cneCoordinateur,idModule))';

    $createTableEtudiant = 'create table if not exists etudiant (cne varchar(15) primary key, nom varchar(15) not null,
                prenom varchar(15) not null, dn date not null, status varchar(15) not null)';

    $createTableAdmin = 'create table if not exists admin(username varchar(15) primary key, mdp varchar(20) not null)';

    $db->exec($createTableAdmin);