@extends('admin.layouts.app')
@section('content')
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


<form action="{{route('admin.option.create')}}" method="post" enctype="multipart/form-data">
    @csrf
    <section class="create_options">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Create Option</h2>
                    <div class="row edit-account-create">
                        <div class="form-group col-sm-12">
                            <label for="email">Option Name
                                 <span style="color: red">*</span>
                                 </label>
                            <input type="text" id="name" value="{{old('option_name')}}" class="form-control" name="option_name">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="email">Type
                              <span style="color: red">*</span>
                                 </label>  
                            <select name="type" id="input-type" class="form-control">
                                <optgroup label="Choose">
                                    <option value="select">Select</option>
                                    <option value="radio">Radio</option>
                                    <option value="checkbox">Checkbox</option>
                                </optgroup>
                                <optgroup label="Input">
                                    <option value="text">Text</option>
                                    <option value="textarea">Textarea</option>
                                </optgroup>
                                <optgroup label="File">
                                    <option value="file">File</option>
                                </optgroup>
                                <optgroup label="Date">
                                    <option value="date">Date</option>
                                    <option value="time">Time</option>
                                    <option value="datetime">Date &amp; Time</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="email">Sort Order</label>
                            <input type="text" id="sortorder" class="form-control" name="sort_order">
                        </div>
						</div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Option Values</h2>
                            </div>
                            <div class="col-sm-12">
							
								<table  class="tbllOpti table table-bordered">
									<thead>
                                                    <th><label for="email">Option Value Name</label></th>
                                                    <th><label for="email">Image</label></th>
                                                    <th> <label for="email">Sort Order</label></th>
                                                </thead>
                                                <tbody>
                                                    <tr class="clonemeOpti">
                                                        <td>
															<div class="field-inputs">
															<input type="text" class="form-control" name="option_value_name[]">
															</div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
																<input name="file[]" class="form-control" type="file" />
                                                            </div>
                                                        </td>
														<td>
															<div class="form-group">                                          
																<input type="text" class="form-control" name="option_value_sort_order[]">
                                          
															</div>
														</td>
                                                        <td align="right">
                                                            <div class="minus-btn-table">
                                                                <div class="rmv-cloneOpti">-</div>
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
                                                                <div class="addjobOpti">+</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            	</tbody>
                                            </table>
							
                             
                            </div>
                            <div class="form-group form-check col-sm-12 text-center ">
                                <input type="submit" name="submit" class="btn blue" value="Save">
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
$(function() {
    $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();

            var controlForm = $(this).closest('.controls').find('form:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo('.clone'),
                regex = /^(.+?)(\d+)$/i,
                cloneIndex = $(".entry").length;

            newEntry.find('input').val('');


            //newEntry.find('[name="option_value_name[]"]').attr("id", "address-" +  cloneIndex);
            //newEntry.find('[name="option_value_image[]"]').attr("id", "lat-" +  cloneIndex);
            //newEntry.find('[name="option_value_sort_order[]"]').attr("id", "lang-" +  cloneIndex);



            // Change div id
            newEntry.attr("id", "entry" + cloneIndex);
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                // Not this one
                //.attr("id", "entry" +  cloneIndex)
                .find("*")
                .each(function() {
                    var id = this.id || "";
                    var match = id.match(regex) || [];
                    if (match.length == 3) {
                        this.id = match[1] + (cloneIndex);
                    }
                })
                .html('<span class="fa fa-minus"></span> Remove');
        })

        .on('click', '.btn-remove', function(e) {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
});
</script>

<script type="text/javascript">
	$(".addjobOpti").click(function () {
    var $clone = $('table.tbllOpti tr.clonemeOpti:first').clone();
    console.log($clone);
    // $clone.append("<td><div class='rmv-clone' >Remove</div></td>");
    $('table.tbllOpti').append($clone);
});

$('.tbllOpti').on('click', '.rmv-cloneOpti', function () {
    // alert("Are You Sure?");
     $(this).closest('tr').remove();
});
</script>

@endsection

@section('script')

bootstrapValidate('#name','required:Name Field Is Required!');
bootstrapValidate('#sortorder','numeric:Enter Valid Sort Order!');

@endsection