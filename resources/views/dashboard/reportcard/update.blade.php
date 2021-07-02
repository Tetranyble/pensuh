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
                                            <div class="form-group {{($errors->has('punctuality.'.$key)) ? 'has-error' : ''}}">
                                                <label for="punctuality">Punctuality
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('punctuality.'.$key)}}</span></span>
                                                </label>
                                                <input name="punctuality[]" class="form-control" id="punctuality" type="number" min="0" max="5"
                                                       placeholder="punctuality" value="{{  old('punctuality.'.$key, $report->punctuality) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('attendance.'.$key)) ? 'has-error' : ''}}">
                                                <label for="attendance">Attendance
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('attendance.'.$key)}}</span></span>
                                                </label>
                                                <input name="attendance[]" class="form-control" id="attendance" type="number" min="0" max="5"
                                                       placeholder="attendance" value="{{ old('attendance.'.$key, $report->attendance)  }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('attentiveness.'.$key)) ? 'has-error' : ''}}">
                                                <label for="attentiveness">Attentiveness
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('attentiveness.'.$key)}}</span></span>
                                                </label>
                                                <input name="attentiveness[]" class="form-control" id="attentiveness" type="number" min="0" max="5"
                                                       placeholder="attentiveness" value="{{ old('attentiveness.'.$key, $report->attentiveness)  }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('initiative.'.$key)) ? 'has-error' : ''}}">
                                                <label for="initiative">Initiative
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('initiative.'.$key)}}</span></span>
                                                </label>
                                                <input name="initiative[]" class="form-control" id="initiative" type="number" min="0" max="5"
                                                       placeholder="initiative" value="{{ old('initiative.'.$key, $report->initiative) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('perseverance.'.$key)) ? 'has-error' : ''}}">
                                                <label for="perseverance">Perseverance
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('perseverance.'.$key)}}</span></span>
                                                </label>
                                                <input name="perseverance[]" class="form-control" id="perseverance" type="number" min="0" max="5"
                                                       placeholder="perseverance" value="{{ old('perseverance.'.$key, $report->perseverance) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('carrying_out_assignment.'.$key)) ? 'has-error' : ''}}">
                                                <label for="carrying_out_assignment">Carrying out assignment
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('carrying_out_assignment.'.$key)}}</span></span>
                                                </label>
                                                <input name="carrying_out_assignment[]" class="form-control" id="carrying_out_assignment" type="number" min="0" max="5"
                                                       placeholder="carrying_out_assignment" value="{{ old('carrying_out_assignment.'.$key, $report->carrying_out_assignment) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('organisational_ability.'.$key)) ? 'has-error' : ''}}">
                                                <label for="organisational_ability">Organisational ability
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('organisational_ability.'.$key)}}</span></span>
                                                </label>
                                                <input name="organisational_ability[]" class="form-control" id="organisational_ability" type="number" min="0" max="5"
                                                       placeholder="organisational_ability" value="{{ old('organisational_ability.'.$key, $report->organisational_ability) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('neatness.'.$key)) ? 'has-error' : ''}}">
                                                <label for="neatness">Neatness
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('neatness.'.$key)}}</span></span>
                                                </label>
                                                <input name="neatness[]" class="form-control" id="neatness" type="number" min="0" max="5"
                                                       placeholder="neatness" value="{{ old('neatness.'.$key, $report->neatness) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('politeness.'.$key)) ? 'has-error' : ''}}">
                                                <label for="politeness">Politeness
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('politeness.'.$key)}}</span></span>
                                                </label>
                                                <input name="politeness[]" class="form-control" id="politeness" type="number" min="0" max="5"
                                                       placeholder="politeness" value="{{  old('politeness.'.$key, $report->politeness) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('honesty.'.$key)) ? 'has-error' : ''}}">
                                                <label for="honesty">Honesty
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('honesty.'.$key)}}</span></span>
                                                </label>
                                                <input name="honesty[]" class="form-control" id="honesty" type="number" min="0" max="5"
                                                       placeholder="honesty" value="{{ old('honesty.'.$key, $report->honesty) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('self_control.'.$key)) ? 'has-error' : ''}}">
                                                <label for="self_control">Self Control
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('self_control.'.$key)}}</span></span>
                                                </label>
                                                <input name="self_control[]" class="form-control" id="self_control" type="number" min="0" max="5"
                                                       placeholder="self_control" value="{{  old('self_control.'.$key, $report->self_control) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('spirit_of_cooperation.'.$key)) ? 'has-error' : ''}}">
                                                <label for="spirit_of_cooperation">Spirit of cooperation
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('spirit_of_cooperation.'.$key)}}</span></span>
                                                </label>
                                                <input name="spirit_of_cooperation[]" class="form-control" id="spirit_of_cooperation" type="number" min="0" max="5"
                                                       placeholder="spirit_of_cooperation" value="{{ old('spirit_of_cooperation.'.$key, $report->spirit_of_cooperation) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('obedience.'.$key)) ? 'has-error' : ''}}">
                                                <label for="obedience">Obedience
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('obedience.'.$key)}}</span></span>
                                                </label>
                                                <input name="obedience[]" class="form-control" id="obedience" type="number" min="0" max="5"
                                                       placeholder="obedience" value="{{ old('obedience.'.$key, $report->obedience) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('sense_of_responsibility.'.$key)) ? 'has-error' : ''}}">
                                                <label for="sense_of_responsibility">Sense of responsibility
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('sense_of_responsibility.'.$key)}}</span></span>
                                                </label>
                                                <input name="sense_of_responsibility[]" class="form-control" id="sense_of_responsibility" type="number" min="0" max="5"
                                                       placeholder="sense_of_responsibility" value="{{ old('sense_of_responsibility.'.$key, $report->sense_of_responsibility) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('public_speaking.'.$key)) ? 'has-error' : ''}}">
                                                <label for="public_speaking">Public speaking
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('public_speaking.'.$key)}}</span></span>
                                                </label>
                                                <input name="public_speaking[]" class="form-control" id="public_speaking" type="number" min="0" max="5"
                                                       placeholder="public_speaking" value="{{ old('public_speaking.'.$key, $report->public_speaking) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('handwriting.'.$key)) ? 'has-error' : ''}}">
                                                <label for="handwriting">Handwriting
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('handwriting.'.$key)}}</span></span>
                                                </label>
                                                <input name="handwriting[]" class="form-control" id="handwriting" type="number" min="0" max="5"
                                                       placeholder="handwriting" value="{{ old('handwriting.'.$key, $report->handwriting) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('handling_of_tools.'.$key)) ? 'has-error' : ''}}">
                                                <label for="handling_of_tools">Handling of tools
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('handling_of_tools.'.$key)}}</span></span>
                                                </label>
                                                <input name="handling_of_tools[]" class="form-control" id="handling_of_tools" type="number" min="0" max="5"
                                                       placeholder="handling_of_tools" value="{{ old('handling_of_tools.'.$key, $report->handling_of_tools) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('drawing.'.$key)) ? 'has-error' : ''}}">
                                                <label for="drawing">Drawing
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('drawing.'.$key)}}</span></span>
                                                </label>
                                                <input name="drawing[]" class="form-control" id="drawing" type="number" min="0" max="5"
                                                       placeholder="drawing" value="{{ old('drawing.'.$key, $report->drawing) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('painting.'.$key)) ? 'has-error' : ''}}">
                                                <label for="painting">Painting
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('painting.'.$key)}}</span></span>
                                                </label>
                                                <input name="painting[]" class="form-control" id="painting" type="number" min="0" max="5"
                                                       placeholder="painting" value="{{ old('painting.'.$key, $report->painting) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('sculpture.'.$key)) ? 'has-error' : ''}}">
                                                <label for="sculpture">Sculpture
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('sculpture.'.$key)}}</span></span>
                                                </label>
                                                <input name="sculpture[]" class="form-control" id="sculpture" type="number" min="0" max="5"
                                                       placeholder="sculpture" value="{{ old('sculpture.'.$key, $report->sculpture) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('relationship_with_others.'.$key)) ? 'has-error' : ''}}">
                                                <label for="relationship_with_others">Relationship with others
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('relationship_with_others.'.$key)}}</span></span>
                                                </label>
                                                <input name="relationship_with_others[]" class="form-control" id="relationship_with_others" type="number" min="0" max="5"
                                                       placeholder="relationship_with_others" value="{{ old('relationship_with_others.'.$key, $report->relationship_with_others) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{($errors->has('participation_in_school_arts.'.$key)) ? 'has-error' : ''}}">
                                                <label for="participation_in_school_arts"> Participation in arts
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('participation_in_school_arts.'.$key)}}</span></span>
                                                </label>
                                                <input name="participation_in_school_arts[]" class="form-control" id="participation_in_school_arts" type="number" min="0" max="5"
                                                       placeholder="participation_in_school_arts" value="{{ old('participation_in_school_arts.'.$key, $report->participation_in_school_arts) }}">
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


