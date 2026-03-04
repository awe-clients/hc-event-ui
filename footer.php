<?php

/**
 * The template for displaying the footer
 */
$theme_uri = get_template_directory_uri();
$home_id   = get_home_id();
?>

<footer class="bg-brand-1-950 pt-16 pb-8">
	<div class="container mx-auto px-4">

		<div class="flex flex-col md:flex-row w-full gap-12 md:gap-0">

			<div class="flex-1">
				<div class="mb-10">
					<a href="<?= home_url(); ?>" class="inline-block" aria-label="Voltar para a Home">
						<img src="<?= $theme_uri ?>/dist/svg/logo-white.svg" alt="Equatorial Energia Solar Logo">
					</a>
				</div>

				<p class="text-neutral-50 font-bold text-2xl leading-tight max-w-sm">
					Transformando a luz do sol em <br class="hidden lg:block" /> energia para um futuro brilhante.
				</p>
			</div>

			<div class="flex-1 flex justify-start md:justify-end">
				<div class="space-y-6 md:text-right">

					<div class="space-y-1">
						<p class="font-light text-brand-1-100 text-xl md:text-2xl leading-relaxed">
							<?= get_field('address_street', $home_id) ?>,
							<?= get_field('address_neighborhood', $home_id) ?>,
							<?= get_field('address_number', $home_id) ?>
							<br />
							<?= get_field('address_city', $home_id) ?>
						</p>
					</div>

					<div class="flex flex-col">
						<span class="font-light text-brand-1-200 text-sm uppercase tracking-wider">Telefone</span>
						<a href="tel:<?= preg_replace('/\D/', '', get_field('contact_phone', $home_id)) ?>"
							class="font-bold text-neutral-50 text-lg hover:text-brand-2-500 transition-colors">
							<?= get_field('contact_phone', $home_id) ?>
						</a>
					</div>

					<div class="flex flex-col">
						<span class="font-light text-brand-1-200 text-sm uppercase tracking-wider">E-mail</span>
						<a href="mailto:<?= get_field('contact_mail', $home_id) ?>"
							class="font-bold text-neutral-50 text-lg hover:text-brand-2-500 transition-colors">
							<?= get_field('contact_mail', $home_id) ?>
						</a>
					</div>

				</div>
			</div>
		</div>

		<hr class="border-neutral-700/50 mt-16 mb-8">

		<div class="flex flex-col md:flex-row justify-between items-center gap-4">
			<p class="text-neutral-400 text-sm text-center md:text-left">
				© <?= date('Y'); ?> Equatorial Energia Solar. Todos os direitos reservados.
			</p>

			<div class="text-neutral-500 text-xs">
				Desenvolvido com <span class="text-red-500">♥</span> por Seu Nome/Agência
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>