<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingRequest;
use App\Http\Requests\EditSettingRequest;
use App\Models\Setting;
use App\Utils\GeneralTrait;


class SettingController extends Controller
{
    use GeneralTrait;

    public function list(Setting $settingModel)
    {
       $pageCount = intval($this->getSettingsKeyValue('pagination_count') ?? env(('PAGINATION_COUNT')));
       $settingsQuery = $settingModel->orderByDesc('is_active')->orderBy('updated_at', 'desc');
       $request = request();
       $searchType = "Default Landing Page ";
       $searchVal = '';
       $urlVal = route('app.settings.list');

        if($request->has('key')){
            $settingsQuery->where('key', 'like', '%'.$request->key.'%');
            $settings = $settingsQuery->paginate($pageCount);
            $settings->appends(['key' => $request->key]);
            $searchType = "Search by Setting Key";
            $searchVal = $request->key;
            $urlVal = route('app.settings.list')."key=$request->key";

        }else{
            $settings = $settingsQuery->paginate($pageCount);
        }

        return view('settings.list', ['settings' => $settings, 'nameVal' => $request->key ?? null]);
    }

    public function save(AddSettingRequest $request, Setting $settingModel)
    {
        $setting = $settingModel->create([
            'key' => $request->key,
            'value' => $request->value,
        ]);
        if(empty($setting->id) == false){
            return redirect()->route('app.settings.list')->with('success', 'Setting has been created successfully.');
        }
        return redirect()->back()->with('error', 'Setting created was failed');
    }

    public function edit($id, Setting $settingModel)
    {
        $setting = $settingModel->find($id);
        return view('settings.edit', compact('setting'));
    }

    public function status($id, $type, Setting $settingModel)
    {
        $setting = $settingModel->where('id', '=', $id)
            ->firstOrFail();

        $msg = $type == 'active' ? 'activated' : 'disabled' ;
        $setting->is_active = $type == 'active';

        if($setting->save()){
            return redirect()->route('app.settings.list')
                ->with('success', "Setting has been $msg successfully.");
        }

        return redirect()->route('app.settings.list')
        ->with('error', 'Oops! Setting status change has been failed. Try again later.');
    }

    public function update($id, EditSettingRequest $request, Setting $settingModel)
    {
    // $validatedData = $request->validate([
    //     'value' => ['required','string','max:50', Rule::unique('settings')->ignore($id)],
    // ], [
    //     'value.required' => 'The value is required.',
    //     'value.max' => 'The value must not exceed 50 characters.',
    //     'value.unique' => 'The value has already been taken.',
    // ]);
    // $setting = $settingModel->find($id);
    // $setting->value = $validatedData['value'];
    $setting = $settingModel->find($id);
        $setting->value = $request->value;
    if ($setting->save()) {
        return redirect()->route('app.settings.list')->with('success', "Setting has been updated successfully.");
    }
    return response()->json(['success' => false], 500);
    }
}
