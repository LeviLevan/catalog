<?php include(ROOT.'/views/header.php'); ?>
		<div class="row">
			<form class="form-horizontal" method="post" action="/admin/genre_create">
                 <div class="form-group">
					<div class="col-sm-12">
						<input required type="text" maxlength="25" name="genre_name" class="form-control" id="inputEmail3"  placeholder="Genre Name">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-12">
						<button type="submit" name="submit" class="btn btn-default">Save</button>
					</div>
				  </div>
			</form>
		</div>	
	</div>
<?php include(ROOT.'/views/footer.php'); ?>