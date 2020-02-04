<?php require_once 'random-user-agent.php';

  ini_set('memory_limit', '256M');
  ini_set('max_execution_time', 59 * 60);
  set_time_limit(59 * 60);


  $siteURL='https://www.ceptesok.com/';

  function siteConnect($site,$url,$kategorimi=false)
  {
  	$tablo=[];
  	$ch = curl_init();
  	$hc = randomUserAgent();
  	curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
  	curl_setopt($ch, CURLOPT_URL, $site.$url);
  	curl_setopt($ch, CURLOPT_USERAGENT, $hc);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	$siteFull= curl_exec ( $ch ); 
  	curl_close($ch);

  	if($kategorimi){
  		$data=json_decode($siteFull);
	  	foreach($data->payload->categories as $value){
	  		$link=$value->slug;
	  		$title=$value->name;
	  		$id=$value->id;
	  		$tablo[]=array($link,$title,$id);
	  	}	
  		return $tablo;
  	}else{
  		$data=json_decode($siteFull);
	  	foreach($data->payload->products as $value){
	  		$link=$value->link_name;
	  		$title=$value->warranty_description;
	  		$fiyat=$value->serial_market_price;
	  		$resim='https://cdnd.ceptesok.com/product/420x420/'.$value->files[0]->document_href;
	  		$hash_id=md5($link.$resim.$title);
	  		$tablo[]=array('link'=>$link,'title'=>$title,'fiyat'=>$fiyat,'resim'=>$resim,'hash_id'=>$hash_id);
	  	}	
  		return $tablo;
  		
  		
  	}	
  	return $tablo;
  }




  $tablo=[];
  $kategoriler=siteConnect($siteURL,'api/v1/categories',true);
  foreach($kategoriler as $kat)
  {
  	$id=$kat[2];
  	for($i = 1; $i<10000; $i++){
  		$tabloYeni=siteConnect($siteURL,'api/v1/products?page='.$i.'&categoryId='.$id);
  		if(empty($tabloYeni)){
  			break;
  		}
  		$tablo=array_merge($tablo,$tabloYeni);
  	}
  }

if(!empty($tablo)){
	  $Sonuc['ok']=$tablo;
  }else{
	  $Sonuc['error']='Ürünler Bulunamadı.';
  }
	
  print_r(json_encode($Sonuc));

  ?>
