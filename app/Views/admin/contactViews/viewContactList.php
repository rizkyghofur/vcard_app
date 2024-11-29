<?= $this->include('Themes/_commonPartialsBs/datatables') ?>
<?= $this->extend('Themes/' . config('Basics')->theme['name'] . '/AdminLayout/defaultLayout') ?>
<?= $this->section('content');  ?>
<div class="row">
	<div class="col-md-12">

		<div class="card card-info">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h3 class="card-title" style="flex-grow: 1;"><?= lang('Contacts.contactList') ?></h3>
				<!-- Wrapper to align copy feedback message -->
				<div class="copy-feedback-wrapper" style="display: flex; align-items: center; justify-content: flex-end;">
					<div id="copy-feedback" style="display: none; font-weight: bold; background-color: yellow; color: black; font-size: 0.9em; white-space: nowrap; padding: 2px 5px; border-radius: 4px;">
						Link copied to clipboard!
					</div>
				</div>
			</div>
			<div class="card-body">
				<?= view('Themes/_commonPartialsBs/_alertBoxes'); ?>
				<table id="tableOfContacts" class="table table-striped table-hover using-data-table" style="width: 100%;">
					<thead>
						<tr>
							<th><?= lang('Contacts.idUser') ?></th>
							<th><?= lang('Contacts.cardName') ?></th>
							<th><?= lang('Contacts.firstName') ?></th>
							<th><?= lang('Contacts.lastName') ?></th>
							<th><?= lang('Contacts.birthday') ?></th>
							<th><?= lang('Contacts.organizationName') ?></th>
							<th><?= lang('Contacts.positionTitle') ?></th>
							<th><?= lang('Contacts.phoneNumber') ?></th>
							<th><?= lang('Contacts.email') ?></th>
							<th><?= lang('Contacts.website') ?></th>
							<th><?= lang('Contacts.address') ?></th>
							<th><?= lang('Contacts.note') ?></th>
							<th class="text-nowrap text-center"><?= lang('Basic.global.Action') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($contactList as $item) : ?>
							<tr>
								<td class="align-middle text-center">
									<?= $item->id_user ?>
								</td>
								<td class="align-middle">
									<?= empty($item->card_name) || strlen($item->card_name) < 51 ? esc($item->card_name) : character_limiter(esc($item->card_name), 50)   ?>
								</td>
								<td class="align-middle">
									<?= empty($item->first_name) || strlen($item->first_name) < 51 ? esc($item->first_name) : character_limiter(esc($item->first_name), 50)   ?>
								</td>
								<td class="align-middle">
									<?= empty($item->last_name) || strlen($item->last_name) < 51 ? esc($item->last_name) : character_limiter(esc($item->last_name), 50)   ?>
								</td>
								<td class="align-middle text-nowrap">
									<?= empty($item->birthday) ? '' : date('d/m/Y', strtotime($item->birthday)) ?>
								</td>
								<td class="align-middle">
									<?= empty($item->organization_name) || strlen($item->organization_name) < 51 ? esc($item->organization_name) : character_limiter(esc($item->organization_name), 50)   ?>
								</td>
								<td class="align-middle">
									<?= empty($item->position_title) || strlen($item->position_title) < 51 ? esc($item->position_title) : character_limiter(esc($item->position_title), 50)   ?>
								</td>
								<td class="align-middle">
									<?= empty($item->phone_number) || strlen($item->phone_number) < 51 ? esc($item->phone_number) : character_limiter(esc($item->phone_number), 50)   ?>
								</td>
								<td class="align-middle">
									<?= empty($item->email) || strlen($item->email) < 51 ? esc($item->email) : character_limiter(esc($item->email), 50)   ?>
								</td>
								<td class="align-middle">
									<?= empty($item->website) || strlen($item->website) < 51 ? esc($item->website) : character_limiter(esc($item->website), 50)   ?>
								</td>
								<td class="align-middle">
									<?= empty($item->address) || strlen($item->address) < 51 ? esc($item->address) : character_limiter(esc($item->address), 50)   ?>
								</td>
								<td class="align-middle">
									<?= empty($item->note) || strlen($item->note) < 51 ? esc($item->note) : character_limiter(esc($item->note), 50)   ?>
								</td>
								<td class="align-middle text-center text-nowrap">
									<?= anchor(route_to('editContact', $item->id_user), lang('Basic.global.edit'), ['class' => 'btn btn-sm btn-warning btn-edit me-1', 'data-id' => $item->id_user]); ?>
									<?= anchor('#confirm2delete', lang('Basic.global.Delete'), ['class' => 'btn btn-sm btn-danger btn-delete ms-1', 'data-href' => route_to('deleteContact', $item->id_user), 'data-bs-toggle' => 'modal', 'data-bs-target' => '#confirm2delete']); ?>
									<button class="btn btn-sm btn-success ms-1"
										onclick="copyLink('<?= base_url('vcf/' . $item->id_user); ?>')">
										<?= lang('Basic.global.copyVcfLink') ?>
									</button>
									<button class="btn btn-sm btn-success ms-1"
										onclick="copyLink('<?= base_url('vcf-qrcode/' . $item->id_user); ?>')">
										<?= lang('Basic.global.copyVcfQrCodeLink') ?>
									</button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><!--//.card-body -->
			<div class="card-footer">
				<?= anchor(route_to('newContact'), lang('Basic.global.addNew') . ' ' . lang('Contacts.contact'), ['class' => 'btn btn-primary float-end']); ?>
			</div><!--//.card-footer -->
		</div><!--//.card -->
	</div><!--//.col -->
</div><!--//.row -->

<?= $this->endSection() ?>

<?= $this->section('additionalInlineJs') ?>


const addButton = document.querySelector('.card-footer .btn-primary');
const cloneWorthy = !isInViewport(addButton);
if ( cloneWorthy ) {
// Remove any existing cloned button first to avoid duplicates
const existingClone = document.querySelector('.card-header .btn-primary');
if (!existingClone) {
const clonedButton = addButton.cloneNode(true);
clonedButton.classList.add('btn-sm');
clonedButton.classList.add('btn-add');
clonedButton.classList.add('float-end');
// Add cloned button after the card title in header
const cardTitle = document.querySelector('.card-header .card-title');
if (cardTitle)
cardTitle.after(clonedButton);
}
} else {
// Remove cloned button if row count drops below threshold
const existingClone = document.querySelector('.card-header .btn-primary');
if (existingClone) {
existingClone.remove();
}
}
<?= $this->endSection() ?>