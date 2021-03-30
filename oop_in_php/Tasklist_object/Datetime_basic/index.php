<?php

$passato = new DateTime('1969-12-31 23:59:00');
echo $passato->getTimestamp()."\n";

$unix = new DateTime('1970-01-01 00:00:00'); //unix timestamp in secondi
echo $unix->getTimestamp()."\n";

$un_minuto_dopo = new DateTime('1970-01-01 01:00:00');
echo $un_minuto_dopo->getTimestamp()."\n";

$today = new DateTime('now');
echo $today->getTimestamp()."\n";

//task | today
$passato->getTimestamp() < $today->getTimestamp();


//---------------------------------------

//formatazione data
echo $today->format('Y')."\n";
echo $today->format('d')."\n";
echo $today->format('d/m')."\n";
echo $today->format('d M Y')."\n";
echo $today->format('M d Y')."\n";
echo $today->format('M-d-Y')."\n";
echo $today->format('d F Y')."\n";
echo $today->format('d M Y')."\n";
echo $today->format('l d M Y')."\n";
echo $today->format('w')."\n";


$settimana = array('it_IT'=>[
                            'Domenica',
                            'Lunedì',
                            'Martedì',
                            'Mercoledì'
                            ],
                            'fr_FR'=>[
                            'xxxxxx',//0 w=0 dom
                            'xxxxxx',//0 w=1 lun
                            'xxxxxx',//0 w=2 mar
                            'Mercoledì in francese',
                            'xxxxxx',
                            ],

                        );
                        
echo "oggi è ".$settimana['it_IT'][$today->format('w')]."\n";                        
echo "oggi è ".$settimana['fr_FR'][$today->format('w')]."\n";



