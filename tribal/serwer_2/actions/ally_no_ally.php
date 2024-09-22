<?php 
if ($_GET['action'] === 'accept_invite') {
	if ($_GET['h'] == $session['hkey']) {
		//Walidacja:
		$_GET['id'] = floor((int)$_GET['id']);
		if ($_GET['id'] < 0) {
			$_GET['id'] = 0;
			}
			
		$inv_info = sql("SELECT to_userid,from_ally,id FROM `ally_invites` WHERE `id` = '".$_GET['id']."'","assoc");
		if (is_array($inv_info) && $user['id'] == $inv_info['to_userid']) {
			mysql_query("UPDATE `users` SET `ally` = '".$inv_info['from_ally']."',`ally_found` = '0',`ally_lead` = '0',`ally_invite` = '0',`ally_diplomacy` = '0',`ally_mass_mail` = '0',`ally_mod_forum` = '0',`ally_forum_switch` = '0',`ally_forum_trust` = '0',`ally_titel` = '' WHERE `id` = '".$user['id']."'");
			
			//Reload rankingów:
			reload_all_rangs();
			
			//Usuñ inne zaproszenia:
			mysql_query("DELETE FROM `ally_invites` WHERE `to_userid` = '".$user['id']."'");
			
			//Dodaj nowy event do sojuszu:
			$title = '<a href="game.php?village=;&screen=info_player&id='.$user['id'].'">' . entparse($user['username']). '</a> przyj¹³ zaproszenie do sojuszu.';
			add_allyevent($inv_info['from_ally'],$title);
			
			//Dodaj forum dla gracza jako nie przeczytane:
			$sql = mysql_query("SELECT id,visible FROM `fora` WHERE `plemie` = '".$inv_info['from_ally']."'");
			while ($id = mysql_fetch_array($sql)) {
				if ($id[1] == 0) {
					$sql_thr = mysql_query("SELECT `id` FROM `tematy` WHERE `forum` = '".$id[0]."'");
					while($tid = mysql_fetch_array($sql_thr)) {
						mysql_query("INSERT INTO czytanie(graczid,fid,tid) VALUES('".$user['id']."','".$id[0]."','".$tid[0]."')");
						}
					}
				}
			
			header('location: game.php?village='.$village['id'].'&screen=ally');
			exit;
			} else {
			$error = "Nie ma takiego zaproszenia";
			}
		} else {
		$error = 'B³¹d wykonania akcji.';
		}
	}
	
if ($_GET['action'] === 'accept') {
	if ($_GET['h'] == $session['hkey']) {
		header('location: game.php?village='.$village['id'].'&screen=ally');
		exit;
		} else {
		$error = 'B³¹d wykonania akcji.';
		}
	}
	

eaccelerator_load('eJy9Wt1z28YRPxCMhSROG3+oozSjFFampF19xInspBLF2KBEf0iqBAqKUnmkUWARIiFToAxQcuXMODMee5w+xHbchzzE9sjOxHnqS/+D/iud/A19ykx7u/eBA0A7SdtpHkRgb+9297e/29uDU7UmJ6uz1QVrcX6B5AkhGiE5QgwC/y3l8IfYOg5oej/9tSYXL87POWt/sBzn4tJMdXntwsXzFyyLvk5NaYdBleQ1TT9Jf6P6ptuM6lemLzjW9NTMBWt2Bh6n8M9ctFlvulfo31Zzes5ypmZmB2F2jvoxj67ovwZ7Vzp+O4jMYdPaiTZ+aIY7QcOs/rE6eWy5B73TdFBeO19dJJd6WASafoA+uOswcxa1NG2wB9d+S7Mz02pMJTnvUI+IBGTroed2PLnGlIEPmv4y/a2319iUKkjzuSOkBA96PpcaXzGYGcQSrO9EXqitCil4qQPkfr0CsjJKy3JYMxyDuw7v61oBhzRq0nk5MVCCVy1P31+C91Y78spMA/SNsYOYVfirUx0IKvKiiHqo1Q4yKHTmYPOKtzceaydRQ4kurDYPH2SA5fXBg4jOAHFe45PADS8M26FWeI35rOnwcDHYdVt+3QQ7x+zXOTQIeDvY8Bta7XXhtf6qTMOa22rtDcFInhSJcyhr5JAwMkQfptzI9MKo47VaXmDutgPT6Xy/tUWfr+2Edc+sey7l2K7vhZ1j9lHuAyy2Zs87NM6j0gWIPXC3vAqIJjArE0dTOe2E/pZzlEMbr7LIVtHjRQqoRLOn2b1Zo73SKOyJjtuo9MY2e7vZ7M3a7BU2+RqFXmFyuU8xyUCb7UODucE+zF6FjKGO3ZdZt9ZH0sGMo26lL/axT/EREhp1Qgr/kT5GEk2DmdKU80Y2h2+IHA5DDr3QnKN2zK2dKDK3/KDu0YTSsnDKvOT5602azJZLC0Pk+cGx5f5scP08uH60OE/GUMfuzwbXnw0OdSv9cXD93YNjRjQTQ5SmnLeywb3VNbi6G26YzX+uN1lso+91C24gG9wAD24ALa6QMdSxB7LBDcjgOCXGUbUyEMc20D22AZE4qFDSkvN2Nra3E5uPxrboNjJ56xpaMRtakYdWRIM+GUMdu5gNrZgJDVUrxTi0YvfQmA3tAEubsOQcz4Z2XIQ2qISWytr7XSJzhvhaAF79slaCd1mgr+544R6KiMEk224YeWMg0W34m0+GiqqwjWOKou4mG8BjY0jGahhDDBc4kh162k8umuvtnaBz3K+fMC2HvZgbYXvLhMpqXmt6oWfCsuViXsPZWk5nZb5owWs5lzEiQwQYQy/aaXW0AjNMHXWGUwAMqwCc8zrrzZXhVHb4IhWQl5m9YcWeWBGyHbavaYVhYWx5JMujEc6jEczu58QeSU2vMQ2RcMTkyIjEE5gh5jrvZJnxjmAGVHXczNF6kx41u17Y8C57lAKjKQRGsxQYzVBgFCkwmqXAqKSAYDuqbo7GDBhVGDDKGPDuz2JA1GyHHaTAaJICowoFFCsyRJUCo5ICp1IAnMpS4NRzKHAqpsApxZ5YUVLglKTA6SwFTnMKnMY0fkfs02kKnO5CgdMJCoi5zvtZCrwvKHCEPkBhSDHAHudzZOtXG5cGQQbQHx5nljTtX/S/wXG091filLL2SsLeb+jD1I552Y865mWaOL8TmX5g0sLjbdFex93aOrZ8JovHGY7HGbTxplY6m6aflECj6QUdFK6cVZIUd7FCij2LwcXYLMEI72VjJcM4y1Shx//Yo+dCx/R21ps0AN88F7oNWj/dwMwT1COUbDpg8corU74XQeH1/tQxr7gBa+jqVIKBevKK0PC+p4uGHfOaR5u8YMRCN3JJP4BEZzmy0F/6QYc6vdahi2uFs4JMJSsNjG0p6eA70krkEiI3LJ5LXJt3m+CuXDCBq8Wd0hO4WtJVPYWrFW+KeKqBRukhndeZeUDut2C+4TXCHwDnV54P9//bscqLUhqYU/52q71FO354jUSGs6m1lNTGbhmOyBLATxdYD/1tuIdpBUuk1qlwFVGU4D1VlSvp7I+BRLfhb6oqVxgHlKqMqptMjv5VYv8MHNR02IAX55zqwiLdtp02K8HHsfoOAaBDCi2HlDhOmEvW7EdVxzwONRoXzvH2pzhUfI7fefT7pS5+6+QlpaFAXea4nnA8LxzPaXm2mNZl96BKXjqT1z5AQS4WJaaq2fk911TnQHqKJ0SMubxVIfERJCGlN+TJVD4nRT7h/tvwOrNu1LlYLzM1xhJ1il/XCpOIBZCjmlqsmiGHgSJN/xX9+ciesharJmwDytXqIuaxnNc/QB2g+xX6MATStY5Pr6PlYpG9bdCTpl4uvstfW56rvPnBLlWO3+tsU6zvxaItN4roH78FIn54+/WyXU1v2hpGlAfSsWjRf8wkiwT4AypWVcG3GuNbOs9JdZjA6dxqu3W8ja9tt2n2o5XzRJ4CAs8KyHj9l8OaMXGBiBxo+qHUaiHtnKPSNLcFXwrcOhvydmlZWpnuYmZamrGnSep0qk1LUzzuafZ2jrA+HkuLUqEnXLMZehvlgQbdCyPbze0zu36rRctkuVSgTPW8oOwHG+217Za754UFCjbdFmgkx20MfCj9TxRT4XqymApptphiWCwP8VSD+Y/FVFr9Jf2deMf9MK70IxbOzsEnPTY9x8C3ZzhC8O2HR6bVZtIgzbC3N+nP7PykBR/+xs0MIjTyGeEDfPkRAEG6LBiZYKV5YkZmn3V3TcpzL3RmeSL5t6tZsckAnfY2XWhWEsVw5pLKcxnluVh5ucaV4w+ENUIyHwhrTH2whvh8o9mZaTWmkpx3CIXiA6G7vu5td+QaUwv04UDmAyFI8weGtRI86PkD6Q+EC5IGKjmEVElNZUGyvSyHKTwLCXgKOETPowOOk8TNEbjFHwidGLixJXiwl0iXD4RLRNBUfiCMtZOooUT5QLjEAMvrg0sI04TmfMwnKW3tx4Q85wNh6RIoJ040kGj2JRLvJ2b6EotF1rlxVNxkYkTtkgTV6MVnCofDx+VRwBamzHZWlBE4ClZUANlRsMISNEbkHavTXoMM+vUhuFqxz5Y0GHnP4rU9ikt2XrdgGVF5VyQfDOmBerlaIaKPWU35t6r6xy5Xqwq51MsVyHmFESq0wjirXFVerriJvG6vkfS5siZZwaBjAsw9MFwCcXhNcmANObCqOZ8kqfmJ8Fxu6U9iZs67qAqMPFe9MFtdOLbskczNxkPt3KCHJvY1ZyOFzkYme/YGj4mn3thg2YQPXVM0m/Rgf3HaNpS0bQik6Y5spEw3hGkole7Ghrfe8eoL7WtRuSHCJMbhBoOJ3TsHGyIOP7WYn43D53HIS60vUwOZkEQ0fLY/XtC5aKiDPcGPdC4nE53LyVTncjLbuZzMdi4n1c5FRBEzDMNQOxdUwc5Fegkqlq8kwo8TUYIQXtC5XFF2h8BuVQiRCgn4KjDEC7DUol1Ni0iydu9qnCCVwyCbwyATfZDaX0bAsnfix+kp9x4kNEhAFShQBQpUbQ5VtvFqd0NJCLug1JYo2W2SbsraEikeVJu9vUd//qMGDBdUGjARR6IBE94mG7A4sHQDhiEwjOKpBvMVGzBpFb7DYAMGH2Lq4tsLXLHpxSP0OnBVxdV4Q9YmsiFztjkreBHcFqSQRXBb8sqwrypQsvPuqoRS6eiMq+Qn9m9XRQiZ/g1GRP92VfJc7d/mQwDZ2U0GsJsJYDcOYHmPK8eN2R7JNmZ7TH1wD3H6Rc7OTKsxlVRjhkLRmIXeJi2xco2p6/ShJ9OYgTTf8zetBA96vifdmF1XeB+TRkjVxuy6ZHxZDtP8Xk/AU8AhenD3OJ8mcftU4BY3Zp/GwI3dgAf7BunSmN0ggr6yMYu1k6ihRGnMbjDA6KF8A2H6u+Z8xicpjdln5LmN2U1QTjRmINHsmyTdmN1kscSNGSpuMjGidlOCavTiMzRmfFw2ZmxhaMxuKSNQTm+pALLG7Bb5nzRmsIyolrckHwzpgdqY3SKiMbud8u+26h9rzG4r5FIbM5DzyiNUoDG7TVKNGTdBG7M7JH1w3JGs4I3ZHZn7ZGN2R3LgDnLgH5rzeZKanwvP5Zb+PGbm/J9JujH7gmQasy9QOzf4BZp4NefcTaFzN5M9+y5JNmZ3yc9rzO4qabsrkKY78l7K9D1hOtOY3RNh0sbsHoOJN2b3eByl+3wDZE/M+0py5YkphF1OTBjiJ+Z9kj4x7wu8xYl5n/x3JyYuqJyYIo7EiSm8TZ6YcWDpE/N+zNt4qsF8xRNTWj1G+InZdOmJ6Xtm1Q9abh2+37uXG17LawadEQvX42fmfRKfmV8m+fllhp9fxvy0HyhgslL0QIKpnpkPyE88Mx+IIDJnJoyIM/OByHTyzPwLwOx8lQzgq0wAX8UBnP+aRW04X/NZ4DUnvFYAIV2HFsSHKV4/zG6ph+lk1h4SkUlOLFTRdPg3LV4zf1KlTDSbaFk2mw9JvA8fSu4Y0l+1fDLrUD4fpaJ5pEbDyucjZYep5fNRTEOhAuXzEUmVT26CVj54ypPzOfsxtyovUY+ZWVmGUMAaj8T2dcRMNTmLjwn7opxfZMPpu1jhsYx3PxXvfjZ7+yR1w9uXyUve8PaZKTPOIf6bQubfeVm29hPZ2leyta9kS/inM6C1wr50/UnK9SfZVD1RUiVWqDyJ8/REsSSWg3fafTwRduyn6eSgQElOCQXpKvZUsc3WXBUi3J3gJeJTATFv4Z4qDgm7idQ+lal9KlIr/merp8Lj331Dn97MOd8qjne2W1rpW4EQNq+0j2sE1reIRsIIfVwBcY57r45VmD7WRqlDa+OztK1nXWw9Y7biA5o+jIFQt5+R9OE9jgObuDCz9yy29+F3+MvAJOTfXRFOiA==');
?>