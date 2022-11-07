<?php

require_once('JSONHelper.php');

// WRITE
JSONHelper::writing('beatles.json',[['firstname'=>'John','lastname'=>'Lennon'],['firstname'=>'Paul','lastname'=>'McCartney']],true); // write a recordset to a JSON file

// READ
echo '<pre>';print_r(JSONHelper::reading('beatles.json')); // read all recordset from a JSON file

// MODIFY
JSONHelper::modify('beatles.json',['firstname'=>'John','lastname'=>'Lennon','birthdate'=>'1940-10-09'],0); // modify the  record in a JSON file at index 0

// READ
echo '<pre>';print_r(JSONHelper::reading('beatles.json')); // read all recordset from a JSON file

// DELETE
JSONHelper::delete('beatles.json',1); // delete record at index 0 from JSON file

echo '<pre>';print_r(JSONHelper::reading('beatles.json')); // read a recordset from a JSON file

