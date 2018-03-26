<?php include(ROOT.'/views/header.php'); ?>
        <div class="row">
            <a href="/"><button type="button" class="btn btn-default btn-lg btn-block">Go Back</button></a>
        </div>
		<div class="row">
			<h1>Книга: <?php echo $indexItem['book_name'];?></h1>
            <h4>Автор:</h4><p><?php foreach ($ListAut as $ItemAut){
                      if($ItemAut['book_id'] == $indexItem['book_id']){echo "<p>{$ItemAut['author_name']}</p>";}}?>
            <h4>Жанр:</h4><p><?php foreach ($ListGen as $ItemGen){
                     if($ItemGen['book_id'] == $indexItem['book_id']){echo "<p>{$ItemGen['genre_name']}</p>";}}?></p>
            <h4>Цена:</h4><p><?php echo $indexItem['book_price'];?></p>
            <h4>Описание:</h4><p><?php echo $indexItem['book_content'];?></p>
		</div>
	<br>
	<div class="row">
		<h3>Форма обратной связи</h3>
			<form id="send">
		  <div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input required="required" type="email" class="form-control" name="email" placeholder="Email">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Book Name</label>
			<input required="required" type="text" class="form-control" name="book_name" placeholder="Name">
		  </div> 
		 <input name="submit" type="submit" value="Отправить">
		</form>
	</div>	
<?php include(ROOT.'/views/footer.php'); ?>
