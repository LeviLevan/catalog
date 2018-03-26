<?php

class Genres
{

    public static function getGenresList()
    {

		$db = Db::getConnection();
        $result = $db->query("SELECT * FROM genres");
	    $genres = $result->fetchAll(PDO::FETCH_ASSOC);
        return $genres;
        
	}
    
    public static function setGenre($genre_name)
    {
        $db = Db::getConnection();
        $result = $db->query("INSERT INTO genres (genre_name) VALUES ('$genre_name')");
    }
  
     public static function getGenresUpadte($genre_id)
    {
        $db = Db::getConnection();
		$result = $db->query("SELECT * FROM genres WHERE genre_id = '$genre_id'");
		$i = 0;
		while($row = $result->fetch()) {
			$genreUpdate[$i]['genre_id'] = $row['genre_id'];
			$genreUpdate[$i]['genre_name'] = $row['genre_name'];
			$i++;
		} 
        return $genreUpdate;
    }
    
     public static function setGenreUpdate($genre_name,$genre_id)
    {
        $db = Db::getConnection();
        $result = $db->query("UPDATE genres SET genre_name = '$genre_name' WHERE genre_id='$genre_id'");
    }
    
     public static function deleteGenre($genre_id)
    {
	    $db = Db::getConnection();
		$result = $db->query("DELETE FROM genres WHERE genre_id='$genre_id'");
    }

		
}
	
	
	
	
	
	
	
	
	