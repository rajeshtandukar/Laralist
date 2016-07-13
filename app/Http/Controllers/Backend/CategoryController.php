<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use App\Http\Controllers\Controller;

use App\Category;
use DB;
use PDO;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class CategoryController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	$Category = new Category;
        $allCategories = $Category->getCategories();  

        return view('backend.categories.categories', compact('allCategories'));
    }

    public function create(){        
        
        $rootCategories = Category::where('parent_id',0)->get();              
        return view('backend.categories.create', compact('rootCategories'));
    }

    public function store( CategoryRequest $request ){

        $category = new Category;
        $category->title = $request['title'];
        if( empty( $request['alias']) ) {
          $request['alias'] = $request['title'];  
        }
        $category->alias = str_slug($request['alias']);
        $category->parent_id = $request['parent_id'];    
        $category->published = $request['published'];

        $image = $request->file('logo');
        $filename=null;
         if($image->isValid()){
            $extension = $image->getClientOriginalExtension();
            $uploadPath = public_path(). '/uploads';
            $filename = rand(111,999). '.'. $extension;
            $image->move($uploadPath, $filename);   
        }
        $category->logo = $filename;
        
         if($category->save())
            $request->session()->flash('alert-success','Category added successfully.');
        else
            $request->session()->flash('alert-error','Can not add category now. Plese tyr again!!.');

        return redirect()->route('admin.categories');
       
    }

    public function edit( $id ){
        $category =Category::find($id);
        $rootCategories = Category::where('parent_id',0)->get();        
       
        return view('backend.categories.edit', compact('category','rootCategories'));
    }

    public function update( CategoryRequest $request){
        
        $category = Category::find( $request['id'] );

        $category->title = $request['title'];
        if( empty( $request['alias']) ) {
          $request['alias'] = $request['title'];  
        }
        $category->alias = str_slug($request['alias']);     
        $category->parent_id = $request['parent_id'];
        $category->published = $request['published'];

        $filename=null;

        $image = $request->file('logo');
        
        if($request->hasFile('logo'))
        {
            if($image->isValid()){
                $extension = $image->getClientOriginalExtension();
                $uploadPath = public_path(). '/uploads/';
                $filename = rand(111,999). '.'. $extension;
                $image->move($uploadPath, $filename);   
            }
        }

        $category->logo = $filename? $filename: $category->logo;
       
        if($category->save())
            $request->session()->flash('alert-success','Category saved successfully.');
        else
            $request->session()->flash('alert-error','Can not save category now. Plese tyr again!!.');

        return redirect()->route('admin.categories');
    }


    public function get_options($category, $parent=0, $indent=""){
       $return = array();
        foreach($category as $key => $val) {
            if($val->parent_id == $parent) {
                $val->title = $indent.$val->title;
                $return[] = $val;
                $return = array_merge($return, $this->get_options($category, $val->id, $indent."&nbsp;&nbsp;&nbsp;|--"));
            }
        }

        

        return $return;

    }

    public function publish(Request $request){

        Category::whereIn('id',$request['id'])->update(['published' => 1]);
        $count = count($request['id']);
        $message =  $count . ( ($count > 1)? ' Categories Published':' Category Published');
        $request->session()->flash('alert-success', $message); 
        return redirect()->route('admin.categories');
    }

    public function unpublish(Request $request){
     
        Category::whereIn('id',$request['id'])->update(['published' => 0]);
        $count = count($request['id']);
        $message =  $count . ( ($count > 1)? ' Categories Unpublished':' Category Unpublished');
        $request->session()->flash('alert-success', $message);               
        return redirect()->route('admin.categories');
    }

    public function destroy(Request $request){
      
      $categories_id = $request['id'];
      
       DB::setFetchMode(PDO::FETCH_ASSOC);

        $categories = DB::table('categories') 
            ->select('id')             
            ->whereIn('id',$categories_id )
            ->orWhere(function ($query) use ( $categories_id ) {
                $query->whereIn('parent_id', $categories_id);                      
            })->get();
        
        DB::setFetchMode(PDO::FETCH_CLASS);
        
        Category::find($categories)->each(function ($cat, $key) {
            $cat->delete();
        });

         $count = count($countries_id);
        $message =  $count . ( ($count > 1)? ' Categories deleted':' Category deleted');

        $request->session()->flash('alert-success',$message);

        return redirect()->route('admin.categories');

    }
   
}