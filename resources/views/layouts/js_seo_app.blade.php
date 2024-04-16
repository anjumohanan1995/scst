
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'coupleFinanceListJsSeo' || \Request::route()->getName() == 'childFinancialJsSeoDetails' ? 'active' : '' }}"
        href="{{ url('coupleFinanceListJsSeo') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Couple Financial Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'motherChildSchemeListJsSeo' ? 'active' : '' }}"
        href="{{ url('motherChildSchemeListJsSeo') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Mother Child Protection Scheme
            Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'examApplicationListJsSeo' || \Request::route()->getName() == 'examApplicationJsSeoDetails' ? 'active' : '' }}"
        href="{{ url('examApplicationListJsSeo') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Exam Applications</span>

    </a>

</li>

<li class="slide">
        <a class="side-menu__item {{ \Request::route()->getName() == 'childFinanceListJsSeo' ? 'active' : '' }}"
             href="{{ url('childFinanceListJsSeo') }}">
         <i class="side-menu__icon fe fe-menu"> </i>
         <span class="side-menu__label">Child Finance Applications</span>

        </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'marriageGrantListJsSeo' ? 'active' : '' }}"
        href="{{ url('marriageGrantListJsSeo') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Marriage Grant Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'houseGrantListJsSeo' || \Request::route()->getName() == 'houseGrantJsSeoDetails' ? 'active' : '' }}"
        href="{{ url('houseGrantListJsSeo') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">House Grant Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'tuitionFeeListJsSeo' || \Request::route()->getName() == 'tuitionFeeJsSeoDetails' ? 'active' : '' }}"
        href="{{ url('tuitionFeeListJsSeo') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Tuition Fee Applications</span>

    </a>

</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'studentFundListJsSeo' ? 'active' : '' }}"
        href="{{ route('studentFundListJsSeo') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Medical /Engineering Student Fund Scheme
            Applications</span>
    </a>
</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'singleEarnerListJsSeo' ? 'active' : '' }}"
        href="{{ route('singleEarnerListJsSeo') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Proving death of sole earner applications</span>
    </a>
</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'anemiaFinanceListJsSeo' ? 'active' : '' }}"
     href="{{ url('anemiaFinanceListJsSeo') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">Sickle-cell anemia patients finance
    applications</span>
</a>
</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'studentAwardListJsSeo' ? 'active' : '' }}"
     href="{{ url('studentAwardListJsSeo') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">Student Award applications</span>
</a>
</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'JsSeoItiFundList' ? 'active' : '' }}"
     href="{{ url('JsSeoItiFundList') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">ITI Student Fund Scheme Applications</span>
</a>
</li>



