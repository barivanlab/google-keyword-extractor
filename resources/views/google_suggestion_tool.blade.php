<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.title') }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    screens: {
                        'xs': '400px',
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;700;900&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #0D47A1;
            --secondary: #00BCD4;
            --white: #F8FAFC;
        }
        body {
            font-family: 'Vazirmatn', 'Inter', sans-serif;
            background-color: var(--white);
            background-image: radial-gradient(circle at 10% 20%, rgba(13, 71, 161, 0.05) 0%, transparent 40%),
                              radial-gradient(circle at 90% 80%, rgba(0, 188, 212, 0.05) 0%, transparent 40%);
        }
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .glass-dark {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        /* Smooth animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
        /* Extraction pipeline animation */
        @keyframes orbitSpin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        @keyframes orbitSpinReverse {
            from { transform: rotate(360deg); }
            to { transform: rotate(0deg); }
        }
        @keyframes flowDash {
            to { stroke-dashoffset: -28; }
        }
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(13,71,161,0.25), 0 0 24px rgba(0,188,212,0.25); }
            50% { box-shadow: 0 0 0 10px rgba(13,71,161,0), 0 0 42px rgba(0,188,212,0.45); }
        }
        @keyframes shimmerSlide {
            from { transform: translateX(-100%); }
            to { transform: translateX(250%); }
        }
        @keyframes logIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes popIn {
            0% { opacity: 0; transform: scale(0.6); }
            70% { opacity: 1; transform: scale(1.08); }
            100% { opacity: 1; transform: scale(1); }
        }
        .extract-orbit { animation: orbitSpin 7s linear infinite; }
        .extract-orbit-rev { animation: orbitSpinReverse 11s linear infinite; }
        .extract-flow { stroke-dasharray: 6 8; animation: flowDash 1.1s linear infinite; }
        .extract-core { animation: pulseGlow 2.2s ease-in-out infinite; }
        .extract-shimmer::after {
            content: '';
            position: absolute;
            top: 0; bottom: 0;
            width: 40%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.55), transparent);
            animation: shimmerSlide 1.6s ease-in-out infinite;
        }
        .extract-log-item { animation: logIn 0.35s ease-out forwards; }
        .extract-pop { animation: popIn 0.4s ease-out forwards; }
        .stage-dot { transition: all 0.4s ease; }
        .stage-active .stage-dot {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(13,71,161,0.12), 0 0 16px rgba(13,71,161,0.35);
        }
        .stage-done .stage-dot {
            background: #10b981;
            color: #fff;
            border-color: #10b981;
        }
        .stage-active .stage-label { color: #0f172a; }
        .stage-done .stage-label { color: #059669; }
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        .text-primary { color: var(--primary); }
        .bg-primary { background-color: var(--primary); }
        .border-primary { border-color: var(--primary); }
        .text-secondary { color: var(--secondary); }
        .bg-secondary { background-color: var(--secondary); }
        .border-secondary { border-color: var(--secondary); }
        
        .shadow-soft {
            box-shadow: 0 10px 30px -10px rgba(13, 71, 161, 0.1);
        }
        
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            background: var(--primary);
            cursor: pointer;
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between text-slate-800">

    <!-- هدر برنامه -->
    <header class="glass sticky top-0 z-50 border-b border-slate-200/50 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 py-2 md:py-3 flex items-center justify-between gap-4">
            <div class="flex items-center gap-2 md:gap-3">
                <div class="bg-primary text-white p-1.5 md:p-2 rounded-xl md:rounded-2xl shadow-lg shadow-blue-900/20 transform transition-transform hover:scale-105">
                    <i class="fa-solid fa-bolt-lightning text-lg md:text-xl"></i>
                </div>
                <div>
                    <h1 class="text-base md:text-xl font-black text-slate-900 tracking-tight">{{ __('messages.title') }}</h1>
                </div>
            </div>
            
            <div class="flex items-center gap-2 md:gap-3">
                <!-- منوی تغییر زبان -->
                <div class="relative group">
                    <button class="flex items-center gap-2 px-2 md:px-3 py-1.5 md:py-2 glass border border-slate-200 rounded-xl text-[10px] md:text-xs font-bold text-slate-700 hover:border-primary transition-all shadow-sm">
                        <i class="fa-solid fa-globe text-blue-600"></i>
                        <span class="xs:inline">{{ strtoupper(app()->getLocale()) }}</span>
                        <i class="fa-solid fa-chevron-down text-[8px] md:text-[10px] opacity-50"></i>
                    </button>
                    <div class="absolute top-full {{ app()->getLocale() == 'en' ? 'right-0' : 'left-0' }} mt-2 w-32 md:w-36 glass border border-slate-200 rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50 overflow-hidden transform origin-top scale-95 group-hover:scale-100">
                        <a href="?lang=en" class="flex items-center justify-between px-3 md:px-4 py-2 md:py-3 text-[10px] md:text-xs font-bold text-slate-700 hover:bg-primary hover:text-white transition-colors {{ app()->getLocale() == 'en' ? 'bg-primary/5 text-primary' : '' }}">
                            <span>English</span>
                            @if(app()->getLocale() == 'en') <i class="fa-solid fa-check text-[10px]"></i> @endif
                        </a>
                        <a href="?lang=fa" class="flex items-center justify-between px-3 md:px-4 py-2 md:py-3 text-[10px] md:text-xs font-bold text-slate-700 hover:bg-primary hover:text-white transition-colors {{ app()->getLocale() == 'fa' ? 'bg-primary/5 text-primary' : '' }}">
                            <span>فارسی</span>
                            @if(app()->getLocale() == 'fa') <i class="fa-solid fa-check text-[10px]"></i> @endif
                        </a>
                        <a href="?lang=ar" class="flex items-center justify-between px-3 md:px-4 py-2 md:py-3 text-[10px] md:text-xs font-bold text-slate-700 hover:bg-primary hover:text-white transition-colors {{ app()->getLocale() == 'ar' ? 'bg-primary/5 text-primary' : '' }}">
                            <span>العربية</span>
                            @if(app()->getLocale() == 'ar') <i class="fa-solid fa-check text-[10px]"></i> @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- محتوای اصلی -->
    <main class="max-w-5xl w-full mx-auto px-3 md:px-4 py-6 md:py-10 flex-grow animate-fade-in">
        
        <!-- بخش جستجو و تنظیمات اصلی -->
        <div class="glass rounded-[1.5rem] md:rounded-[2.5rem] p-4 md:p-10 shadow-soft mb-6 md:mb-10 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 md:w-64 md:h-64 bg-primary/5 rounded-full blur-2xl md:blur-3xl -mr-16 -mt-16 md:-mr-32 md:-mt-32"></div>
            <div class="absolute bottom-0 left-0 w-32 h-32 md:w-64 md:h-64 bg-secondary/5 rounded-full blur-2xl md:blur-3xl -ml-16 -mb-16 md:-ml-32 md:-mb-32"></div>

            <div class="max-w-2xl mx-auto text-center mb-6 md:mb-10 relative z-10">
                <h2 class="text-xl md:text-4xl font-black text-slate-900 mb-2 md:mb-4 leading-tight">{{ __('messages.search_box_title') }}</h2>
                <p class="text-slate-500 text-xs md:text-base font-medium">{{ __('messages.search_box_desc') }}</p>
            </div>

            <!-- فرم تعاملی کادر جستجو -->
            <div class="max-w-3xl mx-auto relative z-10">
                <form id="searchForm" class="flex flex-col gap-4 md:gap-6">
                    <div class="relative flex flex-col md:flex-row gap-3 md:gap-4">
                        <div class="relative flex-grow group">
                            <span class="absolute inset-y-0 {{ app()->getLocale() == 'en' ? 'left-4 md:left-5' : 'right-4 md:right-5' }} flex items-center text-slate-400 group-focus-within:text-primary transition-colors">
                                <i class="fa-solid fa-magnifying-glass text-base md:text-lg"></i>
                            </span>
                            <input type="text" id="keywordInput" 
                                class="w-full {{ app()->getLocale() == 'en' ? 'pr-4 pl-12 md:pr-6 md:pl-14' : 'pl-4 pr-12 md:pl-6 md:pr-14' }} py-4 md:py-5 bg-white/50 border-2 border-slate-100 rounded-[1.2rem] md:rounded-[1.5rem] text-slate-900 font-bold placeholder-slate-400 focus:outline-none focus:border-primary focus:bg-white transition-all text-base md:text-lg shadow-inner"
                                placeholder="{{ __('messages.keyword_placeholder') }}" autocomplete="off" required>
                            <button type="button" id="clearBtn" class="absolute inset-y-0 {{ app()->getLocale() == 'en' ? 'right-4 md:right-5' : 'left-4 md:left-5' }} hidden items-center text-slate-400 hover:text-rose-500 transition-colors">
                                <i class="fa-solid fa-circle-xmark text-lg md:text-xl"></i>
                            </button>
                        </div>
                        <button type="submit" id="searchBtn" 
                            class="w-full md:w-auto px-8 md:px-10 py-4 md:py-5 bg-primary hover:bg-blue-800 text-white font-black rounded-[1.2rem] md:rounded-[1.5rem] shadow-xl shadow-blue-900/20 hover:shadow-2xl hover:shadow-blue-900/30 transform transition-all active:scale-95 flex items-center justify-center gap-3 whitespace-nowrap">
                            <span>{{ __('messages.start_btn') }}</span>
                            <i class="fa-solid fa-sparkles text-amber-300"></i>
                        </button>
                    </div>

                    <div class="bg-slate-50/50 rounded-[1.2rem] md:rounded-[2rem] p-4 md:p-6 border border-slate-100">
                        <label for="negativeKeywordsInput" class="block text-[9px] md:text-[10px] font-black text-slate-700 uppercase tracking-widest mb-2 md:mb-3 flex items-center gap-2">
                            <i class="fa-solid fa-ban text-rose-500"></i>
                            {{ __('messages.negative_keywords_label') }}
                        </label>
                        <input type="text" id="negativeKeywordsInput"
                            class="w-full px-4 md:px-5 py-3 md:py-4 bg-white border border-slate-200 rounded-[1.2rem] md:rounded-[1.5rem] text-xs md:text-sm font-bold focus:outline-none focus:border-rose-400 shadow-sm"
                            placeholder="{{ __('messages.negative_keywords_placeholder') }}" autocomplete="off">
                        <span class="text-[8px] md:text-[9px] text-slate-400 mt-1.5 md:mt-2 block font-medium">{{ __('messages.negative_keywords_desc') }}</span>
                    </div>

                    <!-- حالت تک / چندکلمه‌ای -->
                    <div class="bg-slate-50/50 rounded-[1.2rem] md:rounded-[2rem] p-1.5 md:p-2 border border-slate-100 flex flex-col sm:flex-row gap-1.5 md:gap-2">
                        <button type="button" onclick="setSeedMode('single')" id="seedBtnSingle" class="flex-grow flex items-center justify-center gap-2 py-3 md:py-4 px-4 md:px-6 rounded-[1rem] md:rounded-[1.5rem] font-bold text-xs md:text-sm transition-all bg-white shadow-sm border border-slate-200 text-slate-900">
                            <input type="radio" name="seedMode" value="single" checked class="hidden">
                            <i class="fa-solid fa-minus text-primary"></i>
                            {{ __('messages.single_mode') }}
                        </button>
                        <button type="button" onclick="setSeedMode('bulk')" id="seedBtnBulk" class="flex-grow flex items-center justify-center gap-2 py-3 md:py-4 px-4 md:px-6 rounded-[1rem] md:rounded-[1.5rem] font-bold text-xs md:text-sm transition-all hover:bg-white/80 text-slate-500">
                            <input type="radio" name="seedMode" value="bulk" class="hidden">
                            <i class="fa-solid fa-list-ul"></i>
                            {{ __('messages.bulk_mode') }}
                        </button>
                    </div>

                    <div id="bulkSeedsContainer" class="hidden animate-fade-in bg-slate-50/50 rounded-[1.2rem] md:rounded-[2rem] p-4 md:p-6 border border-slate-100">
                        <textarea id="bulkSeedsInput" rows="4"
                            class="w-full px-4 md:px-5 py-3 md:py-4 bg-white border border-slate-200 rounded-[1.2rem] md:rounded-[1.5rem] text-xs md:text-sm font-bold focus:outline-none focus:border-primary shadow-sm resize-y"
                            placeholder="{{ __('messages.seeds_placeholder') }}"></textarea>
                        <span class="text-[8px] md:text-[9px] text-slate-400 mt-1.5 md:mt-2 block font-medium">{{ __('messages.seeds_desc') }}</span>
                    </div>

                    <!-- افزودنی‌های هوشمند -->
                    <div class="bg-slate-50/50 rounded-[1.2rem] md:rounded-[2rem] p-4 md:p-6 border border-slate-100">
                        <label class="block text-[9px] md:text-[10px] font-black text-slate-700 uppercase tracking-widest mb-2 md:mb-3 flex items-center gap-2">
                            <i class="fa-solid fa-wand-magic-sparkles text-violet-500"></i>
                            {{ __('messages.modifiers_label') }}
                        </label>
                        <div class="flex flex-wrap gap-2 md:gap-3">
                            <label class="flex items-center gap-2 px-3 md:px-4 py-2 md:py-2.5 bg-white border border-slate-200 rounded-xl text-[10px] md:text-xs font-bold cursor-pointer hover:border-primary transition-all has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                                <input type="checkbox" class="modifier-check accent-[#0D47A1]" value="question" checked>
                                <i class="fa-solid fa-circle-question text-sky-500"></i>
                                {{ __('messages.mod_question') }}
                            </label>
                            <label class="flex items-center gap-2 px-3 md:px-4 py-2 md:py-2.5 bg-white border border-slate-200 rounded-xl text-[10px] md:text-xs font-bold cursor-pointer hover:border-primary transition-all has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                                <input type="checkbox" class="modifier-check accent-[#0D47A1]" value="commercial" checked>
                                <i class="fa-solid fa-tag text-emerald-500"></i>
                                {{ __('messages.mod_commercial') }}
                            </label>
                            <label class="flex items-center gap-2 px-3 md:px-4 py-2 md:py-2.5 bg-white border border-slate-200 rounded-xl text-[10px] md:text-xs font-bold cursor-pointer hover:border-primary transition-all has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                                <input type="checkbox" class="modifier-check accent-[#0D47A1]" value="local">
                                <i class="fa-solid fa-location-dot text-rose-500"></i>
                                {{ __('messages.mod_local') }}
                            </label>
                        </div>
                        <span class="text-[8px] md:text-[9px] text-slate-400 mt-1.5 md:mt-2 block font-medium">{{ __('messages.modifiers_desc') }}</span>
                    </div>

                    <!-- تاریخچه جستجوهای اخیر -->
                    <div id="historyBox" class="hidden bg-slate-50/50 rounded-[1.2rem] md:rounded-[2rem] p-4 md:p-6 border border-slate-100">
                        <div class="flex items-center justify-between mb-2 md:mb-3">
                            <span class="text-[9px] md:text-[10px] font-black text-slate-700 uppercase tracking-widest flex items-center gap-2">
                                <i class="fa-solid fa-clock-rotate-left text-slate-400"></i>
                                {{ __('messages.history_title') }}
                            </span>
                            <button type="button" id="clearHistoryBtn" class="text-[8px] md:text-[9px] font-black text-rose-400 hover:text-rose-600 uppercase tracking-widest transition-colors">{{ __('messages.history_clear') }}</button>
                        </div>
                        <div id="historyChips" class="flex flex-wrap gap-2"></div>
                    </div>

                    <!-- انتخاب نوع جستجو و تنظیمات پیشرفته -->
                    <div class="bg-slate-50/50 rounded-[1.2rem] md:rounded-[2rem] p-1.5 md:p-2 border border-slate-100 flex flex-col sm:flex-row gap-1.5 md:gap-2">
                        <button type="button" onclick="setSearchType('normal')" id="typeBtnNormal" class="flex-grow flex items-center justify-center gap-2 py-3 md:py-4 px-4 md:px-6 rounded-[1rem] md:rounded-[1.5rem] font-bold text-xs md:text-sm transition-all bg-white shadow-sm border border-slate-200 text-slate-900 active-type">
                            <input type="radio" name="searchType" value="normal" checked class="hidden">
                            <i class="fa-solid fa-bolt text-primary"></i>
                            {{ __('messages.standard_scan') }}
                        </button>
                        <button type="button" onclick="setSearchType('multi_layer')" id="typeBtnMulti" class="flex-grow flex items-center justify-center gap-2 py-3 md:py-4 px-4 md:px-6 rounded-[1rem] md:rounded-[1.5rem] font-bold text-xs md:text-sm transition-all hover:bg-white/80 text-slate-500">
                            <input type="radio" name="searchType" value="multi_layer" class="hidden">
                            <i class="fa-solid fa-layer-group"></i>
                            {{ __('messages.deep_scan') }}
                        </button>
                    </div>

                    <!-- تنظیم تعداد لایه‌ها -->
                    <div id="layerSelectorContainer" class="hidden animate-fade-in flex flex-col gap-4 bg-slate-50/50 p-4 md:p-6 rounded-[1.2rem] md:rounded-[2rem] border border-slate-100">
                        <div class="flex items-center justify-between">
                            <label class="text-[10px] md:text-xs font-black text-slate-700 uppercase tracking-widest">{{ __('messages.layers_count') }}</label>
                            <span id="layersCountLabel" class="bg-primary text-white px-3 md:px-4 py-1 md:py-1.5 rounded-full text-[9px] md:text-[10px] font-black shadow-lg shadow-blue-900/20">{{ __('messages.layers_unit', ['value' => 2]) }}</span>
                        </div>
                        <input type="range" id="layersCount" min="2" max="10" value="2" 
                            class="w-full h-1.5 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-primary">
                        <p class="text-[9px] md:text-[10px] text-slate-400 font-medium leading-relaxed italic"><i class="fa-solid fa-circle-info mr-1"></i> {{ __('messages.layers_desc') }}</p>
                    </div>

                    <!-- تنظیمات پیشرفته -->
                    <div id="advancedSettings" class="hidden animate-fade-in grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                        <div class="bg-slate-50/50 p-4 md:p-6 rounded-[1.2rem] md:rounded-[2rem] border border-slate-100">
                            <label for="delayInput" class="block text-[9px] md:text-[10px] font-black text-slate-700 uppercase tracking-widest mb-2 md:mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-clock text-secondary"></i>
                                {{ __('messages.delay_label') }}
                            </label>
                            <input type="number" id="delayInput" value="250" min="50" max="2000" 
                                class="w-full px-4 md:px-5 py-2.5 md:py-3 bg-white border border-slate-200 rounded-xl md:rounded-2xl text-xs md:text-sm font-bold focus:outline-none focus:border-primary shadow-sm">
                            <span class="text-[8px] md:text-[9px] text-slate-400 mt-1.5 md:mt-2 block font-medium">{{ __('messages.delay_desc') }}</span>
                        </div>
                        <div class="bg-slate-50/50 p-4 md:p-6 rounded-[1.2rem] md:rounded-[2rem] border border-slate-100">
                            <label for="maxSeedsInput" class="block text-[9px] md:text-[10px] font-black text-slate-700 uppercase tracking-widest mb-2 md:mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-bullseye text-secondary"></i>
                                {{ __('messages.max_seeds_label') }}
                            </label>
                            <input type="number" id="maxSeedsInput" value="25" min="5" 
                                class="w-full px-4 md:px-5 py-2.5 md:py-3 bg-white border border-slate-200 rounded-xl md:rounded-2xl text-xs md:text-sm font-bold focus:outline-none focus:border-primary shadow-sm">
                            <span class="text-[8px] md:text-[9px] text-slate-400 mt-1.5 md:mt-2 block font-medium">{{ __('messages.max_seeds_desc') }}</span>
                        </div>
                    </div>

                    <!-- فیلترهای بین‌المللی -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4">
                        <div class="flex flex-col gap-1.5 md:gap-2">
                            <label class="text-[9px] md:text-[10px] font-black text-slate-700 uppercase tracking-widest ml-2">{{ __('messages.lang_label') }}</label>
                            <div class="relative group">
                                <select id="langSelect" class="w-full appearance-none px-4 md:px-5 py-3 md:py-4 bg-slate-50/50 border border-slate-200 rounded-[1.2rem] md:rounded-[1.5rem] text-xs md:text-sm font-bold focus:outline-none focus:border-primary cursor-pointer shadow-sm">
                                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                                    <option value="fa" {{ app()->getLocale() == 'fa' ? 'selected' : '' }}>Persian (فارسی)</option>
                                    <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>Arabic (عربی)</option>
                                    <option value="es">Spanish</option>
                                    <option value="de">German</option>
                                    <option value="fr">French</option>
                                    <option value="ru">Russian</option>
                                    <option value="zh">Chinese</option>
                                    <option value="ja">Japanese</option>
                                    <option value="tr">Turkish</option>
                                    <option value="it">Italian</option>
                                    <option value="pt">Portuguese</option>
                                    <option value="hi">Hindi</option>
                                    <option value="ur">Urdu</option>
                                    <option value="ku">Kurdish</option>
                                    <option value="az">Azerbaijani</option>
                                    <option value="nl">Dutch</option>
                                    <option value="sv">Swedish</option>
                                    <option value="no">Norwegian</option>
                                    <option value="da">Danish</option>
                                    <option value="fi">Finnish</option>
                                    <option value="pl">Polish</option>
                                    <option value="uk">Ukrainian</option>
                                    <option value="ko">Korean</option>
                                </select>
                                <i class="fa-solid fa-chevron-down absolute {{ app()->getLocale() == 'en' ? 'right-5' : 'left-5' }} top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-xs"></i>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-[10px] font-black text-slate-700 uppercase tracking-widest ml-2">{{ __('messages.country_label') }}</label>
                            <div class="relative group">
                                <select id="countrySelect" class="w-full appearance-none px-5 py-4 bg-slate-50/50 border border-slate-200 rounded-[1.5rem] text-sm font-bold focus:outline-none focus:border-primary cursor-pointer shadow-sm">
                                    <option value="us" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>United States (us)</option>
                                    <option value="ir" {{ app()->getLocale() == 'fa' ? 'selected' : '' }}>Iran (ir)</option>
                                    <option value="sa" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>Saudi Arabia (sa)</option>
                                    <option value="uk">United Kingdom (uk)</option>
                                    <option value="de">Germany (de)</option>
                                    <option value="fr">France (fr)</option>
                                    <option value="es">Spain (es)</option>
                                    <option value="ru">Russia (ru)</option>
                                    <option value="cn">China (cn)</option>
                                    <option value="jp">Japan (jp)</option>
                                    <option value="tr">Turkey (tr)</option>
                                    <option value="ca">Canada (ca)</option>
                                    <option value="au">Australia (au)</option>
                                    <option value="in">India (in)</option>
                                    <option value="br">Brazil (br)</option>
                                    <option value="it">Italy (it)</option>
                                    <option value="nl">Netherlands (nl)</option>
                                    <option value="ae">UAE (ae)</option>
                                    <option value="eg">Egypt (eg)</option>
                                    <option value="iq">Iraq (iq)</option>
                                    <option value="pk">Pakistan (pk)</option>
                                    <option value="az">Azerbaijan (az)</option>
                                    <option value="se">Sweden (se)</option>
                                    <option value="pl">Poland (pl)</option>
                                </select>
                                <i class="fa-solid fa-chevron-down absolute {{ app()->getLocale() == 'en' ? 'right-5' : 'left-5' }} top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-xs"></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- باکس اعلان‌های سفارشی -->
        <div id="notification" class="fixed bottom-6 md:bottom-8 {{ app()->getLocale() == 'en' ? 'right-4 md:right-8' : 'left-4 md:left-8' }} z-[100] transform translate-y-32 opacity-0 pointer-events-none transition-all duration-500 ease-in-out">
            <div class="glass-dark text-white px-5 md:px-6 py-3 md:py-4 rounded-[1.2rem] md:rounded-[1.5rem] shadow-2xl flex items-center gap-3 md:gap-4 border border-white/10 min-w-[250px] md:min-w-[280px]">
                <div id="notificationIconContainer" class="w-8 h-8 md:w-10 md:h-10 rounded-lg md:rounded-xl bg-emerald-500/20 flex items-center justify-center shrink-0">
                    <span id="notificationIcon" class="text-emerald-400 text-base md:text-lg">
                        <i class="fa-solid fa-circle-check"></i>
                    </span>
                </div>
                <p id="notificationText" class="text-[11px] md:text-sm font-bold tracking-tight"></p>
            </div>
        </div>

        <!-- وضعیت بارگذاری ساده (حالت استاندارد با انیمیشن زنده) -->
        <div id="loadingState" class="hidden my-6 md:my-10 glass rounded-[1.5rem] md:rounded-[2.5rem] p-5 md:p-8 shadow-soft max-w-2xl mx-auto border-2 border-primary/5 animate-fade-in relative overflow-hidden">
            <div class="absolute top-0 right-0 w-40 h-40 bg-primary/5 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-secondary/5 rounded-full blur-3xl -ml-20 -mb-20 pointer-events-none"></div>
            <div class="flex items-center gap-3 md:gap-4 mb-5 relative z-10">
                <div class="relative w-16 h-16 md:w-20 md:h-20 shrink-0">
                    <div class="extract-core absolute inset-2 rounded-full bg-gradient-to-br from-[#0D47A1] to-[#00BCD4] flex items-center justify-center text-white text-lg md:text-xl">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <svg class="extract-orbit absolute inset-0 w-full h-full" viewBox="0 0 100 100" fill="none">
                        <circle cx="50" cy="50" r="47" stroke="rgba(13,71,161,0.35)" stroke-width="2.5" class="extract-flow"/>
                        <circle cx="50" cy="3" r="5" fill="#0D47A1"/>
                    </svg>
                    <svg class="extract-orbit-rev absolute inset-0 w-full h-full" viewBox="0 0 100 100" fill="none">
                        <circle cx="50" cy="50" r="36" stroke="rgba(0,188,212,0.4)" stroke-width="2" stroke-dasharray="4 6"/>
                        <circle cx="86" cy="50" r="4" fill="#00BCD4"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h4 class="font-black text-slate-900 text-xs md:text-sm uppercase tracking-tight">{{ __('messages.extract_pipeline_title') }}</h4>
                    <p class="text-[8px] md:text-[10px] text-secondary mt-0.5 font-black uppercase tracking-widest animate-pulse">{{ __('messages.loading_text') }}</p>
                </div>
                <div class="ms-auto flex items-center gap-2 shrink-0">
                    <span class="text-[9px] md:text-[11px] font-black text-slate-500">{{ __('messages.discovered_keywords') }}:</span>
                    <span id="normalDiscoveredCount" class="text-sm md:text-lg font-black text-secondary extract-pop">0</span>
                </div>
            </div>
            <div class="mb-4 bg-white/60 border border-slate-100 rounded-xl md:rounded-2xl p-3 md:p-4 flex items-center justify-between shadow-inner relative z-10">
                <span class="text-[8px] md:text-[10px] text-slate-400 font-black uppercase tracking-widest shrink-0">{{ __('messages.current_query') }}</span>
                <span id="normalQueryText" class="text-xs md:text-sm font-black text-primary animate-pulse truncate ml-2">{{ __('messages.waiting_start') }}</span>
            </div>
            <div class="relative w-full bg-slate-100 h-1.5 md:h-2 rounded-full overflow-hidden mb-4 shadow-inner extract-shimmer">
                <div class="bg-gradient-to-l from-[#0D47A1] to-[#00BCD4] h-full rounded-full" style="width: 30%; animation: shimmerSlide 1.6s ease-in-out infinite;"></div>
            </div>
            <div class="flex items-center gap-2 mb-3 relative z-10">
                <span class="text-[8px] md:text-[10px] text-slate-400 font-black uppercase tracking-widest">{{ __('messages.phase_requests') }}:</span>
                <span id="normalRequestCount" class="text-xs md:text-sm font-black text-slate-900">0 / 0</span>
            </div>
            <div class="bg-slate-50/70 border border-slate-100 rounded-xl md:rounded-2xl p-3 md:p-4 relative z-10">
                <div class="flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-satellite-dish text-secondary text-xs"></i>
                    <span class="text-[8px] md:text-[10px] font-black text-slate-500 uppercase tracking-widest">{{ __('messages.extract_feed_title') }}</span>
                </div>
                <ul id="normalFeed" class="space-y-1.5 max-h-32 overflow-y-auto text-[10px] md:text-[11px] font-bold text-slate-600"></ul>
            </div>
        </div>

        <!-- باکس مانیتورینگ فرآیند (حالت عمیق با پایپ‌لاین مرحله‌ای) -->
        <div id="bulkProgressState" class="hidden my-6 md:my-10 glass rounded-[1.5rem] md:rounded-[2.5rem] p-5 md:p-8 shadow-soft max-w-2xl mx-auto border-2 border-primary/5 animate-fade-in relative overflow-hidden">
            <div class="absolute top-0 right-0 w-48 h-48 bg-primary/5 rounded-full blur-3xl -mr-24 -mt-24 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-secondary/5 rounded-full blur-3xl -ml-24 -mb-24 pointer-events-none"></div>
            <div class="flex items-center justify-between mb-5 md:mb-6 relative z-10">
                <div class="flex items-center gap-3 md:gap-4">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-primary/10 text-primary rounded-xl md:rounded-2xl flex items-center justify-center shadow-inner">
                        <i class="fa-solid fa-gear text-lg md:text-xl animate-spin" style="animation-duration: 3s"></i>
                    </div>
                    <div>
                        <h4 class="font-black text-slate-900 text-xs md:text-sm uppercase tracking-tight">{{ __('messages.bulk_active') }} · {{ __('messages.extract_pipeline_title') }}</h4>
                        <p id="currentPhaseLabel" class="text-[8px] md:text-[10px] text-secondary mt-0.5 md:mt-1 font-black uppercase tracking-widest">{{ __('messages.phase1_label') }}</p>
                    </div>
                </div>
                <button id="cancelBulkBtn" class="p-2 md:p-3 bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-500 rounded-lg md:rounded-xl transition-all border border-rose-100 flex items-center gap-2 group shadow-sm">
                    <i class="fa-solid fa-stop-circle text-base md:text-lg"></i>
                    <span class="text-[8px] md:text-[10px] font-black uppercase tracking-widest hidden group-hover:block transition-all">{{ __('messages.stop_btn') }}</span>
                </button>
            </div>

            <!-- پایپ‌لاین بصری: اوربیت + مراحل -->
            <div class="grid grid-cols-1 sm:grid-cols-[auto_1fr] gap-4 md:gap-6 items-center mb-5 md:mb-6 bg-white/50 border border-slate-100 rounded-2xl p-4 md:p-5 shadow-inner relative z-10">
                <div class="relative w-28 h-28 md:w-36 md:h-36 mx-auto shrink-0">
                    <div class="extract-core absolute inset-3 rounded-full bg-gradient-to-br from-[#0D47A1] via-[#1565C0] to-[#00BCD4] flex items-center justify-center text-white text-xl md:text-2xl">
                        <i class="fa-solid fa-bolt-lightning"></i>
                    </div>
                    <svg class="extract-orbit absolute inset-0 w-full h-full" viewBox="0 0 100 100" fill="none">
                        <circle cx="50" cy="50" r="47" stroke="rgba(13,71,161,0.35)" stroke-width="2.5" class="extract-flow"/>
                        <circle cx="50" cy="3" r="5.5" fill="#0D47A1"/>
                        <circle cx="50" cy="3" r="2.2" fill="#fff"/>
                    </svg>
                    <svg class="extract-orbit-rev absolute inset-0 w-full h-full" viewBox="0 0 100 100" fill="none">
                        <circle cx="50" cy="50" r="35" stroke="rgba(0,188,212,0.45)" stroke-width="2" stroke-dasharray="4 6"/>
                        <circle cx="85" cy="50" r="4.5" fill="#00BCD4"/>
                        <circle cx="85" cy="50" r="1.8" fill="#fff"/>
                    </svg>
                    <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-[8px] md:text-[9px] font-black px-2.5 py-1 rounded-full whitespace-nowrap shadow-lg">GOOGLE LIVE</div>
                </div>
                <div id="extractStages" class="flex flex-col gap-2">
                    <div class="stage-item flex items-center gap-2.5" data-stage="0">
                        <span class="stage-dot w-7 h-7 md:w-8 md:h-8 rounded-xl border-2 border-slate-200 bg-white text-slate-400 flex items-center justify-center text-[11px] md:text-xs font-black shrink-0"><i class="fa-solid fa-seedling"></i></span>
                        <span class="stage-label text-[10px] md:text-xs font-black text-slate-400">{{ __('messages.extract_stage_expand') }}</span>
                    </div>
                    <div class="stage-item flex items-center gap-2.5" data-stage="1">
                        <span class="stage-dot w-7 h-7 md:w-8 md:h-8 rounded-xl border-2 border-slate-200 bg-white text-slate-400 flex items-center justify-center text-[11px] md:text-xs font-black shrink-0"><i class="fa-solid fa-arrow-down-a-z"></i></span>
                        <span class="stage-label text-[10px] md:text-xs font-black text-slate-400">{{ __('messages.extract_stage_alphabet') }}</span>
                    </div>
                    <div class="stage-item flex items-center gap-2.5" data-stage="2">
                        <span class="stage-dot w-7 h-7 md:w-8 md:h-8 rounded-xl border-2 border-slate-200 bg-white text-slate-400 flex items-center justify-center text-[11px] md:text-xs font-black shrink-0"><i class="fa-solid fa-layer-group"></i></span>
                        <span class="stage-label text-[10px] md:text-xs font-black text-slate-400">{{ __('messages.extract_stage_deep') }}</span>
                    </div>
                    <div class="stage-item flex items-center gap-2.5" data-stage="3">
                        <span class="stage-dot w-7 h-7 md:w-8 md:h-8 rounded-xl border-2 border-slate-200 bg-white text-slate-400 flex items-center justify-center text-[11px] md:text-xs font-black shrink-0"><i class="fa-solid fa-filter"></i></span>
                        <span class="stage-label text-[10px] md:text-xs font-black text-slate-400">{{ __('messages.extract_stage_refine') }}</span>
                    </div>
                    <div class="stage-item flex items-center gap-2.5" data-stage="4">
                        <span class="stage-dot w-7 h-7 md:w-8 md:h-8 rounded-xl border-2 border-slate-200 bg-white text-slate-400 flex items-center justify-center text-[11px] md:text-xs font-black shrink-0"><i class="fa-solid fa-chart-line"></i></span>
                        <span class="stage-label text-[10px] md:text-xs font-black text-slate-400">{{ __('messages.extract_stage_output') }}</span>
                    </div>
                </div>
            </div>

            <div class="mb-3 bg-white/50 border border-slate-100 rounded-xl md:rounded-2xl p-3 md:p-4 flex items-center justify-between shadow-inner relative z-10">
                <span class="text-[8px] md:text-[10px] text-slate-400 font-black uppercase tracking-widest shrink-0">{{ __('messages.current_query') }}</span>
                <span id="currentQueryText" class="text-xs md:text-sm font-black text-primary animate-pulse truncate ml-2">{{ __('messages.waiting_start') }}</span>
            </div>
            <div class="mb-5 flex items-center gap-2 bg-emerald-50/60 border border-emerald-100 rounded-xl px-3 py-2 relative z-10">
                <i class="fa-solid fa-sparkles text-emerald-500 text-[10px]"></i>
                <span id="extractLastKw" class="text-[10px] md:text-[11px] font-black text-emerald-700 truncate">{{ __('messages.waiting_start') }}</span>
            </div>

            <div class="mb-2 md:mb-3 flex justify-between text-[8px] md:text-[10px] font-black text-slate-400 uppercase tracking-widest relative z-10">
                <span id="progressStepTitleText">{{ __('messages.phase_progress') }}</span>
                <span id="phasePercentText" class="text-primary">0%</span>
            </div>
            <div class="w-full bg-slate-100 h-1.5 md:h-2 rounded-full overflow-hidden mb-6 md:mb-8 shadow-inner relative extract-shimmer">
                <div id="progressBar" class="bg-gradient-to-l from-[#0D47A1] to-[#00BCD4] h-full transition-all duration-500 shadow-[0_0_15px_rgba(13,71,161,0.5)] relative" style="width: 0%"></div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 md:gap-6 relative z-10">
                <div class="glass bg-white/30 p-3 md:p-5 rounded-[1rem] md:rounded-[1.5rem] border border-slate-100 text-center shadow-sm">
                    <span class="block text-[8px] md:text-[9px] text-slate-400 font-black uppercase tracking-widest mb-1 md:mb-2">{{ __('messages.phase_requests') }}</span>
                    <span id="progressCount" class="text-sm md:text-lg font-black text-slate-900">0 / 0</span>
                </div>
                <div class="glass bg-white/30 p-3 md:p-5 rounded-[1rem] md:rounded-[1.5rem] border border-slate-100 text-center shadow-sm">
                    <span class="block text-[8px] md:text-[9px] text-slate-400 font-black uppercase tracking-widest mb-1 md:mb-2">{{ __('messages.active_layer') }}</span>
                    <span id="activeLayerText" class="text-sm md:text-lg font-black text-slate-900">1 / 2</span>
                </div>
                <div class="col-span-2 sm:col-span-1 glass bg-white/30 p-3 md:p-5 rounded-[1rem] md:rounded-[1.5rem] border border-slate-100 text-center shadow-sm relative overflow-hidden group">
                    <div class="absolute inset-0 bg-secondary/5 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                    <span class="block text-[8px] md:text-[9px] text-slate-400 font-black uppercase tracking-widest mb-1 md:mb-2 relative z-10">{{ __('messages.discovered_keywords') }}</span>
                    <span id="discoveredCount" class="text-sm md:text-lg font-black text-secondary relative z-10 animate-bounce">0</span>
                </div>
            </div>

            <div class="mt-4 md:mt-5 bg-slate-50/70 border border-slate-100 rounded-xl md:rounded-2xl p-3 md:p-4 relative z-10">
                <div class="flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-satellite-dish text-secondary text-xs"></i>
                    <span class="text-[8px] md:text-[10px] font-black text-slate-500 uppercase tracking-widest">{{ __('messages.extract_feed_title') }}</span>
                </div>
                <ul id="extractFeed" class="space-y-1.5 max-h-36 overflow-y-auto text-[10px] md:text-[11px] font-bold text-slate-600"></ul>
            </div>
        </div>

        <!-- صفحه راهنمای اولیه کاربر -->
        <div id="introState" class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8 my-6 md:my-10 animate-fade-in">
            <div class="glass p-6 md:p-8 rounded-[1.5rem] md:rounded-[2rem] shadow-soft text-center group hover:-translate-y-2 transition-all duration-300">
                <div class="w-12 h-12 md:w-14 md:h-14 bg-primary/10 text-primary rounded-xl md:rounded-2xl flex items-center justify-center text-xl md:text-2xl mx-auto mb-4 md:mb-6 shadow-inner group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-arrows-split-up-and-left"></i>
                </div>
                <h3 class="font-black text-slate-900 mb-2 md:mb-3 text-xs md:text-sm uppercase tracking-tight">{{ __('messages.intro_title1') }}</h3>
                <p class="text-[10px] md:text-xs text-slate-500 leading-relaxed font-medium">{{ __('messages.intro_desc1') }}</p>
            </div>
            <div class="glass p-6 md:p-8 rounded-[1.5rem] md:rounded-[2rem] shadow-soft text-center group hover:-translate-y-2 transition-all duration-300">
                <div class="w-12 h-12 md:w-14 md:h-14 bg-emerald-50 text-emerald-600 rounded-xl md:rounded-2xl flex items-center justify-center text-xl md:text-2xl mx-auto mb-4 md:mb-6 shadow-inner group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h3 class="font-black text-slate-900 mb-2 md:mb-3 text-xs md:text-sm uppercase tracking-tight">{{ __('messages.intro_title2') }}</h3>
                <p class="text-[10px] md:text-xs text-slate-500 leading-relaxed font-medium">{{ __('messages.intro_desc2') }}</p>
            </div>
            <div class="glass p-6 md:p-8 rounded-[1.5rem] md:rounded-[2rem] shadow-soft text-center group hover:-translate-y-2 transition-all duration-300">
                <div class="w-12 h-12 md:w-14 md:h-14 bg-violet-50 text-violet-600 rounded-xl md:rounded-2xl flex items-center justify-center text-xl md:text-2xl mx-auto mb-4 md:mb-6 shadow-inner group-hover:bg-violet-500 group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-file-export"></i>
                </div>
                <h3 class="font-black text-slate-900 mb-2 md:mb-3 text-xs md:text-sm uppercase tracking-tight">{{ __('messages.intro_title3') }}</h3>
                <p class="text-[10px] md:text-xs text-slate-500 leading-relaxed font-medium">{{ __('messages.intro_desc3') }}</p>
            </div>
        </div>

        <!-- وضعیت نمایش خطا -->
        <div id="errorState" class="hidden glass bg-rose-50/50 border border-rose-100 p-6 md:p-8 rounded-[1.5rem] md:rounded-[2.5rem] my-6 md:my-10 animate-fade-in">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-4 md:gap-6 text-center md:text-start">
                <div class="w-14 h-14 md:w-16 md:h-16 bg-rose-500 text-white rounded-2xl md:rounded-3xl flex items-center justify-center shrink-0 shadow-lg shadow-rose-900/20">
                    <i class="fa-solid fa-triangle-exclamation text-xl md:text-2xl"></i>
                </div>
                <div>
                    <h4 class="font-black text-rose-900 text-base md:text-lg uppercase tracking-tight">{{ __('messages.error_title') }}</h4>
                    <p class="text-rose-700/70 text-xs md:text-sm mt-1 font-medium">{{ __('messages.error_desc') }}</p>
                    <button id="retryBtn" class="mt-4 px-6 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-black text-[9px] md:text-[10px] uppercase tracking-widest rounded-xl transition-all shadow-md active:scale-95">{{ __('messages.retry_btn') }}</button>
                </div>
            </div>
        </div>

        <!-- باکس اصلی نمایش نتایج نهایی -->
        <div id="resultsWrapper" class="hidden animate-fade-in">
            <!-- کارت خلاصه اطلاعات سئو -->
            <div class="glass rounded-[1.5rem] md:rounded-[2rem] p-5 md:p-8 mb-6 md:mb-8 flex flex-col md:flex-row items-center justify-between gap-5 md:gap-6 shadow-soft border-2 border-primary/5">
                <div class="flex items-center gap-4 md:gap-5 w-full md:w-auto">
                    <div class="bg-primary/10 text-primary w-12 h-12 md:w-14 md:h-14 rounded-xl md:rounded-2xl flex items-center justify-center font-black shadow-inner shrink-0">
                        <i class="fa-solid fa-list-check text-lg md:text-xl"></i>
                    </div>
                    <div class="min-w-0">
                        <span class="text-[8px] md:text-[10px] text-slate-400 block font-black uppercase tracking-widest mb-0.5 md:mb-1 truncate">{{ __('messages.main_word') }} <strong id="searchedWordText" class="text-slate-900"></strong></span>
                        <span class="text-base md:text-lg font-black text-slate-900 leading-tight block truncate"><span id="resultsCount" class="text-secondary">0</span> {{ __('messages.results_found', ['count' => '']) }}</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 md:gap-3 w-full md:w-auto">
                    <button id="copyAllBtn" class="flex-grow md:flex-grow-0 px-4 md:px-6 py-3 md:py-4 glass hover:bg-slate-50 text-slate-700 text-[10px] md:text-xs font-black uppercase tracking-widest rounded-xl md:rounded-[1.2rem] transition-all flex items-center justify-center gap-2 shadow-sm border border-slate-200">
                        <i class="fa-regular fa-copy text-xs md:text-sm"></i>
                        <span>{{ __('messages.copy_all') }}</span>
                    </button>
                    <button id="copySelectedBtn" class="flex-grow md:flex-grow-0 px-4 md:px-6 py-3 md:py-4 bg-primary hover:bg-blue-800 text-white text-[10px] md:text-xs font-black uppercase tracking-widest rounded-xl md:rounded-[1.2rem] transition-all flex items-center justify-center gap-2 shadow-xl shadow-blue-900/20">
                        <i class="fa-solid fa-check-double text-xs md:text-sm"></i>
                        <span>{{ __('messages.copy_selected') }}</span>
                    </button>
                    <button id="downloadCsvBtn" class="flex-grow md:flex-grow-0 px-4 md:px-6 py-3 md:py-4 bg-sky-500 hover:bg-sky-600 text-white text-[10px] md:text-xs font-black uppercase tracking-widest rounded-xl md:rounded-[1.2rem] transition-all flex items-center justify-center gap-2 shadow-xl shadow-sky-900/10">
                        <i class="fa-solid fa-file-csv text-xs md:text-sm"></i>
                        <span>{{ __('messages.export_csv') }}</span>
                    </button>
                    <button id="downloadBtn" class="flex-grow md:flex-grow-0 px-4 md:px-6 py-3 md:py-4 bg-emerald-500 hover:bg-emerald-600 text-white text-[10px] md:text-xs font-black uppercase tracking-widest rounded-xl md:rounded-[1.2rem] transition-all flex items-center justify-center gap-2 shadow-xl shadow-emerald-900/10 border border-emerald-400/20">
                        <i class="fa-solid fa-download text-xs md:text-sm"></i>
                        <span>{{ __('messages.download_txt') }}</span>
                    </button>
                </div>
            </div>

            <!-- تب‌های نتایج -->
            <div class="glass rounded-[1.2rem] md:rounded-[1.5rem] p-1.5 md:p-2 border border-slate-100 flex gap-1.5 md:gap-2 mb-6 md:mb-8 overflow-x-auto">
                <button type="button" onclick="setResultTab('list')" id="tabBtnList" class="tab-btn flex-grow flex items-center justify-center gap-2 py-2.5 md:py-3 px-4 rounded-xl font-bold text-[10px] md:text-xs transition-all bg-white shadow-sm border border-slate-200 text-slate-900 whitespace-nowrap">
                    <i class="fa-solid fa-list-ul text-primary"></i>
                    {{ __('messages.tab_list') }}
                    <span id="tabCountList" class="bg-primary/10 text-primary px-2 py-0.5 rounded-full text-[9px]">0</span>
                </button>
                <button type="button" onclick="setResultTab('clusters')" id="tabBtnClusters" class="tab-btn flex-grow flex items-center justify-center gap-2 py-2.5 md:py-3 px-4 rounded-xl font-bold text-[10px] md:text-xs transition-all text-slate-500 hover:bg-white/80 whitespace-nowrap">
                    <i class="fa-solid fa-object-group"></i>
                    {{ __('messages.tab_clusters') }}
                    <span id="tabCountClusters" class="bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full text-[9px]">0</span>
                </button>
                <button type="button" onclick="setResultTab('analysis')" id="tabBtnAnalysis" class="tab-btn flex-grow flex items-center justify-center gap-2 py-2.5 md:py-3 px-4 rounded-xl font-bold text-[10px] md:text-xs transition-all text-slate-500 hover:bg-white/80 whitespace-nowrap">
                    <i class="fa-solid fa-chart-line"></i>
                    {{ __('messages.tab_analysis') }}
                </button>
                <button type="button" onclick="setResultTab('brief')" id="tabBtnBrief" class="tab-btn flex-grow flex items-center justify-center gap-2 py-2.5 md:py-3 px-4 rounded-xl font-bold text-[10px] md:text-xs transition-all text-slate-500 hover:bg-white/80 whitespace-nowrap opacity-70">
                    <i class="fa-solid fa-file-lines"></i>
                    {{ __('messages.tab_brief') }}
                    <span class="bg-amber-100 text-amber-700 px-2 py-0.5 rounded-full text-[8px] md:text-[9px] font-black">{{ __('messages.brief_soon') }}</span>
                </button>
            </div>

            <!-- تب: لیست نتایج -->
            <div id="tabPaneList">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-8">

                <!-- لیست تفصیلی کلمات کلیدی پیشنهادی -->
                <div class="lg:col-span-8 order-2 lg:order-1">
                    <!-- نوار فیلتر و مرتب‌سازی -->
                    <div class="glass rounded-[1.2rem] md:rounded-[1.5rem] p-3 md:p-4 mb-4 md:mb-5 border border-slate-100 flex flex-col sm:flex-row gap-2 md:gap-3 shadow-sm">
                        <div class="relative flex-grow">
                            <span class="absolute inset-y-0 {{ app()->getLocale() == 'en' ? 'left-3' : 'right-3' }} flex items-center text-slate-400">
                                <i class="fa-solid fa-filter text-xs"></i>
                            </span>
                            <input type="text" id="resultFilterInput"
                                class="w-full {{ app()->getLocale() == 'en' ? 'pl-9 pr-3' : 'pr-9 pl-3' }} py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:border-primary"
                                placeholder="{{ __('messages.filter_placeholder') }}" autocomplete="off">
                        </div>
                        <select id="resultSortSelect" class="px-3 md:px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-[10px] md:text-xs font-bold focus:outline-none focus:border-primary cursor-pointer">
                            <option value="repeat">{{ __('messages.sort_repeat') }}</option>
                            <option value="length">{{ __('messages.sort_length') }}</option>
                            <option value="alpha">{{ __('messages.sort_alpha') }}</option>
                        </select>
                        <button type="button" id="selectAllBtn" class="px-3 md:px-4 py-2.5 glass border border-slate-200 rounded-xl text-[10px] md:text-xs font-black text-slate-600 hover:border-primary hover:text-primary transition-all whitespace-nowrap">
                            {{ __('messages.select_all') }}
                        </button>
                    </div>

                    <div class="glass rounded-[1.5rem] md:rounded-[2.5rem] shadow-soft overflow-hidden border border-slate-100">
                        <div class="border-b border-slate-100 px-5 md:px-8 py-4 md:py-6 bg-slate-50/50 flex justify-between items-center">
                            <span class="font-black text-slate-900 text-[9px] md:text-[10px] uppercase tracking-widest flex items-center gap-2 md:gap-3">
                                <span class="w-2 md:w-3 h-2 md:h-3 rounded-full bg-secondary shadow-[0_0_8px_rgba(0,188,212,0.5)]"></span>
                                {{ __('messages.results_title') }}
                            </span>
                            <span id="selectedCountLabel" class="text-[8px] md:text-[9px] text-primary font-black"></span>
                        </div>
                        <ul id="suggestionsList" class="divide-y divide-slate-100 max-h-[500px] md:max-h-[700px] overflow-y-auto">
                            <!-- به صورت پویا با جاوااسکریپت مقداردهی می‌شود -->
                        </ul>
                    </div>
                </div>

                <!-- سایدبار تحلیل آماری سئو -->
                <div class="lg:col-span-4 flex flex-col gap-6 md:gap-8 order-1 lg:order-2">
                    <!-- کارت خلاصه آماری سئو -->
                    <div class="glass rounded-[1.5rem] md:rounded-[2.5rem] p-6 md:p-8 shadow-soft border border-slate-100">
                        <h3 class="font-black text-slate-900 text-[9px] md:text-[10px] uppercase tracking-widest mb-4 md:mb-6 flex items-center gap-2 md:gap-3">
                            <i class="fa-solid fa-chart-line text-secondary text-sm md:text-base"></i>
                            {{ __('messages.seo_analysis') }}
                        </h3>
                        <div class="space-y-3 md:space-y-4 text-[10px] md:text-xs font-bold">
                            <div class="flex justify-between py-2 md:py-3 border-b border-slate-50 text-slate-500">
                                <span>{{ __('messages.short_keywords') }}</span>
                                <span id="shortKeywordsCount" class="text-slate-900">0</span>
                            </div>
                            <div class="flex justify-between py-2 md:py-3 border-b border-slate-50 text-slate-500">
                                <span>{{ __('messages.long_keywords') }}</span>
                                <span id="longKeywordsCount" class="text-emerald-600">0</span>
                            </div>
                            <div class="flex justify-between py-2 md:py-3 text-slate-500">
                                <span>{{ __('messages.topic_richness') }}</span>
                                <span id="topicRichness" class="text-primary uppercase tracking-widest">GOOD</span>
                            </div>
                        </div>
                    </div>

                    <!-- بخش سئو و ادغام سازی -->
                    <div class="glass-dark text-white rounded-[1.5rem] md:rounded-[2.5rem] p-6 md:p-8 shadow-2xl relative overflow-hidden group">
                        <div class="absolute -right-20 -top-20 w-32 h-32 md:w-48 md:h-48 bg-primary/20 rounded-full blur-3xl group-hover:scale-125 transition-transform duration-700"></div>
                        <div class="absolute -left-20 -bottom-20 w-32 h-32 md:w-48 md:h-48 bg-secondary/20 rounded-full blur-3xl group-hover:scale-125 transition-transform duration-700"></div>

                        <h3 class="font-black text-[9px] md:text-[10px] uppercase tracking-widest mb-3 md:mb-4 flex items-center gap-2 md:gap-3 text-secondary">
                            <i class="fa-solid fa-lightbulb text-amber-300 animate-pulse text-sm md:text-base"></i>
                            {{ __('messages.deep_advice') }}
                        </h3>
                        <p class="text-[10px] md:text-[11px] text-slate-300 leading-relaxed mb-4 md:mb-6 font-medium">
                            {{ __('messages.deep_advice_desc') }}
                        </p>
                        <div class="border-t border-white/10 pt-3 md:pt-4 flex items-center justify-between text-[8px] md:text-[9px] font-black text-slate-400 uppercase tracking-widest">
                            <span class="flex items-center gap-2">
                                <i class="fa-solid fa-code text-primary"></i>
                                {{ __('messages.heading_advice') }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            </div><!-- /tabPaneList -->

            <!-- تب: خوشه‌ها -->
            <div id="tabPaneClusters" class="hidden animate-fade-in">
                <div class="glass rounded-[1.5rem] md:rounded-[2rem] p-5 md:p-8 shadow-soft border border-slate-100 mb-5">
                    <h3 class="font-black text-slate-900 text-xs md:text-sm mb-1 flex items-center gap-2">
                        <i class="fa-solid fa-object-group text-violet-500"></i>
                        {{ __('messages.clusters_title') }}
                    </h3>
                    <p class="text-[10px] md:text-xs text-slate-400 font-medium">{{ __('messages.clusters_desc') }}</p>
                </div>
                <div id="clustersList" class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6"></div>
            </div>

            <!-- تب: تحلیل -->
            <div id="tabPaneAnalysis" class="hidden animate-fade-in">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div class="glass rounded-[1.5rem] md:rounded-[2rem] p-5 md:p-8 shadow-soft border border-slate-100">
                        <h3 class="font-black text-slate-900 text-xs md:text-sm mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-cloud-word text-sky-500"></i>
                            {{ __('messages.top_terms') }}
                        </h3>
                        <div id="topTermsList" class="flex flex-wrap gap-2"></div>
                    </div>
                    <div class="glass rounded-[1.5rem] md:rounded-[2rem] p-5 md:p-8 shadow-soft border border-slate-100">
                        <h3 class="font-black text-slate-900 text-xs md:text-sm mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-pie-chart text-emerald-500"></i>
                            {{ __('messages.intent_dist') }}
                        </h3>
                        <div id="intentBars" class="space-y-3"></div>
                    </div>
                    <div class="glass rounded-[1.5rem] md:rounded-[2rem] p-5 md:p-8 shadow-soft border border-slate-100 md:col-span-2">
                        <h3 class="font-black text-slate-900 text-xs md:text-sm mb-1 flex items-center gap-2">
                            <i class="fa-solid fa-circle-question text-amber-500"></i>
                            {{ __('messages.questions_title') }}
                        </h3>
                        <p class="text-[10px] md:text-xs text-slate-400 font-medium mb-4">{{ __('messages.questions_desc') }}</p>
                        <div id="questionsList" class="flex flex-wrap gap-2"></div>
                    </div>
                </div>
            </div>

            <!-- تب: بریف محتوا (در دست توسعه - غیرفعال) -->
            <div id="tabPaneBrief" class="hidden animate-fade-in">
                <div class="glass rounded-[1.5rem] md:rounded-[2.5rem] p-8 md:p-14 shadow-soft border-2 border-dashed border-slate-200 text-center max-w-2xl mx-auto">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-amber-50 text-amber-500 rounded-2xl md:rounded-3xl flex items-center justify-center text-2xl md:text-3xl mx-auto mb-5 md:mb-6 shadow-inner">
                        <i class="fa-solid fa-hammer"></i>
                    </div>
                    <span class="inline-block bg-amber-100 text-amber-700 px-3 md:px-4 py-1 md:py-1.5 rounded-full text-[9px] md:text-[10px] font-black uppercase tracking-widest mb-3 md:mb-4">{{ __('messages.brief_soon') }}</span>
                    <h3 class="font-black text-slate-900 text-base md:text-xl mb-2 md:mb-3">{{ __('messages.brief_soon_title') }}</h3>
                    <p class="text-[11px] md:text-sm text-slate-500 leading-relaxed font-medium">{{ __('messages.brief_soon_desc') }}</p>
                </div>
            </div>
        </div>

    </main>

    <!-- فوتر برنامه -->
    <footer class="glass border-t border-slate-200/50 py-8 md:py-10 mt-10 md:mt-16 relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-4 text-center relative z-10">
            <div class="flex items-center justify-center gap-3 md:gap-4 mb-4 md:mb-6">
                <div class="h-px bg-slate-200 flex-grow max-w-[60px] md:max-w-[100px]"></div>
                <a href="https://barivan.com" target="_blank" class="flex items-center gap-2 text-slate-900 hover:text-primary transition-all group">
                    <span class="text-[10px] md:text-xs font-black uppercase tracking-widest">{{ __('messages.made_by') }}</span>
                    <i class="fa-solid fa-arrow-up-right-from-square text-[8px] md:text-[10px] opacity-0 group-hover:opacity-100 transform -translate-y-1 group-hover:translate-y-0 transition-all"></i>
                </a>
                <div class="h-px bg-slate-200 flex-grow max-w-[60px] md:max-w-[100px]"></div>
            </div>
            <p class="text-slate-400 text-[8px] md:text-[9px] mt-2 md:mt-3 font-bold uppercase tracking-widest opacity-50">{{ __('messages.footer_rights') }}</p>
        </div>
    </footer>

    <!-- کدهای کنترل فرآیندها و جاوااسکریپت -->
    <script>
        const searchForm = document.getElementById('searchForm');
        const keywordInput = document.getElementById('keywordInput');
        const clearBtn = document.getElementById('clearBtn');
        const negativeKeywordsInput = document.getElementById('negativeKeywordsInput');
        const langSelect = document.getElementById('langSelect');
        const countrySelect = document.getElementById('countrySelect');
        const loadingState = document.getElementById('loadingState');
        const bulkProgressState = document.getElementById('bulkProgressState');
        const cancelBulkBtn = document.getElementById('cancelBulkBtn');
        const currentQueryText = document.getElementById('currentQueryText');
        const currentPhaseLabel = document.getElementById('currentPhaseLabel');
        const phasePercentText = document.getElementById('phasePercentText');
        const progressBar = document.getElementById('progressBar');
        const progressCount = document.getElementById('progressCount');
        const activeLayerText = document.getElementById('activeLayerText');
        const discoveredCount = document.getElementById('discoveredCount');
        const extractLastKw = document.getElementById('extractLastKw');
        const normalQueryText = document.getElementById('normalQueryText');
        const normalRequestCount = document.getElementById('normalRequestCount');
        const normalDiscoveredCount = document.getElementById('normalDiscoveredCount');
        const introState = document.getElementById('introState');
        const errorState = document.getElementById('errorState');
        const retryBtn = document.getElementById('retryBtn');
        const resultsWrapper = document.getElementById('resultsWrapper');
        const searchedWordText = document.getElementById('searchedWordText');
        const resultsCount = document.getElementById('resultsCount');
        const suggestionsList = document.getElementById('suggestionsList');
        const copyAllBtn = document.getElementById('copyAllBtn');
        const searchBtn = document.getElementById('searchBtn');
        const searchBtnText = searchBtn.querySelector('span');
        const searchBtnIcon = searchBtn.querySelector('i');
        const downloadBtn = document.getElementById('downloadBtn');
        const downloadCsvBtn = document.getElementById('downloadCsvBtn');
        const copySelectedBtn = document.getElementById('copySelectedBtn');
        const resultFilterInput = document.getElementById('resultFilterInput');
        const resultSortSelect = document.getElementById('resultSortSelect');
        const selectAllBtn = document.getElementById('selectAllBtn');
        const selectedCountLabel = document.getElementById('selectedCountLabel');
        const bulkSeedsInput = document.getElementById('bulkSeedsInput');
        const bulkSeedsContainer = document.getElementById('bulkSeedsContainer');
        const advancedSettings = document.getElementById('advancedSettings');
        const delayInput = document.getElementById('delayInput');
        const maxSeedsInput = document.getElementById('maxSeedsInput');
        
        const layerSelectorContainer = document.getElementById('layerSelectorContainer');
        const layersCount = document.getElementById('layersCount');
        const layersCountLabel = document.getElementById('layersCountLabel');

        const shortKeywordsCountEl = document.getElementById('shortKeywordsCount');
        const longKeywordsCountEl = document.getElementById('longKeywordsCount');
        const topicRichnessEl = document.getElementById('topicRichness');

        // i18n Strings for JS
        const I18N = {
            layers_unit: "{{ __('messages.layers_unit', ['value' => 'VALUE']) }}",
            start_btn: "{{ __('messages.start_btn') }}",
            loading_start: "{{ __('messages.waiting_start') }}",
            phase1_label: "{{ __('messages.phase1_label') }}",
            phase2_label: "{{ __('messages.phase2_label', ['layer' => 'LAYER']) }}",
            layer_unit: "{{ __('messages.layer_unit', ['current' => 'CURRENT', 'total' => 'TOTAL']) }}",
            results_found: "{{ __('messages.results_found', ['count' => 'COUNT']) }}",
            negative_keywords_label: "{{ __('messages.negative_keywords_label') }}",
            layer: "{{ __('messages.layer', ['value' => 'VALUE']) }}",
            repeats: "{{ __('messages.repeats', ['value' => 'VALUE']) }}",
            copy_word: "{{ __('messages.copy_word') }}",
            search_google: "{{ __('messages.search_google') }}",
            no_results: "{{ __('messages.no_results') }}",
            no_results_desc: "{{ __('messages.no_results_desc') }}",
            richness_good: "{{ __('messages.richness_good') }}",
            richness_moderate: "{{ __('messages.richness_moderate') }}",
            selected_unit: "{{ __('messages.selected_unit', ['count' => 'COUNT']) }}",
            keywords_unit: "{{ __('messages.keywords_unit', ['count' => 'COUNT']) }}",
            no_clusters: "{{ __('messages.no_clusters') }}",
            intent_transactional: "{{ __('messages.intent_transactional') }}",
            intent_commercial: "{{ __('messages.intent_commercial') }}",
            intent_informational: "{{ __('messages.intent_informational') }}",
            intent_local: "{{ __('messages.intent_local') }}",
            copied_selected: "{{ __('messages.copied_selected', ['count' => 'COUNT']) }}",
            no_selection: "{{ __('messages.no_selection') }}",
            copied_success: "{{ app()->getLocale() == 'en' ? 'Copied to clipboard!' : (app()->getLocale() == 'fa' ? 'در حافظه کپی شد!' : 'تم النسخ إلى الحافظة!') }}",
            stop_msg: "{{ app()->getLocale() == 'en' ? 'Operation stopped. Gathering results...' : (app()->getLocale() == 'fa' ? 'عملیات متوقف شد. در حال تجمیع نتایج...' : 'توقفت العملية. جاري جمع النتائج...') }}",
            new_discoveries_none: "{{ app()->getLocale() == 'en' ? 'No new words found in this layer.' : (app()->getLocale() == 'fa' ? 'کلمه جدیدی در این لایه یافت نشد.' : 'لم يتم العثور على كلمات جديدة في هذه الطبقة.') }}",
            log_scan: "{{ __('messages.extract_log_scan', ['q' => 'Q']) }}",
            log_hit: "{{ __('messages.extract_log_hit', ['n' => 'N', 'q' => 'Q']) }}",
            log_layer: "{{ __('messages.extract_log_layer', ['n' => 'N']) }}"
        };

        // ---------- Extraction theater helpers (progress animation) ----------
        function setExtractStage(idx, doneUpTo) {
            document.querySelectorAll('#extractStages .stage-item').forEach(el => {
                const i = parseInt(el.getAttribute('data-stage'), 10);
                el.classList.remove('stage-active', 'stage-done');
                const dot = el.querySelector('.stage-dot');
                if (dot && dot.dataset.orig === undefined) dot.dataset.orig = dot.innerHTML;
                if (i < idx || (doneUpTo !== undefined && i <= doneUpTo && i < idx)) {
                    el.classList.add('stage-done');
                    if (dot) dot.innerHTML = '<i class="fa-solid fa-check"></i>';
                } else if (i === idx) {
                    el.classList.add('stage-active');
                    if (dot && dot.dataset.orig) dot.innerHTML = dot.dataset.orig;
                } else {
                    if (dot && dot.dataset.orig) dot.innerHTML = dot.dataset.orig;
                }
            });
        }
        function resetExtractStages() {
            document.querySelectorAll('#extractStages .stage-item').forEach(el => {
                el.classList.remove('stage-active', 'stage-done');
                const dot = el.querySelector('.stage-dot');
                if (dot && dot.dataset.orig) dot.innerHTML = dot.dataset.orig;
            });
            const first = document.querySelector('#extractStages .stage-item[data-stage="0"]');
            if (first) first.classList.add('stage-active');
        }
        function pushExtractLog(listId, html, icon) {
            const box = document.getElementById(listId);
            if (!box) return;
            const li = document.createElement('li');
            li.className = "extract-log-item flex items-center gap-2 bg-white/80 border border-slate-100 rounded-lg px-2.5 py-1.5 shadow-sm";
            const safeIcon = icon || '<i class="fa-solid fa-circle-notch fa-spin text-primary text-[9px]"></i>';
            li.innerHTML = safeIcon + '<span class="truncate">' + html.replace(/</g, '&lt;') + '</span>';
            box.prepend(li);
            while (box.children.length > 7) box.removeChild(box.lastChild);
        }
        function clearExtractLogs() {
            ['extractFeed', 'normalFeed'].forEach(id => {
                const box = document.getElementById(id);
                if (box) box.innerHTML = '';
            });
        }

        // UI Helpers
        function setSearchType(type) {
            const normalBtn = document.getElementById('typeBtnNormal');
            const multiBtn = document.getElementById('typeBtnMulti');
            const normalRadio = normalBtn.querySelector('input');
            const multiRadio = multiBtn.querySelector('input');
            
            if (type === 'normal') {
                normalBtn.className = "flex-grow flex items-center justify-center gap-2 py-4 px-6 rounded-[1.5rem] font-bold text-sm transition-all bg-white shadow-sm border border-slate-200 text-slate-900";
                multiBtn.className = "flex-grow flex items-center justify-center gap-2 py-4 px-6 rounded-[1.5rem] font-bold text-sm transition-all hover:bg-white/80 text-slate-500";
                normalRadio.checked = true;
                layerSelectorContainer.classList.add('hidden');
                advancedSettings.classList.add('hidden');
            } else {
                multiBtn.className = "flex-grow flex items-center justify-center gap-2 py-4 px-6 rounded-[1.5rem] font-bold text-sm transition-all bg-white shadow-sm border border-slate-200 text-slate-900";
                normalBtn.className = "flex-grow flex items-center justify-center gap-2 py-4 px-6 rounded-[1.5rem] font-bold text-sm transition-all hover:bg-white/80 text-slate-500";
                multiRadio.checked = true;
                layerSelectorContainer.classList.remove('hidden');
                advancedSettings.classList.remove('hidden');
            }
        }

        const ALPHABETS = {
            fa: ['ا', 'ب', 'پ', 'ت', 'ث', 'ج', 'چ', 'ح', 'خ', 'د', 'ذ', 'ر', 'ز', 'ژ', 'س', 'ش', 'ص', 'ض', 'ط', 'ظ', 'ع', 'غ', 'ف', 'ق', 'ک', 'گ', 'ل', 'م', 'ن', 'و', 'ه', 'ی', 'آ', 'ئ', 'ء', 'ك', 'ي'],
            en: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'],
            ar: ['أ', 'ب', 'ت', 'ث', 'ج', 'ح', 'خ', 'د', 'ذ', 'ر', 'ز', 'س', 'ش', 'ص', 'ض', 'ط', 'ظ', 'ع', 'غ', 'ف', 'ق', 'ك', 'ل', 'م', 'ن', 'ه', 'و', 'ي'],
            es: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'],
            de: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'ä', 'ö', 'ü', 'ß'],
            fr: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'é', 'à', 'è', 'ù', 'ç', 'â', 'ê', 'î', 'ô', 'û'],
            ru: ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'],
            zh: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'w', 'x', 'y', 'z'],
            ja: ['あ', 'い', 'う', 'え', 'お', 'か', 'き', 'く', 'け', 'こ', 'さ', 'し', 'す', 'せ', 'そ', 'た', 'ち', 'つ', 'て', 'と', 'な', 'に', 'ぬ', 'ね', 'の', 'は', 'ひ', 'ふ', 'へ', 'ほ', 'ま', 'み', 'む', 'め', 'も', 'や', 'ゆ', 'よ', 'ら', 'り', 'る', 'れ', 'ろ', 'わ', 'を', 'ん'],
            tr: ['a', 'b', 'c', 'ç', 'd', 'e', 'f', 'g', 'ğ', 'h', 'ı', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'ö', 'p', 'r', 's', 'ş', 't', 'u', 'ü', 'v', 'y', 'z'],
            it: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'à', 'è', 'ì', 'ò', 'ù'],
            pt: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'á', 'é', 'í', 'ó', 'ú', 'â', 'ê', 'ô', 'ã', 'õ', 'ç'],
            hi: ['अ', 'आ', 'इ', 'ई', 'उ', 'ऊ', 'ए', 'ऐ', 'ओ', 'औ', 'क', 'ख', 'ग', 'घ', 'च', 'छ', 'ज', 'झ', 'ट', 'ठ', 'ड', 'ढ', 'त', 'थ', 'द', 'ध', 'न', 'प', 'फ', 'ब', 'भ', 'म', 'य', 'र', 'ल', 'व', 'श', 'ष', 'स', 'ह'],
            ur: ['ا', 'ب', 'پ', 'ت', 'ٹ', 'ث', 'ج', 'چ', 'ح', 'خ', 'د', 'ڈ', 'ذ', 'ر', 'ڑ', 'ز', 'ژ', 'س', 'ش', 'ص', 'ض', 'ط', 'ظ', 'ع', 'غ', 'ف', 'ق', 'ک', 'گ', 'ل', 'م', 'ن', 'و', 'ہ', 'ھ', 'ی', 'ے'],
            ku: ['ا', 'ب', 'پ', 'ت', 'ج', 'چ', 'ح', 'خ', 'د', 'ر', 'ڕ', 'ز', 'ژ', 'س', 'ش', 'ع', 'غ', 'ف', 'ڤ', 'ق', 'ک', 'گ', 'ل', 'ڵ', 'م', 'ن', 'و', 'ۆ', 'ه', 'ی', 'ێ'],
            az: ['a', 'b', 'c', 'ç', 'd', 'e', 'ə', 'f', 'g', 'ğ', 'h', 'x', 'ı', 'i', 'j', 'k', 'q', 'l', 'm', 'n', 'o', 'ö', 'p', 'r', 's', 'ş', 't', 'u', 'ü', 'v', 'y', 'z'],
            nl: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'],
            sv: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'å', 'ä', 'ö'],
            no: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'æ', 'ø', 'å'],
            da: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'æ', 'ø', 'å'],
            fi: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'å', 'ä', 'ö'],
            pl: ['a', 'b', 'c', 'ć', 'd', 'e', 'ę', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'ł', 'm', 'n', 'ń', 'o', 'ó', 'p', 'r', 's', 'ś', 't', 'u', 'w', 'y', 'z', 'ź', 'ż'],
            uk: ['а', 'б', 'в', 'г', 'ґ', 'д', 'е', 'є', 'ж', 'з', 'и', 'і', 'ї', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ь', 'ю', 'я'],
            ko: ['ㄱ', 'ㄴ', 'ㄷ', 'ㄹ', 'ㅁ', 'ㅂ', 'ㅅ', 'ㅇ', 'ㅈ', 'ㅊ', 'ㅋ', 'ㅌ', 'ㅍ', 'ㅎ', 'ㅏ', 'ㅑ', 'ㅓ', 'ㅕ', 'ㅗ', 'ㅛ', 'ㅜ', 'ㅠ', 'ㅡ', 'ㅣ']
        };

        let currentSuggestions = [];
        let isBulkCancelled = false;
        let translationAbortController = null;
        let fullResults = [];
        let selectedSet = new Set();
        let activeResultTab = 'list';

        // ---------- نرمالایزر فارسی (mirror of App\\Services\\KeywordNormalizer) ----------
        function normalizeKeywordClient(keyword) {
            let s = (keyword || '').trim();
            const map = { 'ي': 'ی', 'ك': 'ک', 'ٸ': 'ی', 'ؤ': 'و', 'إ': 'ا', 'أ': 'ا', 'ة': 'ه', 'ئ': 'ی', 'ء': '' };
            s = s.replace(/[يكسٸؤإأةئء]/g, ch => map[ch] ?? ch);
            s = s.replace(/[ً-ْٰ]/g, '');
            s = s.replace(/[\u200C]+/g, '\u200C');
            s = s.replace(/[\s\u200C]+/g, ' ');
            return s.trim().toLowerCase();
        }

        // ---------- Intent (mirror of App\\Services\\IntentClassifier) ----------
        const INTENT_RULES = {
            transactional: ['قیمت', 'خرید', 'فروش', 'سفارش', 'تخفیف', 'ارزان', 'دانلود', 'اجاره', 'رزرو', 'price', 'buy', 'cheap', 'discount', 'coupon', 'deal', 'order', 'download', 'for sale', 'cost', 'shop'],
            commercial: ['بهترین', 'مقایسه', 'بررسی', 'راهنما', 'راهنمای خرید', 'معایب', 'مزایا', 'کدام', 'نقد', 'مشخصات', 'best', 'vs', 'versus', 'review', 'compare', 'comparison', 'top', 'guide'],
            local: ['نزدیک من', 'نزدیکی', 'آدرس', 'تهران', 'کرج', 'مشهد', 'near me', 'nearby', 'location', 'address'],
            informational: ['چیست', 'چطور', 'چگونه', 'چرا', 'آموزش', 'طرز', 'روش', 'علت', 'معنی', 'how', 'what', 'why', 'when', 'tutorial', 'how to', 'what is']
        };

        function classifyIntentClient(keyword) {
            const n = normalizeKeywordClient(keyword);
            for (const intent of ['transactional', 'commercial', 'local', 'informational']) {
                if (INTENT_RULES[intent].some(t => n.includes(t.toLowerCase()))) return intent;
            }
            return 'informational';
        }

        const QUESTION_STARTERS = ['چی', 'چطور', 'چگونه', 'چرا', 'آیا', 'کجا', 'کی', 'کدام', 'چقدر', 'how', 'what', 'why', 'when', 'where', 'which', 'who', 'can', 'is', 'are', 'do'];

        function isQuestionClient(keyword) {
            const n = normalizeKeywordClient(keyword);
            return QUESTION_STARTERS.some(q => n.startsWith(q + ' ') || n === q || n.includes('؟') || n.includes('?'));
        }

        // ---------- Modifier packs ----------
        const MODIFIERS = {
            fa: {
                question: ['چیست', 'چگونه', 'چطور', 'چرا', 'آموزش', 'راهنما'],
                commercial: ['قیمت', 'خرید', 'بهترین', 'مقایسه', 'بررسی', 'ارزان'],
                local: ['در تهران', 'در اصفهان', 'در مشهد', 'نزدیک من']
            },
            en: {
                question: ['what is', 'how to', 'why', 'tutorial', 'guide'],
                commercial: ['price', 'buy', 'best', 'review', 'vs', 'cheap'],
                local: ['near me', 'nearby']
            },
            ar: {
                question: ['ما هو', 'كيف', 'لماذا', 'شرح'],
                commercial: ['سعر', 'شراء', 'أفضل', 'مقارنة', 'مراجعة'],
                local: ['بالقرب مني']
            }
        };

        function getModifiersForLang(lang) {
            if (MODIFIERS[lang]) return MODIFIERS[lang];
            return MODIFIERS.en;
        }

        function getSelectedModifiers(lang) {
            const packs = getModifiersForLang(lang);
            const out = [];
            document.querySelectorAll('.modifier-check:checked').forEach(box => {
                const group = box.value;
                if (packs[group]) packs[group].forEach(m => out.push(m));
            });
            return out;
        }

        function buildSeedQueries(baseKeyword, lang) {
            const queries = [baseKeyword];
            getSelectedModifiers(lang).forEach(mod => {
                queries.push(`${baseKeyword} ${mod}`);
            });
            const letters = ALPHABETS[lang] || ALPHABETS['en'];
            letters.forEach(letter => {
                queries.push(`${baseKeyword} ${letter}`);
                queries.push(`${letter} ${baseKeyword}`);
            });
            return [...new Set(queries)];
        }

        // ---------- خوشه‌بندی خودکار (n-gram مشترک) ----------
        function buildClusters(results, baseKeyword) {
            const stopwords = new Set(['در', 'به', 'از', 'و', 'با', 'برای', 'که', 'را', 'of', 'the', 'a', 'an', 'in', 'on', 'and', 'for', 'to', 'is']);
            const baseTokens = new Set(normalizeKeywordClient(baseKeyword).split(' ').filter(t => t && !stopwords.has(t)));
            const phraseCount = new Map();

            results.forEach(item => {
                const tokens = normalizeKeywordClient(item.keyword).split(' ').filter(t => t.length > 1 && !stopwords.has(t) && !baseTokens.has(t));
                for (let len = 1; len <= 2; len++) {
                    for (let i = 0; i + len <= tokens.length; i++) {
                        const phrase = tokens.slice(i, i + len).join(' ');
                        if (!phrase) continue;
                        if (!phraseCount.has(phrase)) phraseCount.set(phrase, new Set());
                        phraseCount.get(phrase).add(item.keyword);
                    }
                }
            });

            const candidates = [...phraseCount.entries()]
                .filter(([_, set]) => set.size >= 3)
                .sort((a, b) => b[1].size - a[1].size);

            const used = new Set();
            const clusters = [];
            for (const [phrase, kwSet] of candidates) {
                const fresh = [...kwSet].filter(k => !used.has(k));
                if (fresh.length < 3) continue;
                if (clusters.length >= 8) break;
                fresh.forEach(k => used.add(k));
                clusters.push({ label: phrase, keywords: fresh.slice(0, 12) });
            }
            return clusters;
        }

        function buildTopTerms(results, limit = 18) {
            const stopwords = new Set(['در', 'به', 'از', 'و', 'با', 'برای', 'که', 'را', 'of', 'the', 'a', 'an', 'in', 'on', 'and', 'for', 'to', 'is', 'are']);
            const freq = new Map();
            results.forEach(item => {
                normalizeKeywordClient(item.keyword).split(' ').forEach(t => {
                    if (t.length > 1 && !stopwords.has(t)) freq.set(t, (freq.get(t) || 0) + 1);
                });
            });
            return [...freq.entries()].sort((a, b) => b[1] - a[1]).slice(0, limit);
        }

        function getNegativeKeywords() {
            return negativeKeywordsInput.value
                .split(/[,;\n]+/)
                .map(term => term.trim().toLowerCase())
                .filter(Boolean);
        }

        function normalizeKeyword(keyword) {
            return keyword
                .trim()
                .toLowerCase()
                .replace(/\s+/g, ' ');
        }

        function isExcludedKeyword(keyword, negativeTerms) {
            if (!keyword || negativeTerms.length === 0) return false;

            const normalizedKeyword = normalizeKeyword(keyword);
            return negativeTerms.some(term => normalizedKeyword.includes(term));
        }

        layersCount.addEventListener('input', (e) => {
            layersCountLabel.textContent = I18N.layers_unit.replace('VALUE', e.target.value);
        });

        keywordInput.addEventListener('input', () => {
            if (keywordInput.value.trim().length > 0) {
                clearBtn.classList.remove('hidden');
                clearBtn.classList.add('flex');
            } else {
                clearBtn.classList.add('hidden');
                clearBtn.classList.remove('flex');
            }
        });

        clearBtn.addEventListener('click', () => {
            keywordInput.value = '';
            clearBtn.classList.add('hidden');
            clearBtn.classList.remove('flex');
            keywordInput.focus();
        });

        function setSeedMode(mode) {
            const singleBtn = document.getElementById('seedBtnSingle');
            const bulkBtn = document.getElementById('seedBtnBulk');
            const singleRadio = singleBtn.querySelector('input');
            const bulkRadio = bulkBtn.querySelector('input');
            if (mode === 'bulk') {
                bulkBtn.className = "flex-grow flex items-center justify-center gap-2 py-3 md:py-4 px-4 md:px-6 rounded-[1rem] md:rounded-[1.5rem] font-bold text-xs md:text-sm transition-all bg-white shadow-sm border border-slate-200 text-slate-900";
                singleBtn.className = "flex-grow flex items-center justify-center gap-2 py-3 md:py-4 px-4 md:px-6 rounded-[1rem] md:rounded-[1.5rem] font-bold text-xs md:text-sm transition-all hover:bg-white/80 text-slate-500";
                bulkRadio.checked = true;
                bulkSeedsContainer.classList.remove('hidden');
                keywordInput.closest('.relative.flex').style.display = 'none';
            } else {
                singleBtn.className = "flex-grow flex items-center justify-center gap-2 py-3 md:py-4 px-4 md:px-6 rounded-[1rem] md:rounded-[1.5rem] font-bold text-xs md:text-sm transition-all bg-white shadow-sm border border-slate-200 text-slate-900";
                bulkBtn.className = "flex-grow flex items-center justify-center gap-2 py-3 md:py-4 px-4 md:px-6 rounded-[1rem] md:rounded-[1.5rem] font-bold text-xs md:text-sm transition-all hover:bg-white/80 text-slate-500";
                singleRadio.checked = true;
                bulkSeedsContainer.classList.add('hidden');
                keywordInput.closest('.relative.flex').style.display = '';
            }
        }

        function getSeedList() {
            const mode = document.querySelector('input[name="seedMode"]:checked').value;
            if (mode === 'bulk') {
                return bulkSeedsInput.value.split(/\n+/).map(s => s.trim()).filter(Boolean).slice(0, 10);
            }
            const single = keywordInput.value.trim();
            return single ? [single] : [];
        }

        // ---------- تاریخچه (localStorage) ----------
        const HISTORY_KEY = 'kw_history_v1';
        function getHistory() {
            try { return JSON.parse(localStorage.getItem(HISTORY_KEY) || '[]'); } catch (e) { return []; }
        }
        function pushHistory(seeds, lang, country, count) {
            try {
                let h = getHistory();
                h.unshift({ seeds: seeds.slice(0, 3), lang, country, count, at: Date.now() });
                h = h.slice(0, 8);
                localStorage.setItem(HISTORY_KEY, JSON.stringify(h));
                renderHistory();
            } catch (e) {}
        }
        function renderHistory() {
            const box = document.getElementById('historyBox');
            const chips = document.getElementById('historyChips');
            if (!box || !chips) return;
            const h = getHistory();
            if (h.length === 0) { box.classList.add('hidden'); return; }
            box.classList.remove('hidden');
            chips.innerHTML = '';
            h.forEach(entry => {
                const b = document.createElement('button');
                b.type = 'button';
                b.className = "px-3 py-1.5 bg-white border border-slate-200 rounded-full text-[10px] md:text-[11px] font-bold text-slate-600 hover:border-primary hover:text-primary transition-all truncate max-w-[200px]";
                b.textContent = entry.seeds.join('، ') + ` (${entry.count})`;
                b.title = entry.seeds.join('\n');
                b.onclick = () => {
                    if (entry.seeds.length === 1) {
                        setSeedMode('single');
                        keywordInput.value = entry.seeds[0];
                        keywordInput.dispatchEvent(new Event('input'));
                    } else {
                        setSeedMode('bulk');
                        bulkSeedsInput.value = entry.seeds.join('\n');
                    }
                    langSelect.value = entry.lang || langSelect.value;
                    countrySelect.value = entry.country || countrySelect.value;
                    startProcess();
                };
                chips.appendChild(b);
            });
        }

        document.getElementById('clearHistoryBtn').addEventListener('click', () => {
            try { localStorage.removeItem(HISTORY_KEY); } catch (e) {}
            renderHistory();
        });

        searchForm.addEventListener('submit', (e) => {
            e.preventDefault();
            startProcess();
        });

        renderHistory();

        retryBtn.addEventListener('click', startProcess);

        async function fetchViaProxy(query, lang, country) {
            const ctrl = new AbortController();
            const timer = setTimeout(() => ctrl.abort(), 8000);
            try {
                const res = await fetch(`/api/suggest?q=${encodeURIComponent(query)}&hl=${encodeURIComponent(lang)}&gl=${encodeURIComponent(country)}`, { signal: ctrl.signal });
                if (!res.ok) return null;
                const json = await res.json();
                return Array.isArray(json.suggestions) ? json.suggestions : null;
            } catch (e) {
                return null;
            } finally {
                clearTimeout(timer);
            }
        }

        function fetchViaJsonp(query, lang, country) {
            return new Promise((resolve) => {
                const callbackName = 'googleSuggestCallback_' + Math.floor(Math.random() * 10000000);
                const url = `https://suggestqueries.google.com/complete/search?client=chrome&q=${encodeURIComponent(query)}&hl=${lang}&gl=${country}&callback=${callbackName}`;

                let timeoutTimer = setTimeout(() => {
                    cleanup();
                    resolve([]);
                }, 4000);

                window[callbackName] = function(data) {
                    cleanup();
                    if (data && data[1]) {
                        const suggestions = data[1].filter(item => {
                            return item &&
                                   typeof item === 'string' &&
                                   !item.startsWith('http://') &&
                                   !item.startsWith('https://') &&
                                   !item.includes('www.');
                        });
                        resolve(suggestions);
                    } else {
                        resolve([]);
                    }
                };

                const script = document.createElement('script');
                script.id = callbackName;
                script.src = url;
                script.onerror = function() {
                    cleanup();
                    resolve([]);
                };

                function cleanup() {
                    clearTimeout(timeoutTimer);
                    if (document.getElementById(callbackName)) {
                        document.getElementById(callbackName).remove();
                    }
                    delete window[callbackName];
                }

                document.head.appendChild(script);
            });
        }

        async function fetchSingleSuggestion(query, lang, country) {
            const viaProxy = await fetchViaProxy(query, lang, country);
            if (viaProxy !== null) return viaProxy;
            return fetchViaJsonp(query, lang, country);
        }

        const sleep = ms => new Promise(res => setTimeout(res, ms));

        function slowScrollTo(element, duration = 1000) {
            if (!element) return;
            const header = document.querySelector('header');
            const headerHeight = header ? header.offsetHeight : 0;
            const elementPosition = element.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerHeight - 40;
            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }

        function setButtonLoading(isLoading) {
            if (isLoading) {
                searchBtn.disabled = true;
                searchBtnText.textContent = I18N.loading_start;
                searchBtnIcon.className = 'fa-solid fa-spinner animate-spin';
                searchBtn.classList.add('opacity-80', 'cursor-not-allowed');
            } else {
                searchBtn.disabled = false;
                searchBtnText.textContent = I18N.start_btn;
                searchBtnIcon.className = 'fa-solid fa-sparkles text-amber-300';
                searchBtn.classList.remove('opacity-80', 'cursor-not-allowed');
            }
        }

        async function startProcess() {
            const seeds = getSeedList();
            if (seeds.length === 0) return;
            const baseKeyword = seeds[0];

            const searchType = document.querySelector('input[name="searchType"]:checked').value;
            const lang = langSelect.value;
            const country = countrySelect.value;
            const negativeTerms = getNegativeKeywords();

            setButtonLoading(true);

            if (translationAbortController) {
                translationAbortController.abort();
            }

            isBulkCancelled = false;
            introState.classList.add('hidden');
            errorState.classList.add('hidden');
            resultsWrapper.classList.add('hidden');

            if (searchType === 'normal') {
                loadingState.classList.remove('hidden');
                bulkProgressState.classList.add('hidden');
                slowScrollTo(loadingState);
                clearExtractLogs();
                if (normalQueryText) normalQueryText.textContent = I18N.loading_start;
                if (normalRequestCount) normalRequestCount.textContent = '0 / 0';
                if (normalDiscoveredCount) normalDiscoveredCount.textContent = '0';

                try {
                    const seen = new Map();
                    let nProcessed = 0;
                    let nTotal = 0;
                    seeds.forEach(seed => { nTotal += buildSeedQueries(seed, lang).length; });
                    if (normalRequestCount) normalRequestCount.textContent = `0 / ${nTotal}`;
                    for (const seed of seeds) {
                        if (normalQueryText) normalQueryText.textContent = seed;
                        const queries = buildSeedQueries(seed, lang);
                        for (const q of queries) {
                            if (normalQueryText) normalQueryText.textContent = q;
                            pushExtractLog('normalFeed', I18N.log_scan.replace('Q', q));
                            const data = await fetchSingleSuggestion(q, lang, country);
                            let fresh = 0;
                            data.forEach(item => {
                                if (isExcludedKeyword(item, negativeTerms)) return;
                                const key = normalizeKeywordClient(item);
                                if (!key) return;
                                if (seen.has(key)) {
                                    seen.get(key).count++;
                                } else {
                                    seen.set(key, { keyword: item.trim(), count: 1, firstLayer: 1 });
                                    fresh++;
                                }
                            });
                            nProcessed++;
                            if (normalRequestCount) normalRequestCount.textContent = `${nProcessed} / ${nTotal}`;
                            if (normalDiscoveredCount) {
                                normalDiscoveredCount.textContent = seen.size;
                                normalDiscoveredCount.classList.remove('extract-pop');
                                void normalDiscoveredCount.offsetWidth;
                                normalDiscoveredCount.classList.add('extract-pop');
                            }
                            if (fresh > 0) pushExtractLog('normalFeed', I18N.log_hit.replace('N', fresh).replace('Q', q), '<i class="fa-solid fa-plus text-emerald-500 text-[9px]"></i>');
                            if (isBulkCancelled) break;
                        }
                        if (isBulkCancelled) break;
                    }
                    loadingState.classList.add('hidden');

                    let formattedNormalResults = [...seen.values()]
                        .filter(item => !isExcludedKeyword(item.keyword, negativeTerms));
                    formattedNormalResults.sort((a, b) => {
                        if (b.count !== a.count) return b.count - a.count;
                        return a.keyword.localeCompare(b.keyword, lang === 'en' ? 'en' : 'fa');
                    });
                    pushHistory(seeds, lang, country, formattedNormalResults.length);
                    processAndDisplayResults(seeds.join('، '), formattedNormalResults, lang);
                } catch (err) {
                    loadingState.classList.add('hidden');
                    errorState.classList.remove('hidden');
                } finally {
                    setButtonLoading(false);
                }
                return;
            }

            loadingState.classList.add('hidden');
            bulkProgressState.classList.remove('hidden');
            slowScrollTo(bulkProgressState);
            
            const requestDelay = parseInt(delayInput.value) || 200;
            const maxSeedsPerLayer = parseInt(maxSeedsInput.value) || 25;
            const targetTotalLayers = parseInt(layersCount.value) || 2;

            let keywordRegistry = new Map();
            let visitedQueries = new Set();

            function registerKeyword(keyword, layer) {
                const trimmed = keyword.trim();
                if (!trimmed) return;
                if (isExcludedKeyword(trimmed, negativeTerms)) return;
                const key = normalizeKeywordClient(trimmed);
                if (!key) return;
                if (keywordRegistry.has(key)) {
                    const entry = keywordRegistry.get(key);
                    entry.count++;
                } else {
                    keywordRegistry.set(key, { keyword: trimmed, count: 1, firstLayer: layer });
                }
            }

            clearExtractLogs();
            resetExtractStages();
            setExtractStage(0);
            if (extractLastKw) extractLastKw.textContent = I18N.loading_start;
            currentPhaseLabel.textContent = I18N.phase1_label;
            activeLayerText.textContent = I18N.layer_unit.replace('CURRENT', 1).replace('TOTAL', targetTotalLayers);
            discoveredCount.textContent = '0';
            progressBar.style.width = `0%`;
            phasePercentText.textContent = `0%`;

            cancelBulkBtn.onclick = () => {
                isBulkCancelled = true;
                showNotification(I18N.stop_msg, 'error');
            };

            let layer1Queue = [];
            seeds.forEach(seed => {
                buildSeedQueries(seed, lang).forEach(q => {
                    if (!layer1Queue.includes(q)) layer1Queue.push(q);
                });
            });

            try {
                let p1Processed = 0;
                const p1Total = layer1Queue.length;

                for (let i = 0; i < layer1Queue.length; i++) {
                    if (isBulkCancelled) break;
                    const targetQuery = layer1Queue[i];
                    currentQueryText.textContent = targetQuery;
                    visitedQueries.add(targetQuery);

                    try {
                        if (p1Processed < 2) pushExtractLog('extractFeed', I18N.log_scan.replace('Q', targetQuery));
                        const suggestions = await fetchSingleSuggestion(targetQuery, lang, country);
                        const before = keywordRegistry.size;
                        suggestions.forEach(item => {
                            registerKeyword(item, 1);
                        });
                        const gained = keywordRegistry.size - before;
                        if (p1Processed < 2 || gained > 0) pushExtractLog('extractFeed', I18N.log_hit.replace('N', gained).replace('Q', targetQuery), gained > 0 ? '<i class="fa-solid fa-plus text-emerald-500 text-[9px]"></i>' : undefined);
                        if (gained > 0 && suggestions[0] && extractLastKw) extractLastKw.textContent = suggestions[0];
                    } catch (e) {}

                    p1Processed++;
                    const percent = Math.round((p1Processed / p1Total) * 100);
                    progressBar.style.width = `${percent}%`;
                    phasePercentText.textContent = `${percent}%`;
                    progressCount.textContent = `${p1Processed} / ${p1Total}`;
                    discoveredCount.textContent = keywordRegistry.size;
                    if (percent >= 50) setExtractStage(1);

                    if (requestDelay > 0) await sleep(requestDelay);
                }
                setExtractStage(2);

                let previousLayerNewDiscoveries = Array.from(keywordRegistry.entries())
                    .filter(([_, meta]) => meta.firstLayer === 1)
                    .map(([_, meta]) => meta.keyword);

                for (let currentLayer = 2; currentLayer <= targetTotalLayers; currentLayer++) {
                    if (isBulkCancelled) break;

                    let seedQueue = previousLayerNewDiscoveries.filter(item => !visitedQueries.has(item));
                    if (seedQueue.length > maxSeedsPerLayer) {
                        seedQueue = seedQueue.slice(0, maxSeedsPerLayer);
                    }

                    if (seedQueue.length === 0) {
                        showNotification(I18N.new_discoveries_none, 'success');
                        break;
                    }

                    pushExtractLog('extractFeed', I18N.log_layer.replace('N', currentLayer), '<i class="fa-solid fa-layer-group text-violet-500 text-[9px]"></i>');
                    setExtractStage(2);
                    currentPhaseLabel.textContent = I18N.phase2_label.replace('LAYER', currentLayer);
                    activeLayerText.textContent = I18N.layer_unit.replace('CURRENT', currentLayer).replace('TOTAL', targetTotalLayers);
                    progressBar.style.width = `0%`;
                    phasePercentText.textContent = `0%`;

                    let pCurrentProcessed = 0;
                    const pCurrentTotal = seedQueue.length;
                    progressCount.textContent = `0 / ${pCurrentTotal}`;

                    let newlyDiscoveredInThisLayer = [];

                    for (let k = 0; k < seedQueue.length; k++) {
                        if (isBulkCancelled) break;
                        const targetQuery = seedQueue[k];
                        currentQueryText.textContent = targetQuery;
                        visitedQueries.add(targetQuery);

                        try {
                            const suggestions = await fetchSingleSuggestion(targetQuery, lang, country);
                            const beforeDeep = keywordRegistry.size;
                            suggestions.forEach(item => {
                                const trimmedItem = item.trim();
                                if (trimmedItem && !isExcludedKeyword(trimmedItem, negativeTerms)) {
                                    const nkey = normalizeKeywordClient(trimmedItem);
                                    if (nkey && !keywordRegistry.has(nkey)) {
                                        newlyDiscoveredInThisLayer.push(trimmedItem);
                                    }
                                    registerKeyword(trimmedItem, currentLayer);
                                }
                            });
                            const gainedDeep = keywordRegistry.size - beforeDeep;
                            if (gainedDeep > 0) {
                                pushExtractLog('extractFeed', I18N.log_hit.replace('N', gainedDeep).replace('Q', targetQuery), '<i class="fa-solid fa-plus text-emerald-500 text-[9px]"></i>');
                                if (suggestions[0] && extractLastKw) extractLastKw.textContent = suggestions[0];
                            }
                        } catch (e) {}

                        pCurrentProcessed++;
                        const percent = Math.round((pCurrentProcessed / pCurrentTotal) * 100);
                        progressBar.style.width = `${percent}%`;
                        phasePercentText.textContent = `${percent}%`;
                        progressCount.textContent = `${pCurrentProcessed} / ${pCurrentTotal}`;
                        discoveredCount.textContent = keywordRegistry.size;

                        if (requestDelay > 0) await sleep(requestDelay);
                    }

                    previousLayerNewDiscoveries = newlyDiscoveredInThisLayer;
                }

                let finalResultsArray = Array.from(keywordRegistry.entries()).map(([_, meta]) => ({
                    keyword: meta.keyword,
                    count: meta.count,
                    firstLayer: meta.firstLayer,
                    intent: classifyIntentClient(meta.keyword)
                })).filter(item => !isExcludedKeyword(item.keyword, negativeTerms));

                finalResultsArray.sort((a, b) => {
                    if (b.count !== a.count) return b.count - a.count;
                    if (a.firstLayer !== b.firstLayer) return a.firstLayer - b.firstLayer;
                    return a.keyword.localeCompare(b.keyword, lang === 'en' ? 'en' : 'fa');
                });

                setExtractStage(3);
                await sleep(350);
                setExtractStage(4);
                await sleep(350);
                bulkProgressState.classList.add('hidden');
                pushHistory(seeds, lang, country, finalResultsArray.length);
                processAndDisplayResults(seeds.join('، '), finalResultsArray, lang);
            } catch (err) {
                bulkProgressState.classList.add('hidden');
                errorState.classList.remove('hidden');
            } finally {
                setButtonLoading(false);
            }
        }

        function setResultTab(name) {
            activeResultTab = name;
            ['list', 'clusters', 'analysis', 'brief'].forEach(t => {
                const pane = document.getElementById('tabPane' + t.charAt(0).toUpperCase() + t.slice(1));
                const btn = document.getElementById('tabBtn' + t.charAt(0).toUpperCase() + t.slice(1));
                if (!pane || !btn) return;
                if (t === name) {
                    pane.classList.remove('hidden');
                    btn.className = "tab-btn flex-grow flex items-center justify-center gap-2 py-2.5 md:py-3 px-4 rounded-xl font-bold text-[10px] md:text-xs transition-all bg-white shadow-sm border border-slate-200 text-slate-900 whitespace-nowrap";
                } else {
                    pane.classList.add('hidden');
                    btn.className = "tab-btn flex-grow flex items-center justify-center gap-2 py-2.5 md:py-3 px-4 rounded-xl font-bold text-[10px] md:text-xs transition-all text-slate-500 hover:bg-white/80 whitespace-nowrap" + (t === 'brief' ? ' opacity-70' : '');
                }
            });
            const el = document.getElementById('tabPane' + name.charAt(0).toUpperCase() + name.slice(1));
            slowScrollTo(el || resultsWrapper);
        }

        function updateSelectedLabel() {
            if (selectedCountLabel) {
                selectedCountLabel.textContent = selectedSet.size > 0
                    ? I18N.selected_unit.replace('COUNT', selectedSet.size)
                    : '';
            }
        }

        function getVisibleResults() {
            const q = (resultFilterInput?.value || '').trim().toLowerCase();
            let list = fullResults.filter(item => !q || normalizeKeywordClient(item.keyword).includes(q));
            const sort = resultSortSelect?.value || 'repeat';
            list = [...list];
            if (sort === 'length') list.sort((a, b) => b.keyword.split(/\s+/).length - a.keyword.split(/\s+/).length || b.count - a.count);
            else if (sort === 'alpha') list.sort((a, b) => a.keyword.localeCompare(b.keyword));
            else list.sort((a, b) => b.count - a.count || a.firstLayer - b.firstLayer);
            return list;
        }

        function renderResultsList() {
            const list = getVisibleResults();
            document.getElementById('tabCountList').textContent = fullResults.length;
            suggestionsList.innerHTML = '';
            if (list.length === 0) {
                suggestionsList.innerHTML = `
                    <div class="p-12 text-center text-slate-500 animate-fade-in">
                        <i class="fa-solid fa-magnifying-glass-minus text-5xl mb-6 text-slate-200"></i>
                        <p class="text-sm font-black uppercase tracking-widest">${I18N.no_results}</p>
                        <p class="text-xs text-slate-400 mt-2 font-medium">${I18N.no_results_desc}</p>
                    </div>
                `;
                return;
            }
            const intentColors = {
                transactional: 'bg-emerald-50 text-emerald-600 border border-emerald-100',
                commercial: 'bg-sky-50 text-sky-600 border border-sky-100',
                local: 'bg-rose-50 text-rose-500 border border-rose-100',
                informational: 'bg-slate-100 text-slate-500 border border-slate-200'
            };
            const intentLabels = {
                transactional: I18N.intent_transactional,
                commercial: I18N.intent_commercial,
                local: I18N.intent_local,
                informational: I18N.intent_informational
            };
            list.forEach((item, index) => {
                const intent = item.intent || classifyIntentClient(item.keyword);
                const li = document.createElement('li');
                li.className = "flex items-center justify-between p-4 md:p-5 hover:bg-primary/[0.02] transition-all group animate-fade-in";

                const badgeLayer = `<span class="bg-primary/5 text-primary text-[8px] md:text-[9px] px-2 md:px-3 py-1 rounded-full font-black uppercase tracking-tighter whitespace-nowrap">${I18N.layer.replace('VALUE', item.firstLayer)}</span>`;
                const badgeIntent = `<span class="text-[8px] md:text-[9px] px-2 md:px-3 py-1 rounded-full font-black whitespace-nowrap ${intentColors[intent]}">${intentLabels[intent]}</span>`;
                const badgeCount = item.count > 1
                    ? `<span class="bg-amber-500 text-white text-[8px] md:text-[9px] px-2 md:px-3 py-1 rounded-full font-black border border-amber-400 flex items-center gap-1.5 md:gap-2 shrink-0 shadow-lg shadow-amber-900/10 whitespace-nowrap">
                        <i class="fa-solid fa-fire animate-pulse text-[10px] md:text-xs"></i>
                        ${I18N.repeats.replace('VALUE', item.count)}
                       </span>`
                    : '';
                const checked = selectedSet.has(item.keyword) ? 'checked' : '';

                li.innerHTML = `
                    <div class="flex items-center gap-3 md:gap-4 min-w-0 flex-grow">
                        <input type="checkbox" data-kw="${item.keyword.replace(/"/g, '&quot;')}" ${checked}
                            class="row-check w-4 h-4 md:w-5 md:h-5 accent-[#0D47A1] shrink-0 cursor-pointer">
                        <span class="text-[10px] md:text-xs font-black text-slate-300 bg-slate-50 group-hover:bg-primary group-hover:text-white rounded-[0.6rem] md:rounded-[0.8rem] w-7 h-7 md:w-8 md:h-8 flex items-center justify-center transition-all shrink-0 shadow-inner">
                            ${index + 1}
                        </span>
                        <div class="flex flex-col min-w-0 cursor-pointer" onclick="openSearchDirectly('${encodeURIComponent(item.keyword)}')">
                            <div class="flex items-center gap-2 md:gap-3 flex-wrap">
                                <span class="text-sm md:text-sm font-bold text-slate-700 group-hover:text-primary transition-colors line-clamp-2 tracking-tight">
                                    ${item.keyword.replace(/</g, '&lt;')}
                                </span>
                                <div class="flex items-center gap-1.5 md:gap-2 flex-wrap">
                                    ${badgeCount}
                                    ${badgeIntent}
                                    ${badgeLayer}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 md:gap-2 shrink-0 opacity-100 lg:opacity-0 lg:group-hover:opacity-100 transition-opacity {{ app()->getLocale() == 'en' ? 'ml-2' : 'mr-2' }}">
                        <button onclick="copySingleWord('${item.keyword.replace(/'/g, "\\'")}', event)" class="p-2 md:p-3 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg md:rounded-xl transition-all" title="${I18N.copy_word}">
                            <i class="fa-regular fa-copy text-sm"></i>
                        </button>
                        <a href="https://www.google.com/search?q=${encodeURIComponent(item.keyword)}" target="_blank" onclick="event.stopPropagation();" class="p-2 md:p-3 text-slate-400 hover:text-secondary hover:bg-secondary/5 rounded-lg md:rounded-xl transition-all" title="${I18N.search_google}">
                            <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                        </a>
                    </div>
                `;
                suggestionsList.appendChild(li);
            });
            suggestionsList.querySelectorAll('.row-check').forEach(box => {
                box.addEventListener('change', (e) => {
                    const kw = e.target.getAttribute('data-kw');
                    if (e.target.checked) selectedSet.add(kw);
                    else selectedSet.delete(kw);
                    updateSelectedLabel();
                });
            });
            updateSelectedLabel();
        }

        function renderClusters() {
            const box = document.getElementById('clustersList');
            const clusters = buildClusters(fullResults, searchedWordText.textContent || '');
            document.getElementById('tabCountClusters').textContent = clusters.length;
            if (!box) return;
            box.innerHTML = '';
            if (clusters.length === 0) {
                box.innerHTML = `<div class="glass rounded-[1.5rem] p-8 text-center text-slate-400 text-xs font-bold md:col-span-2">${I18N.no_clusters}</div>`;
                return;
            }
            clusters.forEach((c, i) => {
                const div = document.createElement('div');
                div.className = "glass rounded-[1.5rem] p-5 md:p-6 shadow-soft border border-slate-100 animate-fade-in";
                const colors = ['bg-violet-500', 'bg-sky-500', 'bg-emerald-500', 'bg-amber-500', 'bg-rose-500', 'bg-indigo-500', 'bg-teal-500', 'bg-orange-500'];
                div.innerHTML = `
                    <div class="flex items-center justify-between mb-3">
                        <span class="flex items-center gap-2 font-black text-slate-900 text-xs md:text-sm">
                            <span class="w-7 h-7 ${colors[i % colors.length]} text-white rounded-lg flex items-center justify-center text-[10px]">${i + 1}</span>
                            <span class="truncate">${c.label.replace(/</g, '&lt;')}</span>
                        </span>
                        <span class="text-[9px] md:text-[10px] font-black text-slate-400 whitespace-nowrap">${I18N.keywords_unit.replace('COUNT', c.keywords.length)}</span>
                    </div>
                    <div class="flex flex-wrap gap-1.5">
                        ${c.keywords.map(k => `<button type="button" onclick="copySingleWord('${k.replace(/'/g, "\\'")}', event)" class="px-2.5 py-1.5 bg-slate-50 hover:bg-primary hover:text-white border border-slate-100 rounded-lg text-[10px] md:text-[11px] font-bold text-slate-600 transition-all text-start">${k.replace(/</g, '&lt;')}</button>`).join('')}
                    </div>`;
                box.appendChild(div);
            });
        }

        function renderAnalysis() {
            const terms = buildTopTerms(fullResults);
            const termsBox = document.getElementById('topTermsList');
            if (termsBox) {
                const max = terms.length ? terms[0][1] : 1;
                termsBox.innerHTML = terms.map(([t, c]) => {
                    const scale = 0.75 + (c / max) * 0.5;
                    return `<span class="px-3 py-1.5 bg-primary/5 border border-primary/10 rounded-full font-black text-slate-700" style="font-size:${Math.round(10 * scale)}px">${t.replace(/</g, '&lt;')} <span class="text-primary">×${c}</span></span>`;
                }).join('') || `<span class="text-xs text-slate-400 font-bold">${I18N.no_results}</span>`;
            }
            const counts = { transactional: 0, commercial: 0, informational: 0, local: 0 };
            fullResults.forEach(item => {
                const it = item.intent || classifyIntentClient(item.keyword);
                counts[it] = (counts[it] || 0) + 1;
            });
            const total = fullResults.length || 1;
            const barColors = { transactional: 'bg-emerald-500', commercial: 'bg-sky-500', informational: 'bg-slate-400', local: 'bg-rose-400' };
            const barLabels = { transactional: I18N.intent_transactional, commercial: I18N.intent_commercial, informational: I18N.intent_informational, local: I18N.intent_local };
            const barsBox = document.getElementById('intentBars');
            if (barsBox) {
                barsBox.innerHTML = Object.keys(counts).map(k => {
                    const pct = Math.round((counts[k] / total) * 100);
                    return `<div>
                        <div class="flex justify-between text-[10px] md:text-xs font-black text-slate-600 mb-1">
                            <span>${barLabels[k]}</span><span>${counts[k]} (${pct}%)</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                            <div class="${barColors[k]} h-full rounded-full transition-all duration-500" style="width:${pct}%"></div>
                        </div>
                    </div>`;
                }).join('');
            }
            const qBox = document.getElementById('questionsList');
            if (qBox) {
                const questions = fullResults.filter(item => isQuestionClient(item.keyword)).slice(0, 24);
                qBox.innerHTML = questions.map(item =>
                    `<button type="button" onclick="copySingleWord('${item.keyword.replace(/'/g, "\\'")}', event)" class="px-3 py-2 bg-amber-50 hover:bg-amber-100 border border-amber-100 rounded-xl text-[10px] md:text-[11px] font-bold text-amber-800 transition-all text-start"><i class="fa-solid fa-circle-question text-amber-400 ml-1"></i>${item.keyword.replace(/</g, '&lt;')}</button>`
                ).join('') || `<span class="text-xs text-slate-400 font-bold">${I18N.no_results}</span>`;
            }
        }

        function processAndDisplayResults(baseKeyword, results, activeLang) {
            fullResults = results.map(item => ({ ...item, intent: item.intent || classifyIntentClient(item.keyword) }));
            selectedSet = new Set();
            currentSuggestions = fullResults.map(item => item.keyword);
            searchedWordText.textContent = baseKeyword;
            resultsCount.textContent = currentSuggestions.length;

            if (currentSuggestions.length === 0) {
                suggestionsList.innerHTML = `
                    <div class="p-12 text-center text-slate-500 animate-fade-in">
                        <i class="fa-solid fa-magnifying-glass-minus text-5xl mb-6 text-slate-200"></i>
                        <p class="text-sm font-black uppercase tracking-widest">${I18N.no_results}</p>
                        <p class="text-xs text-slate-400 mt-2 font-medium">${I18N.no_results_desc}</p>
                    </div>
                `;
                resultsWrapper.classList.remove('hidden');
                return;
            }

            if (resultFilterInput) resultFilterInput.value = '';
            renderResultsList();
            renderClusters();
            renderAnalysis();
            setResultTab('list');

            calculateSeoAnalytics();
            resultsWrapper.classList.remove('hidden');
            slowScrollTo(resultsWrapper);
            showNotification(I18N.results_found.replace('COUNT', currentSuggestions.length), 'success');
        }

        if (resultFilterInput) {
            resultFilterInput.addEventListener('input', () => renderResultsList());
        }
        if (resultSortSelect) {
            resultSortSelect.addEventListener('change', () => renderResultsList());
        }
        if (selectAllBtn) {
            selectAllBtn.addEventListener('click', () => {
                const visible = getVisibleResults();
                const allSelected = visible.length > 0 && visible.every(item => selectedSet.has(item.keyword));
                if (allSelected) visible.forEach(item => selectedSet.delete(item.keyword));
                else visible.forEach(item => selectedSet.add(item.keyword));
                renderResultsList();
            });
        }

        function downloadCsv(rows, filename) {
            const header = ['keyword', 'words', 'repeat', 'layer', 'intent'];
            const esc = (v) => `"${String(v ?? '').replace(/"/g, '""')}"`;
            const lines = ['\uFEFF' + header.join(',')];
            rows.forEach(item => {
                lines.push([
                    esc(item.keyword),
                    item.keyword.split(/\s+/).length,
                    item.count || 1,
                    item.firstLayer || 1,
                    esc(item.intent || classifyIntentClient(item.keyword))
                ].join(','));
            });
            const blob = new Blob([lines.join('\r\n')], { type: 'text/csv;charset=utf-8' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            a.click();
            window.URL.revokeObjectURL(url);
        }

        if (downloadCsvBtn) {
            downloadCsvBtn.addEventListener('click', () => {
                if (fullResults.length === 0) return;
                const rows = selectedSet.size > 0
                    ? fullResults.filter(item => selectedSet.has(item.keyword))
                    : fullResults;
                downloadCsv(rows, `keywords-${Date.now()}.csv`);
            });
        }

        if (copySelectedBtn) {
            copySelectedBtn.addEventListener('click', () => {
                if (selectedSet.size === 0) {
                    showNotification(I18N.no_selection, 'error');
                    return;
                }
                const text = fullResults.filter(item => selectedSet.has(item.keyword)).map(item => item.keyword).join('\n');
                navigator.clipboard.writeText(text).then(() => {
                    showNotification(I18N.copied_selected.replace('COUNT', selectedSet.size), 'success');
                });
            });
        }

        function calculateSeoAnalytics() {
            let short = 0;
            let long = 0;
            currentSuggestions.forEach(kw => {
                const words = kw.split(/\s+/).length;
                if (words <= 2) short++;
                else long++;
            });
            shortKeywordsCountEl.textContent = short;
            longKeywordsCountEl.textContent = long;
            topicRichnessEl.textContent = long > short ? I18N.richness_good : I18N.richness_moderate;
        }

        function openSearchDirectly(encodedKw) {
            window.open(`https://www.google.com/search?q=${encodedKw}`, '_blank');
        }

        function copySingleWord(text, event) {
            if (event) event.stopPropagation();
            navigator.clipboard.writeText(text).then(() => {
                showNotification(I18N.copied_success, 'success');
            });
        }

        copyAllBtn.addEventListener('click', () => {
            if (currentSuggestions.length === 0) return;
            const text = currentSuggestions.join('\n');
            navigator.clipboard.writeText(text).then(() => {
                showNotification(I18N.copied_success, 'success');
            });
        });

        downloadBtn.addEventListener('click', () => {
            if (currentSuggestions.length === 0) return;
            const text = currentSuggestions.join('\n');
            const blob = new Blob([text], { type: 'text/plain' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `google-suggestions-${searchedWordText.textContent.replace(/\s+/g, '-')}.txt`;
            a.click();
            window.URL.revokeObjectURL(url);
        });

        function showNotification(message, type = 'success') {
            const notification = document.getElementById('notification');
            const text = document.getElementById('notificationText');
            const icon = document.getElementById('notificationIcon');
            const iconContainer = document.getElementById('notificationIconContainer');

            text.textContent = message;
            if (type === 'success') {
                icon.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
                iconContainer.className = 'w-8 h-8 md:w-10 md:h-10 rounded-lg md:rounded-xl bg-emerald-500/20 flex items-center justify-center shrink-0';
                icon.className = 'text-emerald-400 text-base md:text-lg';
            } else {
                icon.innerHTML = '<i class="fa-solid fa-circle-xmark"></i>';
                iconContainer.className = 'w-8 h-8 md:w-10 md:h-10 rounded-lg md:rounded-xl bg-rose-500/20 flex items-center justify-center shrink-0';
                icon.className = 'text-rose-400 text-base md:text-lg';
            }

            notification.classList.remove('translate-y-32', 'opacity-0', 'pointer-events-none');
            setTimeout(() => {
                notification.classList.add('translate-y-32', 'opacity-0', 'pointer-events-none');
            }, 3000);
        }
    </script>
</body>
</html>
