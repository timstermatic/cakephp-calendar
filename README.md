cakephp-calendar
================

A Calendar Helper for CakePHP 2x

## Usage

Include the helper in your controller:

    public $helpers = array('Calendar.Calendar');
    

Output a calendar in your view:

    echo $this->Calendar->display('2013-03-27', $options=array(), $events=array());
    
    
If you use [bootstrap](http://www.getbootstrap.com) you are ready to go. Otherwise look at the source. There's plenty of options for styling via css.
    
## Options

    dateSelect // shows a date & month selector
 

## Passing events to the calendar

Events should be passed as an array in the following format:

    $events = array(
            // the 15th
            15 => array(
                array('item 1','item 2)
        )
    );
