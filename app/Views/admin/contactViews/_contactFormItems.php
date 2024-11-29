<?php if ($action == 'edit' || $action == 'update') {  ?>

	<div class="row">
		<div class="col-12 px-4">

			<div class="mb-3">
				<label for="idUser" class="form-label">
					<?= lang('Contacts.idUser')  ?>
				</label>
				<input type="hidden" id="idUser" name="id_user" value="<?= $contact->id_user  ?>">
				<label class="col-form-label"><?= $contact->id_user  ?></label>
			</div><!--//.mb-3 -->


		</div><!--//.col -->

	</div><!-- //.row -->
<?php  }  ?>

<div class="row">
	<div class="col-md-12 col-lg-6 px-4">
		<div class="mb-3">
			<label for="fullName" class="form-label">
				<?= lang('Contacts.fullName')  ?>
			</label>
			<input type="text" id="fullName" name="full_name" value="<?= old('full_name', $contact->full_name) ?>" class="form-control">
		</div><!--//.mb-3 -->

		<div class="mb-3">
			<label for="firstName" class="form-label">
				<?= lang('Contacts.firstName')  ?>
			</label>
			<input type="text" id="firstName" name="first_name" value="<?= old('first_name', $contact->first_name) ?>" class="form-control">
		</div><!--//.mb-3 -->

		<div class="mb-3">
			<label for="lastName" class="form-label">
				<?= lang('Contacts.lastName')  ?>
			</label>
			<input type="text" id="lastName" name="last_name" value="<?= old('last_name', $contact->last_name) ?>" class="form-control">
		</div><!--//.mb-3 -->

		<div class="mb-3">
			<label for="birthday" class="form-label">
				<?= lang('Contacts.birthday')  ?>
			</label>
			<input type="date" id="birthday" name="birthday" maxLength="10" class="form-control" value="<?= old('birthday', $contact->birthday)  ?>">
		</div><!--//.mb-3 -->

		<div class="mb-3">
			<label for="organizationName" class="form-label">
				<?= lang('Contacts.organizationName')  ?>
			</label>
			<input type="text" id="organizationName" name="organization_name" maxLength="255" class="form-control" value="<?= old('organization_name', $contact->organization_name)  ?>">
		</div><!--//.mb-3 -->

		<div class="mb-3">
			<label for="positionTitle" class="form-label">
				<?= lang('Contacts.positionTitle')  ?>
			</label>
			<input type="text" id="positionTitle" name="position_title" maxLength="100" class="form-control" value="<?= old('position_title', $contact->position_title)  ?>">
		</div><!--//.mb-3 -->

	</div><!--//.col -->
	<div class="col-md-12 col-lg-6 px-4">
		<div class="mb-3">
			<label for="phoneNumber" class="form-label">
				<?= lang('Contacts.phoneNumber')  ?>
			</label>
			<input type="text" id="phoneNumber" name="phone_number" value="<?= old('phone_number', $contact->phone_number) ?>" class="form-control">
		</div><!--//.mb-3 -->

		<div class="mb-3">
			<label for="email" class="form-label">
				<?= lang('Contacts.email')  ?>
			</label>
			<input type="text" id="email" name="email" value="<?= old('email', $contact->email) ?>" class="form-control">
		</div><!--//.mb-3 -->

		<div class="mb-3">
			<label for="website" class="form-label">
				<?= lang('Contacts.website')  ?>
			</label>
			<input type="text" id="website" name="website" value="<?= old('website', $contact->website) ?>" class="form-control">
		</div><!--//.mb-3 -->

		<div class="mb-3">
			<label for="address" class="form-label">
				<?= lang('Contacts.address')  ?>
			</label>
			<textarea rows="3" id="address" name="address" style="height: 10em;" class="form-control"><?= old('address', $contact->address)  ?></textarea>
		</div><!--//.mb-3 -->

		<div class="mb-3">
			<label for="note" class="form-label">
				<?= lang('Contacts.note')  ?>
			</label>
			<textarea rows="3" id="note" name="note" style="height: 10em;" class="form-control"><?= old('note', $contact->note)  ?></textarea>
		</div><!--//.mb-3 -->

	</div><!--//.col -->

</div><!-- //.row -->