<?php
    require_once("conexionBD.php");
	
    class Usuario extends ConexionBD {
        private $id_func;
        private $username;
		private $nom_user;
		private $img_user;
        private $password;
        private $id_priv;
		
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

		public function getIMG_USER(){
			return $this->img_user;
		}
		
		public function getPASSWORD(){
			return $this->password;
        }
        
        public function getID_PRIV(){
			return $this->id_priv;
		}

		
		public function consultar($datos = array()) {
			
			$usuario = $datos['usuario'];
			$password = $datos['password'];
            $this->query = "
            SELECT func.id_func, func.nom_user, func.username, func.password, func.img_user, priv.id_priv
			FROM funcionarios as func
			INNER JOIN privilegios as priv ON (func.id_priv = priv.id_priv)
			WHERE func.id_func = '$id_func'
			";

            $this->obtener_resultados_query();
			
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}
		        
        public function generarPassword($pass=""){
            $opciones = [
                'cost' => 12,
            ];
            
            $passwordHashed = password_hash($pass, PASSWORD_BCRYPT, $opciones);
            
            return $passwordHashed;
        }

		/* public function nuevo($datos=array()) {
			if(array_key_exists('usua_codi', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
                endforeach;
              
				$this->query = "
					INSERT INTO tb_usuario
					(usua_codi, usua_user, usua_nomb, usua_pass,perso_cod,update_at)
					VALUES
					(NULL, '$comu_nomb', '$muni_codi',NOW())
					";
					$resultado = $this->ejecutar_query_simple();
					return $resultado;
			endif;
			
		}
		 */
		function __destruct() {
			//unset($this);
		}
	}
?>