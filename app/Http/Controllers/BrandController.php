<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(public Brand $brand) { }

    public function index()
    {
        $data = $this->brand->all();
        return response()
            ->json($data, 200);
    }

    public function create(BrandRequest $request)
    {
        return response()
            ->json($this->brand->create($request->all()), 201);
    }

    public function update(BrandRequest $request)
    {
        $id = $request->get('id');
        $data = $request->except('id');
        $model = $this->brand->find($id);
        if ($model){
            $model->fill($data);
            $model->save();
            return response()
                ->json($model, 200);
        }
        return response()->json('badrequest', 400);
    }

    public function find($id)
    {
        if ($id){
            return response()
                ->json($this->brand->find($id), 200);
        }
        return response()->json('badrequest', 400);
    }

    public function delete($id)
    {
        if ($id){
            $model = $this->brand->find($id);
            if ($model) {
                $model->delete();
                return response()->json(["status" => "deleted", "model" => $model], 200);
            }
        }
        return response()->json('badrequest', 400);
    }
}
