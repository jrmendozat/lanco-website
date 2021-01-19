<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SaveUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Http\Controllers\Controller;
use App\User;
use App\config_quoteandsell;
use Mail;

class UserController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'cell_phone'    => 'required|digits:11|unique:users',
            'password'      => 'required|string|min:6|confirmed',
        ]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(5);
        //dd($users);
        $config_quoteandsell = config_quoteandsell::first();
        return view('admin.user.index', compact('users'),compact('config_quoteandsell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $config_quoteandsell = config_quoteandsell::first(); 
        $seller =  user::where('user_type','sell')->orderby('name','desc')->pluck('name', 'id');
        return view('admin.user.create',compact('config_quoteandsell'),compact('seller'));
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(SaveUserRequest $request)
    {
        //dd($request);
        
        $data = [
            'name'              => $request->get('name'),
            'last_name'         => $request->get('last_name'),
            'email'             => $request->get('email'),
            'user'              => $request->get('user'),
            'password'          =>  \Hash::make($request->get('password')),
            'cell_phone'        => $request->get('cell_phone'),  
            'local_phone'       => $request->get('local_phone'),
            'user_type'         => $request->get('user_type'),
            'seller_assigned'   => $request->get('seller_assigned'),
            'active'            => $request->has('active') ? 1 : 0,
            'vip'               => $request->has('vip') ? 1 : 0,
            'address'           => $request->get('address'),
            'rif_Invoice'       => $request->get('rif_Invoice'),
            'name_invoice'      => $request->get('name_invoice'),
            'adress_invoice'    => $request->get('adress_invoice'),
            'create_by'         => Auth::user()->user 
         
        ];

        
        $this->validate($request, [
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|string|min:6|confirmed',
            'user_type'     => 'required|in:superadmin,admin-A,admin-B,admin-C,admin-D,sell,user,createmode,dealer',
            'cell_phone'    => 'required|digits:11|unique:users',
            
            
        ]);

        $config_quoteandsell = config_quoteandsell::first();
        $user = User::create($data);

        
        $message = $user ? 'Usuario agregado correctamente!' : 'El usuario NO pudo agregarse!';
        
        return redirect()->route('user.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(User $user)
    {
        
        $config_quoteandsell = config_quoteandsell::first();
        $id = $user->id;
        $user = user::find($id);
        
        $seller =  user::where('user_type','sell')->orderby('name','desc')->pluck('name', 'id');
        return view('admin.user.edit', compact('user','id'),compact('config_quoteandsell','seller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|max:255|',
            'password'      => 'required|string|min:6|confirmed',
            'user_type'     => 'required|in:superadmin,admin-A,admin-B,admin-C,admin-D,sell,user,createmode,dealer',
            'cell_phone'    => 'required|digits:11|',
            
        ]);
        
        $user->name = $request->get('name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->user = $request->get('user');
        $user->user_type = $request->get('user_type');
        $user->cell_phone= $request->get('cell_phone');   
        $user->local_phone = $request->get('local_phone');
        $user->user_type   = $request->get('user_type');
        $user->seller_assigned = $request->get('seller_assigned');
        $user->address = $request->get('address');
        $user->active = $request->has('active') ? 1 : 0;
        $user->vip = $request->has('vip') ? 1 : 0;
        $user->rif_Invoice = $request->get('rif_Invoice');
        $user->name_invoice = $request->get('name_invoice');
        $user->adress_invoice = $request->get('adress_invoice');
        if($request->get('password') != "") $user->password = $request->get('password');
        
        $updated = $user->save();
        
        $message = $updated ? 'Usuario actualizado correctamente!' : 'El Usuario NO pudo actualizarse!';
        
        return redirect()->route('user.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(User $user)
    {
        $deleted = $user->delete();
        
        $message = $deleted ? 'Usuario eliminado correctamente!' : 'El Usuario NO pudo eliminarse!';
        
        return redirect()->route('user.index')->with('message', $message);
    }


    public function deleteuser($id)
    {
        //
        
        $User = User::where('id', $id)->first();  
        $deleted = $User->delete();
        
        $message = $deleted ? 'Usuario eliminado correctamente!' : 'El Usuario NO pudo eliminarse!';
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('user.index',compact('config_quoteandsell'))->with('message', $message);

       
    }


    public function confirmdeleteuser($id)
    {
        //
        $config_quoteandsell = config_quoteandsell::first();
        return view('admin.user.delete-user',compact('id','config_quoteandsell'));
        
    }

    public function assingselltouser($id)
    {
        //
        $config_quoteandsell = config_quoteandsell::first();
       
        $user = user::find($id);
        $seller =  user::where('user_type','sell')->orderby('name','desc')->pluck('name', 'id');
        return view('admin.user.assingsell-user',compact('id','config_quoteandsell'),compact('seller','user'));
        
    }

    public function updateselluser(Request $request, $id)
    {
        //
        $user = user::find($id);
        $user->seller_assigned = $request->get('seller_assigned');
        $updated = $user->save();
        
        $message = $updated ? 'Usuario actualizado correctamente!' : 'El Usuario NO pudo actualizarse!';
        
        return redirect()->route('user.index')->with('message', $message);
        
        
    }

    private function sendEmail($Company_send_email,$email_contact,$nome_contact,
                               $company_name,$Client_Name,$Client_email,
                               $Client_name_invoice)
	{
		
		 /** Enviar sms al contacto de la compañia de nuevo movimiento registrado por un cliente en la web */
		

		
        $Body_message = "";
        $view = "email.newclient";
        
        $dataEmailClient = [
            'email' 				=> $email_contact,
            'subject' 				=> $company_name ,
            'bodyMessage' 			=> $Body_message,
            'companyName'   		=> $company_name, 
            'nameContact' 			=> $nome_contact,
            'orderId'     			=> $orderid,
            'nameClient'    		=> $Client_Name,
            'emailClient'   		=> $Client_email,
            'companyClient' 		=> $Client_name_invoice,
            'Company_send_email' 	=> $Company_send_email
        ];
		
			  
		Mail::send($view,$dataEmailClient,function($message) use ($dataEmailClient){
		    $message->from($dataEmailClient['Company_send_email'],'');
		    $message->to($dataEmailClient['email']);
		    $message->subject($dataEmailClient['subject']);
		});
		
				
	}
	
	private function sendSms($movil_contact,$nome_contact,
                            $company_name,$Client_Name,$Client_email,$Client_name_invoice,
                            $Client_movil)
	{
		$config_quoteandsell = config_quoteandsell::first();

		 /** Enviar sms al contacto de la compañia de nuevo movimiento registrado por un cliente en la web */
		$api_key = $config_quoteandsell->api_sms_key;

        
		if(strlen($movil_contact) == 11) {
			if(substr($movil_contact,0, 1) == '0') {
				$movil_contact = substr($movil_contact,1,10);
			} 
		}

		if(strlen($Client_movil) == 11) {
			if(substr($Client_movil,0, 1) == '0') {
				$Client_movil = substr($Client_movil,1,10);
			} 
		}

		$Contenido = 'Tienda en Linea: Un nuevo cliente se registro :'. $Client_Name. " Correo : ".$Client_email." Compañia : ".$Client_name_invoice;
		$movil = '+58'.$movil_contact;
		

		$data = array(
					"apikey" 		=> $api_key,
					"contenido" 	=> $Contenido, 
					"destinatario" 	=> $movil);

        
		//El servicio web acepta tanto JSON como XML. En este caso se convertirá en JSON                         
		$data_string = json_encode($data);                                                                                   
		$ch = curl_init('http://digaloya.noip.me/api/mensajes/envio.json');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
		//CURLOPT_RETURNTRANSFER: Si está configuada como 'false' (por defecto) el resultado de la llamada curl_exec() será impreso directamente. 
		//Para poder obtener y manipular la respuesta de la petición se debe configurar como 'true'  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 		  	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));
		$result = curl_exec($ch);
		curl_close($ch);
		$data = "";
		//Covertir la respuesta en el formato solicitado (JSON por defecto) para poder hacer algo con dicha respuesta
			
		//var_dump($result);
		//dd($result);
	}


}

