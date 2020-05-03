@extends('common') 

@section('pagetitle')
Item List
@endsection

@section('pagename')
Laravel Project
@endsection
@section('scripts')
{!! Html::script('/bower_components/parsleyjs/dist/parsley.min.js') !!}
<script>
 $('.carousel').carousel()
</script>

@endsection

@section('content')

    
    
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="/images/igbo1.png" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/images/igbo3.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/images/igbo2.jpg" alt="Third slide">
          </div>
        </div>
      </div>
      

@endsection
