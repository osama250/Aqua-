<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateDeckRequest;
use App\Http\Requests\AdminPanel\UpdateDeckRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DeckRepository;
use Illuminate\Http\Request;
use App\Models\Deck;
use App\Http\Traits\FileUploadTrait;
use App\Traits\UploadImage;
use Flash;

class DeckController extends AppBaseController
{
    /** @var DeckRepository $deckRepository*/

    use UploadImage;
    private $deckRepository;

    public function __construct(DeckRepository $deck)
    {
        $this->deckRepository = $deck;
        $this->middleware('permission:View Decks|Add Metas|Edit Decks|Delete Decks', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Decks', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Decks', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Decks', ['only' => ['destroy']]);
    }

    public function index()
    {
        $decks = Deck::all();
        return view('AdminPanel.decks.index', get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.decks.create');
    }

    public function store(CreateDeckRequest $request)
    {
        Deck::create($request->all());
        return redirect(route('decks.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $deck = Deck::findOrFail($id);
        return view('AdminPanel.decks.edit' , get_defined_vars() );
    }

    public function update($id, UpdateDeckRequest $request)
    {
        $deck = Deck::findOrFail($id);
        $deck->update($request->all());
        return redirect(route('decks.index'))->with('success',__('lang.updated'));
    }

    public function destroy($id)
    {
        Deck::findOrFail($id)->delete();
        return redirect(route('decks.index'))->with('warning',__('lang.deleted'));
    }
}
