<?php
	header('Content-type: application/json');

	$dbhost = 'sql.cca-hplap-0036';
	$dbuser = 'root';
	$dbpass = 'dmtdp';
	$dbname = 'events_calendar';

	$where = '';
	$rows = array();

	$event_name 				  = $_GET['event_name'];
	$event_venue 				  = $_GET['event_venue'];
	$event_country 				= $_GET['event_country'];
	$event_provence 			= $_GET['event_provence'];
	$event_city 				  = $_GET['event_city'];
	$event_sport 				  = $_GET['event_sport'];
	$online_entries				= $_GET['online_entries'];
	$event_cca_timed 			= $_GET['event_cca_timed'];


	$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	if (!empty($event_name))											{$where .= ' AND event_name LIKE "%'.$event_name.'%"';}
	if (!empty($event_venue))											{$where .= ' AND event_venue LIKE "%'.$event_venue.'%"';}
	if (!empty($event_country))										{$where .= ' AND event_country LIKE "%'.$event_country.'%"';}
	if (!empty($event_provence))									{$where .= ' AND event_provence LIKE "%'.$event_provence.'%"';}
	if (!empty($event_city))											{$where .= ' AND event_city LIKE "%'.$event_city.'%"';}
	if (!empty($event_sport))											{$where .= ' AND event_sport LIKE "%'.$event_sport.'%"';}
	if (!empty($event_cca_timed))									{$where .= ' AND event_cca_timed = "'.$event_cca_timed.'"';}
	if (!empty($online_entries))									{$where .= ' AND online_entries = "'.$online_entries.'"';}


	$sql = $db->query("SELECT * FROM cca_calendar_events where _id IS NOT NULL".$where."");	
	while($r = mysqli_fetch_assoc($sql)) {$rows[] = $r;}
	
	foreach($rows as $event):
		$eventList[] = array(
			'id'   												=> (int) $event['_id'],
			'title' 											=> $event['event_name'],
			'start'												=> $event['event_startdate']." ".$event['event_time'],
			'end'   											=> $event['event_enddate']." ".$event['event_time'],
			'event_description'    				=> $event['event_description'],
			'event_banner'    						=> $event['event_banner'],
			'event_entry_openingdate'  		=> $event['event_entry_openingdate'],
			'event_venue'    							=> $event['event_venue'],
			'event_country'    						=> $event['event_country'],
			'event_provence'    					=> $event['event_provence'],
			'event_city'    							=> $event['event_city'],
			'event_attending'   					=> $event['event_attending'],
			'event_sport'    							=> $event['event_sport'],
			'online_entries'    					=> $event['online_entries'],
			'event_online_entry' 				 	=> $event['event_online_entry'],
			'event_cca_timed'   					=> $event['event_cca_timed']
		);         
	endforeach;
	echo json_encode($eventList);
	mysqli_close($db);
?>


			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
