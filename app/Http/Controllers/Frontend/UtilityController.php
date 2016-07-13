<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class UtilityController extends Controller
{    

	protected $methods = array(
		'get'     => false,
		'post'    => true,
		'put'     => true,
		'patch'   => true,
		'delete'  => false,
		'options' => false,
	);


    public function token(){
        echo  csrf_token();        
        return ;
    }

    public function getAllowedMethods()
	{
		return $this->methods;
	}

    public function ListCurl($method, $url, $options, $headers=null){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_URL, $url);		
		if (!empty($options)) {
			curl_setopt_array($ch, $options);
		}			

		if ($method === 'post') {
			curl_setopt($ch, CURLOPT_POST, 1);
		} elseif ($method !== 'get') {
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
		}

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		if ($this->methods[$method] === true) {
			curl_setopt($this->ch, CURLOPT_POSTFIELDS, $request->encodeData());
		}

    }


}
