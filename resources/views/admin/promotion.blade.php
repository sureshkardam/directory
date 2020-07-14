@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Promotions</h2>
      </div>
      
                   <div  class="add-button">
           <a href="{{route('admin.promotion.create')}}"  ><i class="fa fa-plus" ></i> Add New</a>
           
           </div>
  
                  
        
                
                  
                    <div class="today-orders-div">
                      
                        <div class="edit-account">
                                     @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif

                 
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Promotion Code</th>
                                         <th>Promotion Amount</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Create Date</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($promotion as $promotion)
                                    <tr>
                                        <td>{{$promotion->promotion_code}}</td>
                                        <td>{{$promotion->promotion_amount}}</td>
                                        <td>{{date('M\. d\, Y', strtotime($promotion->start_date))}}</td>
                                        <td>{{date('M\. d\, Y', strtotime($promotion->end_date))}}</td>
                                        <td>{{date('M\. d\, Y', strtotime($promotion->created_at))}}</td>
                                       
                                        <td>{{$promotion->status ? 'Active' : 'Inactive' }}</td>
                                       
                                       
                                        <td>
                   <a href="{{route('admin.promotion.edit',$promotion->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>


         
                      
                                        </td>
                     <td>
                                            <a href="{{route('admin.promotion.delete',$promotion->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                 @endforeach  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  
  <!-- Add new Modal -->

 
@endsection

@section('script')

bootstrapValidate('#addName','alpha:Enter Valid promotion Name!');
bootstrapValidate('#addattribute','alpha:Enter Valid attribute Code!');
bootstrapValidate('#addPhonecode','numeric:Enter Valid Phone Code!');
bootstrapValidate('#editattributename','alpha:Please Check Your attribute Name!');
bootstrapValidate('#editattributecode','alpha:Please Check Your attribute Code!');
bootstrapValidate('#editPhonecode','numeric:Please Check Your Phone Code!');


@endsection