<?php

namespace App\Http\Controllers\Api;

use DB;
use Exception;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Http\Resources\Developers as DevelopersResource;

use App\Models\Developers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;

class DevelopersApiController extends Controller
{    
    public function developers() 
    {
        $developers = Developers::paginate(10);

        return DevelopersResource::collection(
            $developers
        );
    }

    public function create(Request $request) 
    {
        try {            
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:200',
                'sex' => 'required|max:1',
                'birthdate' => 'required|date_format:Y-m-d',
                'age' => 'required|numeric',
                'hobby' => 'required|max:200',
            ]);

            if ($validator->fails()) { 
                throw new Exception("invalid fields", 1);
            }
            
            DB::beginTransaction();

            Developers::create([
                'name' => $request->input('name'),
                'sex' => $request->input('sex'),
                'birthdate' => $request->input('birthdate'),
                'age' => $request->input('age'),
                'hobby' => $request->input('hobby')
            ]);

            DB::commit();

            return response()->json([
                "message" => "created with success"
            ], 201);

        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json([
                "message" => $th->getMessage()
            ], 400);
        }
    }

    public function read($id)
    {
        try {
            $developer = Developers::select()
                ->where('id', $id)
                ->first();

            if (empty($developer)) {
                throw new Exception("invalid developer's id", 1);
            }

            return new DevelopersResource($developer);

        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json([
                "message" => $th->getMessage()
            ], 404);
        }
    }

    public function update(Request $request) 
    {
        try {            
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:200',
                'sex' => 'required|max:1',
                'birthdate' => 'required|date_format:Y-m-d',
                'age' => 'required|numeric',
                'hobby' => 'required|max:200',
            ]);

            if ($validator->fails()) { 
                throw new Exception("invalid fields", 1);
            }

            DB::beginTransaction();

            $developer = Developers::select()
                ->where('id', $request->id)
                ->first();

            if (empty($developer)) {
                throw new Exception("invalid developer's id", 1);
            }

            $developer->update([
                'name' => $request->input('name'),
                'sex' => $request->input('sex'),
                'birthdate' => $request->input('birthdate'),
                'age' => $request->input('age'),
                'hobby' => $request->input('hobby')
            ]);

            DB::commit();

            return response()->json([
                "message" => "updated with success"
            ], 200);
    
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json([
                "message" => $th->getMessage()
            ], 400);
        }
    }

    public function delete($id) 
    {
        try {
            DB::beginTransaction();

            Developers::select()
                ->where('id', $id)
                ->delete();

            DB::commit();

            return response()->json([
                "message" => "deleted with success"
            ], 204);
    
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json([
                "message" => $th->getMessage()
            ], 400);
        }   
    }
}
