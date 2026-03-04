<?php
$theme = get_template_directory_uri();

$homepage = get_page_by_path('home');
$homepage_id = null;

if ($homepage instanceof WP_Post) {
    $homepage_id = $homepage->ID;
}

?>

    <footer class="bg-brand-1-950 pt-8 pb-8">
        <div class="container">
			<style>
				@media (max-width: 768px) {
					.footer-box {
						flex-direction: column;
					}
				}
			</style>
			 <div class="footer-box" style="display: flex; width: 100%;">
				 <div style="flex: 1;">
					 <div style="margin-bottom: 57px;">
						<a href="" class="">
							<img src="<?= $theme ?>/dist/svg/logo-white.svg" alt="">
						</a>
					</div>
					 
					 <p class="" style="color: #F1F4FF; font-weight: bold; font-size: 22px;">
						 Transformando a luz do sol em <br/> energia para um futuro brilhante.
					 </p>
				 </div>
				 <div style="flex: 1; display: flex; justify-content: end;">
				 	<div style="margin-top: 64px; margin-right: 32px;">
						<div style="margin-bottom: 16px;">
							<p style="font-weight: light; color: #E5E8FF; font-size: 22px;">
								<?= get_field('address_street', $homepage_id) ?>, <?= get_field('address_neighborhood', $homepage_id) ?>, <?= get_field('address_number', $homepage_id) ?> 
								<br/> 
								<?= get_field('address_city', $homepage_id) ?>
							</p>
						 </div>
						 <div style="margin-bottom: 16px;">
							<p style="font-weight: light; color: #E5E8FF; font-size: 16px;">
								Telefone
							</p>
							<p style="font-weight: bold; color: #E5E8FF; font-size: 16px;">
								<?= get_field('contact_phone', $homepage_id) ?>
							</p>
						 </div>
						 <div>
							<p style="font-weight: light; color: #E5E8FF; font-size: 16px;">
								E-mail
							</p>
							<p style="font-weight: bold; color: #E5E8FF; font-size: 16px;">
								<?= get_field('contact_mail', $homepage_id) ?>
							</p>
						 </div>
					 </div>
				 </div>
			</div>
			<hr style="background: #56546A; color: #56546A; border-color: #56546A; margin: 70px 0 16px 0;">
            <div class="flex flex-wrap gap-8 items-center justify-between">
                <div>
                    <p class="text-white text-sm">
                        © 2024 Equatorial Energia Solar. Todos os direitos reservados
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    <script src="<?= $theme ?>/dist/js/plugins/jquery.min.js"></script>
    <script src="<?= $theme ?>/dist/js/plugins/owl.carousel.min.js"></script>
    <script src="<?= $theme ?>/dist/js/index.js"></script>
</body>

</html>