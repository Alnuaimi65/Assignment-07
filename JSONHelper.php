<?php
class JSONHelper {
    //reading function
    static public function reading($jsonFile){ 
        //check if file exisits
        if(file_exists($jsonFile)){ 
            //read data
            $jsonData = file_get_contents($jsonFile); 
            $data = json_decode($jsonData, true);
            //return data              
            return !empty($data)?$data:false; 
        }else{
            echo "No such File exisits";
        }
        return false; 
    }
    //write function
    static public function writing($jsonFile,$newData,$append){ 
        if(!empty($newData)){  
            $data = [];
                //check if append flag is true
            if($append){
             //check if file exisits
            if(is_file($jsonFile)){
            //return data              
            $jsonData = file_get_contents($jsonFile); 
            $data = json_decode($jsonData, true); 
            }
            $data = !empty($data)?array_filter($data):$data; 
            if(!empty($data)){ 
                //merg data              
                $data[0] = array_merge($data[0], $newData); 
            }else{ 
                $data[] = $newData; 
            }
            }else{
                $data[] = $newData; 
            }
            //write data              
            $f=fopen($jsonFile,'w');
            fwrite($f,json_encode($data));
            fclose($f); 
             
            return true; 
        }else{ 
            return false; 
        } 
    } 
    //modify function
    static public function modify($jsonFile,$upData, $id){ 
            // check if the fields are empty
        if(!empty($upData) && is_array($upData)){ 
        //check if file exisits
        if(file_exists($jsonFile)){ 

            //read data
            $jsonData = file_get_contents($jsonFile); 
            $data = json_decode($jsonData, true); 
            //update data field
            $data[0][$id] = $upData; 
            //write data
            $update = self::writing($jsonFile, $data[0],false); 
            return $update?true:false; 
        }else{
            echo "No such File exisits";
        }
        }else{ 
            return false; 
        } 
    }
    //delete function
    static public function delete($jsonFile,$id){ 
        //check if file exisits
        if(file_exists($jsonFile)){ 
            //read data
        $jsonData = file_get_contents($jsonFile); 
        $data = json_decode($jsonData, true); 
        $data=$data[0];
            //delete data
        unset($data[$id]);  
            //write data
        $res = self::writing($jsonFile,$data,false);
        return $res;
    }else{
        echo "No such File exisits";
    }
    }   
}


?>