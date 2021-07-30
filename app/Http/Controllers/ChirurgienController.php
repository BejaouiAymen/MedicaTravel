<?php

namespace App\Http\Controllers;

use App\Chirurgien;
use App\Specialite;
use App\User;
use App\Notifications\NewActionMade;

use Illuminate\Http\Request;

class ChirurgienController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$i=0;
    	$chirurgiens=Chirurgien::get();
		$specialites=Specialite::get();
		if($specialites->isEmpty()){
			return redirect("/specialite");
		}
		/*foreach ($chirurgiens as $chirurgien) {
			foreach ($chirurgien->specialites as $m ) {
			$i++;
				if($m)
				 $test[$i] = $m->pivot;
				else {
					$test[$i]=null;
				}		
			}
		}
		*/
		//return ($chirurgiens);
		
		foreach ($chirurgiens as $chirurgien) {
			foreach($chirurgien->specialites as $k){
					$i++;
				$specialites[$i]=[$k->specialite,$k->pivot->chirurgien_id];		
			}
		}
		//return ($int);
		return view("chirurgiens.index_chirurgien",compact('chirurgiens','specialites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$specialites=Specialite::get();
		if($specialites->isEmpty()){
			return redirect("/specialite");
		}
		return view("chirurgiens.ajouter_chirurgien",compact("specialites"));     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	 $chirurgien=new Chirurgien();
		
	
		$this->validate(
		$request,[
		'nom'=>['required','min:3'],
		'age'=>['required','min:1'],
		'telephone'=>['required','min:8'],
		'image'=>['required','min:10']
		
		]
		);
		
		$chirurgien->fullname=request('nom');
		$chirurgien->age=request('age');
		$chirurgien->telephone=request('telephone');
		$chirurgien->URL=request('image');

		
		$chirurgien->save();
		$spec=request('ids');
		$chirurgien->specialites()->sync($spec,'false');
		
		
		
		return redirect('/chirurgien');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chirurgien  $chirurgien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chirurgien=Chirurgien::find($id);
		$specialites=Specialite::get();
    	foreach($chirurgien->specialites as $specials){
    		$specialite[]=$specials->id;	
    	}
    	//return ($chirurgien);
    	return view("chirurgiens.modifier_chirurgien",compact('chirurgien','specialite','specialites'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chirurgien  $chirurgien
     * @return \Illuminate\Http\Response
     */
    public function edit(Chirurgien $chirurgien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chirurgien  $chirurgien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $chirurgien=Chirurgien::find($id);
		
	
		$this->validate(
		$request,[
		'nom'=>['required','min:3'],
		'age'=>['required','min:1'],
		'telephone'=>['required','min:8'],
		'image'=>['required','min:10']
		
		]
		);
		
		$chirurgien->fullname=request('nom');
		$chirurgien->age=request('age');
		$chirurgien->telephone=request('telephone');
		$chirurgien->URL=request('image');

		
		$chirurgien->save();
		$spec=request('ids');
		$chirurgien->specialites()->sync($spec,'false');
		
		
		
		return redirect("/chirurgien");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chirurgien  $chirurgien
     * @return \Illuminate\Http\Response
     */
    public function destroye($id)
    {
        //
        Chirurgien::find($id)->delete();
		$user=auth()->user();
		//variable pour les notifications...
		$action="a Supprimer un Chirurgien";
		$link="/chirurgien";
		$type="suppression";
		
		$users = User::all();
		
		\Notification::send($users, new NewActionMade($action,$user,$link,$type));
		
		return redirect('/chirurgien');	  	
		
    }
	
	public function specialite()
	{
		$k="";
    	 $specialites=Specialite::get();
		 if($specialites->isEmpty()){
		 	$k="vous n avez aucune specialite a selectionner...veuiller ajouter des uns";
		 }
		return view("chirurgiens.specialite",compact('specialites','k'));
		
	}
	public function specialite_save(Request $request)
	{
		 $specialite=new Specialite();
		
	
		$this->validate(
		$request,[
		'specialite'=>['required','min:3']
		]);
		
		$specialite->specialite=request('specialite');
		$specialite->save();
		
		return redirect('/specialite');
    
		
	}
	
	
}
