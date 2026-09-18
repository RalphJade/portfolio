<!DOCTYPE html>
<html lang="en" x-data="{ activeTab: 'status', soundEnabled: true }" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAYER STATUS | Ralph Jade A. Omega</title>

    <!-- Google Fonts for Solo Leveling Aesthetic -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&family=Rajdhani:wght@500;600;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">

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
                        orbitron: ['"Orbitron"', 'sans-serif'],
                        rajdhani: ['"Rajdhani"', 'sans-serif'],
                        mono: ['"Share Tech Mono"', 'monospace'],
                    },
                    colors: {
                        system: {
                            bg: '#040711',
                            panel: 'rgba(8, 15, 30, 0.85)',
                            border: '#00f0ff',
                            glow: 'rgba(0, 240, 255, 0.4)',
                            purple: '#8a2be2',
                            purpleGlow: 'rgba(138, 43, 226, 0.4)',
                            gold: '#ffd700',
                            text: '#cce6ff',
                        }
                    },
                    boxShadow: {
                        'system-glow': '0 0 15px rgba(0, 240, 255, 0.3), inset 0 0 15px rgba(0, 240, 255, 0.1)',
                        'system-glow-lg': '0 0 30px rgba(0, 240, 255, 0.5), inset 0 0 20px rgba(0, 240, 255, 0.15)',
                        'monarch-glow': '0 0 20px rgba(138, 43, 226, 0.4), inset 0 0 15px rgba(138, 43, 226, 0.15)',
                        's-rank-glow': '0 0 25px rgba(255, 215, 0, 0.5)',
                    }
                }
            }
        }
    </script>

    <style>
        /* System UI Scanlines & Hologram Effect */
        .system-scanlines {
            background: linear-gradient(
                to bottom,
                rgba(255,255,255,0),
                rgba(255,255,255,0) 50%,
                rgba(0, 240, 255, 0.03) 50%,
                rgba(0, 240, 255, 0.03)
            );
            background-size: 100% 4px;
        }

        .system-border {
            border: 1px solid rgba(0, 240, 255, 0.5);
            position: relative;
        }

        /* Tech Corner Brackets */
        .system-box {
            position: relative;
        }
        .system-box::before {
            content: '';
            position: absolute;
            top: -2px; left: -2px;
            width: 10px; height: 10px;
            border-top: 2px solid #00f0ff;
            border-left: 2px solid #00f0ff;
        }
        .system-box::after {
            content: '';
            position: absolute;
            bottom: -2px; right: -2px;
            width: 10px; height: 10px;
            border-bottom: 2px solid #00f0ff;
            border-right: 2px solid #00f0ff;
        }

        /* Custom Blue Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #040711; }
        ::-webkit-scrollbar-thumb {
            background: #00f0ff;
            box-shadow: 0 0 10px #00f0ff;
        }
    </style>
</head>
<body class="bg-system-bg text-system-text font-rajdhani min-h-screen system-scanlines selection:bg-cyan-500 selection:text-black pb-12">

    <!-- TOP SYSTEM NOTIFICATION HEADER -->
    <header class="sticky top-0 z-50 bg-system-bg/90 backdrop-blur-md border-b border-cyan-500/40 px-4 md:px-8 py-3">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-3">

            <div class="flex items-center space-x-3">
                <div class="w-3 h-3 bg-cyan-400 rounded-full animate-ping"></div>
                <div>
                    <span class="font-orbitron font-bold text-xs text-cyan-400 tracking-widest block">[ SYSTEM NOTIFICATION ]</span>
                    <h1 class="font-orbitron font-extrabold text-sm text-white tracking-wider">PLAYER STATUS: ACTIVE</h1>
                </div>
            </div>

            <!-- SYSTEM NAVIGATION WINDOWS -->
            <div class="flex items-center space-x-2 font-mono text-xs">
                <button @click="activeTab = 'status'"
                        :class="activeTab === 'status' ? 'bg-cyan-500/20 text-cyan-300 border-cyan-400 shadow-system-glow' : 'text-slate-400 border-slate-700 hover:text-cyan-400'"
                        class="px-3 py-1.5 border transition font-bold uppercase tracking-wider">
                    [ STATUS ]
                </button>
                <button @click="activeTab = 'skills'"
                        :class="activeTab === 'skills' ? 'bg-cyan-500/20 text-cyan-300 border-cyan-400 shadow-system-glow' : 'text-slate-400 border-slate-700 hover:text-cyan-400'"
                        class="px-3 py-1.5 border transition font-bold uppercase tracking-wider">
                    [ SKILL TREE ]
                </button>
                <button @click="activeTab = 'runes'"
                        :class="activeTab === 'runes' ? 'bg-cyan-500/20 text-cyan-300 border-cyan-400 shadow-system-glow' : 'text-slate-400 border-slate-700 hover:text-cyan-400'"
                        class="px-3 py-1.5 border transition font-bold uppercase tracking-wider">
                    [ RUNES & CERTS ]
                </button>
                <button @click="activeTab = 'quests'"
                        :class="activeTab === 'quests' ? 'bg-cyan-500/20 text-cyan-300 border-cyan-400 shadow-system-glow' : 'text-slate-400 border-slate-700 hover:text-cyan-400'"
                        class="px-3 py-1.5 border transition font-bold uppercase tracking-wider">
                    [ QUEST LOG ]
                </button>
            </div>

        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 md:px-6 pt-8 space-y-8">

        <!-- SYSTEM ALERT POPUP BANNER -->
        <div class="bg-cyan-950/40 border border-cyan-400/60 p-3 system-box shadow-system-glow flex justify-between items-center text-xs font-mono">
            <div class="flex items-center space-x-3">
                <span class="text-cyan-400 font-bold">⚠️ NOTICE:</span>
                <span class="text-cyan-200">PLAYER HAS AWAKENED AS A HIGH-RANK IT SPECIALIST & CYBER THREAT STRATEGIST[cite: 1, 3].</span>
            </div>
            <span class="hidden md:inline text-cyan-500">SYSTEM ID: RO-2026-IT[cite: 6]</span>
        </div>

        <!-- TAB 1: PLAYER STATUS WINDOW (HERO SECTION) -->
        <section x-show="activeTab === 'status'" class="space-y-6">

            <div class="bg-system-panel border-2 border-cyan-400/70 p-6 md:p-8 system-box shadow-system-glow-lg backdrop-blur-md relative overflow-hidden">

                <!-- Background Glyph Accent -->
                <div class="absolute -right-10 -bottom-10 opacity-5 text-cyan-400 font-orbitron text-9xl font-black select-none pointer-events-none">
                    S-RANK
                </div>

                <div class="flex flex-col md:flex-row gap-8 items-center md:items-start relative z-10">

                    <!-- Player Emblem / Avatar Frame -->
                    <div class="flex flex-col items-center shrink-0">
                        <div class="w-40 h-40 md:w-48 md:h-48 bg-slate-950 border-2 border-cyan-400 p-2 system-box shadow-system-glow relative flex items-center justify-center">
                            <div class="w-full h-full border border-cyan-500/30 bg-gradient-to-b from-cyan-950/50 to-slate-950 flex flex-col items-center justify-center text-center p-3">
                                <span class="font-orbitron text-4xl text-cyan-400 mb-1 drop-shadow-[0_0_10px_rgba(0,240,255,0.8)]">⚡</span>
                                <span class="font-orbitron text-xs text-white tracking-widest mt-2">RALPH OMEGA</span>
                            </div>
                            <span class="absolute -top-3 -right-3 bg-amber-400 text-slate-950 font-orbitron font-extrabold text-[10px] px-2 py-0.5 shadow-s-rank-glow uppercase tracking-widest">
                                S-RANK HUNTER
                            </span>
                        </div>
                        <span class="mt-3 font-mono text-cyan-400 text-xs tracking-widest">LEVEL: 99 | AFFILIATION: USM[cite: 3, 5, 6]</span>
                    </div>

                    <!-- Status Info & Stat Bars -->
                    <div class="flex-1 space-y-5 text-center md:text-left">
                        <div>
                            <div class="flex flex-wrap justify-center md:justify-start items-center gap-2 mb-2 font-mono text-xs">
                                <span class="bg-cyan-500/20 text-cyan-300 border border-cyan-400/50 px-2.5 py-0.5 uppercase tracking-wider">
                                    CLASS: SHADOW ARCHITECT
                                </span>
                                <span class="bg-purple-500/20 text-purple-300 border border-purple-400/50 px-2.5 py-0.5 uppercase tracking-wider">
                                    TITLE: KEYNOTE SPEAKER & CYBER DEFENDER[cite: 1, 3, 5]
                                </span>
                            </div>
                            <h2 class="font-orbitron font-black text-2xl md:text-4xl text-white tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-white via-cyan-200 to-cyan-400">
                                RALPH JADE A. OMEGA[cite: 1, 2, 3, 4, 5, 6]
                            </h2>
                            <p class="font-mono text-cyan-400 text-sm tracking-wider mt-1">
                                Enterprise Infrastructure • Cyber Threat Management • Artificial Intelligence[cite: 1, 3, 4, 6]
                            </p>
                        </div>

                        <p class="text-slate-300 text-base leading-relaxed font-sans max-w-3xl">
                            Ralph Jade A. Omega is an IT specialist with hands-on enterprise infrastructure experience and certified expertise in cyber threat management and artificial intelligence[cite: 1, 3, 4, 6]. Combines practical infrastructure experience at VXI Global Holdings with proven leadership as a featured speaker at regional technology summits[cite: 5, 6].
                        </p>

                        <!-- STATS PARAMETERS -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2 font-mono text-xs">
                            <div class="bg-slate-950/80 p-3 border border-cyan-500/30 text-center">
                                <span class="block text-slate-400 text-[10px]">CYBER THREAT DEFENSE[cite: 1, 3]</span>
                                <span class="font-orbitron font-bold text-cyan-400 text-base">STR: 98</span>
                            </div>
                            <div class="bg-slate-950/80 p-3 border border-cyan-500/30 text-center">
                                <span class="block text-slate-400 text-[10px]">SYSTEMS SUPPORT[cite: 6]</span>
                                <span class="font-orbitron font-bold text-purple-400 text-base">AGI: 95</span>
                            </div>
                            <div class="bg-slate-950/80 p-3 border border-cyan-500/30 text-center">
                                <span class="block text-slate-400 text-[10px]">AI INTEGRATION[cite: 4]</span>
                                <span class="font-orbitron font-bold text-emerald-400 text-base">INT: 92</span>
                            </div>
                            <div class="bg-slate-950/80 p-3 border border-cyan-500/30 text-center">
                                <span class="block text-slate-400 text-[10px]">TECH ADVOCACY[cite: 5]</span>
                                <span class="font-orbitron font-bold text-amber-400 text-base">SENS: 96</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap justify-center md:justify-start gap-4 pt-2 font-mono text-xs">
                            <a href="#contact" @click="activeTab = 'quests'" class="bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-orbitron font-bold px-6 py-3 border border-cyan-300 shadow-system-glow transition tracking-wider">
                                ⚔️ ACCEPT COLLABORATION
                            </a>
                            <button @click="activeTab = 'skills'" class="bg-slate-900 hover:bg-slate-800 text-cyan-400 font-bold px-6 py-3 border border-cyan-500/50 transition tracking-wider">
                                🔍 VIEW SKILL TREE
                            </button>
                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- TAB 2: TECHNICAL SKILLS MATRIX (SKILL TREE) -->
        <section x-show="activeTab === 'skills'" class="space-y-6">
            <div class="border-b border-cyan-500/40 pb-3 flex justify-between items-end">
                <div>
                    <h3 class="font-orbitron font-bold text-lg text-cyan-400 tracking-wider">ACTIVE SKILLS & DOMAIN TREE</h3>
                    <p class="text-slate-400 text-xs font-mono">Specialized combat and technical abilities acquired through training</p>
                </div>
                <span class="font-mono text-cyan-500 text-xs">[ DOMAINS UNLOCKED: 4 ]</span>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">

                <!-- Skill 1 -->
                <div class="bg-system-panel border border-cyan-500/50 p-5 system-box shadow-system-glow relative group hover:border-cyan-400 transition">
                    <div class="flex justify-between items-center mb-3">
                        <span class="font-orbitron text-xs text-cyan-400 font-bold">[ ACTIVE SKILL 01 ]</span>
                        <span class="bg-cyan-500/20 text-cyan-300 text-[10px] px-2 py-0.5 border border-cyan-400/40 font-mono uppercase">DEFENSIVE DOMAIN</span>
                    </div>
                    <h4 class="font-orbitron font-bold text-lg text-white mb-2">Cybersecurity & Threat Defense[cite: 1, 3]</h4>
                    <p class="text-xs text-slate-300 font-sans mb-4 leading-relaxed">
                        Threat identification, attack surface analysis, network safety protocols, and operational protection[cite: 1, 3].
                    </p>
                    <div class="pt-3 border-t border-cyan-500/30 font-mono text-xs">
                        <span class="text-cyan-400 block text-[10px]">EQUIPPED CREDENTIALS:</span>
                        <span class="text-slate-300">Cisco Cyber Threat Management, Cisco Intro to Cybersecurity[cite: 1, 3]</span>
                    </div>
                </div>

                <!-- Skill 2 -->
                <div class="bg-system-panel border border-purple-500/50 p-5 system-box shadow-monarch-glow relative group hover:border-purple-400 transition">
                    <div class="flex justify-between items-center mb-3">
                        <span class="font-orbitron text-xs text-purple-400 font-bold">[ ACTIVE SKILL 02 ]</span>
                        <span class="bg-purple-500/20 text-purple-300 text-[10px] px-2 py-0.5 border border-purple-400/40 font-mono uppercase">ARTIFICIAL INTELLIGENCE</span>
                    </div>
                    <h4 class="font-orbitron font-bold text-lg text-white mb-2">Artificial Intelligence Fundamentals[cite: 4]</h4>
                    <p class="text-xs text-slate-300 font-sans mb-4 leading-relaxed">
                        AI principles, machine learning concepts, and practical applications in modernized environments[cite: 4].
                    </p>
                    <div class="pt-3 border-t border-purple-500/30 font-mono text-xs">
                        <span class="text-purple-400 block text-[10px]">EQUIPPED CREDENTIALS:</span>
                        <span class="text-slate-300">IBM SkillsBuild AI Fundamentals[cite: 4]</span>
                    </div>
                </div>

                <!-- Skill 3 -->
                <div class="bg-system-panel border border-cyan-500/50 p-5 system-box shadow-system-glow relative group hover:border-cyan-400 transition">
                    <div class="flex justify-between items-center mb-3">
                        <span class="font-orbitron text-xs text-cyan-400 font-bold">[ ACTIVE SKILL 03 ]</span>
                        <span class="bg-cyan-500/20 text-cyan-300 text-[10px] px-2 py-0.5 border border-cyan-400/40 font-mono uppercase">ARCHITECTURAL DOMAIN</span>
                    </div>
                    <h4 class="font-orbitron font-bold text-lg text-white mb-2">IT Competency & Architecture[cite: 2]</h4>
                    <p class="text-xs text-slate-300 font-sans mb-4 leading-relaxed">
                        Software design, system architecture, database fundamentals, and IT project management[cite: 2].
                    </p>
                    <div class="pt-3 border-t border-cyan-500/30 font-mono text-xs">
                        <span class="text-cyan-400 block text-[10px]">EQUIPPED CREDENTIALS:</span>
                        <span class="text-slate-300">TOPCIT Level 2 Certification[cite: 2]</span>
                    </div>
                </div>

                <!-- Skill 4 -->
                <div class="bg-system-panel border border-emerald-500/50 p-5 system-box shadow-[0_0_15px_rgba(16,185,129,0.3)] relative group hover:border-emerald-400 transition">
                    <div class="flex justify-between items-center mb-3">
                        <span class="font-orbitron text-xs text-emerald-400 font-bold">[ ACTIVE SKILL 04 ]</span>
                        <span class="bg-emerald-500/20 text-emerald-300 text-[10px] px-2 py-0.5 border border-emerald-400/40 font-mono uppercase">INFRASTRUCTURE SUPPORT</span>
                    </div>
                    <h4 class="font-bold font-orbitron text-lg text-white mb-2">Systems & Support[cite: 6]</h4>
                    <p class="text-xs text-slate-300 font-sans mb-4 leading-relaxed">
                        Enterprise OS configuration, hardware installation, desktop troubleshooting, and IT service delivery[cite: 6].
                    </p>
                    <div class="pt-3 border-t border-emerald-500/30 font-mono text-xs">
                        <span class="text-emerald-400 block text-[10px]">EQUIPPED CREDENTIALS:</span>
                        <span class="text-slate-300">VXI IT Desktop Engineering Trainee[cite: 6]</span>
                    </div>
                </div>

            </div>
        </section>

        <!-- TAB 3: RUNES & CERTIFICATIONS -->
        <section x-show="activeTab === 'runes'" class="space-y-6">
            <div class="border-b border-cyan-500/40 pb-3 flex justify-between items-end">
                <div>
                    <h3 class="font-orbitron font-bold text-lg text-cyan-400 tracking-wider">EQUIPPED RUNE STONES & CERTIFICATIONS</h3>
                    <p class="text-slate-400 text-xs font-mono">Verified technical seals authorized by international institutions</p>
                </div>
                <span class="font-mono text-cyan-500 text-xs">[ VERIFIED INVENTORY: 4 ]</span>
            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <!-- Rune 1 -->
                <div class="bg-system-panel border-2 border-cyan-500/60 p-5 system-box shadow-system-glow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center border-b border-cyan-500/30 pb-2 mb-3 font-mono text-xs">
                            <span class="text-cyan-400 font-bold">[ SYSTEM RUNE #01 ]</span>
                            <span class="bg-cyan-500/20 text-cyan-300 px-2 py-0.5 border border-cyan-400/30">ISSUED: MAY 2026[cite: 3]</span>
                        </div>
                        <h4 class="font-orbitron font-bold text-lg text-white mb-2">Cyber Threat Management[cite: 3]</h4>
                        <p class="text-xs text-slate-300 font-sans mb-3">
                            Issued by Cisco Networking Academy / University of Southern Mindanao[cite: 3]. Demonstrates threat identification and threat management protocols[cite: 3].
                        </p>
                    </div>
                    <div class="pt-3 border-t border-cyan-500/30 flex justify-between items-center font-mono text-xs">
                        <span class="text-cyan-400">VERIFIED SYSTEM CERTIFICATE[cite: 3]</span>
                        <span class="text-slate-500">ID: ae61eb4d[cite: 3]</span>
                    </div>
                </div>

                <!-- Rune 2 -->
                <div class="bg-system-panel border-2 border-cyan-500/60 p-5 system-box shadow-system-glow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center border-b border-cyan-500/30 pb-2 mb-3 font-mono text-xs">
                            <span class="text-cyan-400 font-bold">[ SYSTEM RUNE #02 ]</span>
                            <span class="bg-cyan-500/20 text-cyan-300 px-2 py-0.5 border border-cyan-400/30">ISSUED: MAR 2026[cite: 1]</span>
                        </div>
                        <h4 class="font-orbitron font-bold text-lg text-white mb-2">Introduction to Cybersecurity[cite: 1]</h4>
                        <p class="text-xs text-slate-300 font-sans mb-3">
                            Issued by Cisco Networking Academy[cite: 1]. Fundamental principles of online safety, cyber threats, and operational defense[cite: 1].
                        </p>
                    </div>
                    <div class="pt-3 border-t border-cyan-500/30 flex justify-between items-center font-mono text-xs">
                        <span class="text-cyan-400">VERIFIED SYSTEM CERTIFICATE[cite: 1]</span>
                        <span class="text-slate-500">CISCO ACADEMY[cite: 1]</span>
                    </div>
                </div>

                <!-- Rune 3 -->
                <div class="bg-system-panel border-2 border-purple-500/60 p-5 system-box shadow-monarch-glow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center border-b border-purple-500/30 pb-2 mb-3 font-mono text-xs">
                            <span class="text-purple-400 font-bold">[ SYSTEM RUNE #03 ]</span>
                            <span class="bg-purple-500/20 text-purple-300 px-2 py-0.5 border border-purple-400/30">ISSUED: FEB 2026[cite: 4]</span>
                        </div>
                        <h4 class="font-orbitron font-bold text-lg text-white mb-2">Artificial Intelligence Fundamentals[cite: 4]</h4>
                        <p class="text-xs text-slate-300 font-sans mb-3">
                            Issued by IBM SkillsBuild[cite: 4]. Verified badge confirming foundational knowledge in machine learning, AI ethics, and implementation[cite: 4].
                        </p>
                    </div>
                    <div class="pt-3 border-t border-purple-500/30 flex justify-between items-center font-mono text-xs">
                        <span class="text-purple-400">VERIFIED SYSTEM CERTIFICATE[cite: 4]</span>
                        <span class="text-slate-500">IBM SKILLSBUILD[cite: 4]</span>
                    </div>
                </div>

                <!-- Rune 4 -->
                <div class="bg-system-panel border-2 border-amber-500/60 p-5 system-box shadow-s-rank-glow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center border-b border-amber-500/30 pb-2 mb-3 font-mono text-xs">
                            <span class="text-amber-400 font-bold">[ SYSTEM RUNE #04 ]</span>
                            <span class="bg-amber-500/20 text-amber-300 px-2 py-0.5 border border-amber-400/30">ISSUED: DEC 2025[cite: 2]</span>
                        </div>
                        <h4 class="font-orbitron font-bold text-lg text-white mb-2">TOPCIT Level 2 Credential[cite: 2]</h4>
                        <p class="text-xs text-slate-300 font-sans mb-3">
                            Issued by IITP (Institute for Information & Communications Technology Promotion)[cite: 2]. Standardized assessment evaluating software and system architecture competencies[cite: 2].
                        </p>
                    </div>
                    <div class="pt-3 border-t border-amber-500/30 flex justify-between items-center font-mono text-xs">
                        <span class="text-amber-400">VERIFIED SYSTEM CERTIFICATE[cite: 2]</span>
                        <span class="text-slate-500">SCORE: 179[cite: 2]</span>
                    </div>
                </div>

            </div>
        </section>

        <!-- TAB 4: QUEST LOG & EXP -->
        <section x-show="activeTab === 'quests'" class="space-y-6">
            <div class="border-b border-cyan-500/40 pb-3 flex justify-between items-end">
                <div>
                    <h3 class="font-orbitron font-bold text-lg text-cyan-400 tracking-wider">COMPLETED QUESTS & DUNGEON RAIDS</h3>
                    <p class="text-slate-400 text-xs font-mono">Field experience and raid history</p>
                </div>
                <span class="font-mono text-cyan-500 text-xs">[ EXP LOG: RECORDED ]</span>
            </div>

            <div class="space-y-6">

                <!-- Quest 1 -->
                <div class="bg-system-panel border-2 border-cyan-500/60 p-6 system-box shadow-system-glow">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mb-4 border-b border-cyan-500/30 pb-3 font-mono">
                        <div>
                            <span class="text-xs text-cyan-400 tracking-widest">[ MAIN QUEST COMPLETED ] • MAY – JULY 2026[cite: 6]</span>
                            <h4 class="font-orbitron font-bold text-xl text-white mt-1">IT Desktop Engineer Trainee @ VXI Global Holdings B.V.[cite: 6]</h4>
                        </div>
                        <span class="bg-cyan-500/20 text-cyan-300 border border-cyan-400/40 text-xs px-3 py-1 font-bold">260 HOURS LOGGED[cite: 6]</span>
                    </div>
                    <ul class="text-slate-300 text-sm space-y-2 list-disc list-inside font-sans">
                        <li>Executed 260 hours of desktop support, infrastructure troubleshooting, and hardware deployment in an enterprise call center[cite: 6].</li>
                        <li>Maintained operational readiness and desktop system availability for enterprise teams under high volume conditions[cite: 6].</li>
                        <li>Evaluated with exemplary performance and professional conduct by desktop leadership[cite: 6].</li>
                    </ul>
                </div>

                <!-- Quest 2 -->
                <div class="bg-system-panel border-2 border-purple-500/60 p-6 system-box shadow-monarch-glow">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mb-4 border-b border-purple-500/30 pb-3 font-mono">
                        <div>
                            <span class="text-xs text-purple-400 tracking-widest">[ SPECIAL KEYNOTE RAID ] • MARCH 2026[cite: 5]</span>
                            <h4 class="font-orbitron font-bold text-xl text-white mt-1">Featured Speaker @ Cotabato 1st ICT Summit[cite: 5]</h4>
                        </div>
                        <span class="bg-purple-500/20 text-purple-300 border border-purple-400/40 text-xs px-3 py-1 font-bold">PUBLIC ADVOCACY[cite: 5]</span>
                    </div>
                    <ul class="text-slate-300 text-sm space-y-2 list-disc list-inside font-sans">
                        <li>Delivered a keynote address titled <em>"Digital Innovation: Empowering Inclusive Growth in Cotabato Province"</em>[cite: 5].</li>
                        <li>Engaged regional leaders, government representatives, and technology students on digital adoption and infrastructure growth[cite: 5].</li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- CONTACT SYSTEM WINDOW -->
        <section id="contact" class="bg-gradient-to-b from-system-panel to-slate-950 border-2 border-cyan-400 p-8 system-box shadow-system-glow-lg text-center space-y-5 relative">
            <div class="inline-block bg-cyan-500/20 text-cyan-300 font-mono text-xs px-3 py-1 border border-cyan-400/40">
                [ OPEN SYSTEM CHANNEL ]
            </div>

            <h3 class="font-orbitron font-black text-2xl md:text-3xl text-white tracking-wider">
                INITIATE PARTY INVITATION
            </h3>

            <p class="text-slate-300 text-sm max-w-xl mx-auto font-sans leading-relaxed">
                Ready to recruit an S-Rank IT Specialist for enterprise infrastructure, cybersecurity, or AI deployments? Send a system transmission now![cite: 1, 3, 4, 6]
            </p>

            <div class="pt-2">
                <a href="mailto:ralph.omega@example.com" class="inline-block bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-orbitron font-black text-sm px-8 py-4 border border-cyan-200 shadow-system-glow transition tracking-widest">
                    ⚡ SEND DIRECT MESSAGE
                </a>
            </div>

            <div class="pt-6 border-t border-cyan-500/30 text-slate-500 text-xs flex flex-col sm:flex-row justify-between items-center max-w-2xl mx-auto font-mono gap-2">
                <span>PLAYER: RALPH JADE A. OMEGA © 2026[cite: 1, 2, 3, 4, 5, 6]</span>
                <span>SYSTEM VERSION: SOLO LEVELING UI v2.0</span>
            </div>
        </section>

    </main>

</body>
</html>
