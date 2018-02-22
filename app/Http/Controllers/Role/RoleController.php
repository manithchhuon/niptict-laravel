<?php 
namespace App\Http\Controllers\Role;
use Auth;
use Illuminate\Support\Facades\Input;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class RoleController extends Controller {

	public function __construct(Builder $htmlBuilder)
	{
        $this->htmlBuilder = $htmlBuilder;
	}
	public function index(){

        if (request()->ajax()) {
            return DataTables::of($role = Role::select(['name','id']))
                ->addColumn('action', function ($role) {
                    $result = '<a href="'.route('role.edit', $role->id).'" class="btn btn-icon btn-primary btn-xs m-b-3" title="Edit" style="margin-right: 5px;"><i class="fa fa-edit"></i>Edit</a>';
                    $result.='<a class="btn btn-icon btn-danger btn-xs m-b-3 delete" data-name="'.$role->id.'"><i class="fa fa-trash-o"></i>Delete</a>';
                    return $result;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $html = $this->htmlBuilder->columns([
                ['data' => 'name','name'=>'name','title'=>'Name'],
                ['data'=>'action','name'=>'action','title'=>'Action','width'=>'200px']
            ]);
		return view('role.index',compact('html'));
	}
    
	public function create(){
        $role=new Role();
        $allmodules=config('roles');
        $allkey=[''=>'Select Module'];
        foreach ($allmodules as $key => $value) {
            $allkey[ucwords($key)]=ucwords($key);
        }

        $jsonRole = $this->listPermission();
        $pselected = null;
        $porigin = null;
        return view('role.create', compact('jsonRole','pselected','porigin','allkey','role'));
	}

    public function store(Request $request){
        return $this->save($request);
    }  

    public function update($id,FormBuilder $formBuilder){
        return $this->save($formBuilder);
    }

    public function edit($id){
        $allmodules=config('roles');
        $allkey=[''=>'Select Module'];
        foreach ($allmodules as $key => $value) {
            $allkey[ucwords($key)]=ucwords($key);
        }
        $role = Role::find($id);
        $pselected = [];
        $porigin = null;
        $jsonRole = $this->listPermission();
        $role_p = $role->permissions;
        if($role_p){
            foreach ($role_p as $pkey => $pvalue) {
                $pselected[] = $pvalue->name;
            }
        }
        return view('role.create', compact('jsonRole','pselected','porigin','allkey','role'));
    }

    function listPermission(){

        $permission=config('roles');
        $getAllRole=[];
        foreach($permission as $key=>$value){
            $arrRole=null;
            foreach ($value as $ind => $val) {
                $arrStr=$val.'-'.$key;
                $arrRole[]=$arrStr;
            }
            $getAllRole[ucwords($key)]=$arrRole;
        }
        $jsonRole=json_encode($getAllRole);
        return $jsonRole;
    }
    function save($request){
        try {
            $getRole = $request->get('role');
            $getPermission = $request->get('permission');
            $getId = $request->get('id');
            $p_selected = ($getRole?explode(",", $getRole):null);
            $p_origin = ($getPermission?explode(",", $getPermission):null);
            $validator=[];
            if($request->get('role')){
                $rules = ['name' => 'required|unique:roles,name,' ];
                if($getId){
                    $rules = ['name' => 'required|unique:roles,name,'.$getId ];
                }

                    $validator = Validator::make($request->all(), $rules);
                
                if($validator->fails()){
                    flash()->error("Please verify all data is corrected!");
                    return redirect()->back()->withErrors($form->getErrors())->withInput()->with(["pselected"=>$p_selected,"porigin"=>$p_origin]);
                }else{
                    $role = trim($request->get('name'));                    
                    $result = $this->createRole($role,$p_selected,$getId);
                    if($result){
                        return redirect(route('role.index'));
                    }
                }
            }else{
               
                return redirect()->back()->withInput()->with(["pselected"=>$p_selected,"porigin"=>$p_origin]);
            }

        } catch (Exception $e) {
            
        }
    }
    public function postDelete(){
        $id_role = Input::get('item');
        $role = Role::find($id_role);
        if(count($role->users)){
           return "failed";
        }else{
            $role->delete();
            return json_encode("success");
        }
    }

    private function createRole($role,$arrPermission,$id){
        if($id){
            $existedRole = Role::find($id)->update(['name'=>$role]);
        }
        $existedRole = Role::where('name',$role)->first();
        
        if(!$existedRole){
            $existedRole = Role::create(['name' => $role]);
        }
        $existedRole->permissions()->detach();

        if($arrPermission){
            foreach ($arrPermission as $pkey => $pvalue) {
                $existedPermission = Permission::where('name',$pvalue)->first();
                if(!$existedPermission){
                    Permission::create(['name' => $pvalue]);
                }
                $existedRole->givePermissionTo($pvalue);
            }
        }
        return $existedRole;
    }



}