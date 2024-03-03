@php use App\Helpers\SiteSetting; @endphp
<div class="main-container">
    <div class="top-par">
        <div class="logo">
            <a href="{{ route('site.home') }}"><img src="{{ asset('site/images/logo.png') }}" alt=""></a>
        </div>
        <!-- start-element -->
        <div class="element">
            <div class="logo-menu">
                <img src="{{ asset('site/images/logo.png') }}" alt="">
            </div>
            <ul>
                <li>
                    <a href="#scroll-0" class="scroll-1">الرئيسية</a>
                </li>
                <li>
                    <a href="#scroll-1" class="scroll-1">نبذة عنا</a>
                </li>

                <li>
                    <a href="#scroll-2" class="scroll-1">مايميزنا</a>
                </li>
                <li>
                    <a href="#scroll-3" class="scroll-1">مانقدمه</a>
                </li>
                <li>
                    <a href="#scroll-4" class="scroll-1">تدرب معنا</a>
                </li>
                <li>
                    <a href="#scroll-5" class="scroll-1">الشركاء</a>
                </li>
                <li>
                    <a href="#scroll-6" class="scroll-1">تواصل معنا</a>
                </li>
            </ul>
            <div class="sco-mediai">
                <ul>
                    <li>
                        <a href="">En</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sco-media">
            <ul>
                <li><a href="{{SiteSetting::getSetting('twitter')->value}}"><i
                            class="bi bi-twitter-x"></i></a></li>
                <li><a href="{{SiteSetting::getSetting('instagram')->value}}"><i
                            class="bi bi-instagram"></i></a></li>
                <li><a href="{{SiteSetting::getSetting('facebook')->value}}"><i
                            class="bi bi-facebook"></i></a></li>
                <li><a href="{{SiteSetting::getSetting('snapchat')->value}}"><i
                            class="bi bi-snapchat"></i></a></li>

                <li>
                    <a href="{{ app()->getLocale() == 'en'? route('site.lang','ar') : route('site.lang','en') }}">{{ app()->getLocale() == 'en' ? 'AR' : 'EN'}}</a>

                </li>

            </ul>
        </div>

        <div class="bg-div-mune"></div>
        <div class="menu">
            <div class="hambergerIcon">
            </div>
        </div>

    </div>
</div>
