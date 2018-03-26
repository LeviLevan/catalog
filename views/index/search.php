<?php include(ROOT.'/views/header.php'); ?>
		<div class="row">
			<a href="/"><button type="button" class="btn btn-default btn-lg btn-block">Go Back</button></a>
		</div>
		<br>
		<div class="row text-center">
		   <table class="table table-striped">
				 <thead>
					<tr>
					  <th class="text-center" scope="col">#</th>
					  <th class="text-center" scope="col">Book Name</th>
					  <th class="text-center" scope="col">Book Content</th>
					</tr>
				  </thead>
                   <?php if(!empty($List)){ ?>
				   <?php foreach ($List as $Item):?>
					  <tbody>
						<tr>
						  <td><?php echo $Item['book_id'] ;?></td>
						  <td><?php echo $Item['book_name'] ;?></td>
                          <td><a href="/books/<?=$Item['book_id'] ? $Item['book_id'] : '';?>" type="submit" class="btn btn-primary btn-xs">Read more</a>
                          </td>
						</tr>
					  </tbody>
				  <?php endforeach; } else {$error =  'Ничего не найдено...';}?>
			</table>
		</div>	
        <?=$error ? $error : '' ?>
<?php include(ROOT.'/views/footer.php'); ?>