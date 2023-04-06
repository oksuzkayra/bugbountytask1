<html>
<head>
</head>

<body>
  
 <h1>Cookie nedir?</h1>
  <p>
    	Cookie'ler girdiğimiz sitelerin bizi hatırlaması için bilgisayarımıza kaydettikleri küçük verilerdir. 
  </p>

	<ul><h2>Cookie Flags</h2>

		<li>Expire/Max-Age</li>
		<li>Secure</li>
		<li>Domain</li>
		<li>Path</li>
		<li>HTTPOnly</li>
		<li>SameSite</li>
	</ul> <br>

  <p>
	  Cookieler web sunucusundan bir HTTP Response'unda gönderilen <b>Set-Cookie</b> header field'ı kullanılarak ayarlanır. Bu header field, web tarayıcısına çerezi saklaması ve gelecekteki isteklerde 	   sunucuya geri göndermesi talimatını verir. Örnek olarak tarayıcı Web Sitesinin ana sayfası için www.example.org'a ilk HTTP requestini gönderir. 
	<code><br><br>
	GET /index.html HTTP/1.1<br>
	Host: www.example.org<br>
	...
	</code><br><br>
	Sunucu iki Set-Cookie header field'ı ile yanıt verir.
	<code><br><br>
	HTTP/1.0 200 OK<br>
	Content-type: text/html<br>
	Set-Cookie: theme=light<br>
	Set-Cookie: sessionToken=abc123; Expires=Wed, 09 Jun 2023 10:18:14 GMT<br>
	...
	</code><br><br>
	
	Sunucunun HTTP response'u web sitesinin ana sayfasının içeriğini içerir. Ancak tarayıcıya iki çerez ayarlaması talimatını da verir. İlki olan <b>theme</b> Expires veya Max-Age özelliğine sahip olmadığı için Session Cookie olarak kabul edilir. Session cookie'ler tarayıcı kapandıktan sonra silinmek üzere tasarlanmıştır. İkincisi(sessionToken) tarayıcıya Expires değerini(silinme zamanı) içerdiğinden Persistent Cookie olarak kabul edilir. Ardından tarayıcı <b>spec.html</b> sayfasını ziyaret etmek için iki cookie bilgisini içeren başka bir istek gönderir. 
	<code><br><br>
	GET /spec.html HTTP/1.1<br>
	Host: www.example.org<br>
	Cookie: theme=light; sessionToken=abc123<br>
	...
	</code><br><br>
	
	Bu şekilde sunucu bu HTTP request'inin bir öncekiyle ilgili olduğunu bilir. Bir cookie'yi kaldırmak için sunucunun, Set-Cookie son kullanma tarihi geçmişte olan bir header field içermesi gerekir. Cookieler JavaScript tarafından da ayarlanabilir. Örneğin aşağıdaki kod değeri 20 ve ismi sıcaklık olan bir cookie oluşturur. 
	<code><br><br>
	document.cookie = "temperature=20";
	</code><br><br>
	
Çerezler sınıflara ayrılır. Çerezleri şu şekilde sınıflandırabiliriz.
  </p>
  <ul>
	<li><h2>Session Cookie</h2> </li> 
	<p>Kullanıcı bir web sitesinde gezinirken yalnızca geçici bellekte bulunur. Cookie bilgileri, kullanıcı tarayıcısını kapatıığında silinir. Tarayıcı tarafından kendilerine atanan bir son kullanma tarihinin olmamasıyla tanımlanır.</p>
  	<li><h2>Persistent Cookie</h2></li>
	<p>Belirli bir tarihte veya belirli bir süre sonra sona erer. Persistent Cookie'nin kyaratıcısı tarafından ayarlanan kullanım ömrü boyunca, kullanıcının ait olduğu web sitesini her ziyaret ettiğinde veya kullanıcı başka bir web sitesine ait bir kaynağı her görüntülediğinde(reklam gibi) bilgileri sunucuya iletecektir.</p>
	<li><h2>Secure Cookie</h2></li>
	<p>Güvenli bir cookie yalnızca şifrelenmiş bir bağlantı(yani HTTPS) üzerinden iletilebilir. Bu çerezin gizli dinleme yoluyla çerez hırsızlığına maruz kalma ihtimalini azaltır. Tanımlama bilgisine <b>Secure</b> flag eklenerek cookie güvenli hale getirilir.</p>
	<li><h2>HTTP-Only Cookie</h2></li>
	JavaScript gibi istemci tarafı API'ler tarafından erişilemez. Bu kısıtlama XSS yoluyla cookie hırsızlığı tehdidini ortadan kaldırır. Ancak cookie, Cross Site Tracing(XST) ve Cross-Site Request Forgery(CSRF) saldırılarına karşı savunmasız kalır. Cookie'ye <b>HTTPOnly</b> flag eklenerek bu özellik verilir. 
	<li><h2>Same-Site Cookie</h2></li>
	<p>Google Chrome 2016'da <b>SameSite</b> özelliğine sahip bir cookie tanıttı. SameSite özellik'u Strict,Lax ve None değerlerine sahip olabilir. <b>SameSite=Strict</b> ise tarayıcılar cookieleri yalnızda aynı domaine sahip olan hedefe gönderebilir. Bu CSRF saldırılarını etkili bir şekilde azaltır. <b>SameSite=Lax</b> ise tarayıcılar domain farklı olsa bile hedef domaine istekleri olan cookieleri gönderir. Ancak üçüncü taraf cookieleri(iframe içinde) değil, yalnızca GET ile gönderilebilecek güvenli istekler için gönderir. <b>SameSite=None</b> ise üçüncü taraf(third-party)(siteler arası) cookielere izin verir. Ancak çoğu tarayıcı SameSite=None Cookie üzerinde secure özellik gerektirir.</p> 
	<li><h2>Supercookie</h2></li>
	<p>Bir Supercookie, bir Top-Level Domain'in(örneğin .com) veya genel bir soneki (örneğin .co.uk) içeren bir cookiedir.Tarayıcıda depolanmazlar. Bir İnternet Servis Sağlayıcısı(ISS) ile http header'ına eklenir.</p> 
	<li><h2>Zombie Cookie</h2></li>
	<p>Bir web sunucusu tarafından bir kullanıcının bilgisayarına, ziyaretçinin web tarayıcısının ayrılmış cookie depolama konumunun dışındaki gizli bir konuma yerleştirilen ve sonrasında otomatik olarak bir HTTP cookie'sini normal bir cookie olarak yeniden oluşturan veri ve koddur.</p>
	<li><h2>Cookie Wall</h2></li>
	<p>Bir web sitesinde bir cookie duvarı açılır ve kullanıcıyı web sitesinin çerez kullanımı hakkında bilgilendirir. Reddetme seçeneği yoktur ve izleme çerezleri olmadan web sitesine erişilemez ise bu Cookie Wall'dır.</p>
	
	<h1>Secure Cookie nasıl ilan edilir?</h1>
	<code><br>
		Set-Cookie: sessionId=QmFieWxvbiA1; HTTPOnly; Secure; SameSite=Strict
	</code><br><br>

<?php
    $cookie_name="user";
    $cookie_value="kayra-oksuz";
//Create a cookie
    setcookie($cookie_name, base64_encode($cookie_value), time() + (86400 * 30), "/");//1 gün = 86400
	echo '<a href="read_cookie.php">Çerezleri Oku</a>';
	
//Deleting a cookie
    //setcookie($cookie_name, $cookie_value, time() - (86400 * 30));

  ?>

</body>

</html>
