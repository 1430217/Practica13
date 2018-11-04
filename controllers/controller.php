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
                    $_SESSION['username'] = $respuesta['username'];
                    $_SESSION['idUsuario'] = $respuesta['idUsuario'];
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
                'numero_jugador' => $_POST['numero_jugador'],
                'idEquipo' => $_POST['idEquipo']
            );

            $stmt = Datos::addJugadorModel($jugador, 'jugador');
            if($stmt == "success")
                header("location: index.php?action=jugadores"); 
            else 
                header("location:index.php");
        }
    }

    //Funcion para hacer el update equipos
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

     //Funcion para agregar jugadores
     public function updateJugadorController(){
        if(isset($_POST['nombre_jugador'])){
            $jugador = array(
                'nombre_jugador' => $_POST['nombre_jugador'],
                'numero_jugador' => $_POST['numero_jugador'],
                'idEquipo' => $_POST['idEquipo'],
                'idJugador' => $_POST['idJugador']
            );

            //print_r($jugador);

            $stmt = Datos::updateJugadorModel($jugador, 'jugador');
            if($stmt == "success")
                header("location: index.php?action=jugadores"); 
            else 
                header("location:index.php");
        }
    }

    //Funcion para imprimir los equipos en un select
    public function getEquiposCB(){
        $stmt = Datos::getEquipos('equipo');
        foreach($stmt as $equipos => $r){
            echo'
                <option value="'.$r['idEquipo'].'">' .$r['nombre_equipo']. '</option>
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

    public function getJugadores(){
        $stmt = Datos::getJugadores();

        foreach ($stmt as $tow => $item) {
            echo'
                <tr>
                    <td>'.$item["nombre_jugador"].'</td>
                    <td>'.$item["numero_jugador"].'</td>
                    <td>'.$item["nombre_equipo"].'</td>
                    <td>
                        <a href="index.php?action=editarJugador&idJugador='.$item["idJugador"].'"> 
                            <button class="btn btn-warning"><i class="fa fa-edit"></i> Editar</button>
                        </a>
                    </td>

                    <td>
                        <a href="index.php?action=jugadores&idBorrar='.$item["idJugador"].'"> 
                            <button class="btn btn-danger"> 
                            <i class="fa fa-trash"></i> Eliminar </button>
                        </a>
                    </td>
                </tr>'
            ;
        }
    }

    //Funcion para traer un registro de la base de datos
    public function getJugador(){
        if (isset($_GET['idJugador'])) {
            $id = $_GET['idJugador'];
            $stmt = Datos::getJugador($id, 'jugador');
            return $stmt;
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

    //Function para eliminar un jugador
    public function deleteJugadorController(){
        if(isset($_GET["idBorrar"])){

            $stmt = Datos::deleteJugador($_GET['idBorrar'], 'jugador');
            
			if($stmt == "success")
				header('Location: index.php?action=jugadores');
			else
                echo 'error';
        }
    }
}
?>