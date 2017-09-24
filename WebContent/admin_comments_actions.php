<?php 

	// function articles_all() {

	// }

	function article_get($id) {
		
	}

	function article_edit($id) {
		$edit_id = $_GET['id'];
		return $edit_id;
	}



	function article_delete($id) {
		?>
			<script>
				alert ("Вітаємо! Ви щойно видалили цей Коментар!");
			</script>
		<?php

		$articles  = R::findOne( 'comments', ' id = ? ', [ $_GET['id'] ] );
		R::trash($articles);
		
		
		header('Location: admin_comments.php'); 
	}

?>