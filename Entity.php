<?php
require("CSVHelper.php");
//creating class entity
class Entity {
    //create function
    static function create($name,$age){
        //put data to array
        $data[] = [$name,$age];
        //reading current data
        $res = CSVHelper::reading("entities.csv");
        if($res==false){
            //write data to csv file 
            CSVHelper::writing("entities.csv",$data,true);
        }else{
            //append new data to old one
            array_push($res,$data[0]);
            //write data to csv file 
            CSVHelper::writing("entities.csv",$res,false);
        }
        return "Entity Created!";
    }
    //find function
    static function find($id){
        //readind file
        $res = CSVHelper::reading("entities.csv");
        //check if data returned or not
        if($res==false){
            echo "No such File exisits";
        }else{
            //returning data at id index
           return $res[$id];
        }
    }
    //modify function
    static function modify($id,$newName,$newAge){
        $data = [$newName,$newAge];
        //readind file
        $res = CSVHelper::reading("entities.csv");
        //check if data returned or not
        if($res==false){
            echo "No such File exisits";
        }else{
            //write data to csv file 
            CSVHelper::modify("entities.csv",$data,$id);
        }
    }
    //delete function
    static function delete($id){
        //readind file
        $res = CSVHelper::reading("entities.csv");
        //check if data returned or not
        if($res==false){
            echo "No such File exisits";
        }else{
            //delete entity from file 
            CSVHelper::delete("entities.csv",$id);
        }
    }
    //read all function
    static function readAll(){
        //readind file
        $res = CSVHelper::reading("entities.csv");
        //check if data returned or not
        if($res==false){
            echo "No such File exisits";
        }else{
            //returning data
            return $res;
        }
    }
}


?>