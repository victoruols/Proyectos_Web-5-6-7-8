<!DOCTYPE html>
<html>
	<head>
		<title>Sesión 5</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Galería de imagenes en miniatura</h1>
		<table>
		<?php
			//Declaro las variables
			$path = "fotos";
			$image = new ClassImage($path);
			$image_list = $image->getImage();

			$i = 0;
	foreach ($image_list as $archivo) {
		$i++;
		echo "<tr><td>";
		echo $archivo ; 
		echo "<a href= '$path/$archivo'><img src= '$path/thumbs/$archivo'></a>";
		echo "</td></tr>";
	}
		?>
		</table>

	</body>
</html>


<?php
class ClassFile
{
protected $path; //Variable fotos
protected $ruta_apache;
protected $ruta_thumbs;
	
	function __construct($path)
	{
		$ruta_apache = getcwd(); 
		$this->path = $ruta_apache . "/" . $path;
	}

	protected function createdir(){
		if(file_exists($ruta_thumbs)){
			echo("Existe el directorio thumbs <br>");
		}else{
			echo ("No existe el directorio thumbs <br>");
			mkdir("thumbs", 0777, true);
		}

	}

	//
	protected function checkFileExists(){
		if(file_exists($ruta_actual . $path)){
			//echo("Existe el directorio fotos <br>");
		}else{
			//echo("No existe el directorio fotos <br>");
		}
		if(preg_match("/^.*\.(jpg|jpeg|png|gif)$/i",$photo)){
			//echo("Extension correcta <br>");
			return true;
		}else{
			//echo("Extension incorrecta <br>");
			return false;
		}

	}
	//
	protected function getFileList(){
		$directorio = opendir($this->path);
		$archivos = array();
		while ($archivo = readdir($directorio)) { 
	    		
				$archivos[]=$archivo;
	}
		return $archivos;
	}
}


class ClassImage extends ClassFile
{
	const PATH_THUMBS = "/thumbs";
	private $picture = "";

	protected function createThumb(){
		if(file_exists(self::PATH_THUMBS)){
			//echo("Existe el directorio thumbs <br>");
		}else{
			//echo ("No existe el directorio thumbs <br>");
			mkdir(self::PATH_THUMBS, 0777, true);
		}

	}
	protected function validatePhoto(){
		if(preg_match("/^.*\.(jpg|jpeg|png|gif)$/i",$this->picture)){
			//echo("Extension correcta <br>");
			return true;
		}else{
			//echo("Extension incorrecta <br>");
			return false;
		}
		
	}
	public function getImage(){
		$this->path_thumbs = $this->path . self::PATH_THUMBS;
		//Creo el directorio
		$this->createThumb();
		$lista_archivos = array();
		$lista_archivos = $this->getFileList();
		$archivos = array();
		foreach($lista_archivos as $fichero){
			$this->picture = $fichero;
			if ($this->validatePhoto()) {
				$archivos[] = $fichero;
				ClassSystem::execCommand($this->path . "/" . $fichero , $this->path_thumbs . "/" . $fichero);
			}
		}
		return $archivos;
	}
}


class ClassSystem
{
	public function execCommand($origen, $destino){
		exec("convert -resize 40X40 " . $origen . " " . $destino);
	}
}

?>
