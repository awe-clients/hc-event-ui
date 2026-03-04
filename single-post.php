<?php
$theme = get_template_directory_uri();

$homepage = get_page_by_path('home');
$homepage_id = null;

if ($homepage instanceof WP_Post) {
    $homepage_id = $homepage->ID;
}

?>

<?php get_header(); ?>

    <header class="bg-white w-full top-0 z-50 shadow-lg header-shadow">
        <nav class="py-8">
            <div class="container mx-auto flex justify-between items-center">
                <a href="<?= home_url(); ?>" class="text-neutral-500 text-lg font-bold">
                    <!-- <img src="/dist/assets/svg/logo-icon-sm.svg" class="md:hidden" alt=""> 
                    <img src="/dist/assets/svg/logo-sm-white.svg" class="hidden md:block lg:hidden" alt="">  -->
                    <img src="<?= $theme; ?>/dist/img/logo-white-theme.png" class="" alt="">
                </a>

                <div class="hidden lg:flex space-x-4">
                    <ul class="flex gap-2 text-neutral-500 items-center">
                        <li class="group">
                            <a href="<?= home_url(); ?>#Cases" class="font-bold block py-2 border-2 border-transparent">
                                Cases
                            </a>
                        </li>
                        |
                        <li class="group">
                            <a href="<?= home_url(); ?>#Servicos" class="font-bold block py-2 border-2 border-transparent">
                                Servicos
                            </a>
                        </li>
                        |
                        <li class="group">
                            <a href="<?= home_url(); ?>#Parceiros" class="font-bold block py-2 border-2 border-transparent">
                                Parceiros
                            </a>
                        </li>
                        <li>
                            <a href="<?= home_url(); ?>#quero-ser-cliente" class="inline-block bg-brand-2-600 text-white px-8 py-2.5 ml-4 rounded-md text-lg font-bold font-open-sans hover:bg-amber-600 transition-all">
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
        <div id="mobileNavbar" class="hidden absolute w-full h-[100vh] top-0 bg-white lg:hidden text-neutral-500 p-4 px-6 pb-8 transition-all duration-300 transform origin-top">

            <div class="py-4">
                <a href="<?= home_url(); ?>" class="text-neutral-500 text-lg font-bold">
                    <!-- <img src="/dist/assets/svg/logo-icon-sm.svg" class="md:hidden" alt=""> 
                    <img src="/dist/assets/svg/logo-sm-white.svg" class="hidden md:block lg:hidden" alt="">  -->
                    <img src="<?= $theme ?>/dist/img/logo-white-theme.png" class="" alt="">
                </a>
            </div>

            <ul class="flex flex-col gap-5">
                <li class="group">
                    <a href="<?= home_url(); ?>#Cases" class="font-bold inline-block py-2 border-2 border-transparent">
                        Cases
                    </a>
                </li>
                <li class="group">
                    <a href="<?= home_url(); ?>#Servicos" class="font-bold inline-block py-2 border-2 border-transparent">
                        Servicos
                    </a>
                </li>
                <li class="group">
                    <a href="<?= home_url(); ?>#Parceiros" class="font-bold inline-block py-2 border-2 border-transparent">
                        Parceiros
                    </a>
                </li>
                <li>
                    <a href="<?= home_url(); ?>#quero-ser-cliente" class="inline-block bg-brand-2-600 text-white px-8 py-2.5 rounded-md text-lg font-bold font-open-sans hover:bg-amber-600 transition-all">
                        Quero ser cliente
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <section class="py-10">
        <div class="container px-6 xl:px-0 mx-auto overflow-hidden">
            <div class="grid grid-cols-12">
                <div class="col-start-1 lg:col-start-2 col-span-12 md:col-span-10 lg:col-span-8 mb-8">
                    <nav aria-label="Breadcrumb">
                        <ol class="flex gap-2 items-center">
                            <li>
                                <a href="<?= home_url(); ?>" class="text-sm text-neutral-500">
                                    Home
                                </a>
                            </li>
                            &raquo;
                            <li class="text-sm text-neutral-500">
                                Projetos
                            </li>
                            &raquo;
                            <li class="text-sm text-neutral-500">
                                <?= get_the_title(); ?>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-start-1 lg:col-start-2 col-span-12 md:col-span-10 lg:col-span-8 mb-8">
                    <h1 class="text-neutral-950 font-extrabold text-2xl mb-8">
                        <?= get_the_title(); ?>
                    </h2>
                    
                    <p class="text-lg text-neutral-950">
                        Projeto <span class="text-neutral-500">foi publicado em</span> <?= get_the_date('j.M.Y') ?>
                    </p>
                </div>
                
                 <div class="col-span-12 lg:col-span-10 lg:col-start-2 mb-16">
                    <div class="text-xl text-neutral-700 flex flex-col gap-8">
                        <?= the_content(); ?>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-10 lg:col-start-2 mb-16">
                    <div class="text-xl text-neutral-800 flex flex-col gap-8">
                        <p class="text-brand-2-600 font-bold text-lg">
                            Que tal fazer seu projeto conosco?
                        </p>

                        <a href="<?= home_url() ?>#quero-ser-cliente" class="inline-block w-full sm:w-fit mt-4 bg-brand-1-950 text-neutral-0 text-center px-12 py-4 rounded-md text-lg font-semibold hover:bg-brand-1-default transition-all">
                            Quero ser cliente
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>