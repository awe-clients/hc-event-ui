<?php
$theme_uri = get_template_directory_uri();
$home_id = get_home_id();
?>
<footer class="bg-brand-1-950 pt-16 pb-8 text-white">
	<div class="container mx-auto flex flex-col md:flex-row justify-between gap-12">
		<div class="flex-1">
			<img src="<?= $theme_uri ?>/dist/svg/logo-white.svg" alt="Logo" class="mb-8">
			<p class="text-2xl font-bold">Energia para um futuro brilhante.</p>
		</div>

		<div class="flex-1 md:text-right">
			<p class="text-xl mb-6">
				<?= safe_get_field('address_street', $home_id) ?>,
				<?= safe_get_field('address_number', $home_id) ?> -
				<?= safe_get_field('address_city', $home_id) ?>
			</p>
			<div class="mb-4">
				<span class="block text-sm opacity-60 uppercase">Telefone</span>
				<p class="font-bold"><?= safe_get_field('contact_phone', $home_id) ?></p>
			</div>
			<div>
				<span class="block text-sm opacity-60 uppercase">E-mail</span>
				<p class="font-bold"><?= safe_get_field('contact_mail', $home_id) ?></p>
			</div>
		</div>
	</div>
	<hr class="border-neutral-700 my-10">
	<p class="text-center text-sm opacity-50">© <?= date('Y') ?> Equatorial Energia Solar.</p>
</footer>
<?php wp_footer(); ?>
</body>

</html>