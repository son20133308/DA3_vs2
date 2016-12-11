<?php 
	function Menu($data , $id) {
		$host = "http://localhost:8000/";
		foreach ($data as $item ) {
			if ($item["parent_id"] == $id) {
				echo '<li><a href="'.$host.'the-loai/'.$item["id_theloai"].'/'.$item["slug"].'">'.$item["ten"].'</a>';
				Menu($data, $item["id_theloai"]);
				echo '</li>';
			}
		}
	}
	function text_limit($str,$limit)
	{
		$str_s = "";
		if(stripos($str," ")){
			$ex_str = explode(" ",$str);
		if(count($ex_str)>$limit){
			for($i=0;$i<$limit;$i++){
			$str_s.=$ex_str[$i]." ";
			}
			$str_s = $str_s."...";
		return $str_s;
		}else{
			return $str;
			}
		}else{
			return $str;
		}
	}
	function url_r($url){
		$url_r ="";
		$ex_str = explode("/",$url);
		$url_r = $ex_str[2];
		return $url_r;
	}

	function url_xs($url){
		$url = url_r($url);
		$http = "http://";
		$http = $http.$url;
		return $http;
	}
?>