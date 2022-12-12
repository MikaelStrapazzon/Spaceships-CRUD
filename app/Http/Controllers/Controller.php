<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a Toast to present in the view
     * @param string $type (error|success|warning) Toast type
     * @param string $message Toast message
     * @param string $title Toast title
     */
    public static function createToast(string $type, string $message, string $title='NVR-Manager') {
        $toasts = Session::get('toasts');

        if(is_array($toasts))
            $toasts[] = [
                'title' => $title,
                'type' => $type,
                'message' => $message
            ];
        else
            $toasts = [
                [
                    'title' => $title,
                    'type' => $type,
                    'message' => $message
                ]
            ];

        Session::put('toasts', $toasts);
    }
}
