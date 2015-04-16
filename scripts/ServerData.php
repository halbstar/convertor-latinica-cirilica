<?php
Class ServerData
{
	protected $serverDataArr;
	function __construct()
	{
		$countDataArr = array(
			$this->countDataArr["CLIENT_IP"] = $this->resolveClinetIP(),
			$this->countDataArr["REQUEST_TIME"] = (gmdate("Y-m-d H:i:s", $_SERVER['REQUEST_TIME'])),
			$this->countDataArr["HTTP_REFERER"] = (!empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""),
			$this->countDataArr["HTTP_USER_AGENT"] = $_SERVER['HTTP_USER_AGENT'],
            $this->countDataArr["REMOTE_HOST"] = (!empty($_SERVER['REMOTE_HOST']) ? $_SERVER['REMOTE_HOST'] : "")

			);
	}

    /**
     * @return mixed
     */
    public function getServerDataArr()
    {
        return $this->countDataArr;
    }


	// various possible ways to get client ip (S.O. source)
	private function resolveClinetIP(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		} else			{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
			return $ip;
	}
}
//$s = new ServerData();
//print_r($s->getServerDataArr());