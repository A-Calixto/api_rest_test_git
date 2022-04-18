<?php
  
  include_once('conexion.php');

// echo $_SERVER['REQUEST_METHOD'];

switch( $_SERVER['REQUEST_METHOD'] ){
  case 'POST':
    // echo "setea valores";
    break;

  case 'GET':
    // echo "Obtien valores";
  $arrayData = array();
    // if ( isset($_GET['idpersona']) ) {
    //   $idpersona = $_GET['idpersona'];
    //   $sql = "SELECT nombre,apaterno,apmaterno from personas where idpersona=$idpersona;";
    // } else{
    //   $sql = "SELECT nombre,apaterno,apmaterno from personas;";
    // }

    if ( isset($_GET['idpersona']) ) {
      $idpersona = $_GET['idpersona'];
      $apmaterno = $_GET['apmaterno'];
      $sentencia = $pdo->prepare("SELECT nombre,apaterno,apmaterno from personas where idpersona=? or apmaterno=?;");
      // $sentencia = $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      // $sentencia->bindParam(":idpersona", $idpersona, PDO::PARAM_INT);
      $sentencia->execute(array($idpersona,$apmaterno));
      while ( $response = $sentencia->fetch(PDO::FETCH_ASSOC) ) {
        $data=array_map('utf8_encode',$response);
        $datos['nombre'] = $data['nombre'];
        $datos['apaterno'] = $data['apaterno'];
        $datos['apmaterno'] = $data['apmaterno'];
        array_push($arrayData, $datos);
      }
      echo json_encode($arrayData);
    }

      

    // $query = mysqli_query($conn,$sql) or die( mysqli_error() );
    // if ($query) {
    //   while ( $response = mysqli_fetch_array($query) ) {
    //     $data=array_map('utf8_encode',$response);
    //     $datos['nombre'] = $data['nombre'];
    //     $datos['apaterno'] = $data['apaterno'];
    //     $datos['apmaterno'] = $data['apmaterno'];
    //     array_push($arrayData, $datos);
    //   }
    // } 
    // echo json_encode($arrayData);
    break;
}







// include "config.php";
// include "utils.php";


// $dbConn =  connect($db);

// /*
//   listar todos los posts o solo uno
//  */
// if ($_SERVER['REQUEST_METHOD'] == 'GET')
// {
//     if (isset($_GET['id']))
//     {
//       //Mostrar un post
//       $sql = $dbConn->prepare("SELECT * FROM posts where id=:id");
//       $sql->bindValue(':id', $_GET['id']);
//       $sql->execute();
//       header("HTTP/1.1 200 OK");
//       echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
//       exit();
// 	  }
//     else {
//       //Mostrar lista de post
//       $sql = $dbConn->prepare("SELECT * FROM posts");
//       $sql->execute();
//       $sql->setFetchMode(PDO::FETCH_ASSOC);
//       header("HTTP/1.1 200 OK");
//       echo json_encode( $sql->fetchAll()  );
//       exit();
// 	}
// }

// // Crear un nuevo post
// if ($_SERVER['REQUEST_METHOD'] == 'POST')
// {
//     $input = $_POST;
//     $sql = "INSERT INTO posts
//           (title, status, content, user_id)
//           VALUES
//           (:title, :status, :content, :user_id)";
//     $statement = $dbConn->prepare($sql);
//     bindAllValues($statement, $input);
//     $statement->execute();
//     $postId = $dbConn->lastInsertId();
//     if($postId)
//     {
//       $input['id'] = $postId;
//       header("HTTP/1.1 200 OK");
//       echo json_encode($input);
//       exit();
// 	 }
// }

// //Borrar
// if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
// {
// 	$id = $_GET['id'];
//   $statement = $dbConn->prepare("DELETE FROM posts where id=:id");
//   $statement->bindValue(':id', $id);
//   $statement->execute();
// 	header("HTTP/1.1 200 OK");
// 	exit();
// }

// //Actualizar
// if ($_SERVER['REQUEST_METHOD'] == 'PUT')
// {
//     $input = $_GET;
//     $postId = $input['id'];
//     $fields = getParams($input);

//     $sql = "
//           UPDATE posts
//           SET $fields
//           WHERE id='$postId'
//            ";

//     $statement = $dbConn->prepare($sql);
//     bindAllValues($statement, $input);

//     $statement->execute();
//     header("HTTP/1.1 200 OK");
//     exit();
// }


// //En caso de que ninguna de las opciones anteriores se haya ejecutado
// header("HTTP/1.1 400 Bad Request");

?>