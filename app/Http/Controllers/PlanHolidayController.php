<?php

namespace App\Http\Controllers;

use App\Models\PlanHoliday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanHolidayController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/showPlanHoliday",
     *      summary="Get all plan holidays",
     *      tags={"Plan Holiday"},
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *      )
     * )
     */
    public function index() {
        $planHolidays = PlanHoliday::all();

        return response()->json($planHolidays, 200);
    }

    /**
     * @OA\Post(
     *      path="/api/storePlanHoliday",
     *      summary="Store a new plan holiday",
     *      tags={"Plan Holiday"},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="title", type="string", example="New Holiday"),
     *              @OA\Property(property="description", type="string", example="A new holiday"),
     *              @OA\Property(property="date", type="string", format="date", example="2023-05-01"),
     *              @OA\Property(property="location", type="string", example="New York"),
     *              @OA\Property(property="participants", type="string", example="John Doe, Jane Doe")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Success",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="id", type="integer", example="1"),
     *              @OA\Property(property="title", type="string", example="New Holiday"),
     *              @OA\Property(property="description", type="string", example="A new holiday"),
     *              @OA\Property(property="date", type="string", format="date", example="2023-05-01"),
     *              @OA\Property(property="location", type="string", example="New York"),
     *              @OA\Property(property="participants", type="string", example="John Doe, Jane Doe"),
     *              @OA\Property(property="created_at", type="string", format="datetime", example="2023-05-01T00:00:00.000000Z"),
     *              @OA\Property(property="updated_at", type="string", format="datetime", example="2023-05-01T00:00:00.000000Z")
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Validation error"
     *      )
     * )
     */
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

    /**
     * @OA\Get(
     *      path="/api/showPlanHoliday/{id}",
     *      summary="Get a plan holiday by ID",
     *      tags={"Plan Holiday"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="id", type="integer", example="1"),
     *              @OA\Property(property="title", type="string", example="New Holiday"),
     *              @OA\Property(property="description", type="string", example="A new holiday"),
     *              @OA\Property(property="date", type="string", format="date", example="2023-05-01"),
     *              @OA\Property(property="location", type="string", example="New York"),
     *              @OA\Property(property="participants", type="string", example="John Doe, Jane Doe"),
     *              @OA\Property(property="created_at", type="string", format="datetime", example="2023-05-01T00:00:00.000000Z"),
     *              @OA\Property(property="updated_at", type="string", format="datetime", example="2023-05-01T00:00:00.000000Z")
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Plan holiday not found"
     *      )
     * )
     */
    public function show($id) {
        $planHoliday = PlanHoliday::find($id);

        if (!$planHoliday) {
            return response()->json(['error' => 'Plan holiday not found'], 404);
        }

        return response()->json($planHoliday, 200);
    }

    /**
     * @OA\Put(
     *      path="/api/updatePlanHoliday/{id}",
     *      summary="Update a plan holiday by ID",
     *      tags={"Plan Holiday"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="title", type="string", example="Updated Holiday"),
     *              @OA\Property(property="description", type="string", example="An updated holiday"),
     *              @OA\Property(property="date", type="string", format="date", example="2023-05-01"),
     *              @OA\Property(property="location", type="string", example="New York"),
     *              @OA\Property(property="participants", type="string", example="John Doe, Jane Doe")
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="id", type="integer", example="1"),
     *              @OA\Property(property="title", type="string", example="Updated Holiday"),
     *              @OA\Property(property="description", type="string", example="An updated holiday"),
     *              @OA\Property(property="date", type="string", format="date", example="2023-05-01"),
     *              @OA\Property(property="location", type="string", example="New York"),
     *              @OA\Property(property="participants", type="string", example="John Doe, Jane Doe"),
     *              @OA\Property(property="created_at", type="string", format="datetime", example="2023-05-01T00:00:00.000000Z"),
     *              @OA\Property(property="updated_at", type="string", format="datetime", example="2023-05-01T00:00:00.000000Z")
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Plan holiday not found"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Validation error"
     *      )
     * )
     */
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

    /**
     * @OA\Delete(
     *      path="/api/deletePlanHoliday/{id}",
     *      summary="Delete a plan holiday by ID",
     *      tags={"Plan Holiday"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string", example="Plan holiday deleted")
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Plan holiday not found"
     *      )
     *  )
     */
    public function destroy($id) {
        $planHoliday = PlanHoliday::find($id);

        if (!$planHoliday) {
            return response()->json(['error' => 'Plan holiday not found'], 404);
        }

        $planHoliday->delete();

        return response()->json(['message' => 'Plan holiday deleted'], 200);
    }
}
