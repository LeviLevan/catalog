<?php

include_once ROOT. '/models/Admin.php';

class AdminController {

    public function actionIndex()
	{	
		$adminList    = Admin::getAdminList();
        $adminListAut = Admin::getAdminListAut();
        $adminListGen = Admin::getAdminListGen();
        require_once(ROOT . '/views/admin/index.php');
        return true;
	}
    	
	public function createIndex()
	{	
        
        $adminList = Admin::getAdminListAutGen();
        
        if(isset($_POST['submit'])&&(!empty($_POST['book_price']))&&(!empty($_POST['book_content']))&&(!empty($_POST['book_name']))){
            
            $book_name = $_POST['book_name'];
            $book_content = $_POST['book_content'];
            $book_price = $_POST['book_price'];
            $authors_id = $_POST['authors_id'];
            $author_name = $_POST['author_name'];
            $genres_id = $_POST['genres_id'];
			$genre_name = $_POST['genre_name'];
            
            Admin::createAdminListAutGen($book_name, $book_content, $book_price, $authors_id, $author_name, $genres_id, $genre_name);
            
            header('location: /admin/index.php');
        } else {
            $error_create = "Введите не пустую строку...";
        }  
         require_once(ROOT . '/views/admin/create.php');
         return true;
    }
	
	public function updateIndex($book_id)
	{	
		if(isset($_GET['book_id'])){
			$book_id = $_GET['book_id'];
		}
        
        $indexAdminUpdate = Admin::getUpdateBooks($book_id);
        $idAuts = Admin::getUpdateAutId($book_id);
            
        $adminList = Admin::getAdminListAutGen();
		if(isset($_POST['submit'])){
            $id = $_POST['id'];
			$book_id = $_POST['book_id'];
			$book_name = $_POST['book_name'];
            $authors_id = $_POST['authors_id'];
			$author_name = $_POST['author_name'];
            $genres_id = $_POST['genres_id'];
			$genre_name = $_POST['genre_name'];
			$book_content = $_POST['book_content'];
			$book_price = $_POST['book_price'];
			$db = Db::getConnection();
            Admin::setUpdateAllList($id,$book_id,$book_name,$authors_id,$author_name,$genres_id,$genre_name,$book_content,$book_price);
			header('location: /admin/index.php');
		}
		require_once(ROOT . '/views/admin/update.php');
		return true;
			
	}
	
	public function deleteIndex($book_id)
	{
		if(isset($_GET['book_id'])){
			$book_id = $_GET['book_id'];
		}
		Admin::delete($book_id);
		header('location: /admin/index.php');
		return true;
	}
	
	
}

