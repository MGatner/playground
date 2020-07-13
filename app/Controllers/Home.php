<?php namespace App\Controllers;

use App\Models\DungeonModel;
use App\Models\HeroModel;
use App\Models\MonsterModel;

class Home extends BaseController
{
	public function index()
	{
         // When you don't need to use a model in multiple places
         // you can simply get a new instance here. It will use
         // the default database connection if none is passed in
         // during instantiation.
        $heroes = new HeroModel();
        $dungeons = new DungeonModel();
        $monsters = new MonsterModel();

		return view('home', [
		    // Note that we can intermingle builder and model methods
            // when making calls against the model.
		    'heroes' => $heroes
                ->orderBy('name', 'asc')
                ->findAll(),
            'dungeons' => $dungeons
            	->with('monsters')
                ->orderBy('difficulty', 'desc')
                ->findAll(),
            'monster' => $monsters->first(),
        ]);
	}

	//--------------------------------------------------------------------

}
