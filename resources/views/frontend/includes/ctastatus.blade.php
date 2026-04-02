<!DOCTYPE html>
<html lang="en">
  <body>
    <div>
      <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
      <style>
        .counter-image{
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
        /* container layout (optional adjustments) */
        .home-stats {
            display: flex;
            gap: 2rem;
            justify-content: center;
            align-items: stretch;
            padding: 2rem;
            perspective: 1200px; /* important for 3D depth */
        }

        /* Card base */
        .stat-card {
            flex: 1 1 280px;
            background: rgba(220, 77, 1, 0.58);
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 18px 40px rgba(10,20,40,0.12), inset 0 1px 0 rgba(255,255,255,0.6);
            transition: transform 350ms cubic-bezier(.2,.9,.2,1), box-shadow 350ms;
            transform-style: preserve-3d;
            will-change: transform;
            min-height: 220px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            cursor: pointer;
        }

        /* Image (round) */
        .counter-image {
            border-radius: 50%;
            height: 100px !important;
            width: 100px !important;
            object-fit: cover;
            margin-bottom: 12px;
            transform: translateZ(30px); /* lifts image visually in 3D space */
            transition: transform 400ms cubic-bezier(.2,.9,.2,1);
            box-shadow: 0 10px 30px rgba(20,30,60,0.12);
        }

        /* Text defaults (you had Times New Roman) */
        .stat-card .home-text10,
        .stat-card .home-text14,
        .stat-card .home-text18 {
            display: block;
            font-family: "Times New Roman", Times, serif;
            font-weight: 700;
            color: #111;
            margin-top: 6px;
        }

        .stat-card .home-text11,
        .stat-card .home-text15,
        .stat-card .home-text19 {
            display:block;
            font-family: "Times New Roman", Times, serif;
            color: #000;
            font-size: 0.95rem;
            margin-bottom: 8px;
        }

        .stat-card h1 {
            font-family: "Times New Roman", Times, serif;

            color: #222;
        }

        /* Hover fallback: simple lift */
        .stat-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 70px rgba(10,20,40,0.18);
        }

        /* subtle floating animation for cards (so they breathe even when idle) */
        @keyframes floaty {
            0%   { transform: translateY(0) rotateX(0) translateZ(0); }
            50%  { transform: translateY(-6px) rotateX(.2deg) translateZ(3px); }
            100% { transform: translateY(0) rotateX(0) translateZ(0); }
        }
        .stat-card.idle {
            animation: floaty 6s ease-in-out infinite;
        }

        /* Focus / active states for accessibility */
        .stat-card:active {
            transform: translateY(-4px) scale(1.01);
        }

        /* Responsive tweak */
        @media (max-width: 900px) {
            .home-stats {
                flex-direction: column;
            }
            .stat-card { width: 100%; }
        }

      </style>

        <div class="service-team-container">
            <div class="home-stats" style="height: 100%;">
                <div class="home-customers stat-card">
                    <img class="counter-image" src="{{ asset(getContentData(35, 'image')) }}" alt="" >
                    <span class="home-text10">{{ getContentData(35, 'title'); }}</span>
                    <span class="home-text11">{{ getContentData(35, 'subtitle'); }}</span>
                    <h1 class="home-text12">{!! getContentData(35, 'description'); !!}</h1>
                </div>

                <div class="home-projects stat-card">
                    <img class="counter-image" src="{{ asset(getContentData(36, 'image')) }}" alt="" >
                    <span class="home-text14">{{ getContentData(36, 'title'); }}</span>
                    <span class="home-text15">{{ getContentData(36, 'subtitle'); }}</span>
                    <h1 class="home-text16">{!! getContentData(36, 'description'); !!}</h1>
                </div>

                <div class="home-cities stat-card">
                    <img class="counter-image" src="{{ asset(getContentData(37, 'image')) }}" alt="" >
                    <span class="home-text18">{{ getContentData(37, 'title'); }}</span>
                    <span class="home-text19">{{ getContentData(37, 'subtitle'); }}</span>
                    <h1 class="home-text20">{!! getContentData(37, 'description'); !!}</h1>
                </div>
            </div>
        </div>



    </div>
  </body>

  <script>
      (function(){
          const cards = document.querySelectorAll('.stat-card');

          cards.forEach(card => {
              // optional idle animation toggle
              card.classList.add('idle');

              card.addEventListener('mousemove', (e) => {
                  const rect = card.getBoundingClientRect();
                  const px = (e.clientX - rect.left) / rect.width;   // 0..1
                  const py = (e.clientY - rect.top)  / rect.height;  // 0..1

                  // map to rotation ranges
                  const rotateY = (px - 0.5) * 18; // -9deg .. +9deg
                  const rotateX = (0.5 - py) * 12; // -6deg .. +6deg
                  const translateZ = 18; // lift amount

                  card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(${translateZ}px) scale(1.03)`;
                  card.style.boxShadow = `${-rotateY*1.8}px ${30 + Math.abs(rotateX)*1.2}px 70px rgba(10,20,40,0.18)`;

                  // lift the image a bit more for depth
                  const img = card.querySelector('.counter-image');
                  if (img) img.style.transform = `translateZ(${translateZ + 12}px)`;
                  // disable idle float while interacting
                  card.classList.remove('idle');
              });

              card.addEventListener('mouseleave', () => {
                  card.style.transform = '';
                  card.style.boxShadow = '';
                  const img = card.querySelector('.counter-image');
                  if (img) img.style.transform = '';
                  // re-enable idle breathing after mouse leaves
                  setTimeout(()=> card.classList.add('idle'), 200);
              });

              // keyboard accessibility: on focus show slight lift
              card.addEventListener('focusin', () => {
                  card.style.transform = 'translateY(-8px) scale(1.02)';
                  card.classList.remove('idle');
              });
              card.addEventListener('focusout', () => {
                  card.style.transform = '';
                  setTimeout(()=> card.classList.add('idle'), 200);
              });
          });
      })();
  </script>

</html>


