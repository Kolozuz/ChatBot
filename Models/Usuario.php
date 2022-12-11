<?php
    include '../Config/Conexion.php';
    // include '../../Config/Conexion.php';

    // $nombre = $_POST['username_login'];

    // $conexion = new Conexion();
    //         $sql = "SELECT * FROM usuario WHERE nombre_u = '$nombre'";

    //         $usuario = $conexion->stm->prepare($sql); 
    //         $usuario->execute();
    //         $usuarioobjeto = $usuario->fetchAll(PDO::FETCH_OBJ);
    //         return $usuarioobjeto;

    class Usuario{
        protected $id_u;
        protected $imgurl_u;
        protected $email_u;
        protected $nombre_u;
        protected $contrasena_u;
        //Este model es el unico que se conecta a la db y guarda datos en ella
        
        public function SaveUsuario(){
            $conexion = new Conexion();
            $sql = "call createUsuario(?,?,?,?)";
            
            $insert = $conexion->stm->prepare($sql);
            $insert->bindParam(1,$this->imgurl_u);
            $insert->bindParam(2,$this->email_u);
            $insert->bindParam(3,$this->nombre_u);
            $insert->bindParam(4,$this->contrasena_u);
            $insert->execute();
            return;
        }
        
        protected function CheckUsuarioFromDB(){
        $conexion = new Conexion();
            $sql = "call readUsuariobyname('$this->nombre_u')";

            $usuario = $conexion->stm->prepare($sql); 
            $usuario->execute();
            
            $usuarioobjeto = $usuario->fetchAll(PDO::FETCH_OBJ);
            if ($usuarioobjeto){

                return $usuarioobjeto;
            }
            // else{
            //     var_dump($usuarioobjeto);

            //     // session_destroy();
            //     die ('No te encuentras registrado en Jujomi');
            //     return $usuarioobjeto;

            // }
        }
        protected function CheckUsuarioFromDBbyid(){
            $conexion = new Conexion();
                $sql = "call readUsuariobyid('$this->id_u')";
    
                $usuario = $conexion->stm->prepare($sql); 
                $usuario->execute();
                
                $usuarioobjeto = $usuario->fetchAll(PDO::FETCH_OBJ);
                // if ($usuarioobjeto){
    
                    return $usuarioobjeto;
                // }
            //     else{
            //         var_dump($usuarioobjeto);
    
            //         session_destroy();
            //         die ('No te encuentras registrado en Jujomi');
            //         return $usuarioobjeto;
    
            //     }
            }

        protected function UpdateUsuario($id_u,$imgurl_u,$nombre_u,$email_u){
            $conexion = new Conexion();
            
            $sql = "call updateUsuario('$id_u', '$imgurl_u','$nombre_u', '$email_u')";

            $update = $conexion->stm->prepare($sql);
            $update->execute();

            $personas = $update->fetchAll(PDO::FETCH_OBJ);

            $_SESSION['email_register'] = $email_u;
            $_SESSION['username_login'] = $nombre_u;
            
            return $personas;
        }

        protected function DeleteUsuario(){
            $conexion = new Conexion();
            // $usuarioinfo = $this->CheckUsuarioFromDB();
            // foreach ($usuarioinfo as $usuario_u){}
            
            $id_u = $_GET['id'];
            // $id_c = $_SESSI
            $_SESSION['id_c'] = "";
            $sql = "call deleteUsuario('$id_u','$_SESSION[id_c]')";

            $delete = $conexion->stm->prepare($sql);
            $delete->execute();

            
            return $delete;

            // $personas = $delete->fetchAll(PDO::FETCH_OBJ);
            // return $personas;
        }
    }
?>
