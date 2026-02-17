<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\UserActivity;
use App\Utils\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use GeneralTrait;

    public function list(Request $request, User $UserModel)
    {
        $pageCount = intval($this->getSettingsKeyValue('pagination_count') ?? env(('PAGINATION_COUNT')));

        $users = $UserModel->with('roles:id,name')
            ->orderByDesc('is_active')->orderBy('role_id');

        $searchType = "Default Landing Page";
        $searchVal = '';
        $urlVal = route('app.users.list');

        if($request->has('name')){
            $users->where('users.name', 'like', '%' . $request->name . '%');
            $users = $users->paginate($pageCount);
            $users->appends(['name' => $request->name]);
            $searchType = "Search by User Name";
            $searchVal = $request->name;
            $urlVal = route('app.users.list')."name=$request->name";
        }else{
            $users = $users->paginate($pageCount);
        }

        return view('users.list', ['users' => $users, 'nameVal' => $request->name ?? null]);
    }

    public function add(Request $request, Role $RoleModel)
    {
        $roles = $RoleModel->where('is_active', 1)->pluck('name', 'id');

        return view('users.add', compact('roles'));
    }

    public function save(AddUserRequest $request, User $UserModel)
    {

        $user = $UserModel->create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_active' => true,
            'role_id' => $request->role_id,
            'failed_attempts' => 0,
            'password_expired' => false
        ]);

        if(empty($user->id) === false){

            return redirect()->route('app.users.list')->with('success', 'User has been created successfully.');
        }

        return redirect()->back()->with('error', 'User creation has been failed.');

    }

    public function edit($id, User $UserModel, Role $RoleModel)
    {
        $user = $UserModel->find($id);

        $roles = $RoleModel->where('is_active', 1)->pluck('name', 'id');

        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update($id, EditUserRequest $request, User $UserModel)
    {
        $user = $UserModel->find($id);
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if($request->password !== null){
            if (!Hash::check($request->password, $user->password)) {
                $user->password = bcrypt($request->password);
            } else {
                return redirect()->back()->withErrors(['password' => 'The new password must be different from the current password.']);
            }
        }

        $user->failed_attempts = 0;
        $user->password_expired = false;
        if($user->save()){
            $this->UserActivityStore('Users Edit Page', 'Users', "User, Edit User ID: $id", '', json_encode($user), route('app.users.edit', ['id'=>$id]));
            return redirect()->route('app.users.list')->with('success', 'User has been updated successfully.');
        }

        return redirect()->back()->with('error', 'User updation has been failed.');
    }

    public function status($id, $type, User $UserModel)
    {
        $user = $UserModel->where('id', '=', $id)
        ->firstOrFail();

        $msg = $type == 'active' ? 'activated' : 'disabled' ;
        $user->is_active = $type == 'active';

        if($user->save()){

            return redirect()->route('app.users.list')
                ->with('success', "Users has been $msg successfully.");
        }

        return redirect()->route('app.users.list')
        ->with('error', 'Oops! Users status change has been failed. Try again later.');
    }

}
