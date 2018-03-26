<?php include(ROOT.'/views/header.php'); ?>
  
    <?php if(isset($adminList)){ foreach($adminList as $adminItem):?>
    <div class="row text-center">
        <div class="col-md-1">
            <p><b>#</b></p>
            <div><?=$adminItem['book_id'] ? $adminItem['book_id'] : '' ;?></div>
        </div>
        <div class="col-md-2">
            <p><b>Book Name</b></p>
            <div><?=$adminItem['book_name'] ? $adminItem['book_name'] : '' ;?></div>
        </div>
        <div class="col-md-2">
            <p><b>Autor_Name</b></p>
            <div><?php
                    foreach ($adminListAut as $adminItemAut){
                        if($adminItemAut['book_id'] == $adminItem['book_id']){
                            echo "<p>{$adminItemAut['author_name']}</p>";
                        } 
                    }
                  ?>
            </div>
        </div>
        <div class="col-md-2">
            <p><b>Genre Name</b></p>
            <div><?php 
                {foreach ($adminListGen as $adminItemGen)
                    if($adminItemGen['book_id'] == $adminItem['book_id']){
                        echo "<p>{$adminItemGen['genre_name']}</p>";
                        } 
                    }
                ?>
            </div>
        </div>
        <div class="col-md-2">
            <p><b>Price</b></p>
            <div><?=$adminItem['book_price'] ? $adminItem['book_price'] : '' ;?></div>
        </div>
        <div class="col-md-2">
            <p><b>Book Text</b></p>
            <div class="panel-group" id="accordion">
                <h5>
                    <a data-toggle="collapse" data-parent="#accordion" href="#<?=$adminItem['book_id'] ? $adminItem['book_id'] : '' ;?>">Содержание книги</a>
                </h5>
            </div>
        </div>
        <div class="col-md-1">
            <p><b>Up / De</b></p>
            <div>
                <a href="/admin/update/<?php echo $adminItem['book_id'];?>"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="/admin/delete/<?php echo $adminItem['book_id'];?>"><i class="glyphicon glyphicon-trash"></i></a>
            </div>
        </div>
    </div>
    <div id="<?=$adminItem['book_id'] ? $adminItem['book_id'] : '' ;?>" class="panel-collapse collapse"><br>
        <?=$adminItem['book_content'] ? $adminItem['book_content'] : '' ;?>
    </div><br><br>
    <?php endforeach; } ?>
    <a href="/admin/create"><button type="button" class="btn btn-success btn-lg btn-block">Create</button></a>
<?php include(ROOT.'/views/footer.php'); ?>