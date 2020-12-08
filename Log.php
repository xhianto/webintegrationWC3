<?php 
class log {
    const WAARDEN = array("S" => "Succes", "E" => "Error");

    var $date;
    var $time;
    var $username;
    var $ip;
    var $types;

    function __construct($username, $ip, $type){
        $this->username = $username;
        $this->ip = $ip;
        $this->types = self::WAARDEN[$type];
        $this->date = date("d/m/Y");
        $this->time = date("H:i:s");
    }

    function print(){
        if ($this->types == "Succes"){
            return $this->date ."-". $this->time ." - ". $this->types ." - Gebruiker '". $this->username ." 'is succesvol ingelogged"; 
        }
        else {
            return $this->date ."-". $this->time ." - ". $this->types ." - Niet succesvol ingelogged";
        }
    }

    static function showlog(){
        if (file_exists(".\loginaudit.txt")){
            $file = file(".\loginaudit.txt");
            if (!empty($file)){
                foreach ($file as $sentence){
                    echo nl2br($sentence);
                }
            }
            else{
                echo "loginaudit.txt is leeg";
            }
        }
        else{
            echo "loginaudit.txt niet gevonden";
        }
    }
}
?>