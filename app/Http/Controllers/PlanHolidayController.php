<?php

namespace App\Http\Controllers;

use App\Models\PlanHoliday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanHolidayController extends Controller
{
    public function index() {
        $planHolidays = PlanHoliday::all();

        return response()->json($planHolidays, 200);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'string|required',
            'description' => 'string|required',
            'date' => 'required|date_format:Y-m-d',
            'location' => 'string|required',
            'participants' => 'string|nullable'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $planHoliday = PlanHoliday::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'participants' => $request->participants
        ]);

        return response()->json($planHoliday, 201);
    }

    public function show($id) {
        $planHoliday = PlanHoliday::find($id);

        if (!$planHoliday) {
            return response()->json(['error' => 'Plan holiday not found'], 404);
        }

        return response()->json($planHoliday, 200);
    }

    public function update(Request $request, $id) {
        $planHoliday = PlanHoliday::find($id);

        if (!$planHoliday) {
            return response()->json(['error' => 'Plan holiday not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'string|nullable',
            'description' => 'string|nullable',
            'date' => 'date_format:Y-m-d|nullable',
            'location' => 'string|nullable',
            'participants' => 'string|nullable'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $planHoliday->update($request->all());

        return response()->json($planHoliday, 200);
    }

    public function destroy($id) {
        $planHoliday = PlanHoliday::find($id);

        if (!$planHoliday) {
            return response()->json(['error' => 'Plan holiday not found'], 404);
        }

        $planHoliday->delete();

        return response()->json(['message' => 'Plan holiday deleted'], 200);
    }
}
