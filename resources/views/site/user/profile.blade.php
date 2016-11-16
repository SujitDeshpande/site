<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Automation | Profile</title>

    @include('site.includes.styles')
    
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>

</head>

<body>

<div id="wrapper">

@include('site.includes.navbar')

<div id="page-wrapper" class="gray-bg">
@include('site.includes.header')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Automation</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
                <a href="user">Users</a>
            </li>
            <li class="active">
                <strong>Profile</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Profile</h5>
                    <div class="ibox-tools">

                    </div>
                </div>  
                <div class="ibox-content">

                    <form enctype="multipart/form-data" method="get" class="form-horizontal" autocomplete="off">


                        <center>

                        <img src="/uploads/avatars/{{Auth::user()->avatar}}" alt="image" class="img-circle" width="20%" height="20%">
                        <p>&nbsp;</p>

                        <div class="input-group col-lg-6 col-sm-6 col-12">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Browse <input type="file" style="display: none; width:50%" name="avatar">
                                </span>
                            </label>
                            <input type="text" class="form-control" readonly>
                        </div>

                        <input type="hidden" name="_token" value="{{csrf_token()}}"></center>

                        
                        <div class="hr-line-dashed"></div>

                        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" value="{{Auth::user()->name}}" class="form-control" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" value="{{Auth::user()->email}}" class="form-control" readonly>
                            </div>
                        </div>                                        

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" id="password" value class="form-control">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="confirm_password" id="confirm_password" value class="form-control">
                            </div>

                        </div>

                        <div class="hr-line-dashed"></div>


                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a class="btn btn-white" href="/home"><i class="fa fa-close"></i> Cancel</a>
                                <button class="profile-update btn btn-primary" type="submit"><i class="fa fa-check"></i> Save</button>

                            </div>
                        </div>
                    </form>
                </div>       
            </div>
        </div>
    </div>
</div>

@include('site.includes.footer')
</div>
</div>
    @include('site.includes.scripts')
    
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".chosen").chosen({
        width:'50%'
    });


$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});

</script>

<script type="text/javascript" src="js/custom/user/modifyProfile.js"></script>

</body>

</html>
