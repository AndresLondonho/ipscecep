<?php
    require_once("conexionBD.php");
	
    class Usuario extends ConexionBD {
        private $id_func;
        private $username;
		private $nom_user;
        private $password;
		private $id_priv;
		private $cc_user;
		private $email_user;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getID_FUNC(){
			return $this->id_func;
		}

        
        public function getUSERNAME(){
			return $this->username;
		}

		public function getNOM_USER(){
			return $this->nom_user;
		}

		
		public function getPASSWORD(){
			return $this->password;
        }
        
        public function getID_PRIV(){
			return $this->id_priv;
		}

		public function getCC_USER(){
			return $this->cc_user;
		}

		public function getEMAIL_USER(){
			return $this->email_user;
		}

		
		public function consultar($datos = array()) {
			
			$usuario = $datos['usuario'];
			$password = $datos['password'];
            $this->query = "
            SELECT func.id_func, func.nom_user, func.username, func.password, func.id_priv, func.cc_user, func.email_user
			FROM funcionarios as func
			WHERE func.username = '$usuario'
			";

            $this->obtener_resultados_query();
			
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}

		public function listar(){
			
		}
		
		public function nuevo(){
			
		}
		
		public function editar(){
			
		}
		
		public function borrar(){
			
		}
		
        
        public function generarPassword($pass=""){
            $opciones = [
                'cost' => 12,
            ];
            
            $passwordHashed = password_hash($pass, PASSWORD_BCRYPT, $opciones);
            
            return $passwordHashed;
        }
		
		function __destruct() {
			//unset($this);
		}
	}
?>