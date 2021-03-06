<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Bitrix24Controller extends Controller
{
    protected function webHook()
    {
        $webhook = 'https://isigo.bitrix24.com.br/rest/1/bqp8u3keaiaacp9e/';

        return $webhook;
    }  
    
    public function getDeals()
    {        
        $queryUrl = $this->webHook()."crm.deal.list";
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
    
                            CURLOPT_SSL_VERIFYPEER => 0,
                            CURLOPT_POST => 1,
                            CURLOPT_HEADER => 0,
                            CURLOPT_RETURNTRANSFER => 1,
                            CURLOPT_URL => $queryUrl	
    
                        ));
    
        $result = curl_exec($curl);
        curl_close($curl);
    
        $result = json_decode($result, 1);
    
        if (array_key_exists('error', $result)){
    
            return response()->json($result, 400);
    
        }
    
        return response()->json($result, 200);   
    }

    public function getDeal(Request $request, $id)
    {
        $queryUrl = $this->webHook()."crm.deal.get";

        $queryData = http_build_query(array(
            'ID' => $id
        ));
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
    
                            CURLOPT_SSL_VERIFYPEER => 0,
                            CURLOPT_POST => 1,
                            CURLOPT_HEADER => 0,
                            CURLOPT_RETURNTRANSFER => 1,
                            CURLOPT_URL => $queryUrl,
                            CURLOPT_POSTFIELDS => $queryData
    
                        ));
    
        $result = curl_exec($curl);
        curl_close($curl);
    
        $result = json_decode($result, 1);
    
        if (array_key_exists('error', $result)){
    
            return response()->json($result, 400);
    
        }
    
        return response()->json($result, 200); 

    }

    public function addDeal(Request $request)
    {
        $data = $request->only([
            'title' => $request->titulo,
            'category' => $request->category,
            'comments' => $request->comments
        ]);

        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:100'],
            'category' => ['required', 'int', 'max:11'],
            'comments' => ['required', 'string', 'max:255']
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $queryUrl = $this->webHook()."crm.deal.add";

        $queryData = http_build_query(array(
                        'fields' => array(    
                            'TITLE' => $data['title'],
                            'CATEGORY_ID' => $data['category'],
                            'COMMENTS' => $data['comments']    
                        ),    
                    ));
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
    
                            CURLOPT_SSL_VERIFYPEER => 0,
                            CURLOPT_POST => 1,
                            CURLOPT_HEADER => 0,
                            CURLOPT_RETURNTRANSFER => 1,
                            CURLOPT_URL => $queryUrl,
                            CURLOPT_POSTFIELDS => $queryData,	
    
                        ));
    
        $result = curl_exec($curl);
        curl_close($curl);
    
        $result = json_decode($result, 1);
    
        if (array_key_exists('error', $result)){
    
            return response()->json($result, 400);
    
        }
    
        return response()->json($result, 200);   

    }

    public function updateDeal($id)
    {

    }

    public function deleteDeal($id)
    {

    }
}
