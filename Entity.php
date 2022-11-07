<?php
require("CSVHelper.php");
class Entity {
    static function create($name,$age){
        $data[] = [$name,$age];
        $res = CSVHelper::reading("entities.csv");
        if($res==false){
            CSVHelper::writing("entities.csv",$data,true);
        }else{
            array_push($res,$data[0]);
            CSVHelper::writing("entities.csv",$res,false);
        }
        return "Entity Created!";
    }
    static function find($id){
        $res = CSVHelper::reading("entities.csv");
        if($res==false){
            echo "No such File exisits";
        }else{
           return $res[$id];
        }
    }
    static function modify($id,$newName,$newAge){
        $data = [$newName,$newAge];
        $res = CSVHelper::reading("entities.csv");
        if($res==false){
            echo "No such File exisits";
        }else{
            CSVHelper::modify("entities.csv",$data,$id);
        }
    }
    static function delete($id){
        $res = CSVHelper::reading("entities.csv");
        if($res==false){
            echo "No such File exisits";
        }else{
            CSVHelper::delete("entities.csv",$id);
        }
    }
    static function readAll(){
        $res = CSVHelper::reading("entities.csv");
        if($res==false){
            echo "No such File exisits";
        }else{
            return $res;
        }
    }
}


?>