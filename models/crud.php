<?php

require_once "conexion.php";

class Datos extends Conexion{

    //Funcion para registrar un usuario y pder hacer el login
    public function registrarUsuario($usuario, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (username, password) VALUES (:username, :password)");

        $stmt->bindParam(':username', $usuario['username'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $usuario['password'], PDO::PARAM_STR);

        if($stmt->execute()) 
            return 'success';
        else  
            return 'error';    
        $stmt->close();
    }  

    //Funcion para el login
    public function loginModel($usuario, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT username, password FROM $tabla WHERE username = :username");
        $stmt->bindParam(':username', $usuario['username'], PDO::PARAM_STR);		
        $stmt->execute();
        return $stmt->fetch();

        $stmt->close();
    }

    //Funcion del modelo para agregar equipos
    public function addEquiposModel($equipo, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_equipo) VALUES (:nombre_equipo)");
        $stmt->bindParam(':nombre_equipo', $equipo, PDO::PARAM_STR);

        if($stmt->execute()) 
            return 'success';
        else  
            return 'error';    
        $stmt->close();
    }

    //Funcion para agregar un jugador
    public function addJugadorModel($jugador, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_jugador, numero_jugador) 
                VALUES (:nombre_jugador, :numero_jugador)"
        );
        $stmt->bindParam(':nombre_jugador', $jugador['nombre_jugador'], PDO::PARAM_STR);
        $stmt->bindParam(':numero_jugador', $jugador['numero_jugador'], PDO::PARAM_STR);
        if($stmt->execute())
            return 'success';
        else
            return 'error';
        $stmt->close();
    }

    //Funcion para hacer insertar en la tabla de Equipos_Jugadores
    public function addJugador_Equipo($idJugador, $idEquipo, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO jugador_equipo (idJugador, idEquipo) VALUE (:idJugador, :idEquipo)");
        $stmt->bindParam(':idJugador', $idJugador, PDO::PARAM_INT);
        $stmt->bindParam(':idEquipo', $idEquipo, PDO::PARAM_INT);

    }

    //Funcion para hacer el update de un equipo
    public function updateEquipo($equipo, $tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_equipo = :nombre_equipo WHERE idEquipo=:idEquipo");

        $stmt->bindParam(':nombre_equipo', $equipo['nombre_equipo'], PDO::PARAM_STR);
        $stmt->bindParam(':idEquipo', $equipo['idEquipo'],PDO::PARAM_INT);

        if ($stmt->execute())
            return 'success';
        else 
            return 'error';
        $stmt->close();
    }


    //Funcion para traer los equipos de la base de datos
    public function getEquipos($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();

		$stmt->close();
    }

    //Funcion para traer solo un registro de la base de datos
    public static function getEquipo($idEquipo, $tabla){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idEquipo = :idEquipo");
 		$stmt->bindParam(':idEquipo', $idEquipo, PDO::PARAM_INT);
 		$stmt->execute();
 		return $stmt->fetch();
 		$stmt->close();
 	}

    //Funcion para traer los equipos de la base de datos
    public function getJugadores($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();

		$stmt->close();
    }

    //Funcion para borrar los equipos
    public function deleteEquipo($idEquipo, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idEquipo = :idEquipo");	
        $stmt->bindParam(":idEquipo", $idEquipo, PDO::PARAM_INT);
        
		if($stmt->execute())
			return "success";
		else
			return "error";
		$stmt->close();
	}
}


?>