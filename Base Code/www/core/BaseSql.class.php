<?php
class BaseSQL{

    private $table;
    private $instance;


    public function __construct(){
        $this->instance = SPDO::getPDO();
        $this->table = get_called_class();
        if(!$this->instance instanceof \PDO)
            throw new \Exception('Aucune connection');
    }


    public function setId($id){
        $this->id = $id;
        //va récupérer en base de données les élements pour alimenter l'objet
        $this->getOneBy(["id"=>$id], true);

    }

    public function getAll(array $where, $object = false){


            $sqlWhere = [];
            foreach ($where as $key => $value) {
                $sqlWhere[] = $key . "=:" . $key;
            }

            $sql = " SELECT * FROM " . $this->table . (!empty($where) ? 'WHERE': '') . implode(" AND ", $sqlWhere) . ";";
            $query = $this->instance->prepare($sql);



            if ($object) {
                //modifier l'objet $this avec le contenu de la bdd
                $query->setFetchMode(Pdo::FETCH_CLASS, get_called_class());
            } else {
                //on retourne un simple table php
                $query->setFetchMode(Pdo::FETCH_ASSOC);
            }

            $query->execute($where);
            return $query->fetchAll();



    }


    // $where -> tableau pour créer notre requête sql
    // $object -> si vrai aliment l'objet $this sinon retourn un tableau
    public function getOneBy(array $where, $object = false){

            // $where = ["id"=>$id, "email"=>"y.skrzypczyk@gmail.com"];
            $sqlWhere = [];
            foreach ($where as $key => $value) {
                $sqlWhere[] = $key . "=:" . $key;
            }
            $sql = " SELECT * FROM " . $this->table . " WHERE  " . implode(" AND ", $sqlWhere) . ";";
            $query = $this->instance->prepare($sql);

            if ($object) {
                //modifier l'objet $this avec le contenu de la bdd
                $query->setFetchMode(Pdo::FETCH_INTO, $this);
            } else {
                //on retourne un simple table php
                $query->setFetchMode(Pdo::FETCH_ASSOC);
            }

            $query->execute($where);
            return $query->fetch();

    }



    public function save(){

        //Array ( [id] => [firstname] => Yves [lastname] => SKRZYPCZYK [email] => y.skrzypczyk@gmail.com [pwd] => $2y$10$tdmxlGf.zP.3dd7K/kRtw.jzYh2CnSbFuXaUkDNl3JtDJ05zCI7AG [role] => 1 [status] => 0 [pdo] => PDO Object ( ) [table] => Users )
        $dataObject = get_object_vars($this);
        //Array ( [id] => [firstname] => Yves [lastname] => SKRZYPCZYK [email] => y.skrzypczyk@gmail.com [pwd] => $2y$10$tdmxlGf.zP.3dd7K/kRtw.jzYh2CnSbFuXaUkDNl3JtDJ05zCI7AG [role] => 1 [status] => 0)
        $dataChild = array_diff_key($dataObject, get_class_vars(get_class()));

        if( is_null($dataChild["id"])){
            //INSERT
            //array_keys($dataChild) -> [id, firstname, lastname, email]
            $sql ="INSERT INTO ".$this->table." ( ".
                implode(",", array_keys($dataChild) ) .") VALUES ( :".
                implode(",:", array_keys($dataChild) ) .")";


            $query = $this->instance->prepare($sql);
            $query->execute( $dataChild );

        }else{
            //UPDATE
            $sqlUpdate = [];
            foreach ($dataChild as $key => $value) {
                if( $key != "id")
                    $sqlUpdate[]=$key."=:".$key;
            }

            $sql ="UPDATE ".$this->table." SET ".implode(",", $sqlUpdate)." WHERE id=:id";

            $query = $this->instance->prepare($sql);
            $query->execute( $dataChild );

        }

    }


    public function saveFile($files)
    {

        $extension_upload = strtolower(substr(strrchr($files['name']['name'],'.'),1));
        $dataObject = get_object_vars($this);
        $dataChild = array_diff_key($dataObject, get_class_vars(get_class()));
        $dataChild["name"] = $dataChild["name"].".".$extension_upload;


        $sql = "INSERT INTO ".$this->table."( " .
            implode(",", array_keys($dataChild)) . ") VALUES ( :" .
            implode(",:", array_keys($dataChild)) . ")";

        $query = $this->instance->prepare($sql);
        $query->execute($dataChild);
        move_uploaded_file($files["name"]['tmp_name'], $files["pathFile"].$this->name.".".$extension_upload);
    }
}


