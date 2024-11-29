		<li class="nav-item">
			<?= anchor(route_to('contactList'), '<svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg> '.lang('Contacts.moduleTitle'), ['class' => 'nav-link'.($currentModule == strtolower('contacts') ? ' active' : '')]); ?>
		</li>
