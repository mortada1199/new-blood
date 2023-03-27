<div class="dropdown d-inline-block">
    <a type="button" class="btn btn-outline-primary" id="page-header-user-dropdown" data-bs-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">
        <i class="uil-ellipsis-v d-none d-xl-inline-block font-size-1"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">

        <a class="dropdown-item" href="{{route('orders.edit',$order)}}"> <span
                class="align-middle"> تعديل الحاله </span></a>

        <a class="dropdown-item"
           onclick="event.preventDefault(); document.getElementById('profile-activate-{{ $order->id }}').submit();"
           href="#">
            <span class="align-middle"> حذف الطلب</span>
        </a>


    </div>
</div>





<form id="profile-activate-{{ $order->id }}" action="{{ route('orders.destroy', $order) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
<div id="myModal-block-product-{{ $order->id }}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">تعديل </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate
                      action="{{ route('updateStatus', $order->id) }}" method="POST" >
                    @method('PATCH')
                    @csrf
                    <div class="row">

                        <div class="col-md-12">


                                <div class="mb-3">
                                    <label for="status">اختار</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="الانتظار">الانتظار</option>
                                    <option value="مكتمل">مكتمل</option>
                                        <option value="ملغي">ملغي</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                    @enderror
                                </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <button type="submit" class="btn  btn-primary">{{ __('save') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
