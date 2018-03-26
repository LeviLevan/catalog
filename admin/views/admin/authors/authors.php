<?php include(ROOT.'/views/header.php'); ?>

		<div class="row">
			<table class="table table-striped">
				 <thead>
					<tr>
					  <th class="text-center" scope="col">#</th>
                      <th class="text-center" scope="col">Author_Name</th>
					</tr>
				  </thead>
				   <?php foreach ($authorsList as $authorItem):?>
					  <tbody>
						<tr>
						  <td class="text-center"><?=$authorItem['author_id'] ? $authorItem['author_id'] : '' ;?></td>
                          <td class="text-center"><?=$authorItem['author_name'] ? $authorItem['author_name'] : '' ;?></td>
						  <td class="text-center">
							<a href="/admin/author_update/<?php echo $authorItem['author_id'];?>"><i class="glyphicon glyphicon-pencil"></i></a>
							<a href="/admin/author_delete/<?php echo $authorItem['author_id'];?>"><i class="glyphicon glyphicon-trash"></i></a>
						  </td>
						</tr>
					  </tbody>
				  <?php endforeach;?>
			</table>
            <a href="/admin/author_create"><button type="button" class="btn btn-success btn-lg btn-block">Create</button></a>
        </div>
	</div>
<?php include(ROOT.'/views/footer.php'); ?>