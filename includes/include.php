<?php
$ip = $_SERVER['REMOTE_ADDR'];
$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
include('func.php');
checkBanned($ip);
if(isset($_POST['os']))
{
	trackIP($_POST['browserName'],$_POST['browserVersion'],$_POST['os'],$ip,$host, $_GET['campaign']);
}
?>
<script language="JavaScript" type="text/javascript" src="/js/jquery-1.4.1.min.js"></script>
<script src="/js/browser.js" ></script>
<script>
if (window.XMLHttpRequest){
    xmlhttp=new XMLHttpRequest();
}

else{
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

var url = document.URL;
var params = "browserName=" + BrowserDetect.browser + "&browserVersion=" + BrowserDetect.version + "&os=" + BrowserDetect.OS + "&ip=<?php echo($ip); ?>&host=<?php echo($host); ?>&uid=<?php $_SESSION['uid']; ?>";
xmlhttp.open("POST", url, true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", params.length);
xmlhttp.setRequestHeader("Connection", "close");
xmlhttp.send(params);
</script>
<script>
$(window).load(function(){
	$('a').click(function() {
		$.post(includes/tracker.php, {page:this.href});
	return true;
	});
});
</script>
