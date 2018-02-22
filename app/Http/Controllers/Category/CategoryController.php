<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\Html\Builder;

class CategoryController extends Controller
{
    protected $htmlBuilder;
	function __construct(Builder $htmlBuilder){
        $this->htmlBuilder = $htmlBuilder;
	}

    function create(){
        $category = new Category();
        return view('category.create',compact('category'));
     }

	function index(){
        if (request()->ajax()) {
            return DataTables::of(Category::select(['id','name','des']))
                ->editColumn('des',function($prod){
                    return mb_substr(strip_tags($prod->des),0,200,'UTF-8');
                })
                ->addColumn('action', function ($data) {
                    $str='<a href="'.route('category.view',$data->id).'" class="btn btn-primary">View</a> ';
                    $str.='<a href="'.route('category.edit',$data->id).'" class="btn btn-warning">Edit</a> ';
                    $str.='<a class="btn btn-danger delete" data-name="'.$data->id.'">Delete</a>';
                    return $str;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $urlbase=asset('');
        $html = $this->htmlBuilder->columns([
                ['data' => 'name','name'=>'name','title'=>'Name', 'footer' => 'Name'],
                ['data' => 'des','name'=>'des','title'=>'Description', 'footer' => 'Description'],
                ['data'=>'action','name'=>'action','title'=>'Action','width'=>'200px']
            ]);
        return view('category.index',compact('html'));
	}

    function view($id){
    	$category=Category::find($id);
       	return view('category.view')->with(['category'=>$category]);
    }

    function store(StoreCategory $request){
        $arr=$request->all();
        $product=Category::create($arr);
        if($product){
            return redirect(route('category.index'));
        }else {
            return redirect()->back()->withErrors()->withInput();
        }
    }

    function edit($id){
        $category = Category::find($id);
        if($category){
            return view('category.edit',compact('category'));
        }else{
            return redirect()->back()->withErrors(['msg'=>'This category does not found.']);
        }
        
    }

    function update(StoreCategory $request,$id){
        $category = Category::find($id);
        if($category){
            $category->name=$request->get('name');
            $category->des=$request->get('des');
        }
        if($category){
            $category->save();
            return redirect(route('category.index'));
        }else {
            return redirect()->back()->withErrors()->withInput();
        }
    }

    function delete(Request $request){
        $id = $request->get('id');
        $cate=false;
        if($id){
            if(Category::find($id)){
                Category::find($id)->delete();
                return json_encode("success");
            }
        }
        return false;
    }

}
