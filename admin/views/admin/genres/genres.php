<?php include(ROOT.'/views/header.php'); ?>

		<div class="row">
			<table class="table table-striped">
				 <thead>
					<tr>
					  <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Genre Name</th>
					</tr>
				  </thead>
				   <?php foreach ($genresList as $genreItem):?>
					  <tbody>
						<tr>
						  <td class="text-center"><?php echo $genreItem['genre_id'] ;?></td>
                          <td class="text-center"><?php echo $genreItem['genre_name'] ;?></td>
						  <td class="text-center">
							<a href="/admin/genre_update/<?php echo $genreItem['genre_id'];?>"><i class="glyphicon glyphicon-pencil"></i></a>
							<a href="/admin/genre_delete/<?php echo $genreItem['genre_id'];?>"><i class="glyphicon glyphicon-trash"></i></a>
						  </td>
						</tr>
					  </tbody>
				  <?php endforeach;?>
			</table>
            <a href="/admin/genre_create"><button type="button" class="btn btn-success btn-lg btn-block">Create</button></a>
        </div>
	</div>
<?php include(ROOT.'/views/footer.php'); ?>