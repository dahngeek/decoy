<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<?= Decoy::title() ?>
		<meta name="viewport" content="width=device-width"/>
		<meta name="csrf" content="<?=Session::getToken()?>"/>
		<link rel="stylesheet" href="<?=HTML::grunt('/css/admin/style.css')?>"/>
		<script src="/packages/bkwld/decoy/ckeditor/ckeditor.js"></script>
		<script src="/packages/bkwld/decoy/ckfinder/ckfinder.js"></script>
	</head>
	<body class="<?=Decoy::bodyClass()?>">
		
		<?// Sidebar and header ?>
		<? if (App::make('decoy.auth')->check()): ?>
			<?= View::make('decoy::layouts._nav') ?>
			<?= View::make('decoy::layouts._bottom_nav', $__data) ?>
		<? endif ?>
		<?= View::make('decoy::layouts._header', $__data) ?>

		<?// The main page content ?>
		<div id="main">
			<?= empty($breadcrumbs) ? View::make('decoy::layouts._breadcrumbs', $__data) : $breadcrumbs; ?>

			<? // CRUD notification area ?>
			<?= View::make('decoy::layouts._notifications', $__data)?>

			<?= $content?>
		</div>
	
	<?// Footer embeds ?>
	<? if (App:: isLocal()): ?><script> var require = { urlArgs: "bust=" + (new Date()).getTime() }; </script><? endif ?>
	<script src="<?=HTML::grunt('/js/vendor/require-jquery.js')?>"></script>
	<script src="<?=HTML::grunt('/js/admin/main.js')?>"></script>
</body>
</html>