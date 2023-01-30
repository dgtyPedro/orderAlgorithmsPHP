<?php

namespace App\Http\Controllers;

use App\Models\Root;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $roots = Root::with(['external_values' => function($query) {
            $query->select('root_id', 'value')->get();
        }])->get();

        $roots = $roots->map(function ($root) {
            $value = 0;
            if ($root->externals) {
                $value = $root->externals->sum('value');
            }
            $root->value += $value;
            return $root;
        });

//        foreach ($roots as $root) {
//            $value = 0;
//            if ($root->external_values) {
//                $value = $root->external_values->sum('value');
//            }
//            $root->value += $value;
//        }

        $roots = $roots->sortBy('value');
    }
}
