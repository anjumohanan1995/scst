<li class="slide">
        <a class="side-menu__item {{ \Request::route()->getName() == 'ChildFinanceListClerk' ? 'active' : '' }}"
             href="{{ url('ChildFinanceListClerk') }}">
         <i class="side-menu__icon fe fe-menu"> </i>
         <span class="side-menu__label">Child Finance Applications</span>

        </a>

</li>













<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'clerkItiFundList' ? 'active' : '' }}"
     href="{{ url('clerkItiFundList') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">ITI Student Fund Scheme Applications</span>

</a>

</li>