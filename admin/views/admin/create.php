<?php include(ROOT.'/views/header.php'); ?>
		<div class="row">
			<form class="form-horizontal" method="post" action="/admin/create">
                 <div class="form-group">
				  </div>
				  <div class="form-group">
					<div class="col-sm-12">
						<input  required type="text" maxlength="25" name="book_name" class="form-control" id="inputEmail3"  placeholder="Book Name">
					</div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-12">
                        <label for="exampleInputEmail1">Author Name</label>
				        <select required class="form-control" multiple name="authors_id[]">
                        <?php if(isset($adminList)) { foreach($adminList as $itemAdmin){ ?>
                            <option value="<?=$itemAdmin['author_id'] ? $itemAdmin['author_id'] : '';?>"><?=$itemAdmin['author_name'] ? $itemAdmin['author_name'] : ''; ?></option>
                        <?php }} ?>
                        </select>
					</div>
				  </div>
                  <div class="form-group">
                      <div class="col-sm-12">
				          <label for="exampleInputEmail1">Genre Name</label>
				          <select required class="form-control" multiple name="genres_id[]">
                          <?php if(isset($adminList)) { foreach($adminList as $itemAdmin){ ?>
                              <option value="<?=$itemAdmin['genre_id'] ? $itemAdmin['genre_id'] : '';?>"><?=$itemAdmin['genre_name'] ? $itemAdmin['genre_name'] : ''; ?></option>
                          <?php }} ?>
                          </select>
                      </div>
				  </div>
                  <div class="form-group">
					<div class="col-sm-12">
						<textarea required name="book_content" placeholder="Book Text" class="form-control" rows="9"></textarea>
					</div>
				  </div>
                  <div class="form-group">
					<div class="col-sm-12">
						<input required data-toggle="tooltip" title="Введите число от 1-5" type="number" min="1" maxlength="5" name="book_price" class="form-control" placeholder="Book Price">
					</div>
				  </div>
                  <div class="form-group">
					<div class="col-sm-12">
						<button type="submit" name="submit" class="btn btn-default">Save</button>
					</div>
				  </div>
			</form>
            <?=$error_create;?>
		</div>	
<?php include(ROOT.'/views/footer.php'); ?>