<?php

class Authors
{

	 public static function getAuthorsList()
    {

		$db = Db::getConnection();
        $result = $db->query("SELECT * FROM authors");
	    $authors = $result->fetchAll(PDO::FETCH_ASSOC);
        return $authors;
	}
    
     public static function setAuthorsList($author_name)
    {
        $db = Db::getConnection();
        $result = $db->query("INSERT INTO authors (author_name) VALUES ('$author_name')");
    }
    
     public static function getAuthorsUpdate($author_id)
     {
        $db = Db::getConnection();
		$result = $db->query("SELECT * FROM authors WHERE author_id = '$author_id'");
		$i = 0;
		while($row = $result->fetch()) {
			$authorUpdate[$i]['author_id'] = $row['author_id'];
			$authorUpdate[$i]['author_name'] = $row['author_name'];
			$i++;
		}
          return $authorUpdate;
     }
    
     public static function setAuthorsUpdate($author_name,$author_id)
     {
        $db = Db::getConnection();
        $result = $db->query("UPDATE authors SET author_name = '$author_name' WHERE author_id='$author_id'");
     }
    
     public static function deleteAuthor($author_id)
     {
        $db = Db::getConnection();
		$result = $db->query("DELETE FROM authors WHERE author_id='$author_id'");  
     }

             
}
	
	
	
	
	
	
	
	