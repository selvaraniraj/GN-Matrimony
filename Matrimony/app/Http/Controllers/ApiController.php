<?php

namespace App\Http\Controllers;

use App\Collections\CmsPageCollection;
use App\Models\Ticket;
use App\Utils\GeneralTrait;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    use GeneralTrait;

    public function getCmsListByTags(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'tag' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors(),
                    'success' => false,
                    'code' => 400
                ]);
            }

            $tag = $request->get('tag');

            $cmsPages = CmsPageCollection::select('name','handle','tags')->where('tags', 'LIKE', '%' . $tag . '%')
                ->orderByDesc('created_at')
                ->get();

            $cmsPages->transform(function ($item) {
                $item->url = route('app.v2.pageView', ['handle' => $item->handle]);
                return $item;
            });


            return response()->json([
                'message' => 'Fetch Data Successful',
                'success' => true,
                'code' => 200,
                'result' => $cmsPages
            ]);

        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Internal server error',
                'success' => false,
                'code' => 500
            ]);
        }
    }


    public function getMobileNoTickets(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'mobile_number' => 'required|digits:10',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors(),
                    'success' => false,
                    'code' => 400
                ]);
            }

            $mobileNumber = $request->get('mobile_number');

            $tickets = Ticket::where('mobile_no', $mobileNumber)
                ->with(['product', 'user', 'issue', 'team', 'developer'])
                ->orderByDesc('created_at')
                ->get();

            foreach ($tickets as $key => &$value) {
                $value->encID = $this->custom_encrypt($value->id);
            }

            return response()->json([
                'message' => 'Fetch Data Successful',
                'success' => true,
                'code' => 200,
                'result' => $tickets
            ]);

        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Internal server error',
                'success' => false,
                'code' => 500
            ]);
        }
    }
}
