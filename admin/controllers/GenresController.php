<?php

include_once ROOT. '/models/Genres.php';

class GenresController {

	public function GenreIndex()
    {
        $genresList = array();
		$genresList = Genres::getGenresList();
		require_once(ROOT . '/views/admin/genres/genres.php');
		return true;
    }
    
    public function GenreCreate()
    {
        if(isset($_POST['submit'])){
			$genre_name = $_POST['genre_name'];	
            Genres::setGenre($genre_name);
			header('location: genres/');
		}
		require_once(ROOT . '/views/admin/genres/genre_create.php');
		return true;
    }
    
    public function GenreUpdate($genre_id)
    {
        if(isset($_GET['genre_id'])){
			$genre_id = $_GET['genre_id'];
		}
        $genreUpdate = Genres::getGenresUpadte($genre_id);
        if(isset($_POST['submit'])){
            $genre_name = $_POST['genre_name'];
            Genres::setGenreUpdate($genre_name,$genre_id);
			header('location: /admin/genres/');
		}
		require_once(ROOT . '/views/admin/genres/genre_update.php');
		return true;
    }
    
    public function GenreDelete($genre_id)
    {
        if(isset($_GET['genre_id'])){
			$id = $_GET['genre_id'];
		}
        Genres::deleteGenre($genre_id);
		header('location: /admin/genres/');
        return true;
    }
    
   
	
}

