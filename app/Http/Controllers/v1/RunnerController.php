<?php


namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Runner;
use Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Ixudra\Curl\Facades\Curl;

class RunnerController extends Controller
{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
			'fname' => 'required',
		    'email' => 'unique:runners',
		], [
			'fname.required' => 'First Name Required',
		    'email.unique' => 'Email already registered'
			
		]);
		
		if ($validator->fails()) { 
           return response()->json(['errors'=>$validator->errors()], 422);
        }
		
	   $rno = IdGenerator::generate(['table' => 'runners', 'field' => 'runner_no', 'length' => 7, 'prefix' =>'XYZ', '-' ]);
		
	   $rec_id = mt_rand(1, 100);
		
	   $runner = new Runner();
	   $runner->runner_no   = $rno;
	   $runner->fname       = $request->fname;
	   $runner->sname       = $request->sname;
	   $runner->gender      = $request->gender;
	   $runner->age         = $request->age;
	   $runner->region      = $request->region;
	   $runner->email       = $request->email;
	   $runner->phoneno     = $request->phoneno;
	   $runner->nationality = $request->nationality;
	   $runner->tname       = $request->tname;
	   $runner->rcat        = $request->rcat;
	   $runner->tsize       = $request->tsize;
       $runner->save();

	   $msg = 'Greetings ' .  $runner->fname . ', Your have been successfully registered for '. $runner->rcat . '. Your Runner No is - ' . $runner->runner_no . '. We will send you further instructions on how to proceed!';
		
	   $api_key='c054131ebcbdb2ae';
       $secret_key = 'ZTBmZWM0MjFmMzI1MjIyMzBkNTA0OTI2Y2IzMzg0MTYzNzM0OTkzOWYwMTVlZjZkNTFmMzhjMjJmODViZDZhNw==';

       $data = [
	       'source_addr' => 'INFO',
           'encoding'=>0,
           'schedule_time' => '',
           'message' => $msg,
           'recipients' => [array('recipient_id' => $rec_id,'dest_addr'=> $runner->phoneno)]
       ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://apisms.beem.africa/v1/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
        "accept: */*",
        "accept-language: en-US,en;q=0.8",
        "content-type: application/json",
		'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
       ),
       ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
		
	   return response()->json($runner);
    }
	
	public function test () {
		$rec_id = mt_rand(1, 100);
		
		return response()->json($rec_id);
	}
	
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	   //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     //
    }
}
