
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'couplefinancialListClerk' || \Request::route()->getName() == 'couplefinancialDetails' ? 'active' : '' }}"
        href="{{ url('couplefinancialListClerk') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Couple Financial Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'motherChildSchemeListClerk' ? 'active' : '' }}"
        href="{{ url('motherChildSchemeListClerk') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Mother Child Protection Scheme
            Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'examApplicationListClerk' || \Request::route()->getName() == 'examApplicationDetails' ? 'active' : '' }}"
        href="{{ url('examApplicationListClerk') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Exam Applications</span>

    </a>

</li>

<li class="slide">
        <a class="side-menu__item {{ \Request::route()->getName() == 'ChildFinanceListClerk' ? 'active' : '' }}"
             href="{{ url('ChildFinanceListClerk') }}">
         <i class="side-menu__icon fe fe-menu"> </i>
         <span class="side-menu__label">Child Finance Applications</span>

        </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'marriageGrantListClerk' ? 'active' : '' }}"
        href="{{ url('marriageGrantListClerk') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Marriage Grant Applications</span>

    </a>

</li>
















<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'clerkItiFundList' ? 'active' : '' }}"
     href="{{ url('clerkItiFundList') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">ITI Student Fund Scheme Applications</span>

</a>

</li>