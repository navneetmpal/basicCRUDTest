@if (\Session::has('error'))
	<div class="alert alert-danger" id="session-error">
		<ul>
			<li>{!! \Session::get('error') !!}</li>
		</ul>
	</div>
@endif
@if (\Session::has('success'))
	<div class="alert alert-success" id="session-message">
		<ul>
			<li>{!! \Session::get('success') !!}</li>
		</ul>
	</div>
@endif

@if(Session::has('forgoterror'))
<script type="text/javascript">
	Swal.fire({ 
      icon: 'warning',             
      title: "<span style='font-size:20px'>" + "{{ __(Session::get('forgoterror')) }}" + "</span>",
      animation: true,
      position: 'center',
      showConfirmButton: false,
      timer: 3000,
	    timerProgressBar: true,                 
   }) 
</script>
@endif

@if(Session::has('forgot-error'))
	<script type="text/javascript">
			Swal.fire({	    
			//toast: true,
	    icon: 'warning',
	    title: "<span style='font-size:20px'>" + "{{ __(Session::get('forgot-error')) }}" + "</span>",
	    animation: true,
	    position: 'center',
	    showConfirmButton: false,
	    timer: 3000,
	    timerProgressBar: true,	    
	  })
	</script>
@endif

@if(Session::has('alert-success'))

	<script type="text/javascript">
		swal({
	    toast: true,
	    icon: 'success',
	    title: "{{ __(Session::get('alert-success')) }}",
	    animation: true,
	    position: 'bottom',
	    //iconColor: '#cc9539',
	    showConfirmButton: false,
	    timer: 5000,
	    timerProgressBar: true,
	    customClass: {
		    popup: 'colored-toast'
	  },
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
	</script>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible hideMsg" id="printError">
    	<!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ __($error) }}</li>
            @endforeach
        </ul>
    </div>
@endif