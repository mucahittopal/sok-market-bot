# sok-market-bot

PHP ŞOK Market-bot
ŞOK Market zincir marketlerinin online ortamdaki ürünlerini JSON çıktısı alarak kullanabilirsiniz.

PHP' nin yanıt vermesi uzun süreceği için sunucu tarafında cron işi olarak çalıştırabilir veya sayfaları parça parça çekebilirsiniz.

<h1>Başarılı Durum</h1>

Sonuç verisi <b>başarılı</b> olduğu taktirde oluşacak çıktı verisi şöyledir;

<h2>JSON</h2>

<pre> 

{"ok":
  [{
    "link":"destek-kusburnu-karamurver-4x80-ml",
    "title":"Danino Destek Kuşburnu Karamürver 4*80 Ml",
    "fiyat":"7.95",
    "resim":"https://cdnd.ceptesok.com/product/420x420/21c6e_destek-kusburnu-karamurver-4x80-ml.jpg",
    "hash_id":"f5306efbab483a4a137d628665e48bd8"
  }
]}
</pre>


<h2>Array</h2>

<pre> 
  Array
  (
      [ok] => Array
          (
              [0] => Array
                  (
                      [link] => destek-kusburnu-karamurver-4x80-ml
                      [title] => Danino Destek Kuşburnu Karamürver 4*80 Ml
                      [fiyat] => 0,40   TL
                      [resim] => https://cdnd.ceptesok.com/product/420x420/21c6e_destek-kusburnu-karamurver-4x80-ml.jpg
                      [hash_id] => f5306efbab483a4a137d628665e48bd8
                  )
          )
  )</pre>


<h1>Başarısız Durum</h1>

Sonuç verisi <b>başarısız</b> olduğu taktirde oluşacak çıktı verisi şöyledir;

<h2>JSON</h2>

<pre> 
  {"error":"Ürünler Bulunamadı."}
</pre>


<h2>Array</h2>

<pre> 
  Array
  (
      [error] => Ürünler Bulunamadı.
  )
</pre>
