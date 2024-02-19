
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'couplefinancialListOfficer' || \Request::route()->getName() == 'couplefinancialDetailsOfficer' ? 'active' : '' }}"
        href="{{ url('couplefinancialListOfficer') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Couple Financial Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'motherChildSchemeListOfficer' ? 'active' : '' }}"
        href="{{ url('motherChildSchemeListOfficer') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Mother Child Protection Scheme
            Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'examApplicationListOfficer' || \Request::route()->getName() == 'examApplicationDetailsOfficer' ? 'active' : '' }}"
        href="{{ url('examApplicationListOfficer') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Exam Applications</span>

    </a>

</li>


<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'marriageGrantListOfficer'  || \Request::route()->getName() == 'marriageGrantDetailsOfficer' ? 'active' : '' }}"
        href="{{ url('marriageGrantListOfficer') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Marriage Grant Applications</span>

    </a>

</li>



