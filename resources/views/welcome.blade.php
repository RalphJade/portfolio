<!DOCTYPE html>
<html lang="en" x-data="{ mode: 'hud' }" :class="{ 'dark': mode === 'hud' }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Sheet | Portfolio</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN (For instant visual testing) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js (For UI toggles & interactivity) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Orbitron', 'sans-serif'],
                        body: ['Rajdhani', 'sans-serif'],
                    },
                    colors: {
                        hud: {
                            bg: '#0b0f19',
                            card: '#111827',
                            border: '#1f2937',
                            accent: '#06b6d4', // Cyan
                            xp: '#a855f7',    // Purple
                            hp: '#ef4444',    // Red
                            mp: '#3b82f6',    // Blue
                            gold: '#f59e0b'   // Gold/Legendary
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .neon-border {
            box-shadow: 0 0 10px rgba(6, 182, 212, 0.3), inset 0 0 10px rgba(6, 182, 212, 0.1);
        }
        .gold-glow {
            box-shadow: 0 0 12px rgba(245, 158, 11, 0.4);
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 dark:bg-hud-bg dark:text-slate-100 font-body transition-colors duration-300 min-h-screen">

    <!-- Top Navigation HUD Bar -->
    <header class="sticky top-0 z-50 bg-white/80 dark:bg-hud-card/80 backdrop-blur border-b border-slate-200 dark:border-slate-800 px-6 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <span class="inline-block w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
            <span class="font-heading font-bold text-lg tracking-wider text-cyan-600 dark:text-hud-accent">PLAYER_1 // ONLINE</span>
        </div>

        <!-- Mode Switcher (Recruiter View vs Game HUD) -->
        <div class="flex items-center space-x-2 bg-slate-200 dark:bg-slate-800 p-1 rounded-lg">
            <button @click="mode = 'hud'"
                    :class="mode === 'hud' ? 'bg-cyan-500 text-white shadow' : 'text-slate-400 hover:text-slate-200'"
                    class="px-3 py-1 rounded text-sm font-semibold transition">
                🎮 HUD Mode
            </button>
            <button @click="mode = 'clean'"
                    :class="mode === 'clean' ? 'bg-slate-700 text-white shadow' : 'text-slate-400 hover:text-slate-200'"
                    class="px-3 py-1 rounded text-sm font-semibold transition">
                📄 Clean Resume
            </button>
        </div>
    </header>

    <main class="max-w-6xl mx-auto p-6 space-y-8">

        <!-- SECTION 1: CHARACTER HERO SHEET -->
        <section class="bg-white dark:bg-hud-card border border-slate-200 dark:border-slate-800 rounded-xl p-6 relative overflow-hidden transition-all"
                 :class="mode === 'hud' ? 'neon-border dark:border-cyan-500/30' : ''">

            <div class="flex flex-col md:flex-row gap-6 items-center md:items-start">

                <!-- Avatar Frame -->
                <div class="relative group">
                    <div class="w-32 h-32 md:w-40 md:h-40 rounded-xl bg-slate-800 border-2 border-cyan-500 flex items-center justify-center overflow-hidden">
                        <!-- Replace src with your image -->
                        <img src="https://api.dicebear.com/7.x/bottts/svg?seed=PortfolioHero" alt="Avatar" class="w-full h-full object-cover">
                    </div>
                    <span class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-cyan-500 text-slate-950 font-heading text-xs font-bold px-3 py-0.5 rounded-full uppercase">
                        LVL 4 DEV
                    </span>
                </div>

                <!-- Hero Info & Health/Mana Bars -->
                <div class="flex-1 text-center md:text-left space-y-3">
                    <div>
                        <h1 class="font-heading text-3xl md:text-4xl font-extrabold tracking-wide text-slate-900 dark:text-white">
                            YOUR NAME HERE
                        </h1>
                        <p class="text-cyan-600 dark:text-cyan-400 font-semibold tracking-wider text-lg">
                            CLASS: FULL-STACK SORCERER
                        </p>
                    </div>

                    <!-- Bars (HP / MP / XP) -->
                    <div class="space-y-2 max-w-md" x-show="mode === 'hud'">
                        <!-- HP / Energy -->
                        <div>
                            <div class="flex justify-between text-xs font-bold mb-1">
                                <span class="text-red-500">HP (WORK ENERGY)</span>
                                <span>100 / 100</span>
                            </div>
                            <div class="w-full h-2.5 bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-red-500 w-full transition-all duration-1000"></div>
                            </div>
                        </div>

                        <!-- MP / Coffee -->
                        <div>
                            <div class="flex justify-between text-xs font-bold mb-1">
                                <span class="text-blue-400">MP (CAFFEINE)</span>
                                <span>85 / 100</span>
                            </div>
                            <div class="w-full h-2.5 bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-blue-500 w-[85%] transition-all duration-1000"></div>
                            </div>
                        </div>

                        <!-- XP / Experience -->
                        <div>
                            <div class="flex justify-between text-xs font-bold mb-1">
                                <span class="text-purple-400">XP (NEXT LEVEL)</span>
                                <span>75%</span>
                            </div>
                            <div class="w-full h-2.5 bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-purple-500 w-[75%] transition-all duration-1000"></div>
                            </div>
                        </div>
                    </div>

                    <p class="text-slate-600 dark:text-slate-400 text-sm max-w-2xl pt-2">
                        Specializing in building high-performance web applications using Laravel, Vue, and Tailwind CSS. Crafting clean code and scalable architectures.
                    </p>
                </div>
            </div>
        </section>

        <!-- SECTION 2: STAT BLOCK (ATTRIBUTES) -->
        <section class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <!-- INT -->
            <div class="bg-white dark:bg-hud-card p-4 rounded-xl border border-slate-200 dark:border-slate-800">
                <div class="text-xs font-bold text-slate-400">INT (LOGIC / BACKEND)</div>
                <div class="font-heading text-3xl font-extrabold text-cyan-500 my-1">94</div>
                <div class="text-xs text-slate-500">Laravel, PHP, SQL, APIs</div>
            </div>

            <!-- AGI -->
            <div class="bg-white dark:bg-hud-card p-4 rounded-xl border border-slate-200 dark:border-slate-800">
                <div class="text-xs font-bold text-slate-400">AGI (SPEED / FRONTEND)</div>
                <div class="font-heading text-3xl font-extrabold text-emerald-400 my-1">88</div>
                <div class="text-xs text-slate-500">Vue.js, Tailwind, Vite</div>
            </div>

            <!-- STR -->
            <div class="bg-white dark:bg-hud-card p-4 rounded-xl border border-slate-200 dark:border-slate-800">
                <div class="text-xs font-bold text-slate-400">STR (ARCHITECTURE)</div>
                <div class="font-heading text-3xl font-extrabold text-purple-400 my-1">90</div>
                <div class="text-xs text-slate-500">DB Design, Testing, OOP</div>
            </div>

            <!-- CHA -->
            <div class="bg-white dark:bg-hud-card p-4 rounded-xl border border-slate-200 dark:border-slate-800">
                <div class="text-xs font-bold text-slate-400">CHA (TEAMWORK)</div>
                <div class="font-heading text-3xl font-extrabold text-amber-400 my-1">85</div>
                <div class="text-xs text-slate-500">Git, Communication, Docs</div>
            </div>
        </section>

        <!-- SECTION 3: INVENTORY (EQUIPPED PROJECTS) -->
        <section class="space-y-4">
            <div class="flex justify-between items-center">
                <h2 class="font-heading text-2xl font-bold tracking-wider">EQUIPPED ARTIFACTS (PROJECTS)</h2>
                <span class="text-xs text-slate-400">3 ITEMS INVENTORY</span>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Project Card 1 (Legendary) -->
                <div class="bg-white dark:bg-hud-card rounded-xl border border-amber-500/50 p-5 relative overflow-hidden transition-all hover:-translate-y-1 gold-glow">
                    <div class="flex justify-between items-start mb-3">
                        <span class="text-xs font-bold text-amber-500 uppercase tracking-widest">[LEGENDARY ITEM]</span>
                        <span class="bg-amber-500/20 text-amber-400 text-xs px-2 py-0.5 rounded border border-amber-500/40">v1.0</span>
                    </div>
                    <h3 class="font-heading text-lg font-bold text-slate-900 dark:text-white">E-Commerce Nexus</h3>
                    <p class="text-xs text-slate-400 mt-2 line-clamp-2">Full-stack multi-vendor marketplace with real-time checkout and payment integrations.</p>

                    <!-- Item Stats Buffs -->
                    <div class="my-4 bg-slate-900/50 p-3 rounded text-xs space-y-1 font-mono text-emerald-400">
                        <div>+ 25% Conversion Rate</div>
                        <div>+ Stripe & PayPal Integration</div>
                    </div>

                    <div class="flex justify-between items-center pt-2 border-t border-slate-800">
                        <span class="text-xs text-slate-500">Laravel • Vue • MySQL</span>
                        <a href="#" class="text-xs font-bold text-cyan-400 hover:underline">INSPECT &rarr;</a>
                    </div>
                </div>

                <!-- Project Card 2 (Epic) -->
                <div class="bg-white dark:bg-hud-card rounded-xl border border-purple-500/50 p-5 relative overflow-hidden transition-all hover:-translate-y-1">
                    <div class="flex justify-between items-start mb-3">
                        <span class="text-xs font-bold text-purple-400 uppercase tracking-widest">[EPIC ITEM]</span>
                        <span class="bg-purple-500/20 text-purple-400 text-xs px-2 py-0.5 rounded border border-purple-500/40">v2.1</span>
                    </div>
                    <h3 class="font-heading text-lg font-bold text-slate-900 dark:text-white">Task Command HQ</h3>
                    <p class="text-xs text-slate-400 mt-2 line-clamp-2">Kanban management system with websocket notifications and drag-and-drop boards.</p>

                    <!-- Item Stats Buffs -->
                    <div class="my-4 bg-slate-900/50 p-3 rounded text-xs space-y-1 font-mono text-cyan-400">
                        <div>+ Real-time Websockets</div>
                        <div>+ Drag & Drop UI</div>
                    </div>

                    <div class="flex justify-between items-center pt-2 border-t border-slate-800">
                        <span class="text-xs text-slate-500">Laravel • Inertia • Tailwind</span>
                        <a href="#" class="text-xs font-bold text-cyan-400 hover:underline">INSPECT &rarr;</a>
                    </div>
                </div>

                <!-- Project Card 3 (Rare) -->
                <div class="bg-white dark:bg-hud-card rounded-xl border border-blue-500/50 p-5 relative overflow-hidden transition-all hover:-translate-y-1">
                    <div class="flex justify-between items-start mb-3">
                        <span class="text-xs font-bold text-blue-400 uppercase tracking-widest">[RARE ITEM]</span>
                        <span class="bg-blue-500/20 text-blue-400 text-xs px-2 py-0.5 rounded border border-blue-500/40">v0.9</span>
                    </div>
                    <h3 class="font-heading text-lg font-bold text-slate-900 dark:text-white">API Gateway Sentinel</h3>
                    <p class="text-xs text-slate-400 mt-2 line-clamp-2">Microservice authentication and rate-limiting proxy built for high performance.</p>

                    <div class="my-4 bg-slate-900/50 p-3 rounded text-xs space-y-1 font-mono text-purple-400">
                        <div>+ 99.9% Uptime</div>
                        <div>+ Redis Caching</div>
                    </div>

                    <div class="flex justify-between items-center pt-2 border-t border-slate-800">
                        <span class="text-xs text-slate-500">PHP 8.4 • Redis • Docker</span>
                        <a href="#" class="text-xs font-bold text-cyan-400 hover:underline">INSPECT &rarr;</a>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 4: QUEST LOG (EXPERIENCE HISTORY) -->
        <section class="bg-white dark:bg-hud-card border border-slate-200 dark:border-slate-800 rounded-xl p-6">
            <h2 class="font-heading text-2xl font-bold tracking-wider mb-6">QUEST LOG (EXPERIENCE)</h2>

            <div class="space-y-6 border-l-2 border-cyan-500/40 ml-2 pl-6">

                <!-- Quest 1 -->
                <div class="relative">
                    <div class="absolute -left-[31px] top-1 w-4 h-4 rounded-full bg-cyan-500 border-4 border-hud-card"></div>
                    <span class="text-xs text-cyan-400 font-mono">[COMPLETED MAIN QUEST] • 2023 - PRESENT</span>
                    <h3 class="font-heading text-lg font-bold text-slate-900 dark:text-white">Full-Stack Developer @ TechCorp</h3>
                    <p class="text-xs text-slate-400 mt-1">Led backend optimizations, migrated legacy codebases to Laravel 11/12, and reduced query latency by 40%.</p>
                </div>

                <!-- Quest 2 -->
                <div class="relative">
                    <div class="absolute -left-[31px] top-1 w-4 h-4 rounded-full bg-slate-600 border-4 border-hud-card"></div>
                    <span class="text-xs text-slate-400 font-mono">[SIDE QUEST] • 2022 - 2023</span>
                    <h3 class="font-heading text-lg font-bold text-slate-900 dark:text-white">Freelance Web Architect</h3>
                    <p class="text-xs text-slate-400 mt-1">Delivered 10+ custom web solutions for international clients across e-commerce and SaaS sectors.</p>
                </div>

            </div>
        </section>

        <!-- SECTION 5: GUILD INVITE / CONTACT -->
        <section class="bg-gradient-to-r from-cyan-950/40 to-slate-900 border border-cyan-500/30 rounded-xl p-8 text-center space-y-4">
            <h2 class="font-heading text-3xl font-extrabold tracking-wider text-cyan-400">SEND A GUILD INVITE</h2>
            <p class="text-slate-400 text-sm max-w-xl mx-auto">
                Ready to recruit me for your party? Send a message or summon me via email directly.
            </p>

            <div class="flex justify-center gap-4 pt-2">
                <a href="mailto:your.email@example.com" class="bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-heading font-bold px-6 py-3 rounded-lg text-sm transition">
                    📩 SUMMON VIA EMAIL
                </a>
                <a href="#" class="border border-slate-700 hover:border-cyan-500 font-heading font-bold px-6 py-3 rounded-lg text-sm transition">
                    📜 DOWNLOAD RESUME PDF
                </a>
            </div>
        </section>

    </main>

</body>
</html>
