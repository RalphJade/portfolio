<!DOCTYPE html>
<html lang="en" x-data="{ mode: 'cards', theme: 'dark' }" :class="theme">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Portfolio | Interactive Card View</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Space+Grotesk:wght@400;500;600;700&family=VT323&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        pixel: ['"Press Start 2P"', 'monospace'],
                        monoRetro: ['"VT323"', 'monospace'],
                        sans: ['"Space Grotesk"', 'sans-serif'],
                    },
                    colors: {
                        retro: {
                            bg: '#0f172a',
                            card: '#1e293b',
                            cardLight: '#ffffff',
                            amber: '#f59e0b',
                            cyan: '#06b6d4',
                            emerald: '#10b981',
                            rose: '#f43f5e',
                            purple: '#8b5cf6',
                            cream: '#fef3c7',
                            paper: '#f8fafc',
                        }
                    },
                    boxShadow: {
                        'retro-sm': '3px 3px 0px 0px rgba(0,0,0,0.85)',
                        'retro': '5px 5px 0px 0px rgba(0,0,0,0.85)',
                        'retro-lg': '8px 8px 0px 0px rgba(0,0,0,0.85)',
                        'retro-amber': '5px 5px 0px 0px #f59e0b',
                        'retro-cyan': '5px 5px 0px 0px #06b6d4',
                        'retro-emerald': '5px 5px 0px 0px #10b981',
                        'retro-rose': '5px 5px 0px 0px #f43f5e',
                        'retro-purple': '5px 5px 0px 0px #8b5cf6',
                    }
                }
            }
        }
    </script>
    <style>
        /* Subtle retro CRT scanline effect */
        .scanlines {
            background: linear-gradient(
                rgba(18, 16, 16, 0) 50%,
                rgba(0, 0, 0, 0.15) 50%
            );
            background-size: 100% 4px;
        }

        /* Tactile retro card bevels & borders */
        .retro-card {
            border: 3px solid #0f172a;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }
        .dark .retro-card {
            border: 3px solid #38bdf8;
        }

        .retro-card-amber { border-color: #f59e0b !important; }
        .retro-card-cyan { border-color: #06b6d4 !important; }
        .retro-card-emerald { border-color: #10b981 !important; }
        .retro-card-rose { border-color: #f43f5e !important; }
        .retro-card-purple { border-color: #8b5cf6 !important; }

        .retro-card:hover {
            transform: translateY(-2px);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #0f172a;
        }
        ::-webkit-scrollbar-thumb {
            background: #f59e0b;
            border: 2px solid #0f172a;
        }
    </style>
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen antialiased selection:bg-amber-400 selection:text-slate-900 pb-12">

    <!-- Top Navigation Deck Bar -->
    <header class="sticky top-0 z-50 bg-slate-900/95 backdrop-blur border-b-4 border-slate-800 px-4 md:px-8 py-3">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-3">

            <!-- Logo / Badge -->
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-amber-500 text-slate-950 font-pixel text-xs font-bold flex items-center justify-center border-2 border-amber-300 shadow-retro-sm">
                    DEV
                </div>
                <div>
                    <h1 class="font-pixel text-xs text-amber-400 tracking-wider">ALEX RIVERS</h1>
                    <p class="font-monoRetro text-sm text-slate-400 tracking-widest uppercase">Full-Stack Web Engineer</p>
                </div>
            </div>

            <!-- View & Deck Controls -->
            <div class="flex items-center space-x-3">
                <!-- Status Badge -->
                <div class="hidden sm:flex items-center space-x-2 bg-slate-800 px-3 py-1 rounded border-2 border-slate-700">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                    <span class="font-monoRetro text-emerald-400 text-base">AVAILABLE FOR HIRE</span>
                </div>

                <!-- Theme / Layout Switcher -->
                <div class="flex items-center bg-slate-800 p-1 rounded border-2 border-slate-700">
                    <button @click="mode = 'cards'"
                            :class="mode === 'cards' ? 'bg-amber-500 text-slate-950 font-bold shadow-retro-sm' : 'text-slate-400 hover:text-white'"
                            class="px-3 py-1 text-xs font-monoRetro text-base transition rounded">
                        🃏 Card Deck
                    </button>
                    <button @click="mode = 'grid'"
                            :class="mode === 'grid' ? 'bg-cyan-500 text-slate-950 font-bold shadow-retro-sm' : 'text-slate-400 hover:text-white'"
                            class="px-3 py-1 text-xs font-monoRetro text-base transition rounded">
                        📋 Compact List
                    </button>
                </div>
            </div>

        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 md:px-6 pt-8 space-y-10">

        <!-- SECTION 1: DEVELOPER ID CARD (HERO) -->
        <section class="bg-slate-800 border-4 border-amber-500 rounded-lg p-6 md:p-8 shadow-retro-amber relative overflow-hidden">
            <!-- Retro Card Watermark -->
            <div class="absolute -right-6 -bottom-6 opacity-10 font-pixel text-8xl text-amber-400 select-none pointer-events-none">
                #001
            </div>

            <div class="flex flex-col md:flex-row gap-6 items-center md:items-start relative z-10">

                <!-- Avatar Card Photo -->
                <div class="flex flex-col items-center shrink-0">
                    <div class="w-36 h-36 md:w-44 md:h-44 bg-slate-900 border-4 border-slate-700 rounded p-2 shadow-retro relative group">
                        <img src="https://api.dicebear.com/7.x/bottts/svg?seed=AlexRiversDev&backgroundColor=0284c7"
                             alt="Alex Rivers Avatar"
                             class="w-full h-full object-cover rounded bg-slate-950">
                        <span class="absolute -top-3 -right-3 bg-rose-500 text-white font-pixel text-[10px] px-2 py-1 rounded border-2 border-white shadow-retro-sm">
                            PRO
                        </span>
                    </div>
                    <span class="mt-3 font-monoRetro text-amber-400 text-lg tracking-wider">ID: AR-8890-DEV</span>
                </div>

                <!-- Bio & Professional Summary -->
                <div class="flex-1 text-center md:text-left space-y-4">
                    <div>
                        <div class="flex flex-wrap justify-center md:justify-start items-center gap-2 mb-2">
                            <span class="bg-amber-500/20 text-amber-300 border border-amber-500/40 px-2.5 py-0.5 rounded text-xs font-monoRetro text-base font-semibold">
                                ★ SENIOR SOFTWARE ENGINEER
                            </span>
                            <span class="bg-cyan-500/20 text-cyan-300 border border-cyan-500/40 px-2.5 py-0.5 rounded text-xs font-monoRetro text-base font-semibold">
                                7+ YEARS EXPERIENCE
                            </span>
                        </div>
                        <h2 class="font-pixel text-xl md:text-2xl text-white tracking-tight">
                            ALEX RIVERS
                        </h2>
                        <p class="font-monoRetro text-xl text-cyan-400 tracking-wide mt-1">
                            Building clean, performant & user-friendly web applications
                        </p>
                    </div>

                    <p class="text-slate-300 text-base leading-relaxed max-w-3xl">
                        Welcome to my portfolio! I specialize in modern full-stack development with Laravel, Vue.js, React, and Tailwind CSS. I bridge the gap between elegant design and robust engineering, creating reliable web systems that scale effortlessly.
                    </p>

                    <!-- Quick Metrics / Spec Badges -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2">
                        <div class="bg-slate-900/80 p-2.5 rounded border border-slate-700 text-center">
                            <span class="block font-monoRetro text-slate-400 text-sm">MAIN STACK</span>
                            <span class="font-semibold text-amber-400 text-sm">PHP / Laravel</span>
                        </div>
                        <div class="bg-slate-900/80 p-2.5 rounded border border-slate-700 text-center">
                            <span class="block font-monoRetro text-slate-400 text-sm">FRONTEND</span>
                            <span class="font-semibold text-cyan-400 text-sm">Vue & Tailwind</span>
                        </div>
                        <div class="bg-slate-900/80 p-2.5 rounded border border-slate-700 text-center">
                            <span class="block font-monoRetro text-slate-400 text-sm">DATABASE</span>
                            <span class="font-semibold text-emerald-400 text-sm">PostgreSQL / MySQL</span>
                        </div>
                        <div class="bg-slate-900/80 p-2.5 rounded border border-slate-700 text-center">
                            <span class="block font-monoRetro text-slate-400 text-sm">LOCATION</span>
                            <span class="font-semibold text-rose-400 text-sm">Remote / UTC-5</span>
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-center md:justify-start gap-3 pt-2">
                        <a href="#contact" class="bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold px-5 py-2.5 rounded text-sm font-pixel shadow-retro transition">
                            ✉ CONTACT ME
                        </a>
                        <a href="#projects" class="bg-slate-700 hover:bg-slate-600 text-white font-semibold px-5 py-2.5 rounded text-sm font-sans border border-slate-600 shadow-retro transition">
                            🔍 EXPLORE CARDS
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 2: CORE SKILL CARDS DECK -->
        <section class="space-y-4">
            <div class="flex justify-between items-end border-b-2 border-slate-800 pb-3">
                <div>
                    <h3 class="font-pixel text-sm text-amber-400 uppercase tracking-wider">SKILL SET CARDS</h3>
                    <p class="text-slate-400 text-sm font-sans mt-1">Core competencies and technical proficiency ratings</p>
                </div>
                <span class="font-monoRetro text-slate-400 text-lg">DECK SIZE: 4 CARDS</span>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">

                <!-- Skill Card 1: Backend Architecture -->
                <div class="bg-slate-800 rounded-lg p-5 border-3 border-amber-500 shadow-retro-amber flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-pixel text-[10px] text-amber-400">CARD 01</span>
                            <span class="bg-amber-500/20 text-amber-300 text-xs px-2 py-0.5 rounded font-monoRetro">EXPERT</span>
                        </div>
                        <h4 class="font-bold text-lg text-white mb-2">Backend & APIs</h4>
                        <p class="text-xs text-slate-300 mb-4">RESTful APIs, Microservices, Database Design & Query Optimization.</p>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs font-monoRetro text-slate-300">
                            <span>Laravel / PHP</span>
                            <span class="text-amber-400">█████████░ 95%</span>
                        </div>
                        <div class="flex justify-between text-xs font-monoRetro text-slate-300">
                            <span>SQL & ORM</span>
                            <span class="text-amber-400">████████░░ 88%</span>
                        </div>
                    </div>
                </div>

                <!-- Skill Card 2: Frontend Engineering -->
                <div class="bg-slate-800 rounded-lg p-5 border-3 border-cyan-500 shadow-retro-cyan flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-pixel text-[10px] text-cyan-400">CARD 02</span>
                            <span class="bg-cyan-500/20 text-cyan-300 text-xs px-2 py-0.5 rounded font-monoRetro">EXPERT</span>
                        </div>
                        <h4 class="font-bold text-lg text-white mb-2">Frontend Systems</h4>
                        <p class="text-xs text-slate-300 mb-4">Responsive UI/UX, Vue.js, React, Tailwind CSS & State Management.</p>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs font-monoRetro text-slate-300">
                            <span>Vue / Inertia</span>
                            <span class="text-cyan-400">█████████░ 92%</span>
                        </div>
                        <div class="flex justify-between text-xs font-monoRetro text-slate-300">
                            <span>Tailwind / CSS</span>
                            <span class="text-cyan-400">██████████ 98%</span>
                        </div>
                    </div>
                </div>

                <!-- Skill Card 3: Cloud & DevOps -->
                <div class="bg-slate-800 rounded-lg p-5 border-3 border-emerald-500 shadow-retro-emerald flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-pixel text-[10px] text-emerald-400">CARD 03</span>
                            <span class="bg-emerald-500/20 text-emerald-300 text-xs px-2 py-0.5 rounded font-monoRetro">PROFICIENT</span>
                        </div>
                        <h4 class="font-bold text-lg text-white mb-2">DevOps & Cloud</h4>
                        <p class="text-xs text-slate-300 mb-4">CI/CD pipelines, Docker containerization, AWS & Server Management.</p>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs font-monoRetro text-slate-300">
                            <span>Docker & CI/CD</span>
                            <span class="text-emerald-400">████████░░ 82%</span>
                        </div>
                        <div class="flex justify-between text-xs font-monoRetro text-slate-300">
                            <span>AWS & Linux</span>
                            <span class="text-emerald-400">████████░░ 80%</span>
                        </div>
                    </div>
                </div>

                <!-- Skill Card 4: Architecture & Testing -->
                <div class="bg-slate-800 rounded-lg p-5 border-3 border-purple-500 shadow-retro-purple flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-pixel text-[10px] text-purple-400">CARD 04</span>
                            <span class="bg-purple-500/20 text-purple-300 text-xs px-2 py-0.5 rounded font-monoRetro">EXPERT</span>
                        </div>
                        <h4 class="font-bold text-lg text-white mb-2">Code Quality</h4>
                        <p class="text-xs text-slate-300 mb-4">Automated testing (Pest/PHPUnit), TDD, and clean architecture patterns.</p>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs font-monoRetro text-slate-300">
                            <span>Pest / PHPUnit</span>
                            <span class="text-purple-400">█████████░ 90%</span>
                        </div>
                        <div class="flex justify-between text-xs font-monoRetro text-slate-300">
                            <span>Clean Code / OOP</span>
                            <span class="text-purple-400">█████████░ 95%</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 3: FEATURED PROJECT CARDS (TRADING CARD DECK) -->
        <section id="projects" class="space-y-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end border-b-2 border-slate-800 pb-3 gap-2">
                <div>
                    <h3 class="font-pixel text-sm text-cyan-400 uppercase tracking-wider">FEATURED PROJECT CARDS</h3>
                    <p class="text-slate-400 text-sm font-sans mt-1">Highlighted work, web applications, and software products</p>
                </div>
                <div class="flex items-center space-x-2 text-xs font-monoRetro text-slate-400">
                    <span class="inline-block w-2 h-2 rounded-full bg-cyan-400"></span>
                    <span>SELECT A CARD TO INSPECT DETAILS</span>
                </div>
            </div>

            <!-- Card View Mode -->
            <div x-show="mode === 'cards'" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Project Trading Card 1 -->
                <div class="bg-slate-800 rounded-lg border-4 border-amber-500 shadow-retro-amber p-5 flex flex-col justify-between relative group hover:-translate-y-1 transition duration-200">
                    <!-- Top Ribbon Header -->
                    <div>
                        <div class="flex justify-between items-center border-b-2 border-slate-700 pb-2 mb-3">
                            <span class="font-pixel text-[10px] text-amber-400">CARD #01 // E-COMMERCE</span>
                            <span class="bg-amber-500 text-slate-950 font-bold text-[10px] px-2 py-0.5 rounded font-pixel">
                                FEATURED
                            </span>
                        </div>

                        <!-- Card Visual / Thumbnail Box -->
                        <div class="bg-slate-900 border-2 border-slate-700 rounded p-4 mb-4 text-center relative overflow-hidden">
                            <div class="font-pixel text-3xl text-amber-400 mb-1">🛍️</div>
                            <span class="font-monoRetro text-slate-400 text-xs uppercase tracking-widest">Multi-Vendor Storefront</span>
                        </div>

                        <h4 class="font-bold text-xl text-white mb-2">Commerce Nexus Platform</h4>
                        <p class="text-slate-300 text-sm mb-4 line-clamp-3">
                            A high-volume multi-vendor marketplace engine featuring custom payment gateways, real-time inventory management, and automated order processing.
                        </p>

                        <!-- Key Achievements / Highlights -->
                        <div class="bg-slate-900/90 rounded p-3 mb-4 space-y-1 border border-slate-700">
                            <div class="text-xs text-amber-300 font-monoRetro flex items-center gap-1.5">
                                <span>⚡</span> Processed 100,000+ monthly transactions
                            </div>
                            <div class="text-xs text-emerald-300 font-monoRetro flex items-center gap-1.5">
                                <span>🔒</span> Stripe & PayPal integrated security
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer & Tech Stack Tags -->
                    <div class="space-y-3 pt-2 border-t-2 border-slate-700">
                        <div class="flex flex-wrap gap-1.5">
                            <span class="bg-slate-900 text-slate-300 text-xs px-2 py-0.5 rounded border border-slate-700 font-monoRetro">Laravel 11</span>
                            <span class="bg-slate-900 text-slate-300 text-xs px-2 py-0.5 rounded border border-slate-700 font-monoRetro">Vue 3</span>
                            <span class="bg-slate-900 text-slate-300 text-xs px-2 py-0.5 rounded border border-slate-700 font-monoRetro">MySQL</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="#" class="text-xs font-bold text-amber-400 hover:text-amber-300 flex items-center gap-1">
                                VIEW CASE STUDY &rarr;
                            </a>
                            <span class="text-[10px] text-slate-400 font-monoRetro">RELEASE 2024</span>
                        </div>
                    </div>
                </div>

                <!-- Project Trading Card 2 -->
                <div class="bg-slate-800 rounded-lg border-4 border-cyan-500 shadow-retro-cyan p-5 flex flex-col justify-between relative group hover:-translate-y-1 transition duration-200">
                    <!-- Top Ribbon Header -->
                    <div>
                        <div class="flex justify-between items-center border-b-2 border-slate-700 pb-2 mb-3">
                            <span class="font-pixel text-[10px] text-cyan-400">CARD #02 // WORKFLOW</span>
                            <span class="bg-cyan-500 text-slate-950 font-bold text-[10px] px-2 py-0.5 rounded font-pixel">
                                POPULAR
                            </span>
                        </div>

                        <!-- Card Visual / Thumbnail Box -->
                        <div class="bg-slate-900 border-2 border-slate-700 rounded p-4 mb-4 text-center relative overflow-hidden">
                            <div class="font-pixel text-3xl text-cyan-400 mb-1">📊</div>
                            <span class="font-monoRetro text-slate-400 text-xs uppercase tracking-widest">Real-time Task Manager</span>
                        </div>

                        <h4 class="font-bold text-xl text-white mb-2">Pulse Board HQ</h4>
                        <p class="text-slate-300 text-sm mb-4 line-clamp-3">
                            Collaborative Kanban management dashboard with live WebSocket updates, drag-and-drop organization, and automated progress reports.
                        </p>

                        <!-- Key Achievements / Highlights -->
                        <div class="bg-slate-900/90 rounded p-3 mb-4 space-y-1 border border-slate-700">
                            <div class="text-xs text-cyan-300 font-monoRetro flex items-center gap-1.5">
                                <span>🚀</span> Sub-second live WebSocket synchronization
                            </div>
                            <div class="text-xs text-emerald-300 font-monoRetro flex items-center gap-1.5">
                                <span>📈</span> 45% productivity increase for teams
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer & Tech Stack Tags -->
                    <div class="space-y-3 pt-2 border-t-2 border-slate-700">
                        <div class="flex flex-wrap gap-1.5">
                            <span class="bg-slate-900 text-slate-300 text-xs px-2 py-0.5 rounded border border-slate-700 font-monoRetro">Laravel</span>
                            <span class="bg-slate-900 text-slate-300 text-xs px-2 py-0.5 rounded border border-slate-700 font-monoRetro">Inertia.js</span>
                            <span class="bg-slate-900 text-slate-300 text-xs px-2 py-0.5 rounded border border-slate-700 font-monoRetro">Tailwind</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="#" class="text-xs font-bold text-cyan-400 hover:text-cyan-300 flex items-center gap-1">
                                VIEW CASE STUDY &rarr;
                            </a>
                            <span class="text-[10px] text-slate-400 font-monoRetro">RELEASE 2023</span>
                        </div>
                    </div>
                </div>

                <!-- Project Trading Card 3 -->
                <div class="bg-slate-800 rounded-lg border-4 border-rose-500 shadow-retro-rose p-5 flex flex-col justify-between relative group hover:-translate-y-1 transition duration-200">
                    <!-- Top Ribbon Header -->
                    <div>
                        <div class="flex justify-between items-center border-b-2 border-slate-700 pb-2 mb-3">
                            <span class="font-pixel text-[10px] text-rose-400">CARD #03 // INFRASTRUCTURE</span>
                            <span class="bg-rose-500 text-white font-bold text-[10px] px-2 py-0.5 rounded font-pixel">
                                UTILITY
                            </span>
                        </div>

                        <!-- Card Visual / Thumbnail Box -->
                        <div class="bg-slate-900 border-2 border-slate-700 rounded p-4 mb-4 text-center relative overflow-hidden">
                            <div class="font-pixel text-3xl text-rose-400 mb-1">🛡️</div>
                            <span class="font-monoRetro text-slate-400 text-xs uppercase tracking-widest">API Sentinel Proxy</span>
                        </div>

                        <h4 class="font-bold text-xl text-white mb-2">Gateway Guard Engine</h4>
                        <p class="text-slate-300 text-sm mb-4 line-clamp-3">
                            High-performance microservice API gateway offering rate limiting, token authentication, payload verification, and automated request logging.
                        </p>

                        <!-- Key Achievements / Highlights -->
                        <div class="bg-slate-900/90 rounded p-3 mb-4 space-y-1 border border-slate-700">
                            <div class="text-xs text-rose-300 font-monoRetro flex items-center gap-1.5">
                                <span>⚡</span> 99.99% uptime with Redis caching
                            </div>
                            <div class="text-xs text-emerald-300 font-monoRetro flex items-center gap-1.5">
                                <span>🛡️</span> Prevented over 1M malicious requests
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer & Tech Stack Tags -->
                    <div class="space-y-3 pt-2 border-t-2 border-slate-700">
                        <div class="flex flex-wrap gap-1.5">
                            <span class="bg-slate-900 text-slate-300 text-xs px-2 py-0.5 rounded border border-slate-700 font-monoRetro">PHP 8.3</span>
                            <span class="bg-slate-900 text-slate-300 text-xs px-2 py-0.5 rounded border border-slate-700 font-monoRetro">Redis</span>
                            <span class="bg-slate-900 text-slate-300 text-xs px-2 py-0.5 rounded border border-slate-700 font-monoRetro">Docker</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="#" class="text-xs font-bold text-rose-400 hover:text-rose-300 flex items-center gap-1">
                                VIEW CASE STUDY &rarr;
                            </a>
                            <span class="text-[10px] text-slate-400 font-monoRetro">RELEASE 2024</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Compact Grid View Mode -->
            <div x-show="mode === 'grid'" class="space-y-3">
                <div class="bg-slate-800 border-2 border-slate-700 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <span class="font-pixel text-xs text-amber-400 bg-slate-900 p-2 rounded border border-slate-700">01</span>
                        <div>
                            <h4 class="font-bold text-lg text-white">Commerce Nexus Platform</h4>
                            <p class="text-xs text-slate-300">Multi-vendor storefront engine • Laravel, Vue, Stripe</p>
                        </div>
                    </div>
                    <a href="#" class="bg-amber-500 text-slate-950 text-xs font-bold px-4 py-2 rounded font-sans">Inspect Project</a>
                </div>

                <div class="bg-slate-800 border-2 border-slate-700 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <span class="font-pixel text-xs text-cyan-400 bg-slate-900 p-2 rounded border border-slate-700">02</span>
                        <div>
                            <h4 class="font-bold text-lg text-white">Pulse Board HQ</h4>
                            <p class="text-xs text-slate-300">Real-time collaborative task manager • Inertia, Vue, WebSockets</p>
                        </div>
                    </div>
                    <a href="#" class="bg-cyan-500 text-slate-950 text-xs font-bold px-4 py-2 rounded font-sans">Inspect Project</a>
                </div>

                <div class="bg-slate-800 border-2 border-slate-700 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <span class="font-pixel text-xs text-rose-400 bg-slate-900 p-2 rounded border border-slate-700">03</span>
                        <div>
                            <h4 class="font-bold text-lg text-white">Gateway Guard Engine</h4>
                            <p class="text-xs text-slate-300">API gateway and rate-limiting proxy • PHP 8, Redis, Docker</p>
                        </div>
                    </div>
                    <a href="#" class="bg-rose-500 text-white text-xs font-bold px-4 py-2 rounded font-sans">Inspect Project</a>
                </div>
            </div>
        </section>

        <!-- SECTION 4: WORK HISTORY CARDS (CAREER TIMELINE) -->
        <section class="space-y-4">
            <div class="flex justify-between items-end border-b-2 border-slate-800 pb-3">
                <div>
                    <h3 class="font-pixel text-sm text-emerald-400 uppercase tracking-wider">WORK HISTORY CARDS</h3>
                    <p class="text-slate-400 text-sm font-sans mt-1">Professional timeline and software engineering roles</p>
                </div>
                <span class="font-monoRetro text-slate-400 text-lg">RECORD FILE: #EXP-2024</span>
            </div>

            <div class="space-y-4">

                <!-- Experience Card 1 -->
                <div class="bg-slate-800 rounded-lg border-2 border-slate-700 p-6 shadow-retro relative">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mb-3 border-b border-slate-700 pb-3">
                        <div>
                            <span class="text-xs font-monoRetro text-emerald-400 uppercase tracking-widest">[CURRENT ROLE] • 2022 - PRESENT</span>
                            <h4 class="font-bold text-xl text-white">Senior Software Engineer @ TechSphere Solutions</h4>
                        </div>
                        <span class="bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 text-xs px-3 py-1 rounded font-monoRetro">FULL-TIME</span>
                    </div>
                    <ul class="text-slate-300 text-sm space-y-2 list-disc list-inside">
                        <li>Architected scalable RESTful services in Laravel serving over 500k active monthly users.</li>
                        <li>Reduced database query response times by 40% through index optimization and Redis caching strategy.</li>
                        <li>Mentored a team of 5 junior and mid-level developers in modern PHP, unit testing, and Git workflows.</li>
                    </ul>
                </div>

                <!-- Experience Card 2 -->
                <div class="bg-slate-800 rounded-lg border-2 border-slate-700 p-6 shadow-retro relative">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mb-3 border-b border-slate-700 pb-3">
                        <div>
                            <span class="text-xs font-monoRetro text-slate-400 uppercase tracking-widest">[PREVIOUS ROLE] • 2019 - 2022</span>
                            <h4 class="font-bold text-xl text-white">Full-Stack Developer @ Apex Digital Agency</h4>
                        </div>
                        <span class="bg-slate-700 text-slate-300 text-xs px-3 py-1 rounded font-monoRetro">FULL-TIME</span>
                    </div>
                    <ul class="text-slate-300 text-sm space-y-2 list-disc list-inside">
                        <li>Delivered 15+ custom client web applications using Laravel, Vue.js, and Tailwind CSS.</li>
                        <li>Integrated third-party APIs including Stripe, Salesforce, Twilio, and SendGrid.</li>
                        <li>Automated deployment pipelines with GitHub Actions and Docker containers.</li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- SECTION 5: CONTACT CARD & FOOTER -->
        <section id="contact" class="bg-gradient-to-r from-slate-800 to-slate-900 border-4 border-amber-500 rounded-lg p-8 shadow-retro-amber text-center space-y-5">
            <div class="inline-block bg-amber-500/20 text-amber-300 font-pixel text-xs px-3 py-1 rounded border border-amber-500/40">
                CARD #99 // CONTACT & RECRUITMENT
            </div>

            <h3 class="font-pixel text-xl sm:text-2xl text-white tracking-wide">
                LET'S WORK TOGETHER
            </h3>

            <p class="text-slate-300 text-sm max-w-xl mx-auto leading-relaxed">
                Interested in building something together or looking for a skilled developer for your team? Feel free to send an inquiry or connect directly!
            </p>

            <div class="flex flex-wrap justify-center gap-4 pt-2">
                <a href="mailto:alex.rivers@example.com" class="bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold font-pixel text-xs px-6 py-3.5 rounded shadow-retro transition">
                    ✉ SEND EMAIL
                </a>
                <a href="#" class="bg-slate-800 hover:bg-slate-700 text-white font-semibold text-sm px-6 py-3 rounded border border-slate-600 shadow-retro transition flex items-center gap-2">
                    📄 DOWNLOAD RESUME (PDF)
                </a>
            </div>

            <div class="pt-6 border-t border-slate-800 text-slate-500 text-xs flex justify-between items-center max-w-2xl mx-auto font-monoRetro">
                <span>ALEX RIVERS PORTFOLIO © 2025</span>
                <span>DESIGNED WITH RETRO CARD SYSTEM</span>
            </div>
        </section>

    </main>

</body>
</html>
