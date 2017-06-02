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

	
	// function __construct($arguments)
	// {
	// 	$i = 0;
	// 	foreach ($this as $key => $value) {
	// 		$this->$key = $arguments[$i];
	// 		$i++;
	// 	}
	// }

	function __construct()
	{}
}

/**
* Data Acces Objet Music
*/
class MusicDAO
{

	private $db; // conserver la référence à l'objet PDO
	
	function __construct()
	{
		try {
			$this->db = new PDO('sqlite:data/music.db');
		} catch (PDOException $e) {
			exit("ERREUR : ".$e->getMessage());
		}
	}

	function get($id)
	{
		$sql = "SELECT * FROM music WHERE id='$id'"; // requete SQL

		$ligne = $this->db->query($sql);

		$param = $ligne->fetchAll(PDO::FETCH_CLASS, "Music");

		return $param[0];
	}
}


$jukebox = new MusicDAO();
$m = $jukebox->get(5);
var_dump($m);



 ?>