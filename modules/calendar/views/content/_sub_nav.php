<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/calendar') ?>"><?php echo lang('calendar_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Calendar.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/calendar/create') ?>" id="create_new"><?php echo lang('calendar_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>