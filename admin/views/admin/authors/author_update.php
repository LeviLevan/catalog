<?php include(ROOT.'/views/header.php'); ?>
        <?php foreach ($authorUpdate as $updateItem):?>
            <form class="form-horizontal" method="post" action="/admin/author_update/<?php echo $updateItem['author_id'];?>">	
                  <div class="form-group">
                    <label for="inputEmail3"  class="col-sm-2 control-label">Author_name</label>
                    <div class="col-sm-12">
                      <input type="text" maxlength="25" name="author_name" class="form-control" id="inputEmail3" value="<?= $updateItem['author_name'] ? $updateItem['author_name'] : '';?>"  placeholder="Author Name">
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