<?php

	$html = '<html>
		<head>
			<link rel="stylesheet" href="fullcalendar/fullcalendar.css" />

			<script src="fullcalendar/lib/jquery.min.js"></script>
			<script src="fullcalendar/lib/moment.min.js"></script>
			<script src="fullcalendar/fullcalendar.js"></script>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

			<script>
				jQuery(document).ready(function() {
					var event_urls = "/getevents.php?event_name=&event_startdate=&event_enddate=&event_entry_openingdate=&event_venue=&event_country=&event_provence=&event_city=&event_sport=&online_entries=&event_cca_timed=";
					load_calendar(event_urls);

					jQuery( "#filter_form" ).on( "submit", function( event ) {
						event.preventDefault();
						var event_filters = jQuery( "#filter_form" ).serialize();
						event_urls = "/getevents.php?"+event_filters+"";
						load_calendar(event_urls);
						jQuery(".search_form_container").hide("slow");
						jQuery(".add_form_container").hide("slow");
					});

					jQuery("#add_form").on( "submit", function( event ) {
						event.preventDefault();
						var event_filters = jQuery( "#add_form" ).serialize();
						jQuery(".search_form_container").hide("slow");
						jQuery(".add_form_container").hide("slow");
					});


					jQuery(".togle_search").click(function(){jQuery(".search_form_container").toggle("slow");jQuery(".add_form_container").hide("slow");jQuery(".change_settings").hide("slow");});
					jQuery(".togle_add").click(function(){jQuery(".add_form_container").toggle("slow");jQuery(".search_form_container").hide("slow");jQuery(".change_settings").hide("slow");});
					jQuery(".togle_settings").click(function(){jQuery(".change_settings").toggle("slow");jQuery(".search_form_container").hide("slow");jQuery(".add_form_container").hide("slow");});
					
					
					
					jQuery(".color_scheme-blue").click(function(){jQuery("body").css({ "background-color": "blue"})});
					jQuery(".color_scheme-yellow").click(function(){jQuery("body").css({ "background-color": "yellow"})});
					jQuery(".color_scheme-green").click(function(){jQuery("body").css({ "background-color": "green"})});
					jQuery(".color_scheme-brown").click(function(){jQuery("body").css({ "background-color": "brown"})});
					jQuery(".color_scheme-gray").click(function(){jQuery("body").css({ "background-color": "white"})});
					
					
					
					


					function load_calendar(event_urls){
						jQuery("#calendar").fullCalendar("destroy");
						jQuery("#calendar").fullCalendar({
							header: {
								left: "prev,next today",
								center: "title",
								right: "month,basicWeek,basicDay"
							},
							editable: false,
							events: {
								url: event_urls,
								type: "POST",
								error: function() {
									alert("there was an error while fetching events!");
								}
							}
						});
					}
				});
			</script>

			<style>
				.form_row {
					height: 50px;
					Padding: 8;
				}
				input.filter_form {
					width: 100%;
					height: 30px;
					border: none;
					background-color: rgba(0,0,0,0.6);
					box-shadow: 1px 1px 6px -1px rgba(0,0,0,0.5);
					border-radius:0px;
					color: white;
				}
				select.filter_form {
					width: 100%;
					height: 30px;
					border: none;
					background-color: rgba(0,0,0,0.6);
					box-shadow: 1px 1px 6px -1px rgba(0,0,0,0.5);
					border-radius:0px;
					color: white;
				}
				.input_half_width {
					width: 48%;
					float: left;
				}
				.input_full_width {
					width: 90%;
					margin: 8px auto;
				}
				label {
					line-height: 29px;
					font-size: 13pt;
					font-family: cursive;
					color: white;
				}
				textarea {
					width: 100%;
					height: 200px;
					border: none;
					background-color: gray;
					background-color: rgba(0,0,0,0.6);
					box-shadow: 1px 1px 6px -1px rgba(0,0,0,0.5);
					border-radius:0px;
					color: white;
				}
				.description_row{
					height: 250px;
				}
				.search_form_container {
					display: none;
					float:left;
					position: absolute;
					top: 50px;
					left: 0px;
					background-color: rgba(0,0,0,0.7);
					z-index: 9;
					width: 35%;
					height: 92vh;
					overflow-y:scroll;
				}
				.add_form_container {
					display: none;
					float:left;
					position: absolute;
					top: 50px;
					left: 0px;
					background-color: rgba(0,0,0,0.7);
					z-index: 9;
					width: 35%;
					height: 92vh;
					overflow-y:scroll;
				}
				.change_settings {
					display: none;
					float:left;
					position: absolute;
					top: 50px;
					left: 0px;
					background-color: rgba(0,0,0,0.7);
					z-index: 9;
					width: 35%;
					height: 92vh;
					overflow-y:scroll;
				}
				.form_toggle_holder{
					position: absolute;
					top: 0px;
					left: 0px;
					width: 35%;
					height: 50px;					
					background-color: #363636;		
					z-index:999999;
				}
				.togle_search{
				}
				.togle_add{
				}
				.togle_settings{
				}
				.togle_buttons{
					margin:0;
					padding:0;
					float:left;
					font-size: 18pt;
					padding: 12px 0;    
					padding-left: 3.3%;
					width: 30%;
					border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
					box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
					color: rgba(255,255,255,0.5);
				}
				#calendar{
					max-width: 65%;
					margin:0 auto;
					margin-left:35%;
					height:92vh;
					overflow:hidden;
					position: absolute;
					top: 0;
					right: 0;
				}
				.fc-toolbar {
					text-align: center;
					margin-bottom: 1em;
					background-color: #363636;
					padding: 8px;
					margin: 0;
				}
				.fc-state-default{
					background-image:none;
					background-color:#696969;
				}
				.fc-unthemed th, .fc-unthemed td, .fc-unthemed thead, .fc-unthemed tbody, .fc-unthemed .fc-divider, .fc-unthemed .fc-row, .fc-unthemed .fc-popover {
					border: 1px dashed #262626;
				}
				.fc-basic-view .fc-body .fc-row {
					min-height: 4em;
					background-color: rgba(0,0,0,0.8);
				}
				.fc-unthemed th, .fc-unthemed td, .fc-unthemed thead, .fc-unthemed tbody, .fc-unthemed .fc-divider, .fc-unthemed .fc-row, .fc-unthemed .fc-popover {
					background-color: transparent;
				}
				th.fc-day-header {
					background-color: #595959;
					color: rgba(255,255,255,0.9);
				}
				thead.fc-head {
					border: 1px solid gray;
				}
				.fc-row.fc-widget-header {
					border: 1px solid gray;
				}
				tbody.fc-body {
					border: 1px solid gray;
				}
				.fc-today {
					background-color: rgba(0,0,0,0.4)!important;
				}
				.fc-day-number{
					color: rgba(255,255,255,0.9);
				}
				.fc-state-default{
					text-shadow:none;
					color: rgba(255,255,255,0.5);
				}
				.fc .fc-toolbar > * > :first-child {
					margin-left: 0;
					color: rgba(255,255,255,0.5);
				}
				.color_scheme-blue{
					width: 80%;
					margin: 0 auto;
					height:50px;
					background-color: blue;
				} 
				.color_scheme-yellow{
					width: 80%;
					margin: 0 auto;
					height:50px;
					background-color: yellow;
				} 
				.color_scheme-green{
					width: 80%;
					margin: 0 auto;
					height:50px;
					background-color: green;
				} 
				.color_scheme-brown{
					width: 80%;
					margin: 0 auto;
					height:50px;
					background-color: brown;
				} 
				.color_scheme-gray{
					width: 80%;
					margin: 0 auto;
					height:50px;
					background-color: gray;
				}
				
			</style>
		</head>
		<body>
			<div id="calendar"></div>
			<div id="calendar_event_view" style="max-width: 600px;"></div>

			<div class="form_toggle_holder">
				<div class="togle_buttons togle_search"><i class="fa fa-sliders"></i> Search</div>
				<div class="togle_buttons togle_add"><i class="fa fa-file-text"></i> Register</div>
				<div class="togle_buttons togle_settings"><i class="fa fa-cogs"></i> Settings</div>
			</div>
			<div class="change_settings">
				<div class="color_scheme-blue"></div>
				<div class="color_scheme-yellow"></div>
				<div class="color_scheme-green"></div>
				<div class="color_scheme-brown"></div>
				<div class="color_scheme-gray"></div>
			</div>
			<div class="search_form_container">
				<form id="filter_form">
					<div class="input_full_width"><label>Search Event Name:</label><br><input class="filter_form" type="Text" id="event_name" name="event_name"></div>
					<div class="input_full_width"><label>Search Event Sport Type</label><br><input class="filter_form" type="Text" id="event_sport" name="event_sport"></div>
					<div class="input_full_width"><label>Venue</label><br><input class="filter_form" type="Text" id="event_venue" name="event_venue"></div>
					<div class="input_full_width"><label>Country</label><br><input class="filter_form" type="Text" id="event_country" name="event_country"></div>
					<div class="input_full_width"><label>Provence / State</label><br><input class="filter_form" type="Text" id="event_provence" name="event_provence"></div>
					<div class="input_full_width"><label>City</label><br><input class="filter_form" type="Text" id="event_city" name="event_city"></div>
					<div class="input_full_width"><label>Online Entries</label><br><select class="filter_form" id="online_entries" name="online_entries"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div>
					<div class="input_full_width"><label>Timed By CCA</label><br><select class="filter_form " id="event_cca_timed" name="event_cca_timed"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div>
					<div class="input_full_width"><input class="filter_form" type="submit" value="submit" id="send_info"></div>
					<div style="clear:both;"></div>
				</form>
			</div>
			<div class="add_form_container">
				<form id="add_form">
					<div class="form_row"><label>Name:</label><br><input class="filter_form" type="Text" id="name" name="name"></div>
					<div class="form_row description_row"><label>Description:</label><br><textarea name="descrip" id="descrip"></textarea></div>
					<div class="form_row">
						<div class="input_half_width" style="margin-right: 4%;"><label>Start Date:</label><br><input class="filter_form" type="date" id="start_date" name="start_date"></div>
						<div class="input_half_width"><label>Start Time:</label><br><input class="filter_form" type="time" id="start_time" name="start_time"></div>
						<div style="clear:both"></div>
					</div>
					<div class="form_row">
						<div class="input_half_width" style="margin-right: 4%;"><label>End Date</label><br><input class="filter_form" type="date" id="End_Date" name="End_Date"></div>
						<div class="input_half_width"><label>End Time</label><br><input class="filter_form" type="time" id="End_time" name="End_time"></div>
						<div style="clear:both"></div>
					</div>
					<div class="form_row"><label>Entries Opening Date</label><br><input class="filter_form" type="date" id="open_date" name="open_date"></div>
					<div class="form_row">
						<div class="input_half_width"><label>Country""</label><br><input class="filter_form" type="Text" id="Country" name="Country"></div>
						<div class="input_half_width" style="margin-left: 4%;"><label>Provence / State:</label><br><input class="filter_form" type="Text" id="provence" name="provence"></div>
						<div style="clear:both"></div>
					</div>
					<div class="form_row">
						<div class="input_half_width"><label>City</label><br><input class="filter_form" type="Text" id="city" name="city"></div>
						<div class="input_half_width" style="margin-left: 4%;"><label>Venue:</label><br><input class="filter_form" type="Text" id="venue" name="venue"></div>
						<div style="clear:both"></div>
					</div>
					<div class="form_row"><label>Attending</label><br><input class="filter_form" type="number" id="attending" name="attending"></div>
					<div class="form_row"><label>Sport Type</label><br><input class="filter_form" type="Text" id="sport" name="sport"></div>
					<div class="form_row">
						<div class="input_half_width" style="margin-right: 4%;"><label>Online Entries?</label><br><select class="filter_form" id="Oentries" name="Oentries"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div>
						<div class="input_half_width"><label>Online Entries Link:</label><br><input class="filter_form" type="Text" id="Oentries_url" name="Oentries_url"></div>
						<div style="clear:both"></div>
					</div>
					<div class="form_row">
						<div class="input_half_width" style="margin-right: 4%;"><label>Timed By CCA</label><br><select class="filter_form " id="cca_timed" name="cca_timed"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div>
						<div class="input_half_width"><label>Event Holder:</label><br><input class="filter_form" type="Text" id="event_company" name="event_company"></div>
						<div style="clear:both"></div>
					</div>
					<div class="form_row">
						<div class="input_half_width" style="margin-right: 4%;"><label>Contact Number</label><br><input class="filter_form" type="number" id="event_contact_number" name="event_contact_number"></div>
						<div class="input_half_width"><label>Contact Email</label><br><input class="filter_form" type="email" id="event_contact_email" name="event_contact_email"></div>
						<div style="clear:both"></div>
					</div>

					<div class="form_row"><input class="filter_form" type="submit" value="submit" id="event_submission"></div>
				</form>
			</div>

		</body>
	</html>';
	
	echo $html;
?>

