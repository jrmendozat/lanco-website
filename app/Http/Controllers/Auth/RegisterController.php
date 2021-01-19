<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\config_quoteandsell;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'cell_phone'    => 'required|string|min:10|max:11|unique:users',
            'password'      => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = substr($data['name'],1,1) . $data['last_name'];
        $user_type = 'user';
        $active = '1';

        $Client_Name = $data['name'].' '.$data['last_name'];
        $Client_email = $data['email'];
        $Client_movil = $data['cell_phone'];
        $companyClient = $data['name_invoice'];
       
        $config_quoteandsell = config_quoteandsell::first();
        
        if($config_quoteandsell->company_contact_email_1 <> '' and $config_quoteandsell->company_contact_1_enable)  {
            $this->sendEmail($config_quoteandsell->company_notification_email,
                             $config_quoteandsell->company_contact_email_1,
                             $config_quoteandsell->company_contact_name_1,
                             $config_quoteandsell->company_name,
                             $Client_Name,
                             $Client_email,
                             $companyClient);
        }    

        if($config_quoteandsell->company_contact_movil_1 <> '' and $config_quoteandsell->company_contact_1_enable)  {
            $this->sendSms($config_quoteandsell->company_contact_movil_1,
                                $config_quoteandsell->company_contact_name_1,
                                $config_quoteandsell->company_name,
                                $Client_Name,
                                $Client_email,
                                $companyClient,
                                $Client_movil);
        }    

        if($config_quoteandsell->company_contact_email_2 <> '' and $config_quoteandsell->company_contact_2_enable)  {
            $this->sendEmail($config_quoteandsell->company_notification_email,
                             $config_quoteandsell->company_contact_email_2,
                             $config_quoteandsell->company_contact_name_2,
                             $config_quoteandsell->company_name,
                             $Client_Name,
                             $Client_email,
                             $companyClient);
        }    

        if($config_quoteandsell->company_contact_movil_2 <> '' and $config_quoteandsell->company_contact_2_enable)  {
            $this->sendSms($config_quoteandsell->company_contact_movil_2,
                                $config_quoteandsell->company_contact_name_2,
                                $config_quoteandsell->company_name,
                                $Client_Name,
                                $Client_email,
                                $companyClient,
                                $Client_movil);
        }    


       
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user' => $user,
            'user_type' => $user_type,
            'active' => $active,
            'address' => $data['address'],
            'cell_phone' => $data['cell_phone'],
            'local_phone' => $data['local_phone'],
            'name_invoice' => $data['name_invoice'],

        ]);

            
           
    }

    private function sendEmail($Company_send_email,
                               $email_contact,
                               $name_contact,
                               $company_name,
                               $Client_name,
                               $Client_email,
                               $companyClient)
	{
		
		 /** Enviar sms al contacto de la compañia de nuevo movimiento registrado por un cliente en la web */
		

		
        $Body_message = "";
        $view = "email.newclient";
        
        $dataEmailClient = [
            'email' 				=> $email_contact,
            'subject' 				=> $company_name ,
            'bodyMessage' 			=> $Body_message,
            'companyName'   		=> $company_name, 
            'nameContact' 			=> $name_contact,
            'nameClient'    		=> $Client_name,
            'emailClient'   		=> $Client_email,
            'companyClient'         => $companyClient,
            'Company_send_email' 	=> $Company_send_email
        ];
		
        
		Mail::send($view,$dataEmailClient,function($message) use ($dataEmailClient){
		    $message->from($dataEmailClient['Company_send_email'],'');
		    $message->to($dataEmailClient['email']);
		    $message->subject($dataEmailClient['subject']);
		});
		
				
	}
	
    private function sendSms($movil_contact,
                            $nome_contact,
                            $company_name,
                            $Client_Name,
                            $Client_email,
                            $Client_name_invoice,
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

		$Contenido = 'Tienda en Linea: Un nuevo cliente se registro :'. $Client_Name. " Correo : ".$Client_email." Movil Cliente : ".$Client_movil;
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
