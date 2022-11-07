<?php
//creating class
class CSVHelper {
    //creating reading function
    static public function reading($file){ 
        //check if file exisits
        if(file_exists($file)){ 
        $csvFile = file($file);
        $data = [];
        //loop through file
        foreach ($csvFile as $line) {
            $data[] = str_getcsv($line);
        }
        //returning data
        return $data;
        }else{
            echo "No such File exisits";
        }
        return false;
    }
    //writing function
    static public function writing($file,$newData,$append){ 
        //check if newData is not empty
        if(!empty($newData)){ 
            // check if append data or not
            if($append){
                $fp = fopen($file, 'a');
            }else{

                $fp = fopen($file, 'w');
            }
            //loop through new data
            foreach ($newData as $fields) {
                //writing to file
                fputcsv($fp, $fields);
            }
            fclose($fp); 
            return true; 
        }else{ 
            return false; 
        } 
    } 
    // modify function
    static public function modify($file,$upData, $id){ 
        //check if newData is not empty
        if(!empty($upData) && is_array($upData) ){ 
            //check if file exisits
            if(file_exists($file)){ 
            //reading data
            $data = self::reading($file); 
            //modify data at id index
            $data[$id] = $upData;
            //writing to file
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
    //creating delete function
    static public function delete($file,$id){ 
            //check if file exisits
            if(file_exists($file)){ 
            //reading data
            $data = self::reading($file); 
            //delete data at id index
            unset($data[$id]);  
            //writing to file
            $res = self::writing($file,$data,false);
            return $res;
            }else{ 
            echo "No such File exisits";
                return false; 
            }
    }   
}


?>