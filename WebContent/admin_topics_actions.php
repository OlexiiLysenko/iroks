<?php 

	// function articles_all() {

	// }

	function topic_get($id) {
		
	}

	// function article_add($title, $image, $text) {
	// 						 $categorie_id = 3;
	// 						 $articles = R::dispense( 'articles' );
 //                             $articles->title = $_POST['title'];
 //                             $articles->image = $_POST['image'];
 //                             $articles->text = $_POST['text'];
                             
	// 						 $articles->categorie_id = $categorie_id;
	// 						 R::store($articles);
	// }

	function topic_edit($id) {
		$edit_id = $_GET['id'];
		return $edit_id;
	}



	function topic_delete($id) {

		$articles  = R::findOne( 'articles', ' id = ? ', [ $_GET['id'] ] );
		R::trash($articles);
		
		?>
			<script type="text/javascript">
				alert ("Вітаємо! Ви щойно видалили цю Статтю!");
			</script>
		<?php
		header('Location: admin_topics.php'); 
	}

?>