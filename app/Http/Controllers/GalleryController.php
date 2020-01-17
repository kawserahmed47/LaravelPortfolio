<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;

class GalleryController extends Controller
{
    private $table= 'galleries';
    //List Gallery
    public function index(){
        
       $galleries = DB::table('galleries')->get();
    
       return view('gallery/index', compact('galleries'));
    }
    
    
    //Show Create Form
    public function create(){
        if(!Auth::check()){
            return \Redirect::route('gallery.index');
        }
         return view('gallery/create');
    }
    
    //Store Gallery
    
    public function store(Request $request){
         $name=$request->input('name');
         $descripton=$request->input('description');
         $cover_image =$request->file('cover_image');
         $owner_id=1;
         
         if($cover_image){
             $cover_image_filename = $cover_image->getClientOriginalName();
             $cover_image->move(public_path('images'), $cover_image_filename);
             
         }
         else{
             $cover_image_filename="noimage.jpg";
         }
         
         $data = array('name'=>$name, 'description'=>$descripton, 'cover_image'=>$cover_image_filename, "owner_id"=>$owner_id);
         
         DB::table('galleries')->insert($data);
         
         
         //Set Message
         \Session::flash('message','Gallery Created');
         //Redirect
         return \Redirect::route('gallery.index');
        
        
        
    }
    //Show Gallery Photo
    public function show($id){
          $galleries = DB::table('galleries')->where('id', $id)->first();
          $photos= DB::table('photos')->where('gallery_id', $id)->get();
    
       return view('gallery/show', compact('galleries','photos'));
        
    }
    
    
    
}
