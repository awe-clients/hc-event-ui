<?php
$theme = get_template_directory_uri();

$homepage = get_page_by_path('home');
$homepage_id = null;

if ($homepage instanceof WP_Post) {
    $homepage_id = $homepage->ID;
}

?>

<?php get_header(); ?>

    <header class="bg-transparent absolute w-full top-0 z-50">
        <nav class="py-8">
            <div class="container mx-auto flex justify-between items-center">
                <a href="<?= home_url() ?>" class="text-white text-lg font-bold">
                    <!-- <img src="/dist/assets/svg/logo-icon-sm.svg" class="md:hidden" alt=""> 
                    <img src="/dist/assets/svg/logo-sm-white.svg" class="hidden md:block lg:hidden" alt="">  -->
                    <img src="<?= $theme ?>/dist/img/logo.png" class="" alt="">
                </a>

                <div class="hidden lg:flex space-x-4">
                    <ul class="flex gap-2 text-white items-center">
                        <li class="group">
                            <a href="<?= home_url() ?>#Cases" class="font-bold block py-2 border-2 border-transparent">
                                Cases
                            </a>
                        </li>
                        |
                        <li class="group">
                            <a href="<?= home_url() ?>#Servicos" class="font-bold block py-2 border-2 border-transparent">
                                Servicos
                            </a>
                        </li>
                        |
                        <li class="group">
                            <a href="<?= home_url() ?>#Parceiros" class="font-bold block py-2 border-2 border-transparent">
                                Parceiros
                            </a>
                        </li>
                        <li>
                            <a href="<?= home_url() ?>#quero-ser-cliente" class="inline-block bg-brand-2-600 text-white px-8 py-2.5 ml-4 rounded-md text-lg font-bold font-open-sans hover:bg-amber-600 transition-all">
                                Quero ser cliente
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Navbar Toggle Button -->
                <button id="navbarToggle" class="lg:hidden text-white focus:outline-none z-[999]">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Navbar -->
        <div id="mobileNavbar" class="hidden absolute w-full h-[100vh] top-0 bg-brand-1-dark lg:hidden text-white p-4 px-6 pb-8 transition-all duration-300 transform origin-top">

            <div class="py-4">
                <a href="<?= home_url() ?>" class="text-white text-lg font-bold">
                    <!-- <img src="/dist/assets/svg/logo-icon-sm.svg" class="md:hidden" alt=""> 
                    <img src="/dist/assets/svg/logo-sm-white.svg" class="hidden md:block lg:hidden" alt="">  -->
                    <img src="<?= $theme ?>/dist/img/logo.png" class="" alt="">
                </a>
            </div>

            <ul class="flex flex-col gap-5">
                <li class="group">
                    <a href="<?= home_url() ?>#Cases" class="font-bold inline-block py-2 border-2 border-transparent">
                        Cases
                    </a>
                </li>
                <li class="group">
                    <a href="<?= home_url() ?>#Servicos" class="font-bold inline-block py-2 border-2 border-transparent">
                        Servicos
                    </a>
                </li>
                <li class="group">
                    <a href="<?= home_url() ?>#Parceiros" class="font-bold inline-block py-2 border-2 border-transparent">
                        Parceiros
                    </a>
                </li>
                <li>
                    <a href="<?= home_url() ?>#quero-ser-cliente" class="inline-block bg-brand-2-600 text-white px-8 py-2.5 rounded-md text-lg font-bold font-open-sans hover:bg-amber-600 transition-all">
                        Quero ser cliente
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <main class="w-full bg-brand-1-950 bg-cover bg-center relative h-[800px] sm:h-[800px] xl:h-[900px]" style="background-image: url('<?= $theme ?>/dist/img/bg-img.png');">
        <div class="container pt-[200px]">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-8 xl:col-span-8">
                    <div class="w-full md:w-[70%]">
                        <h1 class="text-brand-1-50 text-[36px] font-semibold mb-4">
                            <?= get_field('hero_title', $homepage_id) ?>
                        </h1>
    
                        <p class="text-neutral-0 text-[22px]">
                            <?= get_field('hero_description', $homepage_id) ?>
                        </p>
                    </div>

                    <hr class="w-[32px] bg-white my-[40px]">
                    
                    <div class="w-full grid grid-cols-3 gap-2">
                        <div>
                            <h3 class="text-brand-1-50 text-[40px] font-semibold">
                                <?= get_field('hero_att_1_title', $homepage_id) ?>
                            </h3>
                            <p class="text-neutral-0">
                                <?= get_field('hero_att_1_description', $homepage_id) ?>
                            </p>
                        </div>
                        <div>
                            <h3 class="text-brand-1-50 text-[40px] font-semibold">
                                <?= get_field('hero_att_2_title', $homepage_id) ?>
                            </h3>
                            <p class="text-neutral-0">
                                <?= get_field('hero_att_2_description', $homepage_id) ?>
                            </p>
                        </div>
                        <div>
                            <h3 class="text-brand-1-50 text-[40px] font-semibold">
                                <?= get_field('hero_att_3_title', $homepage_id) ?>
                            </h3>
                            <p class="text-neutral-0">
                                <?= get_field('hero_att_3_description', $homepage_id) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section class="my-8">
        <div class="container py-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-16">
            <?php
                $args = array(
                    'post_type' => 'atributos',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); 
                        $resposta = get_post_meta(get_the_ID(), '_perguntas_resposta', true); ?>
                    <div>
                        <div class="icon-bg mb-4">
                            <img src="<?= get_field('attribute_icon'); ?>" alt="">
                        </div>
                        <h5 class="text-neutral-950 font-semibold text-xl mb-2">
                            <?= get_the_title(); ?>
                        </h5>
                        <p class="text-neutral-500">
                            <?= get_field('attribute_description'); ?>
                        </p>
                    </div>

                    <?php wp_reset_postdata(); ?>
                <?php endwhile; else : ?>
                    <p><?php _e('Nenhum atributo encontrado.'); ?></p>
                <?php endif; ?>
            </div>

            <hr class="w-full h-[4px] bg-[#CBD6E2] opacity-35">
        </div>
    </section>

    <section class="my-8">
        <div class="container pt-8 pb-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-2">
                <div class="w-full max-w-[430px]">
                    <h2 class="font-semibold text-[40px] mb-2" style="color: #E27D00;">
                        <?= get_field('section_intro_title', $homepage_id)?>
                    </h2>
                    <p class="text-neutral-500 text-[18px]">
                        <?= get_field('section_intro_description', $homepage_id)?>
                    </p>

                    <ul class="list-none mt-8 mb-12 space-y-6">
                        <li class="flex items-center gap-4">
                            <img src="<?= $theme ?>/dist/svg/check.svg" alt="">
                            <?= get_field('section_intro_att_1', $homepage_id)?>
                        </li>
                        <li class="flex items-center gap-4">
                            <img src="<?= $theme ?>/dist/svg/check.svg" alt="">
                            <?= get_field('section_intro_att_2', $homepage_id)?>
                        </li>
                        <li class="flex items-center gap-4">
                            <img src="<?= $theme ?>/dist/svg/check.svg" alt="">
                            <?= get_field('section_intro_att_3', $homepage_id)?>
                        </li>
                    </ul>

                    <a href="#quero-ser-cliente"  style="background: #FFAA0D;" class="inline-block text-white px-8 py-4 rounded-md text-lg font-bold font-open-sans hover:bg-brand-1-default transition-all font-semibold">
                        Quero ser cliente
                    </a>
                </div>
                <div class="flex justify-center">
                    <div class="pt-2 rounded-md img-purple-shadow w-fit bg-brand-1-light">
                        <img src="<?= get_field('section_intro_img', $homepage_id)?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="Servicos" class="my-8 bg-[#F6F6F8]">
        <div class="container pt-16 pb-16">
            <h2 class="font-semibold text-[40px] mb-8" style="color: #0D05D2">
                Veja como funciona as nossas soluções
            </h2>

            <div class="grid gap-4 md:gap-6 place-items-center md:place-items-baseline lg:gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <a href="<?= the_permalink(); ?>" class="block max-w-[300px] group">
                            <img src="<?php the_post_thumbnail_url('full'); ?>" class="mb-4 w-full h-[400px] object-cover rounded-md" alt="<?php the_title(); ?>">
                            <h5 class="font-semibold text-xl text-neutral-950" style="color: #0D05D2">
                                <?php the_title(); ?>
                            </h5>
                            <p class="text-neutral-500 group-hover:underline">
                                <?php the_excerpt(); ?>
                            </p>
						</a>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p><?php _e('Nenhum post encontrado.'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <section class="my-8">
        <div class="container pt-24 pb-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-2">
                <div class="w-full max-w-[430px]">
                    <p class="text-sm uppercase" style="color: #767FFF">
                        <?= get_field('section_tech_title', $homepage_id)?>
                    </p>
                    <h2 class="font-semibold text-[40px] mb-2" style="color: #000055">
                        <?= get_field('section_tech_main_title', $homepage_id)?>
                    </h2>

                    <div class="flex space-x-[-10px]">
                        <div class="w-[40px] h-[40px] rounded-full" style="background: #FFF5C5"></div>
                        <div class="w-[40px] h-[40px] rounded-full" style="background: #FFC81B"></div>
                        <div class="w-[40px] h-[40px] rounded-full" style="background: #FFAA0D"></div>
                        <div class="w-[40px] h-[40px] rounded-full" style="background: #E27D00"></div>
                    </div>
                </div>
                <div class="space-y-4 text-neutral-950 text-lg">
					<?= get_field('section_tech_description', $homepage_id)?>
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="xl:container overflow-hidden pb-24">
            <div class="owl-carousel owl-theme">
                <div class="item h-[300px] w-full md:w-[300px]">
                    <img src="<?= $theme ?>/dist/img/img-1.png" class="w-full h-full object-cover" alt="">
                </div>
                <div class="item h-[300px] w-full md:w-[300px]">
                    <img src="<?= $theme ?>/dist/img/img-2.png" class="w-full h-full object-cover" alt="">
                </div>
                <div class="item h-[300px] w-full md:w-[300px]">
                    <img src="<?= $theme ?>/dist/img/img-3.png" class="w-full h-full object-cover" alt="">
                </div>
                <div class="item h-[300px] w-full md:w-[300px]">
                    <img src="<?= $theme ?>/dist/img/img-4.png" class="w-full h-full object-cover" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-brand-1-950 py-24 relative">
        <div class="absolute top-0 left-0 w-[112px] h-[24px] bg-[#3F42FF] opacity-50 z-50"></div>
        <div class="absolute right-0 bottom-0 w-[112px] h-[24px] bg-[#3F42FF] opacity-50 z-50"></div>
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <img src="<?= $theme ?>/dist/svg/quotes.svg" alt="">
                    <p class="text-white my-8 max-w-[378px]">
                        <?= get_field('project_comment', $homepage_id)?>
                    </p>
                    <div class="flex gap-2">
                        <div class="h-[54px] w-[54px] rounded-full bg-neutral-100">
							<img class="h-[54px] w-[54px] rounded-full" src="<?= get_field('project_comment_author_img', $homepage_id) ?>"/>
						</div>
                        <div class="text-white">
                            <p class="font-semibold text-lg"><?= get_field('project_comment_author', $homepage_id)?></p>
                            <p class="text-sm"><?= get_field('project_comment_author_details', $homepage_id)?></p>
                        </div>
                    </div>
                </div>
                <div class="flex gap-8">
                    <div class="text-white">
                        <h5 class="text-[40px] md:text-[56px]">
                            <?= get_field('project_att_1_title', $homepage_id)?>
                        </h5>
                        <p class="text-lg">
                            <?= get_field('project_att_1_description', $homepage_id)?>
                        </p>
                        <hr class="w-[32px] bg-white my-[40px]">
                        <p>
                            <?= get_field('project_date', $homepage_id)?>
                        </p>
                    </div>
                    <div class="text-white">
                        <h5 class="text-[40px] md:text-[56px]">
                            <?= get_field('project_att_2_title', $homepage_id)?>
                        </h5>
                        <p class="text-lg">
                            <?= get_field('project_att_2_description', $homepage_id)?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F6F6F8] py-24 relative">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="w-full max-w-[430px]">
                    <p class="text-neutral-500 text-sm uppercase">
                        Tire suas dúvidas
                    </p>
                    <h2 class="text-neutral-950 font-semibold text-[40px] mb-2">
                        Trabalhamos com o que há de mais moderno no mercado
                    </h2>
                    <p class="mb-12 text-xl text-neutral-500">
                        Separamos algumas perguntas e respostas que podem te ajudar na sua decisão
                    </p>

                    <a href="mailto:<?= get_field('email', $homepage_id)?>" class="flex items-center gap-8 mb-8 group">
                        <img src="<?= $theme ?>/dist/svg/doubts-outline.svg" alt="">
                        <div class="space-y-2 group-hover:underline">
                            <p class="text-neutral-950 text-lg font-semibold">
                                Dúvidas? 
                            </p>
                            <p class="text-sm text-[#454258]">
                                Envie uma mensagem para nosso time
                            </p>
                        </div>
                    </a>
                    <a href="<?= get_field('whatsapp_url', $homepage_id) ?>" target="_blank" class="flex items-center gap-8 group">
                        <img src="<?= $theme ?>/dist/svg/whatsapp-outline.svg" alt="">
                        <div class="space-y-2 group-hover:underline">
                            <p class="text-neutral-950 text-lg font-semibold">
                                Atendimento
                            </p>
                            <p class="text-sm text-[#454258]">
                                Fale com o nosso comercial
                            </p>
                        </div>
                    </a>
                </div>
                <div>
                    <div class="faq flex flex-col gap-1">
                    <?php
                        $args = array(
                            'post_type' => 'perguntas',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()) :
                            $question_number = 1;
                            while ($query->have_posts()) : $query->the_post(); 
                                $resposta = get_field('answer'); ?>
                            <div class="faq-item p-4 cursor-pointer group" onclick="toggleFaq(this)">
                                <div class="question flex flex-wrap md:flex-nowrap gap-4 items-center order-1">
                                    <div class="text-2xl text-neutral-950">
                                        <?php printf('%02d %s', $question_number, ''); ?>
                                    </div>
                                    <div class="text-neutral-500 text-xl w-full order-3 md:order-2 md:w-auto">
                                        <?= get_the_title(); ?>
                                    </div>
                                    <div class="faq-icon ml-auto order-2 md:order-3">
                                        <img class="group-[.active]:hidden" src="<?= $theme ?>/dist/svg/plus.svg" alt="">
                                        <img class="hidden group-[.active]:block" src="<?= $theme ?>/dist/svg/minus.svg" alt="">
                                    </div>
                                </div>
                                <div class="answer mt-6 hidden"">
                                    <?= $resposta ?>
                                </div>
                            </div>

                            <?php wp_reset_postdata(); ?>
                            <?php $question_number++; ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <p><?php _e('Nenhuma pergunta encontrada.'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating whatasapp -->
    <a href="<?= get_field('whatsapp_url', $homepage_id) ?>" target="_blank" class="fixed bottom-5 right-5 rounded-full shadow-md z-[999]">
        <img src="<?= $theme ?>/dist/svg/whatsapp.svg" alt="">
    </a>
    
    <script>
        function formatPhoneNumber(phoneNumber) {
            phoneNumber = phoneNumber.replace(/[^\d]/g, "");

            phoneNumber = phoneNumber.replace(/(\d{2})(\d)/, "($1) $2");
            phoneNumber = phoneNumber.replace(/(\d{1})(\d{4})(\d{4})$/, "$1 $2-$3");

            return phoneNumber;
        }

        const phoneInput = document.getElementById('number');

        phoneInput.addEventListener('input', function(e) {
            const formattedPhoneNumber = formatPhoneNumber(e.target.value);
            e.target.value = formattedPhoneNumber;
        });

        function toggleFaq(faqItem) {
            const answer = faqItem.querySelector('.answer');
            const isActive = faqItem.classList.contains('active');

            // Fechar todas as respostas abertas
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
                item.querySelector('.answer').classList.add('hidden');
            });

            // Toggle a resposta clicada
            if (!isActive) {
                faqItem.classList.add('active');
                answer.classList.remove('hidden');
            }
        }

    </script>
<?php get_footer(); ?>