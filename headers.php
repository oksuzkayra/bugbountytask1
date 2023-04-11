<html>

  <head>
	<title>HTTP Headers</title>
  </head>

  <body>
  	<h1>HTTP Security Headers</h1>

  	<ul>
		<li><h2>HSTS (HTTP Strict Transport Security)</h2></li>
		<p>Adından da anlaşılacağı üzere, güvenli web iletişimini zorlayan bir mekanizmadır. Şu şekilde kullanılır:  

		<code><br><br>
		Strict-Transport-Security: max-age=31536000; 
		</code><br><br>

		İlk gönderilen istek MITM saldırılarını maruz kalabileceğinden preload özelliği kullanılıyor. Bunun için gerekli koşulları sağlayarak sitemizi preload listelerine sokmamız gerekiyor. Preload özelliği şu şekilde kullanılıyor: 

		<code><br><br>
		Strict-Transport-Security: max-age=10886400; includeSubDomains; preload
		</code><br><br></p>

		<li><h2>HTTP PKP (Public Key Pinning)</h2></li>
		<p>Chrome'un 13 versiyonundan itibaren desteklenen bu özellik sayesinde siteler kendi sertifikalarının fingerprint yani hash değerlerini Public-Key-Pinning response headerı ile tarayıcılara bildirebiliyor.

		Tarayıcılar bu sertifikaları hafızalarına alıp, bundan sonra bu sitelere herhangi bir istekte bu belirtilen sertifikalar dışında bir sertifika iddia edilirse, güvenli bağlantı kurmayı reddediyor, hatta bu örnekte olduğu gibi belirtilen URL'e rapor ediyor.
		<code><br><br>
			Public-Key-Pins: pin-sha256="d6qzRu9zOECb90Uez27xWltNsj0e1Md7GkYYkVoZWmM=";
			pin-sha256="E9CZ9INDbd+2eRQozYqqbQ2yXLVKB9+xcprMF+44U1g=";
			report-uri="http://example.com/pkp-report"; max-age=10000; includeSubDomains
		</code><br><br></p>

		<li><h2>Expect-CT</h2></li>
		<p>
		Amacı, tarayıcıya sertifikanın orijinal olduğundan emin olmak için ek arka plan kontrolleri yapması gerektiğini bildirmektir. Bir sunucu Expect-Ct başlığını kullandığında, istemciden kullanılan sertifikaların genel Sertifika Şeffaflığı (CT) günlüklerinde bulunduğunu doğrulamasını ister.
		<code><br><br>
			Expect-CT: max-age=3600, enforce, report-uri="https://ct.example.com/report"
		</code><br><br></p>

		</p>

		<li><h2>X-Frame-Options</h2></li>
		<p>Clickjacking saldırılarını önlemek için kullanılır. XFO harici sitelere iframe olarak sitemizin yerleştirilip yerleştirilemeyeceğine karar vermemizi sağlar. Kullanımı şu şekildedir:
		<code><br><br>
			X-Frame-Options: DENY | SAMEORIGIN | ALLOW-FROM URL
		</code><br><br>
		XFO yerine Content-Security-Policy frame-ancestors header'ı da kullanılabilir.
		</p>

		<li><h2>CSP (Content-Security-Policy)</h2></li>
		<p>
		2012 Kasım ayında ilk versiyonu hayatımıza giren CSP, başta XSS olmak üzere, Clickjacking, Protocol Downgrading, Frame Injection vb bir dizi zafiyete karşı istemci tarafında ekstra güvenlik katmanı sunmaktadır. Whitelist metodu kullanır. Kullanımı aşağıdaki gibidir: 
		<code><br><br>
			Content-Security-Policy: script-src 'self' https://apis.google.com
		</code><br><br>



		</p>

		<li><h2>X-XSS-Protection</h2></li>
		<p>
		Tarayıcıda Reflected XSS güvenlik filtresini etkinleştirir. Kullanımı şöyledir: 
		<code><br><br>
			X-XSS-Protection: 1; mode=block; report=https://domain.tld/folder/file.ext
		</code><br><br>
		</p>

		<li><h2>X-Content-Type-Options</h2></li>
		<p>
		Bunu anlamak için öncelikle MIME Sniffing'i anlamak gerekir. MIME Sniffing bir tarayıcının indirmekte olduğu dosyanın içerik türünü otomatik olarak algılama (ve düzeltme) yeteneğidir. Ama bu özellik sayesinde content-Type değerini belirtmemize rağmen bizi dinlemeyerek tarayıcı kendi algıladığı dosya türü ile işlem yapar. Bu yüzden image stringleri içine javascript enjekte ederek bunları çalıştırabiliriz. X-Content-Type-Options ise MIME Sniffing özelliğini kapatır. Kullanımı şu şekildedir: 
		<code><br><br>
			X-Content-Type-Options: nosniff
		</code><br><br>
	


		</p>

		<li><h2>Referrer-Policy</h2></li>
		<p>
		Bir site, kendisi üzerinden başka bir siteye erişim yapıldığında kendi adresini Referrer header'ı ile belirtir. 
		<code><br><br>
			Referrer-Policy: same-origin
		</code><br><br>
		</p>





  </ul>



  </body>


</html>