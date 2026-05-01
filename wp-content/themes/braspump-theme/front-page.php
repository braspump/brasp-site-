<?php get_header(); ?>

<main class="flex-1 relative">
    <!-- HERO -->
    <section class="relative overflow-hidden bg-primary text-white min-h-[85vh] flex items-center pt-20">
      <!-- Reference Style Waves -->
      <svg class="absolute inset-0 h-full w-full pointer-events-none" viewBox="0 0 1440 800" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
        <path d="M0,400 C400,200 800,600 1440,400 L1440,800 L0,800 Z" fill="#82cdef" opacity="0.4" />
        <path d="M0,550 C500,400 900,700 1440,550 L1440,800 L0,800 Z" fill="#2a225a" opacity="0.6" />
        <path d="M0,700 C600,600 1000,800 1440,700 L1440,800 L0,800 Z" fill="white" />
      </svg>
      
      <div class="container mx-auto relative z-10 px-6 grid gap-10 md:grid-cols-2 md:items-center">
        <div class="md:-mt-24">
          <h1 class="hero-title">Excelência</h1>
          <p class="mt-4 text-2xl md:text-3xl text-white font-medium tracking-tight">em soluções para seu consultório</p>
          <a href="<?php echo esc_url( home_url( '/loja' ) ); ?>" class="btn-primary mt-10">ACESSE A LOJA</a>
        </div>

        <div class="relative flex justify-center md:justify-end items-center">
          <div class="diamond-bg hidden md:block"></div>
          <img src="<?php echo get_template_directory_uri(); ?>/images/bc2.png" alt="Bomba de vácuo Braspump" class="relative z-10 max-h-[550px] w-auto drop-shadow-2xl hover:scale-105 transition duration-500" width="550" height="550" fetchpriority="high" loading="eager" />
        </div>
      </div>
    </section>


    <!-- INSTITUCIONAL -->
    <section class="container mx-auto px-4 py-20 md:py-28">
      <div class="grid gap-12 md:grid-cols-2 md:items-center">
        <div class="order-2 md:order-1">
          <div class="mb-6">
            <h2 class="text-3xl md:text-5xl font-black text-primary leading-tight">
              Quem busca
              <span class="fancy-text-container text-brand-gold">
                <span class="fancy-text-words">
                  <span>eficiência,</span>
                  <span>economia,</span>
                  <span>praticidade,</span>
                  <span>inovação,</span>
                </span>
              </span>
              busca BRASPUMP
            </h2>
          </div>
          
          <div class="space-y-4 text-muted-foreground leading-relaxed text-lg">
            <p>Há <b>mais de 25 anos</b> no mercado, a <b>BRASPUMP</b>, empresa 100% NACIONAL, é uma das maiores fabricantes de bombas de vácuo odontológicas do Brasil.</p>
            <p>Os produtos <b>BRASPUMP</b> são pensados para trazer eficiência, economia e conforto para o dia a dia no consultório, e se diversificam para atender exatamente a <em>SUA NECESSIDADE</em>. Contamos com duas linhas de bombas de vácuo:</p>
            <ul class="list-disc pl-5 space-y-2">
              <li><strong class="text-primary">LINHA CARBON:</strong> produzida em polímero de engenharia, visando redução de custos sem diminuição da qualidade.</li>
              <li><strong class="text-primary">LINHA TURBO:</strong> produzidas em bronze, para quem busca durabilidade e robustez.</li>
            </ul>
            <p>Além disso, nossas Unidades Suctoras completam o kit que irá revolucionar para sempre o seu dia a dia como dentista.</p>
          </div>
          
          <a href="<?php echo esc_url( home_url( '/a-braspump' ) ); ?>" class="btn-primary mt-8">SAIBA MAIS</a>
        </div>
        
        <div class="order-1 md:order-2 relative">
          <div class="absolute -inset-4 bg-brand-gold/10 rounded-3xl -rotate-3"></div>
          <img src="<?php echo get_template_directory_uri(); ?>/images/sobre-nos.jpg" alt="Equipe Braspump" class="relative rounded-2xl shadow-2xl w-full object-cover" width="800" height="600" loading="lazy" />
        </div>
      </div>
    </section>

    <!-- CTAS -->
    <section class="bg-primary text-white py-20">
      <div class="container mx-auto px-4 grid gap-10 md:grid-cols-2 items-center">
        <div>
          <h2 class="text-3xl md:text-4xl font-black mb-4">Fale conosco, estamos prontos para te atender!</h2>
          <div class="space-y-4">
            <a href="tel:551938074969" class="flex items-center gap-4 text-xl hover:text-brand-gold transition">
              <span class="bg-white/10 p-3 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
              (19) 3807-4969
            </a>
            <a href="https://wa.me/5519999072978" class="flex items-center gap-4 text-xl hover:text-brand-gold transition">
              <span class="bg-white/10 p-3 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
              (19) 999072978
            </a>
            <a href="mailto:vendas@braspump.com.br" class="flex items-center gap-4 text-xl hover:text-brand-gold transition">
              <span class="bg-white/10 p-3 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg></span>
              vendas@braspump.com.br
            </a>
          </div>
        </div>
        
        <div class="bg-white rounded-3xl p-8 shadow-2xl text-primary">
          <h3 class="text-2xl font-black mb-6">Envie uma mensagem</h3>
          <form class="space-y-4">
            <div>
              <label class="block text-sm font-bold mb-1">Nome *</label>
              <input type="text" placeholder="Digite seu nome" class="w-full bg-secondary border-none rounded-xl p-4 focus:ring-2 focus:ring-brand-gold outline-none" required />
            </div>
            <div>
              <label class="block text-sm font-bold mb-1">E-Mail *</label>
              <input type="email" placeholder="Digite seu e-mail" class="w-full bg-secondary border-none rounded-xl p-4 focus:ring-2 focus:ring-brand-gold outline-none" required />
            </div>
            <div>
              <label class="block text-sm font-bold mb-1">Telefone *</label>
              <input type="tel" placeholder="Digite seu telefone" class="w-full bg-secondary border-none rounded-xl p-4 focus:ring-2 focus:ring-brand-gold outline-none" required />
            </div>
            <div>
              <label class="block text-sm font-bold mb-1">Mensagem</label>
              <textarea placeholder="Deixe sua mensagem..." class="w-full bg-secondary border-none rounded-xl p-4 focus:ring-2 focus:ring-brand-gold outline-none min-h-[120px]"></textarea>
            </div>
            <button type="submit" class="w-full btn-primary justify-center py-4">ENVIAR</button>
          </form>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
