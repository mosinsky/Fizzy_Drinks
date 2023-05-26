<?php

namespace App\Http\Controllers\Api;

use App\Models\Drink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DrinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['all', 'find']]);
    }

    public function all(): array
    {
        return [
            'status'  => 200,
            'message' => 'Returned all drinks in database.',
            'data'    => Drink::latest()->get(),
        ];
    }

    public function find(Drink $drink): array
    {
        return [
            'status'  => 200,
            'message' => 'Drink was found',
            'data'    => $drink,
        ];
    }

    public function create(Request $request): array
    {
        return [
            'status'  => 201,
            'message' => 'Created new drink',
            'data'    => Drink::create($request->all()),
        ];
    }

    public function update(Drink $drink, Request $request)
    {
        return [
            'status'  => 200,
            'message' => 'Updated drink of ID [' . $drink->id . ']',
            'data'    => tap($drink)->update($request->all()),
        ];
    }

    public function delete(Drink $drink): array
    {
        try {
            $drink->delete();
        } catch (\Exception $exception) {
            return [
                'status'  => 500,
                'message' => 'Cannot delete drink of ID [' . $drink->id . ']'
            ];
        }

        return [
            'status'  => 200,
            'message' => 'Deleted drink of ID [' . $drink->id . ']'
        ];
    }
}
