<?php 

require_once 'files/bdd.php';

if(isset($_POST['pseudo'])) {

date_default_timezone_set('Europe/Paris');

	$date = date("d-m-Y");
	$heure = date("H:i");

if ($_POST['pseudo'] != " " && $_POST['age'] != " " && $_POST['email'] != " " && $_POST['skype'] != " " && $_POST['micro'] != " " && $_POST['exp'] != " " && $_POST['experience'] != " " && $_POST['dispo'] != " " && $_POST['motivation'] != " " && $_POST['screen'] != " " && $_POST['video'] != " " && $_POST['minecraft'] != " ") {
	$req = $bdd->prepare('INSERT INTO candidatures(pseudo, age, mail, skype, micro, exp, exp_desc, dispo, motiv, poste, screen, video, other, ip, minecraft, heure, date) VALUES(:pseudo, :age, :mail, :skype, :micro, :exp, :exp_desc, :dispo, :motiv, :poste, :screen, :video, :other, :ip, :minecraft, :heure, :date)');
	$req->execute(array(
		'pseudo' => $_POST['pseudo'],
		'age' => $_POST['age'],
		'mail' => $_POST['email'],
		'skype' => $_POST['skype'],
		'micro' => $_POST['micro'],
		'exp' => $_POST['exp'],
		'exp_desc' => $_POST['experience'],
		'dispo' => $_POST['dispo'],
		'poste' => 'graphiste',
		'motiv' => $_POST['motivation'],
		'heure' => $heure,
		'date' => $date,
		'minecraft' => $_POST['minecraft'],
		'screen' => $_POST['screen'],
		'video' => $_POST['video'],
		'other' => $_POST['do'] . " " . $_POST['do1'] . " " . $_POST['do2'] . " " . $_POST['do3'] . " " . $_POST['do5'],
		'ip' => $_SERVER["REMOTE_ADDR"]
	));
echo('<br><center><span class="label label-info">La candidature a bien été transmise.</span></center><br>');
} else {
echo("<br><center><span class='label label-danger'>La candidature n'a pas été transmise. Remplissez les champs !</span></center><br>");
}
}


 ?>
 <div class="container">
 	<div class="panel"><center>
Les graphistes devront envoyer en plus de la lettre de motivation, au minimum une création (plusieurs seraient appréciés). <br>(300ppp, 1920/1080px minimum, sauf textures) – Thème : Thaek le pirate <br>
Les animateurs 3D devront envoyer une vidéo de 30 secondes (URL YouTube non répertoriée) – Thème : Thaek sur son bateau pirate
 	</center></div>
<form class="form-horizontal" method="POST" action="#">
			<div class="form-group">
				<input class="form-control" type="text" name="pseudo" placeholder="Pseudo" required/>
			</div>
			<div class="form-group">		
				<input class="form-control" type="text" name="age" placeholder="Âge" required/>
			</div>
			<div class="form-group">
				<input class="form-control" name="email" type="email" placeholder="E-mail" required/>
			</div>
			<div class="form-group">
				<input class="form-control" name="skype" placeholder="Skype" required/>
			</div>
			Avez-vous un micro ?
			<input type="radio" name="micro" value="yes" checked required>Oui</input>  
			<input type="radio" name="micro" value="no">Non</input><br>

			Avez-vous acheté Minecraft ?
			<input type="radio" name="minecraft" value="oui" checked required>Oui</input>  
			<input type="radio" name="minecraft" value="non">Non</input>
			
			<div class="form-group"><br>
				Expérience dans la communauté Minecraft
				<select class="form-control" name="exp" required>
					<option value="aucune">Aucune</option>
					<option value="+ de 2 ans">+ 2 années</option>
					<option value="+ 1 an">+ 1 année</option>
					<option value="- 1 année">- 1 année</option>
					<option value="- 6 mois">- 6 mois</option>
				</select>
			</div>
			<div class="form-group">
				<textarea class="form-control" name="experience" placeholder="Décrivez votre expérience..." required></textarea>
			</div>
			<div class="form-group">
				Disponibilité
				<select class="form-control" name="dispo" required>
					<option value="Tous les jours">Tous les jours</option>
					<option value="Tous les weekend">Tous les weekend</option>
					<option value="Tous les mercredis">Tous les mercredis</option>
				</select>
			</div>
			<div class="form-group">
				<textarea style="resize:vertical;" class="form-control" name="motivation" placeholder="Lettre de motivation ( Pourquoi voulez-vous rejoindre la ThaekCorp ? )" required></textarea>
			</div>
			<div class="form-group">
				<input type="checkbox" name="do" value="3D">3D</input>
				<input type="checkbox" name="do1" value="Animation 3D">Animation 3D</input>
				<input type="checkbox" name="do2" value="dessin">Dessin</input>
				<input type="checkbox" name="do3" value="textures">Textures</input>
				<input type="checkbox" name="do4" value="autres">Autres</input>
				<input class="form-control" name="do5" placeholder="Autres..."/>
			</div>
			<div class="form-group">
				<input class="form-control" name="screen" placeholder="3 Screenshots à séparer par des espaces" required/>
			</div>
			<div class="form-group">
				<input class="form-control" name="video" placeholder="URL de la vidéo de présentation" required/>
			</div>
				<input class="form-control btn btn-success" type="submit" value="Envoyer la candidature"/>
			</div>
		</form>
 </div>