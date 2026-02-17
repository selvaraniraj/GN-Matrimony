<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use App\Models\MemberActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Member;
use App\Models\Photo;
use App\Models\UploadFile;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();


        View::composer('*', function ($view) {
            if (Auth::check()) { // Ensure user is logged in
                $userId = Auth::id(); // Get the logged-in user ID
                
                $notificationCount = MemberActivityLog::where('profile_id', $userId)
                ->whereIn('flag', [2, 4])
                    ->where('status', 1)
                    ->count();
            } else {
                $notificationCount = 0;
            }
            // Get the logged-in user's name and image
            $userId = Auth::id();
            $member = Member::where('user_id', $userId)
               ->select('id','dob', 'name')
           ->first();

           if ($member) {
            $memberName = $member->name;
            $photo_id = Photo::where('member_id', $member->id)
                        ->where('is_active', 1)
                        ->orderBy('id', 'ASC')
                        ->value('photo_id');

                    $upload_image = UploadFile::where('id', $photo_id)->value('file_path');
                    $upload_image = $upload_image ? asset($upload_image) : asset('/images/user_image.png');
        }
            else{
                $memberName = 'Guest';
                $upload_image = asset('/images/user_image.png');
            }  

            $view->with([
                'notificationCount' => $notificationCount,
                'memberName' => $memberName,
                'upload_image' => $upload_image
            ]);
        });
    }
}
