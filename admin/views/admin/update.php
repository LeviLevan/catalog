<?php include(ROOT.'/views/header.php'); ?>
		<div class="row">
			<form class="form-horizontal" method="post" action="/admin/update/<?=$book_id;?>">
                  <?php if(isset($indexAdminUpdate)){ foreach($indexAdminUpdate as $adminItem):?>
                  <div class="form-group">
					  <div class="col-sm-12">
                         <?php foreach($idAuts as $idAut){?>
                         <input type="hidden" name="id" class="form-control" value="<?=$idAut['id'] ? $idAut['id'] : '' ;?>"  >
                          <?php } ?>
                      </div>
                  </div>
                  <div class="form-group">
					  <div class="col-sm-12">
                         <input type="hidden" name="book_id" class="form-control" value="<?=$adminItem['book_id'] ? $adminItem['book_id'] : '' ;?>"  >
                      </div>
                  </div>
				  <div class="form-group">
					<div class="col-sm-12">
						<input  required type="text" maxlength="25" name="book_name" class="form-control" value="<?=$adminItem['book_name'] ? $adminItem['book_name'] : '' ;?>"  placeholder="Book Name">
					</div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-12">
                        <label for="exampleInputEmail1">Author Name</label>
				        <select required class="form-control" multiple name="authors_id[]">
                        <?php if(isset($adminList)) foreach($adminList as $itemAut){ ?>
                                <option value="<?=$itemAut['author_id'] ? $itemAut['author_id'] : '';?>"><?=$itemAut['author_name'];?></option>
                        <?php } ?>
                        </select>
					</div>
				  </div>
                  <div class="form-group">
                      <div class="col-sm-12">
				          <label for="exampleInputEmail1">Genre Name</label>
				          <select required class="form-control" multiple name="genres_id[]">
                          <?php if(isset($adminList)) { foreach($adminList as $itemGen){ ?>
                              <option value="<?=$itemGen['genre_id'] ? $itemGen['genre_id'] : '';?>"><?=$itemGen['genre_name']; ?></option>
                          <?php }} ?>
                          </select>
                      </div>
				  </div>
                  <div class="form-group">
					<div class="col-sm-12">
						<textarea 
						 required name="book_content" placeholder="Book Text" class="form-control" rows="9"><?=$adminItem['book_content'] ? $adminItem['book_content'] : '' ;?></textarea>
					</div>
				  </div>
                  <div class="form-group">
					<div class="col-sm-12">
						<input required data-toggle="tooltip" title="Введите число от 1-5" type="number" min="1" maxlength="5" name="book_price" value="<?=$adminItem['book_price'] ? $adminItem['book_price'] : '' ;?>" class="form-control" placeholder="Book Price">
					</div>
				  </div>
                  <div class="form-group">
					<div class="col-sm-12">
						<button type="submit" name="submit" class="btn btn-default">Save</button>
					</div>
				  </div>
				  <?php endforeach; } ?>
			</form>
            <?=$error_create;?>
		</div>	
<?php include(ROOT.'/views/footer.php'); ?>