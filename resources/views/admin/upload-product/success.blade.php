@extends('admin.theme.layouts.app') 
@section('content')

      <section class="content-partner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                        <div class="progress" style="height:40px;">
                            <div class="progress-bar bg-success" style="width:30%; font-size:20px;">
                                1. Upload CSV File
                            </div>
                            <div class="progress-bar bg-success" style="width:30%; font-size:20px;">
                                2. Map CSV Fields
                            </div>
                            <div class="progress-bar bg-success" style="width:40%; font-size:20px;">
                                3. Save Records
                            </div>
                        </div><br>
                        <div class="my-address edd">
                            <div class="edit-account">
                                <table class="table">
                                    <center>
                                        <div class="col-sm-12 text-center">
                                            <h2>Imported Done</h2>
                                            <i class="fa fa-check" aria-hidden="true" style="font-size:50px; color:green;"></i>
                                            <br>
                                            <p style="width: 100%;">Import Complete! {{$records}} Listing Imported</p>
                                            <br>
                                            <br>
                                            <!--<div class="row">
                <div class="col-sm-">               
                     </div>-->
                                            <div class="col-sm-12">
                                                <a href="{{route('admin.listing')}}" class="btn_1 medium">View Listing</a>
                                            </div>
                                        </div>
                                    </center>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection