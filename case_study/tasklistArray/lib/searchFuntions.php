<?php
/**
 * Funzione di ordine superiore: è una funzione che restituisce una funzione
 * Introduzione Programmazione Funzionale - dichiarativo
 */
function searchText($searchText){

    // $searchText : locale 
    // searchText es una variable local dentro de la funcion externa
    // per fare il modo che $searchText sia visibile (ambito) all'interno della funzione anonima
    // devo usare "use"

    return function ($taskItem) use ($searchText) {
        // [0] => "prendere il latte" --> 12 != --> true
        // [1] => "fare benzina" --> false  --> false !== false
        // [2] => "latte per il viso" --> 0  !== falso ---> true
        //print_r($taskItem['taskName']);
        //echo "sto cercando $searchText";
        
        $result = strpos($taskItem['taskName'], $searchText) !==false;
        return $result;

        //var_dump ($result);
        //print_r($searchText);
        //print_r($taskItem);

    };
     // se coloca el punto y coma (;) despues de la llave porque la funcion se comporta como una variable, ejemplo  
     // return 10 ;
}


/**
 * @var string $status è la stringa che corrisponde allo status da cercare
 * (progress|done|todo)
 * @return callback La funzione che verrà utilizzata da array_filter 
 */
function searchStatus(string $status){
    return function ($taskItem) use ($status) {
        
        $result = strpos($taskItem['status'], $status) !==false;
        return $result;

    };
}



