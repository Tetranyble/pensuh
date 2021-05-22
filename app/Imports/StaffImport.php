<?php

namespace App\Imports;

use App\TeacherQualification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StaffImport implements ToCollection, WithHeadingRow, WithChunkReading, ShouldQueue
{
    /**
     * @param Collection $rows
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $request) {
            $request['firstname'] = Str::ucfirst($request['firstname']);
            DB::transaction(function () use($request){
                $user = new User();
                $request['username'] = Str::slug(trim($request['firstname'])).'.'. Str::slug(trim($request['lastname']));
                $user->fill($request->all())->save();
                $request['user_id'] = $user->id;
                $staff = new TeacherQualification();
                $staff->fill($request->all())->save();
                $user->assignRole($request['role']);
            });
        }
    }

    public function chunkSize(): int
    {
        return 50;
    }
}
