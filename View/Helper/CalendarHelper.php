<?php

class CalendarHelper extends AppHelper {

/**
 * uses HTML helper
 */
	
	public $helpers = array('Html');

/**
 * displays a tabular calendar
 *
 * @param $date date in yyyy-mm-dd format to show month for
 *
 * @param $option array of options:
 *
 * @TODO add option for month to month navigation
 * @TODO add option for year selection
 * @TODO add ability to pass on array of events
 *
 */
 	public function display($date = null, $options=array()) {

		// set date parts
		$date = empty($date)?date('Y-m-d'):$date;
		$month = date('m', strtotime($date));
		$year = date('Y', strtotime($date));
	
		// @TODO make this a property that can be configured (i18n)
		$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

		$calendar = '<table class="table">';
		$calendar .= $this->Html->tableHeaders($headings);

		/* days and weeks vars now ... */
		$running_day = date('w',mktime(0,0,0,$month,1,$year));
		$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();

		/* row for week one */
		$calendar.= '<tr class="calendar-row">';

		/* empty days */
		for($x = 0; $x < $running_day; $x++) 
		{
			$calendar.= '<td class="calendar-day empty-day"> </td>';
			$days_in_this_week++;
		}

		/* days of this month*/
		for($list_day = 1; $list_day <= $days_in_month; $list_day++) {
			$calendar.= '<td class="calendar-day"><div class="calendar-day-number">'.$list_day.'</td></div>';

			if($running_day == 6) 
			{
				
				$calendar.= '</tr>';
				
				if(($day_counter+1) != $days_in_month) 
				{
				
					$calendar.= '<tr class="calendar-row">';
				}

				$running_day = -1;
				$days_in_this_week = 0;
			}

			$days_in_this_week++; $running_day++; $day_counter++;

		}

		/* finish the rest of the days in the week */
		if($days_in_this_week < 8)
		{
			for($x = 1; $x <= (8 - $days_in_this_week); $x++) 
			{
				$calendar.= '<td class="calendar-day empty-day"> </td>';
			}
		}
		$calendar.= '</tr></table>';

		echo $calendar;
	}

}
