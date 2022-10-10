<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('contactForm');
    }
  
    /**
     * Write code on Method 
     *
     * @return response()
     */
    public function store(Request $request)
    {
        //$name = $request::file('file')->getClientOriginalName();
        $file = $request->file('file');
        $path = public_path('photos/');
	$file_name = date('mdYHis') . $file->getClientOriginalName();
	$file_name=str_replace(' ', '_', strtolower($file_name));
        $file_name=str_replace('(', '_', strtolower($file_name));
        $file_name=str_replace(')', '_', strtolower($file_name));
        $file->move($path, $file_name);
        $cv_url = url('photos') . "/" . $file_name;

	Log::info($cv_url);
        Contact::create([
            'jewelry_type'      => json_encode($request->jewelry_type),
            'describe'          => $request->describe,
            'file'         => $cv_url,
            'jewelry_category'  => json_encode($request->jewelry_category),
            'gems_category'     => json_encode($request->gems_category),
            'price'             => $request->price,
        ]);

        return response()->json([
            'message' => ' created',
            'status' => 200,
	    'success' => true,
	    'data'=> $cv_url,
        ]);
    }

}
