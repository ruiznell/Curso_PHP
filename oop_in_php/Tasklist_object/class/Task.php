<?php

class Task {
	public $id;
	public $taskName;
	public $status;
	public $expirationDate;

	public function isExpired():bool   //este es un metodo de la clase 	//Task

	{
              	//$today è una istanza della classe DateTime
		$today = new DateTime();
		$task = new DateTime($this->expirationDate);
		//con esta operacion se puede manipular la data
		if($today->format('Ymd') === $task->format('Ymd')){
			return false;
		}
		
		return $today ->getTimestamp() > $task ->getTimestamp();

		
		//return $task < $today;
	}
	
	public function getExpirationDate()
	{
		return $this->expirationDate;
	}
	//gettype($today) object
	//get_class($today) DateTime

	//este es solo un ejemplo de get
	//public function getExpirationDate()
	//{
	//	return $this -> expirationDate;
	//}

    }

