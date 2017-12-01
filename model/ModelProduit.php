
<?php

require_once(File::build_path(["model", "Model.php"]));

class ModelProduit extends Model {

    protected static $object = "Produit";
    protected static $primary = 'id_p';
    private $id_p;
    private $nom_p;
    private $description_p;
    private $prix_p;
    private $pic_p;

    // getter ID Produit
    public function getID_p() {
        return $this->id_p;
    }

    // getter NOM Produit
    public function getNom_p() {
        return $this->nom_p;
    }

    // getter DESCRIPTION Produit
    public function getDescription_p() {
        return $this->description_p;
    }

    // getter PRIX Produit
    public function getPrix_p() {
        return $this->prix_p;
    }

	// getter PRIX Produit
	public static function getPrimary() {
		return self::$primary;
	}

	// getter PRIX Produit
	public static function getObject() {
		return self::$object;
	}

	/**
	 * @return String
	 */
	public function getPicP ()
	{
		return $this -> pic_p;
	}

/*	public function search() {
		$sql = "SELECT * FROM Produit WHERE nom_p LIKE \'$_GET([search])\' ";
		
	}
*/	
	

    // CONSTRUCTEUR Produit
    public function __construct($i = NULL, $n = NULL, $d = NULL, $p = NULL,$pi=NULL) {
        if (!is_null($i) && !is_null($n) && !is_null($d) && !is_null($p) && !is_null($pi)) {

            $this->id_p = $i;
            $this->nom_p = $n;
            $this->description_p = $d;
            $this->prix_p = $p;
            $this->pic_p=$pi;
        }
    }

}
?>
