Basándote en el entregable de la sesión 4, debes crear un programa orientado a objetos, que muestre un listado de todas las imágenes del directorio “fotos”.

Debe contener las siguientes clases:

class File: esta clase se debe encargar de leer el directorio y obtener la lista de ficheros. También debe contener un constructor donde se definirá la ruta de las fotos, cuando se instancie.

class Image:  esta clase hereda de File, ya que la imagen es un tipo de fichero. Tendrá métodos específicos para comprobar y validar las extensiones de las imágenes, crear las miniaturas y obtener las imágenes validadas.

class System: esta clase se encargará de interactuar con el sistema, con un método para ejecutar el comando convert.

 

Requisitos:

1. Para ejecutar el programa, solo se podrá instanciar la clase Image y ejecutar un solo método público.

2. Solo puede existir un método público en la clase Image y otro en System.

3. Todos los métodos de File debe ser métodos protegidos excepto el constructor.

4. La clase File debe tener los siguientes métodos: __construct($path), createDir(), checkIfFileExists(), getFileList().

5. La clase Image debe tener los siguiente métodos: createThumb(), validatePhoto(), getImages().

6. La clase System debe tener el método execCommand().

7. Cada clase debe encargarse de su ámbito, los ficheros los gestiona File (mkdir, is_dir, is_file, opendir, readdir, closedir), las imágenes Image y el las ejecuciones del sistema la clase System.

8. La clase Image debe usar una constante para el nombre del directorio de las miniaturas, para usarse junto con el $path definido.

Para ejecutar el programa debes usar las siguientes líneas, pudiendo cambiar la ruta de las fotos:

$path = "fotos";

$image = new Image($path);

$image_list = $image->getImages(); 

$image_list es un array, que puedes recorrer para mostrar las fotos en el HTML.

El resultado debe ser el mismo que el entregable 4 y se entregará en un único fichero php.
