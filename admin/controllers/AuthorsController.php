<?php

include_once ROOT. '/models/Authors.php';

class AuthorsController {

	public function AuthorsIndex()
    {
        $authorsList = array();
		$authorsList = Authors::getAuthorsList();
		require_once(ROOT . '/views/admin/authors/authors.php');
		return true;
    }
    
    public function AuthorCreate()
    {
        if(isset($_POST['submit'])){
			$author_name = $_POST['author_name'];
            Authors::setAuthorsList($author_name);        
			header('location: authors/');
		}
		require_once(ROOT . '/views/admin/authors/author_create.php');
		return true;
    }
    
    public function AuthorUpdate($author_id)
    {
        if(isset($_GET['author_id'])){
			$author_id = $_GET['author_id'];
		}
        $authorUpdate = Authors::getAuthorsUpdate($author_id);
		if(isset($_POST['submit'])){
            $author_name = $_POST['author_name'];
			Authors::setAuthorsUpdate($author_name,$author_id);
			header('location: /admin/authors/');
		}
		require_once(ROOT . '/views/admin/authors/author_update.php');
		return true;
    }
    
    public function AuthorDelete($author_id)
    {
        if(isset($_GET['author_id'])){
			$id = $_GET['author_id'];
		}
		Authors::deleteAuthor($author_id);
		header('location: /admin/authors/');
        return true;
    }
    
   
	
}

