@extends('layouts.master-without-nav')

@section('css')
<!--calendar css-->
<link href="{{ URL::asset('assets/plugins/fullcalendar/css/fullcalendar.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
            <div class="container-fluid">
                  <div class="row">
                        <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div id='calendar'></div>
        
                                        <div style='clear:both'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
            </div> <!-- end container-fluid -->  
@endsection

@section('script')
<script src="{{ URL::asset('assets/plugins/moment/moment.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/js/fullcalendar.min.js')}}"></script>
<!-- <script src="{{ URL::asset('assets/pages/calendar-init.js')}}"></script> -->
<script>
$(document).ready(function() {
   // alert("hai");
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    /*  className colors

     className: default(transparent), important(red), chill(pink), success(green), info(blue)

     */


    /* initialize the external events
     -----------------------------------------------------------------*/

    $('#external-events div.external-event').each(function() {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });


    /* initialize the calendar
     -----------------------------------------------------------------*/
     var bg_task = ["bg-teal", "bg-purple", "bg-warning", "bg-muted", "bg-white", 
     "bg-primary", "bg-success", "bg-brown", "bg-pink", "bg-info" ];
    var calendar =  $('#calendar').fullCalendar({
        header: {
            left: 'title',
            center: 'agendaDay,agendaWeek,month',
            right: 'prev,next today'
        },
        editable: true,
        firstDay: 0, //  1(Monday) this can be changed to 0(Sunday) for the USA system
        selectable: true,
        defaultView: 'month',
        fixedWeekCount: false,
        aspectRatio: 2.2,
        axisFormat: 'h:mm',
        columnFormat: {
            month: 'ddd',    // Mon
            week: 'ddd d', // Mon 7
            day: 'dddd M/d',  // Monday 9/7
            agendaDay: 'dddd d'
        },
        titleFormat: {
            month: 'MMMM YYYY', // September 2009
            week: "MMMM YYYY", // September 2009
            day: 'MMMM YYYY'                  // Tuesday, Sep 8, 2009
        },
        allDaySlot: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                calendar.fullCalendar('renderEvent',
                    {
                        title: title,
                        batch: batch,
                        language: language,
                        level: level,
                        partner: partner,
                        start: start,
                        end: end,
                        allDay: allDay
                    },
                    true // make the event "stick"
                );
            }
            calendar.fullCalendar('unselect');
        },
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }

        },

        events : [
        @foreach($courses as $course)
        {
            title : '{{ $course->title  }}',
            partner : '{{ $course->partner  }}',
            batch: '{{ $course->batch  }}',
            language: '{{ $course->language  }}',
            level: '{{ $course->level  }}',
            start : '{{ $course->from_Datetime }}',
            end: '{{ $course->to_datetime }}',
            className: bg_task[Math.floor(Math.random() * bg_task.length)],          
        },
        @endforeach
    ],

    eventClick: function(calEvent, jsEvent, view) {
        $('#title').html (calEvent.title);
        $('#partner').html (calEvent.partner);
        $('#batch').html (calEvent.batch);
        $('#language').html (calEvent.language);
        $('#level ').html (calEvent.level);
        $('#from_Datetime').html (moment(calEvent.start).format('DD-MM-YYYY HH:mm'));
        $('#to_Datetime').html (moment(calEvent.end).format('DD-MM-YYYY HH:mm'));
        $('#viewModal').modal();
    }
       
    });


});
</script>

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 id="title"> </h4>
                <div>
                    <span id="batch" class="badge badge-primary"></span>
                    <span id="language" class="badge badge-success"></span>
                    <span id="level" class="badge badge-dark"></span>
                </div>
                Conduct By: <label id="partner"></label>
                <br />
                Start time: <label id="from_Datetime"></label>
                <br />

                End time: <label id="to_Datetime"></label>
                <br />
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="button" class="btn btn-primary" id="appointment_update" value="Save">
            </div>
        </div>
    </div>
</div>
@endsection


