<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use DB;
class Login_con extends Controller
{
    public function index()
{
	return view('auth.create_acc');
}
public function login()
{
	return view('auth.login');
}

public function check_user(Request $r)
		{
			$email=$r->email;
			$password=$r->password;

			
			$txtCheck_User=  DB::table('users')->where('email',$email)->where('password',$password)->get();

			if(count($txtCheck_User)>0){
				$Admin_count =DB::table('users')->where('usertype','admin')->where('email',$email)->get() ;
				$Owner_count =DB::table('users')->where('usertype','owner')->where('email',$email)->get() ;
				if(count($Admin_count)>0)
				{
					$r->session()->put('admin_id',$txtCheck_User[0]->id);
					$r->session()->put('admin_name',$txtCheck_User[0]->name);
					$r->session()->put('admin_email',$txtCheck_User[0]->email);
					
					return redirect('/admin/dashboard');
				}
				else if(count($Owner_count)>0){
				
					$r->session()->put('owner_id',$txtCheck_User[0]->id);
					$r->session()->put('owner_name',$txtCheck_User[0]->name);
					$r->session()->put('owner_email',$txtCheck_User[0]->email);
					$id = Session::get('owner_id');
					
					$restaurants_id = DB::table('restaurants')->where('user_id',$id)->pluck('id');
					
				if(count($restaurants_id)>0)
				{
					
					$resid = $restaurants_id;
					$restaurants1 = DB::table('restaurants')->where('id',$resid)->first();
					
					session()->put('reslogo',$restaurants1->image);
					session()->put('resname',$restaurants1->name);
					session()->put('resId',$restaurants1->id);
                   
					return redirect('restaurant-owner/dashboard');
				}
				else{
					return redirect()->back()->with('msg', 'You Are Not Verified');
				}
					
				}
			
			}
			else{
				return redirect()->back()->with('msg', 'Email or Password does not match');  
			}

            

		}


        public function logout(Request $r)
		{
		
			$r->session()->forget('user_id');
			$r->session()->forget('user_name');

			return redirect('/login');

		}

		public function patnerwithus()
		{	
		
			return view('auth.partnerwithus');
		}


		public function create_patnerwithus(Request $request){
			$email = $request->email;

			$check_email=  DB::table('users')->where('email',$email)->get();
		
	if(count($check_email)>0) ////this is to check duplicate email insertion
	{
		
		
		
		return redirect('/partnerwithus')->with('msg','Please Enter Registered Email');

	}else{
       
		DB::table('patnerwithuses')->insert([
			'name'=>$request->name,
			'address'=>$request->address,
			'first_name'=>$request->first_name,
			'sur_name'=>$request->sur_name,  
			'phone'=>$request->phone,
			'res_phone'=>$request->res_phone,
			'email'=>$request->email,
			'no_of_loc'=>$request->no_of_loc, 
			'type_of_cuisine'=>$request->type_of_cuisine, 
			// 'user_id'=>'1', 

		]);
		return redirect('/login');
		}
}
		public function forgot_password(){
			return view('auth.forgot_password');
		}
		public function create_forgot_pass (Request $request){
			//print_r($_POST);
			$email = $request->email;
			$check_email=  DB::table('users')->where('email',$email)->where('usertype','owner')->pluck("password");
			$customers = collect($check_email)->implode(','); 
		
			if(count($check_email)>0) 
			{
				$value = config('app.url');	
			
				?>
		
	<script src= 
		"https://smtpjs.com/v3/smtp.js"> 
	</script> 

<script type="text/javascript"> 
	
	Email.send({ 
		Host: "smtp.gmail.com", 
		Username: "harshinfusion29@gmail.com", 
		Password: "infusion@2020", 
		To: '<?php echo $email ;?>', 
		From: "harshinfusion29@gmail.com", 
		Subject: "Sending Your credentials", 
		Body: "username : <?php echo $email ; ?> <br> Password : <?php echo $customers ; ?> <br><br><br> Please Visit This Site :  <?php echo $value ; ?>", 
	}) 
		.then(function (message) { 
		alert("mail sent successfully") 
	
		window.location = "<?php echo $value; ?>/login";
		
		}); 
		//
</script> 

<?php
exit;
	return redirect('/login')->with('msg', 'please check your mailbox'); 	
	}
			else{
				return redirect()->back()->with('msg', 'Wrong Email Address ');  
			}
		}
}