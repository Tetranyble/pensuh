@extends('dashboard.layouts.dashboard')
@section('title', 'Fees')
@section('dashboard')

    <div class="container-fluid">
        @include('components.flash-message')
        <ul>
            @foreach($errors->all() as $message)
                <li class="text-danger">{{ $message }}</li>
            @endforeach
        </ul>
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Payable Fees</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Name </small></th>
                                    <th><small>Amount
                                            @canany(['student', 'parent'])
                                            <span class="btn-outline-warning">Bank Charge</span>
                                            @endcanany
                                        </small>
                                    </th>
                                    <th><small>School Type</small></th>
                                    <th><small>Description</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($fees as $key => $fee)
                                    <tr>
                                        <td><small>{{ $key+1 }}</small></td>
                                        <td>{{ $fee->name }}</td>
                                        <td>{{ money($fee->amount,'') }}
                                            @canany(['student', 'parent'])
                                            <span class="btn btn-sm btn-outline-warning">{{ money(payStackCharge($fee->toArray()['amount']), '') }}</span>
                                            @endcanany
                                        </td>
                                        <td>{{ $fee->school_type_id ? $fee->schoolType->name : 'General Fee' }}</td>
                                        <td>{{ $fee->description }}</td>

                                        <td>
                                            @canany(['admin', 'principal', 'vice_principal_admin', 'vice_principal_academy', 'bursar'])
                                            <small><a title="edit {{ $fee->name }}" class="btn btn-sm btn-outline-warning" href="{{ route('fees.edit', $fee) }}"><i class="fa fa-edit"></i> Update</a></small>
                                            <small><a title="delete {{ $fee->name }}" disabled="disabled" onclick="return false" class="btn btn-sm btn-outline-danger" href="{{ route('fees.destroy', $fee) }}"><i class="fa fa-trash"></i> Destroy</a></small>
                                            @else
                                                <small><a title="delete {{ $fee->name }}" disabled="disabled"
                                                          onclick="payWithPaystack(this)" class="btn btn-sm btn-outline-success"
                                                    data-payment="{{ json_encode(['record' => $fee->toArray(), 'amount' => ($fee->amount + payStackCharge($fee->amount)) * 100 ])}}"><i class="fa fa-credit-card"></i> Pay Now </a></small>
                                            @endcanany
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No data</td>
                                        <td>No data</td>
                                        <td>No data</td>
                                        <td>No data</td>
                                        <td>No data</td>
                                        <td>No data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Name</small></th>
                                    <th><small>Amount
                                            @canany(['student', 'parent'])
                                            <span class="btn-outline-warning">Bank Charge</span>
                                            @endcanany
                                        </small></th>
                                    <th><small>School Type</small></th>
                                    <th><small>Description</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        @canany(['student', 'parent'])
                        <div class="form-actions">
                            <div class="text-right">
                                <button onclick="payWithPaystack(this)" data-payment="{{ json_encode(['record' =>$fees->toArray()['data'], 'sum' => payable($fees)*100]) }}"
                                        type="submit" class="btn btn-info">Pay All <span class="btn btn-sm btn-outline-warning"> {{ money(payable($fees), '') }}</span></button>
                            </div>
                        </div>
                        @endcanany
                        {{ $fees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function payWithPaystack(data){
            var data = $(data).data('payment')
            var handler = PaystackPop.setup({
                key: '{{ auth()->user()->school->public_key }}',
                email: '{{ auth()->user()->email }}',
                amount: Array.isArray(data.record) ? data.sum : data.amount,
                currency: "NGN",
                metadata: {
                    items: [
                        data.record
                    ]
                },
                callback: function(response){
                    $.ajax({
                        url: "{{ route('transactions.create') }}",
                        type: "GET",
                        data: {
                            "trxref": response.reference
                            // "_token": '',
                        },
                        beforeSend: function() {

                            toastr.info('Hang-on', 'Transaction is being verified.')
                        },
                        // return the result
                        success: function(r) {
                            toastr.success(r.status, r.message)
                        },
                        complete: function(r) {
                        },
                        error: function(jqXHR, testStatus, error) {
                            toastr.error('Error', error)
                        },
                        timeout: 8000
                    })
                },
                onClose: function(){
                    alert('you\'ve cancelled this transaction?');
                }
            });
            handler.openIframe();
        }
    </script>
    @parent
@endsection

