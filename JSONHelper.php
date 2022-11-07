<?php
class JSONHelper {
    static public function reading($jsonFile){ 
        if(file_exists($jsonFile)){ 
            $jsonData = file_get_contents($jsonFile); 
            $data = json_decode($jsonData, true);              
            return !empty($data)?$data:false; 
        }else{
            echo "No such File exisits";
        }
        return false; 
    }
    static public function writing($jsonFile,$newData,$append){ 
        if(!empty($newData)){  
            $data = [];
            if($append){
            if(is_file($jsonFile)){
            $jsonData = file_get_contents($jsonFile); 
            $data = json_decode($jsonData, true); 
            }
            $data = !empty($data)?array_filter($data):$data; 
            if(!empty($data)){ 
                $data[0] = array_merge($data[0], $newData); 
            }else{ 
                $data[] = $newData; 
            }
            }else{
                $data[] = $newData; 
            }
            $f=fopen($jsonFile,'w');
            fwrite($f,json_encode($data));
            fclose($f); 
             
            return true; 
        }else{ 
            return false; 
        } 
    } 

    static public function modify($jsonFile,$upData, $id){ 
        if(!empty($upData) && is_array($upData)){ 
        if(file_exists($jsonFile)){ 

            $jsonData = file_get_contents($jsonFile); 
            $data = json_decode($jsonData, true); 
            $data[0][$id] = $upData; 
            $update = self::writing($jsonFile, $data[0],false); 
            return $update?true:false; 
        }else{
            echo "No such File exisits";
        }
        }else{ 
            return false; 
        } 
    }
    static public function delete($jsonFile,$id){ 
        if(file_exists($jsonFile)){ 

        $jsonData = file_get_contents($jsonFile); 
        $data = json_decode($jsonData, true); 
        $data=$data[0];
        unset($data[$id]);  
        $res = self::writing($jsonFile,$data,false);
        return $res;
    }else{
        echo "No such File exisits";
    }
    }   
}


?>