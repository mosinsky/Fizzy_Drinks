<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\StoreDrinkRequest;
use App\Http\Requests\UpdateDrinkRequest;
use Illuminate\Contracts\Foundation\Application;

class DrinkController extends Controller
{
    // Model View Controller

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        // http://localhost:8000/drinks <- Request HTTP o metodzie GET
        // select * from drinks order by created_at desc;
        $drinks = Drink::latest()->get();

        return view('drinks.index', ['drinks' => $drinks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View|Application
    {
        // http://localhost:8000/drinks/new <- Request HTTP o metodzie GET
        return view('drinks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDrinkRequest $request): RedirectResponse
    {
        // http://localhost:8000/drinks <- Request HTTP o metodzie POST
        $data = $request->validated();

        // insert values(name...) into drinks (name...)
        Drink::create($data);

        return redirect()->to(route('drinks.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Drink $drink): Factory|View|Application
    {
        // http://localhost:8000/drinks/1 <- Request HTTP o metodzie GET
        // $drink = select * from drinks where drinks.id = $drink (1);
        return view('drinks.show', ['drink' => $drink]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drink $drink): Application|Factory|View
    {
        // http://localhost:8000/drinks/edit <- Request HTTP o metodzie GET
        // $drink = select * from drinks where drinks.id = $drink (1);
        return view('drinks.edit', ['drink' => $drink]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDrinkRequest $request, Drink $drink): RedirectResponse
    {
        // http://localhost:8000/drinks/1 <- Request HTTP o metodzie PUT
        // $drink = select * from drinks where drinks.id = $drink (1);

        $data = $request->validated();

        // update drinks(name...) values(name...)
        $drink->update($data);

        return redirect()->to(route('drinks.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drink $drink): RedirectResponse
    {
        // http://localhost:8000/drinks/1 <- Request HTTP o metodzie DELETE
        // $drink = select * from drinks where drinks.id = $drink (1);
        $drink->delete();

        return redirect()->to(route('drinks.index'));
    }
}
