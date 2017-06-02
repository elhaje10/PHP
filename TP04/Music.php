<?php 

/**
* Music
*/
class Music
{
	public $id; // identifiant de la musique
	public $author;
	public $title;
	public $cover; // nom du fichier image
	public $mp3; // nom du fichier audio
	public $category; // catégorie de musique

	
	function __construct($arguments)
	{
		$i = 0;
		foreach ($this as $key => $value) {
			$this->$key = $arguments[$i];
			$i++;
		}
	}
}


/**
* Ouvre le fichier musicDB.txt
*/
function loadMusicDB()
{
	$musiques = array();

	$fichier = fopen("musicDB.txt", "r");
	if ($fichier) {
		while (($buffer = fgets($fichier)) !== false) {
			$buffer = rtrim($buffer);
			$ligne = explode("|", $buffer);
			$m = new Music($ligne);
			$musiques[$ligne[0]] = $m;
		}
	}
	fclose($fichier);
	return $musiques;
}



// $allMusic = loadMusicDB();
// var_dump($allMusic);





 ?>