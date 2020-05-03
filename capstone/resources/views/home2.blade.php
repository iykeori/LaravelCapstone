<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" class="btn btn-primary" value="logout" />
  </form>