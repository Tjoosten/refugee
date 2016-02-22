<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointValidation;
use App\Points;

class PointsController extends Controller
{
    /**
     * Get the index page.
     */
    public function index()
    {
        $data['title'] = 'Inzamelpunten';
        $data['query'] = Points::all();

        return view('backend.points', $data);
    }

    /**
     * Delete the selected collection point.
     *
     * @param int , $id, the collection point id.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Points::destroy($id);

        session()->flash('flash_title', 'Success');
        session()->flash('flash_message', 'U hebt een inzamelpunt verwijderd');
        session()->flash('flash_message_important', '');

        return redirect()->back(302);
    }

    /**
     * Save a new collecting point to the database.
     *
     * @param PointValidation $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(PointValidation $request)
    {
        $point = new Points();
        $point->adress = $request->address;
        $point->contact = $request->contact;
        $point->naam_inzamelpunt = $request->name;
        $point->Opening_maandag = empty($request->maandag)   ? 'Gesloten' : $request->maandag;
        $point->Opening_dinsdag = empty($request->dinsdag)   ? 'Gesloten' : $request->dinsdag;
        $point->Opening_woensdag = empty($request->woensdag)  ? 'Gesloten' : $request->woensdag;
        $point->Opening_donderdag = empty($request->donderdag) ? 'Gesloten' : $request->donderdag;
        $point->Opening_vrijdag = empty($request->vrijdag)   ? 'Gesloten' : $request->vrijdag;
        $point->Opening_zaterdag = empty($request->zaterdag)  ? 'Gesloten' : $request->zaterdag;
        $point->Opening_zondag = empty($request->zondag)    ? 'Gesloten' : $request->zondag;

        $point->save(); // Save all data

        // Flash session.
        session()->flash('flash_title', 'Success!');
        session()->flash('flash_message', 'U hebt een nieuw inzamelpunt aangemaakt');
        session()->flash('flash_message_important', false);

        return redirect()->back(302);
    }

    /**
     * Update the collecting point.
     *
     * @param $id
     */
    public function update($id)
    {
        $point = Points::find($id);
        $point->adress = $request->address;
        $point->contact = $request->contact;
        $point->naam_inzamelpunt = $request->name;
        $point->Opening_maandag = empty($request->maandag)   ? 'Gesloten' : $request->maandag;
        $point->Opening_dinsdag = empty($request->dinsdag)   ? 'Gesloten' : $request->dinsdag;
        $point->Opening_woensdag = empty($request->woensdag)  ? 'Gesloten' : $request->woensdag;
        $point->Opening_donderdag = empty($request->donderdag) ? 'Gesloten' : $request->donderdag;
        $point->Opening_vrijdag = empty($request->vrijdag)   ? 'Gesloten' : $request->vrijdag;
        $point->Opening_zaterdag = empty($request->zaterdag)  ? 'Gesloten' : $request->zaterdag;
        $point->Opening_zondag = empty($request->zondag)    ? 'Gesloten' : $request->zondag;
        $point->save(); // Save all data

        session()->flash();
        session()->flash();
        session()->flash();
    }
}
