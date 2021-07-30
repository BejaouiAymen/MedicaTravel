<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
		$this->middleware('admin',['only' =>['destroy','user_list']]);
		
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	 $admin =Profile::get();
      return view('admins.team',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$profile=User::find(auth()->user()->id)->profile;
		$k=auth()->user()->id;
		if($profile==null){
	   		return view('admins.ajout_admin');
		}else{
				return redirect("/admin/$k");
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin=new Profile();
		$message=new Message();
		$message->user_id=auth()->user()->id;
		$message->received_id=1;
		$message->body="Bonjour j'ai cree mon profile cbon et je vais vous imforme puisque vous etes notre Chef";
		$message->save();
			$this->validate(
		$request,[
		'nom'=>['required','min:3'],
		'smalldescription'=>['required','min:3'],
		'age'=>['required','min:1'],
		'prenom'=>['required','min:4'],
		'image'=>['required','min:10'],	
		'email'=>['required','min:10'],					
		'telephone'=>['required','min:7'],					
		'fulldescription'=>['required','min:3']
				
		]
		);
		
		$admin->nom=request('nom');
		$admin->smalldescription=request('smalldescription');
		$admin->fulldescription=request('fulldescription');
		$admin->age=request('age');
		$admin->prenom=request('prenom');
		$admin->URL=request('image');
		$admin->email=request('email');
		$admin->telephone=request('telephone');
		$admin->user_id=auth()->user()->id;
		
		$messag=new Message;
		$messag->recieved_id=auth()->user()->id;
		auth()->user()->name=$admin->prenom + $admin->nom;
		auth()->user()->email=$admin->email;
		$admin->save();
		return redirect('/hotel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
		$profile=User::find(auth()->user()->id)->profile;
		return view('admins.affiche_profile',compact('profile'));   
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       
		$admin=User::find(auth()->user()->id)->profile;
		
		return view('admins.user_edit',compact('admin'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
      	$admin=Profile::find($id);
		
	  	$admin->nom=request('nom');
		$admin->smalldescription=request('smalldescription');
		$admin->fulldescription=request('fulldescription');
		$admin->age=request('age');
		$admin->prenom=request('prenom');
		$admin->URL=request('image');
		$admin->email=request('email');
		$currentUser=User::find(auth()->user()->id);
		$currentUser->name=$admin->nom." ".$admin->prenom;
		$currentUser->email=$admin->email;
		$currentUser->save();
		$admin->save();
		return redirect('/admin');	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)->delete();
        return redirect("/administrateur/userlist");
    }
	
	public function message_index($id)
	{
		//les couples (receiver_id and sender_id) qui ont envoyer ou recu un message pour le logged_in user/utilisateur..
		$messages= DB::table('messages')
			->select('received_id as received_id', 'user_id as user_id')
			->distinct()
			->where('user_id', '=', auth()->user()->id)
    		->orWhere('received_id', '=', auth()->user()->id)
    		->get(); 
			
			//la list des personnes qui ont a envoyer ou recevoir un message en interaction avec cette utilisatuer	
			$i=0;
			foreach ($messages as $msg) {
				$i++;
				if($msg->received_id!=auth()->user()->id){
					$caracter[$i]=User::where('id',$msg->received_id )
					->get();	
				}
				if($msg->user_id!=auth()->user()->id){
					$caracter[$i]=User::where('id',$msg->user_id )
					->get();	
				}				
			}
		//supprimer les repetitions et refaire les indexe du elements du tableau parceque la suppression des elements a laiser des gaps..
		$distinctCaracters= array_values(array_unique($caracter));
		
		for ($i=0; $i < count($distinctCaracters); $i++) { 
			$users=array_values($distinctCaracters);

			 //la requette qui determine le dernier message envoyer ou recu pour this utilisateur et les autres utilisateur qui l'ont contacter
			 //resultat du cette requette dans un tableau ($var)
			$var[$i]= Message::
			 where(function ($query) use ($users,$i) {
                $query->where('received_id','=',$users[$i]->first()->id)
		           	->orWhere('user_id','=',$users[$i]->first()->id);
            })
			->where(function ($query2) {
                $query2->where('received_id','=',auth()->user()->id)
		           	->orWhere('user_id','=',auth()->user()->id);
            })		           
					->orderBy('created_at', 'DESC')
					->first();				
		}
		//la partie des messages inbox a terminer...
		
		//la 2eme partie des messages du selected user
		$requette= Message::
			 where(function ($query) use ($id) {
                $query->where('received_id','=',$id)
		           	->orWhere('user_id','=',$id);
            })
			->where(function ($query2) {
                $query2->where('received_id','=',auth()->user()->id)
		           	->orWhere('user_id','=',auth()->user()->id);
            })		           
					->orderBy('created_at', 'asc')
					->get();	
		
		
		
		//la 2eme partie est terminer!
		//return ($requette);  
			return view('admins.message',compact('distinctCaracters','var','requette','id'));		
	}
	
	public function send_message(Request $request, $id)
	{
		$message=new Message();
		$message->user_id=auth()->user()->id;
		$message->received_id=$id;
		$message->body=request('body');
		$message->save();
		
		return redirect("/messages/$id");	
		
	}
	public function user_list()
	{
		$users=User::get();
		return view("admins.user_list",compact("users"));
	}
	
}
