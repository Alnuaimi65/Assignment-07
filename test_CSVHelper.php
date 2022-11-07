<?php

require_once('CSVHelper.php');

// WRITE
CSVHelper::writing('beatles.csv',[['John','Lennon'],['Paul','McCartney']],true); // write a recordset to a CSV file

// READ
echo '<pre>';print_r(CSVHelper::reading('beatles.csv')); // read all recordset from a CSV file

// MODIFY
CSVHelper::modify('beatles.csv',['John','Lennon','1940-10-09'],0); // modify the  record in a CSV file at index 0

// READ
echo '<pre>';print_r(CSVHelper::reading('beatles.csv')); // read all recordset from a CSV file

// DELETE
CSVHelper::delete('beatles.csv',1); // delete record at index 0 from CSV file

echo '<pre>';print_r(CSVHelper::reading('beatles.csv')); // read a recordset from a CSV file

