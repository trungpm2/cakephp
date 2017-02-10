<link rel='stylesheet' href='https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.css' />
<script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.js'></script>


<style type="text/css" media="screen">
	.fc-clear{
		clear: none !important;
	}	
	#scheduler-page #calendar .fc-event {
			/* adjust hue */
			background-color: #3b91ad !important; 
			border-color: #3b91ad !important;
		}

</style>

<div id="draggable" class="ui-widget-content">
  <p>Drag me around</p>
</div>
<div id='fullcalendar'></div>
<!-- dialog -->
<div id="dialog-form">
	<p class="validateTips">All form fields are required.</p>
 
  <form id="">
    <fieldset>
      <label for="name">Title</label>
      <input type="text" name="name" id="name" value="Jane Smith" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<script type="text/javascript">
	jQuery.browser = {};
	(function () {
	    jQuery.browser.msie = false;
	    jQuery.browser.version = 0;
	    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
	        jQuery.browser.msie = true;
	        jQuery.browser.version = RegExp.$1;
	    }
	})();
	var datetime = null;
	var name = $( "#name" ),
		tips = $( ".validateTips" );
	$(document).ready(function() {
		$('.draggable').data('event', { title: 'my event' });
		 $( "#draggable" ).draggable();
		$("#fireme").click(function(){
	        $("#EnSureModal").modal();
	    });
	    // page is now ready, initialize the calendar...

	    $('#fullcalendar').fullCalendar({
	        height:600,
	        header: 
	    	{
				left: 'prev,next today',
				center: 'title',
				right: 'agendaDay,agendaTwoDay,agendaWeek,month'
			},
	        defaultView: 'month',
			defaultDate: new Date(),
			editable: true,
			events: [
		        {
		            title  : 'event1',
		            start  : '2017-02-08'
		        },
		        {
		            title  : 'event2',
		            start  : '2017-02-05',
		            end    : '2017-02-07'
		        },
		        {
		            title  : 'event3',
		            start  : '2017-02-09T12:30:00',
		            allDay : false // will make the time show
		        }
		    ],
		   	editable: true,
		   	droppable: true,
		    eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {

		        // alert(
		        //     event.title + " was moved " +
		        //     dayDelta + " days and " +
		        //     minuteDelta + " minutes."
		        // );

		        // if (allDay) {
		        //     alert("Event is now all-day");
		        // }else{
		        //     alert("Event has a time-of-day");
		        // }

		        if (!confirm("Are you sure about this change?")) {
		            revertFunc();
		        }

		    },
		    eventClick: function(calEvent, jsEvent, view) {

		        alert('Event: ' + calEvent.title);
		        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
		        alert('View: ' + view.name);

		        // change the border color just for fun
		        $(this).css('border-color', 'red');
		        $('#myModal').modal('show');

		    },
		    dayClick: function(date, allDay, jsEvent, view) {

		        // if (allDay) {
		        //     alert('Clicked on the entire day: ' + date);
		        // }else{
		        //     alert('Clicked on the slot: ' + date);
		        // }

		        // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

		        // alert('Current view: ' + view.name);

		        // change the day's background color just for fun
		        datetime = date;
		         dialog.dialog( "open" );
		        $(this).css('background-color', 'gray');

		    }
	    });
	    dialog = $( "#dialog-form" ).dialog({
	      autoOpen: false,
	      height: 400,
	      width: 350,
	      modal: true,
	      buttons: {
	        "Create an account": addUser,
	        Cancel: function() {
	          dialog.dialog( "close" );
	        }
	      },
	      close: function() {
	        form[ 0 ].reset();
	        allFields.removeClass( "ui-state-error" );
	      }
	    });
	    function addUser(){
	    	var valid = true;
		    // allFields.removeClass( "ui-state-error" );
		 
		    valid = valid && checkLength( $( "#name" ), "Title", 3, 16 );
		    if ( valid ) {
		    	$('#fullcalendar').fullCalendar('renderEvent', { title: $('#name').val(), start: datetime, allDay: true }, true );
		    	dialog.dialog( "close" );
		    }
	    }
	    function checkLength( a, n, min, max ) {
	      if ( a.val().length > max || a.val().length < min ) {
	        a.addClass( "ui-state-error" );
	        updateTips( "Length of " + n + " must be between " +
	          min + " and " + max + "." );
	        return false;
	      } else {
	        return true;
	      }
	    }
	    function updateTips( t ) {
	      tips
	        .text( t )
	        .addClass( "ui-state-highlight" );
	      setTimeout(function() {
	        tips.removeClass( "ui-state-highlight", 1500 );
	      }, 500 );
	    }

	})
</script>