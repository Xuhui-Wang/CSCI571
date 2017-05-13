
<?php
//	print_r($_GET);
	if (isset($_GET['id'])) {
//		echo $_GET['id'];
		switch($_GET['id']) {
			case 1:
//				echo "haha";
				echo file_get_contents('http://104.198.0.197:8080/legislators?apikey=4ae7fc8356ba4501aad3260f043285f5&per_page=all');
				//https://congress.api.sunlightfoundation.com/legislators?apikey=4ae7fc8356ba4501aad3260f043285f5&per_page=all
//				echo $v;
				break;
			case 2:
				echo file_get_contents('http://104.198.0.197:8080/bills?apikey=4ae7fc8356ba4501aad3260f043285f5&per_page=50');
				//https://congress.api.sunlightfoundation.com/bills?apikey=4ae7fc8356ba4501aad3260f043285f5&per_page=50
//				echo $v;
				break;
			case 3:
				echo file_get_contents('http://104.198.0.197:8080/committees?apikey=4ae7fc8356ba4501aad3260f043285f5&per_page=all');
				//https://congress.api.sunlightfoundation.com/committees?apikey=4ae7fc8356ba4501aad3260f043285f5&per_page=all
//				echo $v;
				break;
			case 4:
				if ($_GET['type'] == 1)
					echo file_get_contents('http://104.198.0.197:8080/bills?sponsor_id='.$_GET['l'].'&apikey=4ae7fc8356ba4501aad3260f043285f5&per_page=5');
				else if ($_GET['type'] == 2)
					echo file_get_contents('http://104.198.0.197:8080/committees?member_ids='.$_GET['l'].'&apikey=4ae7fc8356ba4501aad3260f043285f5&per_page=5');
				break;
			case 5:
				echo file_get_contents('http://104.198.0.197:8080/bills?per_page=50&history.active=true&order=introduced_on__desc&last_version.urls.pdf__exists=true');
				break;
			case 6:
				echo file_get_contents('http://104.198.0.197:8080/bills?per_page=50&order=introduced_on__desc&last_version.urls.pdf__exists=true');
				break;
			default:
				echo "??";
		}
	}

?>