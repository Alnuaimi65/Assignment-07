<?php
class CSVHelper {
    static public function reading($file){ 
        if(file_exists($file)){ 
        $csvFile = file($file);
        $data = [];
        foreach ($csvFile as $line) {
            $data[] = str_getcsv($line);
        }
        return $data;
        }else{
            echo "No such File exisits";
        }
        return false;
    }
    static public function writing($file,$newData,$append){ 
        if(!empty($newData)){ 
            if($append){
                $fp = fopen($file, 'a');
            }else{

                $fp = fopen($file, 'w');
            }
            foreach ($newData as $fields) {
                fputcsv($fp, $fields);
            }
            fclose($fp); 
            return true; 
        }else{ 
            return false; 
        } 
    } 

    static public function modify($file,$upData, $id){ 
        if(!empty($upData) && is_array($upData) ){ 
            if(file_exists($file)){ 
            $data = self::reading($file); 
            $data[$id] = $upData;
            $res = self::writing($file,$data,false);
            return $res;
            }else{ 
            echo "No such File exisits";
                return false; 
            }
        }else{ 
            return false; 
        } 
    }
    static public function delete($file,$id){ 
            if(file_exists($file)){ 
            $data = self::reading($file); 
            unset($data[$id]);  
            $res = self::writing($file,$data,false);
            return $res;
            }else{ 
            echo "No such File exisits";
                return false; 
            }
    }   
}


?>