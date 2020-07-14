@extends('admin.theme.layouts.app') 
@section('content')
<style>
#maindiv{
width:960px;
margin:10px auto;
padding:10px;
font-family:'Droid Sans',sans-serif
}
#formdiv{
width:500px;
float:left;
text-align:center
}
form{
padding:40px 20px;
box-shadow:0 0 10px;
border-radius:2px
}
h2{
margin-left:30px
}
.upload{
background-color:red;
border:1px solid red;
color:#fff;
border-radius:5px;
padding:10px;
text-shadow:1px 1px 0 green;
box-shadow:2px 2px 15px rgba(0,0,0,.75)
}
.upload:hover{
cursor:pointer;
background:#c20b0b;
border:1px solid #c20b0b;
box-shadow:0 0 5px rgba(0,0,0,.75)
}
#file{
color:green;
padding:5px;
border:1px dashed #123456;
background-color:#f9ffe5
}
#upload{
margin-left:45px
}
#noerror{
color:green;
text-align:left
}
#error{
color:red;
text-align:left
}
#img{
width:17px;
border:none;
height:17px;
margin-left:-20px;
margin-bottom:91px
}
.abcd{
text-align:center
}
.abcd img{
height:100px;
width:100px;
padding:5px;
border:1px solid #e8debd
}
b{
color:red
}


.form-field-here {
    position: relative;
    margin-top: 10px;
}
.form-field-here.upload-f label.input-label {
    display: block;
}
.form-field-here .upload {
    background-color: #ececec;
    border: 1px solid #ddd;
    color: #29b159;
    border-radius: 5px;
    padding: 8px 0px;
    width: 100%;
    font-size: 14px;
    text-shadow: inherit;
    box-shadow: inherit;
    margin-top: 0px;
    width: 110px;
    position: relative;
    top: 4px;
    height: 113px;
    margin-right: 7px;
    font-size: 45px;
    padding-right: 9px;
}
.form-field-here .upload:hover {
    cursor: pointer;
    background: #ddd;
    border: 1px solid #ddd;
    box-shadow: inherit;
}
.form-field-here div#filediv {
    display: inline-block;
    vertical-align: top;
    line-height: 0;
    margin: 5px;
    margin-bottom: 15px;
}
.form-field-here div#filediv input#file {
    width: 110px;
    height: 110px;
}

.form-field-here div#filediv input#file {
    width: 110px;
    height: 110px;
    position: relative;
    border: none;
}
.form-field-here div#filediv input#file:before {
    content: "";
    width: 100%;
    height: 100%;
    background: #2676b3;
    opacity: 1;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    cursor: pointer;
}
.form-field-here div#filediv input#file:hover:before {
    background: #12568a;
}
.form-field-here div#filediv input#file:after {
    content: "\f093";
    position: absolute;
    font-family: FontAwesome;
    color: #fff;
    font-size: 32px;
    left: 40px;
    top: 54px;
    margin: 0 auto;
}

.abcd {
    position: relative;
}
.abcd img {
    height: 110px;
    width: 110px;
    padding: 0;
    border: solid 1px #ddd;
}

.abcd span#delete-image {
    display: block;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    background: #ff00008c;
    width: 100%;
    height: 100%;
    cursor: pointer;
    opacity: 0;
    transition: 0.1s;
}	

.abcd:hover span#delete-image {
    opacity: 1;

}
.abcd span#delete-image:before {
    content: "\f00d";
    font-family: FontAwesome;
    left: 0;
    right: 0;
    color: #ffd1d8;
    top: 54px;
    font-size: 26px;
    position: absolute;
}

.abcd span.delete-image-my {
    display: block;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    background: #ff00008c;
    width: 100%;
    height: 100%;
    cursor: pointer;
    opacity: 0;
    transition: 0.1s;
}	

.abcd:hover span.delete-image-my {
    opacity: 1;

}
.abcd span.delete-image-my:before {
    content: "\f00d";
    font-family: FontAwesome;
    left: 0;
    right: 0;
    color: #ffd1d8;
    top: 54px;
    font-size: 26px;
    position: absolute;
}
</style>

<script src="http://www.jqueryscript.net/demo/Checkable-Collapsible-jQuery-Tree-View-Plugin-Treeview/dev/logger.js"></script>
<script src="http://www.jqueryscript.net/demo/Checkable-Collapsible-jQuery-Tree-View-Plugin-Treeview/dev/treeview.js"></script>

  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Product</h2>
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
    <section class="content-partner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <h3>Add Product</h3>
                    </div>
                </div>
                <div class="add-invetory-form">
                      <form action="{{ route('admin.product.add') }}" id="popForm" method="post" enctype="multipart/form-data">
                        @csrf
                <div class="row">
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Product ID</label>
                                <input type="text" class="form-control" value="" >
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">Product Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">Ikozy ID</label>
                                <input type="text" class="form-control" name="ikozy_id">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">SKU</label>
                                <input type="text" class="form-control" name="sku">
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">Quantity</label>
                                <input type="Number" class="form-control" name="quantity">
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">Brand</label>
                                <select name="manufacturer_id" class="form-control select-form">
                                    @foreach($manufactures as $manufacture)
                                    <option value="{{$manufacture->id}}">{{$manufacture->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
             
            <div class="col-md-6">
               <div id="treeview-container">
    <ul>
        <li>Parent 1</li>
        <li>Parent 2
            <ul>
                <li>node 2.1</li>
                <li>node 2.2
                    <ul>
                        <li data-value="2.2.1">subnode 2.2.1</li>
                        <li data-value="2.2.2">subnode 2.2.2</li>
                        <li data-value="2.2.3">subnode 2.2.3</li>
                    </ul>
                </li>
                <li>node 2.3</li>
            </ul>
        </li>
        <li>Parent 3
            <ul>
                <li data-value="3.1">node 3.1</li>
                <li data-value="3.2">node 3.2</li>
            </ul>
        </li>
    </ul>
</div>
            </div>
      
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Product Sub Categories</label>
                                <select type="text" class="form-control select-form" multiple>
                                    <option value="default">Jwellery</option>
                                    <option value="wedding">Clothes</option>
                                    <option value="birthday">Shoes</option>
                                    <option value="engagement">Appliances</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Model No.</label>
                                <input type="text" class="form-control" name="model">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">MetaDescription</label>
                                <input type="text" class="form-control" maxlength="7" name="meta_description">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-field-here">
                                <label class="input-label">Product Description</label>
                                <textarea rows="4" cols="50" class="form-control" name="description"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-field-here">
                                <label class="input-label">Price</label>
                                <input type="text" class="form-control" name="price">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-field-here">
                                <label class="input-label">Discounted Price</label>
                                <input type="text" class="form-control" name="discount_price">
                                
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-field-here">
                                <label class="input-label">Type Of Discount</label>
                                <select class="form-control">
                                    <option>Select Discount</option>
                                    <option>10%</option>
                                    <option>20%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-field-here upload-f">
							 <label class="input-label">Upload Files Here</label>
                                <div id="filediv"><input name="file[]" type="file" id="file"/></div>
								<input type="button" id="add_more" class="upload" value="+"/>
								
                            </div>
                        </div>
                      

                        <div class="col-sm-12">
                            <div class="form-field-here text-center" style="margin-top: 20px">
                                <button type="submit" class="btn blue">Save Inventory</button>
                                
                            </div>
                        </div>
                    </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</section>
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


<script>
   $('#treeview-container').treeview({
  debug : false,
  data : ['3.2', '2.2.3']
});
$('#treeview-container').on("treeview.change", function (e, ele) {
  if ($(ele).parents('ul').length > 1) {  // not on root elements
    $(ele).closest('li').siblings().find(':checkbox').prop('checked', false);
  }
});
    </script>
@endsection




