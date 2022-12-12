<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\Spaceships\StoreSpaceshipRequest;
use App\Http\Requests\Pages\Spaceships\UpdateSpaceshipRequest;
use App\Models\Spaceship;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SpaceshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $spaceships = Spaceship::all();

        if($spaceships == null) {
            Controller::createToast('error', 'Algo incomum aconteceu');

            return view('pages.spaceships.general')
                ->with('spaceships', []);
        }

        return view('pages.spaceships.general')
            ->with('spaceships', $spaceships->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pages.spaceships.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSpaceshipRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSpaceshipRequest $request)
    {
        $newSpaceship = $request->all();
        $newSpaceship['arquivo'] = Spaceship::generateFileName('img_' . $newSpaceship['name'] . $newSpaceship['motor_power']);

        $spaceship = Spaceship::create($newSpaceship);

        if($spaceship == null) {
            $this->createToast('error', 'Algo incomum aconteceu na criação da nave');
            return back()->withInput();
        }

        if(!$spaceship->saveUploadedImages($request)) {
            $this->createToast('warning', 'Nave criada, entretanto não foi possível mover a imagem dela');
            return redirect()->route('spaceships.index');
        }

        $this->createToast('success', 'Nave criada com sucesso');
        return redirect()->route('spaceships.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(int $id)
    {
        $spaceship = Spaceship::find($id);

        if($spaceship == null) {
            Controller::createToast('error', 'Algo incomum aconteceu');
            return back();
        }

        return view('pages.spaceships.visualize')
            ->with('spaceship', $spaceship->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(int $id)
    {
        $spaceship = Spaceship::find($id);

        if($spaceship == null) {
            Controller::createToast('error', 'Algo incomum aconteceu');
            return back();
        }

        return view('pages.spaceships.edit')
            ->with('spaceship', $spaceship->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSpaceshipRequest $request
     * @param Spaceship $spaceship
     * @return RedirectResponse
     */
    public function update(UpdateSpaceshipRequest $request, Spaceship $spaceship)
    {
        $update = $spaceship->update($request->except('arquivo'));

        if(!$update) {
            $this->createToast('error', 'Algo incomum aconteceu na edição da nave');
            return back()->withInput();
        }

        if($request->file('arquivo')) {
            if(!$spaceship->saveUploadedImages($request)) {
                $this->createToast('warning', 'Nave editada, entretanto não foi possível mover a nova imagem');
                return redirect()->route('spaceships.index');
            }
        }

        $this->createToast('success', 'Nave atualizada com sucesso');
        return redirect()->route('spaceships.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Spaceship $spaceship
     * @return RedirectResponse
     */
    public function destroy(Spaceship $spaceship)
    {
        Storage::disk('public')->delete( 'images/' . $spaceship->arquivo);

        $delete = $spaceship->delete();

        if(!$delete) {
            $this->createToast('error', 'Algo incomum aconteceu na exclusão da nave');
            return back()->withInput();
        }

        $this->createToast('success', 'Nave excluida com sucesso');
        return redirect()->route('spaceships.index');
    }
}
