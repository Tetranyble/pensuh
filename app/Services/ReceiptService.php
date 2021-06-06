<?php

namespace App\Services;

use App\Receipt;

class ReceiptService {
    public function create($response){
        Receipt::create([
            'student_id' => auth()->user()->id,
            'paid_by_id' => auth()->user()->id,
            'school_id' => $response->school_id,
            'transaction_id' => $response->id,
            'data' => $response->metadata
        ]);
    }

    public function getWithPagination()
    {
        return Receipt::whereStudentId(auth()->user()->id)->paginate(20);
    }

}
