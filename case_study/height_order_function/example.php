<?php

//$a = 6;
//$b = "ciao";

/**
 * 1 - la callback passa un valore
 * 2 - la callback deve restituire un booleano
 * 
 */
//$cercaDue = function($valoreCorrente):bool
function cercaDue($valoreCorrente):bool
{
    return $valoreCorrente === 2; //true
};

$cerca = function ($valoreDaCercare){


    return function($valoreCorrente) use ($valoreDaCercare)
        {
            return $valoreCorrente === $valoreDaCercare; //true
        };
    
};
$risultatoRicerca = array_filter([1,2,3,4], $cercaDue); // [2]




function perDue($valoreCorrente):bool
{
    return $valoreCorrente * 2;
}

function cerca($valoreDaCercare){

    return function($itemDellArray) use ($valoreDaCercare)
        {
            return $itemDellArray === $valoreDaCercare  // === 2 // === 4
        }
}

//$risultato = array_filter([1,2,3,4], $cerca);
$risultato = array_filter([1,2,3,4], cerca(2)); // [2]
$risultato = array_filter([1,2,3,4], cerca(4)); // [4]
$risultato = array_filter([1,2,3,4], "ciccio", cerca("ciccio")); // ["ciccio"]
$risultato = array_filter([1,2,3,4], cerca(300)); //[]

array_map('perDue',[1,2,3,4]); //[2,4,6,8]
array_map('trim',['a   ','    b','   c  ']); //["a","b","c"]


