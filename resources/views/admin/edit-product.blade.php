@extends('admin.theme.layouts.app') 
@section('content')
<style>
.inventory-tab li a.active {
    background: #fed917 !important;
    position: relative;
    border-bottom: none;
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
                      <form action="{{ route('admin.product.edit',$product->id) }}" id="popForm" method="post" enctype="multipart/form-data">
                        @csrf
    <section class="content-add-pro add-pro">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <h3>Edit Product</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="inventory-tab">
                        <ul class="nav nav-tabs">
                            <li ><a class="active" data-toggle="tab" href="#general">GENERAL</a></li>
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
                                <label class="input-label">Product Name<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}">
                            </div>
						</div>	
						
						<div class="col-sm-6">
                           
                            <div class="form-field-here">
                                <label class="input-label">Meta Title<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="meta_title" value="{{$product->meta_title}}">
                            </div>
						</div>	
						
						
						<div class="col-sm-6">
                           
                            <div class="form-field-here">
                                <label class="input-label">Meta Description<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="meta_description" value="{{$product->meta_description}}">
                            </div>
						</div>	
							
						 <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">SKU<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="sku" value="{{$product->sku}}">
                            </div>
							</div>
							
							
							
							 <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Model<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="model" value="{{$product->model}}">
                            </div>
                        </div>
						
						
						
						<div class="col-sm-6">
							
                            <div class="form-field-here">
                                <label class="input-label">Ikozy ID<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="ikozy_id" value="{{$product->ikozy_id}}">
                            </div>
                        </div>
						
						
						<div class="col-sm-6">
						<div class="form-field-here">
                                <label class="input-label">Quantity<span style="color: red">*</span></label>
                                <input type="Number" class="form-control" name="quantity" value="{{$product->quantity}}">
                            </div>
						</div>
						
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Brand<span style="color: red">*</span></label>
                                <select name="manufacturer_id" class="form-control select-form">
                                    @foreach($manufactures as $manufacture)
                                    <option value="{{$manufacture->id}}" @if($product->manufacturer_id==$manufacture->id) selected @endif>{{$manufacture->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
						
						 <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Price<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="price" value="{{$product->price}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Discounted Price<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="discount_price" value="{{$product->discount_price}}">
                                
                            </div>
                        </div>
						
                        <div class="col-sm-12">
                            <div class="form-field-here">
                                <label class="input-label">Product Categories<span style="color: red">*</span></label>
                                <select class="form-control select-form" name="category_id[]" multiple>
                                    @foreach($categories as $category)
                                    <option value="{{$category->category_id}}" @if(in_array($category->category_id,$product_cats)) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                      
                       
                      
                        <div class="col-sm-12">
                            <div class="form-field-here">
                                <label class="input-label">Product Description<span style="color: red">*</span></label>
                                <textarea rows="4" id="description" cols="50" class="form-control" name="description">{{$product->description}}</textarea>
                            </div>
                        </div>
                       
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Stock status<span style="color: red">*</span></label>
                                <select  id="stock_status"   name="stock_status_id" class="form-control select-form">
                                <option @if($product->stock_status_id=='1') selected @endif value="1">In Stock</option>
                                <option @if($product->stock_status_id=='0') selected @endif value="0">Out of Stock</option>
                            </select>
                            </div>
							</div>
						
						
						 <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Status</label>
                                 <select type="text" name="status" class="form-control select-form">
                                <option @if($product->status == 1) selected @endif value="1">Enable</option>
                                <option @if($product->status == 0) selected @endif value="0">Disable</option>
                            </select>
                            </div>
                        </div>


                                     <div class="col-sm-12">
                               <div class="form-field-here">
                                   <label class="input-label">Featured</label>
                                   <span style="margin-left: 10px;">
                                       <input name="featured" type="radio" @if($product->featured=='1') checked @endif value="1"> Yes
                                       <input name="featured" type="radio"  @if($product->featured=='0') checked @endif value="0"> No
                                   </span>
                               </div>
                            </div>
                       
					    <div class="col-sm-12">
                            <div class="form-field-here upload-f">
							 <label class="input-label">Upload Files Here</label>
							
							 
							  @foreach($product->getImages as $image)
							
							  <?php
							 $file_path=url('/').'/'.$image->image;
							 $data = base64_encode(file_get_contents($file_path));
							
							  ?>
							<div id="filediv" class="myLoop">
									<div id="abcd{{ $loop->iteration }}" class="abcd">
										<img id="previewimg{{ $loop->iteration }}" src="data:image/png;base64,{{$data}}" />
										<span class="delete-image-my"></span>
									</div>
								<input name="old_file[]" type="hidden" id="file" value="{{$image->image}}">
								</div>
								
							
								
							 @endforeach
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
                                           
											
											@if($product->getOptionValues->count() > '0')	
												<table class="tbllOption table table-bordered has-option">
                                                <thead>
                                                    <th>Select Option</th>
                                                    <th>Config option values</th>
                                                    <th> </th>
                                                </thead>
                                                <tbody>
												
												@foreach($product->getOptionValues as $editOption)
												
                                                    <tr class="clonemeOption">
                                                        <td class="attribute-box">
                                                            <div class="input-attribute">
                                                                <select name="option[]" class="option_list">
																<option value="">Select Option</option>
																@foreach($options as $option)
                                                                  <option @if($editOption->option_id == $option->id)  selected  @endif value="{{$option->id}}">{{$option->name}}</option>
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
                                           @foreach($master_option_values as $master_option_value)
                                              @if($editOption->option_value_id == $master_option_value->id)
											  
											  <option selected  value="{{$master_option_value->id}}">{{$master_option_value->name}}</option>
                                           
										     @endif
										   
										   @endforeach
											
											
                                                                           
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td width="80px">
                                                                    <div class="input-quantity-table">
                                                                        <input type="text" value="{{$editOption->quantity}}" name="option_value_quantity[]" placeholder="Qty.">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-stock-table">
                                                                        <select name="option_value_subtract[]">
                                                                            <option @if($editOption->subtract == 'Yes') selected  @endif value="Yes">Yes</option>
                                                                            <option @if($editOption->subtract == 'No') selected  @endif value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-price-table">
                                                                        <select name="option_value_price_prefix[]" >
                                                                            <option @if($editOption->price_prefix == '+') selected  @endif value="+">+</option>
                                                                            <option @if($editOption->price_prefix == '-') selected  @endif value="-">-</option>
                                                                        </select>
                                                                        <input type="text" value="{{$editOption->price}}" name="option_value_price[]" placeholder="Price">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-price-table">
                                                                        <select name="option_value_point_prefix[]">
                                                                            <option @if($editOption->point_prefix == '+') selected  @endif value="+">+</option>
                                                                            <option @if($editOption->point_prefix == '+') selected  @endif value="-">-</option>
                                                                        </select>
                                                                        <input type="text" value="{{$editOption->points}}" name="option_value_point[]" placeholder="Points">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-price-table">
                                                                        <select name="option_value_weight_prefix[]">
                                                                            <option @if($editOption->weight_prefix == '+') selected  @endif value="+">+</option>
                                                                            <option @if($editOption->weight_prefix == '+') selected  @endif value="-">-</option>
                                                                        </select>
                                                                        <input type="text" value="{{$editOption->weight}}" name="option_value_weight[]" placeholder="Weight">
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
													
													@endforeach
                                                </tbody>
                                            </table>
											
											@else
											<table class="tbllOption table table-bordered no-option">
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
											@endif
											
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
												@foreach($product_attributes as $editAttribute)
												
                                                    <tr class="clonemeAtt">
                                                        <td class="attribute-box">
                                                            <div class="input-attribute">
                                                                <select name="attribute[]">
																@foreach($attributes as $attribute)
                                                                  <option @if($editAttribute->attribute_id == $attribute->id) selected  @endif value="{{$attribute->id}}">{{$attribute->name}}</option>
                                                                 @endforeach
                                                                 </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="table-textarea">
                                                                <input type="text" value="{{$editAttribute->text}}" name="attribute_value[]" placeholder="Enter value">
                                                            </div>
                                                        </td>
                                                        <td align="right">
                                                            <div class="minus-btn-table">
                                                                <div class="rmv-cloneAtt">-</div>
                                                            </div>
                                                        </td>
                                                    </tr>
													@endforeach
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
									<input name="refund" type="radio" value="1" @if($product->refund=='1') checked="checked" @endif> Yes 
									<input  name="refund" type="radio" value="0" @if($product->refund=='0') checked="checked" @endif> No </span>
								</div>
							</div>
				<div  class="col-sm-12 refund-block">
								<div class="form-field-here">
									<label class="input-label">Refund Policy</label>
									
									<textarea id="refund_policy" name="refund_policy" style="height:100px;" class="form-control">{{$product->refund_policy_des}}</textarea>
								</div>
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
                                <button type="submit" class="btn blue">Update Product</button>
                                
                            </div>
                        </div>
				</div>
			</div>
		</section>

	</form>
                </div>



<?php $count=$product->getImages->count();?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
<script>
<?php //$count=$product->getImages->count();?>

var abc = <?php echo $count; ?>;      // Declaring and defining global increment variable.
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

$(".delete-image-my").click(function(){
  $(this).closest(".myLoop").remove();
});

</script>
<script type="text/javascript"></script>
 <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                            <script>
                        CKEDITOR.replace( 'description' );
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
<?php $flag=  $product->refund; ?>
$(document).ready(function(){ 
  
  var flag = <?php echo $flag; ?>;
  
  if(flag)
  {
	 $('.refund-block')css("display", "block");
  }
	  
	 
  
  $('input[name="refund"]').on('change', function() {
   $('.refund-block')
      .toggle(+this.value === 1 && this.checked);
}).change();
});
</script>  
 <script>
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
</script>
<script type="text/javascript"></script>
 <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                            <script>
                        CKEDITOR.replace( 'description' );
                </script> 
                <script>
                        CKEDITOR.replace( 'refund_policy' );
                </script> 

@endsection


