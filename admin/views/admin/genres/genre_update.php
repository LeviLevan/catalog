<?php include(ROOT.'/views/header.php'); ?>
        <?php foreach ($genreUpdate as $updateItem):?>
            <form class="form-horizontal" method="post" action="/admin/genre_update/<?php echo $updateItem['genre_id'];?>">	
                  <div class="form-group">
                    <label for="inputEmail3"  class="col-sm-2 control-label">Genre Name</label>
                    <div class="col-sm-12">
                      <input type="text" maxlength="25" name="genre_name" class="form-control" id="inputEmail3" value="<?php echo $updateItem['genre_name'];?>"  placeholder="Genre Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" name="submit" class="btn btn-default">Save</button>
                    </div>
                  </div>
            </form>
        <?php endforeach;?>
	</div>
<?php include(ROOT.'/views/footer.php'); ?>