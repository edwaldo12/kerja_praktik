@extends('layout/index')

@section('title','Reviews PT')

@section('content')
    <section class="content">
        <div class="page-body clearfix">
            <a href="{{ route('dashboard.index') }}">
                <button type="button" class="btn btn-primary" style="margin-bottom:10px;"><i class="fa fa-arrow-circle-left"></i>  Kembali ke Halaman Utama</button>
            </a>
            @if(session('Status'))
                <div class="alert alert-success">
                    {{session('Status')}}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">List Review</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="data_table">
                            <thead>
                            <tr>
                                <th>Dibuat Oleh</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Subject</th>
                                <th>Review</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reviews as $review)
                                <tr>
                                    <td>{{$review->nama}}</td>
                                    <td>{{$review->email_reviewers}}</td>
                                    <td>{{$review->phone_reviews}}</td>
                                    <td>{{$review->subject_reviews}}</td>
                                    <td>{{$review->review_messages}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
