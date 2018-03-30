<?php

class Index
{
    public static function getIndexList() 
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM books");
        $i = 0;
		while($row = $result->fetch()) {
			$List[$i]['book_id'] = $row['book_id'];
			$List[$i]['book_name'] = $row['book_name'];
            $List[$i]['book_price'] = $row['book_price'];
            $List[$i]['book_content'] = $row['book_content'];
			$i++;
		  }
        
        return $List;
    }
    
    public static function getIndexListAut() 
    {
         $db = Db::getConnection();
        $result = $db->query("SELECT books.book_id,authors.author_name, authors.author_id FROM books 
                              JOIN books_authors ON books.book_id=books_authors.book_id 
                              JOIN authors ON authors.author_id=books_authors.author_id ");        
        $i = 0;
		while($row = $result->fetch()) {
	        $ListAut[$i]['book_id'] = $row['book_id'];
            $ListAut[$i]['author_id'] = $row['author_id'];
            $ListAut[$i]['author_name'] = $row['author_name'];
			$i++;
		}
        return  $ListAut;
    }
    
    public static function getIndexListGen() 
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT books.book_id,genres.genre_name, genres.genre_id FROM books 
                              JOIN books_genres ON books.book_id=books_genres.book_id 
                              JOIN genres ON genres.genre_id=books_genres.genre_id");
        $i = 0;
		while($row = $result->fetch()) {
	        $ListGen[$i]['book_id'] = $row['book_id'];
            $ListGen[$i]['genre_id'] = $row['genre_id'];
            $ListGen[$i]['genre_name'] = $row['genre_name'];
			$i++;
		}
        return  $ListGen;
    }
    
	public static function getIndexItemByID($book_id)
	{
		$book_id = intval($book_id);
		if ($book_id) {
			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM books WHERE book_id=' . $book_id);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$indexItem = $result->fetch();
			return $indexItem;
		}

	}
	
	public static function getSearchList($query)
	{
		 $db = Db::getConnection();
         $result = $db->query("SELECT * FROM books WHERE book_name LIKE '%$query%'");
         $List = '';
         $i = 0;
         while($row = $result->fetch()) {
             $List[$i]['book_id'] = $row['book_id'];
             $List[$i]['book_name'] = $row['book_name'];
             $List[$i]['book_price'] = $row['book_price'];
             $List[$i]['book_content'] = $row['book_content'];
         $i++;
         }
        return $List;
	}
	
	
	
}