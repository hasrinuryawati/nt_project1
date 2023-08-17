<div class="content-header" style="font-family: 'Times New Roman', Times, serif;">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">
          {{-- ADMIN MODULE --}}
          @if (Route::currentRouteName() === "admin.product") 
            PRODUCT

          {{-- USER MODULE --}}
          @elseif (Route::currentRouteName() === 'user.product')
            PRODUCT
          @elseif (Route::currentRouteName() === 'user.order')
            ORDER
          @elseif (Route::currentRouteName() === 'user.order.history')
            RIWAYAT ORDER
          @endif
        </h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>