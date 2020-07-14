@extends('admin.theme.layouts.app') 
@section('content')
<style>
textarea#description {
    background-color: #fff;
    border: 1px solid #e4e9f0;
    margin-bottom: 6px;
    padding: 0 15px;
    width: 100%;
    height: 110px;
    box-shadow: none;
}

.reply-comments {
    border-top: solid 1px #e3e3e3;
    margin-top: 20px;
}



.reply-comments ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.reply-comments ul li {
    border-bottom: solid 1px #eee;
    padding: 0px 0px 0px 10px;
}

.reply-comments ul li h2 {
    font-size: 18px;
    margin-bottom: 0;
}

.reply-comments ul li span {
    font-size: 11px;
    color: #7c7c7c;
}
.reply-comments ul li p {
    padding: 5px 0px;
}
.reply-reply {
    background: #faf7ff;
    margin-left: 20px;
    padding: 5px 20px;
}
.text-area {
    margin-top: 30px;
}





.text-area textarea.hs-input {
    background-color: #fff;
    border: 1px solid #e4e9f0;
    margin-bottom: 6px;
    padding: 0 15px;
    width: 100%;
    height: 110px;
    box-shadow: none;
}

.text-area input.btn.btn-primary {
    background: #8356d3;
color:white;
    display: inline-block;
    width: inherit;
}
.reply-comments {
    border-top: solid 1px #e3e3e3;
    margin-top: 20px;
}



.reply-comments ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.reply-comments ul li {
    border-bottom: solid 1px #fff;
    padding: 0px 0px 0px 10px;
}

.reply-comments ul li h2 {
    font-size: 18px;
    margin-bottom: 0;
}

.reply-comments ul li span {
    font-size: 11px;
    color: #7c7c7c;
}
.reply-comments ul li p {
    padding: 5px 0px;
}
.reply-reply {
    background: #faf7ff;
    margin-left: 20px;
    padding: 5px 20px;
}



.details-block-support-edit {
    background: #f5f7fa;
    border-radius: 7px;
    padding: 35px 30px;
    width: 100%;
    float: left;
    margin-top: 20px;
}
.details-block-support-edit ol {
    list-style: none;
    padding: 0;
    margin: 0;
    width: 100%;
    float: left;
}
.details-block-support-edit ol li {
    display: block;
    border-bottom: solid 1px #ddd;
    margin-bottom: 10px;
    padding-left: 20px;
    float: left;
    width: 100%;
}
.details-block-support-edit ol li h3 {
    font-size: 16px;
    margin: 0;
    width: 40%;
    float: left;
    font-weight: 500;
}
.details-block-support-edit ol li p {
    display: inline-block;
    font-size: 14px;
    float: right;
    width: 60%;
}
</style>
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Support</h2>
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
                <div class="col-md-12">
					<div class="details-block-support-edit">
						<ol>
							
							
							
							
							
							
							<li>
									<h3>Name</h3>
									
										<p>{{App\User::getName($support->user_id)}}</p>
				
									
							</li>
							
							
							
							
							<li>
									<h3>Category</h3>
									@foreach($supportCategory as $category)
                    @if($category->id == $support->category)
										<p>{{$category->category}}</p>
					@endif
                   @endforeach
									
							</li>
							<li>
									<h3>Subject</h3>
									
										<p>{{$support->subject}}</p>
				
									
							</li>
							<li>
									<h3>Description</h3>
						
										<p>{{$support->description}}</p>
			
									
							</li>
						</ol>
					</div>
					                </div>
                
				<div class="col-sm-12">
					<div class="reply-comments">
							<ul>
								
							@foreach($support->apComments as $comment)	
								
								<li>
									
									@if($comment->user_id == 1)
									<div class="comment-reply">
										<div class="comment-content">
											<h2>Me</h2>
											<span>{{date('M\. d\, Y', strtotime($comment->created_at))}}</span>
											<p>{{$comment->description}}</p>
										</div>
								    </div>
									@else
									<div class="reply-reply">
										<div class="reply-content">
											<td>{{App\User::getSupportName($comment->user_id)}}</td>
											<span>{{date('M\. d\, Y', strtotime($comment->created_at))}}</span>
											<p>{{$comment->description}}</p>
										</div>
								    </div>
									@endif
								</li>
								
							@endforeach	
								
							</ul>
					</div>
					<div class="text-area">
						
						
						
						
						<form enctype="multipart/form-data" method="post" action="{{ route('admin.support.comment') }}">
							<textarea class="hs-input" name="description"></textarea>
							<input type="hidden" value="{{$support->id}}" name="support_id">
							
							<input type="submit" value="Add Comments"  class="btn btn-primary">
							@csrf
							</form>
					</div>
				</div>
                
                </div>
    </div>
</section>
@endsection
