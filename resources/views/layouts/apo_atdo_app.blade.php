
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
    <a class="side-menu__item {{ \Request::route()->getName() == 'ChildFinanceListAssistant' || \Request::route()->getName() == 'childFinanceDetailsAssistant' ? 'active' : '' }}"
        href="{{ url('ChildFinanceListAssistant') }}">
     <i class="side-menu__icon fe fe-menu"> </i>
     <span class="side-menu__label">Child Finance Applications</span>

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

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'studentFundListAssistant' ? 'active' : '' }}"
        href="{{ route('StudentFundListAssistant') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Medical /Engineering Student Fund Scheme
            Applications</span>
    </a>
</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'singleEarnerListAssistant' ? 'active' : '' }}"
        href="{{ route('singleEarnerListAssistant') }}">
        <i class="side-menu__icon fe fe-menu"> </i>
        <span class="side-menu__label">Proving death of sole earner applications</span>
    </a>
</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'anemiaFinanceListAssistant' ? 'active' : '' }}"
     href="{{ url('anemiaFinanceListAssistant') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">Sickle-cell anemia patients finance
    applications</span>
</a>
</li>
<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'studentAwardListAssistant' ? 'active' : '' }}"
     href="{{ url('studentAwardListAssistant') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">Student Award applications</span>
</a>
</li>

<li class="slide">
    <a class="side-menu__item {{ \Request::route()->getName() == 'assistantItiFundList' ? 'active' : '' }}"
     href="{{ url('assistantItiFundList') }}">
 <i class="side-menu__icon fe fe-menu"> </i>
 <span class="side-menu__label">ITI Student Fund Scheme Applications</span>
</a>
</li>















