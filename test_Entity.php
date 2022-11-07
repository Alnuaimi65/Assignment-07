<?php

require_once('Entity.php');

// SIGNUP
 // create new entity
echo '<pre>';print_r(Entity::create("Jhon Paul","16"));
 // create new entity
 echo '<pre>';print_r(Entity::create("Chris Smith","26"));
 // Find entity at index 1
 echo '<pre>';print_r(Entity::find(1));
// Modify entity at index 1
echo '<pre>';print_r(Entity::modify(1,"Chris Sparrow","21"));
// Delete entity at index 0
echo '<pre>';print_r(Entity::delete(0));
// Read all entities 
echo '<pre>';print_r(Entity::readAll());
