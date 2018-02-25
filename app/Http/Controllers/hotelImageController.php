<?php
namespace App\Http\Controllers;
use App\Traits\ManagesImages;
use App\Http\Requests\CreateImageRequest;
use App\HotelImage;
use App\Http\Requests\EditImageRequest;
use App\Traits\ShowImages;
use File;
class hotelImageController extends Controller
{
    use ManagesImages;
    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('admin');
        $this->setImageDefaultsFromConfig('HotelImage');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel_id = \Auth::user()->hotel->id;
        $thumbnailPath = $this->thumbnailPath;
        $hotelImages = HotelImage::where('hotel_id',$hotel_id)->paginate(10);
        return view('image.index', compact('hotelImages', 'thumbnailPath'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateImageRequest $request)
    {
        $hotel_id = \Auth::user()->hotel->id;
        //create new instance of model to save from form
        $hotelImage = new HotelImage([
            //'image_name'        => $request->get('image_name'),
            'hotel_id'          => $hotel_id,
            'image_name'        => $hotel_id.'_'.time(),
            'image_extension'   => $request->file('image')->getClientOriginalExtension(),
            ]);
        // save model
        $hotelImage->save();
        // get instance of file
        $file = $this->getUploadedFile();
        // pass in the file and the model
        $this->saveImageFiles($file, $hotelImage);
        //alert()->success('Congrats!', 'Your Image And Thumbnail Created!');
        return redirect()->route('image.show', [$hotelImage]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotelImage = HotelImage::findOrFail($id);
        $thumbnailPath = $this->thumbnailPath;
        $imagePath = $this->imagePath;
        return view('image.show', compact('hotelImage', 'thumbnailPath', 'imagePath'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotelImage = HotelImage::findOrFail($id);
        $thumbnailPath = $this->thumbnailPath;
        return view('image.edit', compact('hotelImage', 'thumbnailPath'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, EditImageRequest $request)
    {
        $hotelImage = HotelImage::findOrFail($id);
        // if file, we have additional requirements before saving
        if ($this->newFileIsUploaded()) {
            $this->deleteExistingImages($hotelImage);
            $this->setNewFileExtension($request, $hotelImage);
        }
        $hotelImage->save();
        // check for file, if new file, overwrite existing file
        if ($this->newFileIsUploaded()){
            $file = $this->getUploadedFile();
            $this->saveImageFiles($file, $hotelImage);
        }
        $thumbnailPath = $this->thumbnailPath;
        $imagePath = $this->imagePath;
        //alert()->success('Congrats!', 'image edited!');
        return view('image.show', compact('hotelImage', 'thumbnailPath', 'imagePath'));
    }
    /**$id = \Auth::id();
      $hotel = Hotel::where('user_id', $id)->get()->first();
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotelImage = HotelImage::findOrFail($id);
        $this->deleteExistingImages($hotelImage);
        HotelImage::destroy($id);
        //alert()->error('Notice', 'image deleted!');
        return redirect()->route('image.index');
    }
    /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */
    private function setNewFileExtension(EditImageRequest $request, $hotelImage)
    {
        $hotelImage->image_extension = $request->file('image')->getClientOriginalExtension();
    }
    /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */
    Private function deleteImage($modelImage, $destination)
    {
        File::delete(public_path($destination) .
            $modelImage->image_name . '.' .
            $modelImage->image_extension);
    }
    Private function deleteThumbnail($modelImage, $destination)
    {
        File::delete(public_path($destination).$this->thumbPrefix.$modelImage->image_name.'.'.$modelImage->image_extension);
    }
}