<!-- start items li for nav header and list mobile -->
   
        <li>
            <a href="{{ route('welcome') }}">{{ __('lang.li.Home') }}</a>
        </li>
        <li>
            <a href="{{ route('welcome') }}">{{ __('lang.li.Blog') }}</a>
                {{-- <ul class="dropdown">
                    <li><a href="">Blog List</a></li>
                    <li><a href="{{ route('welcome') }}">Single Blog</a></li>
                </ul> --}}

        </li>

        <li>
            <a href="{{ route('welcome') }}#about-section">{{ __('lang.li.About Us') }}</a>
        </li>
        {{-- <li>
            <a href="#">Portfolio</a>
            <ul class="dropdown">
                <li><a href="{{ route('welcome') }}">Portfolio</a></li>
                <li><a href="{{ route('welcome') }}">Single Portfolio</a></li>
            </ul>
        </li> --}}
        <li>
            <a href="{{ route('welcome') }}#contact-section">{{ __('lang.li.Contact') }}</a>
        </li>
        <li>
            <a href="{{ route('new.school') }}">{{ __('lang.li.Services') }}</a>
        </li>
        <li>
            <a href="{{ route('welcome') }}#login">{{ __('lang.Login') }}</a>
        </li>
<!-- end items li for nav header and list mobile -->        