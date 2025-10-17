<!DOCTYPE html>
<html lang="en" xml:lang="en">

<head>
	<title><?= $this->base->text('err_500', 'title') ?> - <?= $this->base->get_hostname() ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/<?= $this->base->get_template() ?>/img/fav.png">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/<?= $this->base->get_template() ?>/css/tabler.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/<?= $this->base->get_template() ?>/css/all.min.css">
</head>

<body class="border-top-wide border-primary d-flex flex-column theme-<?= get_cookie('theme') ?? 'light' ?>">
	<div class="page page-center">
		<div class="container text-center">
			<div class="empty">
				<div class="empty-header">500</div>
				<p class="empty-title"><?= $this->base->text('oops_note', 'paragraph') ?></p>
				<p class="empty-subtitle text-muted">
					<?= $this->base->text('err_500_note', 'paragraph') ?>
				</p>
			</div>
		</div>
	</div>
</body>

</html>