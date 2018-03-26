<?php include(ROOT.'/views/header.php'); ?>
<style>
.form-control {
    height: 41px;
	text-align: center
}
</style>
		<div class="row">
			<a href="/admin/"><button type="button" class="btn btn-primary btn-lg btn-block">Admin</button></a>	
		</div>
		<br>
		<?php if(isset($List)){ foreach ($List as $Item):?>
        <div class="row text-center">
                <div class="col-md-1">
                    <p><b>#</b></p>
                    <div class="row"><?php echo $Item['book_id'] ;?></div>
                </div>
                <div class="col-md-3">
                    <p><b>Book Name</b></p>
                    <div class="row"><?php echo $Item['book_name'] ;?></div>
                </div>
                <div class="col-md-2">
                    <p><b>Autor Name</b></p>
                    <div class="row"><?php {foreach ($ListAut as $ItemAut)
                        if($ItemAut['book_id'] == $Item['book_id']){ echo "<p>{$ItemAut['author_name']}</p>";}}?>
                    </div>
                </div>
                <div class="col-md-2">
                    <p><b>Genre Name</b></p>
                    <div class="row">
                        <?php {foreach ($ListGen as $ItemGen)if($ItemGen['book_id'] == $Item['book_id']){echo "<p>{$ItemGen['genre_name']}</p>";}}?>
                    </div>
                </div>
                <div class="col-md-2">
                    <p><b>Price</b></p>
                    <div class="row"><?=$Item['book_price'] ? $Item['book_price'] : '' ;?></div>
                </div>
                <div class="col-md-2">
                    <p><b>Book Text</b></p>
                    <div class="row panel-group" id="accordion">
                        <h5><a data-toggle="collapse" data-parent="#accordion" href="#<?=$Item['book_id'] ? $Item['book_id'] : '' ;?>">Содержание книги</a></h5>
                    </div>
                </div>
        </div>
        <br>
        <div id="<?=$Item['book_id'] ? $Item['book_id'] : '' ;?>" class="row panel-collapse collapse">
            <?=$Item['book_content'] ? $Item['book_content'] : '' ;?>
            <br><br>
            <p><a href="/books/<?=$Item['book_id'] ? $Item['book_id'] : '';?>" type="submit" class="btn btn-primary">Read more</a></p>
        </div>
        <?php endforeach; } ?>
	    <div class="row">
			<form name="search" method="post" action="books/search">
				<input type="text" maxlength="25" name="query" class="form-control" placeholder="Поиск по Названию книги">
				<br><br>
				<button type="submit" name="enter" class="btn btn-success btn-lg btn-block">Найти</button>
			</form>
		</div>	
<?php include(ROOT.'/views/footer.php'); ?>
