<!DOCTYPE html>
<html lang="en" x-data="{ theme: 'corporate', activeTab: 'all', themeMenuOpen: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ralph Jade A. Omega | IT Specialist Portfolio</title>

    <!-- Google Fonts for Corporate, Retro, and System Themes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Press+Start+2P&family=Orbitron:wght@500;700;900&family=Rajdhani:wght@500;600;700&family=Share+Tech+Mono&family=Space+Grotesk:wght@400;500;600;700&family=VT323&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        corporate: ['"Plus Jakarta Sans"', '"Inter"', 'sans-serif'],
                        pixel: ['"Press Start 2P"', 'monospace'],
                        monoRetro: ['"VT323"', 'monospace'],
                        retroSans: ['"Space Grotesk"', 'sans-serif'],
                        orbitron: ['"Orbitron"', 'sans-serif'],
                        rajdhani: ['"Rajdhani"', 'sans-serif'],
                        systemMono: ['"Share Tech Mono"', 'monospace'],
                    },
                    colors: {
                        corporate: {
                            bg: '#f8fafc',
                            card: '#ffffff',
                            accent: '#0f172a',
                            primary: '#2563eb',
                            text: '#334155'
                        },
                        retro: {
                            bg: '#0f172a',
                            card: '#1e293b',
                            amber: '#f59e0b',
                            cyan: '#06b6d4',
                            emerald: '#10b981',
                            purple: '#8b5cf6'
                        },
                        system: {
                            bg: '#040711',
                            panel: 'rgba(8, 15, 30, 0.9)',
                            cyan: '#00f0ff',
                            purple: '#8a2be2',
                            gold: '#ffd700'
                        }
                    },
                    boxShadow: {
                        'retro-amber': '5px 5px 0px 0px #f59e0b',
                        'retro-cyan': '5px 5px 0px 0px #06b6d4',
                        'retro-emerald': '5px 5px 0px 0px #10b981',
                        'retro-purple': '5px 5px 0px 0px #8b5cf6',
                        'system-glow': '0 0 15px rgba(0, 240, 255, 0.35)',
                        'system-glow-lg': '0 0 25px rgba(0, 240, 255, 0.5)'
                    }
                }
            }
        }
    </script>

    <style>
        /* System Brackets Effect */
        .system-box {
            position: relative;
        }
        .theme-system .system-box::before {
            content: '';
            position: absolute;
            top: -2px; left: -2px;
            width: 10px; height: 10px;
            border-top: 2px solid #00f0ff;
            border-left: 2px solid #00f0ff;
        }
        .theme-system .system-box::after {
            content: '';
            position: absolute;
            bottom: -2px; right: -2px;
            width: 10px; height: 10px;
            border-bottom: 2px solid #00f0ff;
            border-right: 2px solid #00f0ff;
        }

        /* Scanlines Overlay for Retro/System */
        .scanlines {
            background: linear-gradient(
                to bottom,
                rgba(255,255,255,0),
                rgba(255,255,255,0) 50%,
                rgba(0, 240, 255, 0.03) 50%,
                rgba(0, 240, 255, 0.03)
            );
            background-size: 100% 4px;
        }
    </style>
</head>
<body :class="{
        'theme-corporate bg-slate-50 text-slate-800 font-corporate': theme === 'corporate',
        'theme-retro bg-slate-900 text-slate-100 font-retroSans scanlines': theme === 'retro',
        'theme-system bg-system-bg text-cyan-100 font-rajdhani scanlines': theme === 'system'
      }"
      class="min-h-screen transition-colors duration-300 antialiased pb-16">

    <!-- TOP NAVIGATION & THEME SWITCHER BAR -->
    <header :class="{
        'bg-white/90 border-b border-slate-200 backdrop-blur-md': theme === 'corporate',
        'bg-slate-900/95 border-b-4 border-slate-800': theme === 'retro',
        'bg-system-bg/90 border-b border-cyan-500/40': theme === 'system'
    }" class="sticky top-0 z-50 px-4 md:px-8 py-3.5 transition-all">
        <div class="max-w-6xl mx-auto flex flex-wrap justify-between items-center gap-3">

            <!-- Dynamic Logo / Title -->
            <div class="flex items-center space-x-3">
                <template x-if="theme === 'corporate'">
                    <div class="flex items-center space-x-3">
                        <div class="w-9 h-9 bg-slate-900 text-white rounded-lg flex items-center justify-center font-bold text-sm tracking-wider">
                            RO
                        </div>
                        <div>
                            <h1 class="font-bold text-base text-slate-900 leading-tight">Ralph Jade A. Omega</h1>
                            <p class="text-xs text-slate-500 font-medium">IT Specialist & Security Strategist[cite: 1, 3]</p>
                        </div>
                    </div>
                </template>

                <template x-if="theme === 'retro'">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-amber-500 text-slate-950 font-pixel text-xs font-bold flex items-center justify-center border-2 border-amber-300 shadow-retro-amber">
                            IT
                        </div>
                        <div>
                            <h1 class="font-pixel text-xs text-amber-400 tracking-wider">RALPH JADE A. OMEGA[cite: 1, 2, 3]</h1>
                            <p class="font-monoRetro text-sm text-slate-400 tracking-widest uppercase">IT Specialist & Security Strategist[cite: 1, 3]</p>
                        </div>
                    </div>
                </template>

                <template x-if="theme === 'system'">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 bg-cyan-400 rounded-full animate-ping"></div>
                        <div>
                            <span class="font-orbitron font-bold text-[10px] text-cyan-400 tracking-widest block">[ SYSTEM NOTIFICATION ]</span>
                            <h1 class="font-orbitron font-extrabold text-xs text-white tracking-wider">PLAYER STATUS: ACTIVE</h1>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Header Controls & Theme Picker -->
            <div class="flex items-center space-x-3">
                <!-- Status Tag -->
                <div :class="{
                    'bg-slate-100 text-slate-700 border-slate-200': theme === 'corporate',
                    'bg-slate-800 text-emerald-400 border-slate-700 font-monoRetro': theme === 'retro',
                    'bg-cyan-950/60 text-cyan-300 border-cyan-500/50 font-systemMono': theme === 'system'
                }" class="hidden sm:flex items-center space-x-2 px-3 py-1 rounded-md border text-xs font-medium">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>AVAILABLE FOR OPPORTUNITIES</span>
                </div>

                <!-- THEME PICKER BUTTON DROPDOWN -->
                <div class="relative" x-data="{ themeMenuOpen: false }" @click.away="themeMenuOpen = false">
                    <button @click="themeMenuOpen = !themeMenuOpen"
                            class="flex items-center space-x-2 px-3.5 py-1.5 rounded-lg text-xs font-semibold border transition bg-slate-900 text-white hover:bg-slate-800 border-slate-900">
                        <span>🎨 Theme:</span>
                        <span class="capitalize">Minimalist Corporate</span>
                        <span class="text-[10px]">▼</span>
                    </button>

                    <!-- Theme Selector Navigation Menu -->
                    <div x-show="themeMenuOpen"
                        x-transition
                        class="absolute right-0 mt-2 w-56 rounded-lg border p-1.5 z-50 text-xs font-medium space-y-1 bg-white text-slate-800 border-slate-200 shadow-xl">

                        <!-- Default/Corporate View -->
                        <a href="{{ url('/') }}"
                        class="w-full text-left px-3 py-2 rounded-md flex items-center justify-between transition bg-slate-100 font-bold text-slate-900">
                            <span>🏢 Minimalist Corporate</span>
                            <span class="text-blue-600">✓</span>
                        </a>

                        <!-- Retro Theme View -->
                        <a href="{{ url('/retro') }}"
                        class="w-full text-left px-3 py-2 rounded-md flex items-center justify-between transition hover:bg-slate-100 text-slate-700 font-retroSans">
                            <span>🃏 Retro Card Deck</span>
                        </a>

                        <!-- Solo Leveling Theme View -->
                        <a href="{{ url('/sololeveling') }}"
                        class="w-full text-left px-3 py-2 rounded-md flex items-center justify-between transition hover:bg-slate-100 text-slate-700 font-orbitron">
                            <span>⚡ Solo Leveling HUD</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 md:px-6 pt-8 space-y-10">

        <!-- SECTION 1: HERO / EXECUTIVE PROFILE -->
        <section :class="{
            'bg-white border border-slate-200/80 rounded-2xl p-8 shadow-sm': theme === 'corporate',
            'bg-slate-800 border-4 border-amber-500 rounded-lg p-6 md:p-8 shadow-retro-amber relative overflow-hidden': theme === 'retro',
            'bg-system-panel border-2 border-cyan-400/70 p-6 md:p-8 system-box shadow-system-glow-lg relative overflow-hidden': theme === 'system'
        }" class="transition-all duration-300">

            <div class="flex flex-col md:flex-row gap-8 items-center md:items-start relative z-10">

                <!-- Avatar Block -->
                <div class="flex flex-col items-center shrink-0">
                    <div :class="{
                        'w-36 h-36 md:w-40 md:h-40 rounded-2xl bg-slate-900 text-white flex items-center justify-center font-bold text-3xl shadow-md border-4 border-white': theme === 'corporate',
                        'w-36 h-36 md:w-44 md:h-44 bg-slate-900 border-4 border-slate-700 rounded p-2 shadow-retro flex items-center justify-center relative': theme === 'retro',
                        'w-40 h-40 md:w-44 md:h-44 bg-slate-950 border-2 border-cyan-400 p-2 system-box shadow-system-glow flex items-center justify-center relative': theme === 'system'
                    }">
                        <div class="text-center">
                            <span :class="{
                                'text-4xl': theme === 'corporate',
                                'font-pixel text-3xl text-amber-400 block mb-1': theme === 'retro',
                                'font-orbitron text-4xl text-cyan-400 block mb-1 drop-shadow-[0_0_10px_rgba(0,240,255,0.8)]': theme === 'system'
                            }">🛡️</span>
                            <span :class="{
                                'text-xs text-slate-300 font-medium block mt-1': theme === 'corporate',
                                'font-pixel text-[10px] text-slate-300 block': theme === 'retro',
                                'font-orbitron text-[10px] text-white tracking-widest block mt-2': theme === 'system'
                            }">RALPH OMEGA</span>
                        </div>

                        <!-- System / Retro Badges -->
                        <template x-if="theme === 'retro'">
                            <span class="absolute -top-3 -right-3 bg-emerald-500 text-slate-950 font-pixel text-[10px] px-2 py-1 rounded border-2 border-white shadow-retro-amber font-bold">
                                CERTIFIED
                            </span>
                        </template>
                        <template x-if="theme === 'system'">
                            <span class="absolute -top-3 -right-3 bg-amber-400 text-slate-950 font-orbitron font-extrabold text-[9px] px-2 py-0.5 shadow-sm uppercase tracking-widest">
                                S-RANK HUNTER[cite: 11]
                            </span>
                        </template>
                    </div>

                    <span :class="{
                        'text-xs text-slate-500 mt-3 font-mono': theme === 'corporate',
                        'mt-3 font-monoRetro text-amber-400 text-lg tracking-wider': theme === 'retro',
                        'mt-3 font-systemMono text-cyan-400 text-xs tracking-widest': theme === 'system'
                    }">ID: RO-2026-IT[cite: 6, 11]</span>
                </div>

                <!-- Bio & Title Content -->
                <div class="flex-1 text-center md:text-left space-y-4">
                    <div>
                        <!-- Theme-specific tags -->
                        <div class="flex flex-wrap justify-center md:justify-start items-center gap-2 mb-2 font-mono text-xs">
                            <span :class="{
                                'bg-blue-50 text-blue-700 border-blue-200 font-sans font-semibold': theme === 'corporate',
                                'bg-amber-500/20 text-amber-300 border-amber-500/40 font-monoRetro text-sm': theme === 'retro',
                                'bg-cyan-500/20 text-cyan-300 border-cyan-400/50 uppercase tracking-wider font-systemMono': theme === 'system'
                            }" class="px-2.5 py-0.5 rounded border">
                                ★ IT SPECIALIST[cite: 1, 3]
                            </span>
                            <span :class="{
                                'bg-slate-100 text-slate-700 border-slate-200 font-sans font-semibold': theme === 'corporate',
                                'bg-emerald-500/20 text-emerald-300 border-emerald-500/40 font-monoRetro text-sm': theme === 'retro',
                                'bg-purple-500/20 text-purple-300 border-purple-400/50 uppercase tracking-wider font-systemMono': theme === 'system'
                            }" class="px-2.5 py-0.5 rounded border">
                                ENTERPRISE INFRASTRUCTURE[cite: 6]
                            </span>
                        </div>

                        <h2 :class="{
                            'text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight': theme === 'corporate',
                            'font-pixel text-xl md:text-2xl text-white tracking-tight': theme === 'retro',
                            'font-orbitron font-black text-2xl md:text-4xl text-transparent bg-clip-text bg-gradient-to-r from-white via-cyan-200 to-cyan-400': theme === 'system'
                        }">
                            RALPH JADE A. OMEGA[cite: 1, 2, 3, 4, 5, 6]
                        </h2>

                        <p :class="{
                            'text-slate-600 font-medium text-base mt-1': theme === 'corporate',
                            'font-monoRetro text-xl text-cyan-400 tracking-wide mt-1': theme === 'retro',
                            'font-systemMono text-cyan-400 text-sm tracking-wider mt-1': theme === 'system'
                        }">
                            Enterprise Infrastructure • Cyber Threat Management • Artificial Intelligence[cite: 1, 3, 4, 6]
                        </p>
                    </div>

                    <p :class="{
                        'text-slate-600 leading-relaxed text-sm md:text-base max-w-3xl': theme === 'corporate',
                        'text-slate-300 text-base leading-relaxed max-w-3xl': theme === 'retro',
                        'text-slate-300 text-base leading-relaxed max-w-3xl font-sans': theme === 'system'
                    }">
                        Ralph Jade A. Omega is an IT specialist with hands-on enterprise infrastructure experience and certified expertise in cyber threat management and artificial intelligence[cite: 1, 3, 4, 6]. Combines practical infrastructure experience at VXI Global Holdings with proven technical advocacy as a featured speaker.
                    </p>

                    <!-- Quick Metrics Badges -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2 text-xs">
                        <div :class="{
                            'bg-slate-50 border-slate-200 p-3 rounded-lg text-slate-700': theme === 'corporate',
                            'bg-slate-900 p-2.5 rounded border border-slate-700 text-center': theme === 'retro',
                            'bg-slate-950 p-3 border border-cyan-500/30 text-center font-systemMono': theme === 'system'
                        }">
                            <span class="block text-slate-400 text-[10px] uppercase font-mono">CORE FOCUS</span>
                            <span class="font-bold text-slate-900 dark:text-amber-400">IT Infrastructure[cite: 6]</span>
                        </div>
                        <div :class="{
                            'bg-slate-50 border-slate-200 p-3 rounded-lg text-slate-700': theme === 'corporate',
                            'bg-slate-900 p-2.5 rounded border border-slate-700 text-center': theme === 'retro',
                            'bg-slate-950 p-3 border border-cyan-500/30 text-center font-systemMono': theme === 'system'
                        }">
                            <span class="block text-slate-400 text-[10px] uppercase font-mono">CYBERSECURITY</span>
                            <span class="font-bold text-slate-900 dark:text-cyan-400">Cisco Certified[cite: 1, 3]</span>
                        </div>
                        <div :class="{
                            'bg-slate-50 border-slate-200 p-3 rounded-lg text-slate-700': theme === 'corporate',
                            'bg-slate-900 p-2.5 rounded border border-slate-700 text-center': theme === 'retro',
                            'bg-slate-950 p-3 border border-cyan-500/30 text-center font-systemMono': theme === 'system'
                        }">
                            <span class="block text-slate-400 text-[10px] uppercase font-mono">AI CREDENTIAL</span>
                            <span class="font-bold text-slate-900 dark:text-emerald-400">IBM SkillsBuild[cite: 4]</span>
                        </div>
                        <div :class="{
                            'bg-slate-50 border-slate-200 p-3 rounded-lg text-slate-700': theme === 'corporate',
                            'bg-slate-900 p-2.5 rounded border border-slate-700 text-center': theme === 'retro',
                            'bg-slate-950 p-3 border border-cyan-500/30 text-center font-systemMono': theme === 'system'
                        }">
                            <span class="block text-slate-400 text-[10px] uppercase font-mono">IT STANDARDS</span>
                            <span class="font-bold text-slate-900 dark:text-purple-400">TOPCIT Level 2[cite: 2]</span>
                        </div>
                    </div>

                    <!-- CTA Actions -->
                    <div class="flex flex-wrap justify-center md:justify-start gap-3 pt-3">
                        <a href="#contact" :class="{
                            'bg-slate-900 hover:bg-slate-800 text-white font-semibold px-5 py-2.5 rounded-lg text-sm transition shadow-sm': theme === 'corporate',
                            'bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold px-5 py-2.5 rounded text-sm font-pixel shadow-retro transition': theme === 'retro',
                            'bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-orbitron font-bold px-6 py-3 border border-cyan-300 shadow-system-glow transition': theme === 'system'
                        }">
                            ✉ Contact Me
                        </a>
                        <a href="#skills" :class="{
                            'bg-slate-100 hover:bg-slate-200 text-slate-800 font-semibold px-5 py-2.5 rounded-lg text-sm transition border border-slate-200': theme === 'corporate',
                            'bg-slate-700 hover:bg-slate-600 text-white font-semibold px-5 py-2.5 rounded text-sm border border-slate-600 shadow-retro transition': theme === 'retro',
                            'bg-slate-900 hover:bg-slate-800 text-cyan-400 font-bold px-6 py-3 border border-cyan-500/50 transition font-systemMono': theme === 'system'
                        }">
                            🔍 Technical Matrix
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 2: TECHNICAL SKILLS MATRIX -->
        <section id="skills" class="space-y-5">
            <div :class="{
                'border-b border-slate-200 pb-3 flex justify-between items-end': theme === 'corporate',
                'border-b-2 border-slate-800 pb-3 flex justify-between items-end': theme === 'retro',
                'border-b border-cyan-500/40 pb-3 flex justify-between items-end': theme === 'system'
            }">
                <div>
                    <h3 :class="{
                        'text-xl font-bold text-slate-900': theme === 'corporate',
                        'font-pixel text-sm text-amber-400 uppercase tracking-wider': theme === 'retro',
                        'font-orbitron font-bold text-lg text-cyan-400 tracking-wider': theme === 'system'
                    }">TECHNICAL SKILLS MATRIX</h3>
                    <p class="text-slate-500 text-xs md:text-sm mt-0.5">Core domains, competency highlights, and supporting credentials</p>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">

                <!-- Domain 1: Cybersecurity -->
                <div :class="{
                    'bg-white border border-slate-200 p-5 rounded-xl shadow-sm hover:border-slate-300 transition': theme === 'corporate',
                    'bg-slate-800 rounded-lg p-5 border-3 border-amber-500 shadow-retro-amber flex flex-col justify-between': theme === 'retro',
                    'bg-system-panel border border-cyan-500/50 p-5 system-box shadow-system-glow relative': theme === 'system'
                }">
                    <div>
                        <span :class="{
                            'text-xs font-semibold text-blue-600 uppercase tracking-wider block mb-1': theme === 'corporate',
                            'font-pixel text-[10px] text-amber-400 block mb-2': theme === 'retro',
                            'font-orbitron text-xs text-cyan-400 font-bold block mb-2': theme === 'system'
                        }">DOMAIN 01</span>
                        <h4 class="font-bold text-lg mb-2">Cybersecurity[cite: 1, 3]</h4>
                        <p class="text-xs text-slate-500 dark:text-slate-300 mb-4 leading-relaxed">
                            Threat identification, attack surface analysis, network safety protocols, and operational protection[cite: 1, 3].
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-200 dark:border-slate-700 text-xs">
                        <span class="font-semibold text-slate-400 uppercase block text-[10px] mb-0.5">Credentials:</span>
                        <p class="font-medium text-slate-700 dark:text-slate-300">Cisco Cyber Threat Management, Cisco Intro to Cybersecurity[cite: 1, 3]</p>
                    </div>
                </div>

                <!-- Domain 2: Artificial Intelligence -->
                <div :class="{
                    'bg-white border border-slate-200 p-5 rounded-xl shadow-sm hover:border-slate-300 transition': theme === 'corporate',
                    'bg-slate-800 rounded-lg p-5 border-3 border-cyan-500 shadow-retro-cyan flex flex-col justify-between': theme === 'retro',
                    'bg-system-panel border border-purple-500/50 p-5 system-box shadow-system-glow relative': theme === 'system'
                }">
                    <div>
                        <span :class="{
                            'text-xs font-semibold text-blue-600 uppercase tracking-wider block mb-1': theme === 'corporate',
                            'font-pixel text-[10px] text-cyan-400 block mb-2': theme === 'retro',
                            'font-orbitron text-xs text-purple-400 font-bold block mb-2': theme === 'system'
                        }">DOMAIN 02</span>
                        <h4 class="font-bold text-lg mb-2">Artificial Intelligence[cite: 4]</h4>
                        <p class="text-xs text-slate-500 dark:text-slate-300 mb-4 leading-relaxed">
                            AI principles, machine learning concepts, and practical AI implementations[cite: 4].
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-200 dark:border-slate-700 text-xs">
                        <span class="font-semibold text-slate-400 uppercase block text-[10px] mb-0.5">Credentials:</span>
                        <p class="font-medium text-slate-700 dark:text-slate-300">IBM SkillsBuild AI Fundamentals[cite: 4]</p>
                    </div>
                </div>

                <!-- Domain 3: IT Architecture -->
                <div :class="{
                    'bg-white border border-slate-200 p-5 rounded-xl shadow-sm hover:border-slate-300 transition': theme === 'corporate',
                    'bg-slate-800 rounded-lg p-5 border-3 border-purple-500 shadow-retro-purple flex flex-col justify-between': theme === 'retro',
                    'bg-system-panel border border-cyan-500/50 p-5 system-box shadow-system-glow relative': theme === 'system'
                }">
                    <div>
                        <span :class="{
                            'text-xs font-semibold text-blue-600 uppercase tracking-wider block mb-1': theme === 'corporate',
                            'font-pixel text-[10px] text-purple-400 block mb-2': theme === 'retro',
                            'font-orbitron text-xs text-cyan-400 font-bold block mb-2': theme === 'system'
                        }">DOMAIN 03</span>
                        <h4 class="font-bold text-lg mb-2">IT Architecture[cite: 2]</h4>
                        <p class="text-xs text-slate-500 dark:text-slate-300 mb-4 leading-relaxed">
                            Software design, system architecture, database fundamentals, and IT project management[cite: 2].
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-200 dark:border-slate-700 text-xs">
                        <span class="font-semibold text-slate-400 uppercase block text-[10px] mb-0.5">Credentials:</span>
                        <p class="font-medium text-slate-700 dark:text-slate-300">TOPCIT Level 2 Credential[cite: 2]</p>
                    </div>
                </div>

                <!-- Domain 4: Systems & Support -->
                <div :class="{
                    'bg-white border border-slate-200 p-5 rounded-xl shadow-sm hover:border-slate-300 transition': theme === 'corporate',
                    'bg-slate-800 rounded-lg p-5 border-3 border-emerald-500 shadow-retro-emerald flex flex-col justify-between': theme === 'retro',
                    'bg-system-panel border border-emerald-500/50 p-5 system-box shadow-system-glow relative': theme === 'system'
                }">
                    <div>
                        <span :class="{
                            'text-xs font-semibold text-blue-600 uppercase tracking-wider block mb-1': theme === 'corporate',
                            'font-pixel text-[10px] text-emerald-400 block mb-2': theme === 'retro',
                            'font-orbitron text-xs text-emerald-400 font-bold block mb-2': theme === 'system'
                        }">DOMAIN 04</span>
                        <h4 class="font-bold text-lg mb-2">Systems & Support[cite: 6]</h4>
                        <p class="text-xs text-slate-500 dark:text-slate-300 mb-4 leading-relaxed">
                            Enterprise OS configuration, hardware installation, desktop troubleshooting, and IT service delivery[cite: 6].
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-200 dark:border-slate-700 text-xs">
                        <span class="font-semibold text-slate-400 uppercase block text-[10px] mb-0.5">Credentials:</span>
                        <p class="font-medium text-slate-700 dark:text-slate-300">VXI IT Desktop Engineering Trainee[cite: 6]</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 3: CERTIFICATIONS & CREDENTIALS -->
        <section id="certifications" class="space-y-5">
            <div :class="{
                'border-b border-slate-200 pb-3 flex justify-between items-end': theme === 'corporate',
                'border-b-2 border-slate-800 pb-3 flex justify-between items-end': theme === 'retro',
                'border-b border-cyan-500/40 pb-3 flex justify-between items-end': theme === 'system'
            }">
                <div>
                    <h3 :class="{
                        'text-xl font-bold text-slate-900': theme === 'corporate',
                        'font-pixel text-sm text-cyan-400 uppercase tracking-wider': theme === 'retro',
                        'font-orbitron font-bold text-lg text-cyan-400 tracking-wider': theme === 'system'
                    }">VERIFIED CERTIFICATIONS</h3>
                    <p class="text-slate-500 text-xs md:text-sm mt-0.5">Industry certifications and credentials</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5">

                <!-- Cert 1 -->
                <div :class="{
                    'bg-white border border-slate-200 p-5 rounded-xl shadow-sm': theme === 'corporate',
                    'bg-slate-800 rounded-lg border-4 border-amber-500 shadow-retro-amber p-5': theme === 'retro',
                    'bg-system-panel border-2 border-cyan-500/60 p-5 system-box shadow-system-glow': theme === 'system'
                }">
                    <span class="text-xs font-semibold text-slate-400 block mb-1">MAY 2026[cite: 3]</span>
                    <h4 class="font-bold text-base mb-2">Cyber Threat Management[cite: 3]</h4>
                    <p class="text-xs text-slate-500 dark:text-slate-300 mb-3">
                        Issued by Cisco Networking Academy / University of Southern Mindanao[cite: 3]. Demonstrates threat identification and threat management protocols[cite: 3].
                    </p>
                    <span class="text-[11px] font-mono text-blue-600 dark:text-amber-400 font-semibold block">VERIFIED CERTIFICATE[cite: 3]</span>
                </div>

                <!-- Cert 2 -->
                <div :class="{
                    'bg-white border border-slate-200 p-5 rounded-xl shadow-sm': theme === 'corporate',
                    'bg-slate-800 rounded-lg border-4 border-cyan-500 shadow-retro-cyan p-5': theme === 'retro',
                    'bg-system-panel border-2 border-cyan-500/60 p-5 system-box shadow-system-glow': theme === 'system'
                }">
                    <span class="text-xs font-semibold text-slate-400 block mb-1">MARCH 2026[cite: 1]</span>
                    <h4 class="font-bold text-base mb-2">Introduction to Cybersecurity[cite: 1]</h4>
                    <p class="text-xs text-slate-500 dark:text-slate-300 mb-3">
                        Issued by Cisco Networking Academy[cite: 1]. Fundamental principles of cybersecurity and operational threat defense[cite: 1].
                    </p>
                    <span class="text-[11px] font-mono text-blue-600 dark:text-cyan-400 font-semibold block">VERIFIED CERTIFICATE[cite: 1]</span>
                </div>

                <!-- Cert 3 -->
                <div :class="{
                    'bg-white border border-slate-200 p-5 rounded-xl shadow-sm': theme === 'corporate',
                    'bg-slate-800 rounded-lg border-4 border-emerald-500 shadow-retro-emerald p-5': theme === 'retro',
                    'bg-system-panel border-2 border-purple-500/60 p-5 system-box shadow-system-glow': theme === 'system'
                }">
                    <span class="text-xs font-semibold text-slate-400 block mb-1">FEBRUARY 2026[cite: 4]</span>
                    <h4 class="font-bold text-base mb-2">Artificial Intelligence Fundamentals[cite: 4]</h4>
                    <p class="text-xs text-slate-500 dark:text-slate-300 mb-3">
                        Issued by IBM SkillsBuild[cite: 4]. Verified badge confirming foundational knowledge in machine learning and AI ethics[cite: 4].
                    </p>
                    <span class="text-[11px] font-mono text-blue-600 dark:text-emerald-400 font-semibold block">VERIFIED CERTIFICATE[cite: 4]</span>
                </div>

                <!-- Cert 4 -->
                <div :class="{
                    'bg-white border border-slate-200 p-5 rounded-xl shadow-sm': theme === 'corporate',
                    'bg-slate-800 rounded-lg border-4 border-purple-500 shadow-retro-purple p-5': theme === 'retro',
                    'bg-system-panel border-2 border-amber-500/60 p-5 system-box shadow-system-glow': theme === 'system'
                }">
                    <span class="text-xs font-semibold text-slate-400 block mb-1">DECEMBER 2025[cite: 2]</span>
                    <h4 class="font-bold text-base mb-2">TOPCIT Level 2 Credential[cite: 2]</h4>
                    <p class="text-xs text-slate-500 dark:text-slate-300 mb-3">
                        Issued by IITP (Institute for Information & Communications Technology Promotion)[cite: 2]. Assessment evaluating software design and architecture[cite: 2].
                    </p>
                    <span class="text-[11px] font-mono text-blue-600 dark:text-purple-400 font-semibold block">SCORE: 179 / LEVEL 2[cite: 2]</span>
                </div>

            </div>
        </section>

        <!-- SECTION 4: PRACTICAL EXPERIENCE & LEADERSHIP -->
        <section class="space-y-5">
            <div :class="{
                'border-b border-slate-200 pb-3 flex justify-between items-end': theme === 'corporate',
                'border-b-2 border-slate-800 pb-3 flex justify-between items-end': theme === 'retro',
                'border-b border-cyan-500/40 pb-3 flex justify-between items-end': theme === 'system'
            }">
                <div>
                    <h3 :class="{
                        'text-xl font-bold text-slate-900': theme === 'corporate',
                        'font-pixel text-sm text-emerald-400 uppercase tracking-wider': theme === 'retro',
                        'font-orbitron font-bold text-lg text-cyan-400 tracking-wider': theme === 'system'
                    }">PRACTICAL EXPERIENCE & LEADERSHIP</h3>
                    <p class="text-slate-500 text-xs md:text-sm mt-0.5">Technical operations and keynote advocacy</p>
                </div>
            </div>

            <div class="space-y-4">

                <!-- Experience 1 -->
                <div :class="{
                    'bg-white border border-slate-200 p-6 rounded-xl shadow-sm': theme === 'corporate',
                    'bg-slate-800 rounded-lg border-2 border-slate-700 p-6 shadow-retro': theme === 'retro',
                    'bg-system-panel border-2 border-cyan-500/60 p-6 system-box shadow-system-glow': theme === 'system'
                }">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mb-3">
                        <div>
                            <span class="text-xs font-bold text-blue-600 dark:text-cyan-400 uppercase tracking-wider block">MAY – JULY 2026[cite: 6]</span>
                            <h4 class="font-bold text-xl text-slate-900 dark:text-white">IT Desktop Engineer Trainee @ VXI Global Holdings B.V.[cite: 6]</h4>
                        </div>
                        <span :class="{
                            'bg-slate-100 text-slate-800 border-slate-200': theme === 'corporate',
                            'bg-emerald-500/20 text-emerald-300 border-emerald-500/40 font-monoRetro': theme === 'retro',
                            'bg-cyan-500/20 text-cyan-300 border-cyan-400/40 font-systemMono': theme === 'system'
                        }" class="text-xs px-3 py-1 rounded font-bold border">
                            260 HOURS LOGGED[cite: 6]
                        </span>
                    </div>
                    <ul class="text-slate-600 dark:text-slate-300 text-sm space-y-1.5 list-disc list-inside">
                        <li>Completed 260 hours of technical support, diagnosing hardware/software issues, and maintaining desktop infrastructure in an enterprise call center[cite: 6].</li>
                        <li>Provided rapid technical troubleshooting and service delivery to maintain maximum operational uptime for enterprise staff[cite: 6].</li>
                        <li>Managed enterprise operating system configurations, software deployments, and desktop network setup[cite: 6].</li>
                    </ul>
                </div>

                <!-- Experience 2 / Speaking -->
                <div :class="{
                    'bg-white border border-slate-200 p-6 rounded-xl shadow-sm': theme === 'corporate',
                    'bg-slate-800 rounded-lg border-2 border-slate-700 p-6 shadow-retro': theme === 'retro',
                    'bg-system-panel border-2 border-purple-500/60 p-6 system-box shadow-system-glow': theme === 'system'
                }">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mb-3">
                        <div>
                            <span class="text-xs font-bold text-blue-600 dark:text-amber-400 uppercase tracking-wider block">MARCH 2026[cite: 5]</span>
                            <h4 class="font-bold text-xl text-slate-900 dark:text-white">Featured Keynote Speaker @ Cotabato 1st ICT Summit[cite: 5]</h4>
                        </div>
                        <span :class="{
                            'bg-slate-100 text-slate-800 border-slate-200': theme === 'corporate',
                            'bg-amber-500/20 text-amber-300 border-amber-500/40 font-monoRetro': theme === 'retro',
                            'bg-purple-500/20 text-purple-300 border-purple-400/40 font-systemMono': theme === 'system'
                        }" class="text-xs px-3 py-1 rounded font-bold border">
                            TECHNICAL ADVOCACY[cite: 5]
                        </span>
                    </div>
                    <ul class="text-slate-600 dark:text-slate-300 text-sm space-y-1.5 list-disc list-inside">
                        <li>Delivered a keynote address titled <em>"Digital Innovation: Empowering Inclusive Growth in Cotabato Province"</em>[cite: 5].</li>
                        <li>Fostered knowledge sharing across regional technology leaders, government representatives, and students on digital adoption and infrastructure growth[cite: 5].</li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- SECTION 5: CONTACT & FOOTER -->
        <section id="contact" :class="{
            'bg-slate-900 text-white rounded-2xl p-8 text-center space-y-4 shadow-md': theme === 'corporate',
            'bg-gradient-to-r from-slate-800 to-slate-900 border-4 border-amber-500 rounded-lg p-8 shadow-retro-amber text-center space-y-5': theme === 'retro',
            'bg-gradient-to-b from-system-panel to-slate-950 border-2 border-cyan-400 p-8 system-box shadow-system-glow-lg text-center space-y-5': theme === 'system'
        }">
            <h3 :class="{
                'text-2xl font-bold': theme === 'corporate',
                'font-pixel text-xl sm:text-2xl text-white tracking-wide': theme === 'retro',
                'font-orbitron font-black text-2xl md:text-3xl text-white tracking-wider': theme === 'system'
            }">
                LET'S CONNECT
            </h3>

            <p :class="{
                'text-slate-300 text-sm max-w-xl mx-auto': theme === 'corporate',
                'text-slate-300 text-sm max-w-xl mx-auto leading-relaxed': theme === 'retro',
                'text-slate-300 text-sm max-w-xl mx-auto font-sans leading-relaxed': theme === 'system'
            }">
                Interested in collaborating or discussing enterprise infrastructure, cybersecurity, or AI implementations? Reach out today![cite: 1, 3, 4, 6]
            </p>

            <div class="pt-2">
                <a href="mailto:ralph.omega@example.com" :class="{
                    'bg-white text-slate-900 hover:bg-slate-100 font-semibold px-6 py-3 rounded-lg text-sm transition inline-block': theme === 'corporate',
                    'bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold font-pixel text-xs px-6 py-3.5 rounded shadow-retro transition inline-block': theme === 'retro',
                    'bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-orbitron font-black text-sm px-8 py-4 border border-cyan-200 shadow-system-glow transition inline-block': theme === 'system'
                }">
                    ✉ GET IN TOUCH
                </a>
            </div>

            <div class="pt-6 border-t border-slate-700/50 text-slate-400 text-xs flex flex-col sm:flex-row justify-between items-center max-w-2xl mx-auto gap-2">
                <span>RALPH JADE A. OMEGA © 2026[cite: 1, 2, 3, 4, 5, 6]</span>
                <span x-text="'ACTIVE THEME: ' + theme.toUpperCase()"></span>
            </div>
        </section>

    </main>

</body>
</html>
