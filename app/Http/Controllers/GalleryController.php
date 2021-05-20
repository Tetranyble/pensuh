<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Services\UploadHandler;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\throwException;

class GalleryController extends Controller
{
    protected $fileService;
    public function __construct( UploadHandler $fileService)
    {
        $this->fileService = $fileService;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $galleries = Gallery::whereSchoolId(auth()->user()->school->id)->latest()->paginate(20);
        return view('dashboard.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(StoreGalleryRequest $request)
    {
        $this->fileService->save($request,'photo_x','photo','name');
        Gallery::create($request->all());
        return back()->with('success', 'uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return Response
     */
    public function edit(Gallery $gallery)
    {
        return view('dashboard.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreGalleryRequest $request
     * @param \App\Gallery $gallery
     * @return Response
     */
    public function update(StoreGalleryRequest $request, Gallery $gallery)
    {
        $this->fileService->save($request,'photo_x','photo','name');
        $this->fileService->remove($gallery->photo);
        $gallery->fill($request->all())->save();
        return redirect()->route('galleries.index')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Gallery $gallery
     * @return void
     * @throws Exception
     */
    public function destroy(Gallery $gallery)
    {
        $this->fileService->remove($gallery->photo);
        $gallery->delete();
        return back()->with('success', 'deleted successfully');
    }
}
