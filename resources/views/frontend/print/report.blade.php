<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $report->student->fullname }}</title>
    <link href="{{ asset('../assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('../dist/css/style.min.css') }}" rel="stylesheet">

</head>
<body>
<div class="container-fluid">
    @include('components.flash-message')
    <ul>
        @foreach($errors->all() as $message)
            <li class="text-danger">{{ $message }}</li>
        @endforeach
    </ul>
    <div class="row" >
        <div class="col-12" >
            <div class="card" id="result">
                <div class="card-body">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4><b>NAME:</b> {{ $report->student->longname }}</h4>
                                <h4><b>TOTAL:</b> {{ $report->total }}</h4>
                                <h4><b>AVERAGE:</b> {{ $report->average }}</h4>
                                <h4><b>POSITION:</b> {{ $report->position }}</h4>
                                <h4><b>ADMISSION NUMBER:</b> {{ $report->school->school_name_code . '-' . $report->student->code }}</h4>
                            </div>
                            <div class="text-center">
                                @if($report->school->result_logo)
{{--                                    <img src="{{ asset('storage/'. $report->school->result_logo) }}" alt="{{ $report->school->school_name }}" title="{{ $report->school->school_name }}">--}}
                                @else
{{--                                    <img src="{{ asset('storage/'. $report->school->school_logo) }}" alt="{{ $report->school->school_name }}" title="{{ $report->school->school_name }}">--}}
                                @endif
                                @if($report->school->result_school_name)
                                    <h3 class="p-2 text-capitalize">{{ \Illuminate\Support\Str::upper($report->school->result_school_name) }}</h3>
                                @else
                                    <h3 class="p-2 text-capitalize"><b>{{ \Illuminate\Support\Str::upper($report->school->school_name) }}</b></h3>
                                    <h3 class="p-2 text-capitalize"><b>{{ \Illuminate\Support\Str::upper($report->student->studentInfo->schoolType->name . ' ' . $report->exam->name) }}</b></h3>
                                @endif
                            </div>
                            <div>
                                <h4><b>HOUSE:</b> {{ $report->student->studentInfo->group->name }}</h4>
                                <h4><span><b>CLASS:</b> {{ $report->student->studentInfo->section->classes->name }}</span>   <span><b>NUMBER IN CLASS:</b> {{ $report->student->studentInfo->section->count() }}</span></h4>
                                <h4><span><b>TERM:</b> {{ $report->exam->name }}</span> <span><b>YEAR:</b> {{ $report->exam->academicCalendar->session->name }}</span></h4>
                                <h4><b>NEXT TERM BEGINS:</b> {{ $report->exam->academicCalendar->resumption}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-6">
                                <table class=" table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="pr-3 pl-3"><small><b>Courses</b>

                                            </small></th>
                                        <th class="verticalTableHeader"><small>Resumption Test</small></th>
                                        <th class="verticalTableHeader"><small>Notes</small></th>
                                        <th class="verticalTableHeader"><small>Project</small></th>
                                        <th class="verticalTableHeader"><small>Class Work</small></th>
                                        <th class="verticalTableHeader"><small>Assignment</small></th>
                                        <th class="verticalTableHeader"><small>Mid Term Test</small></th>
                                        <th class="verticalTableHeader"><small>Attendance</small></th>
                                        <th class="verticalTableHeader"><small>Examination</small></th>
                                        <th class="verticalTableHeader"><small>Position</small></th>
                                        <th class="verticalTableHeader"><small>Class Average</small></th>
                                        <th class="verticalTableHeader"><small>Grade</small></th>
                                        <th class="pr-3 pl-3"><small>Remark</small></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($report->grade as $grade)
                                        <tr>
                                            <td class="pl-3 pr-3"><small>{{ $grade->course->name }}</small></td>
                                            <td><small>{{ $grade->resumption_test }}</small></td>
                                            <td><small>{{ $grade->note }}</small></td>
                                            <td><small>{{ $grade->project }}</small></td>
                                            <td><small>{{ $grade->classwork }}</small></td>
                                            <td><small>{{ $grade->assignment }}</small></td>
                                            <td><small>{{ $grade->midterm_test }}</small></td>
                                            <td><small>{{ $grade->attendance }}</small></td>
                                            <td><small>{{ $grade->exam }}</small></td>
                                            <td><small>{{ $grade->position }}</small></td>
                                            <td><small>{{ $grade->average }}</small></td>
                                            <td><small>{{ $grade->grade }}</small></td>
                                            <td><small>{{ $grade->remark }}</small></td>
                                        </tr>
                                    @empty
                                        <p>No grades</p>
                                    @endforelse
                                    </tbody>
                                </table>
                                <div class="pt-4 pb-4 d-flex justify-content-between">
                                    <div>
                                        <?php
                                        $comments = $report->comments($report->student->id)
                                        ?>
                                        @forelse($comments as $comment)
                                            @if($comment->role == 'form_teacher')
                                                <p><b>Form Teacher's Comment: </b>{{ $comment->comment }}</p>
                                                <p class="pt-4"><span><b>Signature:</b> {{ $comment->commentBy->fullname }}</span> <span><b>Date:</b> {{ $comment->created_at }}</span></p>
                                            @endif
                                        @empty
                                            <p><b>Form Teacher's Comment: </b> </p>
                                        @endforelse

                                    </div>
                                    <div>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="pr-2 pl-2"><small><b>Fees</b></small></th>
                                                <th class="pr-2 pl-2"><small><b>Amount (N)</b></small></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($fees as $fee)
                                                <tr>
                                                    <th class="pr-2 pl-2"><small>{{ $fee->name }}</small></th>
                                                    <td class="pr-2 pl-2"><small>{{ money($fee->amount, '') }}</small></td>
                                                </tr>
                                            @empty
                                                <p>no fees</p>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3">
                                <table class=" table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="pr-2 pl-2"><small><b>Social Behaviour</b></small></th>
                                        <th class="pr-2 pl-2"><small><b>Rating</b></small></th>
                                        <th class="pr-2 pl-2"><small><b>Entered By</b></small></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Punctuality</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->punctuality }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Class Attendance</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->attendance }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Attentiveness</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->attentiveness }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Initiative</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->initiative }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Perseverance</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->perseverance }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Carrying out assignment</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->carrying_out_assignment }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Organisational Ability</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->organisational_ability }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Neatness</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->neatness }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Politeness</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->politeness }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Honesty</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->honesty }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Self control</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->self_control }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Spirit of cooperation</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->spirit_of_cooperation }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Obedience</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->obedience }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Sense of responsibility</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->sense_of_responsibility }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Public Speaking</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->public_speaking }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small><b>Moral Skills</b></small></th>
                                        <td class="pr-2 pl-2"><small></small></td>
                                        <td class="pr-2 pl-2"><small></small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Hand writing</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->hand_writing }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Handling of tools</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->handling_of_tools }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Drawing</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->drawing }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Painting</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->painting }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-2 pl-2"><small>Sculpture</small></th>
                                        <td class="pr-2 pl-2"><small>{{ $report->sculpture }}</small></td>
                                        <td class="pr-2 pl-2"><small>{{ $report->user->fullname }}</small></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-2 col-sm-3">
                                <table class="table  table-bordered no-wrap">
                                    <thead>
                                    <tr>
                                        <th>
                                            <small> <b>KEY TO RATINGS</b>
                                                @forelse($report->school->psychometric as $p)
                                                    <p>{{ $p->key . ' - ' . $p->name }}</p>

                                                @empty
                                                    <p>no data</p>
                                                @endforelse
                                            </small>
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                                <table class="table  table-bordered no-wrap">
                                    <thead>
                                    <tr>
                                        <th>
                                            <small> <b>KEY TO GRADE</b>
                                                @forelse($gradeSystem as $s)
                                                    <p>{{ $s->grade . ' - ' . $s->point . '/ ' . $s->from_mark . ' - ' . $s->to_mark }}</p>
                                                @empty
                                                    <p>no data</p>
                                                @endforelse
                                            </small>
                                        </th>
                                    </tr>
                                    </thead>

                                </table>
                                @forelse($comments as $comment)
                                    @if($comment->role == 'sport')
                                        <div>
                                            <p><b>HOUSE MASTER'S COMMENT: </b>{{ $comment->comment }}</p>
                                            <p class="pt-1"><span><b>Signature:</b> {{ $comment->commentBy->fullname }}</span> <span><b>Date:</b> {{ $comment->created_at }}</span></p>
                                        </div>
                                    @endif
                                @empty
                                    <p> </p>
                                @endforelse
                                @forelse($comments as $comment)
                                    @if($comment->role == 'counsellor')
                                        <div>
                                            <p><b>GUIDANCE COUNSELLOR'S COMMENT: </b>{{ $comment->comment }}</p>
                                            <p class="pt-1"><span><b>Signature:</b> {{ $comment->commentBy->fullname }}</span> <span><b>Date:</b> {{ $comment->created_at }}</span></p>
                                        </div>
                                    @endif
                                @empty
                                    <p> </p>
                                @endforelse
                                @forelse($comments as $comment)
                                    @if($comment->role == 'principal')
                                        <div>
                                            <p><b>PRINCIPAL'S COMMENT: </b>{{ $comment->comment }}</p>
                                            <p class="pt-1"><span><b>Signature:</b> {{ $comment->commentBy->fullname }}</span> <span><b>Date:</b> {{ $comment->created_at }}</span></p>
                                        </div>
                                    @endif
                                @empty
                                    <p> </p>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
