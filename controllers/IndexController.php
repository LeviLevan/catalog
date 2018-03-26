<?php

include_once ROOT. '/models/Index.php';

class IndexController {

	public function actionIndex()
	{ 
        $List    = Index::getIndexList();
        $ListAut = Index::getIndexListAut();
        $ListGen = Index::getIndexListGen();
        require_once(ROOT . '/views/index/index.php');
        return true;
	}
	
	public function actionView($book_id)
	{   
        $ListAut = Index::getIndexListAut();
        $ListGen = Index::getIndexListGen();
		if ($book_id) {
			$indexItem = Index::getIndexItemByID($book_id);
			require_once(ROOT . '/views/index/view.php');
		}
		return true;
	}
	
	public function searchIndex()
	{
        if(isset($_POST['query'])){
            $query = $_POST['query'];
            $query = substr($query, 0, 64);
            $query = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $query);
            $query = htmlspecialchars($query);
            $query = strip_tags($query);
            $List = Index::getSearchList($query);
            require_once(ROOT . '/views/index/search.php');
            return true;
        }
    }
    
    public function sendEmail()
    {
        if((isset($_POST['email'])&&$_POST['email']!="")&&(isset($_POST['book_name'])&&$_POST['book_name']!="")){
        $to = 'montekiliya1@gmail.com';
        $subject = 'Cообщение обратной связи Test'; //Загаловок сообщения
        $message = '
                    <html>
                        <head>
                            <title>'.$subject.'</title>
                        </head>
                        <body>
                            <p>Почта: '.$_POST['email'].'</p>
                            <p>Название книги: '.$_POST['book_name'].'</p>                        
                        </body>
                    </html>';
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: Отправитель <from@example.com>\r\n";
        mail($to, $subject, $message, $headers);
        }
    }
	
	
}