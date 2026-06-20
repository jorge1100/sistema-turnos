<!DOCTYPE html>
<html>
<head>
<style>
/*=========================================
   RESET & VARIABLES
   ========================================= */

*, *::before, *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

:root {
  --bg:       #0a0a0f;
  --surface:  #12121a;
  --surface2: #1c1c28;
  --accent:   #7c3aed;
  --accent2:  #06b6d4;
  --accent3:  #10b981;
  --text:     #f1f0f7;
  --muted:    #8b8a9b;
  --border:   rgba(124, 58, 237, 0.25);
  --mono:     'Space Mono', monospace;
  --sans:     'DM Sans', sans-serif;
}

html {
  scroll-behavior: smooth;
}

/* =========================================
   BASE
   ========================================= */

body {
  background: var(--bg);
  color: var(--text);
  font-family: var(--sans);
  min-height: 100vh;
  overflow-x: hidden;
}

/* Grid de fondo decorativo */
body::before {
  content: '';
  position: fixed;
  inset: 0;
  background-image:
    linear-gradient(rgba(124, 58, 237, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(124, 58, 237, 0.04) 1px, transparent 1px);
  background-size: 40px 40px;
  pointer-events: none;
  z-index: 0;
}

.container {
  max-width: 900px;
  margin: 0 auto;
  padding: 3rem 2rem;
  position: relative;
  z-index: 1;
}

/* =========================================
   HEADER
   ========================================= */

header {
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 2rem;
  align-items: start;
  margin-bottom: 4rem;
  padding-bottom: 3rem;
  border-bottom: 1px solid var(--border);
  opacity: 0;
  animation: fadeUp 0.7s ease forwards;
}

.header-tag {
  font-family: var(--mono);
  font-size: 11px;
  color: var(--accent2);
  letter-spacing: 0.2em;
  text-transform: uppercase;
  margin-bottom: 1rem;
}

.name {
  font-family: var(--mono);
  font-size: clamp(2.2rem, 5vw, 3.5rem);
  font-weight: 700;
  line-height: 1.1;
  background: linear-gradient(135deg, #fff 0%, var(--accent2) 50%, var(--accent) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: 0.75rem;
}

.role {
  font-size: 1.05rem;
  color: var(--muted);
  font-weight: 400;
  margin-bottom: 1.5rem;
}

/* Pills de contacto */
.contact-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
}

.pill {
  display: flex;
  align-items: center;
  gap: 6px;
  font-family: var(--mono);
  font-size: 11px;
  color: var(--muted);
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 100px;
  padding: 5px 12px;
  text-decoration: none;
  transition: all 0.2s;
  cursor: pointer;
}

.pill:hover {
  color: var(--accent2);
  border-color: var(--accent2);
  background: rgba(6, 182, 212, 0.06);
}

.pill-dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: var(--accent2);
  flex-shrink: 0;
}

/* Avatar */
.avatar-box {
  position: relative;
}

.avatar {
  width: 120px;
  height: 120px;
  border-radius: 16px;
  background: var(--surface2);
  border: 2px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--mono);
  font-size: 2rem;
  font-weight: 700;
  color: var(--accent2);
  position: relative;
  overflow: hidden;
}

.avatar::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(124, 58, 237, 0.15), rgba(6, 182, 212, 0.15));
}

.avatar::before {
  z-index: 1;
}

.avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: relative;
  z-index: 2; /* 👈 esto pone la imagen arriba */
}

.status-badge {
  position: absolute;
  bottom: -6px;
  right: -6px;
  background: var(--bg);
  border: 1px solid var(--accent3);
  border-radius: 100px;
  padding: 4px 10px;
  font-family: var(--mono);
  font-size: 9px;
  color: var(--accent3);
  letter-spacing: 0.1em;
  display: flex;
  align-items: center;
  gap: 5px;
  white-space: nowrap;
  z-index: 10; /* 👈 CLAVE */

}

.status-dot {
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background: var(--accent3);
  animation: pulse 2s infinite;
}

/* =========================================
   SECCIONES
   ========================================= */

section {
  margin-bottom: 3.5rem;
  opacity: 0;
  animation: fadeUp 0.7s ease forwards;
}

section:nth-of-type(1) { animation-delay: 0.1s; }
section:nth-of-type(2) { animation-delay: 0.2s; }
section:nth-of-type(3) { animation-delay: 0.3s; }
section:nth-of-type(4) { animation-delay: 0.4s; }
section:nth-of-type(5) { animation-delay: 0.5s; }
section:nth-of-type(6) { animation-delay: 0.6s; }

.section-label {
  font-family: var(--mono);
  font-size: 10px;
  letter-spacing: 0.25em;
  text-transform: uppercase;
  color: var(--accent);
  margin-bottom: 1.25rem;
  display: flex;
  align-items: center;
  gap: 12px;
}

.section-label::after {
  content: '';
  flex: 1;
  height: 1px;
  background: var(--border);
}

/* =========================================
   SOBRE MÍ
   ========================================= */

.about-text {
  font-size: 1rem;
  line-height: 1.8;
  color: rgba(241, 240, 247, 0.8);
  max-width: 680px;
}

/* =========================================
   SKILLS
   ========================================= */

.skills-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
  gap: 1rem;
}

.skill-group {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 12px;
  padding: 1.25rem;
  transition: border-color 0.2s;
}

.skill-group:hover {
  border-color: rgba(124, 58, 237, 0.5);
}

.skill-group-title {
  font-family: var(--mono);
  font-size: 10px;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--accent2);
  margin-bottom: 1rem;
}

.skill-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
}

.skill-tag {
  font-family: var(--mono);
  font-size: 11px;
  padding: 4px 10px;
  border-radius: 6px;
  background: var(--surface2);
  color: var(--text);
  border: 1px solid rgba(255, 255, 255, 0.06);
  cursor: default;
  transition: all 0.2s;
}

.skill-tag:hover {
  background: rgba(124, 58, 237, 0.15);
  border-color: rgba(124, 58, 237, 0.4);
  color: #c4b5fd;
  transform: translateY(-1px);
}

/* =========================================
   EXPERIENCIA
   ========================================= */

.timeline {
  position: relative;
  padding-left: 1.5rem;
}

.timeline::before {
  content: '';
  position: absolute;
  left: 0;
  top: 8px;
  bottom: 0;
  width: 1px;
  background: var(--border);
}

.job {
  position: relative;
  margin-bottom: 2.5rem;
}

.job::before {
  content: '';
  position: absolute;
  left: -1.5rem;
  top: 8px;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: var(--accent);
  border: 1px solid var(--bg);
  box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.2);
}

.job-header {
  display: flex;
  justify-content: space-between;
  align-items: start;
  flex-wrap: wrap;
  gap: 0.5rem;
  margin-bottom: 0.5rem;
}

.job-title {
  font-size: 1rem;
  font-weight: 600;
  color: var(--text);
}

.job-company {
  color: var(--accent2);
  font-weight: 400;
}

.job-period {
  font-family: var(--mono);
  font-size: 11px;
  color: var(--muted);
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 100px;
  padding: 3px 10px;
  white-space: nowrap;
}

.job-desc {
  font-size: 0.92rem;
  color: rgba(241, 240, 247, 0.7);
  line-height: 1.7;
  margin-bottom: 0.75rem;
}

.job-tech {
  display: flex;
  flex-wrap: wrap;
  gap: 5px;
}

.tech-badge {
  font-family: var(--mono);
  font-size: 10px;
  padding: 2px 8px;
  border-radius: 4px;
  background: rgba(124, 58, 237, 0.1);
  color: #c4b5fd;
  border: 1px solid rgba(124, 58, 237, 0.2);
}

/* =========================================
   PROYECTOS
   ========================================= */

.projects-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
  gap: 1rem;
}

.project-card {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 12px;
  padding: 1.5rem;
  transition: all 0.2s;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

/* Línea de color superior al hacer hover */
.project-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 2px;
  background: linear-gradient(90deg, var(--accent), var(--accent2));
  transform: scaleX(0);
  transition: transform 0.3s;
}

.project-card:hover {
  border-color: rgba(124, 58, 237, 0.4);
}

.project-card:hover::before {
  transform: scaleX(1);
}

.project-icon {
  font-family: var(--mono);
  font-size: 1.5rem;
  margin-bottom: 0.75rem;
}

.project-name {
  font-size: 0.95rem;
  font-weight: 600;
  margin-bottom: 0.5rem;
}

.project-desc {
  font-size: 0.85rem;
  color: var(--muted);
  line-height: 1.6;
  margin-bottom: 1rem;
}

.project-link {
  font-family: var(--mono);
  font-size: 10px;
  color: var(--accent2);
  text-decoration: none;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  display: flex;
  align-items: center;
  gap: 5px;
  transition: gap 0.2s;
}

.project-link:hover {
  gap: 8px;
}

/* =========================================
   EDUCACIÓN
   ========================================= */

.edu-item {
  display: flex;
  justify-content: space-between;
  align-items: start;
  flex-wrap: wrap;
  gap: 0.5rem;
  padding: 1.25rem;
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 12px;
  margin-bottom: 1rem;
  transition: border-color 0.2s;
}

.edu-item:hover {
  border-color: rgba(6, 182, 212, 0.3);
}

.edu-title {
  font-size: 0.95rem;
  font-weight: 600;
  margin-bottom: 3px;
}

.edu-inst {
  font-size: 0.85rem;
  color: var(--muted);
}

.edu-year {
  font-family: var(--mono);
  font-size: 11px;
  color: var(--accent2);
}

/* =========================================
   FOOTER
   ========================================= */

footer {
  margin-top: 4rem;
  padding-top: 2rem;
  border-top: 1px solid var(--border);
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 1rem;
  opacity: 0;
  animation: fadeUp 0.7s ease 0.7s forwards;
}

.footer-text {
  font-family: var(--mono);
  font-size: 11px;
  color: var(--muted);
}

.download-btn {
  display: flex;
  align-items: center;
  gap: 8px;
  font-family: var(--mono);
  font-size: 11px;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--bg);
  background: var(--accent2);
  border: none;
  border-radius: 8px;
  padding: 10px 20px;
  cursor: pointer;
  transition: all 0.2s;
}

.download-btn:hover {
  background: #22d3ee;
  transform: translateY(-1px);
}

/* =========================================
   ANIMACIONES
   ========================================= */

@keyframes fadeUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes pulse {
  0%, 100% { opacity: 1; }
  50%       { opacity: 0.3; }
}

/* =========================================
   IMPRESIÓN / PDF
   ========================================= */

@media print {
  body {
    background: #fff;
    color: #000;
  }

@media print {
  .avatar img {
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
    }
  }

  @media print {
  .avatar::before {
    display: none; /* 👈 elimina el overlay en PDF */
  }
  }

  body::before {
    display: none;
  }
  .download-btn {
    display: none;
  }
  section, header {
    opacity: 1;
    animation: none;
  }
}

/* =========================================
   RESPONSIVE
   ========================================= */

@media (max-width: 600px) {
  header {
    grid-template-columns: 1fr;
  }
  .avatar-box {
    display: none;
  }
  .name {
    font-size: 2rem;
  }
}

.avatar {
  width: 120px;   /* más grande */
  height: 120px;
  border-radius: 50%;
  overflow: hidden;
  border: 2px solid var(--border);
}

.avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV — Desarrollador Full Stack</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

</head>
<body>
  <div class="container">

    

<!-- ENCABEZADO -->
<header>
  <div>
    <!-- <p class="header-tag">// curriculum vitae · 2026</p> -->
    <h1 class="name">Silvera<br>Cristian</h1>
    <p class="role">Full Stack Developer · 5 años de experiencia</p>

    <div class="contact-pills">
      <a class="pill" href="mailto:tunombre@email.com">
        <span class="pill-dot"></span>
        rusosilvera018@gmail.com
      </a>

      <a class="pill" href="https://github.com/rusosilvera018-tech" target="_blank">
        <span class="pill-dot" style="background: var(--accent)"></span>
        https://github.com/rusosilvera018-tech
      </a>

      <a class="pill" href="https://www.linkedin.com/in/cristian-silvera-775635349/" target="_blank">
        <span class="pill-dot" style="background: #0a66c2"></span>
        https://www.linkedin.com/in/jorge-rojas-2138a591/
      </a>

      <span class="pill">
        <span class="pill-dot" style="background: var(--accent3)"></span>
        FORMOSA, AR
      </span>
    </div>
  </div>

  <!-- ✅ FOTO CORREGIDA -->
  <div class="avatar-box">
    <div class="avatar">

      <img src="/cv/cristian/f1.jpg" alt="Foto de perfil">

    </div>

    <div class="status-badge">
      <span class="status-dot"></span>disponible
    </div>
  </div>

</header>

    <!-- SOBRE MÍ -->
    <section>
      <p class="section-label">sobre mí</p>
      <p class="about-text">
        Desarrollador Full Stack apasionado por construir productos digitales escalables y de alto rendimiento.
        Me especializo en arquitecturas modernas con laravel Node.js y bases de datos SQL/NoSQL.
        Valoro el código limpio, la colaboración en equipo y la entrega continua de valor.
        Busco proyectos desafiantes donde pueda crecer técnicamente y aportar soluciones reales.
      </p>
    </section>

    <!-- STACK TECNOLÓGICO -->
    <section>
      <p class="section-label">stack tecnológico</p>
      <div class="skills-grid">
        <div class="skill-group">
          <p class="skill-group-title">Frontend</p>
          <div class="skill-tags">
            <span class="skill-tag">HTML5</span>
            <span class="skill-tag">CSS3</span>
            <span class="skill-tag">jAVAScript</span>
          </div>
        </div>
        <div class="skill-group">
          <p class="skill-group-title">Backend</p>
          <div class="skill-tags">
            <span class="skill-tag">Node.js</span>
            <span class="skill-tag">laravel</span>
            <span class="skill-tag">Python</span>
            <span class="skill-tag">Django</span>
          </div>
        </div>
        <div class="skill-group">
          <p class="skill-group-title">Base de datos</p>
          <div class="skill-tags">
            <span class="skill-tag">PostgreSQL</span>
            <span class="skill-tag">Mariadb</span>
            <span class="skill-tag">MySQL</span>
          </div>
        </div>
        <div class="skill-group">
          <p class="skill-group-title">DevOps &amp; herramientas</p>
          <div class="skill-tags">
            <span class="skill-tag">Linux</span>
            <span class="skill-tag">Docker</span>
            <span class="skill-tag">GitHub Actions</span>
            <span class="skill-tag">Git</span>
          </div>
        </div>
      </div>
    </section>

    <!-- EXPERIENCIA -->
    <section>
      <p class="section-label">experiencia</p>
      <div class="timeline">
        
        <div class="job">
          <div class="job-header">
            <p class="job-title">Senior Full Stack Developer · <span class="job-company">Empresa Domo fusio</span></p>
            <span class="job-period">2026 — presente</span>
          </div>
          <p class="job-desc">
            <!-- Lideré el desarrollo de una plataforma SaaS B2B utilizada por más de 200 empresas.
            Rediseñé la arquitectura del backend logrando una reducción del 40% en tiempos de respuesta.
            Implementé CI/CD con GitHub Actions y gestioné deploys en AWS ECS. -->
          </p>
          <div class="job-tech">
            <span class="tech-badge">Linux</span>
            <span class="tech-badge">Mariadb</span>
            <span class="tech-badge">Laravel</span>
            <span class="tech-badge">Git</span>
            <span class="tech-badge">Github</span>
          </div>
        </div>

        <div class="job">
          <div class="job-header">
            <p class="job-title">Senior Full Stack Developer · <span class="job-company">Empresa Euforiaboutique</span></p>
            <span class="job-period">2026 — presente</span>
          </div>
          <p class="job-desc">
            <!-- Lideré el desarrollo de una plataforma SaaS B2B utilizada por más de 200 empresas.
            Rediseñé la arquitectura del backend logrando una reducción del 40% en tiempos de respuesta.
            Implementé CI/CD con GitHub Actions y gestioné deploys en AWS ECS. -->
          </p>
          <div class="job-tech">
            <span class="tech-badge">Linux</span>
            <span class="tech-badge">Mariadb</span>
            <span class="tech-badge">Laravel</span>
            <span class="tech-badge">Git</span>
            <span class="tech-badge">Github</span>
          </div>
        </div>

      </div>
    </section>

    <!-- PROYECTOS -->
    <section>
      <p class="section-label">proyectos destacados</p>
      <div class="projects-grid">

        <div class="project-card">
          <div class="project-icon">&lt;/&gt;</div>
          <p class="project-name">DevTrack</p>
          <p class="project-desc">Plataforma de gestión de proyectos con tableros Kanban en tiempo real y analíticas avanzadas para equipos de desarrollo.</p>
          <a class="project-link" href="#" onclick="return false;">ver proyecto →</a>
        </div>

        <div class="project-card">
          <div class="project-icon">&#9889;</div>
          <p class="project-name">FastAPI Starter</p>
          <p class="project-desc">Template open source para APIs REST con autenticación JWT, rate limiting y documentación automática. +400 estrellas en GitHub.</p>
          <a class="project-link" href="#" onclick="return false;">ver proyecto →</a>
        </div>

        <div class="project-card">
          <div class="project-icon">&#128722;</div>
          <p class="project-name">EcommerceKit</p>
          <p class="project-desc">Solución e-commerce fullstack con integración de MercadoPago, gestión de inventario y dashboard de ventas en tiempo real.</p>
          <a class="project-link" href="#" onclick="return false;">ver proyecto →</a>
        </div>

      </div>
    </section>

    <!-- EDUCACIÓN -->
    <section>
      <p class="section-label">educación</p>

      <div class="edu-item">
        <div>
          <p class="edu-title">Tecnico universitario en programacion</p>
          <p class="edu-inst">Universidad Tecnológica Nacional (UTN)</p>
        </div>
        <span class="edu-year">2025 — 2026</span>
      </div>

    </section>

    <!-- FOOTER -->
    <footer>
      <div>
        <p class="footer-text">// actualizado · enero 2025</p>
        <p class="footer-text" style="margin-top: 4px">Referencias disponibles a solicitud</p>
      </div>
      <button class="download-btn" onclick="window.print()">&#8595; descargar PDF</button>
    </footer>

  </div>

  <script src="script.js"></script>
</body>

<script>
    // =========================================
// EFECTO 3D EN TARJETAS DE PROYECTOS
// =========================================

// Seleccionamos todas las tarjetas de proyectos
const projectCards = document.querySelectorAll('.project-card');

projectCards.forEach(card => {

  // Al mover el mouse encima de la tarjeta
  card.addEventListener('mousemove', (e) => {
    const rect = card.getBoundingClientRect();

    // Calculamos la posición relativa del mouse dentro de la tarjeta
    const x = ((e.clientX - rect.left) / rect.width - 0.5) * 6;
    const y = ((e.clientY - rect.top) / rect.height - 0.5) * -6;

    // Aplicamos la rotación 3D
    card.style.transform = `perspective(600px) rotateY(${x}deg) rotateX(${y}deg) translateY(-2px)`;
  });

  // Al salir el mouse, volvemos al estado original
  card.addEventListener('mouseleave', () => {
    card.style.transform = '';
  });

});


// =========================================
// EFECTO CLICK EN SKILL TAGS
// =========================================

const skillTags = document.querySelectorAll('.skill-tag');

skillTags.forEach(tag => {

  tag.addEventListener('click', () => {
    // Resaltamos la tag brevemente al hacer click
    tag.style.background    = 'rgba(124, 58, 237, 0.3)';
    tag.style.borderColor   = 'rgba(124, 58, 237, 0.6)';

    // Volvemos al estilo original después de 600ms
    setTimeout(() => {
      tag.style.background  = '';
      tag.style.borderColor = '';
    }, 600);
  });

});
</script>

</body>
</html>
