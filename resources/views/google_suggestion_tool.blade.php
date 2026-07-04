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
                        <span class="hidden xs:inline">{{ strtoupper(app()->getLocale()) }}</span>
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

        <!-- وضعیت بارگذاری ساده -->
        <div id="loadingState" class="hidden my-10 md:my-16 flex-col items-center justify-center gap-4 md:gap-6 animate-fade-in">
            <div class="relative">
                <div class="w-12 h-12 md:w-16 md:h-16 border-4 border-primary/10 border-t-primary rounded-full animate-spin"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <i class="fa-solid fa-magnifying-glass text-primary text-sm md:text-base animate-pulse"></i>
                </div>
            </div>
            <p class="text-slate-500 font-black text-[10px] md:text-sm uppercase tracking-widest animate-pulse">{{ __('messages.loading_text') }}</p>
        </div>

        <!-- باکس مانیتورینگ فرآیند -->
        <div id="bulkProgressState" class="hidden my-6 md:my-10 glass rounded-[1.5rem] md:rounded-[2.5rem] p-5 md:p-8 shadow-soft max-w-2xl mx-auto border-2 border-primary/5 animate-fade-in">
            <div class="flex items-center justify-between mb-6 md:mb-8">
                <div class="flex items-center gap-3 md:gap-4">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-primary/10 text-primary rounded-xl md:rounded-2xl flex items-center justify-center shadow-inner">
                        <i class="fa-solid fa-gear text-lg md:text-xl animate-spin" style="animation-duration: 3s"></i>
                    </div>
                    <div>
                        <h4 class="font-black text-slate-900 text-xs md:text-sm uppercase tracking-tight">{{ __('messages.bulk_active') }}</h4>
                        <p id="currentPhaseLabel" class="text-[8px] md:text-[10px] text-secondary mt-0.5 md:mt-1 font-black uppercase tracking-widest">{{ __('messages.phase1_label') }}</p>
                    </div>
                </div>
                <button id="cancelBulkBtn" class="p-2 md:p-3 bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-500 rounded-lg md:rounded-xl transition-all border border-rose-100 flex items-center gap-2 group shadow-sm">
                    <i class="fa-solid fa-stop-circle text-base md:text-lg"></i>
                    <span class="text-[8px] md:text-[10px] font-black uppercase tracking-widest hidden group-hover:block transition-all">{{ __('messages.stop_btn') }}</span>
                </button>
            </div>

            <div class="mb-5 md:mb-6 bg-white/50 border border-slate-100 rounded-xl md:rounded-2xl p-3 md:p-4 flex items-center justify-between shadow-inner">
                <span class="text-[8px] md:text-[10px] text-slate-400 font-black uppercase tracking-widest shrink-0">{{ __('messages.current_query') }}</span>
                <span id="currentQueryText" class="text-xs md:text-sm font-black text-primary animate-pulse truncate ml-2">{{ __('messages.waiting_start') }}</span>
            </div>

            <div class="mb-2 md:mb-3 flex justify-between text-[8px] md:text-[10px] font-black text-slate-400 uppercase tracking-widest">
                <span id="progressStepTitleText">{{ __('messages.phase_progress') }}</span>
                <span id="phasePercentText" class="text-primary">0%</span>
            </div>
            <div class="w-full bg-slate-100 h-1.5 md:h-2 rounded-full overflow-hidden mb-6 md:mb-8 shadow-inner">
                <div id="progressBar" class="bg-primary h-full transition-all duration-500 shadow-[0_0_15px_rgba(13,71,161,0.5)]" style="width: 0%"></div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 md:gap-6">
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
                    <button id="downloadBtn" class="flex-grow md:flex-grow-0 px-4 md:px-6 py-3 md:py-4 bg-emerald-500 hover:bg-emerald-600 text-white text-[10px] md:text-xs font-black uppercase tracking-widest rounded-xl md:rounded-[1.2rem] transition-all flex items-center justify-center gap-2 shadow-xl shadow-emerald-900/10 border border-emerald-400/20">
                        <i class="fa-solid fa-download text-xs md:text-sm"></i>
                        <span>{{ __('messages.download_txt') }}</span>
                    </button>
                </div>
            </div>

            <!-- گریدبندی ستون‌های نتایج -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-8">
                
                <!-- لیست تفصیلی کلمات کلیدی پیشنهادی -->
                <div class="lg:col-span-8 order-2 lg:order-1">
                    <div class="glass rounded-[1.5rem] md:rounded-[2.5rem] shadow-soft overflow-hidden border border-slate-100">
                        <div class="border-b border-slate-100 px-5 md:px-8 py-4 md:py-6 bg-slate-50/50 flex justify-between items-center">
                            <span class="font-black text-slate-900 text-[9px] md:text-[10px] uppercase tracking-widest flex items-center gap-2 md:gap-3">
                                <span class="w-2 md:w-3 h-2 md:h-3 rounded-full bg-secondary shadow-[0_0_8px_rgba(0,188,212,0.5)]"></span>
                                {{ __('messages.results_title') }}
                            </span>
                            <span class="text-[8px] md:text-[9px] text-slate-400 font-bold italic">{{ __('messages.results_hint') }}</span>
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
        </div>

    </main>

    <!-- فوتر برنامه -->
    <footer class="glass border-t border-slate-200/50 py-8 md:py-10 mt-10 md:mt-16 relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-4 text-center relative z-10">
            <div class="flex items-center justify-center gap-3 md:gap-4 mb-4 md:mb-6">
                <div class="h-px bg-slate-200 flex-grow max-w-[60px] md:max-w-[100px]"></div>
                <a href="https://zarwan.co" target="_blank" class="flex items-center gap-2 text-slate-900 hover:text-primary transition-all group">
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
            layer: "{{ __('messages.layer', ['value' => 'VALUE']) }}",
            repeats: "{{ __('messages.repeats', ['value' => 'VALUE']) }}",
            copy_word: "{{ __('messages.copy_word') }}",
            search_google: "{{ __('messages.search_google') }}",
            no_results: "{{ __('messages.no_results') }}",
            no_results_desc: "{{ __('messages.no_results_desc') }}",
            richness_good: "{{ __('messages.richness_good') }}",
            richness_moderate: "{{ __('messages.richness_moderate') }}",
            copied_success: "{{ app()->getLocale() == 'en' ? 'Copied to clipboard!' : (app()->getLocale() == 'fa' ? 'در حافظه کپی شد!' : 'تم النسخ إلى الحافظة!') }}",
            stop_msg: "{{ app()->getLocale() == 'en' ? 'Operation stopped. Gathering results...' : (app()->getLocale() == 'fa' ? 'عملیات متوقف شد. در حال تجمیع نتایج...' : 'توقفت العملية. جاري جمع النتائج...') }}",
            new_discoveries_none: "{{ app()->getLocale() == 'en' ? 'No new words found in this layer.' : (app()->getLocale() == 'fa' ? 'کلمه جدیدی در این لایه یافت نشد.' : 'لم يتم العثور على كلمات جديدة في هذه الطبقة.') }}"
        };

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
            ru: ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'م', 'ن', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'],
            zh: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'w', 'x', 'y', 'z'],
            ja: ['あ', 'い', 'う', 'え', 'お', 'か', 'き', 'く', 'け', 'こ', 'さ', 'し', 'す', 'せ', 'そ', 'た', 'ち', 'つ', 'て', 'ت', 'な', 'に', 'ぬ', 'ね', 'の', 'は', 'ひ', 'ふ', 'へ', 'ほ', 'ま', 'mi', 'む', 'め', 'も', 'や', 'ゆ', 'よ', 'ら', 'り', 'る', 'れ', 'ろ', 'わ', 'を', 'ん'],
            tr: ['a', 'b', 'c', 'ç', 'd', 'e', 'f', 'g', 'ğ', 'h', 'ı', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'ö', 'p', 'r', 's', 'ş', 't', 'u', 'ü', 'v', 'y', 'z'],
            it: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'à', 'è', 'ì', 'ò', 'ù'],
            pt: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'á', 'é', 'í', 'ó', 'ú', 'â', 'ê', 'ô', 'ã', 'õ', 'ç'],
            hi: ['अ', 'आ', 'इ', 'ई', 'उ', 'ऊ', 'ए', 'ऐ', 'ओ', 'औ', 'क', 'خ', 'گ', 'घ', 'च', 'छ', 'ज', 'झ', 'ट', 'ठ', 'ड', 'ढ', 'त', 'थ', 'د', 'ध', 'ن', 'प', 'ف', 'ب', 'भ', 'म', 'य', 'र', 'ल', 'व', 'ش', 'ष', 'स', 'ह'],
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

        searchForm.addEventListener('submit', (e) => {
            e.preventDefault();
            startProcess();
        });

        retryBtn.addEventListener('click', startProcess);

        function fetchSingleSuggestion(query, lang, country) {
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
            const baseKeyword = keywordInput.value.trim();
            if (!baseKeyword) return;

            const searchType = document.querySelector('input[name="searchType"]:checked').value;
            const lang = langSelect.value;
            const country = countrySelect.value;

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

                try {
                    const data = await fetchSingleSuggestion(baseKeyword, lang, country);
                    loadingState.classList.add('hidden');
                    
                    const formattedNormalResults = data.map(item => ({
                        keyword: item,
                        count: 1,
                        firstLayer: 1
                    }));
                    processAndDisplayResults(baseKeyword, formattedNormalResults, lang);
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
                if (keywordRegistry.has(trimmed)) {
                    const entry = keywordRegistry.get(trimmed);
                    entry.count++;
                } else {
                    keywordRegistry.set(trimmed, { count: 1, firstLayer: layer });
                }
            }

            currentPhaseLabel.textContent = I18N.phase1_label;
            activeLayerText.textContent = I18N.layer_unit.replace('CURRENT', 1).replace('TOTAL', targetTotalLayers);
            discoveredCount.textContent = '0';
            progressBar.style.width = `0%`;
            phasePercentText.textContent = `0%`;

            cancelBulkBtn.onclick = () => {
                isBulkCancelled = true;
                showNotification(I18N.stop_msg, 'error');
            };

            const activeLetters = ALPHABETS[lang] || ALPHABETS['en'];
            let layer1Queue = [baseKeyword];
            activeLetters.forEach(letter => {
                layer1Queue.push(`${baseKeyword} ${letter}`);
                layer1Queue.push(`${letter} ${baseKeyword}`);
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
                        const suggestions = await fetchSingleSuggestion(targetQuery, lang, country);
                        suggestions.forEach(item => {
                            registerKeyword(item, 1);
                        });
                    } catch (e) {}

                    p1Processed++;
                    const percent = Math.round((p1Processed / p1Total) * 100);
                    progressBar.style.width = `${percent}%`;
                    phasePercentText.textContent = `${percent}%`;
                    progressCount.textContent = `${p1Processed} / ${p1Total}`;
                    discoveredCount.textContent = keywordRegistry.size;

                    if (requestDelay > 0) await sleep(requestDelay);
                }

                let previousLayerNewDiscoveries = Array.from(keywordRegistry.entries())
                    .filter(([_, meta]) => meta.firstLayer === 1)
                    .map(([keyword, _]) => keyword);

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
                            suggestions.forEach(item => {
                                const trimmedItem = item.trim();
                                if (trimmedItem) {
                                    if (!keywordRegistry.has(trimmedItem)) {
                                        newlyDiscoveredInThisLayer.push(trimmedItem);
                                    }
                                    registerKeyword(trimmedItem, currentLayer);
                                }
                            });
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

                let finalResultsArray = Array.from(keywordRegistry.entries()).map(([keyword, meta]) => ({
                    keyword: keyword,
                    count: meta.count,
                    firstLayer: meta.firstLayer
                }));

                finalResultsArray.sort((a, b) => {
                    if (b.count !== a.count) return b.count - a.count;
                    if (a.firstLayer !== b.firstLayer) return a.firstLayer - b.firstLayer;
                    return a.keyword.localeCompare(b.keyword, lang === 'en' ? 'en' : 'fa');
                });

                bulkProgressState.classList.add('hidden');
                processAndDisplayResults(baseKeyword, finalResultsArray, lang);
            } catch (err) {
                bulkProgressState.classList.add('hidden');
                errorState.classList.remove('hidden');
            } finally {
                setButtonLoading(false);
            }
        }

        function processAndDisplayResults(baseKeyword, results, activeLang) {
            currentSuggestions = results.map(item => item.keyword);
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

            suggestionsList.innerHTML = '';
            results.forEach((item, index) => {
                const li = document.createElement('li');
                li.className = "flex items-center justify-between p-4 md:p-5 hover:bg-primary/[0.02] transition-all group animate-fade-in";
                
                const badgeLayer = `<span class="bg-primary/5 text-primary text-[8px] md:text-[9px] px-2 md:px-3 py-1 rounded-full font-black uppercase tracking-tighter whitespace-nowrap">${I18N.layer.replace('VALUE', item.firstLayer)}</span>`;
                const badgeCount = item.count > 1 
                    ? `<span class="bg-amber-500 text-white text-[8px] md:text-[9px] px-2 md:px-3 py-1 rounded-full font-black border border-amber-400 flex items-center gap-1.5 md:gap-2 shrink-0 shadow-lg shadow-amber-900/10 whitespace-nowrap">
                        <i class="fa-solid fa-fire animate-pulse text-[10px] md:text-xs"></i>
                        ${I18N.repeats.replace('VALUE', item.count)}
                       </span>` 
                    : '';

                li.innerHTML = `
                    <div class="flex items-center gap-3 md:gap-5 min-w-0 flex-grow cursor-pointer" onclick="openSearchDirectly('${encodeURIComponent(item.keyword)}')">
                        <span class="text-[10px] md:text-xs font-black text-slate-300 bg-slate-50 group-hover:bg-primary group-hover:text-white rounded-[0.6rem] md:rounded-[0.8rem] w-7 h-7 md:w-8 md:h-8 flex items-center justify-center transition-all shrink-0 shadow-inner">
                            ${index + 1}
                        </span>
                        <div class="flex flex-col min-w-0">
                            <div class="flex items-center gap-2 md:gap-3">
                                <span class="text-sm md:text-sm font-bold text-slate-700 group-hover:text-primary transition-colors line-clamp-2 tracking-tight">
                                    ${item.keyword}
                                </span>
                                <div class="flex items-center gap-1.5 md:gap-2">
                                    ${badgeCount}
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

            calculateSeoAnalytics();
            resultsWrapper.classList.remove('hidden');
            showNotification(I18N.results_found.replace('COUNT', currentSuggestions.length), 'success');
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
