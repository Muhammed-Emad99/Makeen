@php use App\Helpers\SiteSetting; @endphp
<footer class="footer" style="background-image: url(images/bg-footer.png);">
    <div class="main-container">
        <div class="row">
            <div class="col-lg-5">
                <div class="sub-footer">
                    <div class="logo-footer">
                        <a href="{{ route('site.home') }}">
                            <img src="{{ asset('site/images/logo-f.png') }}" alt="">
                        </a>
                    </div>
                    <p>{!! SiteSetting::getSetting('description',app()->getLocale())->value !!} </p>
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
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="element-footer">
                    <h2>روابط مهمة</h2>
                    <ul>
                        <li>
                            <a href="#scroll-1" class="scroll-1">نبذة عنا</a>
                        </li>
                        <li>
                            <a href="#scroll-4" class="scroll-1">تدرب معنا</a>
                        </li>
                        <li>
                            <a href="#scroll-2" class="scroll-1">خدماتنا</a>
                        </li>
                        <li>
                            <a href="#scroll-3" class="scroll-1">مانقدمه</a>
                        </li>

                        <li>
                            <a href="#scroll-5" class="scroll-1">الشركاء الاستراتيجيون</a>
                        </li>
                        <li>
                            <a href="#scroll-6" class="scroll-1">تواصل معنا</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="element-footer">
                    <h2>موقعنا</h2>

                    <div id="map" class="maps" style="position: relative; overflow: hidden;"
                         data-address="{{ SiteSetting::getSetting('address')->value }}"></div>

                    <input type="hidden" name="lat" value="{{ SiteSetting::getSetting('lat')->value }}">
                    <input type="hidden" name="lng" value="{{ SiteSetting::getSetting('lng')->value }}">
                </div>
            </div>
        </div>

        <div class="end-page">
            <p>كل الحقوق محفوظة 2023 &copy; {{ SiteSetting::getSetting('copy_right',app()->getLocale())->value }}</p>
            <a href="https://jaadara.com/"> صنع بكل حب <i class="bi bi-heart-fill"></i> في معامل جدارة </a>
        </div>
    </div>
</footer>


@push('js')
    <script>
        window.language = "{{ app()->getLocale() }}";
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdarVlRZOccFIGWJiJ2cFY8-Sr26ibiyY&libraries=places&callback=initAutocomplete&language={{ app()->getLocale() }}"
        async defer></script>
    <script src="{{ asset('site/js/map.js') }}"></script>
@endpush

