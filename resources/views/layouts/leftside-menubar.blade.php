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
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link" href="{{url('user/'.Auth::user()->student_code)}}"><span
        class="nav-link-text">@lang('Profile')</span></a>
  </li>
</ul>
@endif--}}
<ul class="nav flex-column">
  <li class="nav-item active">
    <a class="nav-link" href="{{ url('home') }}"><span class="nav-link-text">@lang('Dashboard')</span></a>
  </li>
  @if(Auth::user()->role == 'admin')
  <li class="nav-item">
    <a class="nav-link" href="{{ route('plannings.index') }}"><span class="nav-link-text">@lang('Planning')</span></a>
  </li>
  <li class="nav-item dropdown">
    <a role="button" href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="nav-link-text">@lang('stock')</span></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <li class="nav-item">
        <a class="dropdown-item" href="{{ route('foods.index') }}"><span class="nav-link-text">@lang('Foods')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{ route('drinks.index') }}"><span class="nav-link-text">@lang('Drinks')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href=""><span class="nav-link-text">@lang('Capital')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{ route('incomes.index') }}"><span class="nav-link-text">@lang('Income')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{ route('expenses.index') }}"><span class="nav-link-text">@lang('Expense')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="#"><span class="nav-link-text">@lang('Income List')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="#"><span class="nav-link-text">@lang('Expense List')</span></a>
      </li>
    </ul>
  </li>
   <li class="nav-item dropdown">
    <a role="button" href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="nav-link-text">@lang('Galerie')</span></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <li class="nav-item">
        <a class="dropdown-item" href="{{ url('admin/images')}}"><span class="nav-link-text">@lang('Images')</span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="{{ url('admin/videos')}}"><span class="nav-link-text">@lang('Videos')</span></a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('admin/slider/create')}}"><span class="nav-link-text">@lang('Sliders')</span></a>
  </li>
  <li class="nav-item dropdown">
    <a role="button" href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="nav-link-text">@lang('HRM')</span></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <!-- Dropdown menu links -->
      <li>
        <a class="dropdown-item" href="{{route('employees.index') }}"><span class="nav-link-text">@lang('Employees')</span></a>
      </li>
      <li>
        <a class="dropdown-item" href="{{route('leaves.index')}}"><span class="nav-link-text">@lang('Leave')</span></a>
      </li>
      <li>
        <a class="dropdown-item" href=""><span class="nav-link-text">@lang('accountants')</span></a>
      </li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a role="button" href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="nav-link-text">@lang('Rooms')</span></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <!-- Dropdown menu links -->
      <li>
        <a class="dropdown-item" href=""><span class="nav-link-text">@lang('Room price')</span></a>
      </li>
      <li>
        <a class="dropdown-item" href="{{ route('categories.index') }}"><span class="nav-link-text">@lang('Category')</span></a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=""><span class="nav-link-text">@lang('Promotions')</span></a>
  </li>
  <li class="nav-item dropdown">
    <a role="button" href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="nav-link-text">@lang('Commands')</span></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <!-- Dropdown menu links -->
      <li>
        <a class="dropdown-item" href=""><span class="nav-link-text">@lang('Food')</span></a>
      </li>
      <li>
        <a class="dropdown-item" href=""><span class="nav-link-text">@lang('Drink')</span></a>
      </li>
    </ul>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="{{ route('abouts.index') }}"><span class="nav-link-text">@lang('About Us')</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('informations.index') }}"><span class="nav-link-text">@lang('Informations')</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=""><span class="nav-link-text">@lang('Advantages')</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('admin/report') }}"><span class="nav-link-text">@lang('Reports')</span></a>
  </li>
  @endif
</ul>
