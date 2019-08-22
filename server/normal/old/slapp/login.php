<?php 

#https://api.weixin.qq.com/sns/jscode2session?appid=APPID&secret=SECRET&js_code=JSCODE&grant_type=authorization_code


class wxAppLogin 
{
	private $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=';
	private $request_code;
	private $Appid;
	private $AppSecret;
	private $loginCode;
	private $grant_type;
	private $js_code;

	function __construct($code){
		$this->request_code = '&js_code='.$code.'&grant_type='.$code;
		$this->setData();
	}



	function setData(){
		$this->Appid = 'wx9c7a7ab0badad68c';
		$this->AppSecret = 'e3dec2989725088eac68f56175d59e31';
		$this->loginCode = '';
		$this->grant_type = '';
		$this->js_code = '';	
	}

	function getinfo(){
		$vurl = $this->url.$this->Appid.'&secret='.$this->AppSecret.$this->request_code;
		var_dump($vurl);
		return https_request($vurl);
	}

	function getAppIdSec()
	{
		return array(
			'appid' => $this->Appid,
			'appsec' => $this->AppSecret
		);
	}

	function setWxUserData(){

	}
}
