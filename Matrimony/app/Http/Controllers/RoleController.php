<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRoleRequest;
use App\Http\Requests\EditRoleRequest;
use App\Models\Role;
use App\Models\Route;
use App\Utils\GeneralTrait;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    use GeneralTrait;

    public function list(Role $RoleModel)
    {
        $pageCount = intval($this->getSettingsKeyValue('pagination_count') ?? env(('PAGINATION_COUNT')));
        $roleId = Auth::user()->role_id;
        if($roleId == 1){
            $rolesQuery = $RoleModel->orderByDesc('is_active')->orderBy('updated_at', 'desc');
        }else{
            $rolesQuery = $RoleModel->where('id','!=',1)
                    ->orderByDesc('is_active')
                    ->orderBy('updated_at', 'desc');
        }
        $request = request();
        $searchType = "Default Landing Page";
        $searchVal = '';
        $urlVal = route('app.roles.list');

        if($request->has('name')){
            $rolesQuery->where('name', 'like', '%'.$request->name.'%');
            $roles = $rolesQuery->paginate($pageCount);
            $roles->appends(['name' => $request->name]);
            $searchType = "Search by Role Name";
            $searchVal = $request->name;
            $urlVal = route('app.roles.list')."name=$request->name";

        }else{
            $roles = $rolesQuery->paginate($pageCount);
        }

        return view('roles.list', ['roles' => $roles, 'nameVal' => $request->name ?? null]);
    }

    public function add(Route $routeModel)
    {
        $routeDatas = $routeModel->where('is_active', '=', true)
                            ->get()->toArray();
        $groupedData = array();
            foreach($routeDatas as $value) {
                $slugName = explode(".", $value['name']);
                array_push($groupedData, $slugName[1]);
            }
            $routes = array();
            $routeName = array_unique($groupedData);
            foreach($routeName as $value) {
                foreach($routeDatas as $permission) {
                    $slugNames = explode(".", $permission['name']);
                    if($value == $slugNames[1]){
                        $routes[$value][] = $permission;
                    }
                }
            }

        return view('roles.add', ['routes' => $routes]);
    }

    public function save(AddRoleRequest $request, Role $RoleModel)
    {
        $role = $RoleModel->create([
            'name' => $request->name,
            'is_active' => true
        ]);
        if(empty($role->id) == false){
            $role->routes()->attach($request->routes);

            return redirect()->route('app.roles.list')->with('success', 'Roles has been created successfully.');
        }

        return redirect()->back()->with('error', 'Roles creation has been failed.');
    }

    public function edit($id, Role $RoleModel, Route $routeModel)
    {
        $role = $RoleModel->where('id', '=', $id)->firstOrFail();
        $routes = $routeModel->where('is_active', '=', true)
                                ->get();

            $groupedData = array();
            // return $routes;
            foreach($routes as $value) {
                if (strpos($value['name'], '.') !== false) {
                    $menuName = explode(".", $value['name']);
                    array_push($groupedData, $menuName[1]);
                }
            }
            $routeDatas = array();
            $routeName = array_unique($groupedData);
            foreach($routeName as $value) {
                foreach($routes as $permission) {
                    if (strpos($permission['name'], '.') !== false) {
                        $slugNames = explode(".", $permission['name']);
                        if($value == $slugNames[1]){
                            $routeDatas[$value][] = $permission;
                        }
                    }
                }
            }
        $seletedroutes = $role->routes->pluck('id')->toArray();
        $seletedGroupNames = $role->routes->pluck('name')->toArray();

        $selectedGroupedData = array();
            foreach($seletedGroupNames as $value) {
                $menuName = explode(".", $value);
                array_push($selectedGroupedData, $menuName[1]);
            }
            $selectRouteName = array_unique($selectedGroupedData);
        return view('roles.edit', [
            'role' => $role, 'routes' => $routeDatas, 'seletedroutes' => $seletedroutes, 'selectRouteName' => $selectRouteName
        ]);
    }

    public function update($id, EditRoleRequest $request, Role $RoleModel)
    {
        $role = $RoleModel->find($id);
        $role->name = $request->name;
        if($role->save()){
            $role->routes()->sync($request->routes);
            return redirect()->route('app.roles.list')->with('success', 'Roles has been updated successfully.');
        }

        return redirect()->back()->with('error', 'Roles updation has been failed.');
    }

    public function delete($id, Role $RoleModel)
    {
        $role = $RoleModel->where('id', '=', $id)->firstOrFail();
        $role->routes()->detach();
        if($role->delete()){
            return redirect()->route('app.roles.list')->with('success', 'Roles has been deleted successfully.');
        }

        return redirect()->back()->with('error', 'Roles deletion has been failed.');
    }

    public function status($id, $type, Role $RoleModel)
    {
        $role = $RoleModel->where('id', '=', $id)
            ->firstOrFail();

        $msg = $type == 'active' ? 'activated' : 'disabled' ;
        $role->is_active = $type == 'active';

        if($role->save()){
            return redirect()->route('app.roles.list')
                ->with('success', "Roles has been $msg successfully.");
        }

        return redirect()->route('app.roles.list')
        ->with('error', 'Oops! Roles status change has been failed. Try again later.');
    }
}
