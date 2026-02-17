<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRouteRequest;
use App\Http\Requests\EditRouteRequest;
use App\Models\Route;
use App\Utils\GeneralTrait;
use Illuminate\Support\Facades\Route as RouteVal;



class RouteController extends Controller
{
    use GeneralTrait;
    public function list(Route $routeModel)
    {
        $pageCount = intval($this->getSettingsKeyValue('pagination_count') ?? env(('PAGINATION_COUNT')));
        $routesQuery = $routeModel->orderByDesc('is_active')->orderBy('updated_at', 'desc');
        $request = request();
        $searchType = "Default Landing Page";
        $searchVal = '';
        $urlVal = route('app.routes.list');

        if($request->has('name')){
            $routesQuery->where('routes.name', 'like', '%'.$request->name.'%');
            $routes = $routesQuery->paginate($pageCount);
            $routes->appends(['name' => $request->name]);
            $searchType = "Search by Route Name";
            $searchVal = $request->name;
            $urlVal = route('app.routes.list')."name=$request->name";
        }else{
            $routes = $routesQuery->paginate($pageCount);
        }


        return view('routes.list', ['routes' => $routes, 'nameVal' => $request->name ?? null]);
    }

    public function save(AddRouteRequest $request, Route $routeModel)
    {
        $route = $routeModel->create([
            'name' => $request->name,
            'path' => $request->path
        ]);
        if(empty($route->id) == false){

            return redirect()->route('app.routes.list')->with('success', 'Route has been created successfully.');
        }
        return redirect()->back()->with('error', 'Route created was failed');
    }

    public function edit($id, Route $routeModel)
    {
        $route = $routeModel->find($id);
        return view('routes.edit', compact('route'));
    }

    public function status($id, $type, Route $routeModel)
    {
        $route = $routeModel->where('id', '=', $id)
        ->firstOrFail();

        $msg = $type == 'active' ? 'activated' : 'disabled' ;
        $route->is_active = $type == 'active';

        if($route->save()){
            return redirect()->route('app.routes.list')
                ->with('success', "Routes has been $msg successfully.");
        }

        return redirect()->route('app.routes.list')
        ->with('error', 'Oops! Routes status change has been failed. Try again later.');
    }

    public function routeMigrate()
    {
        $routeNames = [];
        foreach (RouteVal::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();
            $path =  $route->uri;
            if (array_key_exists('as', $action) && strpos($action['as'], 'app') !== false) {
                $getRoutes = Route::where('name', $action['as'])->first();
                if (empty($getRoutes) === true) {
                    $routeNames[] = [
                        'name' => $action['as'],
                        'path' => $path,
                        'is_active' => true,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ];
                }
            }
        }

        Route::insert($routeNames);

        return redirect()->route('app.routes.list')
            ->with('success', 'route has been migrated successfully.');
    }
    public function update($id, EditRouteRequest $request, Route $routeModel)
    {
    $route = $routeModel->find($id);
        $route->name = $request->name;
        $route->path = $request->path;
    if ($route->save()) {
        return response()->json([
            'success' => true,
            'message' => 'Route has been updated successfully',
            'redirect_url' => route('app.routes.list'),
        ]);
    }
    return response()->json(['success' => false], 500);
    }
}
