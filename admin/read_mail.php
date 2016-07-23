<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
jQuery(document).ready(function($){
	
	var allPanels = jQuery('.body').hide();
	
	jQuery('div.toggler').click(function() {
		allPanels.slideUp();
		jQuery(this).next().stop().slideToggle();
		return false;
	});
});
	
</script>
<style type="text/css">
div.toggler	{ border:1px solid #ccc; background:url(gmail2.jpg) 10px 12px #eee no-repeat; cursor:pointer; padding:10px 32px; }
div.toggler .subject	{ font-weight:bold; }
div.read { color:#666; }
div.toggler .from, div.toggler .date { font-style:italic; font-size:11px; }
div.body { padding:10px 20px; }
</style>
<?php
/* connect to gmail */
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'gandhi.sarjak42@gmail.com';
$password = 'password';

/* try to connect */
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
$emails = imap_search($inbox,'ALL');

/* if emails are returned, cycle through each... */
if($emails) {
	
	/* begin output var */
	$output = '';
	
	/* put the newest emails on top */
	rsort($emails);
	
	/* for every email... */
	foreach($emails as $email_number) {
		
		/* get information specific to this email */
		$overview = imap_fetch_overview($inbox,$email_number,0);
		$message = imap_fetchbody($inbox,$email_number,2);
		//$structure = imap_fetchstructure($inbox, $email_number, FT_UID);
		//if($structure->encoding == "3"){
			//$message = base64_decode(imap_fetchbody($inbox, imap_msgno($inbox, $email_number), 1));
		//}
		//elseif($structure->encoding == "4"){
			//$message = imap_qprint(imap_fetchbody($inbox, imap_msgno($inbox, $email_number), 1));
		//}else{
			//$message = imap_fetchbody($inbox, imap_msgno($inbox, $email_number), 1);
		//}
		
		
		/* output the email header information */
		$output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
		$output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
		$output.= '<span class="from">'.$overview[0]->from.'</span>';
		$output.= '<span class="date">on '.$overview[0]->date.'</span>';
		$output.= '</div>';
		
		/* output the email body */
		$output.= '<div class="body">'.$message.'</div>';
	}
	
	echo $output;
}
imap_close($inbox);

?>