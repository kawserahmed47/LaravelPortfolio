<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PhotoController extends Controller
{
    private $table='photos';
    //
     //Show Create Form
    public function create($gallery_id){
        if(!Auth::check()){
            return \Redirect::route('gallery.index');
        }
         return view('photo/create', compact('gallery_id'));
    }
    
    //Store Gallery
    
    public function store(Request $request){
         $gallery_id=$request->input('gallery_id');
         $title=$request->input('title');
         $descripton=$request->input('description');
         $location=$request->input('location');
         $image =$request->file('image');
         $owner_id=1;
         
         if($image){
             $image_filename = $image->getClientOriginalName();
             $image->move(public_path('images'), $image_filename);
             
         }
         else{
             $image_filename="noimage.jpg";
         }
         
         $data = array('gallery_id'=>$gallery_id, 'title'=>$title, 'description'=>$descripton,'location'=>$location, 'image'=>$image_filename, "owner_id"=>$owner_id);
         
         DB::table('photos')->insert($data);
         
         
         //Set Message
         \Session::flash('message','Portfolio Added');
         //Redirect
         return \Redirect::route('gallery.show', array('id'=>$gallery_id));
        
        
    }
    //Show details
    public function details($id){
     $photo= DB::table('photos')->where('id', $id)->first();
    
       return view('photo/details', compact('photo'));
        
    }
    
    public function destory($id, $gallery_id){
        $photo= DB::table('photos')->where('id', $id)->delete();
          \Session::flash('message','Poject Deleted');
         //Redirect
         return \Redirect::route('gallery.show', array('id'=>$gallery_id));
        
    }
    
    public function edit($id){
        $photo= DB::table('photos')->where('id', $id)->first();
    
       return view('photo/edit', compact('photo')); 
        
    }
    
    public function updatedata(Request $request){
        
         $id=           $request->input('id');
         $gallery_id=  $request->input('gallery_id');
         $title=        $request->input('title');
         $descripton=   $request->input('description');
         $location=     $request->input('location');
         $image =       $request->file('image');
         $owner_id=1;
         $data = array('gallery_id'=>$gallery_id, 'title'=>$title, 'description'=>$descripton,'location'=>$location,'image'=>$image, "owner_id"=>$owner_id);
          $data1 = array('gallery_id'=>$gallery_id, 'title'=>$title, 'description'=>$descripton,'location'=>$location, "owner_id"=>$owner_id);
         if($image){
             $image_filename = $image->getClientOriginalName();
             $image->move(public_path('images'), $image_filename);
             
             DB::table($this->table)->where('id',$id)->update(
                     $data
                     
                     
                     );
          
             
         }
         else{
             $image_filename="noimage.jpg";
               DB::table($this->table)->where('id',$id)->update(
                     $data1
                     
                     
                     );
         }
         
        
         
         
         //Set Message
         \Session::flash('message','Portfolio Updated');
         //Redirect
         return \Redirect::route('gallery.show', array('id'=>$gallery_id));
        
        
        
    }
    
    
}
