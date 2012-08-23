<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript">
        $(function(){
                // $('fieldset').find('.content2').css({'display': 'none'});
                $('legend').click(function(){
                        $(this).parent().find('.content').slideToggle("slow"); 
                        // $(this).parent().find('.content2').slideToggle("slow");
                });
        });
</script>
<style type="text/css">
  @font-face {
    font-family: "RSU";
    src: url(http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/fonts/RSU_Regular.ttf) format("truetype");
  }
  body{
    font-family: "RSU", sans-serif;
    margin:0px;
    padding:0px;
  }
  .header{
    background-image:url(http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/img/emailHeader.png);
    background-repeat:no-repeat;
    width:480;
    height:86px;
    margin:auto;
  }
  .line1{
    background-image:url(http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/img/line1.png);
    background-repeat:repeat-x;
    width:480;
    height:1px;
    margin:auto;
  }
  .line2{
    background-image:url(http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/img/line2.png);
    background-repeat:repeat-x;
    width:480;
    height:1px;
    margin:auto;
  }
  .footer{
    background-image:url(http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/img/emailFooter.png);
    background-repeat:no-repeat;
    width:480;
    height:53px;
    margin:auto;
  }
  #content{
    width:480px;
    margin:auto;
    font-size:1.25em;
  }
  .report{
    padding-left:88px;
  }
  .month-year{
    text-align:center;
  }
  .toolbar{
    width:480px;
    clear:both;
  }
  .toolbar {
    display:block;
    background-color:#CCCCCC;
    border:1px solid;
    border-color:#f3f3f3 #bbb #bbb #f3f3f3;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    margin:0;
    text-align:center;
    padding:2px;
    zoom: 1;
    float:left;
    width:50px;
  }
  .today{
    display:block;
    background-color:#2A3576;
    border:1px solid;
    border-color:#f3f3f3 #bbb #bbb #f3f3f3;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    margin:0;
    text-align:center;
    padding:2px;
    zoom: 1;
    float:left;
    color:#fff;
    width:50px;
  }
  .yesterday{
    display:block;
    background-color:#999997;
    border:1px solid;
    border-color:#f3f3f3 #bbb #bbb #f3f3f3;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    margin:0;
    text-align:center;
    padding:2px;
    zoom: 1;
    float:left;
    color:#fff;
    width:50px;
  }
  .date li {
    display:block;
    margin:0;
    text-align:center;
    float:left;
    padding:3px;
    width:55px;
  }
  .month-year li {
    display:block;
    margin:0;
    text-align:center;
    float:left;
    padding:3px;
    width:55px;
    font-size:10px;
  }
  .br{
    height:20px;
  }
  .br2{
     height:50px;
  }
  .br3{
    height:10px;
  }
   ul{
     width:480px;
     margin-left:-14px;
   }
   h3{
     height:10px;
   }
   h2{
     height:20px;
   }
   /* calendar */
   table.calendar		{ border-left:1px solid #999; }
   tr.calendar-row	{  }
   td.calendar-day	{ min-height:80px; font-size:11px; position:relative; } * html div.calendar-day { height:80px; }
   td.calendar-today	{ min-height:80px; font-size:11px; position:relative; background:#1693A5;} * html div.calendar-today { height:80px; background:#1693A5;}
   td.calendar-day:hover	{ background:#eceff5; }
   td.calendar-today:hover	{ background:#FCE1B2; }
   td.calendar-day-np	{ background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
   td.calendar-day-head { background:#2A3576; font-weight:bold; color:#fff; text-align:center; width:120px; padding:5px; border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999; }
   div.day-number		{ background:#999; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; }
   /* shared */
   td.calendar-day, td.calendar-day-np, td.calendar-today { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; }
   p:first-of-type {
   background: #FAF4B1;
   font-style: italic;
   padding: 5px 10px;
   margin-bottom: 20px;
   }
</style>
</head>
<body>
<table width='480' align='center'>
<tr><td>
<div id='content'>
  <div class='header'>
    <img src='http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/img/emailHeader.png'>
  </div>
<div><h2>ผลการตรวจสอบเว็บไซต์ที่ทำการเผยแพร่<br/>และได้ตรวจสอบคุณภาพเว็บไซต์แล้ว</h2></div>  
<div class='br'>&nbsp;</div>
<div class='br'>&nbsp;</div>
<div id='calendar'>
  <?php
    
    function checktoday($year,$month,$list_day){
      $todayY = date('Y');
      $todayM = date('m');
      $todayD = date('d');
      
      if(($todayY == $year) and ($todayM == $month) and ($todayD == $list_day)):
        $class = 'calendar-today';
      else:
        $class = 'calendar-day';
      endif;
      
      return $class;
    }
    
    /* draws a calendar */
    function draw_calendar($month,$year){

    	/* draw table */
    	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

    	/* table headings */
    	$headings = array('อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.');
    	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

    	/* days and weeks vars now ... */
    	$running_day = date('w',mktime(0,0,0,$month,1,$year));
    	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
    	$days_in_this_week = 1;
    	$day_counter = 0;
    	$dates_array = array();

    	/* row for week one */
    	$calendar.= '<tr class="calendar-row">';

    	/* print "blank" days until the first of the current week */
    	for($x = 0; $x < $running_day; $x++):
    		$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
    		$days_in_this_week++;
    	endfor;

    	/* keep going with days.... */
    	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
    		$calendar.= '<td class="'.checktoday($year,$month,$list_day).'">';
    			/* add in the day number */
    			$calendar.= '<div class="day-number">'.$list_day.'</div>';

    			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
          // $calendar.= str_repeat('<p>&nbsp;</p>',2);
          $calendar.= '<p>&nbsp;</p>';
    			$calendar.= '<p>'.countPass($year,$month,$list_day).'</p>'; //'.$year.'-'.$month.'-'.$list_day.' = '.str_replace('0','',date('m-d')).'

    		$calendar.= '</td>';
    		if($running_day == 6):
    			$calendar.= '</tr>';
    			if(($day_counter+1) != $days_in_month):
    				$calendar.= '<tr class="calendar-row">';
    			endif;
    			$running_day = -1;
    			$days_in_this_week = 0;
    		endif;
    		$days_in_this_week++; $running_day++; $day_counter++;
    	endfor;

    	/* finish the rest of the days in the week */
    	if($days_in_this_week < 8):
    		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
    			$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
    		endfor;
    	endif;

    	/* final row */
    	$calendar.= '</tr>';

    	/* end the table */
    	$calendar.= '</table>';

    	/* all done, return result */
    	return $calendar;
    }
    
    function countPass($year,$month,$day){
      $startTime = mktime(0, 0, 0, $month, $day, $year); 
      $endTime = mktime(23, 59, 59, $month, $day, $year);
      $count = 0; 
      $count = db_result(db_query("SELECT count(*) AS count FROM webiz_crm.content_type_customer where field_quality_checked_timpstamp BETWEEN '".$startTime."' and '".$endTime."'"));
      return $count;
    }
    
    function thai_date($strDate){
      $strYear = date("Y",strtotime($strDate))+543;
      $strMonth= date("n",strtotime($strDate));
      $strMonthCut = array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
      $strMonthThai=$strMonthCut[$strMonth];
      return "$strMonthThai $strYear";
    }
    
    /* sample usages */
    echo '<h3>'.thai_date(date($last_month[1].'-'.str_replace('0','',$last_month[0]))).'</h3>';
    echo draw_calendar(str_replace('0','',$last_month[0]),$last_month[1]);

    echo '<h3>'.thai_date(date($this_month[1].'-'.str_replace('0','',$this_month[0]))).'</h3>';
    echo draw_calendar(str_replace('0','',$this_month[0]),$this_month[1]);
    
  ?>
</div>
<div class='br2'>
</div>
<div class='footer'>
  <img src='http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/img/emailFooter.png'>
</div>
</div>
</td></tr></table>
</body>
</html>