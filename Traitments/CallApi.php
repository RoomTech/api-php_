<?php

class CallApi
{

  public $method, $url, $data;

  public function __construct(string $method = 'GET', string $url, $data = [])
  {
    $this->method = $method;
    $this->url = $url;
    $this->data = $data;
  }

  public function sendRequest()
  {
    $ch = curl_init();

    $test = curl_setopt($ch, CURLOPT_URL, $this->url);
    //Quand il s'agit d'une requete en POST

    if($this->method == 'POST'){
      curl_setopt($ch,CURLOPT_POST, true);
      curl_setopt($ch,CURLOPT_POSTFIELDS, $this->data);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      return $response;
    }

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Cache-Control: no-cache",
      "content-type:application/json;charset=utf-8"
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    return json_decode($response);
  }
}
