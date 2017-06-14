<?php
define('RESTRICTED',1);

//Ensure that a session exists (just in case)
if( !session_id() ) {
    session_start();
}

require('config/app.php');
require('libraries/FlashMessage.php');
require('articles/Crud.php');


// include header in template
require('articles/template/header.php');


// here our routes
$page = (! empty($_GET['page'])) ? $_GET['page'] : null ;
$action = (! empty($_GET['action'])) ? $_GET['action'] : null;

switch ($page) {
	case 'articles':
		if ($action == 'create') {
			require('articles/create.php');
		} elseif($action == 'do_create') {
			require('articles/docreate.php');
		} elseif($action == 'createMultiple') {
			require('articles/createMultiple.php');
		} elseif($action == 'domultiple') {
			require('articles/do_createMultiple.php');
		} elseif ($action == 'edit') {
			require('articles/edit.php');
		} elseif ($action == 'update') {
			require('articles/do_update.php');
		} elseif ($action == 'delete') {
			require('articles/delete.php');
		} elseif ($action == 'detail') {
			require('articles/detail.php');
		} else if ($action == 'tes'){
			require('articles/tes.php');
		} else {
			require('articles/index.php');
		}
		break;

	default:
		require('home.php');
		break;
}
?>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="<?php echo $baseUrl; ?>assets/js/actionDelete.js" type="text/javascript"></script>
</body>
</html>
