<!DOCTYPE html>
<html lang="en" x-data="{ mode: 'cards', theme: 'dark' }" :class="theme">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ralph Jade A. Omega | IT Specialist Portfolio</title>

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
                    IT
                </div>
                <div>
                    <h1 class="font-pixel text-xs text-amber-400 tracking-wider">RALPH JADE A. OMEGA</h1>
                    <p class="font-monoRetro text-sm text-slate-400 tracking-widest uppercase">IT Specialist & Security Strategist</p>
                </div>
            </div>

            <!-- View & Deck Controls -->
            <div class="flex items-center space-x-3">
                <!-- Status Badge -->
                <div class="hidden sm:flex items-center space-x-2 bg-slate-800 px-3 py-1 rounded border-2 border-slate-700">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                    <span class="font-monoRetro text-emerald-400 text-base">AVAILABLE FOR OPPORTUNITIES</span>
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
                    <div class="w-36 h-36 md:w-44 md:h-44 bg-slate-900 border-4 border-slate-700 rounded p-2 shadow-retro relative group flex items-center justify-center">
                        <div class="w-full h-full bg-slate-950 rounded flex flex-col items-center justify-center text-center p-3 border border-slate-800">
                            <span class="font-pixel text-3xl text-amber-400 mb-2">🛡️</span>
                            <span class="font-pixel text-[10px] text-slate-300">RALPH OMEGA</span>
                        </div>
                        <span class="absolute -top-3 -right-3 bg-emerald-500 text-slate-950 font-pixel text-[10px] px-2 py-1 rounded border-2 border-white shadow-retro-sm font-bold">
                            CERTIFIED
                        </span>
                    </div>
                    <span class="mt-3 font-monoRetro text-amber-400 text-lg tracking-wider">ID: RO-2026-IT</span>
                </div>

                <!-- Bio & Professional Summary -->
                <div class="flex-1 text-center md:text-left space-y-4">
                    <div>
                        <div class="flex flex-wrap justify-center md:justify-start items-center gap-2 mb-2">
                            <span class="bg-amber-500/20 text-amber-300 border border-amber-500/40 px-2.5 py-0.5 rounded text-xs font-monoRetro text-base font-semibold">
                                ★ IT SPECIALIST
                            </span>
                            <span class="bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 px-2.5 py-0.5 rounded text-xs font-monoRetro text-base font-semibold">
                                ENTERPRISE INFRASTRUCTURE
                            </span>
                        </div>
                        <h2 class="font-pixel text-xl md:text-2xl text-white tracking-tight">
                            RALPH JADE A. OMEGA
                        </h2>
                        <p class="font-monoRetro text-xl text-cyan-400 tracking-wide mt-1">
                            Enterprise Infrastructure • Cyber Threat Management • Artificial Intelligence
                        </p>
                    </div>

                    <p class="text-slate-300 text-base leading-relaxed max-w-3xl">
                        Ralph Jade A. Omega is an IT specialist with hands-on enterprise infrastructure experience  and certified expertise in cyber threat management and artificial intelligence.
                    </p>

                    <!-- Quick Metrics / Spec Badges -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2">
                        <div class="bg-slate-900/80 p-2.5 rounded border border-slate-700 text-center">
                            <span class="block font-monoRetro text-slate-400 text-sm">CORE FOCUS</span>
                            <span class="font-semibold text-amber-400 text-sm">IT Infrastructure</span>
                        </div>
                        <div class="bg-slate-900/80 p-2.5 rounded border border-slate-700 text-center">
                            <span class="block font-monoRetro text-slate-400 text-sm">CYBERSECURITY</span>
                            <span class="font-semibold text-cyan-400 text-sm">Cisco Certified</span>
                        </div>
                        <div class="bg-slate-900/80 p-2.5 rounded border border-slate-700 text-center">
                            <span class="block font-monoRetro text-slate-400 text-sm">AI CREDENTIAL</span>
                            <span class="font-semibold text-emerald-400 text-sm">IBM SkillsBuild</span>
                        </div>
                        <div class="bg-slate-900/80 p-2.5 rounded border border-slate-700 text-center">
                            <span class="block font-monoRetro text-slate-400 text-sm">IT STANDARDS</span>
                            <span class="font-semibold text-purple-400 text-sm">TOPCIT Level 2</span>
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-center md:justify-start gap-3 pt-2">
                        <a href="#contact" class="bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold px-5 py-2.5 rounded text-sm font-pixel shadow-retro transition">
                            ✉ CONTACT ME
                        </a>
                        <a href="#skills" class="bg-slate-700 hover:bg-slate-600 text-white font-semibold px-5 py-2.5 rounded text-sm font-sans border border-slate-600 shadow-retro transition">
                            🔍 SKILLS MATRIX
                        </a>
                        <a href="#certifications" class="bg-slate-700 hover:bg-slate-600 text-white font-semibold px-5 py-2.5 rounded text-sm font-sans border border-slate-600 shadow-retro transition">
                            📜 CERTIFICATIONS
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 2: TECHNICAL SKILLS MATRIX (CORE DOMAIN CARDS) -->
        <section id="skills" class="space-y-4">
            <div class="flex justify-between items-end border-b-2 border-slate-800 pb-3">
                <div>
                    <h3 class="font-pixel text-sm text-amber-400 uppercase tracking-wider">TECHNICAL SKILLS MATRIX</h3>
                    <p class="text-slate-400 text-sm font-sans mt-1">Core domains, competency highlights, and supporting credentials</p>
                </div>
                <span class="font-monoRetro text-slate-400 text-lg">DECK SIZE: 4 DOMAINS</span>
            </div>

            <!-- Card View Mode -->
            <div x-show="mode === 'cards'" class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">

                <!-- Skill Card 1: Cybersecurity -->
                <div class="bg-slate-800 rounded-lg p-5 border-3 border-amber-500 shadow-retro-amber flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-pixel text-[10px] text-amber-400">DOMAIN 01</span>
                            <span class="bg-amber-500/20 text-amber-300 text-xs px-2 py-0.5 rounded font-monoRetro">CYBERSECURITY</span>
                        </div>
                        <h4 class="font-bold text-lg text-white mb-2">Cybersecurity</h4>
                        <p class="text-xs text-slate-300 mb-4 leading-relaxed">
                            Threat identification, attack surface analysis, network safety protocols, and operational protection.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-700">
                        <span class="block font-monoRetro text-amber-400 text-xs mb-1 uppercase tracking-wider">Supporting Credentials:</span>
                        <p class="text-xs text-slate-300 font-medium">
                            Cisco Cyber Threat Management, Cisco Intro to Cybersecurity
                        </p>
                    </div>
                </div>

                <!-- Skill Card 2: Artificial Intelligence -->
                <div class="bg-slate-800 rounded-lg p-5 border-3 border-cyan-500 shadow-retro-cyan flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-pixel text-[10px] text-cyan-400">DOMAIN 02</span>
                            <span class="bg-cyan-500/20 text-cyan-300 text-xs px-2 py-0.5 rounded font-monoRetro">AI & ML</span>
                        </div>
                        <h4 class="font-bold text-lg text-white mb-2">Artificial Intelligence</h4>
                        <p class="text-xs text-slate-300 mb-4 leading-relaxed">
                            AI principles, machine learning concepts, and practical applications.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-700">
                        <span class="block font-monoRetro text-cyan-400 text-xs mb-1 uppercase tracking-wider">Supporting Credentials:</span>
                        <p class="text-xs text-slate-300 font-medium">
                            IBM SkillsBuild AI Fundamentals
                        </p>
                    </div>
                </div>

                <!-- Skill Card 3: IT Competency -->
                <div class="bg-slate-800 rounded-lg p-5 border-3 border-purple-500 shadow-retro-purple flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-pixel text-[10px] text-purple-400">DOMAIN 03</span>
                            <span class="bg-purple-500/20 text-purple-300 text-xs px-2 py-0.5 rounded font-monoRetro">IT ARCHITECTURE</span>
                        </div>
                        <h4 class="font-bold text-lg text-white mb-2">IT Competency</h4>
                        <p class="text-xs text-slate-300 mb-4 leading-relaxed">
                            Software design, system architecture, database fundamentals, and IT project management.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-700">
                        <span class="block font-monoRetro text-purple-400 text-xs mb-1 uppercase tracking-wider">Supporting Credentials:</span>
                        <p class="text-xs text-slate-300 font-medium">
                            TOPCIT Level 2 Certification
                        </p>
                    </div>
                </div>

                <!-- Skill Card 4: Systems & Support -->
                <div class="bg-slate-800 rounded-lg p-5 border-3 border-emerald-500 shadow-retro-emerald flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-pixel text-[10px] text-emerald-400">DOMAIN 04</span>
                            <span class="bg-emerald-500/20 text-emerald-300 text-xs px-2 py-0.5 rounded font-monoRetro">INFRASTRUCTURE</span>
                        </div>
                        <h4 class="font-bold text-lg text-white mb-2">Systems & Support</h4>
                        <p class="text-xs text-slate-300 mb-4 leading-relaxed">
                            Enterprise OS configuration, hardware installation, desktop troubleshooting, and IT service delivery.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-700">
                        <span class="block font-monoRetro text-emerald-400 text-xs mb-1 uppercase tracking-wider">Supporting Credentials:</span>
                        <p class="text-xs text-slate-300 font-medium">
                            VXI IT Desktop Engineering Trainee
                        </p>
                    </div>
                </div>

            </div>

            <!-- Compact List Mode -->
            <div x-show="mode === 'grid'" class="space-y-3">
                <div class="bg-slate-800 border-2 border-slate-700 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <span class="font-pixel text-xs text-amber-400 bg-slate-900 p-2 rounded border border-slate-700">01</span>
                        <div>
                            <h4 class="font-bold text-lg text-white">Cybersecurity</h4>
                            <p class="text-xs text-slate-300">Threat identification, attack surface analysis, network safety protocols, and operational protection.</p>
                        </div>
                    </div>
                    <span class="bg-amber-500/20 text-amber-300 text-xs px-3 py-1 rounded font-monoRetro border border-amber-500/40 shrink-0">Cisco Cyber Threat Management & Intro</span>
                </div>

                <div class="bg-slate-800 border-2 border-slate-700 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <span class="font-pixel text-xs text-cyan-400 bg-slate-900 p-2 rounded border border-slate-700">02</span>
                        <div>
                            <h4 class="font-bold text-lg text-white">Artificial Intelligence</h4>
                            <p class="text-xs text-slate-300">AI principles, machine learning concepts, and practical applications.</p>
                        </div>
                    </div>
                    <span class="bg-cyan-500/20 text-cyan-300 text-xs px-3 py-1 rounded font-monoRetro border border-cyan-500/40 shrink-0">IBM SkillsBuild AI Fundamentals</span>
                </div>

                <div class="bg-slate-800 border-2 border-slate-700 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <span class="font-pixel text-xs text-purple-400 bg-slate-900 p-2 rounded border border-slate-700">03</span>
                        <div>
                            <h4 class="font-bold text-lg text-white">IT Competency</h4>
                            <p class="text-xs text-slate-300">Software design, system architecture, database fundamentals, and IT project management.</p>
                        </div>
                    </div>
                    <span class="bg-purple-500/20 text-purple-300 text-xs px-3 py-1 rounded font-monoRetro border border-purple-500/40 shrink-0">TOPCIT Level 2 Certification</span>
                </div>

                <div class="bg-slate-800 border-2 border-slate-700 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <span class="font-pixel text-xs text-emerald-400 bg-slate-900 p-2 rounded border border-slate-700">04</span>
                        <div>
                            <h4 class="font-bold text-lg text-white">Systems & Support</h4>
                            <p class="text-xs text-slate-300">Enterprise OS configuration, hardware installation, desktop troubleshooting, and IT service delivery.</p>
                        </div>
                    </div>
                    <span class="bg-emerald-500/20 text-emerald-300 text-xs px-3 py-1 rounded font-monoRetro border border-emerald-500/40 shrink-0">VXI IT Desktop Engineering Trainee</span>
                </div>
            </div>
        </section>

        <!-- SECTION 3: CERTIFICATIONS & CREDENTIALS DECK -->
        <section id="certifications" class="space-y-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end border-b-2 border-slate-800 pb-3 gap-2">
                <div>
                    <h3 class="font-pixel text-sm text-cyan-400 uppercase tracking-wider">CERTIFICATIONS & CREDENTIALS CARDS</h3>
                    <p class="text-slate-400 text-sm font-sans mt-1">Verified industry certifications and official qualifications</p>
                </div>
                <div class="flex items-center space-x-2 text-xs font-monoRetro text-slate-400">
                    <span class="inline-block w-2 h-2 rounded-full bg-cyan-400"></span>
                    <span>VERIFIED CREDENTIAL DECK</span>
                </div>
            </div>

            <!-- Card View Mode -->
            <div x-show="mode === 'cards'" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Certification Card 1 -->
                <div class="bg-slate-800 rounded-lg border-4 border-amber-500 shadow-retro-amber p-5 flex flex-col justify-between relative group hover:-translate-y-1 transition duration-200">
                    <div>
                        <div class="flex justify-between items-center border-b-2 border-slate-700 pb-2 mb-3">
                            <span class="font-pixel text-[10px] text-amber-400">CARD #01 // SECURITY</span>
                            <span class="bg-amber-500 text-slate-950 font-bold text-[10px] px-2 py-0.5 rounded font-pixel">
                                MAY 2026
                            </span>
                        </div>

                        <div class="bg-slate-900 border-2 border-slate-700 rounded p-4 mb-4 text-center relative overflow-hidden">
                            <div class="font-pixel text-3xl text-amber-400 mb-1">🛡️</div>
                            <span class="font-monoRetro text-slate-400 text-xs uppercase tracking-widest">Cisco Networking Academy</span>
                        </div>

                        <h4 class="font-bold text-lg text-white mb-2">Cyber Threat Management</h4>
                        <p class="text-slate-300 text-xs mb-3">
                            Issued by Cisco Networking Academy / University of Southern Mindanao.
                        </p>
                    </div>

                    <div class="pt-3 border-t-2 border-slate-700 flex justify-between items-center">
                        <span class="text-xs text-amber-400 font-monoRetro font-bold">VERIFIED CERTIFICATION</span>
                        <span class="text-[10px] text-slate-400 font-monoRetro">MAY 2026</span>
                    </div>
                </div>

                <!-- Certification Card 2 -->
                <div class="bg-slate-800 rounded-lg border-4 border-cyan-500 shadow-retro-cyan p-5 flex flex-col justify-between relative group hover:-translate-y-1 transition duration-200">
                    <div>
                        <div class="flex justify-between items-center border-b-2 border-slate-700 pb-2 mb-3">
                            <span class="font-pixel text-[10px] text-cyan-400">CARD #02 // SECURITY</span>
                            <span class="bg-cyan-500 text-slate-950 font-bold text-[10px] px-2 py-0.5 rounded font-pixel">
                                MAR 2026
                            </span>
                        </div>

                        <div class="bg-slate-900 border-2 border-slate-700 rounded p-4 mb-4 text-center relative overflow-hidden">
                            <div class="font-pixel text-3xl text-cyan-400 mb-1">🔒</div>
                            <span class="font-monoRetro text-slate-400 text-xs uppercase tracking-widest">Cisco Networking Academy</span>
                        </div>

                        <h4 class="font-bold text-lg text-white mb-2">Introduction to Cybersecurity</h4>
                        <p class="text-slate-300 text-xs mb-3">
                            Issued by Cisco Networking Academy. Fundamental principles of cybersecurity and operational threat defense.
                        </p>
                    </div>

                    <div class="pt-3 border-t-2 border-slate-700 flex justify-between items-center">
                        <span class="text-xs text-cyan-400 font-monoRetro font-bold">VERIFIED CERTIFICATION</span>
                        <span class="text-[10px] text-slate-400 font-monoRetro">MARCH 2026</span>
                    </div>
                </div>

                <!-- Certification Card 3 -->
                <div class="bg-slate-800 rounded-lg border-4 border-emerald-500 shadow-retro-emerald p-5 flex flex-col justify-between relative group hover:-translate-y-1 transition duration-200">
                    <div>
                        <div class="flex justify-between items-center border-b-2 border-slate-700 pb-2 mb-3">
                            <span class="font-pixel text-[10px] text-emerald-400">CARD #03 // AI</span>
                            <span class="bg-emerald-500 text-slate-950 font-bold text-[10px] px-2 py-0.5 rounded font-pixel">
                                FEB 2026
                            </span>
                        </div>

                        <div class="bg-slate-900 border-2 border-slate-700 rounded p-4 mb-4 text-center relative overflow-hidden">
                            <div class="font-pixel text-3xl text-emerald-400 mb-1">🤖</div>
                            <span class="font-monoRetro text-slate-400 text-xs uppercase tracking-widest">IBM SkillsBuild</span>
                        </div>

                        <h4 class="font-bold text-lg text-white mb-2">Artificial Intelligence Fundamentals</h4>
                        <p class="text-slate-300 text-xs mb-3">
                            Issued by IBM SkillsBuild. Comprehensive mastery of foundational AI principles, machine learning concepts, and practical applications.
                        </p>
                    </div>

                    <div class="pt-3 border-t-2 border-slate-700 flex justify-between items-center">
                        <span class="text-xs text-emerald-400 font-monoRetro font-bold">VERIFIED CERTIFICATION</span>
                        <span class="text-[10px] text-slate-400 font-monoRetro">FEB 2026</span>
                    </div>
                </div>

                <!-- Certification Card 4 -->
                <div class="bg-slate-800 rounded-lg border-4 border-purple-500 shadow-retro-purple p-5 flex flex-col justify-between relative group hover:-translate-y-1 transition duration-200">
                    <div>
                        <div class="flex justify-between items-center border-b-2 border-slate-700 pb-2 mb-3">
                            <span class="font-pixel text-[10px] text-purple-400">CARD #04 // STANDARDS</span>
                            <span class="bg-purple-500 text-white font-bold text-[10px] px-2 py-0.5 rounded font-pixel">
                                DEC 2025
                            </span>
                        </div>

                        <div class="bg-slate-900 border-2 border-slate-700 rounded p-4 mb-4 text-center relative overflow-hidden">
                            <div class="font-pixel text-3xl text-purple-400 mb-1">🎓</div>
                            <span class="font-monoRetro text-slate-400 text-xs uppercase tracking-widest">IITP Official Credential</span>
                        </div>

                        <h4 class="font-bold text-lg text-white mb-2">TOPCIT Level 2 Credential</h4>
                        <p class="text-slate-300 text-xs mb-3">
                            Issued by Institute for Information & Communications Technology Promotion. Standardized assessment of IT competency and software design.
                        </p>
                    </div>

                    <div class="pt-3 border-t-2 border-slate-700 flex justify-between items-center">
                        <span class="text-xs text-purple-400 font-monoRetro font-bold">VERIFIED CREDENTIAL</span>
                        <span class="text-[10px] text-slate-400 font-monoRetro">DEC 2025</span>
                    </div>
                </div>

            </div>

            <!-- Compact List View Mode -->
            <div x-show="mode === 'grid'" class="space-y-3">
                <div class="bg-slate-800 border-2 border-slate-700 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <span class="font-pixel text-xs text-amber-400 bg-slate-900 p-2 rounded border border-slate-700">01</span>
                        <div>
                            <h4 class="font-bold text-lg text-white">Cyber Threat Management</h4>
                            <p class="text-xs text-slate-300">Cisco Networking Academy / University of Southern Mindanao</p>
                        </div>
                    </div>
                    <span class="text-amber-400 font-monoRetro text-sm">MAY 2026</span>
                </div>

                <div class="bg-slate-800 border-2 border-slate-700 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <span class="font-pixel text-xs text-cyan-400 bg-slate-900 p-2 rounded border border-slate-700">02</span>
                        <div>
                            <h4 class="font-bold text-lg text-white">Introduction to Cybersecurity</h4>
                            <p class="text-xs text-slate-300">Cisco Networking Academy</p>
                        </div>
                    </div>
                    <span class="text-cyan-400 font-monoRetro text-sm">MARCH 2026</span>
                </div>

                <div class="bg-slate-800 border-2 border-slate-700 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <span class="font-pixel text-xs text-emerald-400 bg-slate-900 p-2 rounded border border-slate-700">03</span>
                        <div>
                            <h4 class="font-bold text-lg text-white">Artificial Intelligence Fundamentals</h4>
                            <p class="text-xs text-slate-300">IBM SkillsBuild</p>
                        </div>
                    </div>
                    <span class="text-emerald-400 font-monoRetro text-sm">FEBRUARY 2026</span>
                </div>

                <div class="bg-slate-800 border-2 border-slate-700 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <span class="font-pixel text-xs text-purple-400 bg-slate-900 p-2 rounded border border-slate-700">04</span>
                        <div>
                            <h4 class="font-bold text-lg text-white">TOPCIT Level 2 Credential</h4>
                            <p class="text-xs text-slate-300">Institute for Information & Communications Technology Promotion</p>
                        </div>
                    </div>
                    <span class="text-purple-400 font-monoRetro text-sm">DECEMBER 2025</span>
                </div>
            </div>
        </section>

        <!-- SECTION 4: PRACTICAL EXPERIENCE & LEADERSHIP CARDS -->
        <section class="space-y-4">
            <div class="flex justify-between items-end border-b-2 border-slate-800 pb-3">
                <div>
                    <h3 class="font-pixel text-sm text-emerald-400 uppercase tracking-wider">PRACTICAL EXPERIENCE & LEADERSHIP</h3>
                    <p class="text-slate-400 text-sm font-sans mt-1">Enterprise technical experience and leadership credentials</p>
                </div>
                <span class="font-monoRetro text-slate-400 text-lg">RECORD FILE: #EXP-2026</span>
            </div>

            <div class="space-y-4">

                <!-- Experience Card 1 -->
                <div class="bg-slate-800 rounded-lg border-2 border-slate-700 p-6 shadow-retro relative">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mb-3 border-b border-slate-700 pb-3">
                        <div>
                            <span class="text-xs font-monoRetro text-emerald-400 uppercase tracking-widest">[PRACTICAL EXPERIENCE] • MAY – JULY 2026</span>
                            <h4 class="font-bold text-xl text-white">IT Desktop Engineer Trainee @ VXI Global Holdings B.V.</h4>
                        </div>
                        <span class="bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 text-xs px-3 py-1 rounded font-monoRetro">260 HOURS</span>
                    </div>
                    <ul class="text-slate-300 text-sm space-y-2 list-disc list-inside">
                        <li>Completed 260 hours of technical support, diagnosing hardware/software issues, and maintaining desktop infrastructure in an enterprise call center environment.</li>
                        <li>Provided rapid technical troubleshooting and service delivery to maintain maximum operational uptime for enterprise staff.</li>
                        <li>Managed enterprise operating system configurations, software deployments, and desktop network setup.</li>
                    </ul>
                </div>

                <!-- Leadership & Public Speaking Card -->
                <div class="bg-slate-800 rounded-lg border-2 border-slate-700 p-6 shadow-retro relative">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mb-3 border-b border-slate-700 pb-3">
                        <div>
                            <span class="text-xs font-monoRetro text-amber-400 uppercase tracking-widest">[LEADERSHIP & ADVOCACY] • ONGOING</span>
                            <h4 class="font-bold text-xl text-white"> Technical Advocacy</h4>
                        </div>
                        <span class="bg-amber-500/20 text-amber-300 border border-amber-500/40 text-xs px-3 py-1 rounded font-monoRetro">CREDENTIALS</span>
                    </div>
                    <ul class="text-slate-300 text-sm space-y-2 list-disc list-inside">
                        <li>Technical advocacy on emerging technologies and cybersecurity best practices.</li>
                        <li>Fostered knowledge sharing across IT teams, translating complex cyber threat and AI topics into actionable, accessible insights.</li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- SECTION 5: CONTACT CARD & FOOTER -->
        <section id="contact" class="bg-gradient-to-r from-slate-800 to-slate-900 border-4 border-amber-500 rounded-lg p-8 shadow-retro-amber text-center space-y-5">
            <div class="inline-block bg-amber-500/20 text-amber-300 font-pixel text-xs px-3 py-1 rounded border border-amber-500/40">
                CARD #99 // CONTACT & ENGAGEMENT
            </div>

            <h3 class="font-pixel text-xl sm:text-2xl text-white tracking-wide">
                LET'S CONNECT
            </h3>

            <p class="text-slate-300 text-sm max-w-xl mx-auto leading-relaxed">
                Interested in collaborating or discussing enterprise infrastructure, cybersecurity, or AI implementations? Reach out today!
            </p>

            <div class="flex flex-wrap justify-center gap-4 pt-2">
                <a href="mailto:ralph.omega@example.com" class="bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold font-pixel text-xs px-6 py-3.5 rounded shadow-retro transition">
                    ✉ GET IN TOUCH
                </a>
            </div>

            <div class="pt-6 border-t border-slate-800 text-slate-500 text-xs flex justify-between items-center max-w-2xl mx-auto font-monoRetro">
                <span>RALPH JADE A. OMEGA PORTFOLIO © 2026</span>
                <span>DESIGNED WITH RETRO CARD SYSTEM</span>
            </div>
        </section>

    </main>

</body>
</html>
