<?php

namespace App\Services;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class UploadHandler {
    public function save(FormRequest $request, $nameOnRequest, $dbFieldName, $saveFileNameAs, $dimension = ['width' => null, 'height' => null]){
        try{
            if ($request->has($nameOnRequest)){
                $photo = $request->file($nameOnRequest);
                if(!Storage::exists('school-'.$request->school_id)){
                    Storage::makeDirectory('public/school-'.auth()->user()->school->id, 0755, true, true);
                }
                //$photos = Image::make($photo->getRealPath())->resize($dimension['width'] ? $dimension['width'] : getimagesize($photo)[0], $dimension['height'] ? $dimension['height'] : getimagesize($photo)[1]);
                $photos = $this->resizeImage(Image::make($photo->getRealPath()), $dimension['width'] ? $dimension['width'] : getimagesize($photo)[0]);
                $doc = time().Str::slug($request->{$saveFileNameAs}) . '.' . $photo->getClientOriginalExtension();
                $request->merge([$dbFieldName => 'school-'.auth()->user()->school->id.'/'.$doc]);
                $photos->save(storage_path('app/public/school-'.auth()->user()->school->id.'/'.$doc));
                return $request;
            }
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Oops something went wrong!');
        }

    }

    public function remove($file){
        try{
            Storage::disk('public')->delete($file);
            return true;
        }catch(\Exception $e){
            return false;
        }

    }
    protected function resizeImage($image, $requiredSize) {
        $width = $image->width();
        $height = $image->height();

        // Check if image resize is required or not
        if ($requiredSize >= $width && $requiredSize >= $height) return $image;

        $newWidth = 0;
        $newHeight = 0;

        $aspectRatio = $width/$height;
        if ($aspectRatio >= 1.0) {
            $newWidth = $requiredSize;
            $newHeight = $requiredSize / $aspectRatio;
        } else {
            $newWidth = $requiredSize * $aspectRatio;
            $newHeight = $requiredSize;
        }


        $image->resize($newWidth, $newHeight);
        return $image;
    }
}
