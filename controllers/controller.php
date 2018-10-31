<?php
class MvcController{

    public function pagina(){
        include 'views/template.php';
    }

    public function enlacesPaginasController(){
        if(isset($_GET['action'])){
            $enlaces = $_GET['action'];
        }else{
            $enlaces = 'index';
        }
        $respuesta = EnlacesPagina::enlacesPaginasModel($enlaces);
        include $respuesta;
    }

    public function registrarUsuarioController(){
        if(isset($_POST['username'])){

            $usuario = array(
                'username' => $_POST['username'],
                'password' => $_POST['password']
            );

            //print_r($usuario);

            $stmt = Datos::registrarUsuario($usuario,'usuario');

            if($stmt == "success")
                header("location:index.php"); 
            else 
                header("location:index.php");
        }
    }

    public function loginController(){

        if (isset($_POST['username'])) {
            $usuario = array('username' => $_POST['username'],
                            'password' => $_POST['password']
            );
            //Recibe el usuario como un array y el nombre de la tabla
            $stmt = Datos::loginModel($usuario, 'usuario');
            
            //Si los datos coinciden con los de la base de datos entonces se inicia la sesion
            if($_POST['username'] == $stmt['username']){ 
                //Comprobar la contraseña cifrada de la base de dartos con la del formulario
                if(($_POST['password'] == $stmt['password'])){ 
                    //Se inicia la sesion y se redirecciona al listado de usuarios
                    session_start();
                    $_SESSION['sesion'] = true;
                    header('location: index.php');
                }
            } 
            else 
                header('location:index.php?action=fallo');
        }
    }

    //Funcion para agregar equipios
    public function addEquiposController(){
        if(isset($_POST['nombre_equipo'])){
            $equipo = $_POST['nombre_equipo'];

            $stmt = Datos::addEquiposModel($equipo, 'equipo');

            if($stmt == "success")
                header("location: index.php?action=equipos"); 
            else 
                header("location:index.php");
        }
    }

    //Funcion para agregar jugadores
    public function addJugadoesController(){
        if(isset($_POST['nombre_jugador'])){
            $jugador = array(
                'nombre_jugador' => $_POST['nombre_jugador'],
                'numero_jugador' => $_POST['numero_jugador']
            );

            $stmt = Datos::addJugadorModel($jugador, 'jugador');

            if($stmt == "success")
                header("location: index.php?action=jugadores"); 
            else 
                header("location:index.php");
        }
    }

    public function updateEquiposController(){
        if(isset($_POST['nombre_equipo'])){
            $equipo = array(
                'nombre_equipo' => $_POST['nombre_equipo'],
                'idEquipo' => $_POST['idEquipo']
            );

            $stmt = Datos::updateEquipo($equipo, 'equipo');

            if($stmt == 'success')
                header('Location: index.php?action=equipos');
            else
                echo 'Hubo un errror al actualizar';
        }
    }

    //Funcion para imprimir los equipos en check box
    public function getEquiposCB(){
        $stmt = Datos::getEquipos('equipo');
        foreach($stmt as $equipos => $r){
            echo'
                <div class="checkbox">
                    <label>
                    <input type="checkbox" name="'.$r['idEquipo'].'Equipo"> '.$r['nombre_equipo'].'
                    </label>
                </div>
            ';
        }
    }

    //Funcion para traer un registro de la base de datos
    public function getEquipo(){
        if (isset($_GET['idEquipo'])) {
            $id = $_GET['idEquipo'];
            $stmt = Datos::getEquipo($id, 'equipo');
            return $stmt;
        }
    }

    //Sirve para la vista de la tabla de los equipos, imprime los equipos registrados
    public function getEquiposController(){
        $stmt = Datos::getEquipos('equipo');

        foreach($stmt as $row => $item){
			echo'
				<tr>
					<td>'.$item["idEquipo"].'</td>
                    <td>'.$item["nombre_equipo"].'</td>
                    <td> 
                        <a href="index.php?action=editarEquipo&idEquipo='.$item["idEquipo"].'"> 
					        <button class="btn btn-warning"><i class="fa fa-edit"></i> Editar</button>
					    </a> 
					</td>
                    <td> 
                        <a href="index.php?action=equipos&idBorrar='.$item["idEquipo"].'"> 
                            <button class="btn btn-danger"> 
                            <i class="fa fa-trash"></i> Eliminar </button>
                        </a>
                    </td>
                </tr> '
            ;
        }
    }

    //Function para eliminar un equipo
    public function deleteEquipoController(){
        if(isset($_GET["idBorrar"])){

            $stmt = Datos::deleteEquipo($_GET['idBorrar'], 'equipo');
            
			if($stmt == "success")
				header('Location: index.php?action=equipos');
			else
                echo 'error';
        }
    }



}
?>