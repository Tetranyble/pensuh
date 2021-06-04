@extends('dashboard.layouts.dashboard')
@section('title', 'Attendance')
@section('dashboard')

    <div class="container-fluid">
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <form method="POST" action="{{ route('attendances.automatic') }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="offset-lg-4 offset-md-3 col-lg-3 col-md-6">
                                        <div class="form-group {{($errors->has('attendance_type_id')) ? 'has-error' : ''}}">
                                            <label for="attendance_type_id">Attendance Type
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('attendance_type_id')}}</span></span>
                                            </label>
                                            <select name="attendance_type_id" class="form-control" id="attendance_type_id" type="text">
                                                <option value="">Select Attendance Type</option>
                                                @forelse($attendanceTypes as $attendance)
                                                    <option value="{{ $attendance->id }}">{{ $attendance->name }}</option>
                                                @empty
                                                    <option value="">No Attendance Data</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="offset-lg-4 offset-md-3 col-lg-3 col-md-6">
                                        <div id="qr-reader"></div>
                                        <div id="qr-reader-results"></div>/
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')

    <script src="{{ asset('js/scanner.min.js') }}"></script>
    <script>
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete"
                || document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        docReady(function () {
            var resultContainer = document.getElementById('qr-reader-results');
            var lastResult, countResults = 0;
            function onScanSuccess(qrCodeMessage) {
                if (qrCodeMessage !== lastResult) {
                    ++countResults;
                    lastResult = qrCodeMessage;
                    resultContainer.innerHTML
                        += `<div>[${countResults}] - ${qrCodeMessage}</div>`;
                }
            }
            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>
    @parent
@endsection

