<?php

class Admin
{
    public static function getAdminList() 
    {
		 $db = Db::getConnection();
         $result = $db->query("SELECT * FROM books");
         $i = 0;
		while($row = $result->fetch()) {
			$adminList[$i]['book_id'] = $row['book_id'];
			$adminList[$i]['book_name'] = $row['book_name'];
            $adminList[$i]['book_content'] = $row['book_content'];
            $adminList[$i]['book_price'] = $row['book_price'];
			$i++;
		  }
        
        return $adminList;
    }
    
    public static function getUpdateBooks($book_id) 
    {
        $db = Db::getConnection();
		$result = $db->query("SELECT * FROM books WHERE book_id = '$book_id'");
		$i = 0;
		while($row = $result->fetch()) {
			$indexAdminUpdate[$i]['book_id'] = $row['book_id'];
			$indexAdminUpdate[$i]['book_name'] = $row['book_name'];
            $indexAdminUpdate[$i]['book_content'] = $row['book_content'];
            $indexAdminUpdate[$i]['book_price'] = $row['book_price'];
			$i++;
		}
        return $indexAdminUpdate;
    }
    
    public static function getUpdateAutId($book_id) 
    {
       $db = Db::getConnection();
		$result = $db->query("SELECT * FROM books_authors WHERE book_id = '$book_id'");
		$i = 0;
		while($row = $result->fetch()) {
			$idAuts[$i]['id'] = $row['id'];
			$i++;
		}
         return $idAuts;
    }
    
    public static function getAdminListAut() 
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT books.book_id,authors.author_name, authors.author_id FROM books 
                              JOIN books_authors ON books.book_id=books_authors.book_id 
                              JOIN authors ON authors.author_id=books_authors.author_id ");        
        $i = 0;
		while($row = $result->fetch()) {
	        $adminListAut[$i]['book_id'] = $row['book_id'];
            $adminListAut[$i]['author_id'] = $row['author_id'];
            $adminListAut[$i]['author_name'] = $row['author_name'];
			$i++;
		}
        return  $adminListAut;
    }
    
    public static function getAdminListGen() 
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT books.book_id,genres.genre_name, genres.genre_id FROM books 
                              JOIN books_genres ON books.book_id=books_genres.book_id 
                              JOIN genres ON genres.genre_id=books_genres.genre_id");
        $i = 0;
		while($row = $result->fetch()) {
	        $adminListGen[$i]['book_id'] = $row['book_id'];
            $adminListGen[$i]['genre_id'] = $row['genre_id'];
            $adminListGen[$i]['genre_name'] = $row['genre_name'];
			$i++;
		}
        return  $adminListGen;
    }
    
    public static function getAdminListAutGen() 
    {
	    $db = Db::getConnection();
		$result = $db->query("SELECT * FROM authors");
		$i = 0;
		while($row = $result->fetch()) {
			$adminList[$i]['author_id'] = $row['author_id'];
			$adminList[$i]['author_name'] = $row['author_name'];
			$i++;
		}  
        $db = Db::getConnection();
		$result = $db->query("SELECT * FROM genres");
		$i = 0;
		while($row = $result->fetch()) {
            $adminList[$i]['genre_id'] = $row['genre_id'];
			$adminList[$i]['genre_name'] = $row['genre_name'];
			$i++;
		}     
        return  $adminList;
	}
    
    public static function createAdminListAutGen($book_name, $book_content, $book_price, $authors_id, $author_name, $genres_id, $genre_name) 
    {   
          try{
                $con=mysqli_connect("localhost","root","","books");
                $result = $con->query("INSERT INTO books (book_name,book_content,book_price) 
                                       VALUES ('$book_name','$book_content','$book_price');");
                $book_id = mysqli_insert_id($con);
            }
                catch (PDOException $e){
                $error = $e->getMessage();
            }
            try{
                $db = Db::getConnection();
                foreach($authors_id as $author_id){
                    $result = $db->query("INSERT INTO books_authors (book_id, author_id) VALUES ('$book_id','$author_id')");
                }
            }
            catch (PDOException $e){
                $error = $e->getMessage();
            }
            try{
                $db = Db::getConnection();
                foreach($genres_id as $genre_id){
                    $result = $db->query("INSERT INTO books_genres (book_id, genre_id) VALUES ('$book_id','$genre_id')");
                }
            }
            catch (PDOException $e){
                $error = $e->getMessage();
            }
    }
  
    public static function setUpdateAllList($id,$book_id,$book_name,$authors_id,$author_name,$genres_id,$genre_name,$book_content,$book_price)
    {   
         $db = Db::getConnection();
         $result = $db->query("UPDATE books SET book_name='$book_name', book_content='$book_content', book_price='$book_price'
                               WHERE book_id = '$book_id'");
        
         $result = $db->query("DELETE FROM `books_authors` WHERE book_id = '$book_id'");
         foreach($authors_id as $author_id):
         $result = $db->query("INSERT INTO books_authors (author_id, book_id) VALUES ('$author_id','$book_id')");
         endforeach;
        
         $result = $db->query("DELETE FROM `books_genres` WHERE book_id = '$book_id'");
         foreach($genres_id as $genre_id){
            $db->query("INSERT INTO books_genres (genre_id, book_id) VALUES ('$genre_id','$book_id')");
          }  
    }
    
    public static function delete($book_id)
    {
        $db = Db::getConnection();
		$result = $db->query("DELETE books_authors, books_genres FROM books
                             LEFT JOIN books_authors ON books_authors.book_id=books.book_id
                             LEFT JOIN books_genres ON books_genres.book_id=books.book_id
                             WHERE books.book_id = '$book_id'");
        $result = $db->query("DELETE FROM books WHERE books.book_id = '$book_id'");
    }

	
}
	
	
	
	 
	
	
	
	
	