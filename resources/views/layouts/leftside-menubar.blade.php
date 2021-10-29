<script>
  $(document).ready(function () {
    $('.nav-item.active').removeClass('active');
    $('a[href="' + window.location.href + '"]').closest('li').closest('ul').closest('li').addClass('active');
    $('a[href="' + window.location.href + '"]').closest('li').addClass('active');
  });
</script>
<style>
  .nav-item.active {
    background-color: #fce8e6;
    font-weight: bold;
  }

  .nav-item.active a {
    color: #d93025;
  }

  .nav-link-text {
    padding-left: 10%;
  }

  #side-navbar ul>li>a {
    padding: 8px 15px;
  }
</style>
{{--@if(Auth::user()->role != 'master')

@endif--}}
<ul class="nav flex-column">
  <li class="nav-item active">
    <a class="nav-link" href="{{ url('home') }}">@lang('Tableau de bord')<span class="nav-link-text"></span></a>
  </li>
  @if(Auth::user()->role == 'accountant' || Auth::user()->role == 'admin')
  <li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle nav-link-align-btn" data-toggle="dropdown" role="button"
                        aria-expanded="false" aria-haspopup="true">@lang('stock')<span class="caret"></span></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <!--
      <li class="nav-item">
        <a class="nav-link" href="{{route('product.index')}}"><span class="nav-link-text">@lang('Products')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{ route('incomes.index') }}"><span class="nav-link-text">@lang('Income')</span></a>
      </li>
    -->
      <li class="nav-item">
        <a class="dropdown-item" href="{{ route('expenses.index') }}"><span class="nav-link-text">@lang('Dépense')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{route('report-bar-list')}}"><span class="nav-link-text">@lang('Rapport Bar')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{route('report-kitchen-list')}}"><span class="nav-link-text">@lang('Rapport Cuisine')</span></a>
      </li>
      <!--
      <li class="nav-item">
        <a class="dropdown-item" href="{{url('list-sales')}}"><span class="nav-link-text">@lang('Sale')</span></a>
      </li>-->
    </ul>
    <li class="nav-item">
        <a class="nav-link" href="{{route('categories.index')}}">@lang('Category')<span class="nav-link-text"></span></a>
    </li>
  </li>
  @endif
  @if(Auth::user()->role == 'admin' || Auth::user()->role == 'technician')
  <li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle nav-link-align-btn" data-toggle="dropdown" role="button"
                        aria-expanded="false" aria-haspopup="true">@lang('Site')<span class="caret"></span></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <li class="nav-item">
        <a class="dropdown-item" href="{{ URL::route('site.dashboard') }}"><span class="nav-link-text">@lang('Analytique')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{URL::route('sliders.index')}}"><span class="nav-link-text">@lang('Slider')</span></a>
      </li>

      <li class="nav-item">
        <a class="dropdown-item" href="{{ URL::route('site.subscribe') }}"><span class="nav-link-text">@lang('Abonnés')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{ URL::route('site.gallery') }}"><span class="nav-link-text">@lang('Gallerie')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{ URL::route('site.contact_us') }}"><span class="nav-link-text">@lang('Contact')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{ URL::route('site.faq') }}"><span class="nav-link-text">@lang('FAQ')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{ URL::route('events.index') }}"><span class="nav-link-text">@lang('Evénément')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{ URL::route('point-keys.index') }}"><span class="nav-link-text">@lang('Clé de point')</span></a>
      </li>
    </ul>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin-room-list')}}">@lang('Room')<span class="nav-link-text"></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin-news-list')}}">@lang('News')<span class="nav-link-text"></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin-restauration-list')}}">@lang('Restauration')<span class="nav-link-text"></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('employees.index')}}">@lang('Employés')<span class="nav-link-text"></span></a>
    </li>
  </li>
  @endif
</ul>
