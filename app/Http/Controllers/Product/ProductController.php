<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\User;
use App\Model\Category;
use DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreProduct;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\Html\Builder;

class ProductController extends Controller
{
    protected $htmlBuilder;
	function __construct(Builder $htmlBuilder){
        $this->htmlBuilder = $htmlBuilder;
	}

    function create(){
        $product = new Product();
        $category=Category::all();
        $categories_selected=[];
        $categories=$category->pluck('name','id')->toArray();
        return view('product.create',compact('product','categories','categories_selected'));
     }

	function index(){
        if (request()->ajax()) {
            return DataTables::of(Product::select(['id','name','des','image']))
                ->addColumn('image', function ($data) {
                    return '<img src=" '.Storage::url($data->image).'" height="50px"/>';
                })
                ->editColumn('des',function($prod){
                    return mb_substr(strip_tags($prod->des),0,200,'UTF-8');
                })
                ->addColumn('action', function ($data) {
                    $str='<a href="'.route('product.view',$data->id).'" class="btn btn-primary">View</a> ';
                    $str.='<a href="'.route('product.edit',$data->id).'" class="btn btn-warning">Edit</a> ';
                    $str.='<a class="btn btn-danger delete" data-name="'.$data->id.'">Delete</a>';
                    return $str;
                })
                ->addColumn('category',function($data){
                    $str="";
                    foreach ($data->categories as $cate){
                        $str.="<div class='btn btn-warning btn-small'>".$cate->name.'</div>';
                    }
                    return $str;
                })
                ->rawColumns(['image','category','action'])
                ->make(true);
        }

        $urlbase=asset('');
        $html = $this->htmlBuilder->columns([
                ['data' => 'name','name'=>'name','title'=>'Name', 'footer' => 'Name'],
                ['data' => 'des','name'=>'des','title'=>'Description', 'footer' => 'Description'],
                ['data'=>'image','name'=>'image','title'=>'Image'],
                ['data'=>'category','name'=>'category','title'=>'Category'],
                ['data'=>'action','name'=>'action','title'=>'Action','width'=>'200px']
            ]);
        return view('product.index',compact('html'));
	}

    function view($id){
    	$product=Product::find($id);
       	return view('product.view')->with(['product'=>$product]);
    }

    function store(StoreProduct $request){

        $arr=$request->all();
        $arr['user_id']=\Auth::id();
        $product=Product::create($arr);
        if($product){
            $product->categories()->attach($request['category']);
            return redirect(route('product.index'));
        }else {
            return redirect()->back()->withErrors()->withInput();
        }
    }

    function edit($id){
        $product = Product::find($id);
        $categories=Category::all()->pluck('name','id')->toArray();
        $categories_selected = $product->categories->pluck('id')->toArray();
        // dd($categories_selected);
        if($product){
            return view('product.edit',compact('product','categories','categories_selected'));
        }else{
            return redirect()->back()->withErrors(['msg'=>'This product does not found.']);
        }
        
    }

    function update(StoreProduct $request,$id){
        $product = Product::find($id);
        if($product){
            $product->name=$request->get('name');
            $product->des=$request->get('des');
            $product->image=$request->get('image');
        }
        if($product){
            $product->save();
            $product->categories()->sync($request['category']);
            return redirect(route('product.index'));
        }else {
            return redirect()->back()->withErrors()->withInput();
        }
    }

    function delete(Request $request){
        $id = $request->get('id');
        if($id){
            $pro=Product::find($id);
            if($pro){
                $pro->categories()->sync([]);
                $pro->delete();
                return json_encode("success");
            }
        }
        return false;
    }
    public function mail($img){
        
            // $message->attach($img->getRealPath(), 
            //     array(
            //         'as' => 'resume.' . $img->getClientOriginalExtension(), 
            //         'mime' => $img->getMimeType()
            //     )
            // );
        // });
    }

}
