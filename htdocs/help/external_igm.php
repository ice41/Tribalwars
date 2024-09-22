<tr align="right">
                                                                                                                                        <td align="left" width ="33%"><a href="?article=banner">&laquo; Banner</a></td>
                                                                                                                                <td align="center" width ="33%"><a href="?article=server_info">Alte informatii</a></td>

                                                                                                                                        <td align="right" width ="33%"><a href="?article=map_data">Datele lumii &raquo;</a></td>
                                                                                                                        </tr>
                                                </table>

                                        </td>
                                </tr>
                                <tr>
                                        <td>
						<h1>Mesaje externe</h1>
						<h3>Expedierea de IGMs printr-o interfata externa</h3>

<p>Câteodata se doreste ca programe externe sa poata trimite mesaje catre jucatori, pentru a-i informa despre evenimente importante, fara a le controla identitatea. Pentru ca programarea de  Bots este conform regulilor interzisa, îti oferim noi posibilitatea aceasta printr-o interfata pe care ti-o punem la dispozitie.</p>

<p>Mesajele IGM sunt generate prin GET:</p>

<pre>http://ro1.triburile.ro/send_mail.php?from_id=FROM_ID&amp;api_key=API_KEY&amp;to=TO&amp;subject=SUBJECT&amp;message=MESSAGE</pre>

<h4>Ce înseamna parametri:</h4>

<ul>
<li>FROM_ID: ID de jucator( poate fi gasita de exemplu prin intermediul clasamentului)</li>
<li>API-Key: Triburile API-Key ( se gaseste la Setari->Setari)</li>
<li>TO: Numele ( nu ID) jucatorului care sa obtina mesajul</li>
<li>SUBJECT: Titlul mesajului</li>
<li>MESSAGE: mesajul</li>
</ul>

<p>Optiunea aceasta este libera numai pentru posesorul unui Cont-Premium. Daca optiunea aceasta este abuzata pentru spam sau jignirea altor jucatori, poate fi încuiat Contul.</p>

<h4>Exemplu în PHP:</h4>

<pre>
//Parametrii trebuie sa fie URL-decodati
$to = urlencode('exception');
$subject = urlencode('test &amp; test');
$message = urlencode('Acesta este un test');

$base_url = "http://ro1.triburile.ro/send_mail.php?from_id=FROM_ID&amp;api_key=API_KEY";

// URL aratare
$handle = fopen($base_url . "&amp;to=$to&amp;subject=$subject&amp;message=$message", 'r');
echo fgets($handle); // Dare de mesaj
fclose($handle);
</pre>                                   </td>
                                </tr>
                                <tr>
                                        <td>


                                        <table class="vis" width="100%">
                                                <tr align="right">
                                                                                                                        <td align="left" width ="33%"><a href="?article=banner">&laquo; Banner</a></td>
                                                                                                                        <td align="center" width ="33%"><a href="?article=server_info">Alte informatii</a></td>
                                                                                                                        <td align="right" width ="33%"><a href="?article=map_data">Datele lumii &raquo;</a></td>
                                                                                                        </tr>