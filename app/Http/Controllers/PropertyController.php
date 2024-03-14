<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    function index() {
        $property = Property::orderBy('id')->get();
        return inertia('Properties/Index', [
            'property' => $property
        ]);
    }
    function show(Property $property) {
        sleep(3);
        return inertia('Properties/Show', ['property' => $property]);
    }

    function toggleFeatured(Property $property) {
        $property -> status = !$property->status;
        $property->save();

        return back();
    }

    function csv() {
        $properties = Property::orderBy('owner')-> get();

        $filename = '../storage/properties.csv';

        $file = fopen($filename, 'w+');

        foreach($properties as $p) {
            fputcsv($file, [
                $p->owner,
                $p->phone,
                $p->address,
                $p->type,
                $p->rental_amount,
                $p->status
            ]);
        }
        fclose($file);

        return response()->download($filename);
    }
}
