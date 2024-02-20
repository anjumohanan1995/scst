
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'couplefinancialListAssistant' || \Request::route()->getName() == 'couplefinancialDetailsAssistant' ? 'active' : '' }}"
        href="{{ url('couplefinancialListAssistant') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Couple Financial Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'motherChildSchemeListAssistant' ? 'active' : '' }}"
        href="{{ url('motherChildSchemeListAssistant') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Mother Child Protection Scheme
            Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'examApplicationListAssistant' || \Request::route()->getName() == 'examApplicationDetailsAssistant' ? 'active' : '' }}"
        href="{{ url('examApplicationListAssistant') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Exam Applications</span>

    </a>

</li>


<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'marriageGrantListAssistant'  || \Request::route()->getName() == 'marriageGrantDetailsAssistant' ? 'active' : '' }}"
        href="{{ url('marriageGrantListAssistant') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Marriage Grant Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'houseGrantListAssistant'  || \Request::route()->getName() == 'houseGrantDetailsAssistant' ? 'active' : '' }}"
        href="{{ url('houseGrantListAssistant') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">House Grant Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'tuitionFeeListAssistant'  || \Request::route()->getName() == 'tuitionFeeDetailsAssistant' ? 'active' : '' }}"
        href="{{ url('tuitionFeeListAssistant') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Tuition Fee Applications</span>

    </a>

</li>
















