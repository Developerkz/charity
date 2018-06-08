<?php
class Date{

	/*
		Get Time
		@return String
		Format 00:00 , 00 00 0000
	*/
	public static function getTime($time){
		if($time){
			$pattern = '/([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/';

			$year = preg_replace($pattern, '$1', $time);
			$month = preg_replace($pattern, '$2', $time);
			$day = preg_replace($pattern, '$3', $time);
			$hour = preg_replace($pattern, '$4', $time);
			$minute = preg_replace($pattern, '$5', $time);

			$months = array(
				'01' => 'Январь','02' => 'Февраль','03' => 'Март',
				'04' => 'Апрель','05' => 'Май','06' => 'Июнь',
				'07' => 'Июль','08' => 'Август','09' => 'Сентябрь',
				'10' => 'Октябрь','11' => 'Ноябрь','12' => 'Декабрь','00' => 'месяц'
			);

			return $hour.":".$minute." , ".$day." ".$months[$month]." ".$year;

		}
		else{
			return false;
		}
	}
	/* -----------end-function---------- */
	
}
?>