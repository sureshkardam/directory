@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <!--produuct colom-->
        <div class="col-sm-12">
            <div class="content-dashboard-vendor">
                <div class="title-heading">
                    <h2>Bulk Update Status</h2>
                </div>
                
                <div class="today-orders-div">
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
                    <div class="edit-account custom-form">
               
                        
                         <!-- <a href="" id="bulk-update-status" style="display: none;" >Change Status</a> -->
                         
                         <div class="col-sm-4">
                         <select id="bulk-update-status" name="status" style="display: none">
                             <option value="">Select Status</option>
                             <option value="1">In Stock</option>
                             <option value="0">Out of Stock</option>
                         </select>
                     </div>
                     <div class="col-sm-12">
                         <p id="notice"></p>
                     </div>
                 
                        <div class="col-sm-2">
                                <div class="form-field">
                                   
                                    <!-- <select name="status" onchange="onchange()" id="bulk-update-status" style="display:none;" class="form-control"> <label style="display:none;">Status</label>
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option> -->
                                         
                                    
                                </div>
                            </div>

                        <table  class="display table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectall"  name="selectall" /></th>
                                    <th>Product ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Edit</th>
									 <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
            <td><input type="checkbox"  class="single" value="{{$product->id}}" name="single"></td>
                                    <td>{{$product->id}}</td>
                                    <td><img width="25px;" src="{{ url('/') }}/{{\App\Model\Admin\Product::getSingleImage($product->id)}}" /></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->sku}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->status ? 'In Stock' : 'Out of Stock' }}</td>
                                    <td>
                                        <a class="action-dash" href="{{route('admin.product.edit',['id'=>$product->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            
                                    </td>
									<td>
									<a class="action-dash" href="{{route('admin.product.delete',$product->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<!--<script type="text/javascript">

     $(document).ready(function() {
$('#selectall').click(function() {
   // var checked = $(this).attr('checked');
     var checked = $(this).prop('checked');
    var checkboxes = '.single input[type=checkbox]';

    if (checked) {
        $(this).attr('checked','checked');
         $(checkboxes).each(function() {
                $(this).prop('checked','');
            });
        //$(checkboxes).attr('disabled','true');
    } else {
        $(this).removeAttr('checked');
        $(checkboxes).each(function() {
                $(this).prop('checked',checked);
            });

        //$(checkboxes).removeAttr('disabled');
    }
});
});



</script>-->
<script>
$("input[name='selectall']").change(function(){
   //alert($(this).attr("class"));


//var eclass = $(this).attr("class");
//$(".top-icons").toggle(this.checked);
$("#bulk-update-status").toggle();


var checkBoxes = $('.display').find(':checkbox');
checkBoxes.prop('checked', $(this).is(':checked') ? true : false);

//$('#' + eclass).find(':checkbox').attr("checked",function(){return $(this).attr("checked") ? false : true;});
});
</script>

<script type="text/javascript">
   $(document).ready(function() {
$("#bulk-update-status").change(function(event){
                
          
           event.preventDefault();
           var option_value=$(this).val();
            var data = [];
           $.each($("input[name='single']:checked"), function(){            
               data.push($(this).val());
           });
           //alert("My checked inputs are : " + favorite.join(", "));
//alert(data);
data=data.join(",");
//ajax
 
if(data && option_value){

$.ajax({
  type: "GET",

  url:"{{route('ajaxBulkUpdate')}}?data="+data+"&status="+option_value,
  success:function(data){      
$("#notice").empty();
$('#notice').text('Process Complete , Status Updated for selected Products!');
}
                 });
}




       });
   });
</script>


@endsection


