<?php

namespace App\Http\Controllers\Admin;

//use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;



use App\Model\Admin\Category;
use App\Model\Admin\CategoryPath;
use DB;
use Auth;

class CategoryController extends Controller
{

  
    public function showCategory(){
        $data['categories']=Category::getCategory();

             // echo "<pre>";
             // print_r($data['categories']);
             // exit;

         return view('admin.category.list',$data);    
    }


    public function CreateCategory(Request $request){

            
            
            $data['categories']=Category::getCategory();
            
            
             if ($request->isMethod('post')) { 


               

               $errors      = false;
               $errorMsg    = array();
         
         
         $name = $request->input('name');
         $image = $request->file('image');
         $description = $request->input('description');
         $meta_title = $request->input('meta_title');
         $meta_description = $request->input('meta_description');
         $seo_url = $request->input('seo_url');
         $sort_order = $request->input('sort_order');
         $status = $request->input('status');
		 $parent_id = $request->input('parent_id');
         $show_on_header = $request->input('show_on_header');
         
         
             $applicantMainInfo = array(
                'Name' => $name,
                 'File' => $image,
                'Description' => $description,
                 'MetaTitle' => $meta_title,
                'MetaDescription' => $meta_description,
                'SeoUrl' => $seo_url,
                'Status' => $status,

            );





                $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'Name' =>  'required|string|min:2|max:200',
                //'File'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'Description' => 'required',
                'MetaTitle' => 'required',
                'MetaDescription' => 'required',
                 'SeoUrl'=>         'unique:category,seo_url|required|alpha-dash', 
                                    
                 
                   ));


      if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


              
                $appInfoErrorMsg='';
                 if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
                    session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('CategoryCreateErrors', $appInfoErrorMsg);

            }
           
            else {




               
               if( $request->hasFile('image')){ 
                    $image = $request->file('image'); 


                    $image_path=$this->image_upload($image);
                                
                   
                 
      
                }else
				{
					$image_path='';
				}




                   $categories= Category::create(array('name'=>$name,
                         'created_by'=>Auth::user()->id,
                         'parent_id'=>$parent_id,
						 'image'=>$image_path,
                         "description"=>$description,
                         "meta_title"=>$meta_title,
                         "meta_description"=>$meta_description,
                         'seo_url'=>$seo_url,
                         "sort_order"=>$sort_order,
                         "show_on_header" => $show_on_header,
                         "status"=>$status
                         
                       
                          ));







                      


                    if($categories->id){
                            $level = 0;
                            $category_paths=CategoryPath::where('category_id',$request->parent_id)->orderBy('level', 'ASC')->get();
                            foreach ($category_paths as $key => $category) {
                                $insert_cat_path=[
                                    'category_id'=>$categories->id,
                                    'path_id'=>$category->path_id,
                                    'category_name'=>$category->category_name,
                                    'level'=>$level,
                                ];

                                $cat_path1=CategoryPath::create($insert_cat_path);
                                $level++;
                            }

                            $insert_cat_path1=[
                                    'category_id'=>$categories->id,
                                    'path_id'=>$categories->id,
                                    'category_name'=>$categories['name'],
                                    'level'=>$level,
                                ];

                                $cat_path2=CategoryPath::create($insert_cat_path1);
                    }

                  }
                  
                  
			
               
              return redirect()->route('admin.category.list')->with('success', 'Category Created!');

              }else{

                
                return view('admin.category.create',$data);         
              }

        
    }

   public function editCategory(Request $request,$id){
        $data['categories']=Category::getCategory();
        $data['category_data']=Category::find($id);
       
		
		
		/*echo '<pre>';
		print_r($data['category_data']->image);
		exit;*/



        if ($request->isMethod('post')) { 

          
			         $errors      = false;
               $errorMsg    = array();
			   
			   
			   $name = $request->input('name');
			   $description = $request->input('description');
			   $meta_title = $request->input('meta_title');
			   $meta_description = $request->input('meta_description');
			   $seo_url = $request->input('seo_url');
			   $sort_order = $request->input('sort_order');
			   $status = $request->input('status');
			   $parent_id = $request->input('parent_id');
			   $show_on_header = $request->input('show_on_header');
			   


                 
                      if( $request->hasFile('image')){ 
                    $image = $request->file('image'); 

request()->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
                        

                    $image_path=$this->image_upload($image);



                                
                   
   
                }else{
                    
                $image_path=$data['category_data']->image;
                }
              




			   
			   $applicantMainInfo = array(
                'Name' => $name,
                'Description' => $description,
                'MetaTitle' => $meta_title,
                'MetaDescription' => $meta_description,
                'SeoUrl' => $seo_url,
               // 'Status' => $status

            );
			
			
			
			$appInfoValidate =  Validator::make($applicantMainInfo, array(

                'Name' =>    'required|string|min:2|max:200',
                'Description' => 'required',
                'MetaTitle' => 'required',
                'MetaDescription'  =>  'required',
                'SeoUrl' => 'required|alpha_dash|unique:category,seo_url,'.$data['category_data']->id,
              
               
            )); 
			
			
			
			
			if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


              
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
                    session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('CategoryeditErrors', $appInfoErrorMsg);

            }
           
            else {
			               
			 

				$data['category_data']->name = $name;
				$data['category_data']->parent_id =$parent_id;
				$data['category_data']->image = $image_path;
				$data['category_data']->description = $description;
				$data['category_data']->meta_title = $meta_title;
				$data['category_data']->meta_description = $meta_description;
				$data['category_data']->seo_url = $seo_url;
				$data['category_data']->sort_order = $sort_order;
                $data['category_data']->show_on_header = $show_on_header;
				$data['category_data']->status = $status;


        
				
				$data['category_data']->save();
				
				// added for edit category name
				$checkPath=CategoryPath::where('path_id',$id)->first();
				
				$change="Update category_path SET category_name = '" .$name . "' where level='" .$checkPath->level . "' and path_id = '" .$id . "' ";
				
				$ddd=DB::select( DB::raw($change));
				// end of code
		

                $category_paths=CategoryPath::where('path_id',$id)->orderBy('level', 'ASC')->get();
				
                 if(count($category_paths)>0){
                    foreach ($category_paths as $category_path) {
                        CategoryPath::where('category_id',$id)->where('level','<',$category_path->level)->delete();
                        $path = array();
                        $cat_paths=CategoryPath::where('category_id',$data['category_data']['parent_id'])->orderBy('level', 'ASC')->get();
                        
						
						foreach ($cat_paths as $key => $cat_path) {
                            $path[]=[
                                'path_id'=>$cat_path->path_id,
                               'category_name'=>$cat_path->category_name,
							   							   
                            ];
                        }

                        $cat_paths1=CategoryPath::where('category_id',$category_path['category_id'])->orderBy('level', 'ASC')->get();
                       

						

					   foreach ($cat_paths1 as $key => $cat_path1) {
                            
							$path[]=[
                              'path_id'=>$cat_path1->path_id,
                              'category_name'=>$cat_path1->category_name,
							  
							 
                            ];
                        }

                        $level = 0;
                        foreach ($path as $paths) {
                            
                            $sql="REPLACE INTO category_path SET category_id = '" . (int)$category_path['category_id'] . "', path_id = '" . (int)$paths['path_id'] . "', category_name='".$paths['category_name']."',level = '" . (int)$level . "', created_at=NOW(),updated_at=NOW() ";
                          
							$categorydb=DB::select( DB::raw($sql));
                            $level++;
                        }
						
							
                    }
					
					

                }else{
					
					
					
                     CategoryPath::where('category_id',$id)->delete();
                     $level = 0;
                     $cat_paths=CategoryPath::where('category_id',$data['category_data']['parent_id'])->orderBy('level', 'ASC')->get();
                    foreach ($cat_paths as $key => $cat_path) {
                        $insert_cat_path1=[
                                    'category_id'=>$id,
                                    'path_id'=>$cat_path['path_id'],
                                    'category_name'=>$cat_path['category_name'],
                                    'level'=>$level,
                                ];

                                $cat_path2=CategoryPath::create($insert_cat_path1);

                                $level++;
                    }
                    $sql="REPLACE INTO category_path SET category_id = '" . (int)$id . "', path_id = '" . (int)$id . "', category_name='".$data['category_data']['name']."', level = '" . (int)$level . "', created_at=NOW(), updated_at=NOW()";
                            $categorydb=DB::select( DB::raw($sql));
                            $level++;

                }


                 
                return redirect()->route('admin.category.list')->with('success', 'Successfully Updated!');
			}

        }else{
            return view('admin.category.edit',$data); 
        }


    }

      public  function deleteCategory($id){

           
		   if($id==1 || $id==2)
		   {
			   return redirect()->back()->with('error', 'Root Category deletion not allowed!');
			   
		   }else
		   {
            $catData=Category::find($id);
		    
		

		   $productExist=ProductToCategory::where('category_id','=',$id)->get();
		   if($productExist)
		   {
			   return redirect()->back()->with('error', 'Sorry!, Product are associated with this category!');
		   }
		   
		   Category::where('id',$id)->delete();
           CategoryPath::where('category_id',$id)->delete();

          

           return redirect()->back()->with('success', 'Successfully Deleted!');
		   }
		  
		   
		   return redirect()->back()->with('error', 'Sorry!, Working on it!');

            }    




 public function image_upload($image){
       $name = time().'.'.$image->getClientOriginalExtension(); //get the  file extention
     

       $destinationPath = public_path('/category-image'); //public path folder dir
       $sucess=$image->move($destinationPath, $name);  //mve to destination you mentioned 
      if ($sucess) {
            return 'category-image/'.$name;
        }

        return NULL;

    }

}