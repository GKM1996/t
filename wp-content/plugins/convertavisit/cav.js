//<![CDATA[
var MyID;
var ca = document.cookie.split(';');
for(var i=0; i<ca.length; i++) { var c = ca[i]; while (c.charAt(0)==' ') c = c.substring(1,c.length); if (c.indexOf("provenID=") == 0) MyID = c.substring(9,c.length); }
document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () { function decode(s) { return decodeURIComponent(s.split("+").join(" ")); } if (decode(arguments[1]) == "email") { MyID = decode(arguments[2]); } });
if (MyID) { var date = new Date(); date.setTime(date.getTime()+(5*365*24*60*60*1000)); document.cookie = "provenID="+MyID+"; expires="+date.toGMTString()+"; path=/"; }
var DID=260755;
var pcheck=(window.location.protocol == "https:") ? "https://stats.sa-as.com/live.js":"http://stats.sa-as.com/live.js";
document.writeln('<scr'+'ipt async src="'+pcheck+'" type="text\/javascript"><\/scr'+'ipt>');
//]]>