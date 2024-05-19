<?php

    class Usuario {


        public static function VerificarExistencia($nombre , $clave)
        {
            $usuarios_json = file_get_contents('usuarios.json');
            $usuarios = json_decode($usuarios_json, true);

            if(!empty($usuarios))
            {
                foreach($usuarios as $user){
                    if($user['nombre'] === $nombre && $user['clave'] === $clave ){
                        return true;
                        break;
                    }


                }

            }else{
                return false;
            }



        }




    }




?>