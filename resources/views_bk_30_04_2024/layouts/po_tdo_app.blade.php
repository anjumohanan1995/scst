
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
    <a class="side-menu__item {{ \Request::route()->getName() == 'ChildFinanceListOfficer' || \Request::route()->getName() == 'childFinancialDetailsOfficer' ? 'active' : '' }}"
        href="{{ url('ChildFinanceListOfficer') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Child Finance Applications</span>

    </a>

</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'marriageGrantListOfficer'  || \Request::route()->getName() == 'marriageGrantDetailsOfficer' ? 'active' : '' }}"
        href="{{ url('marriageGrantListOfficer') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Marriage Grant Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'StudentFundListOfficer' ? 'active' : '' }}"
        href="{{ route('StudentFundListOfficer') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Medical /Engineering Student Fund Scheme
            Applications</span>
    </a>
</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'singleEarnerListOfficer' ? 'active' : '' }}"
        href="{{ route('singleEarnerListOfficer') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Proving death of sole earner applications</span>
    </a>
</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'anemiaFinanceListOfficer' ? 'active' : '' }}"
     href="{{ url('anemiaFinanceListOfficer') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">Sickle-cell anemia patients finance
    applications</span>
</a>
</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'studentAwardListOfficer' ? 'active' : '' }}"
     href="{{ url('studentAwardListOfficer') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">Student Award applications</span>
</a>
    <a class="side-menu__item {{ \Request::route()->getName() == 'houseGrantListOfficer'  || \Request::route()->getName() == 'houseGrantDetailsOfficer' ? 'active' : '' }}"
        href="{{ url('houseGrantListOfficer') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">House Grant Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'tuitionFeeListOfficer'  || \Request::route()->getName() == 'tuitionFeeDetailsOfficer' ? 'active' : '' }}"
        href="{{ url('tuitionFeeListOfficer') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Tuition Fee Applications</span>

    </a>

</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'officerItiFundList' ? 'active' : '' }}"
     href="{{ url('officerItiFundList') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">ITI Student Fund Scheme Applications</span>
</a>
</li>