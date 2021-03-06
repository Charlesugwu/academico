@extends('backpack::blank')


@section('content')

<div class="row">
    
    <div class="col-lg-8 col-lg-offset-2">
        <div class="card">
            <div class="card-header">
                Présences pour la classe du {{ Carbon\Carbon::parse($event->start)->locale(app()->getLocale())->isoFormat('Do MMM YYYY') }}
                <div class="card-header-actions">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">@lang('Enroll new student')</button>
                    <a href="/attendance/course/{{ $event->course_id }}">@lang('Back to course')</a>
                </div>
            </div><!-- /.card-header -->
            
            <div class="card-body">
                <div id="app">
                <table class="table table-striped">
                    <thead>
                        <td>Student</td>
                        <td></td>
                    </thead>

                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr is="event-attendance-component"
                                :attendance="{{ json_encode($attendance) }}"
                                :event="{{ json_encode($event) }}"
                                route="{{ route('storeAttendance') }}">
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
            <label class="badge badge-success">
                P <i class="la la-user"></i>
            </label> : @lang('Present')
            - 
            <label class="badge badge-warning">
                PP <i class="la la-clock-o"></i>
            </label> : @lang('Partial presence (arrived late or left early)')
            - 
            <label class="badge badge-info">
                AJ <i class="la la-exclamation"></i>
            </label> : @lang('justified absence')
            - 
            <label class="badge badge-danger">
                A <i class="la la-user-times"></i>
            </label> : @lang('unjustified absence')
            </div>
            
        </div>
    </div>


</div>





@endsection



@section('after_scripts')

@include('partials.enrollment_modal', ['course_id' => $event->course->parent])

<script src="/js/app.js"></script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

@endsection
