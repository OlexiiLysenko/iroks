<?php 

	// function articles_all() {

	// }

	function article_get($id) {
		
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

	function document_edit($id) {
		$edit_id = $_GET['id'];
		return $edit_id;
	}



	function document_delete($id) {

		$articles  = R::findOne( 'documents', ' id = ? ', [ $_GET['id'] ] );
		R::trash($articles);
	
		?>
			<script type="text/javascript">
				alert ("Вітаємо! Ви щойно видалили цей Документ!");
			</script>
		<?php
			header('Location: admin_documents.php'); 
	}

?>