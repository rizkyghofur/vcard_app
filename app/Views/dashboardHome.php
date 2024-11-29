<?= $this->extend('Themes/'.config('Basics')->theme['name'].'/AdminLayout/defaultLayout') ?>
<?= $this->section('content');  ?>

	<?=view('Themes/_commonPartialsBs/_alertBoxes') ?>


	<!-- Info boxes -->
	<div class="row">
		<div class="col-lg-3 col-6">

			<div class="small-box bg-info">
				<div class="inner">
					<h3><?= $totalNrOfContacts; ?></h3>
					<p><?=lang('Contacts.contacts') ?></p>
				</div>
				<div class="icon">
					<i class="bi bi-question-octagon"></i>
				</div>
				<?= anchor(route_to('contactList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->

		</div><!-- /.col -->
		<div class="col-lg-3 col-6">

		</div><!-- /.col -->
		<div class="col-lg-3 col-6">

		</div><!-- /.col -->
		<div class="col-lg-3 col-6">

		</div><!-- /.col -->
	</div><!-- /.row -->

<?= $this->endSection() ?>