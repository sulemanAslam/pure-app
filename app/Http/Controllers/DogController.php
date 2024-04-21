<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;
use App\Models\Recipe;

class DogController extends Controller
{
    private function getSuitableRecipe($dogs)
    {
        $recipeAllergies = Recipe::pluck('allergen')->toArray();
        $recipeNames = Recipe::pluck('name')->toArray();
        
        foreach($dogs as $dog) {
            $suitableRcipes = new Recipe;

            if(empty($dog->allergies)) {
                $suitableRcipes = $suitableRcipes->whereIn('name', $recipeNames);
            }

            foreach($dog->allergies as $allergy) {


                if(in_array($allergy, $recipeAllergies)) {
                    $suitableRcipes = $suitableRcipes->where('allergen', '!=', $allergy);
                } else {
                    $suitableRcipes = $suitableRcipes->where('allergen', '=', $allergy);
                }
            }
    
            if($dog->age <= 6) {
                $suitableRcipes = $suitableRcipes->where('puppy_inappropriate', 0);
            }

            $suitableRcipes = $suitableRcipes
            ->where('breed_inappropriate', '!=', $dog->breed)
            ->pluck('name')
            ->toArray();

            $dog['suitable_recipes'] = $suitableRcipes;
        }

        return $dogs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dogs = Dog::latest()->get();
        $dogs = $this->getSuitableRecipe($dogs);

        return view('dogs.index', compact('dogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'age' => 'required | numeric',
            'breed' => 'required | string',
            'allergies' => 'required | array'
        ]);

        Dog::create($request->all());

        return redirect()->route('dogs.index')->with('success', 'Dog added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
