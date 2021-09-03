@extends('penjual.layout.master')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal Transaksi</th>
                                        <th>No Resi</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Harga Barang</th>
                                        <th>Harga Ongkir</th>
                                        <th>Total Pembayaran</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pesanan as $ps)
                                    <tr>
                                        <td>{{$ps->tanggal}}</td>
                                        <td>{{$ps->resi}}</td>
                                        <td>{{$ps->alamat_lengkap}}</td>
                                        <td>Rp. {{number_format($ps->total_pembayaran)}}</td>
                                        <td>Rp. {{number_format($ps->ongkos_kirim)}}</td>
                                        <td>Rp. {{number_format($ps->ongkos_kirim + $ps->total_pembayaran)}}</td>
                                        <td>
                                            @if($ps->status_pembayaran == '0')
                                                <span class="btn btn-warning btn-sm">Belum Bayar</span>
                                            @else
                                                <span class="btn btn-success btn-sm">Sudah Bayar</span>
                                            @endif
                                        </td>
                                        <td> <a href="/seller/penjualan/{{$ps->id}}/detail" class="btn btn-primary">Detail</a> </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Modal to add new record -->
                <div class="modal modal-slide-in fade" id="modals-slide-in">
                    <div class="modal-dialog sidebar-sm">
                        <form class="add-new-record modal-content pt-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                    <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-post">Post</label>
                                    <input type="text" id="basic-icon-default-post" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-email">Email</label>
                                    <input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                                    <small class="form-text text-muted"> You can use letters, numbers & periods </small>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-date">Joining Date</label>
                                    <input type="text" class="form-control dt-date" id="basic-icon-default-date" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="basic-icon-default-salary">Salary</label>
                                    <input type="text" id="basic-icon-default-salary" class="form-control dt-salary" placeholder="$12000" aria-label="$12000" />
                                </div>
                                <button type="button" class="btn btn-primary data-submit mr-1">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->

        </div>
    </div>
</div>


<!--/ Scroll - horizontal and vertical table -->



@endsection