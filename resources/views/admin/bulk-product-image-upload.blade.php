@extends('admin.theme.layouts.app') 
@section('content')



         
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
			
			
			 @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

 @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif
			
			
                <div class="page-heading-all"><h2>Upload Bulk Images</h2></div>
                <div class="row edit-account">
      <form id="form" action="{{route('admin.bulk.image.upload')}}" method="post"  enctype="multipart/form-data">
                     
						@csrf
                      
						
						<div id="myDropzone" class="dropzone"></div>
						
                       
                </form>
				
				
				
				
				 <button id="dropzoneSubmit" type="submit" class="btn blue">Save Images</button>
                 </div>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script>
// disable auto discover
Dropzone.autoDiscover = false;
// init dropzone on id (form or div)
$(document).ready(function() {
    var myDropzone = new Dropzone("#myDropzone", {
        url: "{{route('admin.bulk.image.upload')}}",
         headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
		
		paramName: "productImage",
		autoProcessQueue: false,
        uploadMultiple: true, // uplaod files in a single request
        parallelUploads: 100, // use it with uploadMultiple
        maxFilesize: 1, // MB
        maxFiles: 50,
        acceptedFiles: ".jpg, .jpeg, .png, .gif, .pdf",
        addRemoveLinks: true,
        // Language Strings
        dictFileTooBig: "File is to big.",
        dictInvalidFileType: "Invalid File Type",
        dictCancelUpload: "Cancel",
        dictRemoveFile: "Remove",
        dictMaxFilesExceeded: "Only 5 files are allowed",
        dictDefaultMessage: "Drop files here to upload",
    });
});
Dropzone.options.myDropzone = {
    // The setting up of the dropzone
    init: function() {
        var myDropzone = this;
        // First change the button to actually tell Dropzone to process the queue.
        $("#dropzoneSubmit").on("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            
            if (myDropzone.files != "") {
                myDropzone.processQueue();
            } else {
                $("#myDropzone").submit();
            }
        });
        // on add file
        this.on("addedfile", function(file) {
             //console.log(file);
        });
        // on error
        this.on("error", function(file, response) {
            //console.log(response);
        });
        // on start
        this.on("sendingmultiple", function(file) {
             //console.log(file);
        });
        // on success
        this.on("successmultiple", function(file) {
            // submit form
            $("#form").submit();
        });
    }
};
</script>
<style>
.dropzone {
    min-height: 227px;
    border: 2px solid rgba(0,0,0,0.3);
    background: white;
    padding: 20px 20px;
    width: 100%;
}
</style>
 
@endsection


