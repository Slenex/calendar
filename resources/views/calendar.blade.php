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
<script src="{{ URL::asset('assets/pages/calendar-init.js')}}"></script>
<!-- <script>
$('#calendar').fullCalendar({
    selectable: true,
    fixedWeekCount: false,
    height: 580
});
</script> -->
@endsection
