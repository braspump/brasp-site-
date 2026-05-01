<?php 
/**
 * Template Name: A Braspump
 */
get_header(); ?>

<main class="flex-1 relative">
    <section class="bg-primary text-primary-foreground py-24 text-center">
      <div class="container mx-auto px-4">
        <div class="page-banner">
          <span class="text-xs tracking-[0.3em] font-black opacity-70">SOBRE NÓS</span>
          <h1 class="text-4xl md:text-6xl font-black mt-2">A BRASPUMP</h1>
        </div>
      </div>
    </section>

    <section class="container mx-auto px-4 py-16">
      <div class="grid gap-10 md:grid-cols-2 md:items-center">
        <div class="text-muted-foreground leading-relaxed">
          <p class="mb-4">
            Em 1998, dois jovens empreendedores da cidade de Amparo, interior do estado de São Paulo, apaixonados por inovação, identificaram no mercado brasileiro de equipamentos odontológicos uma lacuna tecnológica significativa. Observando portanto o cenário nacional, surgiu a <strong class="text-primary">BRASPUMP – Bombas de Vácuo</strong>, que há mais de 25 anos garante o melhor para o consultório de seus clientes.
          </p>
          <p>
            Os produtos da <strong class="text-primary">LINHA TURBO</strong> deram abertura para essa linda história construída pela empresa, que em 2021 resolveu inovar criando a <strong class="text-primary">LINHA CARBON</strong>, para atender uma gama maior de necessidades. Hoje, a BRASPUMP é uma das maiores empresas brasileiras e conquista a cada dia um espaço maior nos consultórios odontológicos pelo país.
          </p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/images/sobre-nos.jpg" alt="Equipe Braspump" class="rounded-2xl shadow-xl" />
      </div>
    </section>

    <section class="bg-muted py-16">
      <div class="container mx-auto px-4 grid gap-10 md:grid-cols-2">
        <div class="rounded-2xl bg-card p-8 shadow-sm border border-border">
          <h2 class="text-2xl font-extrabold text-primary mb-4">Acreditamos que...</h2>
          <p class="text-muted-foreground leading-relaxed mb-4">
            …por meio da <strong class="text-primary">tecnologia,</strong> é possível <strong class="text-primary">revolucionar o atendimento</strong> dentro de uma clínica odontológica, e por isso desenvolvemos nossos produtos visando projetar o desenvolvimento de carreira de nossos clientes a um nível que só a <strong class="text-primary">BRASPUMP</strong> pode os levar.
          </p>
          <p class="text-muted-foreground leading-relaxed">
            Em todas as vendas, nossa prioridade é proporcionar uma <strong class="text-primary">experiência ímpar</strong>, com muita <strong class="text-primary">transparência</strong>, <strong class="text-primary">honestidade</strong>, e um <strong class="text-primary">atendimento personalizado</strong> que busca auxiliar o comprador a encontrar o <strong class="text-primary">produto ideal</strong> para sua necessidade.
          </p>
        </div>

        <div class="rounded-2xl bg-card p-8 shadow-sm border border-border">
          <h2 class="text-2xl font-extrabold text-primary mb-4">Nossos produtos...</h2>
          <p class="text-muted-foreground leading-relaxed mb-4">
            …permitem que o profissional dentista aumente a <strong class="text-primary">eficiência</strong> da sucção de sangue e saliva durante a consulta, <strong class="text-primary">facilitando</strong> principalmente a realização de cirurgias, aumentando a <strong class="text-primary">praticidade</strong> e <strong class="text-primary">economizando</strong> no consumo e desgaste do compressor.
          </p>
          <p class="text-muted-foreground leading-relaxed">
            Com uma <strong class="text-primary">bomba de vácuo odontológica BRASPUMP</strong> é garantida a biossegurança do consultório odontológico, evitando a disseminação de doenças. Também, o dentista contribui com o cuidado para com o meio ambiente, já que nossas bombas contam com um filtro coletor e separador de detritos que evita a emissão de detritos sólidos e nocivos para a rede de esgoto. Além disso, a tecnologia de nossas bombas apresenta um <strong class="text-primary">abafador de ruídos exclusivo,</strong> que preserva o ambiente da poluição sonora.
          </p>
        </div>
      </div>
    </section>

    <section class="container mx-auto px-4 py-16 grid gap-10 md:grid-cols-2 md:items-center">
      <img src="<?php echo get_template_directory_uri(); ?>/images/sobre-nos-3.png" alt="Ambiente Braspump" class="rounded-2xl shadow-xl" />
      <img src="<?php echo get_template_directory_uri(); ?>/images/sobre-nos.jpg" alt="Linhas de produtos" class="rounded-2xl" />
    </section>

    <section class="bg-primary text-primary-foreground py-16 text-center">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-extrabold mb-2">Estamos felizes e ansiosos para te atender!</h2>
        <p class="text-primary-foreground/80 mb-8">Clique no botão abaixo para conhecer os nossos produtos</p>
        <div class="flex flex-wrap justify-center gap-3">
          <a href="<?php echo esc_url( home_url( '/bombas-de-vacuo' ) ); ?>" class="inline-flex items-center gap-2 rounded-full bg-brand-gold px-6 py-3 font-semibold text-brand-gold-foreground hover:brightness-110 transition">
            BOMBAS DE VÁCUO <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </a>
          <a href="<?php echo esc_url( home_url( '/unidades-suctoras' ) ); ?>" class="inline-flex items-center gap-2 rounded-full border border-brand-gold/50 px-6 py-3 font-semibold hover:bg-brand-gold/10 transition">
            UNIDADES SUCTORAS <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </a>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
