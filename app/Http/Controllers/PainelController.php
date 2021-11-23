<?php

namespace App\Http\Controllers;

use App\Models\Heroi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{
    public function __construct(Heroi $heroi)
    {
        $this->heroi = $heroi;
    }
    public function index()
    {
        $herois = $this->heroi->get();
        return view('pages/painel/home', ['user' => Auth::user(), 'herois' => $herois]);
    }
    public function register()
    {
        return view('pages/painel/inserir');
    }
    public function registerHeroes(Request $request)
    {
        try {

            if ($request->hasFile('photo') && $request->photo->isValid()) {
                $name = uniqid(date('HisYmd'));
                $extension = $request->file('photo')->getClientOriginalExtension();
                $nameFile = "{$name}.{$extension}";
                $imagePath = $request->photo->storeAs('img_heroi', $nameFile, 'img_heroi');
                $photo = $imagePath;
            }
            $this->heroi->create([
                'name' => $request->name,
                'description' => $request->description,
                'photo' => $photo,
            ]);

            return redirect()->route('painel.register')->with('message', 'Heroi registrado com sucesso');
        } catch (Exception $e) {
            return redirect()->route('painel.register')->withErrors($e->getMessage());
        }
    }
    public function viewHeroe($id)
    {

        $heroi = $this->heroi->find($id);
        return view('pages/painel/heroi', ['heroi' => $heroi]);
    }
    public function editHeroe($id)
    {
        if (Auth::user()->is_admin == 1) {
            $heroi = $this->heroi->find($id);
            return view('pages/painel/editar', ['heroi' => $heroi]);
        } else {
            return redirect(route('painel.home'));
        }
    }
    public function editHeroeSend($id, Request $request)
    {
        $heroi = $this->heroi->find($id);

        if ($request->hasFile('photo') && $request->photo->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->file('photo')->getClientOriginalExtension();
            $nameFile = "{$name}.{$extension}";
            $imagePath = $request->photo->storeAs('img_heroi', $nameFile, 'img_heroi');
            $photo = $imagePath;
        }

        $heroi->update([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $photo ?? $heroi->photo,
        ]);

        return redirect(route('painel.home'));
    }
    public function destroy($id)
    {
        $heroi = $this->heroi->find($id);

        $heroi->delete();

        return redirect(route('painel.home'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
