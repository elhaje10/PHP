<?php

function findMP3($groupDir)
{
	$dir = $groupDir;
	$mp3 = array();
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
				if ($file[0]!='.') {
					if (pathinfo($file)['extension'] == "mp3") {
						$mp3[] = pathinfo($file)['filename'];
					}
				}
			}
			closedir($dh);
		}
	}
	return $mp3;
}


function scanMusic($dataDir)
{
	$tableau = array();
	

	$dir = opendir($dataDir);
	while (($tempDir = readdir($dir)) !== false) {
		if (is_dir($dataDir.'/'.$tempDir)) {
			if ($tempDir[0] != '.') {
				$morceaux = findMP3($dataDir.'/'.$tempDir);
				foreach ($morceaux as $key => $value) {
					$tableau[] = $tempDir.'/'.$value;
				}
			}
		}
	}
	closedir($dir);
	return $tableau;
}

?>