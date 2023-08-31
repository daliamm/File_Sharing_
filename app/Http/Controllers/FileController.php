<?php
namespace App\Http\Controllers;
use App\Events\FileDownloaded;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class FileController extends Controller
{

    public function index()
    {
        $files = File::orderBy('name', 'DESC')->get();
        // foreach ($files as $file) {
        //     $file->download_count = $file->downloads()->count();
        // }
        return view('index', compact('files'));

    }

    public function upload()
    {
        return view('upload');

    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|file', 
        ]);

        if ($validator->fails()) {
            Toastr::error($validator->errors()->first()); 
            return redirect()->back();
        }

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $path = $file->store('uploads');

        File::create([
            'name' => $filename,
            'extension' => $extension,
            'path' => $path,
            'download_link' => Str::random(16),
        ]);

        Toastr::success('File Uploaded Successfully'); 
        return redirect()->route('home');
    }

    public function download($link)
    {
        $file = File::where('download_link', $link)->firstOrFail();
        $filePath = Storage::path($file->path);
       //$file->increment('download_count'); 
        event(new FileDownloaded($file));
       
        return response()->download($filePath, $file->name);
    }
    // public function Count($file){
    //     $file->downloads()->increment();
    // }
    public function delete($id)
    {
        $file = File::where('download_link', $id)->firstOrFail();;
        Storage::delete($file->path);
        $file->delete();

        Toastr::success('File Deleted Successfully');
        return redirect()->route('home');
    }
}