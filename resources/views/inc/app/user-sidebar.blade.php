<ul class="list-group">
    <li class="list-group-item bg-light">
        Hello, {{ auth()->user()->name }}
    </li>
    <li class="list-group-item-action list-group-item">
        <a href="{{ route('user.index') }}">
            <i class="fas fa-user-circle text-primary"></i> Akun Saya
        </a>
    </li>
    <li class="list-group-item-action list-group-item">
        <a href="{{ route('cart.index') }}">
            <i class="fas fa-heart text-primary"></i> My Wishlist
        </a>
    </li>
    {{-- <li class="list-group-item-action list-group-item">
    <a href="{{route('customerQuestion.index')}}">
      <i class="fas fa-align-left text-primary"></i> My queries
    </a>
  </li> --}}
    <li class="list-group-item-action list-group-item">
        <a href="{{ route('account.logout') }}">
            <i class="fas fa-sign-out-alt text-primary"></i> Keluar
        </a>
    </li>
</ul>
