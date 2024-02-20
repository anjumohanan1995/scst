
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
    <a class="side-menu__item {{ \Request::route()->getName() == 'houseGrantListClerk' || \Request::route()->getName() == 'houseGrantClerkDetails' ? 'active' : '' }}"
        href="{{ url('houseGrantListClerk') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">House Grant Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'tuitionFeeListClerk' || \Request::route()->getName() == 'tuitionFeeClerkDetails' ? 'active' : '' }}"
        href="{{ url('tuitionFeeListClerk') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Tuition Fee Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'studentFundListClerk' ? 'active' : '' }}"
        href="{{ route('studentFundListClerk') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Medical /Engineering Student Fund Scheme
            Applications</span>
    </a>
</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'singleEarnerListClerk' ? 'active' : '' }}"
        href="{{ route('singleEarnerListClerk') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Proving death of sole earner applications</span>

    </a>

</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'anemiaFinanceListClerk' ? 'active' : '' }}"
     href="{{ url('anemiaFinanceListClerk') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">Sickle-cell anemia patients finance
    applications</span>
</a>
</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'studentAwardListClerk' ? 'active' : '' }}"
     href="{{ url('studentAwardListClerk') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">Student Award applications</span>
</a>
</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'clerkItiFundList' ? 'active' : '' }}"
     href="{{ url('clerkItiFundList') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">ITI Student Fund Scheme Applications</span>
</a>
</li>



