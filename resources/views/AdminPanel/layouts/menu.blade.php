    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
        <!--begin::Scroll wrapper-->
        <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">{{ __('lang.dashboard') }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        @if (auth()->user()->can('View Admins'))
                          {{-- @if ( request()->routeIs('admins.index') )
                              {{ dd('done') }}
                          @endif --}}
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('admins*') ? 'tst' : ''  }}"
                                    href="{{ route('admins.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.admin') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Roles'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('role*') ? 'tst' : ''  }}"
                                    href="{{ route('role.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.role') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                        @if (auth()->user()->hasRole('superadmin'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active {{ request()->routeIs('permessions*') ? 'tst' : ''  }}"
                                        href="{{ route('permessions.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.permession') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                        @endif
                        @if (auth()->user()->can('View Countries'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('countries*') ? 'tst' : ''  }}"
                                href="{{ route('countries.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.countries') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        <!--end:Menu item-->
                        @if (auth()->user()->can('View Pages'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('pages*') ? 'tst' : ''  }}"
                                    href="{{ route('pages.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.pages') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Overview'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('overviews*') ? 'tst' : ''  }}"
                                    href="{{ route('overviews.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    {{-- <span class="menu-title">Overview</span> --}}
                                    <span class="menu-title">{{ __('lang.overview') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                                <!--end:Menu item-->
                        @if (auth()->user()->can('View Dining'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('dinings*') ? 'tst' : ''  }}"
                                    href="{{ route('dinings.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    {{-- <span class="menu-title">Overview</span> --}}
                                    <span class="menu-title">{{ __('lang.dining') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Experience'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('experiences*') ? 'tst' : ''  }}"
                                    href="{{ route('experiences.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    {{-- <span class="menu-title">Overview</span> --}}
                                    <span class="menu-title">{{ __('lang.experience') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Cabin'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('cabins*') ? 'tst' : ''  }}"
                                    href="{{ route('cabins.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    {{-- <span class="menu-title">Overview</span> --}}
                                    <span class="menu-title">{{ __('lang.cabin') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Cabinfeature'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('cabinfeatures*') ? 'tst' : ''  }}"
                                    href="{{ route('cabinfeatures.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    {{-- <span class="menu-title">Overview</span> --}}
                                    <span class="menu-title">{{ __('lang.cabinfeature') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View CabinSlider'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('cabin-sliders*') ? 'tst' : ''  }}"
                                    href="{{ route('cabin-sliders.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    {{-- <span class="menu-title">Overview</span> --}}
                                    <span class="menu-title">{{ __('lang.cabinslider') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Metas'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('metas*') ? 'tst' : ''  }}"
                                    href="{{ route('metas.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.metas') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Infos'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('infos*') ? 'tst' : ''  }}"
                                    href="{{ route('infos.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.infos') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Inspiration'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('inspirations*') ? 'tst' : ''  }}"
                                    href="{{ route('inspirations.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.inspiration') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View InspirationDetail'))
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link active {{ request()->routeIs('inspiration-details*') ? 'tst' : ''  }}"
                                href="{{ route('inspiration-details.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __('lang.inspirationdetail') }}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endif
                                <!--end:Menu item-->
                        @if (auth()->user()->can('View User'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('users*') ? 'tst' : ''  }}"
                                    href="{{ route('users.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.users') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Decks'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('decks*') ? 'tst' : ''  }}"
                                    href="{{ route('decks.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.docks') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Partner'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('partners*') ? 'tst' : ''  }}"
                                    href="{{ route('partners.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.partner') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        {{-- @if (auth()->user()->can('View TripCategory'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active" href="{{ route('trip-categories.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.tripcats') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif --}}
                        {{-- @if (auth()->user()->can('View Trips'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active" href="{{ route('trips.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.trips') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif --}}
                        {{-- @if (auth()->user()->can('View Reservation'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active" href="{{ route('reservations.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.reservations') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif --}}
                        {{-- @if (auth()->user()->can('View AdditionalTrip'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active" href="{{ route('additional-trips.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.additional-trips') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif --}}
                        @if (auth()->user()->can('View Itinerary'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('itineraries*') ? 'tst' : ''  }}"
                                    href="{{ route('itineraries.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.itineraries') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View ItineraryDetail'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('itinerary-details*') ? 'tst' : ''  }}"
                                    href="{{ route('itinerary-details.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.itinerarydetail') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Escapades'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('escapades*') ? 'tst' : ''  }}"
                                    href="{{ route('escapades.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.escapade') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View EscapadeDetails'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('escapade-details*') ? 'tst' : ''  }}"
                                    href="{{ route('escapade-details.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.escapadedeltail') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Unique'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('uniques*') ? 'tst' : ''  }}"
                                    href="{{ route('uniques.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.unique') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        {{-- @if (auth()->user()->can('View OpenDate'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active" href="{{ route('open-dates.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.opendate') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif --}}
                        @if (auth()->user()->can('View Subscriber'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('subscribers*') ? 'tst' : ''  }}"
                                    href="{{ route('subscribers.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.subscribers') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Newsletter'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('newsletters*') ? 'tst' : ''  }}"
                                    href="{{ route('newsletters.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.newsletter') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        {{-- @if (auth()->user()->can('View Coupon'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active" href="{{ route('coupons.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.coupons') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif --}}

                            @if (auth()->user()->can('View Slider'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('sliders*') ? 'tst' : ''  }}"
                                    href="{{ route('sliders.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.sliders') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            @endif

                            @if (auth()->user()->can('View Gallery'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('galleries*') ? 'tst' : ''  }}"
                                    href="{{ route('galleries.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.galleries') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            @endif
                            @if (auth()->user()->can('View Attachment'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active {{ request()->routeIs('attachments*') ? 'tst' : ''  }}"
                                        href="{{ route('attachments.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.attachments') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            @endif

                            {{-- @if (auth()->user()->can('View Page'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active" href="{{ route('pages.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.pages') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            @endif --}}
                            @if (auth()->user()->can('View Category'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active {{ request()->routeIs('categories*') ? 'tst' : ''  }}"
                                        href="{{ route('categories.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.cats') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            @endif
                            @if (auth()->user()->can('View Facilite'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active {{ request()->routeIs('facilites*') ? 'tst' : ''  }}"
                                        href="{{ route('facilites.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.facilite') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            @endif

                            {{-- @if (auth()->user()->can('View SideSeeing'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active" href="{{ route('side-seeings.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.sideseeing') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            @endif --}}
                        @if (auth()->user()->can('View Condition'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('conditions*') ? 'tst' : ''  }}"
                                    href="{{ route('conditions.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.condition') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Aboutus'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('aboutus*') ? 'tst' : ''  }}"
                                    href="{{ route('aboutus.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.aboutus') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View ContactInfo'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('contact-infos*') ? 'tst' : ''  }}"
                                    href="{{ route('contact-infos.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.contact-info') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Messages'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('contactus*') ? 'tst' : ''  }}"
                                    href="{{ route('contactus.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.contact-us') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Question'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('questions*') ? 'tst' : ''  }}"
                                    href="{{ route('questions.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.faquestion') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        @if (auth()->user()->can('View Social'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active {{ request()->routeIs('socials*') ? 'btn btn-primary' : ''  }}"
                                    href="{{ route('socials.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.socials') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Scroll wrapper-->
    </div>
    <!--end::Menu wrapper-->
