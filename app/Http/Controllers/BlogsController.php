<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class BlogsController extends Controller
{
    public function index(){

      //$blogs = Blog::latest()->get();
      $blogs = Blog::where('status', 1)->latest()->get();
      return view('blogs.index', compact('blogs'));

    }

    public function create(){
      $categories = Category::latest()->get();
      return view('blogs.create', compact('categories'));
    }

    public function store(Request $request){
    
      $input = $request->all();
      $input['slug'] = str_slug($request->title);
      $input['meta_title'] = str_limit($request->title, 55);
      $input['meta_description'] = str_limit($request->body, 140);

      // check for image
      if( $file = $request->file('featured_image') ){
        $name = uniqid() . $file->getClientOriginalName('featured_image');
        $file->move('images/featured_image/', $name);
        $input['featured_image'] = $name;
      }

      $blog = Blog::create($input);

      // sync with categories
      if ($request->category_id){
          $blog->category()->sync($request->category_id);
      }
      return redirect('/blogs');
    }

    public function show($id){
      $blog = Blog::findOrFail($id);
      return view('blogs.show', compact('blog'));
    }

    public function edit($id){
      $categories = Category::latest()->get();
      $blog = Blog::findOrFail($id);

      $fc = array();
      foreach ($blog->category as $c){
        //var_dump($c->id);
        $fc[] = $c->id ;
        
      }

      //var_dump('cat '.$categories);
      $filtered = array_except($categories, $fc);
      //$nuFilter = array_diff($ac,$fc);
      //dd( $filtered );
      //$myobject = $this->arrayToObject($nuFilter);
      return view('blogs.edit', ['blog' => $blog, 'categories' => $categories, 'filtered' => $filtered]);
    }

    public function update(Request $request, $id){
      //dd($request->all());
      $input = $request->all();
      $blog = Blog::findOrFail($id);
      $blog->update($input);
      // sync with categories
      if ($request->category_id){
          $blog->category()->sync($request->category_id);
      }
      return redirect('/blogs');
    }

    public function delete(Request $request, $id){
      $blog = Blog::findOrFail($id);
      $blog->delete();
      return redirect('/blogs');
    }

    public function trash(){
      $trashedBlogs = Blog::onlyTrashed()->get();
      return view('blogs.trash', compact('trashedBlogs'));
    }

    public function restore($id){
      $restoredBlog = Blog::onlyTrashed()->findOrFail($id);
      $restoredBlog->restore($restoredBlog);
      return redirect('blogs');
    }

    public function permanentDelete($id){
      $permanentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
      $permanentDeleteBlog->forceDelete($permanentDeleteBlog);
      return back();
    }


    public function array_to_obj($array, &$obj)
  {
    foreach ($array as $key => $value)
    {
      if (is_array($value))
      {
      $obj->$key = new stdClass();
      array_to_obj($value, $obj->$key);
      }
      else
      {
        $obj->$key = $value;
      }
    }
  return $obj;
  }

public function arrayToObject($array)
{
 $object= new stdClass();
 return array_to_obj($array,$object);
}


}
