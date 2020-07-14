@extends('admin.theme.layouts.app') 
@section('content')
<style>
.inventory-tab li a.active {
    background: #fed917 !important;
    position: relative;
    border-bottom: none;
}
.hide {
  display: none;
}

</style>


  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Product</h2>
      </div>
      
                  
                  
        
                
                  
                    <div class="today-orders-div-products">
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

 <div class="add-invetory-form">
                      <form action="{{ route('admin.product.add') }}" id="popForm" method="post" enctype="multipart/form-data">
                        @csrf
    <section class="content-add-pro add-pro">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <h3>Add Inventory</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="inventory-tab">
                        <ul class="nav nav-tabs">
                            <li><a data-toggle="tab" class="active" href="#general">GENERAL</a></li>
                            <li><a data-toggle="tab" href="#option">OPTION</a></li>
                            <li><a data-toggle="tab" href="#attribute">ATTRIBUTE</a></li>
							<li><a data-toggle="tab" href="#other">Other</a></li>
                        </ul>
                    </div>
                    <div class="tab-content main-tabs">
                    
					
					  <div id="general" class="tab-pane fade in active show">
                           
                <div class="row">
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Product Name <span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name">
                            </div>
							
							</div>
							
							  <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Meta Title <span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{ old('meta_title') }}" id="meta_title"  name="meta_title">
                            </div>
                        </div>
						  <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Meta Description <span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{ old('meta_description') }}" id="meta_description"  name="meta_description">
                            </div>
                        </div>
						<div class="col-sm-6">
						 <div class="form-field-here">
                                <label class="input-label">SKU <span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{ old('sku') }}" id="sku" name="sku">
                            </div>
							</div>
							<div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Model <span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{ old('model') }}" id="model" name="model">
                            </div>
							</div>
							
							
							<div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Ikozy ID <span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{ old('ikozy_id') }}" id="ikozy_id" name="ikozy_id">
                            </div>
							</div>
                        <div class="col-sm-6">
                           
                            <div class="form-field-here">
                                <label class="input-label">Quantity <span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{ old('quantity') }}" id="quantity" name="quantity">
                            </div>
                        </div>
						 <div class="col-sm-6">
						<div class="form-field-here">
                                <label class="input-label">Brand <span style="color: red">*</span>
                                </label>
                                <select name="manufacturer_id" class="form-control select-form">
                                    @foreach($manufactures as $manufacture)
                                    <option value="{{$manufacture->id}}">{{$manufacture->name}}</option>
                                    @endforeach
                                </select>
                            </div>
							 </div>
							 
							 
							  <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Price <span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{ old('price') }}"  id="price"  name="price">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Discounted Price <span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{ old('discount_price') }}"  id="discount_price"  name="discount_price">
                                
                            </div>
                        </div>
                       <!-- <div class="col-sm-4">
                            <div class="form-field-here">
                                <label class="input-label">Type Of Discount <span style="color: red">*</span>
                                </label>
                                <select class="form-control">
                                    <option>Select Discount</option>
                                    <option>10%</option>
                                    <option>20%</option>
                                </select>
                            </div>
                        </div>-->
             
					<div class="col-sm-12">
                            <div class="form-field-here">
                                <label class="input-label">Product Categories <span style="color: red">*</span>
                                </label>
                                <select class="form-control select-form" name="category_id[]" multiple>
                                    @foreach($categories as $category)
                                    <option value="{{$category->category_id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
      
                     
                        <div class="col-sm-12">
                            <div class="form-field-here">
                                <label class="input-label">Product Description <span style="color: red">*</span>
                                </label>
                                <textarea rows="4" cols="50" id="description" value="{{ old('description') }}" class="form-control" name="description"></textarea>
                            </div>
                        </div>
						
						
						<div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Stock status <span style="color: red">*</span>
                                </label>
                                <select  id="stock_status"  type="text" name="stock_status_id" class="form-control select-form">
                                <option value="1" selected>In Stock</option>
                                <option value="0">Out of Stock</option>
                            </select>
                            </div>
							</div>
						
						
						 <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Status
                                </label>
                                 <select type="text" name="status" class="form-control select-form">
                                <option value="1" selected>Enable</option>
                                <option value="0">Disable</option>
                            </select>
                            </div>
                        </div>

                        

                        <div class="col-sm-12">
                               <div class="form-field-here">
                                   <label class="input-label">Featured</label>
                                   <span  style="margin-left: 10px;">
                                       <input name="featured" type="radio" value="1"> Yes
                                       <input name="featured" type="radio" value="0"> No
                                   </span>
                               </div>
                            </div>
                                                   
                        <div class="col-sm-12">
                            <div class="form-field-here upload-f">
							 <label class="input-label">Upload Files Here <span style="color: red">*</span>
                                </label>
                                <div id="filediv"><input name="file[]" type="file" id="file"/></div>
								<input type="button" id="add_more" class="upload" value="+"/>
								
                            </div>
                        </div>
                    </div>
                     
                        </div>
					
					
					
					
					
					
					
					
					
                                   <div id="option" class="tab-pane fade">
                            <div class="option-section">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table option">
                                            <table class="tbllOption table table-bordered">
                                                <thead>
                                                    <th>Select Option</th>
                                                    <th>Config option values</th>
                                                    <th> </th>
                                                </thead>
                                                <tbody>
                                                    <tr class="clonemeOption">
                                                        <td class="attribute-box">
                                                            <div class="input-attribute">
                                                                <select name="option[]" class="option_list">
																@foreach($options as $option)
                                                                  <option value="{{$option->id}}">{{$option->name}}</option>
                                                                 @endforeach
                                                                 </select>
                                                            </div>
                                                        </td>
                                                        <td class="test">
                                                            <div class="table-textarea">
															<!--change -->
															<table class="table table-bordered">
																
																<thead>
                                                            <tr>
                                                                <th>Value</th>
                                                                <th>Qty.</th>
                                                                <th>Stock</th>
                                                                <th>Price</th>
                                                                <th>Points</th>
                                                                <th>Weight</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr >
                                                                <td width="120px">
                                                                    <div class="select-value-table">
                                  <select name="option_value[]" class="dynamic_option_value">
                                                                           
																		   
											<option value="">Select Value</option>
                                                                           
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td width="80px">
                                                                    <div class="input-quantity-table">
                                                                        <input type="text" name="option_value_quantity[]" placeholder="Qty.">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-stock-table">
                                                                        <select name="option_value_subtract[]">
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-price-table">
                                                                        <select name="option_value_price_prefix[]" >
                                                                            <option value="+">+</option>
                                                                            <option value="-">-</option>
                                                                        </select>
                                                                        <input type="text" name="option_value_price[]" placeholder="Price">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-price-table">
                                                                        <select name="option_value_point_prefix[]">
                                                                            <option value="+">+</option>
                                                                            <option value="-">-</option>
                                                                        </select>
                                                                        <input type="text" name="option_value_point[]" placeholder="Points">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-price-table">
                                                                        <select name="option_value_weight_prefix[]">
                                                                            <option value="+">+</option>
                                                                            <option value="-">-</option>
                                                                        </select>
                                                                        <input type="text" name="option_value_weight[]" placeholder="Weight">
                                                                    </div>
                                                                </td>
                                                              
                                                            </tr>
                                                        </tbody>
                                                    </table>
															
															<!--  end change-->
                                                                
                                                            </div>
                                                        </td>
                                                        <td align="right">
                                                            <div class="minus-btn-table">
                                                                <div class="rmv-cloneOption">-</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-bordered" style="margin-top: -20px; border-top: none;">
                                            	<tbody>
                                            		<tr align="right">
                                                        <td style="border-top: none;">
                                                            <div class="plus-btn-table">
                                                                <div class="addjobOption">+</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            	</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="attribute" class="tab-pane fade">
                            <div class="attribute-section">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table attribute">
                                            <table class="tbllAtt table table-bordered">
                                                <thead>
                                                    <th>Attribute</th>
                                                    <th>Value</th>
                                                    <th> </th>
                                                </thead>
                                                <tbody>
                                                    <tr class="clonemeAtt">
                                                        <td class="attribute-box">
                                                            <div class="input-attribute">
                                                                <select name="attribute[]">
																@foreach($attributes as $attribute)
                                                                  <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                                                 @endforeach
                                                                 </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="table-textarea">
                                                                <input type="text" name="attribute_value[]" placeholder="Enter value">
                                                            </div>
                                                        </td>
                                                        <td align="right">
                                                            <div class="minus-btn-table">
                                                                <div class="rmv-cloneAtt">-</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-bordered" style="margin-top: -20px; border-top: none;">
                                            	<tbody>
                                            		<tr align="right">
                                                        <td style="border-top: none;">
                                                            <div class="plus-btn-table">
                                                                <div class="addjobAtt">+</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            	</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						 <div id="other" class="tab-pane fade">
						 <div class="row">
							<div  class="col-sm-12">
								<div class="form-field-here">
									<label class="input-label">Refund Policy</label>
									<span style="margin-left: 10px;">
									<input name="refund" type="radio" value="1" > Yes 
									<input checked="checked" name="refund" type="radio" value="0" > No </span>
								</div>
							</div>
							<div  class="col-sm-12 refund-block" >
								<div class="form-field-here">
									<label class="input-label">Refund Policy</label>
									
									<textarea id="refund_policy" name="refund_policy" style="height:100px;" class="form-control"></textarea>
								</div>
							</div>
						 </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<section class="submit">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
                            <div class="form-field-here text-center" style="margin-top: 20px">
                                <button type="submit" class="btn blue">Save Inventory</button>
                                
                            </div>
                        </div>
				</div>
			</div>
		</section>

	</form>
                </div>



<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
<script>
var abc = 0;      // Declaring and defining global increment variable.
$(document).ready(function() {
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
$('#add_more').click(function() {
$(this).before($("<div/>", {
id: 'filediv'
}).fadeIn('slow').append($("<input/>", {
name: 'file[]',
type: 'file',
id: 'file'
}), $("<br/><br/>")));
});
// Following function will executes on change event of file input to select different file.
$('body').on('change', '#file', function() {
if (this.files && this.files[0]) {
	abc += 1; // Incrementing global variable by 1.
var z = abc - 1;
var x = $(this).parent().find('#previewimg' + z).remove();
$(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
$("#abcd" + abc).append($("<span></span>", {
id: 'delete-image'
}).click(function() {
$(this).parent().parent().remove();
}));
}
});
// To Preview Image
function imageIsLoaded(e) {
$('#previewimg' + abc).attr('src', e.target.result);
};
$('#upload').click(function(e) {
var name = $(":file").val();
if (!name) {
alert("First Image Must Be Selected");
e.preventDefault();
}
});
});

</script>


<script type="text/javascript">
	$(".addjobAtt").click(function () {
    var $clone = $('table.tbllAtt tr.clonemeAtt:first').clone();
    console.log($clone);
    // $clone.append("<td><div class='rmv-clone' >Remove</div></td>");
    $('table.tbllAtt').append($clone);
});

$('.tbllAtt').on('click', '.rmv-cloneAtt', function () {
    // alert("Are You Sure?");
     
	 cloneIndex = $(".clonemeAtt").length;
	 
	 if(cloneIndex > 1)
	{
	
	
    $(this).closest('tr').remove();
	}else
		
		{
		
		alert('At Least one block is required');
		}
		
		 e.preventDefault();
    return false;
});
</script>


<script type="text/javascript">
	$(".addjobOption").click(function () {
    var $clone = $('table.tbllOption tr.clonemeOption:first').clone();
    console.log($clone);
    // $clone.append("<td><div class='rmv-clone' >Remove</div></td>");
    $('table.tbllOption').append($clone);
});

$('.tbllOption').on('click', '.rmv-cloneOption', function () {
    // alert("Are You Sure?");
     
	 cloneIndex = $(".clonemeOption").length;
	 
	  if(cloneIndex > 1)
	{
	
	
    $(this).closest('tr').remove();
	}else
		
		{
		
		alert('At Least one block is required');
		}
		
		 e.preventDefault();
    return false;
});
</script>

<script type="text/javascript">
	
    $('.tbllOption').on('change', '.option_list',function(){
    var optionID = $(this).val();    
    var relTd = $(this).closest('td').next('td');
	if(optionID){
        $.ajax({
           type: "GET",
           url:"{{route('admin.option.list')}}?option_id="+optionID,
           success:function(data){               
          
			  $(relTd).find(".dynamic_option_value").empty(); 
			  $.each(data, function(key, value) {
			 
	$(relTd).find(".dynamic_option_value").append('<option value="'+value.id+'">'+value.name+'</option>');
		});
               
         }
        });
    }else{
         $(relTd).find(".dynamic_option_value").empty(); 
       
    }      
   });
 
</script> 
<script>
$(document).ready(function(){ 
  $('input[name="refund"]').on('change', function() {
   $('.refund-block')
      .toggle(+this.value === 1 && this.checked);
}).change();
});
</script>    
@endsection


@section('script')

bootstrapValidate('#name','required:Enter Valid Product Name!');
bootstrapValidate('#meta_title','required:Meta Title is required');
bootstrapValidate('#meta_description','required:Meta Description is required');
bootstrapValidate('#sku','required:SKU is required');
bootstrapValidate('#model','required:Model is required');
bootstrapValidate('#ikozy_id','required:Ikozy ID is required');
bootstrapValidate('#quantity','numeric:Enter Valid Quantity');
bootstrapValidate('#quantity','required:Quantity is required');
bootstrapValidate('#price','required:Price is required');
bootstrapValidate('#price','numeric:Enter Valid Price');
bootstrapValidate('#discount_price','numeric:Enter Valid Price');
bootstrapValidate('#discount_price','required:Discounted Price is required');
bootstrapValidate('#description','required:Description  is required');

<script type="text/javascript"></script>
 <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                            <script>
                        CKEDITOR.replace( 'description' );
                </script> 
                 <script>
                        CKEDITOR.replace( 'refund_policy' );
                </script> 

@endsection



