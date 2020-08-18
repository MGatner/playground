<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    <div class="row">
    	<dic class="col">
			<h2>Restricted</h2>
			<p>You are now logged into a restricted area. Experience points are doubled!</p>
			<p>Current user #: <?= logged_in() ?></p>
		</div>
	</div>
<?= $this->endSection() ?>
