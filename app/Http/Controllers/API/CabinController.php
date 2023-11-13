<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cabin;
use App\Models\Cabinfeature;

class CabinController extends Controller
{
    public function cabins($id) {

            // $cabinid = Cabin::find($id);
            // $canpine = Cabin::findOrFail($id)->load([ 'cabinfeatures','categories','categories.facilites' => function($q) use ($id) {
            //         return $q->whereHas('cabins' , function($q) use ($id) {
            //             return $q->where('cabin_id', $id );
            //     });
            // }]);

            $canpine = Cabin::findOrFail($id)->load( [
                'sliders',
                'cabinfeatures',
                'categories',
                'categories.facilites' => function ($q) use ($id) {
                    $q->whereHas('cabins', function ($q) use ($id) {
                        $q->where('cabin_id', $id);
                    });
                },
                'categories.facilites.photos'       // Load photos for facilities
            ]);
            return $canpine;
    }

    public function cabinsall() {
        return response()->json( ['Cabins' => Cabin::with('photos')->get() ] , 200 );
    }
}
