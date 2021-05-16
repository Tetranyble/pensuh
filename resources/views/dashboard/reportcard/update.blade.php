@extends('dashboard.layouts.dashboard')
@section('title', 'Report Card')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        <ul>
            @foreach($errors->all() as $message)
                <li class="text-danger">{{ $message }}</li>
            @endforeach
        </ul>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('report.store' ) }}">
                    @csrf
                    @foreach($request as $key => $req)
                        <input type="hidden" name="{{ $key }}" value="{{ $req }}">
                    @endforeach
                    @forelse($reports as $key => $report)
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $report->student->fullname }}</h4>

                                <div class="form-body">
                                    <div class="row">
                                        <input type="hidden" name="id[]" value="{{ $report->id }}">
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('punctuality')) ? 'has-error' : ''}}">
                                                <label for="punctuality">Punctuality
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('punctuality')}}</span></span>
                                                </label>
                                                <input name="punctuality[]" class="form-control" id="punctuality" type="number" min="0" max="5"
                                                       placeholder="punctuality" value="{{ in_array($report->punctuality, old('punctuality', $report->pluck('punctuality')->toArray()) ?: []) ? $report->punctuality : old('punctuality') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('attendance')) ? 'has-error' : ''}}">
                                                <label for="attendance">Attendance
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('attendance')}}</span></span>
                                                </label>
                                                <input name="attendance[]" class="form-control" id="attendance" type="number" min="0" max="5"
                                                       placeholder="attendance" value="{{ in_array($report->attendance, old('attendance', $report->pluck('attendance')->toArray()) ?: []) ? $report->attendance : old('attendance') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('attentiveness')) ? 'has-error' : ''}}">
                                                <label for="attentiveness">Attentiveness
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('attentiveness')}}</span></span>
                                                </label>
                                                <input name="attentiveness[]" class="form-control" id="attentiveness" type="number" min="0" max="5"
                                                       placeholder="attentiveness" value="{{ in_array($report->attentiveness, old('attentiveness', $report->pluck('attentiveness')->toArray()) ?: []) ? $report->attentiveness : old('attentiveness') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('initiative')) ? 'has-error' : ''}}">
                                                <label for="initiative">Initiative
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('initiative')}}</span></span>
                                                </label>
                                                <input name="initiative[]" class="form-control" id="initiative" type="number" min="0" max="5"
                                                       placeholder="initiative" value="{{ in_array($report->initiative, old('initiative', $report->pluck('initiative')->toArray()) ?: []) ? $report->initiative : old('initiative') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('perseverance')) ? 'has-error' : ''}}">
                                                <label for="perseverance">Perseverance
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('perseverance')}}</span></span>
                                                </label>
                                                <input name="perseverance[]" class="form-control" id="perseverance" type="number" min="0" max="5"
                                                       placeholder="perseverance" value="{{ in_array($report->perseverance, old('perseverance', $report->pluck('perseverance')->toArray()) ?: []) ? $report->perseverance : old('perseverance') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('carrying_out_assignment')) ? 'has-error' : ''}}">
                                                <label for="carrying_out_assignment">Carrying out assignment
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('carrying_out_assignment')}}</span></span>
                                                </label>
                                                <input name="carrying_out_assignment[]" class="form-control" id="carrying_out_assignment" type="number" min="0" max="5"
                                                       placeholder="carrying_out_assignment" value="{{ in_array($report->carrying_out_assignment, old('carrying_out_assignment', $report->pluck('carrying_out_assignment')->toArray()) ?: []) ? $report->carrying_out_assignment : old('carrying_out_assignment') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('organisational_ability')) ? 'has-error' : ''}}">
                                                <label for="organisational_ability">Organisational ability
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('organisational_ability')}}</span></span>
                                                </label>
                                                <input name="organisational_ability[]" class="form-control" id="organisational_ability" type="number" min="0" max="5"
                                                       placeholder="organisational_ability" value="{{ in_array($report->organisational_ability, old('organisational_ability', $report->pluck('organisational_ability')->toArray()) ?: []) ? $report->organisational_ability : old('organisational_ability') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('neatness')) ? 'has-error' : ''}}">
                                                <label for="neatness">Neatness
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('neatness')}}</span></span>
                                                </label>
                                                <input name="neatness[]" class="form-control" id="neatness" type="number" min="0" max="5"
                                                       placeholder="neatness" value="{{ in_array($report->neatness, old('neatness', $report->pluck('neatness')->toArray()) ?: []) ? $report->neatness : old('neatness') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('politeness')) ? 'has-error' : ''}}">
                                                <label for="politeness">Politeness
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('politeness')}}</span></span>
                                                </label>
                                                <input name="politeness[]" class="form-control" id="politeness" type="number" min="0" max="5"
                                                       placeholder="politeness" value="{{ in_array($report->politeness, old('politeness', $report->pluck('politeness')->toArray()) ?: []) ? $report->politeness : old('politeness') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('honesty')) ? 'has-error' : ''}}">
                                                <label for="honesty">Honesty
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('honesty')}}</span></span>
                                                </label>
                                                <input name="honesty[]" class="form-control" id="honesty" type="number" min="0" max="5"
                                                       placeholder="honesty" value="{{ in_array($report->honesty, old('honesty', $report->pluck('honesty')->toArray()) ?: []) ? $report->honesty : old('honesty') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('self_control')) ? 'has-error' : ''}}">
                                                <label for="self_control">Self Control
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('self_control')}}</span></span>
                                                </label>
                                                <input name="self_control[]" class="form-control" id="self_control" type="number" min="0" max="5"
                                                       placeholder="self_control" value="{{ in_array($report->self_control, old('self_control', $report->pluck('self_control')->toArray()) ?: []) ? $report->self_control : old('self_control') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('spirit_of_cooperation')) ? 'has-error' : ''}}">
                                                <label for="spirit_of_cooperation">Spirit of cooperation
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('spirit_of_cooperation')}}</span></span>
                                                </label>
                                                <input name="spirit_of_cooperation[]" class="form-control" id="spirit_of_cooperation" type="number" min="0" max="5"
                                                       placeholder="spirit_of_cooperation" value="{{ in_array($report->spirit_of_cooperation, old('spirit_of_cooperation', $report->pluck('spirit_of_cooperation')->toArray()) ?: []) ? $report->spirit_of_cooperation : old('spirit_of_cooperation') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('obedience')) ? 'has-error' : ''}}">
                                                <label for="obedience">Obedience
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('obedience')}}</span></span>
                                                </label>
                                                <input name="obedience[]" class="form-control" id="obedience" type="number" min="0" max="5"
                                                       placeholder="obedience" value="{{ in_array($report->obedience, old('obedience', $report->pluck('obedience')->toArray()) ?: []) ? $report->obedience : old('obedience') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('sense_of_responsibility')) ? 'has-error' : ''}}">
                                                <label for="sense_of_responsibility">Sense of responsibility
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('sense_of_responsibility')}}</span></span>
                                                </label>
                                                <input name="sense_of_responsibility[]" class="form-control" id="sense_of_responsibility" type="number" min="0" max="5"
                                                       placeholder="sense_of_responsibility" value="{{ in_array($report->sense_of_responsibility, old('sense_of_responsibility', $report->pluck('sense_of_responsibility')->toArray()) ?: []) ? $report->sense_of_responsibility : old('sense_of_responsibility') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('public_speaking')) ? 'has-error' : ''}}">
                                                <label for="public_speaking">Public speaking
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('public_speaking')}}</span></span>
                                                </label>
                                                <input name="public_speaking[]" class="form-control" id="public_speaking" type="number" min="0" max="5"
                                                       placeholder="public_speaking" value="{{ in_array($report->public_speaking, old('public_speaking', $report->pluck('public_speaking')->toArray()) ?: []) ? $report->public_speaking : old('public_speaking') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('handwriting')) ? 'has-error' : ''}}">
                                                <label for="handwriting">Handwriting
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('handwriting')}}</span></span>
                                                </label>
                                                <input name="handwriting[]" class="form-control" id="handwriting" type="number" min="0" max="5"
                                                       placeholder="handwriting" value="{{ in_array($report->handwriting, old('handwriting', $report->pluck('handwriting')->toArray()) ?: []) ? $report->handwriting : old('handwriting') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('handling_of_tools')) ? 'has-error' : ''}}">
                                                <label for="handling_of_tools">Handling of tools
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('handling_of_tools')}}</span></span>
                                                </label>
                                                <input name="handling_of_tools[]" class="form-control" id="handling_of_tools" type="number" min="0" max="5"
                                                       placeholder="handling_of_tools" value="{{ in_array($report->handling_of_tools, old('handling_of_tools', $report->pluck('handling_of_tools')->toArray()) ?: []) ? $report->handling_of_tools : old('handling_of_tools') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('drawing')) ? 'has-error' : ''}}">
                                                <label for="drawing">Drawing
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('drawing')}}</span></span>
                                                </label>
                                                <input name="drawing[]" class="form-control" id="drawing" type="number" min="0" max="5"
                                                       placeholder="drawing" value="{{ in_array($report->drawing, old('drawing', $report->pluck('drawing')->toArray()) ?: []) ? $report->drawing : old('drawing') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('painting')) ? 'has-error' : ''}}">
                                                <label for="painting">Painting
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('painting')}}</span></span>
                                                </label>
                                                <input name="painting[]" class="form-control" id="painting" type="number" min="0" max="5"
                                                       placeholder="painting" value="{{ in_array($report->painting, old('painting', $report->pluck('painting')->toArray()) ?: []) ? $report->painting : old('painting') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('sculpture')) ? 'has-error' : ''}}">
                                                <label for="sculpture">Sculpture
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('sculpture')}}</span></span>
                                                </label>
                                                <input name="sculpture[]" class="form-control" id="sculpture" type="number" min="0" max="5"
                                                       placeholder="sculpture" value="{{ in_array($report->sculpture, old('sculpture', $report->pluck('sculpture')->toArray()) ?: []) ? $report->sculpture : old('sculpture') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('relationship_with_others')) ? 'has-error' : ''}}">
                                                <label for="relationship_with_others">Relationship with others
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('relationship_with_others')}}</span></span>
                                                </label>
                                                <input name="relationship_with_others[]" class="form-control" id="relationship_with_others" type="number" min="0" max="5"
                                                       placeholder="relationship_with_others" value="{{ in_array($report->relationship_with_others, old('relationship_with_others', $report->pluck('relationship_with_others')->toArray()) ?: []) ? $report->relationship_with_others : old('relationship_with_others') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('participation_in_school_arts')) ? 'has-error' : ''}}">
                                                <label for="participation_in_school_arts"> Participation in arts
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('participation_in_school_arts')}}</span></span>
                                                </label>
                                                <input name="participation_in_school_arts[]" class="form-control" id="participation_in_school_arts" type="number" min="0" max="5"
                                                       placeholder="participation_in_school_arts" value="{{ in_array($report->participation_in_school_arts, old('participation_in_school_arts', $report->pluck('participation_in_school_arts')->toArray()) ?: []) ? $report->participation_in_school_arts : old('participation_in_school_arts') }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    @empty
                        <p>no grade</p>
                    @endforelse
                    <div class="card">
                        <div class="card-body">
                            <div class="form-actions d-flex justify-content-between">
                                <div>
{{--                                    {{ $reports->links() }}--}}
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Update Report</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


