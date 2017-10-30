<?php
	/**
	 * Created by PhpStorm.
	 * ModelUser: yves
	 * Date: 29/09/17
	 * Time: 10:24
	 */
	require_once ( File ::build_path ( [ "controller" , "ControllerProduit.php" ] ) );

	// On recupère l'action passée dans l'URL
	// À remplir, voir Exercice 5.2
	// Appel de la méthode statique $action de ControllerVoiture
	if ( isset( $_GET[ 'controller' ] ) ) {

		$controller = $_GET[ 'controller' ];

		$model_class = 'Model' . ucfirst ( $controller );

		$controller_class = 'Controller' . ucfirst ( $controller );

		if ( class_exists ( $controller_class ) ) {

			if ( isset( $_GET[ 'action' ] ) ) {
				$action = $_GET[ "action" ];

				switch ( $action ) {
					case "readAll":
						if(isset($_GET['p'])){
							$controller_class ::readAll ($_GET['p']);
						}else{
							$controller_class ::readAll (1);
						}
						break;
					case "read":
						$controller_class ::read ( $_GET[ $model_class ::getPrimary () ] );
						break;
					case "create":
						$controller_class ::create ();
						break;
					case "created":
						$data = [];
						foreach ( $_GET as $k => $v ) {
							if ( strcmp ( $k , "action" ) != 0 && strcmp ( $k , "controller" ) != 0 ) {
								$data += [ $k => $v ];
							}
						}
						$controller_class ::created ( $data );
						break;
					case "delete":
						$controller_class ::delete ( $_GET[ $model_class ::getPrimary () ] );
						break;
					case "update":
						if ( isset( $_GET[ $model_class ::getPrimary () ] ) ) {
							$controller_class ::update ( $_GET[ $model_class ::getPrimary () ] );

						}
						else {
							$controller_class ::update ( NULL );
						}
						break;
					case "updated":

						$data = [];
						foreach ( $_GET as $k => $v ) {
							if ( strcmp ( $k , "action" ) != 0 && strcmp ( $k , "controller" ) != 0 ) {
								$data += [ $k => $v ];
							}

						}
						$controller_class ::updated ( $data );
						break;
					case "generate":
						$controller_class::generate($_GET['s']);
						break;
					default:
						require_once ( File ::build_path ( [ 'view' , 'main' , 'error.php' ] ) );
						break;
				}
			}
			else {
				require_once ( File ::build_path ( [ 'view' , 'main' , 'error.php' ] ) );
			}
		}
		else {
			require_once ( File ::build_path ( [ 'view' , 'main' , 'error.php' ] ) );
		}
	}
	else {
		ControllerProduit ::readAll (1);
	}
?>